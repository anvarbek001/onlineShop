<?php

namespace App\Http\Controllers;

use App\Categories;
use App\Http\Controllers\Controller;
use App\Mail\PostCreatedMail;
use App\Post;
use App\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show', 'stores', 'categories', 'products']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $post = Post::paginate(12);
        $categories = Categories::all();

        return view('welcome')->with('posts', $post)->with('categories', $categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if (!auth()->user()->store) {
            return redirect()->route('account')->with(['error' => __("Sizda hech qanday do'kon mavjud emas!")]);
        }


        // 1️⃣ Fayllarni validatsiya qilish
        $request->validate([
            'title' => 'required|max:255',
            'short_content' => 'required',
            'content' => 'required',
            'price' => 'required',
            'photo' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);


        if ($request->hasFile('photo')) {
            $name = $request->file('photo')->getClientOriginalName();
            $path = $request->file('photo')->storeAs('photo-storage', $name, 'public');
        }

        // 3️⃣ Malumotlarni saqlash
        $post = Post::create([
            'store_id' => auth()->user()->store->id,
            'category_id' => $request->category_id,
            'title' => $request->title,
            'short_content' => $request->short_content,
            'content' => $request->content,
            'price' => $request->price,
            'photo' => $path ?? null,
            'user_id' => Auth::id(),
        ]);



            $sellerEmail = auth()->user()->email;
            $messageContent = ('Post yaratildi'); // Foydalanuvchining habar matni

            Mail::raw($messageContent, function ($message) use ($sellerEmail) {
                $message->to($sellerEmail) // Foydalanuvchidan kelgan email manzil
                    ->subject('Post Yaratildi'); // Mavzu
            });


        return redirect()->route('account')->with('success', __("Post muvaffaqiyatli qo'shildi"));
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($date, $slug)
    {
        $post = Post::whereDate('created_at', $date)
            ->where('slug', $slug)
            ->firstOrFail();
        return view('posts.show')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($date, $slug)
    {
        $categories = Categories::all();
        $post = Post::whereDate('created_at', $date)
            ->where('slug', $slug)
            ->firstOrFail();

        return view('edit')->with('post', $post)->with('categories', $categories);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $date, $slug)
    {

        $post = Post::whereDate('created_at', $date)
            ->where('slug', $slug)
            ->firstOrFail();

        $request->validate([
            'title' => 'required|max:255',
            'short_content' => 'required|max:60',
            'content' => 'required|max:1000',
            'price' => 'required',
            'photo' => 'image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            $name = $request->file('photo')->getClientOriginalName();
            $path = $request->file('photo')->storeAs('storage', $name, 'public');
        } else {
            $path = $post->photo;
        }

        $post->update([
            'title' => $request->title,
            'short_content' => $request->short_content,
            'content' => $request->content,
            'price' => $request->price,
            'photo' => $path,
            'category_id' => $request->category_id
        ]);

        // dd($post);

        return redirect()->route('account')->with(['success' => __("Post muvaffaqiyatli o'zgartirildi")]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function destroy($date, $slug)
    {
        $post = Post::whereDate('created_at', $date)
            ->where('slug', $slug)
            ->firstOrFail();

        if ($post) {
            // Rasm ustunlari ro'yxati

            if (!empty($post->photo)) {
                Storage::delete('public/' . $post->photo);
            }
            // Postni o‘chirish
        }
        $post->delete();

        return redirect()->route('account')->with(['success' => __("Post muvaffaqiyatli o'chirildi")]);
    }



    public function stores()
    {
        $stores = Store::all();

        return view('stores')->with('stores', $stores);
    }

    public function categories($id)
    {

        $category = Categories::with('posts')->find($id);

        if ($category) {
            return view('categories')->with('category', $category);
        }
    }

    public function products()
    {
        $categories = Categories::all();
        $posts = Post::paginate(12);
        return view('products')->with('categories', $categories)->with('posts', $posts);
    }
}

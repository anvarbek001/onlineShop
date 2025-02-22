<?php

namespace App\Http\Controllers;

use App\Categories;
use App\Http\Controllers\Controller;
use App\Post;
use App\User;
use App\UserSeller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $post = Post::paginate(12);
        $categories = Categories::all();

        return view('welcome')->with('posts', $post)->with('categories',$categories);
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


        // 1️⃣ Fayllarni validatsiya qilish
        $request->validate([
            'title' => 'required|max:255',
            'short_content' => 'required|max:60',
            'content' => 'required|max:1000',
            'price' => 'required',
            'photo' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);


        if ($request->hasFile('photo')) {
            $name = $request->file('photo')->getClientOriginalName();
            $path = $request->file('photo')->storeAs('photo-storage', $name, 'public');
        }

        // 3️⃣ Malumotlarni saqlash
        $post = Post::create([
            'category_id' => $request->category_id,
            'title' => $request->title,
            'short_content' => $request->short_content,
            'content' => $request->content,
            'price' => $request->price,
            'photo' => $path ?? null,
            'user_id' => Auth::id(),
        ]);



        return redirect()->route('account')->with('success', 'Post muvaffaqiyatli qo\'shildi!');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('posts.show')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request);
        $post = Post::findOrFail($id);

        $request->validate([
            'title' => 'required|max:255',
            'short_content' => 'required|max:60',
            'content' => 'required|max:1000',
            'price' => 'required',
            'photo' => 'image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        if($request->hasFile('photo')){
            $name = $request->file('photo')->getClientOriginalName();
            $path = $request->file('photo')->storeAs('storage',$name,'public');
        }else{
            $path = $post->photo;
        }

        $post->update([
            'title' => $request->title,
            'short_content' => $request->short_content,
            'content' => $request->content,
            'price' => $request->price,
            'photo' => $path,
        ]);

        return redirect()->route('account')->with(['success'=>'Muvaffaqiyatli o\'zgartirildi','post_id' => $post->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function destroy($id)
    {
        $post = Post::findOrFail($id);

        if ($post) {
            // Rasm ustunlari ro'yxati

            if (!empty($post->photo)) {
                Storage::delete('public/' . $post->photo);
            }
            // Postni o‘chirish
        }
        $post->delete();

        return redirect()->route('account')->with(['success' => 'Muvaffaqiyatli o\'chirildi']);
    }



    public function stores()
    {
        return view('stores');
    }

    public function search(Request $request)
    {
        // Foydalanuvchidan kelgan qidiruv matnini olish
        if ($request->ajax()) {
            $query = $request->input('search');

            // Mahsulotlarni qidirish (name yoki description bo'yicha)
            $products = Post::where('name', 'like', '%' . $query . '%')
                ->orWhere('description', 'like', '%' . $query . '%')
                ->get();
        }
        // JSON formatida javob qaytarish
        return response()->json($products);
    }
}

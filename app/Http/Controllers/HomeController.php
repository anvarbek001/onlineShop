<?php

namespace App\Http\Controllers;

use App\Categories;
use App\Post;
use App\Posts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $post = Post::paginate(12);
        return view('welcome')->with('posts',$post);;
    }

    public function account(){
        $posts = Post::where('user_id',Auth::id())->paginate(12);
        $categories = Categories::all();
        return view('account.account')->with('posts',$posts)->with('categories',$categories);
    }

    public function exit(){
        Auth()->logout();

        return redirect()->route('index');
    }
}

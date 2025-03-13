<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Like;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function like($id)
    {
        $post = Post::find($id);
        if($post){
            $like = Like::create([
                'user_id'=>auth()->user()->id,
                'post_id'=>auth()->user()->$post->id,
                'situation' => 1,
            ]);
        }

        return redirect()->back();
    }
}

<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $q = $request->input('q');

        // Agar foydalanuvchi hech narsa yozmasa, bo'sh natija qaytaramiz
        if (empty($q)) {
            return response()->json(['html' => '']);
        }

        // Qidiruvni post nomi va qisqa kontent bo'yicha bajarish
        $posts = Post::where(function ($query) use ($q) {
            $query->where('title', 'LIKE', "%{$q}%")
                ->orWhere('short_content', 'LIKE', "%{$q}%")
                ->orWhere('price', 'LIKE', "%{$q}%")
                ->orWhere('description', 'LIKE', "%{$q}%");
        })->get();



        // HTML yaratish
        $html = view('partials.search-results', compact('posts'))->render();

        return response()->json(['html' => $html]);
    }
}

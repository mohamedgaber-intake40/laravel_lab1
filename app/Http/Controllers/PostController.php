<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;


class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view(
            'posts.index',
            [
                'posts' => $posts
            ]
        );
    }

    public function show()
    {
        $request = request();
        $post_id = $request->post;
        $post = Post::find($post_id);
        return view(
            'posts.show',
            [
                'post' => $post
            ]
        );
    }
}

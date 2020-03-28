<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Post;
use Illuminate\Http\Request;
use App\Http\Requests\StorePostRequest;


class PostController extends Controller
{
    public function index()
    {
        // new PostResource::collecton(Post:paginate(4));
        return  PostResource::collection(Post::with('user')->paginate(4));

        // return PostResource::collection(Post::all());
    }

    public function show($post)
    {
        return new PostResource(Post::find($post));
    }

    public function store(StorePostRequest $request)
    {
        Post::create(
            [
                'title'=>$request->title,
                'description'=>$request->description,
                'user_id' => $request->user_id
            ]
        );
    }
}

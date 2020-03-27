<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use Illuminate\Http\Request;
use App\Post;
use App\User;
use Illuminate\Support\Facades\DB;


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
                'post' => $post,
            ]
        );
    }

   

    public function create()
    {
        $users = User::all();
        return view(
            'posts.create',
            [
                'users' => $users
            ]
        );
    }

    public function store(StorePostRequest $request)
    {

        Post::create(
            [
                'title'      =>$request->title,
                'description'=>$request->description,
                'user_id'      =>$request->user_id,
            ]
        );
        return redirect()->route( 'posts.index');
    }

    public function edit()
    {
        $request = request();
        $post_id =$request->post;
        $post = Post::find($post_id);
        $users = User::all();
        return view('posts.edit',[
            'post'=> $post,
            'users'=>$users
        ]);
    }

    public function update()
    {
        $request = request();
        $post_id =$request->post;
        Post::find($post_id )->update([
            'title'      =>$request->title,
            'description'=>$request->description,
            'user_id' =>$request->user_id,
            ]);
            
            return redirect()->route( 'posts.index');
            
        }
        // DB::table('posts')
        //       ->where('id', $post_id)
        //       ->update([
        //         'title'      =>$request->title,
        //         'description'=>$request->description,
        //         'user_id'    =>$request->user_id,
        //       ]);

        public function destroy()
        {
            $request= request();
            $post_id = $request->post_id;
            Post::find($post_id)->delete();

            return redirect()->route( 'posts.index');

        }
}

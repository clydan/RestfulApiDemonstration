<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index($id = null){
        return $id ? Post::find($id) : Post::all();
    }

    public function store(Request $request){
        $data = request()->validate([
            'title' => 'required',
            'body' => 'required'
        ]);

        if($data){
            Post::create([
                'body' => request('body'),
                'title' => request('title'),
                'user_id' => request('user_id'),
            ]);

            return response([
                'message' => 'Post created successfully'
            ], 200);
        }

        return response([
            'message' => 'Unsuccessful post'
        ], 404);
    }

    public function update(Request $request, $id){
        $data = request()->validate([
            'title' => 'required|sometimes',
            'body' => 'required|sometimes'
        ]);

        if($data){
            Post::where('id', $id)->update($data);

            return response([
                'message' => 'Post updated'
            ], 200);
        }
        return response([
            'message' => 'Error updating Post'
        ], 404);


    }

    public function delete($id){
        $post = Post::find($id);

        if($post){
            $post->delete();

            return response([
                'message' => 'Post deleted'
            ], 200);
        }
        return response([
            'message' => 'Postt not found'
        ], 404);

        
    }
}

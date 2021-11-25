<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Actions\SaveUserPost;
use App\Actions\UpdateUserPost;
use App\Actions\DeleteUserPost;

class PostController extends Controller
{
    public function index($id = null){
        return $id ? Post::find($id) : Post::all();
    }

    public function store(Request $request, SaveUserPost $action){
        $post = $action->handle($request);
        if($post){
            return response([
                'message' => 'success'
            ], 200);
        }
        return response([
            'message' => 'failed'
        ], 400);
    }

    public function update(Request $request, $id){
        $post = $action->handle($request, $id);
        if($post){
            return response([
                'message' => 'success'
            ], 200);
        }
        return response([
            'message' => 'failed'
        ], 400);
    }

    public function delete($id){
        $post = $action->handle($id);
        if($post){
            return response([
                'message' => 'success'
            ], 200);
        }
        return response([
            'message' => 'failed'
        ], 400);
    }
}

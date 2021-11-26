<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Actions\SaveUserPost;
use App\Actions\GetUserPosts;
use App\Actions\AllPosts;
use App\Actions\UpdateUserPost;
use App\Actions\DeleteUserPost;
use App\Actions\PostWithComments;

class PostController extends Controller
{
   public function index(AllPosts $action){
        $posts = $action->handle();

        return response([
            'posts' => $posts
        ], 200);
    }

    public function view(PostWithComments $action,$id){
        $posts = $action->handle($id);

        return response([
            'posts' => $posts
        ], 200);
    }

    public function getUserPost(GetUserPosts $action,$id){
        $posts = $action->handle($id);
        return response([
            'posts' => $posts
        ], 200);
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

    public function update(UpdateUserPost $action,Request $request, $id){
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

    public function delete(DeleteUserPost $action,$id){
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

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;

class UtilityController extends Controller
{
    public function postComments($id){
        $post = Post::where('id', $id)->first();
        if($post){
            return response(
                [
                    'title' => $post->title,
                    'body' => $post->pody,
                    'comments' => $post->comments->all()
                ], 200);
        }

        return response([
            'message' => 'Post record does not exist'
        ], 404);
    }

    public function userPosts($id){
        $user = User::find($id);
        if($user){
            return response([
                'Author Name' => $user->name,
                'posts' => $user->posts->all()
            ]);
        }
    }
}

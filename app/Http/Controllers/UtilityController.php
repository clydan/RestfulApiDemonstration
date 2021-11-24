<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Post;

class UtilityController extends Controller
{
    public function postComments($id){
        $post = Post::where('id', $id)->first();
        return response(
            [
                'post' => $post,
                'comments' => $post->comments->all()
            ], 200
            );
    }
}

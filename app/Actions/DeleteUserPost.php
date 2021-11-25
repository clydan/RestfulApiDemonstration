<?php

namespace App\Actions;

use App\Models\Comment;

class DeleteUserPost{
    public function handle($id){
        $post = Post::find($id);

        if($post){
            $post->delete();

            return true;
        }
        return false;
    }
}
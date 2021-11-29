<?php

namespace App\Actions;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;

class PostWithComments {
    public function handle($id){
        return Post::where('id', $id)
        ->with('comment')
        ->get();
    }
}
<?php

namespace App\Actions;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;

class GetUserPosts {
    public function handle($id){
        return User::where('id', $id)
        ->orderBy('title')
        ->with('posts')
        ->get();
    }
}
<?php

namespace App\Actions;

use App\Models\Comment;
use App\Models\Post;

class AllPost {
    public function handle(){
        return Post::orderBy('title')
        ->get();
    }
}
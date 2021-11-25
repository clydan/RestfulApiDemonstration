<?php

namespace App\Repositories;
use App\Interfaces\PostRepositoryInterface;
use App\Models\Post;
use App\Models\Comments;
use App\Models\User;

class PostRepository implements PostRepositoryInterface{
    public function all(){
        return Post::orderBy('title')
        ->get();
    }

    public function postWithComments($id){
        $post = Post::where('id', $id)->firstOrFail();
        if($post){
            return
            [
                'title' => $post->title,
                'body' => $post->body,
                'comments' => $post->comments->all()
            ];
        }

        return [
            'message' => 'Post not found'
        ];
    }

    public function getUserPosts($id){
        $user = User::find($id);
        if($user){
            return [
                'Author Name' => $user->name,
                'posts' => $user->posts->all()
            ];
        }
    }
}
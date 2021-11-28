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

    public function savePost($request){
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
            return true;
        }
        return false;
    }

    public function deletePost($id){
        $post = Post::find($id);

        if($post){
            $post->delete();

            return true;
        }
        return false;
    }

    public function updatePost($request, $id){
        $data = request()->validate([
            'title' => 'sometimes',
            'body' => 'sometimes'
        ]);

        if($data){
            Post::where('id', $id)->update($data);

            return true;
        }
        return false;
    }
}
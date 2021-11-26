<?php

namespace App\Repositories;
use App\Interfaces\CommentRepositoryInterface;
use App\Models\Post;
use App\Models\Comment;
use App\Models\User;

class CommentRepository implements CommentRepositoryInterface{
    public function commentSave($request){
        $data = request()->validate([
            'body' => 'required'
        ]);

        if($data){
            Comment::create([
                'body' => request('body'),
                //i will be passing the userId and postId long
                'user_id' => request('user_id'),
                'post_id' => request('post_id')
            ]);
            return true;
        }
        return false;
    }

    public function commentUpdate($request, $id){
        $data = request()->validate([
            'body' => 'required'
        ]);

        if($data){
            Comment::where('id', $id)->update($data);

            return true;
        }
        return false;

    }

    public function commentDelete($id){
        $thisComment = Comment::find($id);
        if($thisComment){
            $comment->delete();

            return true;
        }
        return false;
    }

    public function allComments(){
        return Comment::orderBy('created_at')->get();
    }

}
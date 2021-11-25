<?php

namespace App\Actions;

use App\Models\Comment;

class SaveUserComment{
    public function handle($request){
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
}
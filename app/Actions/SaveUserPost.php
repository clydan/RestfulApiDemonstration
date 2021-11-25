<?php

namespace App\Actions;

use App\Models\Comment;

class SaveUserPost{
    public function handle($request){
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
}
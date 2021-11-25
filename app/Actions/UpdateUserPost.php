<?php

namespace App\Actions;

use App\Models\Comment;

class UpdateUserPost{
    public function handle($request, $id){
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
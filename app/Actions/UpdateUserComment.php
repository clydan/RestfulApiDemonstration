<?php

namespace App\Actions;

use App\Models\Comment;

class UpdateUserComment{
    public function handle($request, $id){
        $data = request()->validate([
            'body' => 'required'
        ]);

        if($data){
            Comment::where('id', $id)->update($data);

            return true;
        }
        return false;

    }
}
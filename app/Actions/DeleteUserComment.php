<?php

namespace App\Actions;

use App\Models\Comment;

class DeleteUserComment{
    public function handle($id){
        $thisComment = Comment::find($id);
        if($thisComment){
            $thisComment->delete();

            return true;
        }
        return false;
    }
}
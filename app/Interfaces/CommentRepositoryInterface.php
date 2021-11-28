<?php

namespace App\Interfaces;

interface CommentRepositoryInterface 
{
    public function commentSave($request);
    public function commentUpdate($request, $id);
    public function commentDelete($id);
    public function allComments();
}
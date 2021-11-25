<?php

namespace App\Interfaces;

interface PostRepositoryInterface 
{
    public function all();
    public function postWithComments($id);
    public function getUserPosts($id);
}

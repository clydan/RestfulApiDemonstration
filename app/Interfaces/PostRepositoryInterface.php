<?php

namespace App\Interfaces;

interface PostRepositoryInterface 
{
    public function all();
    public function postWithComments($id);
    public function getUserPosts($id);
    public function savePost($request);
    public function updatePost($request, $id);
    public function deletePost($id);

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Actions\SaveUserPost;
use App\Actions\UpdateUserPost;
use App\Actions\DeleteUserPost;
use App\Repositories\PostRepository;

class PostController extends Controller
{

    private $postRepository;

    public function __construct(PostRepository $postRepository){
        $this->postRepository = $postRepository;
    }

    public function index(){
        $posts = $this->postRepository->all();

        return response([
            'posts' => $posts
        ], 200);
    }

    public function view($id){
        $posts = $this->postRepository->postWithComments($id);

        return response([
            'posts' => $posts
        ], 200);
    }

    public function getUserPost($id){
        $posts = $this->postRepository->getUserPosts($id);

        return response([
            'posts' => $posts
        ], 200);
    }

    public function store(Request $request, SaveUserPost $action){
        $post = $action->handle($request);
        if($post){
            return response([
                'message' => 'success'
            ], 200);
        }
        return response([
            'message' => 'failed'
        ], 400); 
    }

    public function update(Request $request, $id){
        $post = $action->handle($request, $id);
        if($post){
            return response([
                'message' => 'success'
            ], 200);
        }
        return response([
            'message' => 'failed'
        ], 400);
    }

    public function delete($id){
        $post = $action->handle($id);
        if($post){
            return response([
                'message' => 'success'
            ], 200);
        }
        return response([
            'message' => 'failed'
        ], 400);
    }
}

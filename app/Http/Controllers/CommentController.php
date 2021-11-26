<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Interfaces\CommentRepositoryInterface;
use App\Models\Comment;
use App\Repositories\CommentRepository;

class CommentController extends Controller
{

    private CommentRepositoryInterface $commentRepository;

    public function __construct(CommentRepositoryInterface $commentRepository){
        $this->commentRepository = $commentRepository;
    }
    public function index(){
        $comments = $this->commentRepository();
        return response([
            'comments' => $comment,
        ], 200);
    }

    public function store(Request $request){

        $comment = $this->commentRepository->commentSave($request);
        if($comment){
            return response([
                'message' => 'success'
            ], 200);
        }
        return response([
            'message' => 'failed'
        ], 400);
    }

    public function update(Request $request, $id){
        $comment = $this->commentRepository->commentUpdate($request, $id);
        if($comment){
            return response([
                'message' => 'success'
            ], 200);
        }
        return response([
            'message' => 'failed'
        ], 400);
    }

    public function delete($id){
        $comment = $this->commentRepository->commentDelete($id);
        if($comment){
            return response([
                'message' => 'success'
            ], 200);
        }
        return response([
            'message' => 'failed'
        ], 400);
    }
}

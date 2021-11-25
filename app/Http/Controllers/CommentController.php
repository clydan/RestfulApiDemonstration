<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Actions\SaveUserComment;
use App\Actions\UpdateUserComment;
use App\Actions\DeleteUserComment;

class CommentController extends Controller
{
    public function index($id = null){
        return $id ? Comment::find($id) : Comment::all();
    }

    public function store(Request $request, SaveUserComment $action){

        $comment = $action->handle($request);
        if($comment){
            return response([
                'message' => 'success'
            ], 200);
        }
        return response([
            'message' => 'failed'
        ], 400);
    }

    public function update(Request $request, $id, UpdateUserComment $action){
        $comment = $action->handle($request, $id);
        if($comment){
            return response([
                'message' => 'success'
            ], 200);
        }
        return response([
            'message' => 'failed'
        ], 400);
    }

    public function delete($id, DeleteUserComment $action){
        $comment = $action->handle($id);
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

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    public function index($id = null){
        return $id ? Comment::find($id) : Comment::all();
    }

    public function store(Request $request){
        $data = request()->validate([
            'body' => 'required'
        ]);

        if($data){
            Comment::create([
                'body' => request('body'),
                //i will be passing the userId and postId long
                'user_id' => request('user_id'),
                'post_id' => request('post_id')
            ]);

            return response([
                'message' => 'comment created successfully'
            ], 200);
        }

        return response([
            'message' => 'Unsuccessful post'
        ], 404);
    }

    public function update(Request $request, $id){
        $data = request()->validate([
            'body' => 'required'
        ]);

        if($data){
            Comment::where('id', $id)->update($data);

            return response([
                'message' => 'comment updated'
            ], 200);
        }
        return response([
            'message' => 'Error updating comment'
        ], 404);


    }

    public function delete($id){
        $comment = Comment::find($id);

        if($comment){
            $comment->delete();

            return response([
                'message' => 'comment deleted'
            ], 200);
        }
        return response([
            'message' => 'comment not found'
        ], 404);

        
    }
}

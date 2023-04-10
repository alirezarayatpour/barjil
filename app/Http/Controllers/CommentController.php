<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index()
    {
        $comments = Comment::query()->orderBy('id', 'DESC')->paginate(10);
        return view('admin.pages.comment.index', compact('comments'));
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();
        return back();
    }

    public function show(Comment $comment)
    {
        return view('admin.pages.comment.show', compact('comment'));
    }

    public function status(Comment $comment)
    {
        if ($comment->status === 1){
            $comment->status = 0;
        } elseif ($comment->status === 0){
            $comment->status = 1;
        }
        $comment->save();
        return redirect()->back();
    }
    
}

<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Idea;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Idea $idea){
        //dd(request('content'));

        $comment = new Comment();
        $comment->idea_id = $idea->id;
        $comment->content = request('content'); //content name form
        $comment->save();
        return redirect()->route('ideas.show',$idea->id)->with('success','success comment added');
    }
}
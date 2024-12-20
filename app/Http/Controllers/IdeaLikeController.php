<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class IdeaLikeController extends Controller
{
    public function like(Idea $idea){
        $liker = auth()->user();

        //User model
        $liker->likes()->attach($idea);

        return redirect()->route('dashboard')->with('success','Likes aggiunto');


    }

    public function unlike(Idea $idea){
        $liker = auth()->user();

        //User model
        $liker->likes()->detach($idea);

        return redirect()->route('dashboard')->with('success','Likes tolto');
    }

}

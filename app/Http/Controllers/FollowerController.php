<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class FollowerController extends Controller
{
    public function follow(User $user){
        //current user logged
       $follower=auth()->user();

       $follower->followings()->attach($user);

       return redirect()->route('users.show',$user->id)->with('success','Followers aggiunto');
    }

    public function unfollow(User $user){
        $follower = auth()->user();

        // usata relazione 1 to many
        $follower->followings()->detach($user);

        return redirect()->route('users.show',$user->id)->with('success','UnFollow eseguito');
    }
}

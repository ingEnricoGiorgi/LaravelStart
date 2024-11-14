<?php

namespace App\Http\Controllers;

use App\Mail\WelcomeEmail;
use App\Models\Idea;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        #Preview email for testing purpose
        #return new WelcomeEmail(auth()->user());
        #EAGER LOADING
        #user e comments.user sono relazioni dentro i controller idea s Comment
        #$ideas = Idea::with('user','comments.user')->orderBy('created_at', 'DESC');
        $ideas = Idea::orderBy('created_at', 'DESC');

        //verifica se nel form input ha nome search

        //idea è il campo del database
        if (request()->has('search')) {
            $ideas= $ideas->where('content', 'like', '%'. request()->get('search') . '%');
        }
        return view('dashboard', [
            'ideas' => $ideas->paginate(5)
        ]);
    }

}

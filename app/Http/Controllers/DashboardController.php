<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        /*   $idea = new Idea();
           $idea->idea = 'test';
           $idea->likes = 0;
           $idea->save();
           return view('dashboard');
        */
        /*
             $users = [
                 [
                     'nome' => 'luca',
                     'eta' => 21
                 ],
                 [
                     'nome' => 'lucat',
                     'eta' => 22
                 ]
             ];
             return view('users.profile',['usersList' =>$users]);
             */

        $ideas = Idea::all();

        return view('dashboard', compact('ideas'));
    }

}

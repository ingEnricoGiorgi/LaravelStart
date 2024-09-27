<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function index(){
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
    }
}

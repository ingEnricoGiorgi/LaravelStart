<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {

        $ideas = Idea::orderBy('created_at', 'DESC');
        //verifica se nel form input ha nome search

        //idea è il campo del database
        if (request()->has('search')) {
            $ideas= $ideas->where('idea', 'like', '%'. request()->get('search') . '%');
        }
        return view('dashboard', [
            'ideas' => $ideas->paginate(5)
        ]);
    }

}

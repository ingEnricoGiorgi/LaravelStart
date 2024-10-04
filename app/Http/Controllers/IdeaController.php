<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class IdeaController extends Controller
{
    public function store() {
        $inputValue = request('ideaTextarea');

        // Controlla se il valore è null o vuoto
        if (empty($inputValue)) {
            return redirect()->back()->withErrors('Il campo idea è vuoto o nullo.');
        }else {
        $idea = new Idea([
            'idea' => $inputValue // Associa il valore al campo 'idea'
        ]);

        $idea->save();
            return redirect('/')->with('success', 'Idea salvata correttamente!');
        }

    }
}

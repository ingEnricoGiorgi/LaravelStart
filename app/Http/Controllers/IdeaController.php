<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class IdeaController extends Controller
{
    public function store()
    {
        request()->validate([
            'ideaTextarea' => 'required|min:5|max:240'
        ]);

        $inputValue = request('ideaTextarea');

        /*
        if (empty($inputValue)) {
             return redirect()->back()->withErrors('Il campo idea è vuoto o nullo.');
         }else {
             */
        $idea = new Idea([
            'idea' => $inputValue // Associa il valore al campo 'idea'
        ]);

        /*  $idea = Idea::create(
          [
           'idea'=> $inputValue //sarebbe la colonna content o idea nella tabelle del db
          ]
          );
        */
        $idea->save();
        return redirect('/')->with('success', 'Idea salvata correttamente!');
        //}

    }
}

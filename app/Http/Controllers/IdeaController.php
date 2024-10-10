<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class IdeaController extends Controller
{
    public function create()
    {
        request()->validate([
            'ideaTextarea' => 'required|min:5|max:240'
        ]);

        $inputValue = request('ideaTextarea');

        $idea = new Idea([
            'idea' => $inputValue // Associa il valore al campo 'idea'
        ]);

        $idea->save();
        return redirect('/')->with('success', 'Idea salvata correttamente!');

    }
    public function destroy($id){
        #dump('deleting');
        Idea::where('id', $id)->firstOrFail()->delete();
        return redirect('/')->with('success', 'Idea cancellata correttamente!');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class IdeaController extends Controller
{

    public function show(Idea $idea)
    {
        //return view('ideas.show', ['idea' => $idea]);
        return view('ideas.show', compact('idea'));
    }

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

    public function destroy(Idea $id)
    {

        $id->delete();
        return redirect('/')->with('success', 'Idea cancellata correttamente!');
    }

    public function edit(Idea $idea)
    {
        $editing = true;
        return view('ideas.show', compact('idea', 'editing'));
    }

    public function update(Idea $idea)
    {
        request()->validate([
            'content' => 'required|min:5|max:240'
        ]);
        //modifico il content che è l'id del form
        $idea->idea = request('content','');
        $idea->save();
        return redirect()->route('ideas.show', $idea->id)->with('success', 'Idea aggioranata correttamente!');;
    }
}

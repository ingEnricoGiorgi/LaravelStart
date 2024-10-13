<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class IdeaController extends Controller
{

    public function show(Idea $idea)
    {
        //return view('ideas.show', ['idea' => $idea]);
        //dd($idea->comments());
        return view('ideas.show', compact('idea'));
    }

    public function store()
    {
        $validated = request()->validate([
            'content' => 'required|min:5|max:240'
        ]);
        //dd(request()->all());

        Idea::create($validated);


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
        //return view('ideas.show', ['idea' => $idea, 'editing' => $editing]);
        //oppure
        return view('ideas.show', compact('idea', 'editing'));
    }

    public function update(Idea $idea)
    {
        $validated = request()->validate([
            'content' => 'required|min:5|max:240'
        ]);
        /*modifico il content che è l'id del form
        $idea->content = request('content','');
        $idea->save();
        */

        $idea->update($validated);
        return redirect()->route('ideas.show', $idea->id)->with('success', 'Idea aggiornata correttamente!');
    }
}

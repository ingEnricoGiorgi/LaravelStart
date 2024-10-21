<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class IdeaController extends Controller
{

    public function show(Idea $idea)
    {
        return view('ideas.show', compact('idea'));
    }

    public function store()
    {
        $validated = request()->validate([
            'content' => 'required|min:5|max:240'
        ]);
        //dd(request()->all());
        $validated['user_id'] = auth()->id();

        Idea::create($validated);


        return redirect('/')->with('success', 'Idea salvata correttamente!');

    }

    public function destroy(Idea $idea)
    {
        /*dd($idea);
        echo($idea->user_id.' + '.auth()->id());
        exit;*/
        if (!auth()->check() || $idea->user_id !== auth()->id()) {
            abort(403, 'Current user unauthorized');
        }

        $idea->delete();
        return redirect('/')->with('success', 'Idea cancellata correttamente!');
    }

    public function edit(Idea $idea)
    {
        $editing = false;
        if ($idea->user_id == auth()->id()) {
            $editing = true;
        }
        //oppure
        return view('ideas.show', compact('idea', 'editing'));
    }

    public function update(Idea $idea)
    {
        if ($idea->user_id !== auth()->id()) {
            abort(404);
        }

        $validated = request()->validate([
            'content' => 'required|min:5|max:240'
        ]);

        $idea->update($validated);
        return redirect()->route('ideas.show', $idea->id)->with('success', 'Idea aggiornata correttamente!');
    }
}

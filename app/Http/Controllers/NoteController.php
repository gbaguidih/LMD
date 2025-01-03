<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Note;
use App\Models\Ec;
use App\Models\Etudiant;


class NoteController extends Controller
{
    public function index(Request $request)
    {   
        $etudiants = Etudiant::all();
        $ecs = Ec::all();
        $notes = Note::all();
        return view('note.index', compact('notes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
        $ecs = Ec::all();
        $etudiants = Etudiant::all();
        return view('note.create', compact('etudiants','ecs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'etudiant_id' => 'required|exists:etudiants,id',
            'ec_id' => 'required|exists:ecs,id',
            'note' => 'required|numeric',
            'session' => 'required|string',
            'date_evaluation' => 'required|date',
        ]);
        Note::create($request->all());
        return redirect()->route('note.index')->with('success');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $ecs = Ec::all();
        $etudiants = Etudiant::all();
        $note = Note ::find($id) ;
        return view('note.edit',compact('ecs','etudiants','note'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id) 
    { 
        $validatedData =$request->validate([
            'etudiant_id' => 'required|exists:etudiants,id',
            'ec_id' => 'required|exists:ecs,id',
            'note' => 'required|numeric',
            'session' => 'required|string',
            'date_evaluation' => 'required|date',
        ]);
        
        $note = Note::find($id);
        $note->update($validatedData);
        return redirect()->route('note.index')
            ->with('success', 'Note mise à jour avec succès !');
        
            
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $notes = Note::find($id);
        $notes->delete();
        
        return redirect()->route('note.index')
      ->with('success', 'Note supprimer avec succès !');
        
    }
}

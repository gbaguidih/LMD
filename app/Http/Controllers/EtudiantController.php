<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Etudiant;

class EtudiantController extends Controller
{
    public function index(Request $request)
    {   
        $etudiants = Etudiant::all();
        return view('etudiant.index', compact('etudiants'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
        return view('etudiant.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    { 
        $request->validate([
            'numero_etudiant' => 'required|integer',
            'nom' => 'required|string|max:50',
            'prenom' => 'required|string|max:255',
            'niveau' => 'required|string',
        ]);
        Etudiant::create($request->all());
        return redirect()->route('etudiant.index')->with('success');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $etudiant = Etudiant ::find($id) ;
        return view('etudiant.edit',compact('etudiant'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id) 
    { 
        $request->validate([
            'numero_etudiant' => 'required|integer',
            'nom' => 'required|string|max:50',
            'prenom' => 'required|string|max:255',
            'niveau' => 'required|string',
        ]);
        $etudiant = Etudiant::find($id);
        $etudiant->update($request->all());
        return redirect()->route('etudiant.index')
            ->with('success', 'Etudiant mise à jour avec succès !');
        
            
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $etudiant = Etudiant::find($id);
        $etudiant->delete();
        return redirect()->route('etudiant.index')
      ->with('success', 'Etudiant supprimer avec succès !');
        
    }

}

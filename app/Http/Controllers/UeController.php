<?php

namespace App\Http\Controllers;

use App\Models\Ue;
use Illuminate\Http\Request;

class UeController extends Controller
{
    public function index(Request $request)
    {   
        $ues = Ue::all();
        return view('ue.index', compact('ues'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
        return view('ue.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'code' => ['required', 'string', 'regex:/^UE\d{2}$/'],
            'nom' => 'required|string|max:50',
            'credits_ects' => 'required|integer',
            'semestre' => 'required|string',
        ]);
        Ue::create($request->all());
        return redirect()->route('ue.index')->with('success');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $ue = Ue ::find($id) ;
        return view('ue.edit',compact('ue'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id) 
    { 
        $request->validate([
            'code' => 'required|string|max:20',
            'nom' => 'required|string|max:50',
            'credits_ects' => 'required|integer',
            'semestre' => 'required|string',
        ]);
        $ue = Ue::find($id);
        $ue->update($request->all());
        return redirect()->route('ue.index')
            ->with('success', 'UE mise à jour avec succès !');
        
            
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $ue = Ue::find($id);
        $ue->delete();
        return redirect()->route('ue.index')
      ->with('success', 'UE supprimer avec succès !');
        
    }

}

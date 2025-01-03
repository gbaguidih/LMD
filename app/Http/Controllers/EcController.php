<?php

namespace App\Http\Controllers;

use App\Models\Ec;
use App\Models\Ue;
use Illuminate\Http\Request;

class EcController extends Controller
{
    public function index(Request $request)
    {   
        $ues = Ue::all();
        $ecs = Ec::all();
        return view('ec.index', compact('ecs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
        $ues = Ue::all();
        return view('ec.create', compact('ues'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required|string|max:20',
            'nom' => 'required|string|max:50',
            'coefficient' => 'required|numeric',
            'ue_id' => 'required|exists:ues,id',
        ]);
        Ec::create($request->all());
        return redirect()->route('ec.index')->with('success');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $ues = Ue::all();
        $ec = Ec ::find($id) ;
        return view('ec.edit',compact('ues','ec'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id) 
    { 
        $validatedData =$request->validate([
            'code' => 'required|string|max:20',
            'nom' => 'required|string|max:50',
            'coefficient' => 'required|integer',
            'ue_id' => 'required|integer|exists:ues,id',
        ]);
        
        $ec = Ec::find($id);
        $ec->update($validatedData);
        return redirect()->route('ec.index')
            ->with('success', 'EC mise à jour avec succès !');
        
            
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $ecs = Ec::find($id);
        $ecs->delete();
        
        return redirect()->route('ec.index')
      ->with('success', 'EC supprimer avec succès !');
        
    }
}

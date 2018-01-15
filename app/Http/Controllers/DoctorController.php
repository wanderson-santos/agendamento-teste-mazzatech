<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function index()
    {
    	$doctors = \App\Doctor::all();

    	return view('doctors.index', compact('doctors'));
    }

    public function details($id)
    {
    	$doctor = \App\Doctor::findOrFail($id);
    
    	return view('doctors.details', compact('doctor'));
    }

    public function create()
    {
    	return view('doctors.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'crm' => 'required|max:255',
            'birth' => 'required',
            'sex' => 'required',
        ]);

    	$doctor = \App\Doctor::create($request->all());

    	return redirect("/medico/{$doctor->id}/detalhes")->with('success', 'Cadastrado medico com successo.');
    }

    public function edit($id)
    {
    	$doctor = \App\Doctor::findOrFail($id);

    	return view('doctors.edit', compact('doctor'));
    }

    public function update($id, Request $request)
    {
    	$this->validate($request, [
            'name' => 'required|max:255',
            'crm' => 'required|max:255',
            'birth' => 'required',
            'sex' => 'required',
        ]);

    	$doctor = \App\Doctor::findOrFail($id);

    	$doctor->update($request->all());

    	return redirect("/medico/{$doctor->id}/detalhes")->with('success', 'Medico alterado com successo');
    }

    public function delete($id)
    {
    	$doctor = \App\Doctor::findOrFail($id);

    	return view('doctors.delete', compact('doctor'));
    }

    public function destroy($id, Request $request)
    {
    	$doctor = \App\Doctor::findOrFail($id);

        $doctor->deleted_reason = $request->reason;
        $doctor->deleted_user = \Auth::user()->id;
        $doctor->save();

    	$doctor->delete();

    	return redirect('/medico')->with('success', 'Medico deletado com successo');
    }
}

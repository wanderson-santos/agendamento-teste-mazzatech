<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function index()
    {
    	$patients = \App\Patient::all();

    	return view('patients.index', compact('patients'));
    }

    public function details($id)
    {
    	$patient = \App\Patient::findOrFail($id);
    
    	return view('patients.details', compact('patient'));
    }

    public function create()
    {
    	return view('patients.create');
    }

    public function store(Request $request)
    {
    	$this->validate($request, [
            'name' => 'required|max:255',
            'rg' => 'required|max:255',
            'birth' => 'required',
            'sex' => 'required',
        ]);

    	$patient = \App\Patient::create($request->all());

    	return redirect("paciente/{$patient->id}/detalhes")->with('success', 'Cadastrado paciente com successo');
    }

    public function edit($id)
    {
    	$patient = \App\Patient::findOrFail($id);

    	return view('patients.edit', compact('patient'));
    }

    public function update($id, Request $request)
    {
    	$this->validate($request, [
            'name' => 'required|max:255',
            'rg' => 'required|max:255',
            'birth' => 'required',
            'sex' => 'required',
        ]);

    	$patient = \App\Patient::findOrFail($id);

    	$patient->update($request->all());

    	return redirect("paciente/{$patient->id}/detalhes")->with('success', 'Paciente alterado com successo');
    }

    public function delete($id)
    {
    	$patient = \App\Patient::findOrFail($id);

    	return view('patients.delete', compact('patient'));
    }

    public function destroy($id, Request $request)
    {
    	$patient = \App\Patient::findOrFail($id);

        $patient->deleted_reason = $request->reason;
        $patient->deleted_user = \Auth::user()->id;
        $patient->save();

    	$patient->delete();

    	return redirect('/paciente')->with('success', 'Paciente deletado com successo');
    }
}

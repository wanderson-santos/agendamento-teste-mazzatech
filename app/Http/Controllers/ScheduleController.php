<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('type') and $request->type == 'prev') {
    	   $schedules = \App\Schedule::where('start', '<', date('Y-m-d H:i'))
                                        ->orderBy('start', 'desc')
                                        ->get();
            $type = 'prev';
        } elseif ($request->has('type') and $request->type == 'cancel') {
            $schedules = \App\Schedule::onlyTrashed()->get();
            $type = 'cancel';
        } else {
            $schedules = \App\Schedule::where('start', '>', date('Y-m-d H:i'))
                                        ->orderBy('start', 'asc')
                                        ->get();
            $type = 'next';
        }

    	return view('schedules.index', compact('schedules', 'type'));
    }

    public function details($id)
    {
    	$schedule = \App\Schedule::findOrFail($id);
    
    	return view('schedules.details', compact('schedule'));
    }

    public function create()
    {
        $doctors = \App\Doctor::all();
        $patients = \App\Patient::all();

    	return view('schedules.create', compact('doctors', 'patients'));
    }

    public function store(Request $request)
    {
    	$this->validate($request, [
            "title" => 'required',
            "patient_id" => 'required',
            "doctor_id" => 'required',
            "date_start" => 'required',
            "hour_start" => 'required',
            "date_end" => 'required',
            "hour_end" => 'required'
        ]);

        $data = $request->all();
        $data['start'] = \Carbon\Carbon::createFromFormat('Y-m-d H:i', $request->date_start . ' ' . $request->hour_start);
        $data['end'] = \Carbon\Carbon::createFromFormat('Y-m-d H:i', $request->date_end . ' ' . $request->hour_end);

        if ($data['start'] > $data['end']) {
            return redirect()->back()->with('error', 'Data de inicio não pode ser maior que data final.');
        }

        $schedule = \App\Schedule::create($data);

    	return redirect("/agendamento/{$schedule->id}/detalhes")->with('success', 'Cadastrado agendamento com successo');
    }

    public function edit($id)
    {
    	$schedule = \App\Schedule::findOrFail($id);

        $doctors = \App\Doctor::all();
        $patients = \App\Patient::all();

    	return view('schedules.edit', compact('schedule', 'doctors', 'patients'));
    }

    public function update($id, Request $request)
    {
    	$this->validate($request, [
            "title" => 'required',
            "patient_id" => 'required',
            "doctor_id" => 'required',
            "date_start" => 'required',
            "hour_start" => 'required',
            "date_end" => 'required',
            "hour_end" => 'required'
        ]);

    	$schedule = \App\Schedule::findOrFail($id);

        $data = $request->all();
        $data['start'] = \Carbon\Carbon::createFromFormat('Y-m-d H:i', $request->date_start . ' ' . $request->hour_start);
        $data['end'] = \Carbon\Carbon::createFromFormat('Y-m-d H:i', $request->date_end . ' ' . $request->hour_end);

        if ($data['start'] > $data['end']) {
            return redirect()->back()->with('error', 'Data de inicio não pode ser maior que data final.');
        }

    	$schedule->update($data);

    	return redirect("/agendamento/{$schedule->id}/detalhes")->with('success', 'Agendamento alterado com successo');
    }

    public function delete($id)
    {
    	$schedule = \App\Schedule::findOrFail($id);

    	return view('schedules.delete', compact('schedule'));
    }

    public function destroy($id, Request $request)
    {
    	$schedule = \App\Schedule::findOrFail($id);

        $schedule->deleted_reason = $request->reason;
        $schedule->deleted_user = \Auth::user()->id;
        $schedule->save();

    	$schedule->delete();

    	return redirect('/agendamentos')->with('success', 'Agendamento deletado com successo');
    }
}

@extends('layouts.app')
@section('navbar_schedule', 'active')

@section('content')
	<h3 class="title">Editar agendamento</h3>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
	<form action="" method="post">
		{!! csrf_field() !!}

		<div class="form-group col-sm-12">
    		<label for="title">Titulo*</label>
    		<input class="form-control" id="title" type="text" name="title" value="{{ old('title', $schedule->title) }}" required>
		</div>

		<div class="form-group col-sm-12">
    		<label for="description">Descrição</label>
    		<input class="form-control" id="description" type="text" name="deescription" value="{{ old('deescription', $schedule->description) }}">
		</div>

		<div class="form-group col-sm-6">
    		<label for="patient">Paciente*</label>
    		<select name="patient_id" id="patient_id" class="form-control" required>
    			@foreach($patients as $patient)
    				<option value="{{ $patient->id }}" {{ $schedule->patient_id == $patient->id ? 'selected' : '' }}>{{ $patient->name }}</option>
    			@endforeach
    		</select>
		</div>

		<div class="form-group col-sm-6">
    		<label for="doctor">Medico*</label>
    		<select name="doctor_id" id="doctor_id" class="form-control" required>
    			@foreach($doctors as $doctor)
    				<option value="{{ $doctor->id }}" {{ $schedule->doctor_id == $doctor->id ? 'selected' : '' }}>{{ $doctor->name }}</option>
    			@endforeach
    		</select>
		</div>

		<div class="form-group col-sm-3">
    		<label for="date_start">Data Inicio*</label>
    		<input class="form-control" id="date_start" type="date" name="date_start" value="{{ old('date_start', $schedule->start->format('Y-m-d')) }}" required>
		</div>

		<div class="form-group col-sm-3">
    		<label for="hour_start">Hora Inicio*</label>
    		<input class="form-control" id="hour_start" type="time" name="hour_start" value="{{ old('hour_start', $schedule->start->format('H:i')) }}" required>
		</div>

		<div class="form-group col-sm-3">
    		<label for="date_end">Data Final*</label>
    		<input class="form-control" id="date_end" type="date" name="date_end" value="{{ old('date_end', $schedule->end->format('Y-m-d')) }}" required>
		</div>

		<div class="form-group col-sm-3">
    		<label for="hour_end">Hora Final*</label>
    		<input class="form-control" id="hour_end" type="time" name="hour_end" value="{{ old('hour_end', $schedule->end->format('H:i')) }}" required>
		</div>

        <div class="col-sm-12 text-center">
            <button type="submit" class="btn btn-primary">Atualizar</button>
        </div>
	</form>
@endsection
@extends('layouts.app')
@section('navbar_schedule', 'active')

@section('content')
	<div>
		<h3 class="title">Detalhes do agendamento</h3>
		<p><b>Titulo:</b> {{ $schedule->title }}</p>
		<p><b>Descrição:</b> {{ $schedule->description }}</p>
		<p><b>Horario:</b> {{ $schedule->start->format('H:i d/m/Y') }} - {{ $schedule->end->format('H:i d/m/Y') }}</p>
		<p><b>Paciente:</b> <a href="/paciente/{{ $schedule->patient->id }}/detalhes">{{ $schedule->patient->name }} - Cod. {{ $schedule->patient->id }}</a></p>
		<p><b>Medico:</b> <a href="/medico/{{ $schedule->doctor->id }}/detalhes">{{ $schedule->doctor->name }} - Cod. {{ $schedule->doctor->id }}</a></p>
	</div>
@endsection
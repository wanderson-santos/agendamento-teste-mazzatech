@extends('layouts.app')
@section('navbar_doctor', 'active')

@section('content')
	<div>
		<h1>Detalhes do medico</h1>
		<p><b>Nome:</b> {{ $doctor->name }}</p>
		<p><b>CRM:</b> {{ $doctor->crm }}</p>
		<p><b>Especialidades:</b> {{ $doctor->expertise }}</p>
		<p><b>Email:</b> {{ $doctor->email }}</p>
		<p><b>Observação:</b> {{ $doctor->observation }}</p>
		<p><b>Telefone:</b> {{ $doctor->phone }}</p>
		<p><b>Celular:</b> {{ $doctor->cellphone }}</p>
		<p><b>Estado civil:</b> {{ $doctor->civil_status }}</p>
		<p><b>Sexo:</b> {{ $doctor->sex }}</p>
		<p><b>Data de nascimento:</b> {{ $doctor->birth }}</p>
		<p><b>Endereço:</b> {{ $doctor->street }}, {{ $doctor->number }}</p>
		<p><b>Bairro:</b> {{ $doctor->district }}</p>
		<p><b>Estado:</b> {{ $doctor->state }}</p>
		<p><b>CEP:</b> {{ $doctor->cep }}</p>
		<hr>

		@if($doctor->schedules->count())
			<h3>Proximas consultas</h3>
			<table class="dataTables">
				<thead>
					<tr>
						<th>Horario</th>
						<th>Agendamento</th>
						<th>Medico</th>
						<th>Paciente</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					@foreach($doctor->schedules as $schedule)
						<tr>
							<td>{{ $schedule->start->format('H:i d/m/Y') }} - {{ $schedule->end->format('H:i d/m/Y') }}</td>
							<td>{{ $schedule->title }}</td>
							<td>{{ $schedule->doctor->name }} - Cod. {{ $schedule->doctor->id }}</td>
							<td>{{ $schedule->patient->name }} - Cod. {{ $schedule->patient->id }}</td>
							<td>
								<a href="/agendamento/{{ $schedule->id }}/detalhes">
									<span class="glyphicon glyphicon-list-alt" data-toggle="tooltip" title="Detalhes"></span>
								</a>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
			<hr>
		@endif

		@if($doctor->schedulesPrev->count())
			<h3>Ultimas consultas</h3>
			<table class="dataTables">
				<thead>
					<tr>
						<th>Horario</th>
						<th>Agendamento</th>
						<th>Medico</th>
						<th>Paciente</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					@foreach($doctor->schedulesPrev as $schedule)
						<tr>
							<td>{{ $schedule->start->format('H:i d/m/Y') }} - {{ $schedule->end->format('H:i d/m/Y') }}</td>
							<td>{{ $schedule->title }}</td>
							<td>{{ $schedule->doctor->name }} - Cod. {{ $schedule->doctor->id }}</td>
							<td>{{ $schedule->patient->name }} - Cod. {{ $schedule->patient->id }}</td>
							<td>
								<a href="/agendamento/{{ $schedule->id }}/detalhes">
									<span class="glyphicon glyphicon-list-alt" data-toggle="tooltip" title="Detalhes"></span>
								</a>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
			<hr>
		@endif

		@if($doctor->schedulesCancel->count())
			<h3>Consultas canceladas</h3>
			<table class="dataTables">
				<thead>
					<tr>
						<th>Horario</th>
						<th>Agendamento</th>
						<th>Medico</th>
						<th>Paciente</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					@foreach($doctor->schedulesCancel as $schedule)
						<tr>
							<td>{{ $schedule->start->format('H:i d/m/Y') }} - {{ $schedule->end->format('H:i d/m/Y') }}</td>
							<td>{{ $schedule->title }}</td>
							<td>{{ $schedule->doctor->name }} - Cod. {{ $schedule->doctor->id }}</td>
							<td>{{ $schedule->patient->name }} - Cod. {{ $schedule->patient->id }}</td>
							<td>{{ $schedule->deleted_reason }}</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		@endif
	</div>
@endsection
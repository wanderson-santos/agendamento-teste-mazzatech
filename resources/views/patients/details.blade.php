@extends('layouts.app')
@section('navbar_patient', 'active')

@section('content')
	<div>
		<h3 class="title">Detalhes do paciente</h3>
		<p><b>Nome:</b> {{ $patient->name }}</p>
		<p><b>Email:</b> {{ $patient->email }} </p>
		<p><b>Observação:</b> {{ $patient->observation }} </p>
		<p><b>RG:</b> {{ $patient->rg }} </p>
		<p><b>Telefone:</b> {{ $patient->phone }} </p>
		<p><b>Celular:</b> {{ $patient->cellphone }} </p>
		<p><b>Estado civil:</b> {{ $patient->civil_status }} </p>
		<p><b>Sexo:</b> {{ $patient->sex }} </p>
		<p><b>Data de nascimento:</b> {{ $patient->birth }} </p>
		<p><b>Endereço:</b> {{ $patient->street }}, {{ $patient->number }}</p>
		<p><b>Bairro:</b> {{ $patient->district }} </p>
		<p><b>Estado:</b> {{ $patient->state }} </p>
		<p><b>CEP:</b> {{ $patient->cep }} </p>
		<hr>

		@if($patient->schedules->count())
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
					@foreach($patient->schedules as $schedule)
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

		@if($patient->schedulesPrev->count())
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
					@foreach($patient->schedulesPrev as $schedule)
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

		@if($patient->schedulesCancel->count())
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
					@foreach($patient->schedulesCancel as $schedule)
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
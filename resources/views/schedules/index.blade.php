@extends('layouts.app')
@section('navbar_schedule', 'active')

@section('content')
	<div class="row">
		<div class="col-sm-8">
			<h3 class="title">Agendamentos</h3>
		</div>
		<div class="col-sm-4">
			<a href="/agendamento/cadastrar" class="btn btn-primary pull-right">Cadastrar</a>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-2">
			<ul class="nav flex-column nav-pills" role="tablist" aria-orientation="vertical">
				<li @if($type == 'next') class="active" @endif ><a href="/agendamento?type=next">Proximos</a></li>
				<li @if($type == 'prev') class="active" @endif ><a href="/agendamento?type=prev">Passados</a></li>
				<li @if($type == 'cancel') class="active" @endif ><a href="/agendamento?type=cancel">Cancelados</a></li>
			</ul>
		</div>
		<div class="col-sm-10">
			<table class="dataTables">
				<thead>
					<tr>
						<th>Horario</th>
						<th>Agendamento</th>
						<th>Medico</th>
						<th>Paciente</th>
						@if($type == 'cancel')
							<th>Motivo</th>
						@else
							<th>Ações</th>
						@endif
					</tr>
				</thead>
				<tbody>
					@foreach($schedules as $schedule)
						<tr>
							<td>{{ $schedule->start->format('H:i d/m/Y') }} - {{ $schedule->end->format('H:i d/m/Y') }}</td>
							<td>{{ $schedule->title }}</td>
							<td>{{ $schedule->doctor->name }} - Cod. {{ $schedule->doctor->id }}</td>
							<td>{{ $schedule->patient->name }} - Cod. {{ $schedule->patient->id }}</td>
							@if($type == 'cancel')
								<th>{{ $schedule->deleted_reason }}</th>
							@else
								<td>
									<a href="/agendamento/{{ $schedule->id }}/detalhes">
										<span class="glyphicon glyphicon-list-alt" data-toggle="tooltip" title="Detalhes"></span>
									</a>&nbsp;&nbsp;
									<a href="/agendamento/{{ $schedule->id }}/editar">
										<span class="glyphicon glyphicon glyphicon-pencil" data-toggle="tooltip" title="Editar"></span>
									</a>&nbsp;&nbsp;
									<a href="/agendamento/{{ $schedule->id }}/delete">
										<span class="glyphicon glyphicon-trash" data-toggle="tooltip" title="Exluir"></span>
									</a>&nbsp;&nbsp;
								</td>
							@endif
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>	
	</div>
@endsection
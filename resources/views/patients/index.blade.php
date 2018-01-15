@extends('layouts.app')
@section('navbar_patient', 'active')

@section('content')
	<div class="row">
		<div class="col-sm-8">
			<h3 class="title">Pacientes</h3>
		</div>
		<div class="col-sm-4">
			<a href="/paciente/cadastrar" class="btn btn-primary pull-right">Cadastrar</a>
		</div>
	</div>
	<div class="row">
		<table class="dataTables">
			<thead>
				<tr>
					<th>Cod.</th>
					<th>Nome</th>
					<th>Telefone</th>
					<th>Celular</th>
					<th>Ações</th>
				</tr>
			</thead>
			<tbody>
				@foreach($patients as $patient)
					<tr>
						<td>{{ $patient->id }}</td>
						<td>{{ $patient->name }}</td>
						<td>{{ $patient->phone }}</td>
						<td>{{ $patient->cellphone }}</td>
						<td>
							<a href="/paciente/{{ $patient->id }}/detalhes">
								<span class="glyphicon glyphicon-list-alt" data-toggle="tooltip" title="Detalhes"></span>
							</a>&nbsp;&nbsp;
							<a href="/paciente/{{ $patient->id }}/editar">
								<span class="glyphicon glyphicon glyphicon-pencil" data-toggle="tooltip" title="Editar"></span>
							</a>&nbsp;&nbsp;
							<a href="/paciente/{{ $patient->id }}/delete">
								<span class="glyphicon glyphicon-trash" data-toggle="tooltip" title="Exluir"></span>
							</a>&nbsp;&nbsp;
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>		
	</div>
@endsection
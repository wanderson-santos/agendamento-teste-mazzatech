@extends('layouts.app')
@section('navbar_doctor', 'active')

@section('content')
	<div class="row">
		<div class="col-sm-8">
			<h3 class="title">Medicos</h3>
		</div>
		<div class="col-sm-4">
			<a href="/medico/cadastrar" class="btn btn-primary pull-right">Cadastrar</a>
		</div>
	</div>
	<div class="row">
		<table class="dataTables">
			<thead>
				<tr>
					<th>Cod.</th>
					<th>Nome</th>
					<th>Especialidade</th>
					<th>Ações</th>
				</tr>
			</thead>
			<tbody>
				@foreach($doctors as $doctor)
					<tr>
						<td>{{ $doctor->id }}</td>
						<td>{{ $doctor->name }}</td>
						<td>{{ $doctor->expertise }}</td>
						<td>
							<a href="/medico/{{ $doctor->id }}/detalhes">
								<span class="glyphicon glyphicon-list-alt" data-toggle="tooltip" title="Detalhes"></span>
							</a>&nbsp;&nbsp;
							<a href="/medico/{{ $doctor->id }}/editar">
								<span class="glyphicon glyphicon glyphicon-pencil" data-toggle="tooltip" title="Editar"></span>
							</a>&nbsp;&nbsp;
							<a href="/medico/{{ $doctor->id }}/delete">
								<span class="glyphicon glyphicon-trash" data-toggle="tooltip" title="Exluir"></span>
							</a>&nbsp;&nbsp;
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>		
	</div>
@endsection
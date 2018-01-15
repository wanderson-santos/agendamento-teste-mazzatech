@extends('layouts.app')
@section('navbar_users', 'active')

@section('content')
	<div class="row">
		<div class="col-sm-8">
			<h3 class="title">Usuarios</h3>
		</div>
		<div class="col-sm-4">
			<a href="/usuarios/cadastrar" class="btn btn-primary pull-right">Cadastrar</a>
		</div>
	</div>
	<div class="row">
		<table class="dataTables">
			<thead>
				<tr>
					<th>Nome</th>
					<th>Email</th>
					<th>Ações</th>
				</tr>
			</thead>
			<tbody>
				@foreach($users as $user)
					<tr>
						<td>{{ $user->name }}</td>
						<td>{{ $user->email }}</td>
						<td>
							<a href="/usuarios/{{ $user->id }}/detalhes">
								<span class="glyphicon glyphicon-list-alt" data-toggle="tooltip" title="Detalhes"></span>
							</a>&nbsp;&nbsp;
							<a href="/usuarios/{{ $user->id }}/editar">
								<span class="glyphicon glyphicon glyphicon-pencil" data-toggle="tooltip" title="Editar"></span>
							</a>&nbsp;&nbsp;
							<a href="/usuarios/{{ $user->id }}/delete">
								<span class="glyphicon glyphicon-trash" data-toggle="tooltip" title="Exluir"></span>
							</a>&nbsp;&nbsp;
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>		
	</div>
@endsection
@extends('layouts.app')
@section('navbar_users', 'active')

@section('content')
	<h3 class="title">Deletar usuario</h3>
	<form action="" method="post">
		{!! csrf_field() !!}

		<div class="form-group">
    		<label for="reason">Motivo</label>
    		<input class="form-control" id="reason" type="text" name="reason" value="{{ old('reason') }}">
		</div>

		<button type="submit" class="btn btn-danger">Excluir</button>
	</form>
@endsection
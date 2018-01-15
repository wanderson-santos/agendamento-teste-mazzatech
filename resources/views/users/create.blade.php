@extends('layouts.app')
@section('navbar_users', 'active')

@section('content')
	<h3 class="title">Cadastro de usuario</h3>

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

		<div class="form-group">
    		<label for="name">Nome</label>
    		<input class="form-control" id="name" type="text" name="name" value="{{ old('name') }}">
		</div>

		<div class="form-group">
    		<label for="email">Email</label>
    		<input class="form-control" id="email" type="email" name="email" value="{{ old('email') }}">
		</div>

		<div class="form-group">
    		<label for="password">Senha</label>
    		<input class="form-control" id="password" type="password" name="password" value="{{ old('password') }}">
		</div>

		<button type="submit" class="btn btn-primary">Cadastrar</button>
	</form>
@endsection
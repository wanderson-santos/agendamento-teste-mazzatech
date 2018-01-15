@extends('layouts.app')
@section('navbar_users', 'active')

@section('content')
	<div>
		<h3 class="title">Detalhes do usuario</h3>
		<p><b>Nome:</b> {{ $user->name }}</p>
		<p><b>Email:</b> {{ $user->email }}</p>
	</div>
@endsection
@extends('layouts.app')

@section('content')
	<h3 class="title">Alterar senha</h3>

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

        <div class="form-group col-sm-12">
            <label for="password">Nova senha*</label>
            <input type="password" name="password" id="password" class="form-control" placeholder="Nova senha" required>
        </div>

        <div class="form-group col-sm-12">
            <label for="password_confirmation">Confirme a nova senha*</label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Confirme a senha" required>
        </div>
        
        <div class="col-sm-12 text-center">
            <button type="submit" class="btn btn-primary">Salvar</button>  
        </div>
	</form>
@endsection
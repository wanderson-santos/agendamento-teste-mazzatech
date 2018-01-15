@extends('layouts.app')
@section('navbar_patient', 'active')

@section('content')
	<h3 class="title">Editar de paciente</h3>

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

		<div class="form-group col-sm-6">
    		<label for="name">Nome*</label>
    		<input class="form-control" id="name" type="text" name="name" value="{{ old('name', $patient->name) }}" required>
		</div>

		<div class="form-group col-sm-6">
    		<label for="email">Email</label>
    		<input class="form-control" id="email" type="email" name="email" value="{{ old('email', $patient->email) }}">
		</div>

		<div class="form-group col-sm-4">
    		<label for="rg">RG*</label>
    		<input class="form-control" id="rg" type="text" name="rg" value="{{ old('rg', $patient->rg) }}" required>
		</div>

		<div class="form-group col-sm-4">
    		<label for="phone">Telefone</label>
    		<input class="form-control" id="phone" type="text" name="phone" value="{{ old('phone', $patient->phone) }}">
		</div>

		<div class="form-group col-sm-4">
    		<label for="cellphone">Celular</label>
    		<input class="form-control" id="cellphone" type="text" name="cellphone" value="{{ old('cellphone', $patient->cellphone) }}">
		</div>

		<div class="form-group col-sm-4">
    		<label for="civil_status">Estado Civil</label>
    		<select name="civil_status" id="civil_status" class="form-control">
    			<option value="solteiro">Solteiro</option>
    			<option value="casado">Casado</option>
    		</select>
		</div>

		<div class="form-group col-sm-4">
    		<label for="sex">Sexo*</label>
    		<select name="sex" id="sex" class="form-control" required>
    			<option value="m">Masculino</option>
    			<option value="f">Feminino</option>
    		</select>
		</div>

		<div class="form-group col-sm-4">
    		<label for="birth">Nascimento*</label>
    		<input class="form-control" id="birth" type="date" name="birth" value="{{ old('birth', $patient->birth) }}" required>
		</div>

		<div class="form-group col-sm-12">
			<label for="observation">Observação</label>
			<textarea name="observation" id="observation" class="form-control">{{ old('observation', $patient->observation) }}</textarea>
		</div>

		<div class="col-sm-12">
			<h4>Endereço</h4>
		</div>

		<div class="form-group col-sm-6">
    		<label for="street">Rua</label>
    		<input class="form-control" id="street" type="text" name="street" value="{{ old('street', $patient->street) }}">
		</div>

		<div class="form-group col-sm-3">
    		<label for="number">Numero</label>
    		<input class="form-control" id="number" type="text" name="number" value="{{ old('number', $patient->number) }}">
		</div>

		<div class="form-group col-sm-3">
    		<label for="district">Bairro</label>
    		<input class="form-control" id="district" type="text" name="district" value="{{ old('district', $patient->district) }}">
		</div>

		<div class="form-group col-sm-4">
    		<label for="city">Cidade</label>
    		<input class="form-control" id="city" type="text" name="city" value="{{ old('city', $patient->city) }}">
		</div>

		<div class="form-group col-sm-4">
    		<label for="cep">CEP</label>
    		<input class="form-control" id="cep" type="text" name="cep" value="{{ old('cep', $patient->cep) }}">
		</div>

		<div class="form-group col-sm-4">
    		<label for="state">Estado</label>
    		<select class="form-control" id="state" type="text" name="state">
				<option value="AC" {{ $patient->state == 'AC' ? 'selected' : '' }}>Acre</option>
				<option value="AL" {{ $patient->state == 'AL' ? 'selected' : '' }}>Alagoas</option>
				<option value="AP" {{ $patient->state == 'AP' ? 'selected' : '' }}>Amapá</option>
				<option value="AM" {{ $patient->state == 'AM' ? 'selected' : '' }}>Amazonas</option>
				<option value="BA" {{ $patient->state == 'BA' ? 'selected' : '' }}>Bahia</option>
				<option value="CE" {{ $patient->state == 'CE' ? 'selected' : '' }}>Ceará</option>
				<option value="DF" {{ $patient->state == 'DF' ? 'selected' : '' }}>Distrito Federal</option>
				<option value="ES" {{ $patient->state == 'ES' ? 'selected' : '' }}>Espírito Santo</option>
				<option value="GO" {{ $patient->state == 'GO' ? 'selected' : '' }}>Goiás</option>
				<option value="MA" {{ $patient->state == 'MA' ? 'selected' : '' }}>Maranhão</option>
				<option value="MT" {{ $patient->state == 'MT' ? 'selected' : '' }}>Mato Grosso</option>
				<option value="MS" {{ $patient->state == 'MS' ? 'selected' : '' }}>Mato Grosso do Sul</option>
				<option value="MG" {{ $patient->state == 'MG' ? 'selected' : '' }}>Minas Gerais</option>
				<option value="PA" {{ $patient->state == 'PA' ? 'selected' : '' }}>Pará</option>
				<option value="PB" {{ $patient->state == 'PB' ? 'selected' : '' }}>Paraíba</option>
				<option value="PR" {{ $patient->state == 'PR' ? 'selected' : '' }}>Paraná</option>
				<option value="PE" {{ $patient->state == 'PE' ? 'selected' : '' }}>Pernambuco</option>
				<option value="PI" {{ $patient->state == 'PI' ? 'selected' : '' }}>Piauí</option>
				<option value="RJ" {{ $patient->state == 'RJ' ? 'selected' : '' }}>Rio de Janeiro</option>
				<option value="RN" {{ $patient->state == 'RN' ? 'selected' : '' }}>Rio Grande do Norte</option>
				<option value="RS" {{ $patient->state == 'RS' ? 'selected' : '' }}>Rio Grande do Sul</option>
				<option value="RO" {{ $patient->state == 'RO' ? 'selected' : '' }}>Rondônia</option>
				<option value="RR" {{ $patient->state == 'RR' ? 'selected' : '' }}>Roraima</option>
				<option value="SC" {{ $patient->state == 'SC' ? 'selected' : '' }}>Santa Catarina</option>
				<option value="SP" {{ $patient->state == 'SP' ? 'selected' : '' }}>São Paulo</option>
				<option value="SE" {{ $patient->state == 'SE' ? 'selected' : '' }}>Sergipe</option>
				<option value="TO" {{ $patient->state == 'TO' ? 'selected' : '' }}>Tocantins</option>
			</select>
		</div>

		<div class="col-sm-12 text-center">
			<button type="submit" class="btn btn-primary">Atualizar</button>
		</div>
	</form>
@endsection
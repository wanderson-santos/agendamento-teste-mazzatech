@extends('layouts.app')
@section('navbar_doctor', 'active')

@section('content')
	<h3 class="title">Editar medico</h3>

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
    		<input class="form-control" id="name" type="text" name="name" value="{{ old('name', $doctor->name) }}" required>
		</div>

		<div class="form-group col-sm-6">
    		<label for="email">Email</label>
    		<input class="form-control" id="email" type="email" name="email" value="{{ old('email', $doctor->email) }}">
		</div>

		<div class="form-group col-sm-4">
    		<label for="crm">CRM*</label>
    		<input class="form-control" id="crm" type="text" name="crm" value="{{ old('crm', $doctor->crm) }}" required>
		</div>

		<div class="form-group col-sm-4">
    		<label for="phone">Telefone</label>
    		<input class="form-control" id="phone" type="text" name="phone" value="{{ old('phone', $doctor->phone) }}">
		</div>

		<div class="form-group col-sm-4">
    		<label for="cellphone">Celular</label>
    		<input class="form-control" id="cellphone" type="text" name="cellphone" value="{{ old('cellphone', $doctor->cellphone) }}">
		</div>

		<div class="form-group col-sm-4">
    		<label for="civil_status">Estado Civil</label>
    		<select name="civil_status" id="civil_status" class="form-control">
    			<option value="solteiro" {{ $doctor->civil_status == 'solteiro' ? 'selected' : '' }}>Solteiro</option>
    			<option value="casado" {{ $doctor->civil_status == 'casado' ? 'selected' : '' }}>Casado</option>
    		</select>
		</div>

		<div class="form-group col-sm-4">
    		<label for="sex">Sexo*</label>
    		<select name="sex" id="sex" class="form-control" required>
    			<option value="F" {{ $doctor->sex == 'M' ? 'selected' : '' }}>Masculino</option>
    			<option value="M" {{ $doctor->sex == 'F' ? 'selected' : '' }}>Feminino</option>
    		</select>
		</div>

		<div class="form-group col-sm-4">
    		<label for="birth">Nascimento*</label>
    		<input class="form-control" id="birth" type="date" name="birth" value="{{ old('birth', $doctor->birth) }}" required>
		</div>

		<div class="form-group col-sm-12">
			<label for="observation">Observação</label>
			<textarea name="observation" id="observation" class="form-control">{{ old('observation', $doctor->observation) }}</textarea>
		</div>

		<div class="form-group col-sm-12">
			<label for="observation">Especialidades (EX. Pediatria, Geriatria, Ortopedia)</label>
			<input class="form-control" id="expertise" type="text" name="expertise" value="{{ old('expertise', $doctor->expertise) }}">
		</div>

		<div class="col-sm-12">
			<h4>Endereço</h4>
		</div>

		<div class="form-group col-sm-6">
    		<label for="street">Rua</label>
    		<input class="form-control" id="street" type="text" name="street" value="{{ old('street', $doctor->street) }}">
		</div>

		<div class="form-group col-sm-3">
    		<label for="number">Numero</label>
    		<input class="form-control" id="number" type="text" name="number" value="{{ old('number', $doctor->number) }}">
		</div>

		<div class="form-group col-sm-3">
    		<label for="district">Bairro</label>
    		<input class="form-control" id="district" type="text" name="district" value="{{ old('district', $doctor->district) }}">
		</div>

		<div class="form-group col-sm-4">
    		<label for="city">Cidade</label>
    		<input class="form-control" id="city" type="text" name="city" value="{{ old('city', $doctor->city) }}">
		</div>

		<div class="form-group col-sm-4">
    		<label for="cep">CEP</label>
    		<input class="form-control" id="cep" type="text" name="cep" value="{{ old('cep', $doctor->cep) }}">
		</div>

		<div class="form-group col-sm-4">
    		<label for="state">Estado</label>
    		<select class="form-control" id="state" type="text" name="state">
				<option value="AC" {{ $doctor->state == 'AC' ? 'selected' : '' }}>Acre</option>
				<option value="AL" {{ $doctor->state == 'AL' ? 'selected' : '' }}>Alagoas</option>
				<option value="AP" {{ $doctor->state == 'AP' ? 'selected' : '' }}>Amapá</option>
				<option value="AM" {{ $doctor->state == 'AM' ? 'selected' : '' }}>Amazonas</option>
				<option value="BA" {{ $doctor->state == 'BA' ? 'selected' : '' }}>Bahia</option>
				<option value="CE" {{ $doctor->state == 'CE' ? 'selected' : '' }}>Ceará</option>
				<option value="DF" {{ $doctor->state == 'DF' ? 'selected' : '' }}>Distrito Federal</option>
				<option value="ES" {{ $doctor->state == 'ES' ? 'selected' : '' }}>Espírito Santo</option>
				<option value="GO" {{ $doctor->state == 'GO' ? 'selected' : '' }}>Goiás</option>
				<option value="MA" {{ $doctor->state == 'MA' ? 'selected' : '' }}>Maranhão</option>
				<option value="MT" {{ $doctor->state == 'MT' ? 'selected' : '' }}>Mato Grosso</option>
				<option value="MS" {{ $doctor->state == 'MS' ? 'selected' : '' }}>Mato Grosso do Sul</option>
				<option value="MG" {{ $doctor->state == 'MG' ? 'selected' : '' }}>Minas Gerais</option>
				<option value="PA" {{ $doctor->state == 'PA' ? 'selected' : '' }}>Pará</option>
				<option value="PB" {{ $doctor->state == 'PB' ? 'selected' : '' }}>Paraíba</option>
				<option value="PR" {{ $doctor->state == 'PR' ? 'selected' : '' }}>Paraná</option>
				<option value="PE" {{ $doctor->state == 'PE' ? 'selected' : '' }}>Pernambuco</option>
				<option value="PI" {{ $doctor->state == 'PI' ? 'selected' : '' }}>Piauí</option>
				<option value="RJ" {{ $doctor->state == 'RJ' ? 'selected' : '' }}>Rio de Janeiro</option>
				<option value="RN" {{ $doctor->state == 'RN' ? 'selected' : '' }}>Rio Grande do Norte</option>
				<option value="RS" {{ $doctor->state == 'RS' ? 'selected' : '' }}>Rio Grande do Sul</option>
				<option value="RO" {{ $doctor->state == 'RO' ? 'selected' : '' }}>Rondônia</option>
				<option value="RR" {{ $doctor->state == 'RR' ? 'selected' : '' }}>Roraima</option>
				<option value="SC" {{ $doctor->state == 'SC' ? 'selected' : '' }}>Santa Catarina</option>
				<option value="SP" {{ $doctor->state == 'SP' ? 'selected' : '' }}>São Paulo</option>
				<option value="SE" {{ $doctor->state == 'SE' ? 'selected' : '' }}>Sergipe</option>
				<option value="TO" {{ $doctor->state == 'TO' ? 'selected' : '' }}>Tocantins</option>
			</select>
		</div>

		<div class="col-sm-12 text-center">
			<button type="submit" class="btn btn-primary">Atualizar</button>
		</div>
	</form>
@endsection
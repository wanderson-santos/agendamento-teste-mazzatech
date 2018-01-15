@extends('layouts.app')
@section('navbar_doctor', 'active')

@section('content')
	<h3 class="title">Cadastro de medico</h3>

	@if ($errors->any())
	    <div class="alert alert-danger">
	        <ul>
	            @foreach ($errors->all() as $error)
	                <li>{{ $error }}</li>
	            @endforeach
	        </ul>
	    </div>
	@endif

	<form action="/medico/cadastrar" method="post">
		{!! csrf_field() !!}

		<div class="form-group col-sm-6">
    		<label for="name">Nome*</label>
    		<input class="form-control" id="name" type="text" name="name" value="{{ old('name') }}" required>
		</div>

		<div class="form-group col-sm-6">
    		<label for="email">Email</label>
    		<input class="form-control" id="email" type="email" name="email" value="{{ old('email') }}">
		</div>

		<div class="form-group col-sm-4">
    		<label for="crm">CRM*</label>
    		<input class="form-control" id="crm" type="text" name="crm" value="{{ old('crm') }}" required>
		</div>

		<div class="form-group col-sm-4">
    		<label for="phone">Telefone</label>
    		<input class="form-control" id="phone" type="text" name="phone" value="{{ old('phone') }}">
		</div>

		<div class="form-group col-sm-4">
    		<label for="cellphone">Celular</label>
    		<input class="form-control" id="cellphone" type="text" name="cellphone" value="{{ old('cellphone') }}">
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
    		<input class="form-control" id="birth" type="date" name="birth" value="{{ old('birth') }}" required>
		</div>

		<div class="form-group col-sm-12">
			<label for="observation">Observação</label>
			<textarea name="observation" id="observation" class="form-control">{{ old('observation') }}</textarea>
		</div>

		<div class="form-group col-sm-12">
			<label for="expertise">Especialidades (EX. Pediatria, Geriatria, Ortopedia)</label>
			<input class="form-control" id="expertise" type="text" name="expertise" value="{{ old('expertise') }}">
		</div>

		<div class="col-sm-12">
			<h4>Endereço</h4>
		</div>

		<div class="form-group col-sm-6">
    		<label for="street">Rua</label>
    		<input class="form-control" id="street" type="text" name="street" value="{{ old('street') }}">
		</div>

		<div class="form-group col-sm-3">
    		<label for="number">Numero</label>
    		<input class="form-control" id="number" type="text" name="number" value="{{ old('number') }}">
		</div>

		<div class="form-group col-sm-3">
    		<label for="district">Bairro</label>
    		<input class="form-control" id="district" type="text" name="district" value="{{ old('district') }}">
		</div>

		<div class="form-group col-sm-4">
    		<label for="city">Cidade</label>
    		<input class="form-control" id="city" type="text" name="state" value="{{ old('state') }}">
		</div>

		<div class="form-group col-sm-4">
    		<label for="cep">CEP</label>
    		<input class="form-control" id="cep" type="text" name="cep" value="{{ old('cep') }}">
		</div>

		<div class="form-group col-sm-4">
    		<label for="state">Estado</label>
    		<select class="form-control" id="state" type="text" name="state">
				<option value="AC">Acre</option>
				<option value="AL">Alagoas</option>
				<option value="AP">Amapá</option>
				<option value="AM">Amazonas</option>
				<option value="BA">Bahia</option>
				<option value="CE">Ceará</option>
				<option value="DF">Distrito Federal</option>
				<option value="ES">Espírito Santo</option>
				<option value="GO">Goiás</option>
				<option value="MA">Maranhão</option>
				<option value="MT">Mato Grosso</option>
				<option value="MS">Mato Grosso do Sul</option>
				<option value="MG">Minas Gerais</option>
				<option value="PA">Pará</option>
				<option value="PB">Paraíba</option>
				<option value="PR">Paraná</option>
				<option value="PE">Pernambuco</option>
				<option value="PI">Piauí</option>
				<option value="RJ">Rio de Janeiro</option>
				<option value="RN">Rio Grande do Norte</option>
				<option value="RS">Rio Grande do Sul</option>
				<option value="RO">Rondônia</option>
				<option value="RR">Roraima</option>
				<option value="SC">Santa Catarina</option>
				<option value="SP">São Paulo</option>
				<option value="SE">Sergipe</option>
				<option value="TO">Tocantins</option>
			</select>
		</div>

		<div class="col-sm-12 text-center">
			<button type="submit" class="btn btn-primary">Cadastrar</button>
		</div>
	</form>
@endsection
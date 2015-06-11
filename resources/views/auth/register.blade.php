@extends('app')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Registro de nuevo usuario</div>
				<div class="panel-body">
					@if (count($errors) > 0)
						<div class="alert alert-danger">
							<strong>UPS! </strong> Hay problemas con los datos ingresados por favor verifique.<br><br>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif

					<form id="register_form" class="form-horizontal" role="form" method="POST" action="{{ url('auth/register') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

						<div class="form-group">
							<label class="col-md-4 control-label">Nombre</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}" >
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Correo</label>
							<div class="col-md-6">
								<input type="email" class="form-control" name="email" id="email" value="{{ old('email') }}" >
							</div>
						</div>
                                                
                                                <div class="form-group">
							<label class="col-md-4 control-label">Número de identificación</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="num_id" id="num_id" value="{{ old('num_id') }}" >
							</div>
						</div>
                                               
                        <div class="form-group">
							<label class="col-md-4 control-label">Tipo de usuario</label>
							<div class="col-md-6">
                                <select name="user_type" id="user_type">
                                    <option value="User">Profesional</option>
                                    <option value="Provider">Proveedor</option>
                                    <option value="Admin">Administrador</option>
                                    <option value="Super Admin">Super Admin</option>  
                                </select>
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Clave</label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password" id="password">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Confirme su clave</label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password_confirmation" id="password_confirmation">
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-green" id="submit">Registrar</button>						
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

@stop

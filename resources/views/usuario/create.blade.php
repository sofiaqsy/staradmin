@extends('layouts.admin')
@section('contenido')
<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="col-md-12" role="" data-example-id="togglable-tabs">
				<ul id="myTab" class="nav nav-tabs " role="tablist">
					<li ><a href="/usuario">Usuarios</a>
					</li>
					<li class="active"><a >Nuevo usuario</a>
					</li>
				</ul>
			</div>
</div>

<div class="col-md-12 col-sm-12 col-xs-12">
  <br>
  @if(count($errors)>0)
    <div class="alert alert-danger alert-dismissible fade in" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
      <strong>ERROR</strong>
      @foreach ($errors->all() as $error)
      {{$error}}
      @endforeach
    </div>
  @endif

  <div class="col-md-3 col-sm-3 col-xs-12">
INFORMACION GENERAL DE USUARIO
  </div>
  <div class="col-md-9 col-sm-9 col-xs-12">
    <br>
		{!! Form::open(array('url'=>'usuario','method'=>'POST','autocomplete'=>'off')) !!}
		{{Form::token()}}
    <div class="x_panel">
      <div class="x_content">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
              <label class="control-label" for="nombre">Nombre<span class="required">*</span>
              </label>
							<input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
							@if ($errors->has('name'))
									<span class="help-block">
											<strong>{{ $errors->first('name') }}</strong>
									</span>
							@endif
						</div>
           <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
						 <label for="direccion">Email</label>
		 				<input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
						@if ($errors->has('email'))
								<span class="help-block">
										<strong>{{ $errors->first('email') }}</strong>
								</span>
						@endif
        	 </div>
					 <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
						 <label for="tipo_documento">Password</label>
						 <input id="password" type="password" class="form-control" name="password" required>
 						@if ($errors->has('password'))
 								<span class="help-block">
 										<strong>{{ $errors->first('password') }}</strong>
 								</span>
 						@endif
					</div>
					<div class="form-group">
						<label for="num_documento">Repita password</label>
						<input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
					</div>
      </div>
    </div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" >
			<div class="form-group">
				<button class="btn btn-success" type="submit">Guardar</button>
				<button class="btn btn-primary" type="reset">Cancelar</button>
			</div>
		</div>
      {!!Form::close()!!}
  </div>
	</div>
</div>
@endsection

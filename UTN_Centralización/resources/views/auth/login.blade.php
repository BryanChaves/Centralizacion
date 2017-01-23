@extends('app')

@section('title')
Iniciar sesión

@endsection

@section('content')
<div  class="container">
	 <div class="content">
		<div id="login-form" >
		    <div class="row">
		    	@if (count($errors) > 0)
						<div id="error"class="alert alert-danger">
							<strong>Whoops!</strong> Hubo algun problema.<br>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif
		        <div class="col-sm-6 col-md-4 col-md-offset-4">
		            
		            <div class="account-wall">
		               	<h1 id="login-title" >Sistema  de centralización de  información para  la Gestión del Recurso Hídrico</h1>
		                <form class="form-signin" role="form" method="POST" action="/auth/login" >
		                	<input type="hidden" name="_token" value="{{ csrf_token() }}">
		                	<div class="form-group">
		                		{!! Form::text('email',null,['class'=>'form-control','id'=>'icon','type'=>'email','placeholder'=>'Correo electrónico ']) !!}
		                		
							</div>
							<div class="form-group">
							{!! Form::password('password',['class'=>'form-control','id'=>'icon','placeholder'=>'Contraseña ']) !!}
							
		    				</div>
		    				
		                	<button class="btn btn-lg btn-primary btn-block" type="submit">
		                    Inicio de sesión</button>
		                </form>
		            </div>
		        </div>
		    </div>

		</div>
	</div>
</div>
@endsection

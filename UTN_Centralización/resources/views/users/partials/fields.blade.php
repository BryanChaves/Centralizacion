<div class="form-group">
  <label class="control-label">{{trans('validation.attributes.name')}}</label>
  {!! Form::text('name',null,['class'=>'text','placeholder'=>'Por favor introduzca el nombre']) !!}
</div>

<div class="form-group">
  <label class="control-label">{{trans('validation.attributes.last_name_1')}}</label>
  {!! Form::text('last_name_1',null,['class'=>'text','placeholder'=>'Por favor introduzca el primer apellido']) !!}
</div>

<div class="form-group">
  <label class="control-label">{{trans('validation.attributes.last_name_2')}}</label>
  {!! Form::text('last_name_2',null,['class'=>'text','placeholder'=>'Por favor introduzca el segundo apellido']) !!}
</div>

<div class="form-group">
  <label class="control-label">{{trans('validation.attributes.ID_number')}}</label>
  @if(Auth::user()->getRol()=="Gestor")
  {!! Form::text('ID_number',null,['class'=>'text','placeholder'=>'Por favor introduzca la cédula ','disabled' => 'false']) !!}
  @else
  {!! Form::text('ID_number',null,['class'=>'text','placeholder'=>'Por favor introduzca la cédula ']) !!}
  @endif
</div>

<div class="form-group">
  <label class="control-label">{{trans('validation.attributes.telephone_number')}}</label>
  {!! Form::text('telephone_number',null,['class'=>'text','placeholder'=>'Por favor introduzca el número de teléfono ']) !!}
</div>

<div class="form-group">
  <label class="control-label">{{trans('validation.attributes.email')}}</label>
  @if(Auth::user()->getRol()=="Gestor")
  {!! Form::text('email',null,['class'=>'text','type'=>'email','placeholder'=>'Por favor introduzca el correo electrónico','disabled' => 'false']) !!}
  @else
  {!! Form::text('email',null,['class'=>'text','type'=>'email','placeholder'=>'Por favor introduzca el correo electrónico']) !!}
  @endif
</div>

<div class="form-group">
  <label class="control-label">{{trans('validation.attributes.password')}}</label>
  {!! Form::password('password',['class'=>'text','placeholder'=>'Por favor introduzca la contraseña ']) !!}
</div>
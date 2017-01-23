<div class="form-group">
  <label class="control-label">{{trans('validation.attributes.name')}}</label>
  {!! Form::text('name',null,['class'=>'text','placeholder'=>'Por favor introduzca el nombre']) !!}
</div>
<div class="form-group">
  <label class="control-label">{{trans('validation.attributes.address')}}</label>
  {!! Form::text('address',null,['class'=>'text','placeholder'=>'Por favor introduzca la dirección ']) !!}
</div>
<div class="form-group">
  <label class="control-label">{{trans('validation.attributes.email')}}</label>
  {!! Form::text('email',null,['class'=>'text','type'=>'email','placeholder'=>'Por favor introduzca el correo electrónico ']) !!}
</div>
<div class="form-group">
  <label class="control-label">{{trans('validation.attributes.telephone_number')}}</label>
  {!! Form::text('telephone_number',null,['class'=>'text','placeholder'=>'Por favor introduzca el número de teléfono ']) !!}
</div>
<div class="form-group">
  <label class="control-label">{{trans('validation.attributes.description')}}</label>
  {!! Form::textArea('description',null,['class'=>'text','placeholder'=>'Por favor introduzca la descripción']) !!}
</div>
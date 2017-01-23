<div class="form-group">
  <label class="control-label">{{trans('validation.attributes.label')}}</label>
  {!! Form::text('label',null,['class'=>'form-control','placeholder'=>'Por favor introduzca la etiqueta']) !!}
</div>
<div class="form-group">
	<label class="control-label">{{trans('validation.attributes.level')}}</label>
    {!! Form::select('level',[' '=>'Seleccione un nivel','1'=>'Nivel 1','2'=>'Nivel 2','3'=>'Nivel 3','4'=>'Nivel 4'],null,['class'=>'form-control']) !!}
</div>
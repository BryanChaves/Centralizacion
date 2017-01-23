<div class="form-group">
  <label class="control-label">{{trans('validation.attributes.parameter')}}</label>
  {!! Form::text('parameter',null,['class'=>'text','placeholder'=>'Por favor introduzca el nombre del parámetro']) !!}
</div>

<div class="form-group">
  <label class="control-label">{{trans('validation.attributes.unit')}}</label>
  {!! Form::text('unit',null,['class'=>'text','placeholder'=>'Por favor introduzca la unidad']) !!}
</div>
<div class="form-group">
  <label class="control-label">{{trans('validation.attributes.recommended_value')}}</label>
  {!! Form::text('recommended_value',null,['class'=>'text','placeholder'=>'Por favor introduzca el valor recomendado']) !!}
</div>
<div class="form-group">
  <label class="control-label">{{trans('validation.attributes.maximum_allowable')}}</label>
  {!! Form::text('maximum_allowable',null,['class'=>'text','placeholder'=>'Por favor introduzca el valor máximo admisible']) !!}
</div>
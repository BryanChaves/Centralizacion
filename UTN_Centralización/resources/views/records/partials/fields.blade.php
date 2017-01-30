<div class="form-group">
  <label class="control-label">{{trans('validation.attributes.analysis_type')}}</label>
    {!! Form::select('analysis_type',[' '=>'Seleccione el tipo','Microbiológicos'=>'Microbiológicos ','Físico-químicos'=>'Físico-químicos' ],null,['class'=>'form-control']) !!}
</div>

<div class="form-group">
  <label class="control-label">{{trans('validation.attributes.value')}}</label>
  {!! Form::text('value',null,['class'=>'form-control','placeholder'=>'Por favor introduzca el valor']) !!}
</div>

<div class="form-group">
  <label class="control-label">{{trans('validation.attributes.project_name')}}</label>
  {!! Form::text('project_name',null,['class'=>'text','placeholder'=>'Por favor introduzca el nombre']) !!}
</div>
<div class="form-group">
  <label class="control-label">{{trans('validation.attributes.viability_number')}}</label>
  {!! Form::text('viability_number',null,['class'=>'text','placeholder'=>'Por favor introduzca el número de viabilidad']) !!}
</div>
<div class="form-group">
  <label class="control-label">{{trans('validation.attributes.setena_administrative_record')}}</label>
  {!! Form::text('setena_administrative_record',null,['class'=>'text','placeholder'=>'Por favor introduzca el expediente']) !!}
</div>
<div class="form-group">
  <label class="control-label">{{trans('validation.attributes.cadrastal_plane_number')}}</label>
  {!! Form::text('cadrastal_plane_number',null,['class'=>'text','placeholder'=>'Por favor introduzca el número de plano']) !!}
</div>
<div class="form-group">
  <label class="control-label">{{trans('validation.attributes.property_number')}}</label>
  {!! Form::text('property_number',null,['class'=>'text','placeholder'=>'Por favor introduzca el número de finca']) !!}
</div>
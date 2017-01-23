<div class="form-group">
  <label class="control-label">{{trans('validation.attributes.owner')}}</label>
  {!! Form::text('owner',null,['class'=>'text','placeholder'=>'Por favor introduzca el nombre del propietario']) !!}
</div>
<div class="form-group">
  <label class="control-label">{{trans('validation.attributes.property_number')}}</label>
  {!! Form::text('property_number',null,['class'=>'text','placeholder'=>'Por favor introduzca el número de finca']) !!}
</div>
<div class="form-group">
  <label class="control-label">{{trans('validation.attributes.water_tapping_point')}}</label>
  {!! Form::text('water_tapping_point',null,['class'=>'text','placeholder'=>'Por favor introduzca el punto de toma ']) !!}
</div>
<div class="form-group">
  <label class="control-label">{{trans('validation.attributes.authorized_use')}}</label>
  {!! Form::text('authorized_use',null,['class'=>'text','placeholder'=>'Por favor introduzca el uso']) !!}
</div>
<div class="form-group">
  <label class="control-label">{{trans('validation.attributes.assigned_flow')}}</label>
  {!! Form::text('assigned_flow',null,['class'=>'text','placeholder'=>'Por favor introduzca el caudal asignado']) !!}
</div>
<div class="form-group">
  <label class="control-label">{{trans('validation.attributes.capacity_flow')}}</label>
  {!! Form::text('capacity_flow',null,['class'=>'text','placeholder'=>'Por favor introduzca el caudal aforado']) !!}
</div>
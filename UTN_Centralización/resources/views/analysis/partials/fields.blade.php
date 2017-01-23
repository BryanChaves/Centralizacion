
<div class="form-group">
  <label class="control-label">{{trans('validation.attributes.laboratory_name')}}</label>
  {!! Form::text('laboratory_name',null,['class'=>'text','placeholder'=>'Por favor introduzca el nombre del laboratorio']) !!}
</div>
<div class="form-group">
  <label class="control-label">{{trans('validation.attributes.date')}}</label>
  <div class='input-group date' id='datetimepicker1'>
    <input type='text' name='date' class='text' id='date3' readonly />
    <span class="input-group-addon">
      <span class="glyphicon glyphicon-calendar"></span>
    </span>
  </div>
</div>
<div class="form-group">
  <label class="control-label">{{trans('validation.attributes.report_number')}}</label>
  {!! Form::text('report_number',null,['class'=>'text','placeholder'=>'Por favor introduzca el número de reporte']) !!}
</div>
<div class="form-group">
     <label for=""><label class="text">{{trans('validation.attributes.upload_file')}}</label></label>
     {!! Form::file('path',[''=>'']) !!}  
</div>


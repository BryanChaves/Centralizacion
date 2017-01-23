<div class="form-group">
  <label class="control-label">{{trans('validation.attributes.capacity')}}</label>
  {!! Form::text('capacity',null,['class'=>'text','placeholder'=>'Por favor introduzca el aforo']) !!}
</div>
<div class="form-group">
  <label class="control-label">{{trans('validation.attributes.method')}}</label>
  {!! Form::select('method',[' '=>'Seleccione el método','Volumétrico'=>'Volumétrico','Dinámica de fluidos'=>'Dinámica de fluidos'],null,['class'=>'text']) !!}
</div>
<div class="form-group">
  <label class="control-label">{{trans('validation.attributes.observations')}}</label>
  {!! Form::textArea('observations',null,['class'=>'text','placeholder'=>'Por favor introduzca el aforo']) !!}
</div>
@if(Auth::user()->getRol()!="Gestor")
<div class="form-group">
  <label class="control-label">{{trans('validation.attributes.date')}}</label>
  <div class='input-group date' id='datetimepicker1'>
    <input type='text' name='date' class='text' id='date4' readonly />
    <span class="input-group-addon">
      <span class="glyphicon glyphicon-calendar"></span>
    </span>
  </div>
</div>
@endif
<div class="form-group">
  <label class="control-label">{{trans('validation.attributes.weather')}}</label>
  {!! Form::select('weather',[' '=>'Seleccione el clima','Soleado'=>'Soleado','Lluvioso'=>'Lluvioso','Nublado'=>'Nublado'],null,['class'=>'text']) !!}
</div>

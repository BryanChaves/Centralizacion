<div class="form-group">
  <label class="control-label">{{trans('validation.attributes.watersource_name')}}</label>
  {!! Form::text('watersource_name',null,['class'=>'text','placeholder'=>'Por favor introduzca el nombre de la naciente']) !!}
</div>
<div class="form-group">
  <label class="control-label">{{trans('validation.attributes.address')}}</label>
  {!! Form::text('address',null,['class'=>'text','placeholder'=>'Por favor introduzca la dirección']) !!}
</div>
<div class="form-group">
  <label class="control-label">{{trans('validation.attributes.coordinate_CRTM05')}}</label>
  {!! Form::text('coordinate_CRTM05',null,['class'=>'text','placeholder'=>'Por favor introduzca las coordenadas']) !!}
</div>


<div class="form-group">
  <label class="control-label">{{trans('validation.attributes.observations')}}</label>
  {!! Form::text('observations',null,['class'=>'text','type'=>'email','placeholder'=>'Por favor introduzca las observaciones ']) !!}
</div>
<!--<div class="form-group">
    <label for="exampleInputFile">Subir archivo</label>
     {!! Form::file('path',['id'=>'exampleInputFile']) !!}  
</div>-->
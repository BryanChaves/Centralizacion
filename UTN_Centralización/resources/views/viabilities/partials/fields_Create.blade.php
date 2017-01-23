@include('viabilities.partials.fields_One')
<div class="form-group">
  <label class="control-label">{{trans('validation.attributes.province')}}</label>
  <select  class="text" id="province"  name="province">
   <option value=" " selected="selected">Seleccione una provincia</option>
    <option value="1">San José</option>
    <option value="2">Alajuela</option>
    <option value="3">Cartago</option>
    <option value="4">Heredia</option>
    <option value="5">Guanacaste</option>
    <option value="6">Puntarenas</option>
    <option value="7">Limón</option>
  </select>
</div>
<div class="form-group">
  <label class="control-label">{{trans('validation.attributes.canton')}}</label>
  <select class="text" name="canton"  id="canton">
  </select>
 <!-- {!! Form::text('canton',null,['class'=>'form-control','placeholder'=>'Por favor introduzca el cantón']) !!}-->
</div>
<div class="form-group">
  <label class="control-label">{{trans('validation.attributes.district')}}</label>
  <select class="text" name="district"  id="district">
  </select>
</div>
@include('viabilities.partials.fields_Two')

<div class="form-group">
    <label class="control-label">{{trans('validation.attributes.upload_file')}}</label>
    {!! Form::file('path',['id'=>'exampleInputFile']) !!}  
</div>

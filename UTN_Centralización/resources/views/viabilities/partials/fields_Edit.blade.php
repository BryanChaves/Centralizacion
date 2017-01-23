@include('viabilities.partials.fields_One')
<div class="form-group">
  <label class="control-label">{{trans('validation.attributes.province')}}</label>
  
  <select class="text" id="province"  name="province">

    @foreach($provinces as $province)
      <?php
        if($province->id == $viability->province){
          echo "<option selected value=$province->id>$province->name</option>";    
        }else{
           echo "<option value=$province->id>$province->name</option>";  
        }
      ?>
    @endforeach
  </select>

  <!--{!! Form::text('province',null,['class'=>'form-control','placeholder'=>'Por favor introduzca la provincia']) !!}-->
</div>
<div class="form-group">
  <label class="control-label">{{trans('validation.attributes.canton')}}</label>
  <select class="text" id="canton" name="canton">
    @foreach($cantons as $canton)
      <?php
        if($canton->id == $viability->canton){
          echo "<option selected value=$canton->id>$canton->name</option>";    
        }else{
           echo "<option value=$canton->id>$canton->name</option>";  
        }
      ?>
    @endforeach
  </select>

 <!-- {!! Form::text('canton',null,['class'=>'form-control','placeholder'=>'Por favor introduzca el cantón']) !!}-->
</div>
<div class="form-group">
  <label class="control-label">{{trans('validation.attributes.district')}}</label>
  <select class="text" id="district" name="district">
    @foreach($districts as $district)
      <?php
        if($district->id == $viability->district){
          echo "<option selected value=$district->id>$district->name</option>";    
        }else{
           echo "<option value=$district->id>$district->name</option>";  
        }
      ?>
    @endforeach
  </select>
</div>
@include('viabilities.partials.fields_Two')
<div class="form-group">
    <label class="control-label">{{trans('validation.attributes.upload_file')}}</label>
    {!! Form::file('path',['id'=>'exampleInputFile']) !!}  
</div>
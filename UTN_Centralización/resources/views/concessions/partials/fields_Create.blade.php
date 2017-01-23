@include('concessions.partials.fields_OneCreate')
@include('concessions.partials.fields_Two')
<div class="form-group">
  <label class="control-label">{{trans('validation.attributes.resolution_id')}}</label>
  <select class="text" name="resolution_id">
    @foreach($resolutions as $resolution)
      <?php    
        echo "<option value=$resolution->id>$resolution->num_resolution</option>";   
      ?>
    @endforeach
  </select>
</div>
<div class="form-group">
  <label class="control-label">{{trans('validation.attributes.file_id')}}</label>
  <select class="text" name="file_id">
    @foreach($files as $file)
      <?php
        echo "<option value=$file->id>$file->num_file</option>";   
      ?>
    @endforeach
  </select>
</div>
@include('concessions.partials.fields_Three')
<div class="form-group">
  <label class="control-label">{{trans('validation.attributes.fileType_id')}}</label>
  <select class="text" name="fileType_id">
    @foreach($fileTypes as $fileType)
      <?php
        echo "<option value=$fileType->id>$fileType->name</option>";   
      ?>
    @endforeach
  </select>
</div>
@include('concessions.partials.fields_Four')
<div class="form-group">
  <label class="control-label">{{trans('validation.attributes.viability_id')}}</label>
  <select class="text" name="viability_id">
    @foreach($viabilities as $viability)
      <?php
        echo "<option value=$viability->id>$viability->viability_number</option>";   
      ?>
    @endforeach
  </select>
</div>
<div class="form-group">
     <label for="exampleInputFile"><label class="control-label">{{trans('validation.attributes.upload_file')}}</label></label>
     {!! Form::file('path',['id'=>'exampleInputFile']) !!}  
</div>
<div class="form-group">
  <label class="control-label">{{trans('validation.attributes.sampling_id')}}</label>
  <select  class="form-control"  name="sampling_id">
    @foreach($samplings as $sampling)
      <?php                    
       echo "<option selected value=$sampling->id>$sampling->label</option>";                    
      ?>
    @endforeach
  </select>
</div>
<div class="form-group">
  <label class="control-label">{{trans('validation.attributes.parameter_id')}}</label>
  <select  class="form-control"  name="parameter_id">
    @foreach($parameters as $parameter)
      <?php                    
       echo "<option selected value=$parameter->id>$parameter->parameter</option>";                    
      ?>
    @endforeach
  </select>
</div>
@include('records.partials.fields')
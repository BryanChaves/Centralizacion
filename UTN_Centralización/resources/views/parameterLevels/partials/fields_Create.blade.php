@include('parameterLevels.partials.fields')
<div class="form-group">
  <label class="control-label">{{trans('validation.attributes.parameter_id')}}</label>
  <select  class="text"  name="parameter_id">
    @foreach($parameters as $parameter)
      <?php                    
       echo "<option selected value=$parameter->id>$parameter->parameter</option>";                    
      ?>
    @endforeach
  </select>
</div>

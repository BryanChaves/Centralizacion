@include('flow_Measurements.partials.fields')
<div class="form-group">
  <label class="control-label">{{trans('validation.attributes.watersource_id')}}</label>
  <select class="text" name="watersource_id">
    @foreach($watersources as $watersource)
      <?php   
          echo "<option selected value=$watersource->id>$watersource->watersource_name</option>";      
      ?>
    @endforeach
  </select>
</div>
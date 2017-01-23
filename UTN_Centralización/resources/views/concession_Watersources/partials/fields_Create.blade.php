<div class="form-group">
  <label class="control-label">{{trans('validation.attributes.concession_id')}}</label>
  <select class="text" name="concession_id">
    @foreach($concessions as $concession)
      <?php
          echo "<option selected value=$concession->id>$concession->agent_number</option>";    
      ?>
    @endforeach
  </select>
</div>
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
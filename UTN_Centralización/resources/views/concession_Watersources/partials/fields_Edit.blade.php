<div class="form-group">
  <label class="control-label">{{trans('validation.attributes.concession_id')}}</label>
  <select class="text" name="concession_id">
    @foreach($concessions as $concession)
      <?php
        if($concession->id == $concession_watersource->concession_id){
          echo "<option selected value=$concession->id>$concession->agent_number</option>";    
        }else{
          echo "<option value=$concession->id>$concession->agent_number</option>";   
        }
      ?>
    @endforeach
  </select>
</div>
<div class="form-group">
  <label class="control-label">{{trans('validation.attributes.watersource_id')}}</label>
  <select class="text" name="watersource_id">
    @foreach($watersources as $watersource)
      <?php
        if($watersource->id == $concession_watersource->watersource_id){
          echo "<option selected value=$watersource->id>$watersource->watersource_name</option>";    
        }else{
          echo "<option value=$watersource->id>$watersource->watersource_name</option>";   
        }
      ?>
    @endforeach
  </select>
</div>
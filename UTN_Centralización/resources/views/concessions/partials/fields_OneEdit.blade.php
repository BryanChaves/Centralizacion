<div class="form-group">
  <label class="control-label">{{trans('validation.attributes.agent_id')}}</label>
  <select class="text" name="agent_id">
    @foreach($entities as $entity)
      <?php
        if($entity->id == $concession->agent_id){
          echo "<option selected value=$entity->id>$entity->name</option>";    
        }else{
          echo "<option value=$entity->id>$entity->name</option>";   
        }
      ?>
    @endforeach
  </select>
</div>
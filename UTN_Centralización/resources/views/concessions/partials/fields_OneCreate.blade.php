<div class="form-group">
  <label class="control-label">{{trans('validation.attributes.agent_id')}}</label>
  <select class="text" name="agent_id">
    @foreach($entities as $entity)
      <?php    
        echo "<option value=$entity->id>$entity->name</option>";   
      ?>
    @endforeach
  </select>
</div>
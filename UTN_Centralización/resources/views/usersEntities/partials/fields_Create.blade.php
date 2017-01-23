<div class="form-group">
  <label class="control-label">{{trans('validation.attributes.user_id')}}</label>
  <select  class="text"  name="user_id">
    @foreach($users as $user)
      <?php                    
       echo "<option selected value=$user->id>$user->name</option>";                    
      ?>
    @endforeach
  </select>
</div>
<div class="form-group">
  <label class="control-label">{{trans('validation.attributes.entity_id')}}</label>
  <select  class="text"  name="entity_id">
    @foreach($entities as $entity)
      <?php                    
       echo "<option selected value=$entity->id>$entity->name</option>";                    
      ?>
    @endforeach
  </select>
</div>
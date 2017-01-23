@include('entities.partials.fields') 
<div class="form-group">
  <label class="control-label">{{trans('validation.attributes.rol_id')}}</label>
  <select class="text" name="rol_id">
    @foreach($roles as $rol)
      <?php
        if($rol->id == $entity->rol_id){
          echo "<option selected value=$rol->id>$rol->name</option>";    
        }else{
          echo "<option value=$rol->id>$rol->name</option>";   
        }
      ?>
    @endforeach
  </select>
</div>
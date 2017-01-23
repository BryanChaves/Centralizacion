@include('entities.partials.fields')  
<div class="form-group">
  <label class="control-label">{{trans('validation.attributes.rol_id')}}</label>
  <select  class="text"  name="rol_id">
    @foreach($roles as $rol)
      <?php                    
       echo "<option selected value=$rol->id>$rol->name</option>";                    
      ?>
    @endforeach
  </select>
</div>
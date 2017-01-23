@if((Auth::user()->getRol()=="Administrador")||(Auth::user()->getRol()=="Institución"))
<div class="form-group">
  <label class="control-label">{{trans('validation.attributes.agent_id')}}</label>
  <select class="text" name="agent_id">
    @foreach($entities as $entity)
      <?php
        if($entity->id == $analysis->agent_id){
          echo "<option selected value=$entity->id>$entity->name</option>";    
        }else{
          echo "<option value=$entity->id>$entity->name</option>";   
        }
      ?>
    @endforeach
  </select>
</div> 
@endif
@include('analysis.partials.fields') 
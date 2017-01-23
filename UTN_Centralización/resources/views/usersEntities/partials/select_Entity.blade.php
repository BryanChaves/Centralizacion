<div id="btn-search" class="form-group">  
  <select  name="entity_id">
    @foreach($entities as $entity)
      <?php 
                      
       echo "<option selected value=$entity->id>$entity->name</option>";                    
      ?>
    @endforeach
  </select>
</div>
@include('samplings.partials.fields')
<div class="form-group">
  <label class="control-label">{{trans('validation.attributes.sampling_site_id')}}</label>
  <select  class="form-control"  name="sampling_site_id">
    @foreach($samplingSites as $samplingSite)
      <?php                    
        if($samplingSite->id == $sampling->sampling_id){
          echo "<option selected value=$samplingSite->id>$samplingSite->name</option>";    
        }else{
           echo "<option value=$samplingSite->id>$samplingSite->name</option>";  
        }
      ?>
    @endforeach
  </select>
</div>

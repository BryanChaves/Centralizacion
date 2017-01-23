<table id="tables" class="table table-striped table-bordered bootstrap-datatable datatable responsive">
    <thead>
    <tr>
        <th>{{trans('validation.attributes.project_name')}}</th>
        <th>{{trans('validation.attributes.setena_administrative_record')}}</th> 
        <th>{{trans('validation.attributes.cadrastal_plane_number')}}</th>
        <th>{{trans('validation.attributes.property_number')}}</th>
        <th>{{trans('validation.attributes.province')}}</th>
        <th>{{trans('validation.attributes.canton')}}</th>
        <th>{{trans('validation.attributes.district')}}</th>
        <th>{{trans('validation.attributes.coordinate')}}</th>
    </tr>
    </thead>
    <tbody>
    
           <tr data-id="{{$viability->id}}">  
              <td>{{$viability->project_name}}</td>
              <td>{{$viability->setena_administrative_record}}</td>
              <td>{{$viability->cadrastal_plane_number}}</td>
              <td>{{$viability->property_number}}</td>
              @foreach($provinces as $province)
                <?php
              if($province->id == $viability->province){
                echo "<td>$province->name</td>";    
                }     
                ?>
              @endforeach
              @foreach($cantons as $canton)
                <?php
              if($canton->id == $viability->canton){
                echo "<td>$canton->name</td>";    
                }     
                ?>
              @endforeach
              @foreach($districts as $district)
                <?php
              if($district->id == $viability->district){
                echo "<td>$district->name</td>";    
                }     
                ?>
              @endforeach
              <td>{{$viability->coordinate}}</td>
                          
           </tr>
      
    </tbody>
</table>
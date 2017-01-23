<table id="tables" class="table table-striped table-bordered bootstrap-datatable datatable responsive">
    <thead>
    <tr>
        
        <th style='border: black 1px solid;'>{{trans('validation.attributes.resolution_id')}}</th> 
        
        <th style='border: black 1px solid;'>{{trans('validation.attributes.file_id')}}</th>
        <th style='border: black 1px solid;'>{{trans('validation.attributes.conferment_date')}}</th>
        <th style='border: black 1px solid;'>{{trans('validation.attributes.due_date')}}</th>
        <th style='border: black 1px solid;'>{{trans('validation.attributes.fileType_id')}}</th>
        <th style='border: black 1px solid;'>{{trans('validation.attributes.owner')}}</th>
        <th style='border: black 1px solid;'>{{trans('validation.attributes.property_number')}}</th>
        <th style='border: black 1px solid;'>{{trans('validation.attributes.water_tapping_point')}}</th>
        <th style='border: black 1px solid;'>{{trans('validation.attributes.authorized_use')}}</th>
        <th style='border: black 1px solid;'>{{trans('validation.attributes.assigned_flow')}}</th>
        <th style='border: black 1px solid;'>{{trans('validation.attributes.capacity_flow')}}</th>
    </tr>
    </thead>
    <tbody>
    
           <tr data-id="{{$concession->id}}">  
              
              
              @foreach($resolutions as $resolution)
                @if($resolution->id == $concession->resolution_id)
                    <td style='border: black 1px solid;'>{{$resolution->num_resolution}}</td> 

                @endif  

              @endforeach
              @foreach($files as $file)
                @if($file->id == $concession->file_id)
                    <td style='border: black 1px solid;'>{{$file->num_file}}</td> 

                @endif  

              @endforeach
              <td style='border: black 1px solid;'>{{$concession->conferment_date}}</td>
              <td style='border: black 1px solid;'>{{$concession->due_date}}</td>
              @foreach($fileTypes as $fileType)
                 @if($fileType->id == $concession->fileType_id)
                    <td style='border: black 1px solid;'>{{$fileType->name}}</td> 

                  @endif

              @endforeach
              <td style='border: black 1px solid;'>{{$concession->owner}}</td> 
              <td style='border: black 1px solid;'>{{$concession->property_number}}</td>
              <td style='border: black 1px solid;'>{{$concession->water_tapping_point}}</td>
              <td style='border: black 1px solid;'>{{$concession->authorized_use}}</td>
              <td style='border: black 1px solid;'>{{$concession->assigned_flow}}</td>
              <td style='border: black 1px solid;'>{{$concession->capacity_flow}}</td>               
           </tr>
      
    </tbody>
</table>
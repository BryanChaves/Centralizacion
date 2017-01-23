<table id="tables" class="table table-striped table-bordered bootstrap-datatable datatable responsive" style="border: black 1px solid;">
    <thead>
    <tr>
        <th style='border: black 2px solid; text-align:center;'>{{trans('validation.attributes.capacity')}}</th>
        <th style='border: black 2px solid; text-align:center;'>{{trans('validation.attributes.unit')}}</th>
        <th style='border: black 2px solid; text-align:center;'>{{trans('validation.attributes.method')}}</th>
        <th style='border: black 2px solid; text-align:center;'>{{trans('validation.attributes.observations')}}</th>
        <th style='border: black 2px solid; text-align:center;'>{{trans('validation.attributes.date')}}</th>
        <th style='border: black 2px solid; text-align:center;'>{{trans('validation.attributes.weather')}}</th>
        <th style='border: black 2px solid; text-align:center;'>{{trans('validation.attributes.watersource_id')}}</th>
        <th style='border: black 2px solid; text-align:center;'>{{trans('validation.attributes.actions')}}</th>
    </tr>
    </thead>
    <tbody>
    
      @foreach($flow_Measurements as $flow_Measurement)
           <tr data-id="{{$flow_Measurement->id}}">
              
              <td style='border: black 1px solid;'>{{$flow_Measurement->capacity}}</td>
              <td style='border: black 1px solid;'>L/S</td>
              <td style='border: black 1px solid;'>{{$flow_Measurement->method}}</td>
              <td style='border: black 1px solid;'>{{$flow_Measurement->observations}}</td> 
              <td style='border: black 1px solid;'>{{$flow_Measurement->date}}</td> 
              <td style='border: black 1px solid;'>{{$flow_Measurement->weather}}</td>    
              @foreach($watersources as $watersource)
                  <?php
                    if($watersource->id == $flow_Measurement->watersource_id){
                         echo "<td style='border: black 1px solid;'>$watersource->watersource_name</td>";    
                       } 
                  ?>
              @endforeach
                      
              <td class="center" style='border: black 1px solid; width:147px'>
                <a class="btn btn-info btn-xs" href="{{ route('medicion-caudal.edit',$flow_Measurement->id)}}">
                  <i class="glyphicon glyphicon-edit icon-white"></i>
                  {{trans('validation.attributes.edit')}}
                </a>
                <a class="btn-danger btn-xs" href="">
                {!! Form::open(['method'=>'delete','action'=>['Flow_MeasurementController@destroy',$flow_Measurement->id], 'style' => 'display:inline']) !!}<button type="submit" onclick="return confirm('Seguro que desea eliminar?')" class="btn btn-danger btn-xs">{{trans('validation.attributes.remove')}}</button>{!! Form::close() !!}
                <i class="glyphicon glyphicon-trash"></i>
                </a>        
              </td>              
           </tr>
      @endforeach 
    </tbody>
</table>
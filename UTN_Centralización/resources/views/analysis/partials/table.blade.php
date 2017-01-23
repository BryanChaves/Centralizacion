<table id="tables" class="table table-striped table-bordered bootstrap-datatable datatable responsive" style="border: black 1px solid;">
    <thead>
    <tr>
        <th style='border: black 2px solid; text-align:center;'>{{trans('validation.attributes.agent')}}</th>
        <th style='border: black 2px solid; text-align:center;'>{{trans('validation.attributes.laboratory')}}</th>
        <th style='border: black 2px solid; text-align:center;'>{{trans('validation.attributes.date')}}</th>
        <th style='border: black 2px solid; text-align:center;'>{{trans('validation.attributes.report_number')}}</th>
        <th style='border: black 2px solid; text-align:center;'>{{trans('validation.attributes.actions')}}</th>
    </tr>
    </thead>
    <tbody>
    
      @foreach($analysis as $value)
           <tr data-id="{{$value->id}}">
              @foreach($entities as $entity)
                <?php
                  if($entity->id == $value->agent_id){
                      echo "<td style='border: black 1px solid;''>$entity->name</td>";    
                    } 
                 ?>
              @endforeach 
              <td style="border: black 1px solid;">{{$value->laboratory_name}}</td> 
              <td style="border: black 1px solid;">{{$value->date}}</td>   
              <td style="border: black 1px solid;">{{$value->report_number}}</td>         
              <td class="center" style="border: black 1px solid; width:150px">
                <a class="btn btn-info btn-xs" href="{{ route('analisis.edit',$value->id)}}">
                  <i class="glyphicon glyphicon-edit icon-white"></i>
                  {{trans('validation.attributes.edit')}}
                </a>
                <a class="btn-danger btn-xs" href="">
                {!! Form::open(['method'=>'delete','action'=>['AnalysisController@destroy',$value->id], 'style' => 'display:inline']) !!}<button type="submit" onclick="return confirm('Seguro que desea eliminar?')" class="btn btn-danger btn-xs">{{trans('validation.attributes.remove')}}</button>{!! Form::close() !!}
                <i class="glyphicon glyphicon-trash"></i>
                </a>        
              </td>              
           </tr>
      @endforeach 
    </tbody>
</table>


 
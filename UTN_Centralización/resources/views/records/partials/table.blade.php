<table id="tables" class="table table-striped table-bordered bootstrap-datatable datatable responsive" tyle="border: black 1px solid; width:800px; margin: 0 auto;">
    <thead>
    <tr>
        <th style='border: black 2px solid; text-align:center;'>{{trans('validation.attributes.sampling')}}</th>
        <th style='border: black 2px solid; text-align:center;'>{{trans('validation.attributes.parameter')}}</th>
        <th style='border: black 2px solid; text-align:center;'>{{trans('validation.attributes.value')}}</th>
        @if(Auth::user()->getRol()!="Gestor")
        <th style='border: black 2px solid; text-align:center;'>{{trans('validation.attributes.actions')}}</th>
        @endif
    </tr>
    </thead>
    <tbody>
    
      @foreach($records as $record)
           <tr data-id="{{$record->id}}">
              @foreach($samplings as $sampling)
                <?php
                  if($sampling->id == $record->sampling_id){
                      echo "<td style='border: black 1px solid;'>$sampling->label</td>";    
                    } 
                 ?>
              @endforeach
               @foreach($parameters as $parameter)
                  @if($parameter->id == $record->parameter_id)
                    <td style='border: black 1px solid;'>{{$parameter->parameter}}</td>
                  @endif

              
              @endforeach
              <td style='border: black 1px solid;'>{{$record->value}}</td>
               @if(Auth::user()->getRol()!="Gestor")
              <td class="center" style='border: black 1px solid; width:200px;'>

                <a class="btn btn-info btn-xs" href="{{ route('registros.edit',$record->id)}}">
                  <i class="glyphicon glyphicon-edit icon-white"></i>
                  {{trans('validation.attributes.edit')}}
                </a>
                <a class="btn btn-danger btn-xs" href="">
                {!! Form::open(['method'=>'delete','action'=>['RecordController@destroy',$record->id], 'style' => 'display:inline']) !!}<button type="submit" onclick="return confirm('Seguro que desea eliminar?')" class="btn btn-danger btn-xs">{{trans('validation.attributes.remove')}}</button>{!! Form::close() !!}
                <i class="glyphicon glyphicon-trash"></i>
             
                </a>
        
              </td> 
               @endif             
           </tr>
      @endforeach 
    </tbody>
</table>
<table id="tables" class="table table-striped table-bordered bootstrap-datatable datatable responsive" style="border: black 1px solid;">
    <thead>
    <tr>
        <th style='border: black 2px solid; text-align:center'>{{trans('validation.attributes.agent')}}</th>
        <th style='border: black 2px solid; text-align:center'>{{trans('validation.attributes.agent_number')}}</th>
        <th style='border: black 2px solid; text-align:center'>{{trans('validation.attributes.due_date')}}</th>
        <th style='border: black 2px solid; text-align:center'>{{trans('validation.attributes.assigned_flow')}}</th>
        <th style='border: black 2px solid; text-align:center'>{{trans('validation.attributes.authorized_use')}}</th>

        <th style='border: black 2px solid; text-align:center'>{{trans('validation.attributes.actions')}}</th>
       
    </tr>
    </thead>
    <tbody>
    
      @foreach($concessions as $concession)
           <tr data-id="{{$concession->id}}">
              @foreach($entities as $entity)
                  
                  @if($entity->id == $concession->agent_id)
                    <td style='border: black 1px solid;'>{{$entity->name}}</td> 

                  @endif
              @endforeach 
              <td style='border: black 1px solid;'>{{$concession->agent_number}}</td> 
              <td style='border: black 1px solid;'>{{$concession->due_date}}</td> 
              <td style='border: black 1px solid;'>{{$concession->assigned_flow}}</td>   
              <td style='border: black 1px solid;'>{{$concession->authorized_use}}</td>         
              <td class="center" style='border: black 1px solid; width:230px'>
               <a class="btn btn-success btn-xs" href="{{ route('concesiones.show',$concession->id)}}">
                  <i class="glyphicon glyphicon-search icon-white"></i>
                  {{trans('validation.attributes.show')}}
                </a>
                @if(Auth::user()->getRol()!="Gestor")
                <a class="btn btn-info btn-xs" href="{{ route('concesiones.edit',$concession->id)}}">
                  <i class="glyphicon glyphicon-edit icon-white"></i>
                  {{trans('validation.attributes.edit')}}
                </a>
                <a class="btn-danger btn-xs" href="">
                {!! Form::open(['method'=>'delete','action'=>['ConcessionController@destroy',$concession->id], 'style' => 'display:inline']) !!}<button type="submit" onclick="return confirm('Seguro que desea eliminar?')" class="btn btn-danger btn-xs">{{trans('validation.attributes.remove')}}</button>{!! Form::close() !!}
                <i class="glyphicon glyphicon-trash"></i>
                </a>  
                @endif      
              </td>            
           </tr>
      @endforeach 
    </tbody>
</table>
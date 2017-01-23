<table id="tables" class="table table-striped table-bordered bootstrap-datatable datatable responsive" style="border: black 1px solid; width:800px; margin: 0 auto;">
    <thead>
    <tr>
        <th style='border: black 2px solid; text-align:center; width:150px;'>{{trans('validation.attributes.num_sampling')}}</th>
        <th style='border: black 2px solid; text-align:center;'>{{trans('validation.attributes.label')}}</th>
        <th style='border: black 2px solid; text-align:center;'>{{trans('validation.attributes.level')}}</th>
        
        @if(Auth::user()->getRol()!="Gestor")
           <th style='border: black 1px solid;'>{{trans('validation.attributes.actions')}}</th>
        @endif
    </tr>
    </thead>
    <tbody>
    
      @foreach($samplings as $sampling)
           
              
              
                
                  <tr> 
                    <td style='border: black 1px solid;'>{{$sampling->consecutive}}</td>
                    <td style='border: black 1px solid;'>{{$sampling->label}}</td>
                    <td style='border: black 1px solid;'>{{$sampling->level}}</td>
                    
                    
                    @if(Auth::user()->getRol()!="Gestor")
                    <td class="center" style='border: black 1px solid; width:200px;'>
                      <a class="btn btn-info btn-xs" href="{{ route('muestras.edit',$sampling->id)}}">
                        <i class="glyphicon glyphicon-edit icon-white"></i>
                        {{trans('validation.attributes.edit')}}
                      </a>

                      <a class="btn btn-danger btn-xs" href="">
                        {!! Form::open(['method'=>'delete','action'=>['SamplingController@destroy',$sampling->id], 'style' => 'display:inline']) !!}<button type="submit" onclick="return confirm('Seguro que desea eliminar?')" class="btn btn-danger btn-xs">{{trans('validation.attributes.remove')}}</button>{!! Form::close() !!}
                        <i class="glyphicon glyphicon-trash"></i>
                      </a>
                     
                    </td>
                    @endif 
                  </tr>  
                
                
              @endforeach
                           
        
    </tbody>
</table>
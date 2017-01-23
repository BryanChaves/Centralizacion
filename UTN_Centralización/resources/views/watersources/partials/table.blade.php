<table id="tables" class="table table-striped table-bordered bootstrap-datatable datatable responsive" style="border: black 1px solid;">
    <thead>
    <tr>
        <th style='border: black 2px solid; text-align:center;'>{{trans('validation.attributes.watersource_name')}}</th>
        <th style='border: black 2px solid; text-align:center;'>{{trans('validation.attributes.address')}}</th>
        <th style='border: black 2px solid; text-align:center;'>{{trans('validation.attributes.coordinate')}}</th>
        <th style='border: black 2px solid; text-align:center;'>{{trans('validation.attributes.observations')}}</th>
        @if(Auth::user()->getRol()!="Gestor")
           <th style='border: black 2px solid; text-align:center;'>{{trans('validation.attributes.actions')}}</th>
        @endif

    </tr>
    </thead>
    <tbody>
    
      @foreach($watersources as $watersource)
           <tr data-id="{{$watersource->id}}">  
              <td style='border: black 1px solid;'>{{$watersource->watersource_name}}</td>
              <td style='border: black 1px solid;'>{{$watersource->address}}</td>
              <td style='border: black 1px solid;'>{{$watersource->coordinate_CRTM05}}</td>
              <td style='border: black 1px solid;'>{{$watersource->observations}}</td>
              @if(Auth::user()->getRol()!="Gestor")
                <td class="center" style='border: black 1px solid;'>
                
                  <a class="btn btn-info btn-xs btn-block" href="{{ route('nacientes.edit',$watersource->id)}}">
                    <i class="glyphicon glyphicon-edit icon-white"></i>
                    {{trans('validation.attributes.edit')}}
                  </a>
                  <a class="btn-danger btn-xs btn-block" href="">
                    {!! Form::open(['method'=>'delete','action'=>['WatersourceController@destroy',$watersource->id], 'style' => 'display:inline']) !!}<button type="submit" onclick="return confirm('Seguro que desea eliminar?')" class="btn btn-danger btn-xs">{{trans('validation.attributes.remove')}}</button>{!! Form::close() !!}
                    <i class="glyphicon glyphicon-trash"></i>
             
                  </a>
        
              </td>  
              @endif
         
                          
           </tr>
      @endforeach 
    </tbody>
</table>
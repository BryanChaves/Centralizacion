<table id="tables" class="table table-striped table-bordered bootstrap-datatable datatable responsive" style="border: black 1px solid; width:500px; margin: 0 auto;">
    <thead>
    <tr>
        <th style='border: black 2px solid; text-align:center;'>{{trans('validation.attributes.name')}}</th>
        <th style='border: black 2px solid; text-align:center;'>{{trans('validation.attributes.actions')}}</th>
    </tr>
    </thead>
    <tbody>
    
      @foreach($roles as $rol)
           <tr data-id="{{$rol->id}}">
              <td style="border: black 1px solid;">{{$rol->rol_value}}</td>
              <td class="center" style="border: black 1px solid; width:147px">
                <a class="btn btn-info btn-xs" href="{{ route('roles.edit',$rol->id)}}">
                  <i class="glyphicon glyphicon-edit icon-white"></i>
                  {{trans('validation.attributes.edit')}}
                </a>
                <a class="btn-danger btn-xs" href="">
                {!! Form::open(['method'=>'delete','action'=>['RolController@destroy',$rol->id], 'style' => 'display:inline']) !!}<button type="submit" onclick="return confirm('Seguro que desea eliminar?')" class="btn btn-danger btn-xs">{{trans('validation.attributes.remove')}}</button>{!! Form::close() !!}
                <i class="glyphicon glyphicon-trash"></i>
             
                </a>
        
              </td>              
           </tr>
      @endforeach 
    </tbody>
</table>
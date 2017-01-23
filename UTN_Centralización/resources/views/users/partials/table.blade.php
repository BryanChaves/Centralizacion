<table id="tables" class="table table-striped table-bordered bootstrap-datatable datatable responsive" style="background: #A4A4A4; border: black 1px solid;">
    <thead>
    <tr>
        <th style="text-align: center;">{{trans('validation.attributes.name')}}</th>
        <th style="text-align: center;">{{trans('validation.attributes.ID_number')}}</th>
        <th style="text-align: center;">{{trans('validation.attributes.email')}}</th>
        <th style="text-align: center;">{{trans('validation.attributes.telephone')}}</th>
        <th style="text-align: center;">{{trans('validation.attributes.actions')}}</th>
    </tr>
    </thead>
    <tbody>
    
      @foreach($users as $user)
      
           <tr data-id="{{$user->id}}">
              <td>{{$user->name}}</td>
              <td>{{$user->ID_number}}</td>
              <td>{{$user->email}}</td>
              <td>{{$user->telephone_number}}</td>
              <td class="center" style="width:165px">
                <a class="btn btn-info btn-xs" href="{{ route('usuarios.edit',$user->id)}}">
                  <i class="halflings-icon white edit"></i>
                  {{trans('validation.attributes.edit')}}
                </a>
                <a class="btn-danger btn-xs" href="">
                  {!! Form::open(['method'=>'delete','action'=>['UserController@destroy',$user->id], 'style' => 'display:inline']) !!}<button type="submit" onclick="return confirm('Seguro que desea eliminar?')" class="btn btn-danger btn-xs">{{trans('validation.attributes.remove')}}</button>{!! Form::close() !!}
                  <i class="glyphicon glyphicon-trash"></i>
                </a>
        
              </td>              
           </tr>
      @endforeach 
    </tbody>
</table>

             
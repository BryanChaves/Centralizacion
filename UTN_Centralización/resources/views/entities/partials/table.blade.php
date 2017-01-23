<table id="tables" class="table table-striped table-bordered bootstrap-datatable datatable responsive" style="border: black 1px solid;">
    <thead>
    <tr>
        <th style='border: black 2px solid; text-align:center;'>{{trans('validation.attributes.name')}}</th>
        <th style='border: black 2px solid; text-align:center;'>{{trans('validation.attributes.address')}}</th>
        <th style='border: black 2px solid; text-align:center;'>{{trans('validation.attributes.email')}}</th>
        <th style='border: black 2px solid; text-align:center;'>{{trans('validation.attributes.telephone')}}</th>
        <th style='border: black 2px solid; text-align:center;'>{{trans('validation.attributes.description')}}</th>
        <th style='border: black 2px solid; text-align:center;'>{{trans('validation.attributes.rol_id')}}</th>
        <th style='border: black 2px solid; text-align:center;'>{{trans('validation.attributes.actions')}}</th>
    </tr>
    </thead>
    <tbody>
    
      @foreach($entities as $entity)
           <tr data-id="{{$entity->id}}">
              <td style='border: black 1px solid;'>{{$entity->name}}</td>
              <td style='border: black 1px solid;'>{{$entity->address}}</td>
              <td style='border: black 1px solid;'>{{$entity->email}}</td>
              <td style='border: black 1px solid;'>{{$entity->telephone_number}}</td>
              <td style='border: black 1px solid;'>{{$entity->description}}</td>
               @foreach($roles as $rol)
                  <?php
                    if($rol->id == $entity->rol_id){
                         echo "<td style='border: black 1px solid;'>$rol->name</td>";    
                       } 
                  ?>
                @endforeach
              <td class="center" style='border: black 1px solid;'>
                <a class="btn btn-info btn-xs btn-block" href="{{ route('entidades.edit',$entity->id)}}">
                  <i class="glyphicon glyphicon-edit icon-white"></i>
                  {{trans('validation.attributes.edit')}}
                </a>
                <a class="btn-danger btn-xs btn-block" href="">
                {!! Form::open(['method'=>'delete','action'=>['EntityController@destroy',$entity->id], 'style' => 'display:inline']) !!}<button type="submit" onclick="return confirm('Seguro que desea eliminar?')" class="btn btn-danger btn-xs">{{trans('validation.attributes.remove')}}</button>{!! Form::close() !!}
                <i class="glyphicon glyphicon-trash"></i>
                </a>        
              </td>              
           </tr>
      @endforeach 
    </tbody>
</table>
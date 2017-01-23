<table id="tables" class="table table-striped table-bordered bootstrap-datatable datatable responsive" style="border: black 1px solid;">
    <thead>
    <tr>
        <th style='border: black 2px solid; text-align: center;'>{{trans('validation.attributes.user')}}</th>
        <th style='border: black 2px solid; text-align: center;'>{{trans('validation.attributes.entity')}}</th>
        <th style='border: black 2px solid; text-align: center;'>{{trans('validation.attributes.actions')}}</th>
    </tr>
    </thead>
    <tbody>
    
      @foreach($usersEntities as $userEntity)
           <tr data-id="{{$userEntity->id}}">
              @foreach($users as $user)
                  <?php
                    if($user->id == $userEntity->user_id){
                         echo "<td style='border: black 1px solid;'>$user->full_name</td>";    
                       } 
                  ?>
              @endforeach
              @foreach($entities as $entity)
                  <?php
                    if($entity->id == $userEntity->entity_id){
                         echo "<td style='border: black 1px solid;'>$entity->name</td>";    
                       } 
                  ?>
              @endforeach
              
             
             <td class="center" style="border: black 1px solid; width:150px">
                
                <a class="btn-danger btn-xs" href="">
                {!! Form::open(['method'=>'delete','action'=>['UserEntityController@destroy',$userEntity->id], 'style' => 'display:inline']) !!}<button type="submit" onclick="return confirm('Seguro que desea eliminar?')" class="btn btn-danger btn-xs">{{trans('validation.attributes.remove')}}</button>{!! Form::close() !!}
                <i class="glyphicon glyphicon-trash"></i>
             
                </a>
        
              </td>              
           </tr>
      @endforeach 
    </tbody>
</table>


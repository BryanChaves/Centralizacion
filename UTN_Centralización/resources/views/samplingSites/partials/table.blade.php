<table id="tables" class="table table-striped table-bordered bootstrap-datatable datatable responsive" style="border: black 1px solid; width:800px; margin: 0 auto;">
    <thead>
    <tr>
        <th style='border: black 2px solid; text-align:center;'>{{trans('validation.attributes.name')}}</th>
        <th style='border: black 2px solid; text-align:center;'>{{trans('validation.attributes.agent')}}</th>
        <th style='border: black 2px solid; text-align:center;'>{{trans('validation.attributes.actions')}}</th>
    </tr>
    </thead>
    <tbody>
    
      @foreach($samplingSites as $samplingSite)
           <tr data-id="{{$samplingSite->id}}">
              <td style='border: black 1px solid;'>{{$samplingSite->name}}</td>
              @foreach($entities as $entity)
                <?php
                  if($entity->id == $samplingSite->agent_id){
                      echo "<td style='border: black 1px solid;'>$entity->name</td>";    
                    } 
                 ?>
              @endforeach
              <td class="center" style='border: black 1px solid; width:200px'>
                <a class="btn btn-info btn-xs" href="{{ route('sitios-muestreo.edit',$samplingSite->id)}}">
                  <i class="glyphicon glyphicon-edit icon-white"></i>
                  {{trans('validation.attributes.edit')}}
                </a>
                <a class="btn btn-danger btn-xs" href="">
                {!! Form::open(['method'=>'delete','action'=>['SamplingsiteController@destroy',$samplingSite->id], 'style' => 'display:inline']) !!}<button type="submit" onclick="return confirm('Seguro que desea eliminar?')" class="btn btn-danger btn-xs">{{trans('validation.attributes.remove')}}</button>{!! Form::close() !!}
                <i class="glyphicon glyphicon-trash"></i>
             
                </a>
        
              </td>              
           </tr>
      @endforeach 
    </tbody>
</table>
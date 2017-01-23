<table id="tables" class="table table-striped table-bordered bootstrap-datatable datatable responsive" style="border: black 1px solid; width:600px; margin: 0 auto;">
    <thead>
    <tr>
        <th style='border: black 2px solid; text-align:center;'>{{trans('validation.attributes.concession')}}</th>
        <th style='border: black 2px solid; text-align:center;'>{{trans('validation.attributes.watersource')}}</th>
        <th style='border: black 2px solid; text-align:center;'>{{trans('validation.attributes.actions')}}</th>
    </tr>
    </thead>
    <tbody>
    
      @foreach($concession_Watersources as $concession_Watersource)
           <tr data-id="{{$concession_Watersource->id}}">
              @foreach($concessions as $concession)
                  <?php
                    if($concession->id == $concession_Watersource->concession_id){
                         echo "<td style='border: black 1px solid;'>$concession->agent_number</td>";    
                       } 
                  ?>
              @endforeach
              @foreach($watersources as $watersource)
                  <?php
                    if($watersource->id == $concession_Watersource->watersource_id){
                         echo "<td style='border: black 1px solid;'>$watersource->watersource_name</td>";    
                       } 
                  ?>
              @endforeach        
              <td class="center" style='border: black 1px solid; width:147px'>
                <a class="btn btn-info btn-xs" href="{{ route('concesion-naciente.edit',$concession_Watersource->id)}}">
                  <i class="glyphicon glyphicon-edit icon-white"></i>
                  {{trans('validation.attributes.edit')}}
                </a>
                <a class="btn-danger btn-xs" href="">
                {!! Form::open(['method'=>'delete','action'=>['Concession_WatersourceController@destroy',$concession_Watersource->id], 'style' => 'display:inline']) !!}<button type="submit"onclick="return confirm('Seguro que desea eliminar?')" class="btn btn-danger btn-xs">{{trans('validation.attributes.remove')}}</button>{!! Form::close() !!}
                <i class="glyphicon glyphicon-trash"></i>
                </a>        
              </td>              
           </tr>
      @endforeach 
    </tbody>
</table>
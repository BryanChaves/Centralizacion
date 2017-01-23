<table id="tables" class="table table-striped table-bordered bootstrap-datatable datatable responsive" style="border: black 1px solid; width:800px; margin: 0 auto;">
    <thead>
    <tr>
        <th style='border: black 2px solid; text-align:center;'>{{trans('validation.attributes.parameter')}}</th>
        <th style='border: black 2px solid; text-align:center;'>{{trans('validation.attributes.unit')}}</th>
        <th style='border: black 2px solid; text-align:center;'>{{trans('validation.attributes.recommended_value')}}</th>
        <th style='border: black 2px solid; text-align:center;'>{{trans('validation.attributes.maximum_allowable')}}</th>
        <th style='border: black 2px solid; text-align:center;'>{{trans('validation.attributes.actions')}}</th>
    </tr>
    </thead>
    <tbody>
    
      @foreach($parameters as $parameter)
            <tr data-id="{{$parameter->id}}">
              <td style="border: black 1px solid;">{{$parameter->parameter}}</td> 
              <td style="border: black 1px solid;">{{$parameter->unit}}</td> 
              <td style="border: black 1px solid;">{{$parameter->recommended_value}}</td>   
              <td style="border: black 1px solid;">{{$parameter->maximum_allowable}}</td>         
              <td class="center" style="border: black 1px solid; width:150px">
                <a class="btn btn-info btn-xs" href="{{ route('parametros.edit',$parameter->id)}}">
                  <i class="glyphicon glyphicon-edit icon-white"></i>
                  {{trans('validation.attributes.edit')}}
                </a>
                <a class="btn-danger btn-xs" href="">
                {!! Form::open(['method'=>'delete','action'=>['ParameterController@destroy',$parameter->id], 'style' => 'display:inline']) !!}<button type="submit" onclick="return confirm('Seguro que desea eliminar?')" class="btn btn-danger btn-xs">{{trans('validation.attributes.remove')}}</button>{!! Form::close() !!}
                <i class="glyphicon glyphicon-trash"></i>
                </a>        
              </td>              
           </tr>
      @endforeach 
    </tbody>
</table>
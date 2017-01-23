<table id="tables" class="table table-striped table-bordered bootstrap-datatable datatable responsive" style="border: black 1px solid; width:600px; margin: 0 auto;">
    <thead>
    <tr>
        <th style='border: black 2px solid; text-align: center;'>{{trans('validation.attributes.num_file')}}</th>
        <th style='border: black 2px solid; text-align: center;'>{{trans('validation.attributes.actions')}}</th>
    </tr>
    </thead>
    <tbody>
    
      @foreach($files as $file)
           <tr data-id="{{$file->id}}">
              <td style='border: black 1px solid;'>{{$file->num_file}}</td>         
              <td class="center" style='border: black 1px solid; width: 150px'>
                <a class="btn btn-info btn-xs" href="{{ route('expedientes.edit',$file->id)}}">
                  <i class="glyphicon glyphicon-edit icon-white"></i>
                  {{trans('validation.attributes.edit')}}
                </a>
                <a class="btn-danger btn-xs" href="">
                {!! Form::open(['method'=>'delete','action'=>['FileController@destroy',$file->id], 'style' => 'display:inline']) !!}<button type="submit" onclick="return confirm('Seguro que desea eliminar?')" class="btn btn-danger btn-xs">{{trans('validation.attributes.remove')}}</button>{!! Form::close() !!}
                <i class="glyphicon glyphicon-trash"></i>
                </a>        
              </td>              
           </tr>
      @endforeach 
    </tbody>
</table>
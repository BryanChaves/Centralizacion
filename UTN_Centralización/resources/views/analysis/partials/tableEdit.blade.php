<table id="tables" class="table table-striped table-bordered bootstrap-datatable datatable responsive">
    <thead>
    <tr>
        <th>Consecutivo</th>
        <th>{{trans('validation.attributes.label')}}</th>
        <th>{{trans('validation.attributes.level')}}</th>
        <th>{{trans('validation.attributes.name')}}</th>
        <th>{{trans('validation.attributes.date')}}</th>
    </tr>
    </thead>
    <tbody>
      @foreach($sql as $muestra)
           <tr>
              <td>{{$muestra->consecutive}}</td>
              <td>{{$muestra->label}}</td>
              <td>{{$muestra->level}}</td>
              <td>{{$muestra->name}}</td>
              <td>{{$muestra->created_at}}</td>          
           </tr>
      @endforeach 
    </tbody>
</table>
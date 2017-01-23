<table id="tables" class="table table-striped table-bordered bootstrap-datatable datatable responsive" style="border: black 1px solid;">
    <thead>
    <tr>
        <th style='border: black 2px solid;text-align:center;'>{{trans('validation.attributes.capacity')}}</th>
        <th style='border: black 2px solid;text-align:center;'>{{trans('validation.attributes.method')}}</th>
        <th style='border: black 2px solid;text-align:center;'>{{trans('validation.attributes.observations')}}</th>
        <th style='border: black 2px solid;text-align:center;'>{{trans('validation.attributes.date')}}</th>
        <th style='border: black 2px solid;text-align:center;'>{{trans('validation.attributes.weather')}}</th>
        <th style='border: black 2px solid;text-align:center;'>{{trans('validation.attributes.name')}}</th>
    </tr>
    </thead>
        <tbody>
      @foreach($aforos as $aforo)
      
           <tr>
              <td style="border: black 1px solid;">{{$aforo->capacity}}</td>
              <td style="border: black 1px solid;">{{$aforo->method}}</td>
              <td style="border: black 1px solid;">{{$aforo->observations}}</td>
              <td style="border: black 1px solid;">{{$aforo->date}}</td> 
               <td style="border: black 1px solid;">{{$aforo->weather}}</td>  
               <td style="border: black 1px solid;">{{$aforo->name}}</td>        
           </tr>
      @endforeach 
    </tbody>
</table>

watersource_name
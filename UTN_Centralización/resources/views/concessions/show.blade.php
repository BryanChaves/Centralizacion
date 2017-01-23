@extends($view)

@section('body')
 <ul class="breadcrumb">
     <li>
        <i><img src="/img/concesiones.png"></i>
        <a>CONCESIONES</a> 
        <i class="icon-angle-right"></i>
     </li>
     <li><a>VER</a></li>
  </ul>
  
  <div id="panel-user" class="panel panel-default">
    <p><a class="btn btn-info" href="{{route('concesiones.index')}}" role="button">{{trans('validation.attributes.back')}}</a></p>
        
        <div class="panel-body">
      @include('concessions.partials.table_Show')  
          
        </div>           
    </div>

   
@endsection
@extends($view)

@section('body')
 	<ul class="breadcrumb">
        <li>
            <i><img src="/img/viabilidad1.png"></i>
            <a>VIABILIDADES</a> 
            <i class="icon-angle-right"></i>
        </li>
        <li><a>VER</a></li>
    </ul>
  
  	<div id="panel-user" class="panel panel-default">
    <p><a class="btn btn-info" href="{{route('viabilidades.index')}}" role="button">Retroceder</a></p>
        
        <div class="panel-body">
      @include('viabilities.partials.table_Show')  
          
        </div>           
    </div>

    

@endsection
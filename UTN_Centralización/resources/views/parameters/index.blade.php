@extends($view)

@section('content')
    <ul class="breadcrumb">
        <li>
            <i><img src="/img/param.gif"></i>
            <a>PARÁMETROS</a> 
            <i class="icon-angle-right"></i>
        </li>
    </ul>
<div class="message" id="messages"> 
        @if(Session::has('message'))
            <p id="message">{{Session::get('message')}}<button id="btn-close" type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></p>                               
        @endif
    </div>

	<div id="panel-user" class="panel panel-default">
		<p><a class="btn btn-info" href="{{route('parametros.create')}}" role="button">{{trans('validation.attributes.new_parameter')}}</a></p>
	

        
        <div class="panel-body">
			@include('parameters.partials.table')	
	       
        </div>           
    </div>

@endsection
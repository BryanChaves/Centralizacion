@extends($view)

@section('content')

    <ul class="breadcrumb">
        <li>
            <i><img src="/img/viabilidad1.png"></i>
            <a>VIABILIDADES</a> 
            <i class="icon-angle-right"></i>
        </li>
    </ul>
    <div class="message" id="messages"> 
        @if(Session::has('message'))
            <p id="message">{{Session::get('message')}}<button id="btn-close" type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></p>                               
        @endif
    </div>

	<div id="panel-user" class="panel panel-default">
		<p><a class="btn btn-info" href="{{route('viabilidades.create')}}" role="button">{{trans('validation.attributes.new_viability')}}</a></p>
		

        
        <div class="panel-body">
			@include('viabilities.partials.table')	
	        
        </div>           
    </div>

@endsection
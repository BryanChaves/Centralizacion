@extends($view)

@section('content')
<ul class="breadcrumb">
    <li>
        <i><img src="/img/concesiones.png"></i>
        <a>CONCESIONES</a> 
        <i class="icon-angle-right"></i>
    </li>
</ul>
<div class="message" id="messages"> 
        @if(Session::has('message'))
            <p id="message">{{Session::get('message')}}<button id="btn-close" type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></p>                               
        @endif
    </div>

	<div id="panel-user" class="panel panel-default">
		@if(Auth::user()->getRol()!="Gestor")
        <p><a class="btn btn-info" href="{{route('concesiones.create')}}" role="button">{{trans('validation.attributes.new_concession')}}</a></p>
	   @endif

        
        <div class="panel-body">
			@include('concessions.partials.table')	
	       
        </div>           
    </div>

@endsection
@extends($view)

@section('content')
    <ul class="breadcrumb">
        <li>
            
            <a>MUESTRAS</a> 
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
            <p><a class="btn btn-info" href="{{route('muestras.create')}}" role="button">{{trans('validation.attributes.new_sampling')}}</a></p>
		@endif

        
        <div class="panel-body">
			@include('samplings.partials.table')	
	        
        </div>           
    </div>

@endsection
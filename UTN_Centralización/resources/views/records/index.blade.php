@extends($view)

@section('content')
    <ul class="breadcrumb">
        <li>
            
            <a>REGISTROS</a> 
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
    <p><a class="btn btn-info" href="{{route('registros.create')}}" role="button">{{trans('validation.attributes.new_record')}}</a></p>
		@endif

        <div class="panel-heading">{{trans('validation.attributes.list_records')}}</div>
        <div class="panel-body">
			@include('records.partials.table')	
	        
        </div>           
    </div>

@endsection
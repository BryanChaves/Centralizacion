@extends($view)

@section('content')
    <ul class="breadcrumb">
        <li>
            <i><img src="/img/medicion.png"></i>
            <a>MEDICIÓN CAUDAL</a> 
            <i class="icon-angle-right"></i>
        </li>
    </ul>
<div class="message" id="messages"> 
        @if(Session::has('message'))
            <p id="message">{{Session::get('message')}}<button id="btn-close" type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></p>                               
        @endif
    </div>

	<div id="panel-user" class="panel panel-default">
		<p><a class="btn btn-info" href="{{route('medicion-caudal.create')}}" role="button">{{trans('validation.attributes.new_flow_measurement')}}</a></p>
	

        
        <div class="panel-body">
			@include('flow_Measurements.partials.table')	
	       
        </div>           
    </div>

@endsection
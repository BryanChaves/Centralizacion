@extends($view)

@section('content')
<ul class="breadcrumb">
    <li>
        <i><img src="/img/expe.png"></i>
        <a>EXPEDIENTES</a> 
        <i class="icon-angle-right"></i>
    </li>
</ul>

<div class="message" id="messages"> 
        @if(Session::has('message'))
            <p id="message">{{Session::get('message')}}<button id="btn-close" type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></p>                               
        @endif
    </div>

	<div id="panel-user" class="panel panel-default">
		<p><a class="btn btn-info" href="{{route('expedientes.create')}}" role="button">{{trans('validation.attributes.new_file')}}</a></p>
        <div class="panel-heading">{{trans('validation.attributes.list_files')}}</div>
        <div class="panel-body">
			@include('files.partials.table')	
	       
        </div>           
    </div>

@endsection
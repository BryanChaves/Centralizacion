@extends($view)

@section('content')
    <ul class="breadcrumb">
        <li>
            <i><img src="/img/medicion.png"></i>
            <a>MEDICIÓN CAUDAL</a> 
            <i class="icon-angle-right"></i>
        </li>
        <li><a>CREAR</a></li>
    </ul>
    <div id="panel-create" class="panel panel-default">

        

        <div class="panel-body">
            @include('flow_Measurements.partials.messages') 
            {!!Form::open(['route'=>'medicion-caudal.store','method'=>'POST'])!!}   
                @include('flow_Measurements.partials.fields_Create')                             
                <button type="submit" class="btn btn-info">{{trans('validation.attributes.add')}}</button>
            {!!Form::close()!!}

        </div>

        <a id="btn-back" class="btn btn-info"  href="{{ route('medicion-caudal.index')}}">{{trans('validation.attributes.back')}}</a>
    
    </div>
@endsection
@extends($view)

@section('content')
    <ul class="breadcrumb">
        <li>
            <i><img src="/img/concesiones.png"></i>
            <a>CONCESIÓN NACIENTE</a> 
            <i class="icon-angle-right"></i>
        </li>
        <li><a>CREAR</a></li>
    </ul>
    <div id="panel-create" class="panel panel-default">

        

        <div class="panel-body">
            @include('concession_Watersources.partials.messages') 
            {!!Form::open(['route'=>'concesion-naciente.store','method'=>'POST'])!!}   
                @include('concession_Watersources.partials.fields_Create')                             
                <button type="submit" class="btn btn-info">{{trans('validation.attributes.add')}}</button>
            {!!Form::close()!!}

        </div>

        <a id="btn-back" class="btn btn-info"  href="{{ route('concesion-naciente.index')}}">{{trans('validation.attributes.back')}}</a>
    
    </div>
@endsection
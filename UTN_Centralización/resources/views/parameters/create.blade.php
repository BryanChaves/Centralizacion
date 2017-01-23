@extends($view)

@section('content')
    <ul class="breadcrumb">
        <li>
            <i><img src="/img/param.gif"></i>
            <a>PARÁMETROS</a> 
            <i class="icon-angle-right"></i>
        </li>
        <li><a>CREAR</a></li>
    </ul>
    <div id="panel-create" class="panel panel-default">


        <div class="panel-body">
            @include('parameters.partials.messages') 
            {!!Form::open(['route'=>'parametros.store','method'=>'POST'])!!}   
                @include('parameters.partials.fields')                             
                <button type="submit" class="btn btn-info">{{trans('validation.attributes.add')}}</button>
            {!!Form::close()!!}

        </div>

        <a id="btn-back" class="btn btn-info"  href="{{ route('parametros.index')}}">{{trans('validation.attributes.back')}}</a>
    
    </div>
@endsection
@extends($view)

@section('content')
    <ul class="breadcrumb">
        <li>
            <i><img src="/img/nivel.png"></i>
            <a>NIVEL PARÁMETRO</a> 
            <i class="icon-angle-right"></i>
        </li>
        <li><a>CREAR</a></li>
    </ul>
    <div id="panel-create" class="panel panel-default">

        

        <div class="panel-body">
            @include('parameterLevels.partials.messages') 
            {!!Form::open(['route'=>'nivel-parametros.store','method'=>'POST'])!!}   
                @include('parameterLevels.partials.fields_Create')                             
                <button type="submit" class="btn btn-info">{{trans('validation.attributes.add')}}</button>
            {!!Form::close()!!}

        </div>

        <a id="btn-back" class="btn btn-info"  href="{{ route('nivel-parametros.index')}}">{{trans('validation.attributes.back')}}</a>
    
    </div>
@endsection
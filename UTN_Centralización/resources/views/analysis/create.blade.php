@extends($view)

@section('content')
    <ul class="breadcrumb">
        <li>
            <i><img src="/img/ana1.png"></i>
            <a>ANÁLISIS</a> 
            <i class="icon-angle-right"></i>
        </li>
        <li><a>CREAR</a></li>
    </ul>

    <div id="panel-create" class="panel panel-default">


        <div class="panel-body">
            @include('analysis.partials.messages') 
            {!!Form::open(['route'=>'analisis.store','id'=>'form','method'=>'POST','files'=>true,'onsubmit'=>'return form();'])!!}   

                @include('analysis.partials.fields_Create')  
                @include('analysis.partials.tableCreate') 
                <button type="submit" class="btn btn-info" onclick="Generar()">{{trans('validation.attributes.add')}}</button>
            {!!Form::close()!!}
        </div>

        <a id="btn-back" class="btn btn-info"  href="{{ route('analisis.index')}}">{{trans('validation.attributes.back')}}</a>
    
    </div>
    
@endsection
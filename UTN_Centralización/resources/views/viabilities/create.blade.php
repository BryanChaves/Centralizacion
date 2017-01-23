@extends($view)

@section('content')
    <ul class="breadcrumb">
        <li>
            <i><img src="/img/viabilidad1.png"></i>
            <a>VIABILIDADES</a> 
            <i class="icon-angle-right"></i>
        </li>
        <li><a>CREAR</a></li>
    </ul>
    <div id="panel-create" class="panel panel-default">

        

        <div class="panel-body">
            @include('viabilities.partials.messages') 
            {!!Form::open(['route'=>'viabilidades.store','method'=>'POST','files'=>true])!!}   
                @include('viabilities.partials.fields_Create')                             
                <button type="submit" class="btn btn-info">{{trans('validation.attributes.add')}}</button>
            {!!Form::close()!!}

        </div>

        <a id="btn-back" class="btn btn-info"  href="{{ route('viabilidades.index')}}">{{trans('validation.attributes.back')}}</a>
    
    </div>
@endsection
@extends($view)

@section('content')
    <ul class="breadcrumb">
        <li>
            
            <a>MUESTRAS</a> 
            <i class="icon-angle-right"></i>
        </li>
        <li><a>CREAR</a></li>
    </ul>
    <div id="panel-create" class="panel panel-default">

        <div class="panel-heading">{{trans('validation.attributes.new_sampling')}}</div>

        <div class="panel-body">
            @include('samplings.partials.messages') 
            {!!Form::open(['route'=>'muestras.store','method'=>'POST'])!!}   
                @include('samplings.partials.fields_Create')                             
                <button type="submit" class="btn btn-info">{{trans('validation.attributes.add')}}</button>
            {!!Form::close()!!}

        </div>

        <a id="btn-back" class="btn btn-info"  href="{{ route('muestras.index')}}">{{trans('validation.attributes.back')}}</a>
    
    </div>
@endsection
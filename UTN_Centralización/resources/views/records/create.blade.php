@extends($view)

@section('content')
    <ul class="breadcrumb">
        <li>
            
            <a>REGISTROS</a> 
            <i class="icon-angle-right"></i>
        </li>
        <li><a>CREAR</a></li>
    </ul>
    <div id="panel-create" class="panel panel-default">

        <div class="panel-heading">{{trans('validation.attributes.new_record')}}</div>

        <div class="panel-body">
            @include('records.partials.messages') 
            {!!Form::open(['route'=>'registros.store','method'=>'POST'])!!}   
                @include('records.partials.fields_Create')                             
                <button type="submit" class="btn btn-info">{{trans('validation.attributes.add')}}</button>
            {!!Form::close()!!}

        </div>

        <a id="btn-back" class="btn btn-info"  href="{{ route('registros.index')}}">{{trans('validation.attributes.back')}}</a>
    
    </div>
@endsection
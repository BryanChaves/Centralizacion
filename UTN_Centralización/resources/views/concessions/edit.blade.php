@extends($view)

@section('content')
    <ul class="breadcrumb">
        <li>
            <i><img src="/img/concesiones.png"></i>
            <a>CONCESIONES</a> 
            <i class="icon-angle-right"></i>
        </li>
        <li><a>EDITAR</a></li>
    </ul>
    <div id="panel-update" class="panel panel-default">
        
        

        <div class="panel-body">
            @include('concessions.partials.messages') 
            {!!Form::model($concession,['route'=>['concesiones.update',$concession->id],'method'=>'PUT'])!!}
                @include('concessions.partials.fields_Edit')          
                <button type="submit" class="btn btn-info">{{trans('validation.attributes.update')}}</button>
            {!!Form::close()!!}
        </div>

        <a id="btn-back" class="btn btn-info"  href="{{ route('concesiones.index')}}">{{trans('validation.attributes.back')}}</a>
    
    </div>     
@endsection
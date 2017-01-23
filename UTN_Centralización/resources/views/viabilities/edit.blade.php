@extends($view)

@section('content')
    <ul class="breadcrumb">
        <li>
            <i><img src="/img/viabilidad1.png"></i>
            <a>VIABILIDADES</a> 
            <i class="icon-angle-right"></i>
        </li>
        <li><a>EDITAR</a></li>
    </ul>
    <div id="panel-update" class="panel panel-default">
        
        

        <div class="panel-body">
            @include('viabilities.partials.messages') 
            {!!Form::model($viability,['route'=>['viabilidades.update',$viability->id],'method'=>'PUT'])!!}
                @include('viabilities.partials.fields_Edit')          
                <button type="submit" class="btn btn-info">{{trans('validation.attributes.update')}}</button>
            {!!Form::close()!!}
        </div>

        <a id="btn-back" class="btn btn-info"  href="{{ route('viabilidades.index')}}">{{trans('validation.attributes.back')}}</a>
    
    </div>     
@endsection
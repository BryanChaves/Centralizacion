@extends($view)

@section('content')
    <ul class="breadcrumb">
        <li>
            <i><img src="/img/nivel.png"></i>
            <a>NIVEL PARÁMETRO</a> 
            <i class="icon-angle-right"></i>
        </li>
        <li><a>EDITAR</a></li>
    </ul>
    <div id="panel-update" class="panel panel-default">
        


        <div class="panel-body">
            @include('parameterLevels.partials.messages') 
            {!!Form::model($parameterLevel,['route'=>['nivel-parametros.update',$parameterLevel->id],'method'=>'PUT'])!!}
                @include('parameterLevels.partials.fields_Edit')          
                <button type="submit" class="btn btn-info">{{trans('validation.attributes.update')}}</button>
            {!!Form::close()!!}
        </div>

        <a id="btn-back" class="btn btn-info"  href="{{ route('nivel-parametros.index')}}">{{trans('validation.attributes.back')}}</a>
    
    </div>     
@endsection
@extends($view)

@section('content')
    <ul class="breadcrumb">
        <li>
            <i><img src="/img/expe.png"></i>
            <a>TIPO DE EXPEDIENTE</a> 
            <i class="icon-angle-right"></i>
        </li>
        <li><a>EDITAR</a></li>
    </ul>
    <div id="panel-update" class="panel panel-default">
        
      
        <div class="panel-body">
            @include('fileTypes.partials.messages') 
            {!!Form::model($fileType,['route'=>['tipos-expediente.update',$fileType->id],'method'=>'PUT'])!!}
                @include('fileTypes.partials.fields')          
                <button type="submit" class="btn btn-info">{{trans('validation.attributes.update')}}</button>
            {!!Form::close()!!}
        </div>

        <a id="btn-back" class="btn btn-info"  href="{{ route('tipos-expediente.index')}}">{{trans('validation.attributes.back')}}</a>
    
    </div>     
@endsection
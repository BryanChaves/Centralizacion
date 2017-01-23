@extends($view)

@section('content')
    <ul class="breadcrumb">
        <li>
            <i><img src="/img/userenti.png"></i>
            <a>USUARIO POR ENTIDAD</a> 
            <i class="icon-angle-right"></i>
        </li>
        <li><a>EDITAR</a></li>
    </ul>
    <div id="panel-update" class="panel panel-default">
        
     

        <div class="panel-body">
            @include('usersEntities.partials.messages') 
            {!!Form::model($userEntity,['route'=>['usuarios-entidades.update',$userEntity->id],'method'=>'PUT'])!!}
                @include('usersEntities.partials.fields_Edit')          
                <button type="submit" class="btn btn-info">{{trans('validation.attributes.update')}}</button>
            {!!Form::close()!!}
        </div>

        <a id="btn-back" class="btn btn-info"  href="{{ route('usuarios-entidades.index')}}">{{trans('validation.attributes.back')}}</a>
    
    </div>     
@endsection
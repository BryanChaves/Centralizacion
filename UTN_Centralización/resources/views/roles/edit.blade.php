@extends($view)

@section('content')
    <ul class="breadcrumb">
        <li>
            <i><img src="/img/rol.png"></i>
            <a>ROLES</a> 
            <i class="icon-angle-right"></i>
        </li>
        <li><a>EDITAR</a></li>
    </ul>
    <div id="panel-update" class="panel panel-default">
        
        

        <div class="panel-body">
            @include('roles.partials.messages') 
            {!!Form::model($rol,['route'=>['roles.update',$rol->id],'method'=>'PUT'])!!}
                @include('roles.partials.fields_Edit')          
                <button type="submit" class="btn btn-info">{{trans('validation.attributes.update')}}</button>
            {!!Form::close()!!}
        </div>

        <a id="btn-back" class="btn btn-info"  href="{{ route('roles.index')}}">{{trans('validation.attributes.back')}}</a>
    
    </div>     
@endsection
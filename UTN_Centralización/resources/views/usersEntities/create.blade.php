@extends($view)

@section('content')
    <ul class="breadcrumb">
        <li>
            <i><img src="/img/userenti.png"></i>
            <a>USUARIO POR ENTIDAD</a> 
            <i class="icon-angle-right"></i>
        </li>
        <li><a>CREAR</a></li>
    </ul>
    <div class="message" id="messages"> 
        @if(Session::has('message'))
            <p id="message">{{Session::get('message')}}<button id="btn-close" type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></p>                               
        @endif
    </div>
    <div id="panel-create" class="panel panel-default">



        <div class="panel-body">
            @include('usersEntities.partials.messages') 
            {!!Form::open(['route'=>'usuarios-entidades.store','method'=>'POST'])!!}   
                @include('usersEntities.partials.fields_Create')                             
                <button type="submit" class="btn btn-info">{{trans('validation.attributes.add')}}</button>
            {!!Form::close()!!}

        </div>

        <a id="btn-back" class="btn btn-info"  href="{{ route('usuarios-entidades.index')}}">{{trans('validation.attributes.back')}}</a>
    
    </div>
@endsection
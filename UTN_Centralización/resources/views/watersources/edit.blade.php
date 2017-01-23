@extends($view)

@section('content')
    <ul class="breadcrumb">
        <li>
            <i><img src="/img/naciente.png"></i>
            <a>NACIENTES</a> 
            <i class="icon-angle-right"></i>
        </li>
        <li><a>EDITAR</a></li>
    </ul>
    <div id="panel-update" class="panel panel-default">
        
        

        <div class="panel-body">
            @include('watersources.partials.messages') 
            {!!Form::model($watersource,['route'=>['nacientes.update',$watersource->id],'method'=>'PUT'])!!}
                @include('watersources.partials.fields')          
                <button type="submit" class="btn btn-info">{{trans('validation.attributes.update')}}</button>
            {!!Form::close()!!}
        </div>

        <a id="btn-back" class="btn btn-info"  href="{{ route('nacientes.index')}}">{{trans('validation.attributes.back')}}</a>
    
    </div>     
@endsection
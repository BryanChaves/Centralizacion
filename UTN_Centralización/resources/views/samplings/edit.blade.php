@extends($view)

@section('content')
    <ul class="breadcrumb">
        <li>
            
            <a>MUESTRAS</a> 
            <i class="icon-angle-right"></i>
        </li>
        <li><a>EDITAR</a></li>
    </ul>
    <div id="panel-update" class="panel panel-default">
        
        <div class="panel-heading">{{trans('validation.attributes.update_sampling')}}</div>

        <div class="panel-body">
            @include('samplings.partials.messages') 
            {!!Form::model($sampling,['route'=>['muestras.update',$sampling->id],'method'=>'PUT'])!!}
                @include('samplings.partials.fields_Edit')          
                <button type="submit" class="btn btn-info">{{trans('validation.attributes.update')}}</button>
            {!!Form::close()!!}
        </div>

        <a id="btn-back" class="btn btn-info"  href="{{ route('muestras.index')}}">{{trans('validation.attributes.back')}}</a>
    
    </div>     
@endsection
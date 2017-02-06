
@extends($view)

@section('content')
<ul class="breadcrumb">
    <li>
        <i><img src="/img/expe.png"></i>
        <a>EXPEDIENTE</a> 
        <i class="icon-angle-right"></i>
    </li>
</ul>
                             
<a href="{{route('expedientes.index')}}" class="btn btn-primary btn-block" role="button">{{trans('validation.attributes.list')}}</a>
<a href="{{route('tipos-expediente.index')}}" class="btn btn-primary btn-block" role="button">{{trans('validation.attributes.types')}}</a>


@endsection
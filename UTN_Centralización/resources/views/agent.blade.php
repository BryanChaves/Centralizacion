@extends('dashboard')

@section('nav')

<div id="sidebar-left" class="span2">
    <div class="nav-collapse sidebar-nav">
        <ul class="nav nav-tabs nav-stacked main-menu">           
            <li>
                <a class="dropmenu" href="#"><i class="icon-folder-close-alt"></i><span class="hidden-tablet"> {{trans('validation.attributes.users')}}</span></a>
                <ul>
                    
                    <li><a class="submenu" href="{{route('usuarios.index')}}"><i class="icon-file-alt"></i><span class="hidden-tablet"> {{trans('validation.attributes.users')}}</span></a></li>                                       
                </ul>   
            </li>
            <li>
                <a class="dropmenu" href="#"><i class="icon-folder-close-alt"></i><span class="hidden-tablet"> {{trans('validation.attributes.watersources')}}</span></a>
                <ul>    
                    <li><a class="submenu" href="{{route('nacientes.index')}}"><i class="icon-file-alt"></i><span class="hidden-tablet"> {{trans('validation.attributes.watersources')}}</span></a></li>
                    <li><a class="submenu" href="{{route('concesiones.index')}}"><i class="icon-file-alt"></i><span class="hidden-tablet"> {{trans('validation.attributes.concessions')}}</span></a></li>
                    <!--<li><a class="submenu" href="{{route('viabilidades.index')}}"><i class="icon-file-alt"></i><span class="hidden-tablet"> {{trans('validation.attributes.viabilities')}}</span></a></li> -->                                         
                </ul>   
            </li>
            <li>
                <a class="dropmenu" href="#"><i class="icon-folder-close-alt"></i><span class="hidden-tablet"> {{trans('validation.attributes.measurements')}}</span></a>
                <ul>     
                    <li><a class="submenu" href="{{route('medicion-caudal.index')}}"><i class="icon-file-alt"></i><span class="hidden-tablet"> {{trans('validation.attributes.flow_measurement')}}</span></a></li>
                    <li><a class="submenu" href="{{route('analisis.index')}}"><i class="icon-file-alt"></i><span class="hidden-tablet"> {{trans('validation.attributes.analysis')}}</span></a></li>  
                    <li><a class="submenu" href="{{route('sitios-muestreo.index')}}"><i class="icon-file-alt"></i><span class="hidden-tablet"> {{trans('validation.attributes.sampling_sites')}}</span></a></li>
                    <li><a class="submenu" href="{{route('muestras.index')}}"><i class="icon-file-alt"></i><span class="hidden-tablet"> {{trans('validation.attributes.samplings')}}</span></a></li>  
                    <li><a class="submenu" href="{{route('registros.index')}}"><i class="icon-file-alt"></i><span class="hidden-tablet"> {{trans('validation.attributes.records')}}</span></a></li>                                        
                </ul>   
            </li>
            <li>
                <a class="dropmenu" href="#"><i class="icon-folder-close-alt"></i><span class="hidden-tablet"> {{trans('validation.attributes.reports')}}</span></a>
                <ul>    
                    <li><a class="submenu" href="{{route('aforos.index')}}"><i class="icon-file-alt"></i><span class="hidden-tablet"> {{trans('validation.attributes.capabilities')}}</span></a></li>
                    <li><a class="submenu" href="{{route('calidades.index')}}"><i class="icon-file-alt"></i><span class="hidden-tablet"> {{trans('validation.attributes.quality')}}</span></a></li>                                       
                </ul>   
            </li>                   
        </ul>
    </div>
</div>

@endsection

@section('body')
  

@yield('content')
   

@endsection
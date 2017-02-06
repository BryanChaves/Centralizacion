@extends('dashboard')

@section('nav')
<div id="sidebar-left" class="span2">
    <div class="nav-collapse sidebar-nav">
        <ul class="nav nav-tabs nav-stacked main-menu">
        	<li>
    			<a class="dropmenu" href="#"><i class="icon-folder-close-alt"></i><span class="hidden-tablet"> {{trans('validation.attributes.legal')}}</span></a>
    			<ul>     
        			@include('section1')
                    	                                             
    			</ul>  

			</li>
			<li>
    			<a class="dropmenu" href="#"><i class="icon-folder-close-alt"></i><span class="hidden-tablet"> {{trans('validation.attributes.users')}}</span></a>
    			<ul>
        			@include('section2')
        			<li><a class="submenu" href="{{route('roles.index')}}"><i class="icon-file-alt"></i><span class="hidden-tablet"> {{trans('validation.attributes.roles')}}</span></a></li>
    			</ul>   
			</li>
			<li>
    			<a class="dropmenu" href="#"><i class="icon-folder-close-alt"></i><span class="hidden-tablet"> {{trans('validation.attributes.watersources')}}</span></a>
    			<ul>
        			@include('section3')		
        		</ul>   
			</li>
			<li>
    			<a class="dropmenu" href="#"><i class="icon-folder-close-alt"></i><span class="hidden-tablet"> {{trans('validation.attributes.measurements')}}</span></a>
    			<ul>    
    				@include('section4')
    				<li><a class="submenu" href="{{route('nivel-parametros.index')}}"><i class="icon-file-alt"></i><span class="hidden-tablet"> {{trans('validation.attributes.parameter_level')}}</span></a></li> 
        			<li><a class="submenu" href="{{route('parametros.index')}}"><i class="icon-file-alt"></i><span class="hidden-tablet"> {{trans('validation.attributes.parameters')}}</span></a></li>
        		</ul>   
			</li>
			<li>
    			<a class="dropmenu" href="#"><i class="icon-folder-close-alt"></i><span class="hidden-tablet"> {{trans('validation.attributes.reports')}}</span></a>
    			<ul>    
        			@include('section5')    
    			</ul>   
			</li>
        </ul>
    </div>
</div>
@endsection

@section('body')

@yield('content')
   

@endsection


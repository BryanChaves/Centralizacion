@extends($view)

@section('content')
    <ul class="breadcrumb">
        <li>
            <i><img src="/img/calidad.png"></i>
            <li><a>REPORTES DE</a></li>
            <a>CALIDAD</a> 
            <i class="icon-angle-right"></i>
        </li>
    </ul>
    <div class="message" id="messages"> 
        @if(Session::has('message'))
            <p id="message">{{Session::get('message')}}<button id="btn-close" type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></p>                               
        @endif
    </div>
    @include('reports.quality.partials.messages') 

	<div id="panel-user" class="panel panel-default">
		
		{!!Form::open(['route'=>'calidades.store','method'=>'POST', 'onsubmit'=>'return form2();'])!!} 
      		<div class="form-group">   
    <div class="form-group">
          <label class="control-label">{{trans('validation.attributes.check_points')}}</label>
          <select id="F1" onchange="cargarCombo()" name="F1">
          <option value=" " selected="selected">Seleccione punto de Control</option>
            <option value="watersource">Nacientes</option>
            <option value="sampling_site">Muestreos aleatorios</option>
          </select>
         </div> 
<div class="form-group" id="div">
  <select class="text" name="combo"  id="combo">
  </select>
</div> 
			</div> 
			<div class="form-group">
  				<label class="control-label">{{trans('validation.attributes.startDate')}}</label>
  				<div class='input-group date' id='datetimepicker1'>
    			<input type='text' name='startDate' class='text' id='date5' readonly />
    			<span class="input-group-addon">
      				<span class="glyphicon glyphicon-calendar"></span>
    			</span>
  				</div>
			</div>
			<div class="form-group">
  				<label class="control-label">{{trans('validation.attributes.endDate')}}</label>
  				<div class='input-group date' id='datetimepicker1'>
    			<input type='text' name='endDate' class='text' id='date6' readonly />
    			<span class="input-group-addon">
      				<span class="glyphicon glyphicon-calendar"></span>
    			</span>
  				</div>
			</div>
        	<button id="btn-search" type="submit" class="btn btn-default">{{trans('validation.attributes.search')}}</button>
      	{!!Form::close()!!}
    </div>

@endsection
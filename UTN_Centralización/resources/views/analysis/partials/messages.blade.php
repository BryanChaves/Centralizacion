@if($errors->any())
	<div class="alert alert-danger">
		<strong>{{trans('validation.attributes.expression')}}</strong> {{trans('validation.attributes.problem')}}<br><br>
		<ul>
			@foreach ($errors->all() as $error)
			    <li>{{ $error }}</li>
			@endforeach
		</ul>
	</div>
@endif
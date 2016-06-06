@if(Session::get('successmessage') != null)
	<div class="alert alert-success" role="alert">
		<strong>{{ trans('message.successtitle') }}</strong> {{ Session::get('successmessage') }}
	</div>
@endif

@if(Session::get('infomessage') != null)
	<div class="alert alert-info" role="alert">
		<strong>{{ trans('message.infotitle') }}</strong> {{ Session::get('infomessage') }}
	</div>
@endif

@if(Session::get('warningmessage') != null)
	<div class="alert alert-warning" role="alert">
		<strong>{{ trans('message.warningtitle') }}</strong> {{ Session::get('warningmessage') }}
	</div>
@endif

@if(Session::get('errormessage') != null)
	<div class="alert alert-danger" role="alert">
		<strong>{{ trans('message.dangertitle') }}</strong> {{ Session::get('errormessage') }}
	</div>
@endif

@if(count($errors->all()) > 0)
	<div class="alert alert-danger" role="alert">
		@foreach ($errors->all() as $error)
			<strong>{{ trans('message.dangertitle') }}</strong> {{ $error }} <br>
		@endforeach
	</div>
@endif
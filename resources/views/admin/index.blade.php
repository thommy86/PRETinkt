@extends('layouts.master')

@section('content')
	<!--Start Blog-->
	<div class="blog">
		<div class="container">

			<!--Start breadcrumbs-->
			<ul class="tz-breadcrumbs">
				<li>
					<a href="/">{{ trans('admin.home') }}</a>
				</li>
				<li class="current">
					{{ trans('admin.admin') }}
				</li>
			</ul>
			<!--End breadcrumbs-->
			
			{{ Session::get('message') }}
			@foreach ($errors->all() as $error)
				{{ $error }} <br>
			@endforeach
			
			<h1>Admin<h1>
			
		</div>
	</div>
	<!--End Start Blog-->
@endsection
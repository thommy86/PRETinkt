@extends('layouts.master')

@section('content')
	<!--Start Blog-->
	<div class="blog">
		<div class="container">

			<!--Start breadcrumbs-->
			<ul class="tz-breadcrumbs">
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
			
			<a href="/admin/search">{{ trans('admin.search') }}</a><br>
			<a href="/admin/faq">{{ trans('admin.faq') }}</a><br>
			<a href="/admin/products">{{ trans('admin.products') }}</a><br>
			
		</div>
	</div>
	<!--End Start Blog-->
@endsection
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
			
			@include('layouts.message')
			
			<h1>{{ trans('admin.admin') }}<h1>
			
				
				<div class="product-item col-md-4 col-sm-6">
					<a href="/admin/search"><img src="/public/images/admin/search.png"><br>{{ trans('admin.search') }}</a><br>
				</div>
				<div class="product-item col-md-4 col-sm-6">					
					<a href="/admin/faq"><img src="/public/images/admin/FAQ.png"><br>{{ trans('admin.faq') }}</a><br>
				</div>
				<div class="product-item col-md-4 col-sm-6">
					<a href="/admin/products"><img src="/public/images/admin/products.png"><br>{{ trans('admin.products') }}</a><br>
				</div>
			
		</div>
	</div>
	<!--End Start Blog-->
@endsection
@extends('layouts.master')

@section('content')
	<!--Start Blog-->
	<div class="blog">
		<div class="container">

			<!--Start breadcrumbs-->
			<ul class="tz-breadcrumbs">
				<li>
					<a href="/">{{ trans('checkout.home') }}</a>
				</li>
                <li>
                    <a href="/cart">{{ trans('checkout.cart') }}</a>
                </li>
                <li>
                    <a href="/cart/checkout">{{ trans('checkout.checkout') }}</a>
                </li>
				<li class="current">
					{{ trans('checkout.pay') }}
				</li>
			</ul>
			<!--End breadcrumbs-->
			
			@include('layouts.message')
			
			<div class="blog-container">
				<div class="row">
					<div class="col-md-12">

						<!--Blog Content-->
						<div class="row">
							<div class="col-md-12">

								<!--Content-->
								<article class="single-blog">

									<h1>{{ trans('checkout.paytext') }}</h1>
									<p>{{ trans('checkout.yourpaymethod') }}: {{ $payMethod }}</p>
									<div class="single-content">
										<form action="/cart/checkout/pay" method="post">
											<input type="hidden" name="_token" value="{{ csrf_token() }}">
											<input type="hidden" name="id" value="{{ $bestelling->id }}">
											<button type="submit" class="update-cart">{{ trans('checkout.pay') }}</button>
										</form>
									</div>

							</div>
						</div>
						<!--End Blog Content-->
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--End Start Blog-->
@endsection
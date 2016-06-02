@extends('layouts.master')

@section('content')
	<!--Start Blog-->
	<div class="blog">
		<div class="container">

			<!--Start breadcrumbs-->
			<ul class="tz-breadcrumbs">
				<li>
					<a href="/">{{ trans('cart.home') }}</a>
				</li>
				<li>
					<a href="/cart">{{ trans('cart.cart') }}</a>
				</li>
				<li class="current">
					{{ trans('cart.selectregion') }}
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

									<h1>{{ trans('cart.selectregion') }}</h1>
									<div class="single-content">
										<p>
											{{ trans('cart.selectregiontext') }}
										</p>
										<form accept="/cart/selectregion" method="post" id="commentform" class="contact-form-7">
											<input type="hidden" name="_token" value="{{ csrf_token() }}">
											<p class="comment-for-content">
												<select name="region">
													<option value="1">{{ trans('cart.europe') }}</option>
													<option value="2">{{ trans('cart.world') }}</option>
												</select>
											</p>
				                            <p class="comment-for-submit">
				                                <input name="submit" type="submit" id="submit" class="submit" value="{{ trans('cart.submit') }}">
				                            </p>
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
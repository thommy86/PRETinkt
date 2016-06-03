@extends('layouts.master')

@section('content')
	<!--Start shop single-->
    <section class="tz-shop-single">
        <div class="container">

            <!--Start Breadcrumbs-->
            <ul class="tz-breadcrumbs">
                <li>
                    <a href="/">{{ trans('product.home') }}</a>
                </li>
                <li class="current">
                    {{ trans('product.product') }}
                </li>
            </ul>
            <!--End Breadcrumbs-->
			
			@include('layouts.message')
			
			<div class="row">
				<div class="col-md-6 col-sm-6">

					<!--Shop images-->
					<div class="shop-images">
						<ul class="single-gallery">
							<li>
								<img src="/public/images/product/{{ $product->afbeelding }}">
							</li>
						</ul>
					</div>
					<!--End shop image-->
				</div>
				<div class="col-md-6 col-sm-6">
					<!--Shop content-->
					<div class="entry-summary">
						<h1>{{ $product->name }}</h1>
						@if ($product->rating > 0)
						<span class="p-vote">
							<i class="fa fa-star"></i>
							@if ($product->rating > 1)
							<i class="fa fa-star"></i>
							@endif
							@if ($product->rating > 2)
							<i class="fa fa-star"></i>
							@endif
							@if ($product->rating > 3)
							<i class="fa fa-star"></i>
							@endif
							@if ($product->rating > 4)
							<i class="fa fa-star"></i>
							@endif
						</span>
						@endif
						<p class="product-price">
							<span class="price">&euro;{{ number_format(round($product->prijs + ($product->prijs * $product->BTW), 2), 2) }}/span>
							<span class="stock">{{ trans('product.stock') }}:  <span>{{ $product->voorraad }}</span></span>
						</p>
						<div class="description">
							<p>
								{{ $product->description }}
							</p>
						</div>
						<form class="tz_variations_form" action="/cart/add" method="post">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<input type="hidden" name="id" value="{{ $product->id }}">
							<p class="form-attr">
								<span class="tzqty">
									<label>{{ trans('product.quantity') }}:</label>
									<input type="number" step="1" min="1" name="quantity" value="1" title="Qty" class="input-text qty text" size="4" required>
								</span>
							</p>
							<p>
								<button type="submit" class="single_add_to_cart_button">{{ trans('product.addtocart') }}</button>
								<a href="/wishlist/set/{{ $product->id }}" class="single_add_to_wishlist">{{ trans('product.addtowishlist') }}</a>
							</p>
						</form>
					</div>
					<!--End shop content-->
				</div>
			</div>
		</div>
	<section>
@endsection
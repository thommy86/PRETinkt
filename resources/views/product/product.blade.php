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
			
			{{ Session::get('message') }}
			@foreach ($errors->all() as $error)
				{{ $error }} <br>
			@endforeach
			
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
						<span class="p-vote">
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star-half-o"></i>
						</span>
						<p class="product-price">
							<span class="price">{{ $product->price }}</span>
							<span class="stock">{{ trans('product.stock') }}:  <span>{{ $product->voorraad }}</span></span>
						</p>
						<div class="description">
							<p>
								{{ $product->description }}
							</p>
						</div>
						<form class="tz_variations_form ">
							<p class="form-attr">
								<span class="tzqty">
									<label>{{ trans('product.quantity') }}:</label>
									<input type="number" step="1" min="1" name="quantity" value="1" title="Qty" class="input-text qty text" size="4">
								</span>
							</p>
							<p>
								<button type="submit" class="single_add_to_cart_button">{{ trans('product.addtocart') }}</button>
								<button type="submit" class="single_add_to_wishlist">{{ trans('product.addtowishlist') }}</button>
							</p>
						</form>
					</div>
					<!--End shop content-->
				</div>
			</div>
		</div>
	<section>
@endsection
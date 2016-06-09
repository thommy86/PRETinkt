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
                <li>
                    <a href="/products">{{ trans('product.products') }}</a>
                </li>
                <li class="current">
                    {{ $product->naam }}
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
								<img width="570" height="373" src="/public/imageUpload/{{ $product->afbeelding }}">
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
							<span class="price">&euro;{{ number_format(round($product->prijs + ($product->prijs * $product->BTW), 2), 2) }}</span>
							<span class="stock">{{ trans('product.stock') }}:
							@if(count($product->voorraad) > 0)
								<span>{{ trans('product.instock') }}</span>
							@else
								<span>{{ trans('product.notavailable') }}</span>
							@endif
							</span>
						</p>
						<div class="widget-size-filter">
							<h3>{{ trans('product.details') }}</h3>
							<ul>
								<li>{{ trans('product.brand') }}:  <span>{{ $product->merk }}</span></li>
								@if ($product->kleur == "BLACK")
								<li>{{ trans('product.colour') }}:  <span>{{ trans('product.black') }}</span></li>
								@elseif ($product->kleur == "COLOUR")
								<li>{{ trans('product.colour') }}:  <span>{{ trans('product.colour') }}</span></li>
								@elseif ($product->kleur == "CYAN")
								<li>{{ trans('product.colour') }}:  <span>{{ trans('product.cyan') }}</span></li>
								@elseif ($product->kleur == "MAGENTA")
								<li>{{ trans('product.colour') }}:  <span>{{ trans('product.magenta') }}</span></li>
								@elseif ($product->kleur == "YELLOW")
								<li>{{ trans('product.colour') }}:  <span>{{ trans('product.yellow') }}</span></li>
								@endif 
								<li>{{ trans('product.brand') }}:  <span>{{ $product->merk }}</span></li>
								<li>{{ trans('product.capacity') }}:  <span>{{ $product->capaciteit }}</span></li>
							</ul>
						</div>
						<div class="description">
							<h3>{{ trans('product.description') }}</h3>
							<p>
								{{ $lang == "nl" ? $product->omschrijving : $product->description }}
							</p>
						</div>
						<form class="tz_variations_form" action="/cart/add" method="post">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<input type="hidden" name="id" value="{{ $product->id }}">
							<p class="form-attr">
								<span class="color">
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
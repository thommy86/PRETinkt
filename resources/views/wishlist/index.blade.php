@extends('layouts.master')

@section('content')
	<section class="shop-checkout">
        <div class="container">
            <!--Start Breadcrumbs-->
            <ul class="tz-breadcrumbs">
                <li>
                    <a href="/">{{ trans('wishlist.home') }}</a>
                </li>
                <li class="current">
                    {{ trans('wishlist.wishlist') }}
                </li>
            </ul>
            <!--End Breadcrumbs-->
			
			@include('layouts.message')
			
            <h1 class="page-title">{{ trans('wishlist.wishlist') }}</h1>

            <!--Start form table-->
            <form>
                <table class="shop_table cart">
                    <!--Table header-->
                    <thead>
                        <tr>
                            <th class="product-remove">&nbsp;</th>
                            <th class="product-thumbnail">{{ trans('wishlist.product') }}</th>
                            <th class="product-name">&nbsp;</th>
                            <th class="product-price">{{ trans('wishlist.price') }}</th>
                        </tr>
                    </thead>
                    <!--End table header-->

                    <!--Table body-->
                    <tbody>

						@foreach ($products as $product)
							<tr class="cart_item">
								<td class="product-remove">
									<a href="/wishlist/del/{{ $product->id }}" class="remove" title="Remove this item"></a>
								</td>
								<td class="product-thumbnail">
									<a href="/product/{{ $product->id }}"><img src="/public/images/product/{{ $product->afbeelding }}" /></a>
								</td>

								<td class="product-name">
									<a href="/product/{{ $product->id }}">{{ $product->naam }} </a>
								</td>
								<td class="product-price">
									<span class="amount">{{ $product->prijs }}</span>
								</td>
							</tr>
						@endforeach
                        <tr>
                            <td class="actions" colspan="6">
                                <a class="back-shop" href="/products"><i class="fa fa-angle-left"></i> {{ trans('cart.backtoshop') }}</a>
                            </td>
                        </tr>

                    </tbody>
                    <!--End table body-->
                </table>
            </form>
            <!--End form table-->
        </div>
    </section>
@endsection
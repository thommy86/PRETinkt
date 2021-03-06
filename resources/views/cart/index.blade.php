@extends('layouts.master')

@section('content')
	<section class="shop-checkout">
        <div class="container">
            <!--Start Breadcrumbs-->
            <ul class="tz-breadcrumbs">
                <li>
                    <a href="/">{{ trans('cart.home') }}</a>
                </li>
                <li class="current">
                    {{ trans('cart.cart') }}
                </li>
            </ul>
            <!--End Breadcrumbs-->
			
			@include('layouts.message')
			
            <h1 class="page-title">{{ trans('cart.cart') }}</h1>

            <!--Start form table-->
            <form action="/cart/update" method="post">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
                <table class="shop_table cart">
                    <!--Table header-->
                    <thead>
                        <tr>
                            <th class="product-remove">&nbsp;</th>
                            <th class="product-thumbnail">{{ trans('cart.product') }}</th>
                            <th class="product-name">&nbsp;</th>
                            <th class="product-price">{{ trans('cart.price') }}</th>
                            <th class="product-quantity">{{ trans('cart.quantity') }}</th>
                            <th class="product-subtotal">{{ trans('cart.total') }}</th>
                        </tr>
                    </thead>
                    <!--End table header-->

                    <!--Table body-->
                    <tbody>
						<?php
							$subtotal = 0;
						?>
						@if (count($products) == 0)
							<tr>
								<td colspan="6">
									{{ trans('cart.noproductitems') }}
								</td>
							</tr>
						@endif
						@foreach ($products as $product)
							<?php $subtotal += ValutaHelper::CalculatePriceQuantity($product->prijs, $product->BTW, $product->quantity); ?>
							<input type="hidden" name="ids[]" value="{{ $product->id }}">
							<tr class="cart_item">
								<td class="product-remove">
									<a href="/cart/del/{{ $product->id }}" class="remove"></a>
								</td>
								<td class="product-thumbnail">
									<a href="/product/{{ $product->id }}"><img width="78" height="78" src="/public/imageUpload/{{ $product->afbeelding }}" /></a>
								</td>

								<td class="product-name">
									<a href="/product/{{ $product->id }}">{{ $product->naam }} </a>
								</td>
								<td class="product-price">
									<span class="amount">&euro;{{ ValutaHelper::CalculatePrice($product->prijs, $product->BTW) }}</span>
								</td>

								<td class="product-quantity">
									<div class="quantity"><input type="number" step="1" min="0" name="quantities[]" value="{{ $product->quantity }}" title="Qty" class="input-text qty text" size="4"></div>
								</td>

								<td class="product-subtotal">
									<span class="amount">&euro;{{ ValutaHelper::CalculatePriceQuantity($product->prijs, $product->BTW, $product->quantity) }}</span>
								</td>
							</tr>
						@endforeach
						<tr>
                            <td class="actions" colspan="6">
                                <a class="back-shop" href="/products"><i class="fa fa-angle-left"></i> {{ trans('cart.backtoshop') }}</a>
								@if (count($products) > 0)
									<button class="update-cart" type="submit">{{ trans('cart.updatecart') }}</button>
								@endif
                            </td>
                        </tr>

                    </tbody>
                    <!--End table body-->
                </table>
            </form>
            <!--End form table-->

            <!--Cart attr-->
            @if (count($products) > 0)
            <div class="row">
                <div class="col-md-6 col-sm-6">
				
                </div>
                <div class="col-md-6 col-sm-6">

                    <!--Cart totals-->
                    <div class="cart_totals">
                        <div class="cart_totals_inner">
                            <table>
                                <tbody>
                                    <tr class="cart-subtotal">
                                        <th>{{ trans('cart.subtotal') }}</th>
                                        <td><span class="amount">&euro;{{ ValutaHelper::RoundValue($subtotal) }}</span></td>
                                    </tr>
                                    <tr class="cart-subtotal">
                                        <th>{{ trans('cart.shipping') }}</th>
                                        <td><span class="amount">&euro;{{ ValutaHelper::RoundValue($shipping) }}</span></td>
                                    </tr>
                                    <tr class="order-total">
                                        <th>{{ trans('cart.total') }}</th>
                                        <td><span class="amount">&euro;{{ ValutaHelper::RoundValue($subtotal + $shipping) }}</span></td>
                                    </tr>
									@if (count($products) > 0)
										<tr>
											<td class="actions" colspan="6">
												<a href="/cart/checkout" class="update-cart">{{ trans('cart.checkout') }}</a>
											</td>
										</tr>
									@endif
                                </tbody>
                            </table>
                        </div>

                    </div>
                    <!--End cart totals-->

                </div>
            </div>
            @endif
            <!--End cart attr-->
        </div>
    </section>
@endsection
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
			
            <h1 class="page-title">{{ trans('cart.cart') }}</h1>

            <!--Start form table-->
            <form>
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

						@foreach ($products as $product)
							<tr class="cart_item">
								<td class="product-remove">
									<a href="cart/del/{{ $product->id }}" class="remove" title="Remove this item"></a>
								</td>
								<td class="product-thumbnail">
									<!--<a href="#"><img src="/public/images/product/{{ $product->afbeelding }}" /></a>-->
									<a href="#"><img src="/public/images/product/widget1.jpg" /></a>
								</td>

								<td class="product-name">
									<a href="#">{{ $product->naam }} </a>
								</td>
								<td class="product-price">
									<span class="amount">{{ $product->prijs }}</span>
								</td>

								<td class="product-quantity">
									<div class="quantity"><input type="number" step="1" min="0" name="cart" value="1" title="Qty" class="input-text qty text" size="4"></div>
								</td>

								<td class="product-subtotal">
									<span class="amount">$229.00</span>
								</td>
							</tr>
						@endforeach
                        <tr>
                            <td class="actions" colspan="6">
                                <a class="back-shop" href="/products"><i class="fa fa-angle-left"></i> {{ trans('cart.backtoshop') }}</a>
                                <button class="update-cart" type="submit">{{ trans('cart.updatecart') }}</button>
                            </td>
                        </tr>

                    </tbody>
                    <!--End table body-->
                </table>
            </form>
            <!--End form table-->

            <!--Cart attr-->
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
                                        <td><span class="amount">$293.00</span></td>
                                    </tr>
                                    <tr class="cart-subtotal">
                                        <th>{{ trans('cart.shipping') }}</th>
                                        <td><span class="amount">$7.00</span></td>
                                    </tr>
                                    <tr class="order-total">
                                        <th>{{ trans('cart.total') }}</th>
                                        <td><span class="amount">$300.00</span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                    <!--End cart totals-->

                </div>
            </div>
            <!--End cart attr-->
        </div>
    </section>
@endsection
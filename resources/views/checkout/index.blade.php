@extends('layouts.master')

@section('content')
	<section class="shop-cart">
        <div class="container">
            <!--Start Breadcrumbs-->
            <ul class="tz-breadcrumbs">
                <li>
                    <a href="/">{{ trans('checkout.home') }}</a>
                </li>
                <li>
                    <a href="/cart">{{ trans('checkout.cart') }}</a>
                </li>
                <li class="current">
                    {{ trans('checkout.checkout') }}
                </li>
            </ul>
            <!--End Breadcrumbs-->
            
            @include('layouts.message')

            <form action="/cart/checkout" method="post">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
	            <div class="row">
	                <div class="col-md-6">
	                    <h1 class="page-title">{{ trans('checkout.checkout') }}</h1>
						<!--Start form checkout-->
                        <div class="shop-billing-fields">
                            <h3>{{ trans('checkout.billingdetails') }}</h3>
                            <p class="form-row form-row-first">
                                <label for="first_name">{{ trans('checkout.firstname') }} <span class="required">*</span></label>
                                <input type="text" class="input-text" name="firstname" id="firstname" placeholder="{{ trans('checkout.firstname') }}" value="{{ old('firstname') }}" required>
                            </p>
                            <p class="form-row form-row-last">
                                <label for="prefix">{{ trans('checkout.prefix') }} </label>
                                <input type="text" class="input-text" name="prefix" id="prefix" placeholder="{{ trans('checkout.prefix') }}" value="{{ old('prefix') }}">
                            </p>
                            <div class="clear"></div>
                            <p class="form-row form-row-first">
                                <label for="last_name">{{ trans('checkout.lastname') }} <span class="required">*</span></label>
                                <input type="text" class="input-text" name="lastname" id="lastname" placeholder="{{ trans('checkout.lastname') }}" value="{{ old('lastname') }}" required>
                            </p>
                            <div class="clear"></div>
                            <p class="form-row">
                                <label for="address">{{ trans('checkout.street') }} <span class="required">*</span></label>
                                <input type="text" class="input-text" name="street" id="street" placeholder="{{ trans('checkout.street') }}" value="{{ old('street') }}" required>
                            </p>
                            <div class="clear"></div>
							<p class="form-row form-row-first">
                                <label for="number">{{ trans('checkout.number') }} <span class="required">*</span></label>
                                <input type="text" class="input-text" name="number" id="number" placeholder="{{ trans('checkout.number') }}" value="{{ old('number') }}" required>
                            </p>
							<p class="form-row form-row-last">
                                <label for="number">{{ trans('checkout.addition') }} </label>
                                <input type="text" class="input-text" name="addition" id="addition" placeholder="{{ trans('checkout.addition') }}" value="{{ old('addition') }}">
                            </p>
                            <div class="clear"></div>
                            <p class="form-row form-row-first">
                                <label for="city">{{ trans('checkout.city') }} <span class="required">*</span></label>
                                <input type="text" class="input-text" name="city" id="city" placeholder="{{ trans('checkout.city') }}" value="{{ old('city') }}" required>
                            </p>
                            <p class="form-row form-row-last">
                                <label for="zip">{{ trans('checkout.zip') }} <span class="required">*</span></label>
                                <input type="text" class="input-text" name="zip" id="zip" placeholder="{{ trans('checkout.zip') }}" value="{{ old('zip') }}" required>
                            </p>
                            <div class="clear"></div>
                            <p class="form-row">
                                <label for="country">{{ trans('checkout.country') }} <span class="required">*</span></label>
                                <input type="text" class="input-text" name="country" id="country" placeholder="{{ trans('checkout.country') }}" value="{{ old('country') }}" required>
                            </p>
                            <div class="clear"></div>
                            <p class="form-row form-row-first">
                                <label for="email">{{ trans('checkout.email') }} <span class="required">*</span></label>
                                <input type="email" class="input-text" name="email" id="email" placeholder="{{ trans('checkout.email') }}" value="{{ old('email') }}" required>
                            </p>
                            <p class="form-row form-row-last">
                                <label for="phone">{{ trans('checkout.phone') }} <span class="required">*</span></label>
                                <input type="tel" class="input-text" name="phone" id="phone" placeholder="{{ trans('checkout.phone') }}" value="{{ old('phone') }}" required>
                            </p>
                            <p class="form-row form-row-first">
                                <label for="birthday">{{ trans('checkout.birthday') }} <span class="required">*</span></label>
                                <input type="date" class="input-text" name="birthday" id="birthday" placeholder="{{ trans('checkout.birthday') }}" value="{{ old('birthday') }}" required>
                            </p>
                        </div>
	                    <!--End form checkout-->
	
	                </div>
	                <div class="col-md-6">
	
	                    <!--Order review-->
	                    <div id="order_review">
	                        <h3>{{ trans('checkout.yourorder') }}</h3>
	
	                        <!--Shop table-->
	                        <table class="shop_table">
	                            <thead>
	                                <tr>
	                                    <th class="product-name">{{ trans('checkout.product') }}</th>
	                                    <th class="product-total">{{ trans('checkout.total') }}</th>
	                                </tr>
	                            </thead>
	                            <tbody>
									<?php
										$subtotal = 0;
									?>
									@foreach ($products as $product)
										<?php $subtotal += ($product->prijs + ($product->prijs * $product->BTW)) * $product->quantity; ?>
										<tr class="cart_item">
											<td class="product-name">
												{{ $product->naam }}
												<strong class="product-quantity">× {{ $product->quantity }}</strong>
											</td>
											<td class="product-total">
												<span class="amount">&euro;{{ ValutaHelper::CalculatePriceQuantity($product->prijs, $product->BTW, $product->quantity) }}</span>
											</td>
										</tr>
									@endforeach
	                            </tbody>
	                            <tfoot>
	                            <tr class="cart-subtotal">
	                                <th>{{ trans('checkout.subtotal') }}</th>
	                                <td><span class="amount">&euro;{{ ValutaHelper::RoundValue($subtotal) }}</span></td>
	                            </tr>
	
	                            <tr class="cart-subtotal">
	                                <th>{{ trans('checkout.shipping') }}</th>
	                                <td><span class="amount">&euro;{{ ValutaHelper::RoundValue($shipping) }}</span></td>
	                            </tr>
	
	                            <tr class="order-total">
	                                <th>{{ trans('checkout.total') }}</th>
	                                <td><strong><span class="amount">&euro;{{ ValutaHelper::RoundValue($subtotal + $shipping) }}</span></strong> </td>
	                            </tr>
	                            </tfoot>
	                        </table>
	                        <!--End shop table-->
	
	                        <!--Start payment-->
	                        <div id="payment" class="checkout-payment">
	                            <ul class="payment_methods methods">
	                                <li class="payment_method_bacs">
	                                    <input id="payment_method_bacs" type="radio" class="input-radio" name="payment_method" value="ideal" checked="checked">
	                                    <label for="payment_method_bacs">
	                                        {{ trans('checkout.ideal') }}
	                                    </label>
	                                </li>
	                                <li class="payment_method_paypal">
	                                    <input id="payment_method_paypal" type="radio" class="input-radio" name="payment_method" value="paypal">
	                                    <label for="payment_method_paypal">
	                                        {{ trans('checkout.paypal') }}
	                                    </label>
	                                </li>
	                            </ul>
	
	                            <div class="clear"></div>
	                        </div>
	                        <!--End payment-->
							
							<table class="shop_table">
								<tr>
									<td class="actions">
										<button type="submit" class="update-cart">{{ trans('cart.pay') }}</button>
									</td>
								</tr>
							</table>
							
	                    </div>
	                    <!--End order review-->
	
	                </div>
	            </div>
            </form>

        </div>
    </section>
@endsection
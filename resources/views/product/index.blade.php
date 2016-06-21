@extends('layouts.master')

@section('content')
	<!--Start shop-->
    <div class="tz-shop">
        <div class="container">
            <div class="row">
			
                <div class="col-md-12">

                    <!--Start shop content-->
                    <div class="tz-shop-content">
                        <ul class="tz-breadcrumbs">
                            <li>
                                <a href="/">{{ trans('product.home') }}</a>
                            </li>
                            <li class="current">
                                {{ trans('product.products') }}
                            </li>
                        </ul>
						
						@include('layouts.message')
						
						@if (count($products) == 0)
							<div class="alert alert-info" role="alert">
								<strong>{{ trans('message.infotitle') }}</strong> {{ trans('product.noproducts') }}
							</div>
						@endif

                        <div class="tz-product row grid-eff">

							@foreach ($products as $product)
								<!--Product item-->
								<div class="product-item col-md-4 col-sm-6">
									<div class="item">
										<div class="product-item-inner">
											<div class="product-thumb">
												<img width="360" height="360" src="/public/imageUpload/{{ $product->afbeelding }}">
											</div>
											<div class="product-info">
												<h4><a href="/product/{{ $product->id }}">{{ $product->naam }}</a></h4>
												<span class="p-meta">
													<span class="p-price">&euro;{{ ValutaHelper::CalculatePrice($product->prijs, $product->BTW) }}</span>
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
												</span>
												<span class="p-mask">
													<a href="/cart/set/{{ $product->id }}/1" class="add-to-cart">{{ trans('product.addtocart') }}</a><br>
													<a href="/wishlist/set/{{ $product->id }}" class="add-to-cart"><i class="fa fa-heart"></i> {{ trans('product.addtowishlist') }}</a>
												</span>
											</div>
										</div>
									</div>
								</div>
								<!--End product item-->
							@endforeach

                        </div>
                    </div>
                    <!--End shop content-->
                </div>
            </div>
        </div>
    </div>
    <!--End Shop-->
@endsection
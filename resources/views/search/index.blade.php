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
                                <a href="/">{{ trans('search.home') }}</a>
                            </li>
                            <li class="current">
                                {{ trans('search.search') }}
                            </li>
                        </ul>
						
						{{ Session::get('message') }}

                        <div class="tz-product row list-view">

							@foreach ($products as $product)
								<!--Product item-->
								<div class="product-item col-md-4 col-sm-6">
									<div class="item">
										<div class="product-item-inner">
											<div class="product-thumb">
												<!--<img src="/public/images/product/{{ $product->afbeelding }}">-->
												<img src="/public/images/product/shop1.jpg">
											</div>
											<div class="product-info">
												<h4><a href="product/{{ $product->id }}">{{ $product->naam }}</a></h4>
												<span class="p-meta">
													<span class="p-price">{{ $product->prijs }}</span>
													<span class="p-vote">
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star-half-o"></i>
													</span>
												</span>
												<p>
													{{ $product->omschrijving }}
												</p>
												<span class="p-mask">
													<a href="/cart/set/{{ $product->id }}" class="add-to-cart">{{ trans('search.addtocart') }}</a>
													<a href="/wishlist/set/{{ $product->id }}" class="add-to-wishlist"><i class="fa fa-heart"></i> {{ trans('search.addtowishlist') }}</a>
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
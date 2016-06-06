@extends('layouts.master')

@section('content')
	
	<section class="shop-checkout">
        <div class="container">
            <!--Start Breadcrumbs-->
            <ul class="tz-breadcrumbs">
                <li>
                    <a href="/admin">{{ trans('productmanage.admin') }}</a>
                </li>
                <li class="current">
                    {{ trans('productmanage.productmanage') }}
                </li>
            </ul>
            <!--End Breadcrumbs-->
			
			@include('layouts.message')
			
            <h1 class="page-title pull-left">{{ trans('productmanage.productmanage') }}</h1>
            <a href="/admin/product/add"><h3 class="pull-right">{{ trans('productmanage.add') }}</h3></a>

            <!--Start form table-->
            <form>
                <table class="shop_table cart">
                    <!--Table header-->
                    <thead>
                        <tr>
                            <th class="product-remove">&nbsp;</th>
                            <th class="product-name">{{ trans('productmanage.name') }}</th>
                            <th class="product-price">{{ trans('productmanage.price') }}</th>
                            <th class="product-price">{{ trans('productmanage.stock') }}</th>
                        </tr>
                    </thead>
                    <!--End table header-->

                    <!--Table body-->
                    <tbody>

						@foreach ($products as $product)
							<tr class="cart_item">
								<td class="product-remove">
									<a href="/admin/product/del/{{ $product->id }}" class="remove" title="Remove this item"></a>
								</td>

								<td class="product-name">
									<a href="/admin/product/{{ $product->id }}">{{ $product->naam }} </a>
								</td>
								
								<td class="product-price">
									&euro;{{ $product->prijs }}
								</td>
								
								<td class="product-price">
									{{ $product->voorraad }}
								</td>
							</tr>
						@endforeach
                        <tr>
                            <td class="actions" colspan="6">
                                <a class="back-shop" href="/admin"><i class="fa fa-angle-left"></i> {{ trans('productmanage.backtoadmin') }}</a>
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
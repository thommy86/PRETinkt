@extends('layouts.master')

@section('content')
	
	<section class="shop-checkout">
        <div class="container">
            <!--Start Breadcrumbs-->
            <ul class="tz-breadcrumbs">
                <li>
                    <a href="/admin">{{ trans('searchmanage.admin') }}</a>
                </li>
                <li class="current">
                    {{ trans('searchmanage.search') }}
                </li>
            </ul>
            <!--End Breadcrumbs-->
			
			@include('layouts.message')
			
            <h1 class="page-title">{{ trans('searchmanage.search') }}</h1>

            <!--Start form table-->
            <form>
                <table class="shop_table cart">
                    <!--Table header-->
                    <thead>
                        <tr>
                            <th class="product-remove">&nbsp;</th>
                            <th class="product-thumbnail">{{ trans('searchmanage.word') }}</th>
                        </tr>
                    </thead>
                    <!--End table header-->

                    <!--Table body-->
                    <tbody>

						@foreach ($searches as $search)
							<tr class="cart_item">
								<td class="product-remove">
									<a href="/admin/search/del/{{ $search->id }}" class="remove"></a>
								</td>

								<td class="product-name">
									{{ $search->zoekterm }}
								</td>
							</tr>
						@endforeach
                        <tr>
                            <td class="actions" colspan="6">
                                <a class="back-shop" href="/admin"><i class="fa fa-angle-left"></i> {{ trans('searchmanage.backtoadmin') }}</a>
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
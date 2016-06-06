@extends('layouts.master')

@section('content')
	<section class="shop-checkout">
        <div class="container">
            <!--Start Breadcrumbs-->
            <ul class="tz-breadcrumbs">
                <li>
                    <a href="/admin">{{ trans('faqmanage.admin') }}</a>
                </li>
                <li class="current">
                    {{ trans('faqmanage.faqmanage') }}
                </li>
            </ul>
            <!--End Breadcrumbs-->
			
			@include('layouts.message')
			
            <h1 class="page-title pull-left">{{ trans('faqmanage.faqmanage') }}</h1>
            <a href="/admin/faq/add"><h3 class="pull-right">{{ trans('productmanage.add') }}</h3></a>

            <!--Start form table-->
            <form>
                <table class="shop_table cart">
                    <!--Table header-->
                    <thead>
                        <tr>
                            <th class="product-remove">&nbsp;</th>
                            <th class="product-name">{{ trans('faqmanage.vraag') }}</th>
						</tr>
                    </thead>
                    <!--End table header-->

                    <!--Table body-->
                    <tbody>

						@foreach ($faqs as $faq)
							<tr class="cart_item">
								<td class="product-remove">
									<a href="/admin/faq/del/{{ $faq->id }}" class="remove"></a>
								</td>
								<td class="product-name">
									<a href="/admin/faq/{{ $faq->id }}">{{ $faq->vraag }} </a>
								</td>
							</tr>
						@endforeach
                        <tr>
                            <td class="actions" colspan="2">
					                       <a class="back-shop" href="/admin"><i class="fa fa-angle-left"></i> {{ trans('faqmanage.backtoadmin') }}</a>
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
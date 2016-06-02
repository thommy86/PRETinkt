@extends('layouts.master')

@section('content')
	<section class="shop-checkout">
        <div class="container">
            <!--Start Breadcrumbs-->
            <ul class="tz-breadcrumbs">
                <li>
                    <a href="/">{{ trans('faqmanage.home') }}</a>
                </li>
                <li class="current">
                    {{ trans('faqmanage.faqmanage') }}
                </li>
            </ul>
            <!--End Breadcrumbs-->
			
			@include('layouts.message')
			
            <h1 class="page-title">{{ trans('faqmanage.faqmanage') }}</h1>

            <!--Start form table-->
            <form>
                <table class="shop_table cart">
                    <!--Table header-->
                    <thead>
                        <tr>
                            <th class="product-remove">&nbsp;</th>
                            <th class="product-name">{{ trans('faqmanage.vraag') }}</th>
							<th class="comment-for-submit"><a href="/admin/faq/add" class="update-cart">{{ trans('faqmanage.add') }}</a></th>
											</tr>
                    </thead>
                    <!--End table header-->

                    <!--Table body-->
                    <tbody>

						@foreach ($faqs as $faqs)
							<tr class="cart_item">
								<td class="product-remove">
									<a href="/admin/faq/del/{{ $faqs->id }}" class="remove" title="Remove this item"></a>
								</td>
								<td class="product-name">
									<a href="/admin/faq/{{ $faqs->id }}">{{ $faqs->vraag }} </a>
								</td>
								<td class="product-price">
									<span class="amount"></span>
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
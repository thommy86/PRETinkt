@extends('layouts.master')

@section('content')
	<section class="shop-checkout">
        <div class="container">
            <!--Start Breadcrumbs-->
            <ul class="tz-breadcrumbs">
                <li>
                    <a href="/admin">{{ trans('productmanage.admin') }}</a>
                </li>
                <li>
                    <a href="/admin/products">{{ trans('productmanage.productmanage') }}</a>
                </li>
                <li class="current">
                    {{ trans('productmanage.edit') }}
                </li>
            </ul>
            <!--End Breadcrumbs-->
			
			@include('layouts.message')
			
            <h1 class="page-title">{{ trans('productmanage.productmanage') }}</h1>
			<div id="contact-form" class="contact-respond">
				<form action="/admin/product" method="post" id="commentform" class="contact-form-7">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<input type="hidden" name="id" value="{{ $product->id }}">
					<p class="comment-for-author">
						<input type="text" class="author" name="name" placeholder="{{ trans('productmanage.name') }}" value={{ (old('name')) ? old('name') : $product->naam }}>
					</p>
					<p class="comment-for-author">
						<input type="text" class="author" name="brand" placeholder="{{ trans('productmanage.brand') }}" value={{ (old('brand')) ? old('brand') : $product->merk }}>
					</p>
					<p class="comment-for-content">
						<textarea class="comment" name="description" placeholder="{{ trans('productmanage.description') }}">{{ (old('description')) ? old('description') : $product->omschrijving }}</textarea>
					</p>
					<p class="comment-for-author">
						<input type="text" class="author" name="colour" placeholder="{{ trans('productmanage.colour') }}" value={{ (old('colour')) ? old('colour') : $product->kleur }}>
					</p>
					<p class="comment-for-author">
						<input type="text" class="author" name="type" placeholder="{{ trans('productmanage.type') }}" value={{ (old('type')) ? old('type') : $product->type }}>
					</p>
					<p class="comment-for-author">
						<input type="text" class="author" name="capacity" placeholder="{{ trans('productmanage.capacity') }}" value={{ (old('capacity')) ? old('capacity') : $product->capaciteit }}>
					</p>
					<p class="comment-for-author">
						<input type="text" class="author" name="btw" placeholder="{{ trans('productmanage.btw') }}" value={{ (old('btw')) ? old('btw') : $product->BTW }}>
					</p>
					<p class="comment-for-author">
						<input type="text" class="author" name="price" placeholder="{{ trans('productmanage.price') }}" value={{ (old('price')) ? old('price') : $product->prijs }}>
					</p>
					<p class="comment-for-author">
						<input type="text" class="author" name="stock" placeholder="{{ trans('productmanage.stock') }}" value={{ (old('stock')) ? old('stock') : $product->voorraad }}>
					</p>
					<p class="comment-for-submit">
						<input name="submit" type="submit" id="submit" class="submit" value="{{ trans('productmanage.submit') }}">
					</p>
				</form>
			</div>
			
        </div>
    </section>
@endsection
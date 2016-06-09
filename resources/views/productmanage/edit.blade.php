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
				<form action="/admin/product" method="post" id="commentform" class="contact-form-7" enctype="multipart/form-data">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<input type="hidden" name="id" value="{{ $product->id }}">
					<p class="comment-for-author">
                        <label for="first_name">{{ trans('productmanage.name') }} <span class="required">*</span></label>
						<input type="text" class="fullborder" name="name" placeholder="{{ trans('productmanage.name') }}" value="{{ (old('name')) ? old('name') : $product->naam }}">
					</p>
					<p class="comment-for-author">
                        <label for="first_name">{{ trans('productmanage.brand') }} <span class="required">*</span></label>
						<input type="text" class="fullborder" name="brand" placeholder="{{ trans('productmanage.brand') }}" value="{{ (old('brand')) ? old('brand') : $product->merk }}">
					</p>
					<p class="comment-for-content">
                        <label for="description">{{ trans('productmanage.description') }} <span class="required">*</span></label>
						<textarea class="fullborder" name="description" placeholder="{{ trans('productmanage.description') }}">{{ (old('description')) ? old('description') : $product->omschrijving }}</textarea>
					</p>
					<p class="comment-for-author">
                        <label for="colour">{{ trans('productmanage.colour') }} <span class="required">*</span></label>
						<input type="text" class="fullborder" name="colour" placeholder="{{ trans('productmanage.colour') }}" value="{{ (old('colour')) ? old('colour') : $product->kleur }}">
					</p>
					<p class="comment-for-author">
                        <label for="type">{{ trans('productmanage.type') }} <span class="required">*</span></label>
						<input type="text" class="fullborder" name="type" placeholder="{{ trans('productmanage.type') }}" value="{{ (old('type')) ? old('type') : $product->type }}">
					</p>
					<p class="comment-for-author">
                        <label for="capacity">{{ trans('productmanage.capacity') }} <span class="required">*</span></label>
						<input type="text" class="fullborder" name="capacity" placeholder="{{ trans('productmanage.capacity') }}" value="{{ (old('capacity')) ? old('capacity') : $product->capaciteit }}">
					</p>
					<p class="comment-for-author">
                        <label for="btw">{{ trans('productmanage.btw') }} <span class="required">*</span></label>
						<input type="text" class="fullborder" name="btw" placeholder="{{ trans('productmanage.btw') }}" value="{{ (old('btw')) ? old('btw') : $product->BTW }}">
					</p>
					<p class="comment-for-author">
                        <label for="price">{{ trans('productmanage.price') }} <span class="required">*</span></label>
						<input type="text" class="fullborder" name="price" placeholder="{{ trans('productmanage.price') }}" value="{{ (old('price')) ? old('price') : $product->prijs }}">
					</p>
					<p class="comment-for-author">
                        <label for="stock">{{ trans('productmanage.stock') }} <span class="required">*</span></label>
						<input type="text" class="fullborder" name="stock" placeholder="{{ trans('productmanage.stock') }}" value="{{ (old('stock')) ? old('stock') : $product->voorraad }}">
					</p>
					<p class="comment-for-author">
                        <label for="image">{{ trans('productmanage.image') }} </label>
						<input type="file" accept=".jpg, .png" class="fullborder" name="image">
						{{ trans('productmanage.onlyjpgpng') }}
					</p>
					<p class="comment-for-submit">
						<input name="submit" type="submit" id="submit" class="submit" value="{{ trans('productmanage.submit') }}">
					</p>
				</form>
			</div>
			
        </div>
    </section>
@endsection
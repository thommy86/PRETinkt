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
                        <label for="omschrijving">{{ trans('productmanage.description_nl') }} <span class="required">*</span></label>
						<textarea class="fullborder" name="omschrijving" placeholder="{{ trans('productmanage.description_nl') }}">{{ (old('omschrijving')) ? old('omschrijving') : $product->omschrijving }}</textarea>
					</p>
					<p class="comment-for-content">
                        <label for="description">{{ trans('productmanage.description_en') }} <span class="required">*</span></label>
						<textarea class="fullborder" name="description" placeholder="{{ trans('productmanage.description_en') }}">{{ (old('description')) ? old('description') : $product->description }}</textarea>
					</p>
					<p class="comment-for-content">
                        <label for="colour">{{ trans('productmanage.colour') }} <span class="required">*</span></label>
						<select class="comment" name="colour" required>
							<option value="BLACK" {{ old('colour') ? old('colour') == "BLACK" ? "selected" : "" : $product->kleur == "BLACK" ? "selected" : "" }}>{{ trans('productmanage.black') }}</option>
							<option value="COLOUR" {{ old('colour') ? old('colour') == "COLOUR" ? "selected" : "" : $product->kleur == "COLOUR" ? "selected" : "" }}>{{ trans('productmanage.colour') }}</option>
							<option value="CYAN" {{ old('colour') ? old('colour') == "CYAN" ? "selected" : "" : $product->kleur == "CYAN" ? "selected" : "" }}>{{ trans('productmanage.cyan') }}</option>
							<option value="MAGENTA" {{ old('colour') ? old('colour') == "MAGENTA" ? "selected" : "" : $product->kleur == "MAGENTA" ? "selected" : "" }}>{{ trans('productmanage.magenta') }}</option>
							<option value="YELLOW" {{ old('colour') ? old('colour') == "YELLOW" ? "selected" : "" : $product->kleur == "YELLOW" ? "selected" : "" }}>{{ trans('productmanage.yellow') }}</option>
						</select>				
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
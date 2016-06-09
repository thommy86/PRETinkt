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
                    {{ trans('productmanage.add') }}
                </li>
            </ul>
            <!--End Breadcrumbs-->
			
			@include('layouts.message')
			
            <h1 class="page-title">{{ trans('productmanage.productmanage') }}</h1>
			<div id="contact-form" class="contact-respond">
				<form action="/admin/product/add" method="post" id="commentform" class="contact-form-7" enctype="multipart/form-data">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<p class="comment-for-author">
                        <label for="name">{{ trans('productmanage.name') }} <span class="required">*</span></label>
						<input type="text" class="fullborder" name="name" placeholder="{{ trans('productmanage.name') }}" value="{{ old('name') }}" required>
					</p>
					<p class="comment-for-author">
                        <label for="brand">{{ trans('productmanage.brand') }} <span class="required">*</span></label>
						<input type="text" class="fullborder" name="brand" placeholder="{{ trans('productmanage.brand') }}" value="{{ old('brand') }}" required>
					</p>
					<p class="comment-for-content">
                        <label for="description">{{ trans('productmanage.description') }} <span class="required">*</span></label>
						<textarea class="fullborder" name="description" placeholder="{{ trans('productmanage.description') }}" required>{{ old('description') }}</textarea>
					</p>
					<p class="comment-for-content">
                        <label for="colour">{{ trans('productmanage.colour') }} <span class="required">*</span></label>
						<select class="comment" name="colour" required>
							<option value="BLACK" {{ old('colour') ? old('colour') == "BLACK" ? "selected" : "" : "" }}>{{ trans('productmanage.black') }}</option>
							<option value="COLOUR" {{ old('colour') ? old('colour') == "COLOUR" ? "selected" : "" : "" }}>{{ trans('productmanage.colour') }}</option>
							<option value="CYAN" {{ old('colour') ? old('colour') == "CYAN" ? "selected" : "" : "" }}>{{ trans('productmanage.cyan') }}</option>
							<option value="MAGENTA" {{ old('colour') ? old('colour') == "MAGENTA" ? "selected" : "" : "" }}>{{ trans('productmanage.magenta') }}</option>
							<option value="YELLOW" {{ old('colour') ? old('colour') == "YELLOW" ? "selected" : "" : "" }}>{{ trans('productmanage.yellow') }}</option>
						</select>				
					</p>
					<p class="comment-for-author">
                        <label for="type">{{ trans('productmanage.type') }} <span class="required">*</span></label>
						<input type="text" class="fullborder" name="type" placeholder="{{ trans('productmanage.type') }}" value="{{ old('type') }}" required>
					</p>
					<p class="comment-for-author">
                        <label for="capacity">{{ trans('productmanage.capacity') }} <span class="required">*</span></label>
						<input type="text" class="fullborder" name="capacity" placeholder="{{ trans('productmanage.capacity') }}" value="{{ old('capacity') }}" required>
					</p>
					<p class="comment-for-author">
                        <label for="btw">{{ trans('productmanage.btw') }} <span class="required">*</span></label>
						<input type="text" class="fullborder" name="btw" placeholder="{{ trans('productmanage.btw') }}" value="{{ old('btw') }}" required>
					</p>
					<p class="comment-for-author">
                        <label for="price">{{ trans('productmanage.price') }} <span class="required">*</span></label>
						<input type="text" class="fullborder" name="price" placeholder="{{ trans('productmanage.price') }}" value="{{ old('price') }}" required>
					</p>
					<p class="comment-for-author">
                        <label for="stock">{{ trans('productmanage.stock') }} <span class="required">*</span></label>
						<input type="text" class="fullborder" name="stock" placeholder="{{ trans('productmanage.stock') }}" value="{{ old('stock') }}" required>
					</p>
					<p class="comment-for-author">
                        <label for="image">{{ trans('productmanage.image') }} <span class="required">*</span></label>
						<input type="file" accept=".jpg, .png" class="fullborder" name="image" required>
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
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
						<input type="text" class="author" name="name" placeholder="{{ trans('productmanage.name') }}" value="{{ old('name') }}" required>
					</p>
					<p class="comment-for-author">
						<input type="text" class="author" name="brand" placeholder="{{ trans('productmanage.brand') }}" value="{{ old('brand') }}" required>
					</p>
					<p class="comment-for-content">
						<textarea class="comment" name="description" placeholder="{{ trans('productmanage.description') }}" required>{{ old('description') }}</textarea>
					</p>
					<p class="comment-for-author">
						<input type="text" class="author" name="colour" placeholder="{{ trans('productmanage.colour') }}" value="{{ old('colour') }}" required>
					</p>
					<p class="comment-for-author">
						<input type="text" class="author" name="type" placeholder="{{ trans('productmanage.type') }}" value="{{ old('type') }}" required>
					</p>
					<p class="comment-for-author">
						<input type="text" class="author" name="capacity" placeholder="{{ trans('productmanage.capacity') }}" value="{{ old('capacity') }}" required>
					</p>
					<p class="comment-for-author">
						<input type="text" class="author" name="btw" placeholder="{{ trans('productmanage.btw') }}" value="{{ old('btw') }}" required>
					</p>
					<p class="comment-for-author">
						<input type="text" class="author" name="price" placeholder="{{ trans('productmanage.price') }}" value="{{ old('price') }}" required>
					</p>
					<p class="comment-for-author">
						<input type="text" class="author" name="stock" placeholder="{{ trans('productmanage.stock') }}" value="{{ old('stock') }}" required>
					</p>
					<p class="comment-for-author">
						<input type="file" accept=".jpg, .png" class="author" name="image" required>
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
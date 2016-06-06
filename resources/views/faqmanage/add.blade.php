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
			
            <h1 class="page-title">{{ trans('faqmanage.faqmanage') }}</h1>
			<div id="contact-form" class="contact-respond">
				<form action="/admin/faq/add" method="post" id="commentform" class="contact-form-7">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<p class="comment-for-author">
						<input type="text" class="author" name="vraag" placeholder="{{ trans('faqmanage.vraag') }}" value={{ old('vraag') }}>
						<i class="fa fa-user"></i>
					</p>
					<p class="comment-for-content">
						<textarea class="comment" name="antwoord" placeholder="{{ trans('faqmanage.antwoord') }}">{{ old('antwoord') }}</textarea>
						<i class="fa fa-comment"></i>
					</p>
					<p class="comment-for-content">
						<select class="comment" name="taal"><option>NL</option><option>EN</option></select>
					</p>
					<p class="comment-for-submit">
						<input name="submit" type="submit" id="submit" class="submit" value="{{ trans('faqmanage.submit') }}">
					</p>
				</form>
			</div>
			
        </div>
    </section>
@endsection
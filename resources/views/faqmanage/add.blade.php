@extends('layouts.master')

@section('content')
	<section class="shop-checkout">
        <div class="container">
            <!--Start Breadcrumbs-->
            <ul class="tz-breadcrumbs">
                <li>
                    <a href="/admin">{{ trans('faqmanage.admin') }}</a>
                </li>
                <li>
                    <a href="/admin/faq">{{ trans('faqmanage.faqmanage') }}</a>
                </li>
                <li class="current">
                    {{ trans('faqmanage.add') }}
                </li>
            </ul>
            <!--End Breadcrumbs-->
			
			@include('layouts.message')
			
            <h1 class="page-title">{{ trans('faqmanage.faqmanage') }}</h1>
			<div id="contact-form" class="contact-respond">
				<form action="/admin/faq/add" method="post" id="commentform" class="contact-form-7">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<p class="comment-for-author">
						<input type="text" class="fullborder" name="vraag" placeholder="{{ trans('faqmanage.vraag') }}" value="{{ old('vraag') }}" required>
						<i class="fa fa-user"></i>
					</p>
					<p class="comment-for-content">
						<textarea class="fullborder" name="antwoord" placeholder="{{ trans('faqmanage.antwoord') }}" required>{{ old('antwoord') }}</textarea>
						<i class="fa fa-comment"></i>
					</p>
					<p class="comment-for-author">
						<select class="fullborder" name="taal">
							<option value="NL" {{ old('taal') ? old('taal') == "NL" ? "selected" : "" : $lang == "nl" ? "selected" : "" }}>{{ trans('faqmanage.nederlands') }}</option>
							<option value="EN" {{ old('taal') ? old('taal') == "EN" ? "selected" : "" : $lang == "en" ? "selected" : "" }}>{{ trans('faqmanage.engels') }}</option>
						</select>				
					</p>
					<p class="comment-for-submit">
						<input name="submit" type="submit" id="submit" class="submit" value="{{ trans('faqmanage.submit') }}">
					</p>
				</form>
			</div>
			
        </div>
    </section>
@endsection
@extends('layouts.master')

@section('content')
	<!--Start Blog-->
    <div class="blog">
        <div class="container">
            <ul class="tz-breadcrumbs">
                <li>
                    <a href="/">{{ trans('quoatation.home') }}</a>
                </li>
                <li class="current">
                    {{ trans('quoatation.quoatation') }}
                </li>
            </ul>
            <div class="blog-container">
                <div class="row">
                <div class="col-md-4">

                    <!--Blog Sidebar-->
                    <div class="blog-sidebar">
                        <aside class="contact-info widget no-border">
                            <h4 class="widget-title">{{ trans('quoatation.contactinfo') }}</h4>
                            <p>{{ trans('quoatation.description') }}</p>
                            <ul>
                                <li>
                                    <span>{{ trans('quoatation.address') }}:</span>
                                    <address>{{ config('webshop.Street') }} {{ config('webshop.Number') }}, {{ config('webshop.City') }},<br> {{ config('webshop.Country') }}</address>
                                </li>
                                <li>
                                    <span>{{ trans('quoatation.phone') }}:</span> {{ config('webshop.Phone') }}
                                </li>
                                <li>
                                    <span>{{ trans('quoatation.email') }}:</span> {{ config('webshop.Email') }}
                                </li>
                            </ul>
                        </aside>
                    </div>
                    <!--End Blog Sidebar-->
                </div>
                <div class="col-md-8 tz-blog-content">
                    <h1 class="large-ttle">{{ trans('quoatation.quoatation') }}</h1>
                    <div id="contact-form" class="contact-respond">
						@include('layouts.message')
						<form action="/quoatation" method="post" id="commentform" class="contact-form-7">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <p class="comment-for-author">
                                <input type="text" class="author" name="name" placeholder="{{ trans('contact.name') }}" value="{{ old('name') }}" required>
                                <i class="fa fa-user"></i>
                            </p>
                            <p class="comment-for-email">
                                <input type="email" class="email" name="email" placeholder="{{ trans('contact.email') }}" value="{{ old('email') }}" required>
                                <i class="fa fa-envelope"></i>
                            </p>
                            <p class="comment-for-url">
                                <input type="tel" class="url" name="phone" placeholder="{{ trans('quoatation.phone') }}" value="{{ old('phone') }}" required>
                                <i class="fa fa-phone"></i>
                            </p>
                            <p class="comment-for-content">
                                <textarea class="comment" name="message" placeholder="{{ trans('contact.message') }}" required>{{ old('message') }}</textarea>
                                <i class="fa fa-comment"></i>
                            </p>
                            <p class="comment-for-submit">
                                <input name="submit" type="submit" id="submit" class="submit" value="{{ trans('quoatation.submit') }}">
                            </p>
						</form>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
    <!--End Start Blog-->
@endsection
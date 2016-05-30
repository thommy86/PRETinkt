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
                                    <address>{{ config('app.Street') }} {{ config('app.Number') }}, {{ config('app.City') }},<br> {{ config('app.Country') }}</address>
                                </li>
                                <li>
                                    <span>{{ trans('quoatation.phone') }}:</span> {{ config('app.Phone') }}
                                </li>
                                <li>
                                    <span>{{ trans('quoatation.email') }}:</span> {{ config('app.Emailaddress') }}
                                </li>
                            </ul>
                        </aside>
                    </div>
                    <!--End Blog Sidebar-->
                </div>
                <div class="col-md-8 tz-blog-content">
                    <h1 class="large-ttle">{{ trans('quoatation.quoatation') }}</h1>
                    <div id="contact-form" class="contact-respond">
						{{ Session::get('message') }}
                        @foreach ($errors->all() as $error)
							{{ $error }} <br>
						@endforeach
						<form action="quoatation" method="post" id="commentform" class="contact-form-7">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <p class="comment-for-author">
                                <input type="text" class="author" name="name" placeholder="{{ trans('contact.name') }}" value={{ old('name') }}>
                                <i class="fa fa-user"></i>
                            </p>
                            <p class="comment-for-email">
                                <input type="email" class="email" name="email" placeholder="{{ trans('contact.email') }}" value={{ old('email') }}>
                                <i class="fa fa-envelope"></i>
                            </p>
                            <p class="comment-for-url">
                                <input type="tel" class="url" name="phone" placeholder="{{ trans('quoatation.phone') }}" value={{ old('phone') }}>
                                <i class="fa fa-phone"></i>
                            </p>
                            <p class="comment-for-content">
                                <textarea class="comment" name="message" placeholder="{{ trans('contact.message') }}">{{ old('message') }}</textarea>
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
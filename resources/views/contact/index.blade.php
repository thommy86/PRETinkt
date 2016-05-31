@extends('layouts.master')

@section('content')
	<!--Start Blog-->
    <div class="blog">
        <div class="container">
            <ul class="tz-breadcrumbs">
                <li>
                    <a href="/">{{ trans('contact.home') }}</a>
                </li>
                <li class="current">
                    {{ trans('contact.contact') }}
                </li>
            </ul>
            <div class="blog-container">
                <div class="row">
                <div class="col-md-4">

                    <!--Blog Sidebar-->
                    <div class="blog-sidebar">
                        <aside class="contact-info widget no-border">
                            <h4 class="widget-title">{{ trans('contact.contactinfo') }}</h4>
                            <p>{{ trans('contact.description') }}</p>
                            <ul>
                                <li>
                                    <span>{{ trans('contact.address') }}:</span>
                                    <address>{{ config('app.Street') }} {{ config('app.Number') }}, {{ config('app.City') }},<br> {{ config('app.Country') }}</address>
                                </li>
                                <li>
                                    <span>{{ trans('contact.phone') }}:</span> {{ config('app.Phone') }}
                                </li>
                                <li>
                                    <span>{{ trans('contact.email') }}:</span> {{ config('app.Email') }}
                                </li>
                            </ul>
                        </aside>
                    </div>
                    <!--End Blog Sidebar-->
                </div>
                <div class="col-md-8 tz-blog-content">
                    <h1 class="large-ttle">{{ trans('contact.contactus') }}</h1>
                    <div id="contact-form" class="contact-respond">
                        <h3 class="tz-title">{{ trans('contact.leaveusamessage') }}</h3>
						{{ Session::get('message') }}
                        @foreach ($errors->all() as $error)
							{{ $error }} <br>
						@endforeach
						<form action="contact" method="post" id="commentform" class="contact-form-7">
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
                                <input type="text" class="url" name="subject" placeholder="{{ trans('contact.subject') }}" {{ old('subject') }}>
                                <i class="fa fa-link"></i>
                            </p>
                            <p class="comment-for-content">
                                <textarea class="comment" name="message" placeholder="{{ trans('contact.message') }}">{{ old('message') }}</textarea>
                                <i class="fa fa-comment"></i>
                            </p>
                            <p class="comment-for-submit">
                                <input name="submit" type="submit" id="submit" class="submit" value="{{ trans('contact.submit') }}">
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
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
                    {{ trans('quoatation.contact') }}
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
                                    <span>{{ trans('quoatation.address') }}</span>
                                    <address><?php echo config('app.Street'); ?> <?php echo config('app.Number'); ?>, <?php echo config('app.City'); ?>,<br> <?php echo config('app.Country'); ?></address>
                                </li>
                                <li>
                                    <span>{{ trans('quoatation.phone') }}</span> <?php echo config('app.Phone'); ?>
                                </li>
                                <li>
                                    <span>{{ trans('quoatation.email') }}:</span> <?php echo config('app.Emailaddress'); ?>
                                </li>
                            </ul>
                        </aside>
                    </div>
                    <!--End Blog Sidebar-->
                </div>
                <div class="col-md-8 tz-blog-content">
                    <div id="contact-form" class="contact-respond">
	                    <?php
							foreach ($errors->all() as $error) {
								echo $error;
							}	
						?>
						<form action="quoatation" method="post" id="commentform" class="contact-form-7">
                            <p class="comment-for-author">
                                <input type="text" class="author" placeholder="{{ trans('quoatation.name') }}">
                                <i class="fa fa-user"></i>
                            </p>
                            <p class="comment-for-email">
                                <input type="email" class="email" placeholder="{{ trans('quoatation.email') }}">
                                <i class="fa fa-envelope"></i>
                            </p>
                            <p class="comment-for-url">
                                <input type="tel" class="url" placeholder="{{ trans('quoatation.phone') }}">
                                <i class="fa fa-link"></i>
                            </p>
                            <p class="comment-for-content">
                                <textarea class="comment" name="comment" placeholder="{{ trans('quoatation.message') }}"></textarea>
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
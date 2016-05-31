@extends('layouts.master')

@section('content')
	<!--Start Blog-->
	<div class="blog">
		<div class="container">

			<!--Start breadcrumbs-->
			<ul class="tz-breadcrumbs">
				<li>
					<a href="/">{{ trans('faq.home') }}</a>
				</li>
				<li class="current">
					{{ trans('faq.faq') }}
				</li>
			</ul>
			<!--End breadcrumbs-->
			
			{{ Session::get('message') }}
			@foreach ($errors->all() as $error)
				{{ $error }} <br>
			@endforeach
			
			<div class="blog-container">
				<div class="row">
					<div class="col-md-12">

						<!--Blog Content-->
						<div class="row">
							<div class="col-md-12">

								<!--Content-->
								<article class="single-blog">

									<h1><a href="#">{{ trans('faq.faq') }}</a></h1>
									@foreach ($faqs as $faq)
										<div class="single-content">
											<p>
												{{ trans('faq.question') }}: {{ $faq->vraag }}
											</p>
											<blockquote>
												<p>{{ trans('faq.answer') }}: {{ $faq->antwoord }}</p>
											</blockquote>
										</div>
									@endforeach

							</div>
						</div>
						<!--End Blog Content-->
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--End Start Blog-->
@endsection
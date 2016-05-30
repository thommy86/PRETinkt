@extends('layouts.master')

@section('content')
	<!--Start Blog-->
	<div class="blog">
		<div class="container">

			<!--Start breadcrumbs-->
			<ul class="tz-breadcrumbs">
				<li>
					<a href="/">{{ trans('privacypolicy.home') }}</a>
				</li>
				<li class="current">
					{{ trans('privacypolicy.privacypolicy') }}
				</li>
			</ul>
			<!--End breadcrumbs-->
			<div class="blog-container">
				<div class="row">
					<div class="col-md-12">

						<!--Blog Content-->
						<div class="row">
							<div class="col-md-12">

								<!--Content-->
								<article class="single-blog">

									<h1><a href="#">{{ trans('privacypolicy.privacypolicy') }}</a></h1>
									<div class="single-content">
										<p>
											{{ trans('privacypolicy.text') }}
										</p>
									</div>

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
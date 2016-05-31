@extends('layouts.master')

@section('content')
	<!--SATRT REVOLUTION SLIDER-->
	<div id="rev_slider_1_1_wrapper" class="rev_slider_wrapper fullwidthbanner-container">
		<div id="rev_slider_1_1" class="rev_slider fullwidthabanner">
			<ul>
				<li data-transition="fade" data-slotamount="7" data-masterspeed="700"  data-saveperformance="off" >
					<!-- MAIN IMAGE -->
					<img src="/public/images/slider/slider.jpg"  alt="slider"  data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat">
					<!-- LAYERS -->

					<!-- LAYER NR. 1 -->
					<div class="tp-caption sft stt"
						 data-x="275"
						 data-y="180"
						 data-speed="1500"
						 data-start="600"
						 data-easing="Back.easeInOut"
						 data-elementdelay="0.1"
						 data-endelementdelay="0.1"
						 data-endspeed="1000"
						 data-endeasing="Power4.easeOut"><img src="/public/images/slider/letters/P.png" alt="">
					</div>

					<!-- LAYER NR. 2 -->
					<div class="tp-caption sfb stb"
						 data-x="340"
						 data-y="160"
						 data-speed="1500"
						 data-start="600"
						 data-easing="Back.easeInOut"
						 data-elementdelay="0.1"
						 data-endelementdelay="0.1"
						 data-endspeed="1000"
						 data-endeasing="Power4.easeOut"><img src="/public/images/slider/letters/R.png" alt="">
					</div>

					<!-- LAYER NR. 3 -->
					<div class="tp-caption sft stt"
						 data-x="405"
						 data-y="180"
						 data-speed="1500"
						 data-start="600"
						 data-easing="Back.easeInOut"
						 data-elementdelay="0.1"
						 data-endelementdelay="0.1"
						 data-endspeed="1000"
						 data-endeasing="Power4.easeOut"><img src="/public/images/slider/letters/E.png" alt="">
					</div>

					<!-- LAYER NR. 4 -->
					<div class="tp-caption sfb stb"
						 data-x="460"
						 data-y="160"
						 data-speed="1500"
						 data-start="600"
						 data-easing="Back.easeInOut"
						 data-elementdelay="0.1"
						 data-endelementdelay="0.1"
						 data-endspeed="1000"
						 data-endeasing="Power4.easeOut"><img src="/public/images/slider/letters/T.png" alt="">
					</div>

					<!-- LAYER NR. 5 -->
					<div class="tp-caption sft stt"
						 data-x="560"
						 data-y="160"
						 data-speed="1500"
						 data-start="600"
						 data-easing="Back.easeInOut"
						 data-elementdelay="0.1"
						 data-endelementdelay="0.1"
						 data-endspeed="1000"
						 data-endeasing="Power4.easeOut"><img src="/public/images/slider/letters/I.png" alt="">
					</div>

					<!-- LAYER NR. 6 -->
					<div class="tp-caption sfb stb"
						 data-x="587"
						 data-y="180"
						 data-speed="1500"
						 data-start="600"
						 data-easing="Back.easeInOut"
						 data-elementdelay="0.1"
						 data-endelementdelay="0.1"
						 data-endspeed="1000"
						 data-endeasing="Power4.easeOut"><img src="/public/images/slider/letters/N.png" alt="">
					</div>

					<!-- LAYER NR. 7 -->
					<div class="tp-caption sft stt"
						 data-x="675"
						 data-y="160"
						 data-speed="1500"
						 data-start="600"
						 data-easing="Back.easeInOut"
						 data-elementdelay="0.1"
						 data-endelementdelay="0.1"
						 data-endspeed="1000"
						 data-endeasing="Power4.easeOut"><img src="/public/images/slider/letters/K.png" alt="">
					</div>

					<!-- LAYER NR. 8 -->
					<div class="tp-caption sfb stb"
						 data-x="750"
						 data-y="180"
						 data-speed="1500"
						 data-start="600"
						 data-easing="Back.easeInOut"
						 data-elementdelay="0.1"
						 data-endelementdelay="0.1"
						 data-endspeed="1000"
						 data-endeasing="Power4.easeOut"><img src="/public/images/slider/letters/T.png" alt="">
					</div>


					<!-- LAYER NR. 11 -->
					<div class="tp-caption mediumlightwhite2 customin customout tp-resizeme"
						 data-x="center" data-hoffset="-19"
						 data-y="center" data-voffset="10"
						 data-customin="x:0;y:0;z:0;rotationX:0;rotationY:-180;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:3000;transformOrigin:50% 0%;"
						 data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0;scaleY:0;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
						 data-speed="1500"
						 data-start="1500"
						 data-easing="easeOutQuint"
						 data-splitin="none"
						 data-splitout="none"
						 data-elementdelay="0.1"
						 data-endelementdelay="0.1"
						 data-endspeed="1000"
						 data-endeasing="Power4.easeOut">{{ trans('home.subtitle1') }}
					</div>

					<!-- LAYER NR. 12 -->
					<div class="tp-caption black customin customout tp-resizeme"
						 data-x="center" data-hoffset="-19"
						 data-y="center" data-voffset="110"
						 data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0;scaleY:0;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
						 data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0;scaleY:0;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
						 data-speed="1500"
						 data-start="1600"
						 data-easing="Back.easeInOut"
						 data-splitin="none"
						 data-splitout="none"
						 data-elementdelay="0.1"
						 data-endelementdelay="0.1"
						 data-endspeed="1000"
						 data-endeasing="Power4.easeOut"><a href='/products' class='buttom_bike'>{{ trans('home.shopnow') }}</a>
					</div>
				</li>
				<li data-transition="fade" data-slotamount="7" data-masterspeed="700"  data-saveperformance="off" >
					<!-- MAIN IMAGE -->
					<img src="/public/images/slider/slider3.jpg"  alt="slider3"  data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat">
					<!-- LAYERS -->

					<!-- LAYER NR. 1 -->
					<div class="tp-caption slider-title sfr tp-resizeme"
						 data-x="center" data-hoffset="0"
						 data-y="center" data-voffset="-52"
						 data-speed="1200"
						 data-start="500"
						 data-easing="easeOutExpo"
						 data-splitin="chars"
						 data-splitout="none"
						 data-elementdelay="0.1"
						 data-endelementdelay="0.1"
						 data-endspeed="300">{{ trans('home.subtitle2') }}
					</div>

					<!-- LAYER NR. 2 -->
					<div class="tp-caption black sfb tp-resizeme"
						 data-x="center" data-hoffset="0"
						 data-y="center" data-voffset="34"
						 data-speed="800"
						 data-start="2200"
						 data-easing="Quad.easeInOut"
						 data-splitin="none"
						 data-splitout="none"
						 data-elementdelay="0.1"
						 data-endelementdelay="0.1"
						 data-endspeed="300"><a href='/products' class='buttom_bike'>{{ trans('home.shopnow') }}</a>
					</div>
				</li>
				<li data-transition="fade" data-slotamount="7" data-masterspeed="700"  data-saveperformance="off" >
					<!-- MAIN IMAGE -->
					<img src="/public/images/slider/slider2.jpg"  alt="slider2"  data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat">
					<!-- LAYERS -->

					 <!-- LAYER NR. 1 -->
					<div class="tp-caption slider-title sfr tp-resizeme"
						 data-x="center" data-hoffset="0"
						 data-y="center" data-voffset="-52"
						 data-speed="1200"
						 data-start="500"
						 data-easing="easeOutExpo"
						 data-splitin="chars"
						 data-splitout="none"
						 data-elementdelay="0.1"
						 data-endelementdelay="0.1"
						 data-endspeed="300">{{ trans('home.subtitle3') }}
					</div>

					<!-- LAYER NR. 2 -->
					<div class="tp-caption black sfb tp-resizeme"
						 data-x="center" data-hoffset="0"
						 data-y="center" data-voffset="34"
						 data-speed="800"
						 data-start="2200"
						 data-easing="Quad.easeInOut"
						 data-splitin="none"
						 data-splitout="none"
						 data-elementdelay="0.1"
						 data-endelementdelay="0.1"
						 data-endspeed="300"><a href='/products' class='buttom_bike'>{{ trans('home.shopnow') }}</a>
					</div>
				</li>
			</ul>
		</div>
	</div><!--END REVOLUTION SLIDER-->

	<!--Start parallax-->
	<section class="parallax background-parallax">
		<div class="container">

			<!--Get In Touch-->
			<div class="get-in-touch">
				<h3>{{ trans('home.welcometitle') }}</h3>
				<p>{{ trans('home.welcometext') }}</p>
			</div>
			<!--End Get In Touch-->

		</div>
	</section>
	<!--End Start parallax-->

	<!--Start section large top for tabs content-->
	<div class="section-large-top">
		<div class="container">
			<!--Tabs Shop-->
			<div class="tz-shortcode-tabs">

				<!--Tabs Header-->
				<div class="tz-tabs-header">
					<h2 class="tz-tabs-title pull-left">{{ trans('home.lastproducts') }}</h2>
				</div>
				<!--End tab header-->

				<!--Tab content-->
				<div class="tab-content">

					<!--Tab item-->
					<div class="tab-pane active">
						<div class="row">
						
							@foreach ($products as $product)
								<div class="col-md-4 col-sm-6">

									<!--Start product item-->
									<div class="product-item">
										<div class="product-thubnail">
											<img src="/public/images/product/{{ $product->afbeelding }}">
											<div class="product-meta">
												<a class="add-to-cart" href="/product/{{ $product->id }}">{{ trans('home.view') }}</a>
											</div>
										</div>
										<div class="product-infomation">
											<h4><a href="#">{{ $product->naam }}</a></h4>
											<span class="product-price">{{ $product->prijs }}</span>
										</div>
									</div>
									<!--End product item-->

								</div>
							@endforeach
							
						</div>
					</div>
					<!--End tab item-->

				</div>
				<!--End tab content-->

			</div>
			<!--End Tabs Shop-->
		</div>
	</div>
	<!--End section large top for tabs content-->
@endsection

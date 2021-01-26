{{--
  Template Name: Homepage
--}}

@extends('layouts.app')

@php
	$query = new WP_Query(array('post_type' => 'post', 'post_status' => 'publish','posts_per_page' => '3'));
@endphp

@section('content')
	<div id="hero" class="w-100 position-relative overflow-hidden">
		<div class="hero_content position-absolute d-flex align-items-center h-100 w-100">
			<div class="hero_content_inner container">
				<h2 class="font-weight-bold text-light">hallo</h2>
				<h2 class="text-secondary mb-default">hallo</h2>
				<p class="text-light mb-default">hallo hahahaha</p>

				<a href="" class="btn btn-dark">Neem contact op</a>
			</div>
		</div>
		<div id="heroCarousel" class="h-100">
			@for ($i = 0; $i < 3; $i++)
				<img class="square"
				     src="http://secondmoov.test/wp-content/uploads/2020/12/IMG_6189.png"
				     alt=""
				     style="object-fit: cover; object-position: center;"
				/>
			@endfor

		</div>
		<div id="customize-nav-hero" class="tns-nav-circles position-absolute">
			@for ($i = 0; $i < 3; $i++)
				<span></span>
			@endfor
		</div>
	</div>

	<div class="container-fluid bg-secondary pb-default-2 mb-default-2">
		<div class="container">
			<div class="row">
				<h2 class="title col-12 col-md-6 mb-default">Voordelen van 2ndMoov.</h2>
			</div>

			@for ($i = 0; $i < 2; $i++)
				<div class="row {{$i == 0 ? "mb-default" : null}}">
					@for ($j = 0; $j < 2; $j++)
						<div class="col-12 col-md-6 d-flex align-items-center {{$j == 0 ? "mb-default  mb-default-md" : null}}">
							<img src="http://secondmoov.test/wp-content/uploads/2020/12/IMG_6189.png" alt=""
							     style="width:20px; height:20px;" class="square"/>
							<p class="ml-default">testing hahsha </p>
						</div>
					@endfor
				</div>
			@endfor
		</div>
	</div>

	<div id="services" class="container">
		<div class="row">
			<h2 class="title col-12 col-md-6 mt-0 mb-default">Voordelen van 2ndMoov.</h2>
		</div>

		<div class="row justify-content-between">
			@for ($i = 0; $i < 3; $i++)
				<div class="col-12 col-md-4-default mb-default mb-default-md">
					<div class="p-default text-center service">
							<span class="service_container mx-auto border_image mb-default">
								<img class="service_img"
								     src="http://secondmoov.test/wp-content/uploads/2020/12/IMG_6189.png"
								     alt=""/>
							</span>

						<h4 class="service_name mb-default">
							Service
						</h4>

						<p class="service_text mb-default">Services Services Services Services </p>

						<a href="" class="btn btn-outline-primary">hoi</a>
					</div>
				</div>
			@endfor
		</div>
	</div>

	<div class="container">
		<div class="row">
			<h2 class="title col-12 col-md-6 mb-default">Voordelen van 2ndMoov.</h2>
		</div>
	</div>

	<div id="datablocks" class="fluid-container">
		<div class="datablocks">
			<div class="row">
				@for ($i = 0; $i < 3; $i++)
					<div class="datablock col-12 col-md-4 p-default d-flex flex-column {{$i == 0  ? 'pl-md-0' : null}}">
						<h4 class="text-light mb-default">2ndMoov.</h4>
						<p class="text-light mb-default">Breng digitale zorgoplossingen en begeleiding bij leefstijl
							verandering zo
							dichtbij de
							patiënt als mogelijk. Zeker nu.</p>
						<a href="" class="btn btn-outline-light ml-auto">test test</a>
					</div>
				@endfor
			</div>
		</div>
	</div>

	<div class="container-fluid position-relative pb-default-2 mb-default-4">
		<div class="container">
			<div class="row">
				<h2 class="title col-12 col-md-6 mb-default">Voordelen van 2ndMoov.</h2>

				<p class="text-content mb-default">
					lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum
					lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum
					lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum
				</p>
			</div>
		</div>

		<div id="appCarousel">
			@for ($i = 0; $i < 3; $i++)
				<div>
					<img class="w-100"
					     src="http://secondmoov.test/wp-content/uploads/2020/12/IMG_6189.png"
					     alt=""/>
				</div>
			@endfor

		</div>
		<div id="customize-nav-app" class="tns-nav-circles position-absolute bottom">
			@for ($i = 0; $i < 3; $i++)
				<span></span>
			@endfor
		</div>
	</div>

	<div id="clients" class="fluid-container position-relative">
		<div class="background bg-tertiary pb-5 fixed-bottom"></div>
		<div class="container">
			<div class="row">
				<h2 class="title col-12 col-md-6 mt-0 mb-default">Voordelen van 2ndMoov.</h2>
			</div>
		</div>
		<div class="container position-relative pb-default-2 mb-default-2">
			<div class="row justify-content-between">
				@for ($i = 0; $i < 3; $i++)
					<div class="col-12 col-md-4-default mb-default mb-default-md">
						<div class="card border-0 p-default text-center client">
							<span class="client_container mx-auto border_image mb-default">
								<img class="client_img"
								     src="http://secondmoov.test/wp-content/uploads/2020/12/IMG_6189.png"
								     alt=""/>
							</span>

							<h4 class="client_quote mb-default">"oftware developer bij Elevate Digital, Utrecht oftware
								developer bij
								Elevate Digital, Utrecht"</h4>

							<p class="client_name mb-default">- Samuel</p>

							<p class="client_job text-muted">Software developer bij Elevate Digital, Utrecht</p>
						</div>
					</div>
				@endfor
			</div>
		</div>
	</div>

	<div id="posts" class="container-fluid">
		<div class="container">
			<div class="row">
				<h2 class="title col-12 col-md-6 mt-0 mb-default">Voordelen van 2ndMoov.</h2>
			</div>
		</div>

		@while(have_posts()) @php the_post() @endphp
		@if($query->have_posts())
			<div class="row post justify-content-between mb-default-2">
				@php($i = 0)
				@while($query->have_posts()) @php($query->the_post()) @php($i++)
				<div class="col-12 col-md-4-default mb-default mb-default-md">
					<div class="card border-0 m-default position-relative h-100">
						<a href="{{ the_permalink() }}" class="d-block post_link h-100">
							<img src="{{the_field('headerimage')}}" alt="" class="w-100 post_image h-100">
						</a>
						<div class="post_content position-absolute bg-white w-100 fixed-bottom p-default squircles">
							<p class="date text-muted">{{ the_time('d F Y') }}</p>
							<h2>{{the_title()}}</h2>
						</div>
					</div>
				</div>

				@endwhile
				@php(wp_reset_postdata())
			</div>

			<div class="container d-flex">
				<a href="" class="btn btn-outline-dark mx-auto">test</a>
			</div>
		@endif
		@endwhile
	</div>
@endsection

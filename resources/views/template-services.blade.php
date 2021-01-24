{{--
  Template Name: Service Template
--}}

@extends('layouts.app')

@php
	$query = new WP_Query(array('post_type' => 'service', 'post_status' => 'publish','posts_per_page' => '-1'));
@endphp

@section('content')
	<div class="background small bg-secondary"></div>
	@if(get_field('intro_title') && get_field('intro_text') && get_field('intro_image'))
		<div class="container">
			<div class="row">
				<h2 class="title col-12 col-md-6">{{the_field('intro_title')}}</h2>
			</div>
		</div>
		<div class="container special">
			<div class="row align-items-center">
				<p class="col-12 col-md-6 font-weight-bold mb-4 mb-md-0">{{the_field('intro_text')}}</p>

				<img class="logo col-12 col-md-5 offset-md-1" src="{{the_field('intro_image')}}">
			</div>
		</div>
	@endif
	@while(have_posts()) @php the_post() @endphp
	@if($query->have_posts())
		<div class="container">
			@php($i = 0)
			@while($query->have_posts()) @php($query->the_post()) @php($i++)
			<div class="row">
				<div class="col-12">
					<h2 class="title mb-0 col-12 col-md-6">{{the_title()}}</h2>
				</div>
			</div>
			<div class="row {{$i % 2 == 1 ?'flex-row-reverse':''}}">
				<div class="service_text col-12 col-md-7 d-flex align-items-center {{$i % 2 == 1 ?'offset-md-1':''}}">
					<p class="font-weight-bold text-content">
						{{the_field('introduction')}}
					</p>
				</div>
				<div class="service_image col-12 col-md-4 justify-content-center d-flex icon-img {{$i % 2 == 0 ?'offset-md-1':''}}">
						<span class="border_image">
						<img class=""
						     src="{{the_field('image')}}"
						     alt="">
							</span>
				</div>
			</div>
			<div class="row mt-default-2">
				<div class="text text-content">
					{!! the_field('text') !!}
				</div>
			</div>
			@endwhile
			@php(wp_reset_postdata())
		</div>
		</div>
	@endif
	@endwhile()
@endsection

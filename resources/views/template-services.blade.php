{{--
  Template Name: Service Template
--}}

@extends('layouts.app')

@php
	$bgColors = ['border-primary','border-secondary','border-tertiary','border-dark'];
	$query = new WP_Query(array('post_type' => 'service', 'post_status' => 'publish','posts_per_page' => '-1'));
@endphp

@section('content')
	@include('components.introduction', ['title' => 'intro_title', 'text' => 'intro_text', 'image' => 'intro_image', 'defaultColor' =>'bg-secondary'])

	@if($query->have_posts())
		@while(have_posts()) @php the_post() @endphp
		<div class="container">
			<div class="row">
				<div class="col-12">
					<h2 class="title col-12 col-md-6 mb-default">{{the_field('service_title')}}</h2>
				</div>
			</div>
			@while($query->have_posts()) @php($query->the_post())
			<div class="row mb-default-2">
				<div class="service_image col-12 col-md-4 justify-content-center d-flex icon-img">
						<span class="border_image {{get_field('border_color') ? the_field('border_color') : $bgColors[rand(0, count($bgColors) - 1)] }}">
						<img class="service_img"
						     src="{{the_field('image')}}"
						     alt="">
							</span>
				</div>
				<div class="service_text col-12 col-md-8 d-flex align-items-center flex-wrap">
					<div class="col-12">
						<h2 class="title col-12 col-md-6 mt-0 mb-default">{{the_title()}}</h2>
					</div>

					<p class="font-weight-bold text-content">
						{{the_field('introduction')}}
					</p>

					<div class="text text-content">
						{!! the_field('text') !!}
					</div>
				</div>
			</div>
			@endwhile
			@php(wp_reset_postdata())
		</div>
		</div>
		@endwhile()
	@else
		<h3 class="text-light">{{the_field('notice')}}</h3>
	@endif
@endsection

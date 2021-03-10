{{--
  Template Name: Service Template
--}}

@extends('layouts.app')

@php
	$bgColors = ['border-primary','border-secondary','border-tertiary','border-dark'];
	$query = new WP_Query(array('post_type' => 'service', 'post_status' => 'publish','posts_per_page' => '-1'));
@endphp

@section('content')
	<div class="background small {{get_field('bg_color') ? the_field('bg_color') : 'bg-secondary'}}"></div>
	@include('components.introduction', ['title' => 'intro_title', 'text' => 'intro_text', 'image' => 'intro_image'])

	@if($query->have_posts())
		@while(have_posts()) @php the_post() @endphp
		<div class="container">
			@php($i = 0)
			@while($query->have_posts()) @php($query->the_post()) @php($i++)
			<div class="row">
				<div class="col-12">
					<h2 class="title mb-0 col-12 col-md-6 mb-default">{{the_title()}}</h2>
				</div>
			</div>
			<div class="row {{$i % 2 == 1 ?'flex-row-reverse':''}}">
				<div class="service_text col-12 col-md-7 d-flex align-items-center {{$i % 2 == 1 ?'offset-md-1':''}}">
					<p class="font-weight-bold text-content">
						{{the_field('introduction')}}
					</p>
				</div>
				<div class="service_image col-12 col-md-4 justify-content-center d-flex icon-img {{$i % 2 == 0 ?'offset-md-1':''}}">
						<span class="border_image {{get_field('border_color') ? the_field('border_color') : $bgColors[rand(0, count($bgColors) - 1)] }}">
						<img class="service_img"
						     src="{{the_field('image')}}"
						     alt="">
							</span>
				</div>
			</div>
			<div class="row">
				<div class="text text-content">
					{!! the_field('text') !!}
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

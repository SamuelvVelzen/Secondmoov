{{--
  Template Name: For who Template
--}}

@extends('layouts.app')

@php
	$query = new WP_Query(array('post_type' => 'forwho', 'post_status' => 'publish','posts_per_page' => '-1'));
@endphp

@section('content')
	<div class="background small {{get_field('bg_color') ? the_field('bg_color') : 'bg-tertiary'}}"></div>
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

		@while(have_posts()) @php the_post() @endphp
		@if($query->have_posts())
			<div class="container">
				@php($i = 0)
				@while($query->have_posts()) @php($query->the_post()) @php($i++)
				<div class="row forwho-contents {{$i % 2 == 1 ?'flex-row-reverse':''}}">
					<div class="col-12">
						<h2 class="title mb-0 col-12 col-md-6">{{the_title()}}</h2>
					</div>
					<div class="content col-12 col-md-6 {{$i % 2 == 1 ?'offset-md-1':''}}">
						<p class="introduction font-weight-bold text-content">
							{{get_field('content')['introduction']}}
						</p>
						<div class="text text-content">
							{!! get_field('content')['text'] !!}
						</div>
					</div>
					<div class="image col-12 col-md-5 {{$i % 2 == 1 ?'':'offset-md-1'}}">
						<img src="{{the_field('image')}}"
						     alt="" class="w-100">
					</div>
				</div>
				@endwhile
			</div>
		@endif
		@endwhile

	@endif
@endsection

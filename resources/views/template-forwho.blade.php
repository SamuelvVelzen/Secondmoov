{{--
  Template Name: For who Template
--}}

@extends('layouts.app')

@php
	$query = new WP_Query(array('post_type' => 'forwho', 'post_status' => 'publish','posts_per_page' => '-1'));
@endphp

@section('content')
	@include('components.introduction', ['title' => 'intro_title', 'text' => 'intro_text', 'image' => 'intro_image', 'defaultColor' => 'bg-tertiary'])

	@if($query->have_posts())
		@while(have_posts()) @php the_post() @endphp
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
					<img loading="lazy" src="{{the_field('image')}}"
					     alt="" class="w-100">
				</div>
			</div>
			@endwhile
		</div>
		@endwhile
	@else
		<h3 class="text-light">{{the_field('notice')}}</h3>
	@endif
@endsection

{{--
  Template Name: Actual template
--}}

@extends('layouts.app')

@php
	$query = new WP_Query(array('post_type' => 'post', 'post_status' => 'publish','posts_per_page' => '-1'));
@endphp

@section('content')
	<div class="background bg-primary"></div>
	<div class="container ">
		<div class="row">
			<h2 class="title text-light col-12 col-md-6">{{the_field('title')}}</h2>
		</div>

		@if($query->have_posts())
			@while(have_posts()) @php the_post() @endphp

			@php($i = 0)
			@while($query->have_posts()) @php($query->the_post()) @php($i++)
			@if ($i % 2 === 1)
				<div class="row posts">
					@endif
					<div class="post col-12 col-md-5 {{ $i % 2 === 0 ? 'offset-md-2' : '' }}">
						<div class="position-relative">
							<a href="{{ the_permalink() }}" class="d-block">
								<img src="{{the_field('headerimage')}}" alt="" class="w-100">
							</a>
							<a href="{{ the_permalink() }}">
								<div class="content position-absolute">
									<p class="date text-muted">{{ the_time('d F Y') }}</p>
									<h2 class="title">{{the_field('short_title')}}</h2>
									<p class="text">{{the_field('introduction')}}</p>
									<a href="{{the_permalink() }}" class="btn btn-primary">Lees meer...</a>
								</div>
							</a>
						</div>
					</div>
					@if ($i % 2 === 0)
				</div>
			@endif
			@endwhile
			@php(wp_reset_postdata())
			@endwhile
		@else
			<h3 class="text-light">{{the_field('notice')}}</h3>
		@endif
	</div>
@endsection

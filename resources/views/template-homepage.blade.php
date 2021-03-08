{{--
  Template Name: Homepage
--}}

@extends('layouts.app')

@php
	$bgColors = ['border-primary','border-secondary','border-tertiary','border-dark'];
	$posts = new WP_Query(array('post_type' => 'post', 'post_status' => 'publish','posts_per_page' => '3'));
	$services = new WP_Query(array('post_type' => 'service', 'post_status' => 'publish','posts_per_page' => '3'));
	$forwhos = new WP_Query(array('post_type' => 'forwho', 'post_status' => 'publish','posts_per_page' => '3'));
@endphp

@section('content')
	<div id="hero" class="w-100 position-relative overflow-hidden">
		@if(get_field('hero_content'))
			<div class="hero_content position-absolute d-flex align-items-center h-100 w-100 container">
				<div class="hero_content_outer">
					<h2 class="font-weight-bold text-light">{{get_field('hero_content')['title']}}</h2>
					<h2 class="text-secondary mb-default font-weight-normal">{{get_field('hero_content')['subtitle']}}</h2>
					<p class="text-light mb-default">{{get_field('hero_content')['text']}}</p>

					<a href="{{get_field('hero_content')['link']}}"
					   class="btn btn-dark">{{get_field('hero_content')['cta_label']}}</a>
				</div>
			</div>
		@endif
		@if(get_field('hero_images'))
			<div id="heroCarousel" class="h-100 d-flex">
				@foreach(get_field('hero_images') as $image)
					<div>
						<img class="square w-100 h-100"
						     src="{{$image}}"
						     alt=""
						     style="object-fit: cover; object-position: center; min-height:500px"
						/>
					</div>
				@endforeach

			</div>
			<div id="customize-nav-hero" class="tns-nav-circles position-absolute">
				@foreach(get_field('hero_images') as $image)
					<span></span>
				@endforeach
			</div>
		@endif
	</div>

	@if(get_field('usps_title') && get_field('usps'))
		<div class="container-fluid pb-default-2 mb-default-2 {{get_field('usps_bg_color') ? the_field('usps_bg_color') : 'bg-secondary'}}">
			<div class="container">
				<div class="row">
					<h2 class="title col-12 col-md-6 mb-default {{get_field('usps_bg_color') == 'bg-primary' ? 'text-light' :null}}">{{the_field('usps_title')}}</h2>
				</div>
				@php $uspsCount = 1 @endphp
				@foreach(get_field('usps') as $usp)
					@if($uspsCount % 2 == 1)
						<div class="row {{$uspsCount % 2 == 0 ? "mb-default" : null}}">
							@endif
							<div class="col-12 col-md-6 d-flex align-items-center {{$uspsCount % 2 != 0 ? "mb-default  mb-default-md" : null}}">
								<img src="{{$usp['usp_icon']}}" alt=""
								     style="width:20px; height:20px;" class="square"/>
								<p class="ml-default {{get_field('usps_bg_color') == 'bg-primary' ? 'text-light' :null}}">{{$usp['usp_text']}}</p>
							</div>
							@if($uspsCount % 2 == 0)
						</div>
					@endif
					@php $uspsCount++ @endphp
				@endforeach
			</div>
		</div>
	@endif


	@if(get_field('services_title') && get_field('services_cta_link'))
		@php $services_link = substr(get_field('services_cta_link'), 0, -1) @endphp
		<div id="services" class="container">
			<div class="row">
				<h2 class="title col-12 col-md-6 mt-0 mb-default">{{the_field('services_title')}}</h2>
			</div>
			<div class="row justify-content-between">
				@if(count(get_field('services')) == 0 && $services->have_posts())
					@while(have_posts()) @php the_post() @endphp
					<div class="row post justify-content-between mb-default-2">
						@php $serviceCount = 0 @endphp
						@while($services->have_posts())
							@php $services->the_post() @endphp @php $serviceCount++ @endphp
							<div class="col-12 col-md-{{count($services) == 3 ? '4' : (count($services) == 2 ?'6': '12')}}-default mb-default mb-default-md">
								<div class="p-default text-center service">
							<span class="service_container mx-auto border_image mb-default {{get_field('border_color') ? the_field('border_color') : $bgColors[rand(0, count($bgColors)-1)] }}">
								<img class="service_img"
								     src="{{the_field('image')}}"
								     alt=""/>
							</span>

									<h4 class="service_name mb-default">
										{{the_title()}}
									</h4>

									<p class="service_text mb-default lines-3">{{the_field('introduction')}}</p>
									@php $link = get_the_title() @endphp
									<a href="{{$services_link . '#' . $link}}"
									   class="btn btn-outline-primary">{{get_field('cta_label') ? the_field('cta_label') : 'Lees meer'}}</a>
								</div>
							</div>
						@endwhile
					</div>
					@php wp_reset_postdata() @endphp
					@endwhile
				@else
					@foreach(get_field('services') as $service)
						@php $id = $service['service']->ID @endphp
						<div class="col-12 col-md-{{$loop->count == 3 ? '4' : ($loop->count == 2 ?'6': '12')}}-default mb-default mb-default-md">
							<div class="p-default text-center service">
							<span class="service_container mx-auto border_image mb-default {{get_field('border_color', $id) ? the_field('border_color', $id) : $bgColors[rand(0, count($bgColors)-1)] }}">
								<img class="service_img"
								     src="{{the_field('image', $id)}}"
								     alt=""/>
							</span>

								<h4 class="service_name mb-default">
									{{get_the_title($id)}}
								</h4>

								<p class="service_text mb-default lines-3">{{the_field('introduction', $id)}}</p>

								@php $link = get_the_title($id) @endphp
								<a href="{{$services_link . '#' . $link}}"
								   class="btn btn-outline-primary">{{get_field('cta_label', $id) ? the_field('cta_label', $id) : 'Lees meer'}}</a>
							</div>
						</div>
					@endforeach
				@endif
			</div>
		</div>
	@endif

	@if(get_field('datablocks_title') && get_field('datablocks_cta_link'))
		@php $datablocks_link = substr(get_field('datablocks_cta_link'), 0, -1) @endphp
		<div class="container">
			<div class="row">
				<h2 class="title col-12 col-md-6 mb-default">{{the_field('datablocks_title')}}</h2>
			</div>
		</div>

		<div id="datablocks" class="fluid-container">
			<div class="datablocks">
				<div class="row">
					@if(count(get_field('datablocks')) == 0 && $forwhos->have_posts())
						@while(have_posts()) @php the_post() @endphp
						@php $datablocksCountWhile = 0 @endphp
						@while($forwhos->have_posts())
							@php $forwhos->the_post() @endphp @php $datablocksCountWhile++ @endphp
							<div class="datablock col-12 col-md-{{$forwhos->found_posts == 3 ? '4' : ($forwhos->found_posts == 2 ?'6': '12')}} d-flex flex-column {{$datablocksCountWhile == 1 ? 'pl-default-md' : null}}">
								<h4 class="text-light mb-default">{{the_field('short_title', $datablockId)}}</h4>
								<p class="text-light mb-default lines-3">{{the_field('introduction')}}</p>
								@php $link = get_the_title() @endphp
								<a href="{{$datablocks_link . '#' . $link}}"
								   class="btn btn-outline-light ml-auto mt-auto">{{get_field('cta_label') ? the_field('cta_label') : 'Lees meer'}}</a>
							</div>
						@endwhile
						@php wp_reset_postdata() @endphp
						@endwhile
					@else
						@foreach(get_field('datablocks') as $datablocks)
							@php $datablockId = $datablocks['datablock']->ID @endphp
							<div class="datablock col-12 col-md-{{$loop->count == 3 ? '4' : ($loop->count == 2 ?'6': '12')}} p-default d-flex flex-column {{$loop->first == 1 ? 'pl-default-md' : null}}">
								<h4 class="text-light mb-default">{{get_field('content', $datablockId)['short_title']}}</h4>
								<p class="text-light mb-default lines-3">{{get_field('content', $datablockId)['introduction']}}</p>
								@php $link = get_the_title($datablockId) @endphp
								<a href="{{$datablocks_link . '#' . $link}}"
								   class="btn btn-outline-light ml-auto mt-auto">{{get_field('content', $datablockId)['cta_label'] ? the_field('content', $datablockId)['cta_label'] : 'Lees meer'}}</a>
							</div>
						@endforeach
					@endif
				</div>
			</div>
		</div>
	@endif

	@if(get_field('app_title') && get_field('app_text') && get_field('app_gallery'))
		<div class="container-fluid position-relative pb-default-2 mb-default-4">
			<div class="container">
				<div class="row">
					<h2 class="title col-12 col-md-6 mb-default">{{the_field('app_title')}}</h2>

					<p class="text-content mb-default col-12">
						{{the_field('app_text')}}
					</p>
				</div>
			</div>

			@if(get_field('app_gallery'))
				<div id="appCarousel" class="d-flex">
					@foreach(get_field('app_gallery') as $appIamge)
						<div class="">
							<img class="w-100 h-100"
							     src="{{$appIamge}}"
							     alt=""/>
						</div>
					@endforeach

				</div>
				<div id="customize-nav-app" class="tns-nav-circles position-absolute bottom">
					@foreach(get_field('app_gallery') as $appIamge)
						<span></span>
					@endforeach
				</div>
			@endif
		</div>
	@endif

	@if(get_field('clients_title') && get_field('clients'))
		<div id="clients" class="fluid-container position-relative">
			<div class="background pb-5 fixed-bottom {{get_field('usps_bg_color') ? the_field('usps_bg_color') : 'bg-tertiary'}}"></div>
			<div class="container">
				<div class="row">
					<h2 class="title col-12 col-md-6 mt-0 mb-default">{{the_field('clients_title')}}</h2>
				</div>
			</div>
			<div class="container position-relative pb-default-2 mb-default-2">
				<div class="row justify-content-between">
					@foreach(get_field('clients') as $client)
						<div class="col-12 col-md-{{count(get_field('clients')) == 3 ? '4' : (count(get_field('client')) == 2 ?'6': '12')}}-default mb-default mb-default-md">
							<div class="card border-0 p-default text-center client">
							<span class="client_container mx-auto border_image mb-default {{$client['border_color'] ? $client['border_color'] : $bgColors[rand(0, count($bgColors)-1)] }}">
								<img class="client_img"
								     src="{{$client['client_image']}}"
								     alt=""/>
							</span>

								<h4 class="client_quote mb-default">"{{$client['client_quote']}}"</h4>

								<p class="client_name mb-default">- {{$client['client_name']}}</p>

								<p class="client_job text-muted">{{$client['client_job']}}
									bij {{$client['client_company']}}, {{$client['client_place']}}</p>
							</div>
						</div>
					@endforeach
				</div>
			</div>
		</div>
	@endif

	@if(get_field('actual_title') && get_field('actual_cta_link'))
		<div id="posts" class="container-fluid">
			<div class="container">
				<div class="row">
					<h2 class="title col-12 col-md-6 mt-0 mb-default">Voordelen van 2ndMoov.</h2>
				</div>
			</div>
			@if(count(get_field('posts')) != 0 && $posts->have_posts())
				@while(have_posts()) @php the_post() @endphp
				<div class="row post justify-content-between mb-default-2">
					@while($posts->have_posts()) @php($posts->the_post())
					<div class="col-12 col-md-{{$posts->found_posts > 3 ? '4' : ($posts->found_posts == 2 ?'6': '12')}}-default mb-default mb-default-md">
						<div class="card border-0 m-default position-relative h-100">
							<a href="{{ the_permalink() }}" class="d-block post_link h-100">
								<img src="{{the_field('headerimage')}}" alt="" class="w-100 post_image h-100">
							</a>
							<a href="{{ the_permalink() }}">
								<div class="post_content position-absolute bg-white w-100 fixed-bottom p-default squircles">
									<p class="date text-muted">{{ the_time('d F Y') }}</p>
									<h2>{{the_field('short_title')}}</h2>
								</div>
							</a>
						</div>
					</div>
					@endwhile
				</div>
				@php(wp_reset_postdata())
				@endwhile
			@else
				<div class="row post justify-content-between mb-default-2">
					@foreach(get_field('posts') as $singlePost)
						@php( $postId = $singlePost['post']->ID)
						<div class="col-12 col-md-{{$loop->count == 3 ? '4' : ($loop->count == 2 ?'6': '12')}}-default mb-default mb-default-md">
							<div class="card border-0 m-default position-relative h-100">
								<a href="{{ get_the_permalink($postId) }}" class="d-block post_link h-100">
									<img src="{{the_field('headerimage', $postId)}}" alt=""
									     class="w-100 post_image h-100">
								</a>
								<div class="post_content position-absolute bg-white w-100 fixed-bottom p-default squircles">
									<p class="date text-muted">{{ get_the_time('d F Y', $postId) }}</p>
									<h2>{{the_field('short_title', $postId)}}</h2>
								</div>
							</div>
						</div>
					@endforeach
				</div>
			@endif


			<div class="container d-flex">
				<a href="{{the_field('actual_cta_link')}}"
				   class="btn btn-outline-dark mx-auto">{{get_field('actual_cta_label') ? the_field('actual_cta_label') : 'Lees meer'}}</a>
			</div>
		</div>
	@endif
@endsection

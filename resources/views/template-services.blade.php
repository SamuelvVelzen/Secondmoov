{{--
  Template Name: Service Template
--}}

@extends('layouts.app')

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
	@php($services = get_field('services'))
	@if($services)
		<div class="container">
			@foreach($services as $service)
				<div class="row">
					<div class="col-12">
						<h2 class="title mb-0 col-12 col-md-6">{{$service['title']}}</h2>
					</div>
				</div>
				<div class="row {{$loop->index % 2 == 1 ?'flex-row-reverse':''}}">
					<div class="service_text col-12 col-md-7 d-flex align-items-center {{$loop->index % 2 == 1 ?'offset-md-1':''}}">
						<p class="font-weight-bold text-content">
							{{$service['introduction']}}
						</p>
					</div>
					<div class="service_image col-12 col-md-4 justify-content-center d-flex icon-img {{$loop->index % 2 == 0 ?'offset-md-1':''}}">
						<span class="border_image">
						<img class=""
						     src="@asset('images/icon.png')"
						     alt="">
							</span>
					</div>
				</div>
				<div class="row mt-default-2">
					<div class="text text-content">
						{!! $service['text'] !!}
					</div>
				</div>
			@endforeach
		</div>
	@endif
@endsection

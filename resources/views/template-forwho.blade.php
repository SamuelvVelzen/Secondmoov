{{--
  Template Name: For who Template
--}}

@extends('layouts.app')

@section('content')
	<div class="background small bg-tertiary"></div>
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
	@php($forwhos = get_field('for_who'))
	@if($forwhos)
		<div class="container">
			@foreach($forwhos as $forwho)
				<div class="row forwho-contents {{$loop->index % 2 == 1 ?'flex-row-reverse':''}}">
					<div class="col-12">
						<h2 class="title mb-0 col-12 col-md-6">{{$forwho['for_who_content']['title']}}</h2>
					</div>
					<div class="content col-12 col-md-6 {{$loop->index % 2 == 1 ?'offset-md-1':''}}">
						<p class="introduction font-weight-bold text-content">
							{{$forwho['for_who_content']['introduction']}}
						</p>
						<div class="text text-content">
							{!! $forwho['for_who_content']['text'] !!}
						</div>
					</div>
					<div class="image col-12 col-md-5 {{$loop->index % 2 == 1 ?'':'offset-md-1'}}">
						<img src="{{$forwho['for_who_image']}}"
						     alt="" class="w-100">
					</div>
				</div>
			@endforeach
		</div>
	@endif
@endsection

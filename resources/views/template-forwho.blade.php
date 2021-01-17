{{--
  Template Name: For who Template
--}}

@extends('layouts.app')

@section('content')
	<div class="background small bg-tertiary"></div>
	<div class="container">
		@php($forwhos = get_field('for_who'))
		@if($forwhos)
			@foreach($forwhos as $forwho)
				<div class="row forwho-contents {{$loop->index % 2 == 1 ?'flex-row-reverse':''}}">
					<div class="col-12">
						<h2 class="title mb-0 {{$loop->first ? 'text-light' : ''}}  col-12 col-md-6">{{$forwho['for_who_content']['title']}}</h2>
					</div>
					<div class="content col-12 col-md-6 {{$loop->index % 2 == 1 ?'offset-md-1':''}}">
						<p class="introduction {{$loop->first ? 'text-light' : ''}} font-weight-bold">
							{{$forwho['for_who_content']['introduction']}}
						</p>
						<div class="text">
							{!! $forwho['for_who_content']['text'] !!}
						</div>
					</div>
					<div class="image col-12 col-md-5 {{$loop->index % 2 == 1 ?'':'offset-md-1'}}">
						<img src="{{$forwho['for_who_image']}}"
						     alt="" class="w-100">
					</div>
				</div>
			@endforeach
		@endif
	</div>
@endsection

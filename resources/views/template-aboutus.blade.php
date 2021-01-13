{{--
  Template Name: About us template
--}}

@extends('layouts.app')

@section('content')
	@if(get_field('introduction'))
		@php($introduction = get_field('introduction'))
		<div class="container">
			<h1>{{$introduction['title']}}</h1>
		</div>
		<div class="container-fluid">
			<div class="row">
				<p class="col-12 col-lg-6 col-">{{$introduction['text']}}</p>

				<img class="logo col-12 col-lg-5 offset-lg-1" src="{{$introduction['image']}}">
			</div>
		</div>
	@endif
@endsection

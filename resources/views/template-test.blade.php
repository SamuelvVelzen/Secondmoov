{{--
  Template Name: Test Template
--}}

@extends('layouts.app')

@section('content')
	@php($img = get_field('test'))
	<pre>

	{{var_dump($img)}}
	</pre>

	<img
			src="{{$img['url']}}}"
			srcset="{{$img['sizes']['thumbnail']}} 10w, three.png 500w, four.png 1000w"
			alt="{{$img['description']}}"
			title="{{$img['caption']}}"
	/>
@endsection

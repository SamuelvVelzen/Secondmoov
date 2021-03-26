{{--
  Template Name: Test Template
--}}

@extends('layouts.app')

@section('content')
	@php
		$img = get_field('test');
		$srcset = "";
	@endphp

	@foreach ($img['sizes'] as $key=>$data)
		@if(str_contains($key,'height') !== false || str_contains($key,'width') !== false)
		@else
			@php($srcset .= "{$data} {$img['sizes'][$key. '-width']}w, ")
		@endif
	@endforeach
	<pre>
			{{var_dump($img)}}
	</pre>

	{!! wp_get_attachment_image( $img['id'], 'full', false,['class'=> 'hoi nee fake'] ) !!}

	<img
			src="{{$img['url']}}"
			alt="{{$img['description']}}"
			title="{{$img['caption']}}"
			height="{{$img['height']}}"
			width="{{$img['width']}}"
			srcset="{{$srcset}}"
			sizes="(max-width:{{$img['width']}}px) 100vw, {{$img['width']}}px"
	/>
@endsection

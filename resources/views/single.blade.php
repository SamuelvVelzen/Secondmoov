@extends('layouts.app')

@php
	$query = new WP_Query(array('post_type' => 'post', 'post_status' => 'publish','posts_per_page' => '2', 'orderby' => 'date', 'order' => 'DESC'));
@endphp

@section('content')
	@while(have_posts()) @php the_post() @endphp
	@include('partials.content-single-'.get_post_type(), array('query' => $query))
	@endwhile
@endsection

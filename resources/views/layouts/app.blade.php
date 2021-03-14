<!doctype html>
<html {!! get_language_attributes() !!}>
@include('partials.head')
<body @php body_class() @endphp>
<div>
	@php do_action('get_header') @endphp
	@include('partials.navbar')
	<main class="wrap" role="document">

		@yield('content')

		{{--	@if (App\display_sidebar())--}}
		{{--		<aside class="sidebar">--}}
		{{--			@include('partials.sidebar')--}}
		{{--		</aside>--}}
		{{--	@endif--}}
	</main>
	@php do_action('get_footer') @endphp
	@include('partials.footer')
	@php wp_footer() @endphp
</div>
</body>
</html>

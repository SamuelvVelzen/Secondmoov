<!doctype html>
<html {!! get_language_attributes() !!}>
@include('partials.head')
<body @php body_class() @endphp>
<article>
	{{--	@php do_action('get_header') @endphp--}}
	@include('partials.navbar')

	<main role="document">

		@yield('content')

		{{--	@if (App\display_sidebar())--}}
		{{--		<aside class="sidebar">--}}
		{{--			@include('partials.sidebar')--}}
		{{--		</aside>--}}
		{{--	@endif--}}
	</main>
	
	@include('partials.footer')
	@php wp_footer() @endphp
</article>
</body>
</html>

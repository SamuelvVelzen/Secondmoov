<article @php post_class() @endphp>
	<div class="background {{get_field('background_color') ? get_field('background_color'): 'bg-tertiary'}}"></div>
	<header>
		@include('partials.entry-meta')
	</header>
	<div class="container">
		<h1 class="m-default mx-0">{!! get_the_title() !!}</h1>
		<p class="font-weight-bold text-content mb-default">{{the_field('introduction')}}</p>
	</div>
	<div class="entry-content text-content">
		@include('components.flexible_content')
	</div>
	<footer>
		{!! wp_link_pages(['echo' => 0, 'before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']) !!}
	</footer>
	@php comments_template('/partials/comments.blade.php') @endphp
</article>

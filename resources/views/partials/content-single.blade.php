<article @php post_class() @endphp>
	<div class="background {{get_field('background_color') ? get_field('background_color'): 'bg-tertiary'}}"></div>
	<header>
		@include('partials.entry-meta')
	</header>
	<div class="container">
		<h1 class="mt-default mb-default mx-0">{{ the_title() }}</h1>
		<p class="font-weight-bold text-content mb-default">{{the_field('introduction')}}</p>
	</div>
	<div class="entry-content text-content">
		@include('components.flexible_content')
	</div>
	<footer class="{{get_field('background_color_relevant') ? the_field('background_color_relevant') : 'bg-primary'}} pb-default-4">
		@include('components.relevant_posts', array('query' => $query))
	</footer>
</article>

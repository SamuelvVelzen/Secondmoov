<header id="navbar">
	<div class="container">
		<a class="nav_brand" href="{{ home_url('/') }}">{{ get_bloginfo('name', 'display') }}</a>
		<nav class="nav">
			<ul class="nav_container">
				@while(have_rows('menu','option')) @php(the_row())
				@php($pageID = get_sub_field('link', false, false))
				@php($count++)
				@if($count <= 2)
					<li class="nav_container_item">
						<a class="nav_container_item_link" href="{{get_the_permalink($pageID)}}">
							{{get_the_title($pageID)}}
						</a>
					</li>
				@endif
				@endwhile
			</ul>
		</nav>
	</div>
</header>

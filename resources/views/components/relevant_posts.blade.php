<div class="container">
	<div class="row">
		<h2 class="title col-12 col-md-6 {{get_field('background_color_relevant') == 'bg-primary' || get_field('background_color_relevant') == ""? 'text-light' : null}}">{{get_field('title') ? get_field('title') : 'Lees meer.'}}</h2>
	</div>

	<div class="row posts">
		@if(get_field('posts'))
			@php($posts = get_field('posts'))
			@if(count($posts) > 1)
				@php($i = 0)
				@foreach($posts as $post)
					@php($i++)
					@php($postId = $post['post']->ID)
					<div class="post col-12 col-md-5 {{ $i % 2 === 0 ? 'offset-md-2' : '' }}">
						<div class="position-relative">
							<a href="{{ get_the_permalink($postId) }}" class="d-block post_link h-100">
								<img src="{{the_field('headerimage', $postId)}}" alt=""
								     class="w-100">
							</a>
							<a href="{{ get_the_permalink($postId) }}">
								<div class="content position-absolute">
									<p class="date text-muted">{{ the_time('d F Y', $postId) }}</p>
									<h2 class="title">{{the_field('short_title', $postId)}}</h2>
									<p class="text">{{the_field('introduction', $postId)}}</p>
									<a href="{{the_permalink($postId) }}"
									   class="btn btn-primary">{{get_field('cta_label', $postId) ? the_field('cta_label', $postId) : 'Lees meer...'}}</a>
								</div>
							</a>
						</div>
					</div>
				@endforeach
			@else
				@php($postId = $posts[0]['post']->ID)
				<div class="post col-12 col-md-5">
					<div class="position-relative">
						<a href="{{ get_the_permalink($postId) }}" class="d-block post_link h-100">
							<img src="{{the_field('headerimage', $postId)}}" alt=""
							     class="w-100">
						</a>
						<a href="{{ get_the_permalink($postId) }}">
							<div class="content position-absolute">
								<p class="date text-muted">{{ the_time('d F Y', $postId) }}</p>
								<h2 class="title">{{the_field('short_title', $postId)}}</h2>
								<p class="text">{{the_field('introduction', $postId)}}</p>
								<a href="{{the_permalink($postId) }}"
								   class="btn btn-primary">{{get_field('cta_label', $postId) ? the_field('cta_label', $postId) : 'Lees meer...'}}</a>
							</div>
						</a>
					</div>
				</div>

				@foreach($posts as $post)
					@php($i = 0)
					@while($query->have_posts()) @php($query->the_post()) @php($i++)
					@if($post['post']->ID == get_the_id())
						@continue
					@else
						<div class="post col-12 col-md-5 offset-md-2">
							<div class="position-relative">
								<a href="{{ the_permalink() }}" class="d-block">
									<img src="{{the_field('headerimage')}}" alt="" class="w-100">
								</a>
								<a href="{{ the_permalink() }}">
									<div class="content position-absolute">
										<p class="date text-muted">{{ the_time('d F Y') }}</p>
										<h2 class="title">{{the_field('short_title')}}</h2>
										<p class="text">{{the_field('introduction')}}</p>
										<a href="{{the_permalink() }}"
										   class="btn btn-primary">{{get_field('cta_label') ? the_field('cta_label') : 'Lees meer...'}}</a>
									</div>
								</a>
							</div>
						</div>
					@endif
					@endwhile
					@php(wp_reset_postdata())
				@endforeach
			@endif
		@else
			@if($query->have_posts())
				@php($i = 0)
				@while($query->have_posts()) @php($query->the_post()) @php($i++)

				<div class="post col-12 col-md-5 {{ $i % 2 === 0 ? 'offset-md-2' : '' }}">
					<div class="position-relative">
						<a href="{{ the_permalink() }}" class="d-block">
							<img src="{{the_field('headerimage')}}" alt="" class="w-100">
						</a>
						<a href="{{ the_permalink() }}">
							<div class="content position-absolute">
								<p class="date text-muted">{{ the_time('d F Y') }}</p>
								<h2 class="title">{{the_field('short_title')}}</h2>
								<p class="text">{{the_field('introduction')}}</p>
								<a href="{{the_permalink() }}"
								   class="btn btn-primary">{{get_field('cta_label') ? the_field('cta_label') : 'Lees meer...'}}</a>
							</div>
						</a>
					</div>
				</div>
				@endwhile
				@php(wp_reset_postdata())
			@endif
		@endif
	</div>
</div>
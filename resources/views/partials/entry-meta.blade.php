<div class="container p-default px-0">
	<div class="row">
		<img src="{{the_field('headerimage')}}" alt="" class="w-100">
	</div>
</div>
<div class="d-flex container align-items-center">
	@php($get_author_id = get_the_author_meta('ID'))
	@php($get_author_gravatar = get_avatar_url($get_author_id))
	<span class="border_image border_image_small mr-default-2" style="height:50px; width: 50px;">
								<img
										style="height:40px; width: 40px;"
										class=""
										src="{{$get_author_gravatar}}"
										alt="">
							</span>
	<p class="text-muted">{{ get_the_author() }}</p>
	<time class="updated ml-auto text-muted" datetime="{{ get_post_time('c', true) }}">{{ get_the_date() }}</time>
</div>

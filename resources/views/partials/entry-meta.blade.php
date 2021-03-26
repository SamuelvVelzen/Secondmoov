@php
	$months = ['januari', 'februari', 'maart','april','mei','juni','juli','augustus','september','oktober','november','december'];
@endphp

<div class="container p-default px-0">
	<div class="row">
		{!! wp_get_attachment_image( get_field('headerimage'), 'full', false,['class'=> 'w-100 h-auto postHeroImage'] ) !!}
	</div>
</div>
<div class="d-flex container align-items-center">
	@php($get_author_id = get_the_author_meta('ID'))
	@php($get_author_gravatar = get_avatar_url($get_author_id))
	<span class="border_image border_image_small mr-default-2">
		<img
				src="{{$get_author_gravatar}}"
				alt="avatar author "
				height="40"
				width="40"
		/>
	</span>
	<p class="text-muted">{{ get_the_author() }}</p>
	<time class="updated ml-auto text-muted" datetime="{{ get_post_time('c', true) }}">
		@php($result = str_replace(get_the_time('F'), $months[get_the_time('n')-1], get_the_time('d F Y')))
		{{$result}}
	</time>
</div>

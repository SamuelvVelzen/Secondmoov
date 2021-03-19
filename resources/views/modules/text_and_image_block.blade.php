<div class="container mb-default mx-auto">
	<div class="row {{get_sub_field('image_right') ? 'flex-row-reverse' : null}}">

		<div class="col-md-6 mb-default text-content"><p
					class="{{get_sub_field('image_right') ? 'ml-default' : 'mr-default'}}">{!! the_sub_field('text') !!}</p>
		</div>
		<div class="col-md-6 mb-default {{get_sub_field('image_right') ? 'pr-default' : 'pl-default'}}">
			<img loading="lazy" src="{{the_sub_field('image')}}" alt="" class="w-100 sticky-top-nav">
		</div>
	</div>
</div>
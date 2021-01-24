@while(have_rows('flexible_post_content'))  @php the_row() @endphp
@if(get_row_layout() == 'full_text_block')
	<div class="container mb-default">
		<div class="text-content"><p>{{ the_sub_field('text') }}</p></div>
	</div>
@endif

@if(get_row_layout() == 'text_2_columns_block')
	<div class="container mb-default">
		<div class="row">
			<div class="col-md-6 mb-default text-content"><p class=" mr-default">{{ the_sub_field('text_1') }}</p></div>
			<div class="col-md-6 mb-default text-content"><p class=" ml-default">{{ the_sub_field('text_2') }}</p></div>
		</div>
	</div>
@endif

@if(get_row_layout() == 'text_and_image_block')
	<div class="container mb-default">
		<div class="row {{get_sub_field('image_right') ? 'flex-row-reverse' : null}}">

			<div class="col-md-6 mb-default text-content"><p
						class="{{get_sub_field('image_right') ? 'ml-default' : 'mr-default'}}">{{ the_sub_field('text') }}</p>
			</div>
			<div class="col-md-6 mb-default {{get_sub_field('image_right') ? 'pr-default' : 'pl-default'}}">
				<img src="{{the_sub_field('image')}}" alt="" class="w-100 sticky-top-nav">
			</div>
		</div>
	</div>
@endif

@if(get_row_layout() == 'image_block')
	<div class="container mb-default">
		<img src="{{the_sub_field('image')}}" alt="" class="w-100">
	</div>
@endif

@if(get_row_layout() == 'yt_embed_block')
	<div class="container mb-default">
		<div class="videoWrapper squircles bg-dark">
			{{the_sub_field('youtube')}}
		</div>
	</div>
@endif

@endwhile
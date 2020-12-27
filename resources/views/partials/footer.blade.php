<footer id="footer" class="container">
	@if (get_field('partners','option'))
		<div id="partnerCarousel" class="carousel slide w-100 slideshow" data-ride="carousel">
			<div class="carousel-inner w-100" role="listbox">
				@php($images = get_field('partners', 'option'))
				@php($count = 0)
				@foreach($images as $image)
					@php($count++)
					@if ($count <= 6)
						<div class="carousel-item {{$count == 1 ? 'active' : null}}">
							<img class="partner d-block col-3 img-fluid" src="{{$image['url']}}"
							     alt="{{$image['alt']}}">
						</div>
					@endif
				@endforeach
			</div>
		</div>
	@endif

	<div class="info row">
		<div class=" col-12 col-sm-6 col-md-4 row">
			@if (have_rows('service','option'))
				<div class="services col-12">
					@while(have_rows('service','option')) @php(the_row())
					@php($pageID = get_sub_field('link', false, false))
					@php($count++)
					@if($count <= 3)
						<a class="services_link" href="{{get_the_permalink($pageID)}}" target="_blank">
							{{get_the_title($pageID)}}
						</a>
					@endif
					@endwhile
				</div>
			@endif

			@if (have_rows('social','option'))
				<div class="socials col-12 order-0">
					@while(have_rows('social','option')) @php(the_row())
					@php($pageID = get_sub_field('url', false, false))
					<a class="socials_link" href="{{get_the_permalink($pageID)}}">
						<img class="socials_img" src="{{the_sub_field('image')}}" alt="">
					</a>
					@endwhile
				</div>
			@endif
		</div>

		<div class="logo_container row justify-content-center col-12 col-md-4 order-first order-md-0">
			@if(get_field('logo_image', 'option'))
				<img class="logo" src="{{the_field('logo_image', 'option')}}">
			@else
				<img class="logo" src="@asset('images/logo.png')">
			@endif
		</div>

		@if (have_rows('contact','option'))
			<div class="contacts  col-12 col-sm-6 col-md-4 row align-content-sm-end flex-column">
				@while(have_rows('contact','option')) @php(the_row())
				@php($pageID = get_sub_field('url', false, false))

				<div class="contacts_container">
					<a class="contacts_container_link"
					   href="{{get_sub_field('type') =="E-mail" ? "mailto" : "tel"}}:{{the_sub_field('info')}}">
						<img class="contacts_container_img" src="{{the_sub_field('image')}}" alt="">
						<p>{{the_sub_field('info')}}</p>
					</a>
				</div>
				@endwhile
			</div>
		@endif
	</div>
</footer>

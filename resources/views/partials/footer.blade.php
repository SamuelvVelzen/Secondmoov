<footer id="footer">
	@if (get_field('partners','option'))
		<div id="partnerCarousel" class="d-flex align-items-center">
			@php($images = get_field('partners', 'option'))
			@php($count = 0)
			@foreach($images as $image)
				<img class="" src="{{$image['url']}}"
				     alt="{{$image['alt']}}">
			@endforeach
		</div>
	@endif

	<div class="info container">
		<div class="row">
			<div class="service_social col-12 col-sm-6 col-md-4">
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
					<div class="socials col-12 order-0 ">
						@while(have_rows('social','option')) @php(the_row())
						@php($pageID = get_sub_field('url', false, false))
						<a class="socials_link" href="{{get_the_permalink($pageID)}}">
							<img class="socials_img" src="{{the_sub_field('image')}}" alt="">
						</a>
						@endwhile
					</div>
				@endif
			</div>

			<div class="logo_container d-flex justify-content-center col-12 col-md-4 order-first order-md-0">
				@if(get_field('logo_image', 'option'))
					<img class="logo" src="{{the_field('logo_image', 'option')}}">
				@else
					<img class="logo" src="@asset('images/logo.png')">
				@endif
			</div>

			@if (have_rows('contact','option'))
				<div class="contacts  col-12 col-sm-6 col-md-4 align-items-sm-end d-flex flex-column justify-content-center">
					<div class="contacts_container">
						@while(have_rows('contact','option')) @php(the_row())
						@php($pageID = get_sub_field('url', false, false))
						<div class="contact_container">
							<a class="contact_container_link"
							   href="{{get_sub_field('type') =="E-mail" ? "mailto" : "tel"}}:{{the_sub_field('info')}}">
								@if(get_sub_field('type') == 'E-mail')
									<img class="contact_container_img email" src="@asset('images/mail.png')" alt="">
								@else
									<img class="contact_container_img phone" src="@asset('images/phone.png')" alt="">
								@endif

								<p>{{the_sub_field('info')}}</p>
							</a>
						</div>
						@endwhile
					</div>
				</div>
			@endif
		</div>
	</div>
</footer>

<footer id="footer">
	@if (get_field('partners','option'))
		<div class="container-fluid">
			<div id="partnerCarousel" class="d-flex align-items-center">
				@php($images = get_field('partners', 'option'))
				@php($count = 0)
				@foreach($images as $image)
					<img loading="lazy" class="square" src="{{$image['url']}}"
					     alt="{{$image['alt']}}">
				@endforeach
			</div>
		</div>
	@endif

	<div class="container">
		<div class="info">
			<div class="row">
				<div class="service_social col-12 col-sm-6 col-md-4">
					@if (have_rows('service','option'))
						<div class="services col-12 d-flex d-sm-block justify-content-center">
							@php($count = 0)
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
						<div class="socials col-12 order-0 d-flex d-sm-block justify-content-center">
							@while(have_rows('social','option')) @php(the_row())
							<a class="socials_link" target="_blank" href="{{the_sub_field('url')}}">
								<img loading="lazy" class="socials_img square" src="{{the_sub_field('image')}}" alt="">
							</a>
							@endwhile
						</div>
					@endif
				</div>

				<div class="logo_container d-flex justify-content-center col-12 col-md-4 order-first order-md-0">
					@if(get_field('logo_image', 'option'))
						<img loading="lazy" class="logo" src="{{the_field('logo_image', 'option')}}">
					@else
						<img loading="lazy" class="logo" src="@asset('images/logo.png')">
					@endif
				</div>

				@if (have_rows('contact','option'))
					<div class="contacts  col-12 col-sm-6 col-md-4 align-items-sm-end d-flex flex-column justify-content-center">
						<div class="contacts_container">
							@while(have_rows('contact','option')) @php(the_row())
							@php($pageID = get_sub_field('url', false, false))
							<div class="contact_container">
								@if(get_sub_field('type') === "Email" || get_sub_field('type') === "Telefoonnummer")
									<a class="contact_container_link"
									   href="{{get_sub_field('type') === "Email" ? 'mailto' : (get_sub_field('type') === "Telefoonnummer" ?'tel' : '')}}:{{the_sub_field('info')}}">
										@endif

										@if(get_sub_field('type') === "Whatsapp")
											<img loading="lazy" class="square contact_container_img"
											     src="@asset('images/whatsapp.png')"
											     alt="">
										@elseif(get_sub_field('type') === "Email")
											<img loading="lazy" class="square contact_container_img"
											     src="@asset('images/mail.png')"
											     alt="">
										@elseif(get_sub_field('type') === "Telefoonnummer")
											<img loading="lazy" class="square contact_container_img"
											     src="@asset('images/phone.png')"
											     alt="">
										@else
											<img loading="lazy" class="square contact_container_img"
											     src="@asset('images/letter.png')"
											     alt="">
										@endif

										<span>{{the_sub_field('info')}}</span>

										@if(get_sub_field('type') === "Email" || get_sub_field('type') === "Telefoonnummer")
									</a>
								@endif
							</div>
							@endwhile
						</div>
					</div>
				@endif
			</div>
		</div>
	</div>
</footer>

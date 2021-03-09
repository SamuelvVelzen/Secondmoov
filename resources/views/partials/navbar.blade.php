<div id="navbar-upper">
	<div class="container d-flex align-items-center">
		<a class="nav_brand" href="{{ home_url('/') }}">
			<img class="nav_brand_logo square" src="@asset('images/logo.png')">
		</a>
		@while(have_rows('contact','option')) @php(the_row())
		@php($pageID = get_sub_field('url', false, false))
		@if(get_sub_field('type') == "Telefoonnummer")
			<div class="ml-auto contact_container d-flex align-items-center">
				<img class="contact_container_logo square" src="@asset('images/phone.png')">
				<a class="contact_container_link d-flex flex-column text-decoration-none"
				   href="tel:{{the_sub_field('info')}}">
					<p class="d-none d-md-block">Heb je een vraag?</p>
					<p><b class="d-block d-md-inline-block">Bel ons <span class="d-none d-md-inline-block">• </span>
						</b>{{the_sub_field('info')}}</p>
				</a>
			</div>
		@endif
		@endwhile
	</div>
</div>

<header id="navbar-lower" class="zindex-sticky">
	<nav class="container navbar_container">
		<ul class="navbar_group pl-0 d-flex list-unstyled mb-0 col-12 align-items-center">
			@php($i = 0)
			@while(have_rows('menu','option'))
				@php(the_row())
				@php($pageID = get_sub_field('link', false, false))
				@php($i++)
				@if($i == 2)
					<div class="w-100 d-md-flex d-none align-items-center">
						@endif
						<li class="navbar_group_item {{$i == 1 ? 'first' : null}}">
							<a class="navbar_group_item_link" href="{{get_the_permalink($pageID)}}">
								{{get_the_title($pageID)}}
							</a>
						</li>
						@endwhile

						@if(get_field('cta','option'))
							@php($cta = get_field('cta', 'option'))
							<a class="btn btn-primary ml-auto" href="{{$cta['link']}}">
								{{$cta['label']}}
							</a>
						@endif
					</div>

					<div id="mobileButton" class="ml-auto">
						<div class="d-block d-md-none mobileButton">
							<span></span>
							<span></span>
							<span></span>
							<span></span>
							<span></span>
							<span></span>
						</div>
					</div>
		</ul>
	</nav>
</header>

<div id="mobileNavbarContainer">
	<div class="mobileNavbarContainerInner">
		@while(have_rows('menu','option'))
			@php(the_row())
			@php($pageID = get_sub_field('link', false, false))
			<a class="navbar_group_item_link" href="{{get_the_permalink($pageID)}}">
				<h3>{{get_the_title($pageID)}}</h3>
			</a>
		@endwhile

		@if(get_field('cta','option'))
			@php($cta = get_field('cta', 'option'))
			<a class="btn btn-primary" href="{{$cta['link']}}">
				{{$cta['label']}}
			</a>
		@endif
	</div>
</div>
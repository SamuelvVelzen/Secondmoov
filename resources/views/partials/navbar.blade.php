<div id="navbar-upper">
	<div class="container d-flex align-items-center">
		<a class="nav_brand" href="{{ home_url('/') }}">
			<img class="nav_brand_logo square" src="@asset('images/logo.png')">
		</a>
		@while(have_rows('contact','option')) @php(the_row())
		@php($pageID = get_sub_field('url', false, false))
		@if(get_sub_field('type') != "E-mail")
			<div class="ml-auto contact_container d-flex align-items-center">
				<img class="contact_container_logo square" src="@asset('images/phone.png')">
				<a class="contact_container_link d-flex flex-column"
				   href="{{get_sub_field('type') =="E-mail" ? "mailto" : "tel"}}:{{the_sub_field('info')}}">
					<p>Heb je een vraag?</p>
					<p><b>Bel ons • </b>{{the_sub_field('info')}}</p>
				</a>
			</div>
		@endif
		@endwhile
	</div>
</div>

<header id="navbar-lower" class="zindex-sticky">
	<nav class="container navbar_container">
		<ul class="navbar_group pl-0 d-flex list-unstyled mb-0 col-12 align-items-center">
			@while(have_rows('menu','option'))
				@php(the_row())
				@php($pageID = get_sub_field('link', false, false))
				@php($count++)
				@if($count <= 6)
					<li class="navbar_group_item">
						<a class="navbar_group_item_link" href="{{get_the_permalink($pageID)}}">
							{{get_the_title($pageID)}}
						</a>
					</li>
				@endif
			@endwhile
			@if(get_field('cta','option'))
				@php($cta = get_field('cta', 'option'))
				<a class="btn btn-primary ml-auto" href="{{$cta['link']}}">
					{{$cta['label']}}
				</a>
			@endif
		</ul>
	</nav>
</header>

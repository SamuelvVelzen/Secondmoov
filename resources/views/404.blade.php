@extends('layouts.app')

@section('content')
	@while(have_rows('404','option')) @php(the_row())
	<div class="container d-flex align-items-center justify-content-center h-100">
		<div class="row m-top-default">
			<div class="col-12 text-center">
				<h1 class="title">{{ the_sub_field('title') }}</h1>
				<div class="mt-default">{{ the_sub_field('subtitle') }}</div>

				@while(have_rows('button', 'option')) @php(the_row())
				<a href="{{ the_sub_field('link') }}" class="btn btn-primary mt-default">
					{{ the_sub_field('label') }}
				</a>
				@endwhile

				@while(have_rows('group_links', 'option')) @php(the_row())
				@if(get_sub_field('title') != "" || get_sub_field('links') != "")
					<h4 class="title mb-0">{{ the_sub_field('title') }}</h4>

					@if(have_rows('links')) @php(the_row())
					<a href="{{ the_sub_field('link') }}" class="btn btn-link">
						{{ the_sub_field('label') }}
					</a>
					@endif
				@endif
				@endwhile
			</div>
		</div>
	</div>
	@endwhile
@endsection

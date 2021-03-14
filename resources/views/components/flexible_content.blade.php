@if (have_rows('flexible_post_content'))
	@while (have_rows('flexible_post_content')) @php the_row() @endphp
	@include('modules.'. get_row_layout())
	@endwhile
@endif
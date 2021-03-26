<div class="container-fluid color-introduction {{get_field('bg_color') ? the_field('bg_color') : $defaultColor}}">
	<div class="container">
		<div class="row">
			<h2 class="title col-12 {{get_field('bg_color') === 'bg-secondary' ? 'text-dark' : 'text-light'}}">{{the_field($title)}}</h2>
		</div>
	</div>
</div>
<div class="container special pt-default">
	<div class="row align-items-center">
		<div class="col-12 col-md-6 font-weight-bold mb-4 mb-md-0">
			{!! the_field($text) !!}
		</div>

		{!! wp_get_attachment_image( get_field($image), 'full', false,['class'=> 'logo col-12 col-md-5 offset-md-1 h-auto w-100'] ) !!}
	</div>
</div>
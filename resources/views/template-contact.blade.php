{{--
  Template Name: Contact template
--}}

@extends('layouts.app')

@section('content')
	<div class="background {{get_field('bg_color') ? the_field('bg_color') : 'bg-primary'}}"></div>
	<div class="container">
		<h2 class="title mb-0 text-light col-12 col-md-6">{{the_field('container_title')}}</h2>
		<div class="row">
			<div class="col-12 col-md-5">
				<h4 class="subtitle text-light col-12">{{the_field('container_subtitle')}}</h4>
				<p class="text-light">{{the_field('container_introduction')}}</p>

				@php($infos = get_field('container_information'))
				@foreach($infos as $info)
					<div class="d-flex align-items-center info_container">
						@if($info['type'] === "Whatsapp")
							<img class="square" src="@asset('images/whatsapp.png')" alt="">
						@elseif($info['type'] === "Email")
							<img class="square" src="@asset('images/mail.png')" alt="">
						@elseif($info['type'] === "Telefoonnummer")
							<img class="square" src="@asset('images/phone.png')" alt="">
						@else
							<img class="square" src="@asset('images/letter.png')" alt="">
						@endif

						<div class="d-flex flex-column font-weight-bold info_content">
							{{$info['cta_label']}}
							<p class="">
								<span class="text-uppercase">{{$info['cta_info']}} • <span
											class="font-weight-normal">{{$info['cta_reaction_time']}}</span></span>
							</p>
						</div>
					</div>
				@endforeach
			</div>
			<div class="col-12 col-md-6 offset-md-1">
				<div class="form">
					<h4 class="subtitle my-0 col-12">{{the_field('form_title')}}</h4>
					{{the_field('form_form')}}
				</div>
			</div>
		</div>
	</div>
@endsection

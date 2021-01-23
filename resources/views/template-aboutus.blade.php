{{--
  Template Name: About us template
--}}

@extends('layouts.app')

@section('content')
	<div class="background medium bg-secondary"></div>
	@if(get_field('intro_title') && get_field('intro_text') && get_field('intro_image'))
		<div class="container">
			<div class="row">
				<h2 class="title col-12 col-md-6">{{the_field('intro_title')}}</h2>
			</div>
		</div>
		<div class="container special">
			<div class="row align-items-center">
				<p class="col-12 col-md-6 font-weight-bold mb-4 mb-md-0">{{the_field('intro_text')}}</p>

				<img class="logo col-12 col-md-5 offset-md-1" src="{{the_field('intro_image')}}">
			</div>
		</div>
	@endif
	@php($members = get_field('member_teams'))
	@if($members)
		<div class="fluid-container position-relative mt-default-4">
			<div class="background bg-tertiary pb-5 fixed-bottom"></div>
			<div class="container position-relative">
				<div class="row">
					<h2 class="col-12 col-md-6">{{the_field('member_title')}}</h2>
				</div>
				<div id="memberCarousel" class="mb-default-4">
					@foreach($members as $member)
						<div>
							<div class="card text-center team_member">
							<span class="member_image mx-auto border_image">
								<img class="member_image_img"
								     src="{{$member['image']}}"
								     alt="">
							</span>

								<h4 class="member_name">{{$member['name']}}</h4>

								<p class="member_text">{{$member['text']}}</p>

								@foreach($member['contact_information'] as $contact)
									<div class="member_contact_info d-flex justify-content-center align-items-center">
										@if($contact['type'] === "Whatsapp")
											<img class="square member_contact_info_img"
											     src="@asset('images/mail.png')"
											     alt="">
										@elseif($contact['type'] === "Email")
											<img class="square member_contact_info_img"
											     src="@asset('images/mail.png')"
											     alt="">
										@elseif($contact['type'] === "Telefoonnummer")
											<img class="square member_contact_info_img"
											     src="@asset('images/phone.png')"
											     alt="">
										@else
											<img class="square member_contact_info_img"
											     src="@asset('images/letter.png')" alt="">
										@endif
										<p>{{$contact['text']}}</p>
									</div>
								@endforeach
							</div>
						</div>
					@endforeach
				</div>
				<div id="customize-nav" class="tns-nav-circles position-absolute">
					@foreach($members as $member)
						<span></span>
					@endforeach
				</div>
			</div>
		</div>
	@endif
@endsection

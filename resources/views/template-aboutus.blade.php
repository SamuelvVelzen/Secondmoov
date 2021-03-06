{{--
  Template Name: About us template
--}}

@extends('layouts.app')

@php
	$bgColors = ['border-primary','border-secondary','border-tertiary','border-dark'];
@endphp

@section('content')
	@include('components.introduction', ['title' => 'intro_title', 'text' => 'intro_text', 'image' => 'intro_image', 'defaultColor' =>'bg-secondary'])

	@php($members = get_field('member_teams'))
	@if($members)
		<div class="fluid-container position-relative mt-default-4">
			<div class="background bg-tertiary pb-5 fixed-bottom"></div>
			<div class="container position-relative">
				<div class="row">
					<h2 class="col-12 col-md-6 mb-default">{{the_field('member_title')}}</h2>
				</div>
				<div id="memberCarousel" class="mb-default-4 align-items-stretch d-flex">
					@foreach($members as $member)
						<div>
							<div class="card text-center team_member h-100">
								<span class="member_image mx-auto border_image {{$member['border_color'] != "" ? $member['border_color'] : $bgColors[rand(0, count($bgColors) - 1)] }}">
									{!! wp_get_attachment_image($member['image'], 'full', false,['class'=> 'member_image_img'] ) !!}
								</span>

								<h4 class="member_name">{{$member['name']}}</h4>

								<p class="member_text">{{$member['text']}}</p>

								@foreach($member['contact_information'] as $contact)
									<div class="member_contact_info d-flex justify-content-center align-items-center mt-auto flex-wrap">
										@if($contact['type'] === "Email" || $contact['type'] === "Telefoonnummer")
											<a href="{{$contact['type'] === "Email" ? 'mailto' : ($contact['type'] === "Telefoonnummer" ?'tel' : '')}}:{{$contact['text']}}"
											   class="d-flex justify-content-center align-items-center mt-auto text-decoration-none flex-wrap">
												@endif

												@if($contact['type'] === "Whatsapp")
													<img loading="lazy" class="square member_contact_info_img"
													     src="@asset('images/whatsapp.png')"
													     alt="">
												@elseif($contact['type'] === "Email")
													<img loading="lazy" class="square member_contact_info_img"
													     src="@asset('images/mail.png')"
													     alt="">
												@elseif($contact['type'] === "Telefoonnummer")
													<img loading="lazy" class="square member_contact_info_img"
													     src="@asset('images/phone.png')"
													     alt="">
												@else
													<img loading="lazy" class="square member_contact_info_img"
													     src="@asset('images/letter.png')"
													     alt="">
												@endif
												<span>{{$contact['text']}}</span>

												@if($contact['type'] === "Email" || $contact['type'] === "Telefoonnummer")
											</a>
										@endif
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

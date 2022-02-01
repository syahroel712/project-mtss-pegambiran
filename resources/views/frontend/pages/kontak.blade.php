@extends('frontend/layouts/app')
@push('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/contact.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/contact_responsive.css')}}">
@endpush
@section('content')


<!-- Home -->

	<div class="home">
		<div class="breadcrumbs_container">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="breadcrumbs">
							<ul>
								<li><a href="index.html">Home</a></li>
								<li>Kontak</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>			
	</div>

	<!-- Contact -->

	<div class="contact">
		
		<!-- Contact Map -->

		<div class="contact_map">

			<!-- Google Map -->
			
			<div class="map">
				<div id="google_map" class="google_map col-lg-12">
					<div class="map_container">
						<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15958.822011457523!2d99.5612051!3d0.430874!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x1bb25555e3bec6f7!2sMTs%20Al-Ihsan%20Pegambiran!5e0!3m2!1sid!2sid!4v1643707490436!5m2!1sid!2sid" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
					</div>
				</div>
			</div>

		</div>

		<!-- Contact Info -->

		<div class="contact_info_container">
			<div class="container">
				<div class="row">

					<!-- Contact Form -->
					<div class="col-lg-6">
						<div class="contact_form">
							<div class="contact_info_title">Kontak Form</div>
							<form action="#" class="comment_form">
								<div>
									<div class="form_title">Name</div>
									<input type="text" class="comment_input" required="required">
								</div>
								<div>
									<div class="form_title">Email</div>
									<input type="text" class="comment_input" required="required">
								</div>
								<div>
									<div class="form_title">Message</div>
									<textarea class="comment_input comment_textarea" required="required"></textarea>
								</div>
								<div>
									<button type="submit" class="comment_button trans_200">submit now</button>
								</div>
							</form>
						</div>
					</div>

					<!-- Contact Info -->
					<div class="col-lg-6">
						<div class="contact_info">
							<div class="contact_info_title">Kontak Info</div>
							<div class="contact_info_text">
                                <div class="contact_info_location_title">MTSS AL-IHSAN PEGAMBIRAN</div>
							</div>
							<div class="contact_info_location">
								<div class="contact_info_location_title">Alamat</div>
								<ul class="location_list">
									<li>Jorong Pegambiran</li>
								</ul>
							</div>
							<div class="contact_info_location">
								<div class="contact_info_location_title">Email</div>
								<ul class="location_list">
									<li>alihsan.pegambiran@yahoo.com </li>
								</ul>
							</div>
							<div class="contact_info_location">
								<div class="contact_info_location_title">Nomer Telpon</div>
								<ul class="location_list">
									<li>082387354178  </li>
								</ul>
							</div>
							<div class="contact_info_location">
								<div class="contact_info_location_title">Kode Pos</div>
								<ul class="location_list">
									<li>26373 </li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
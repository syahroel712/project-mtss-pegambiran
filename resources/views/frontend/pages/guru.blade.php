@extends('frontend/layouts/app')
@push('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/about.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/about_responsive.css')}}">
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
								<li><a href="{{ route('home') }}">Home</a></li>
								<li>Guru</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>			
	</div>

	<div class="team">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="section_title_container text-center">
						<h2 class="section_title">Para Pahlawan Tanpa Tanda Jasa</h2>
						<div class="section_subtitle"><p></p></div>
					</div>
				</div>
			</div>
			<div class="row team_row">
				@foreach($guru as $no => $gr)
				@if($gr->guru_jabatan == 'Kepala Sekolah')
				<div class="col-lg-4 col-md-12 team_col">
				</div>
				<div class="col-lg-4 col-md-12 team_col">
					<div class="team_item">
						<div class="team_image" style="width: 280px;height: 260px;"><img src="{{ asset('guru/' . $gr->guru_foto) }}" alt="" style="width: 100%; height:100%; object-fit: cover;"></div>
						<div class="team_body">
							<div class="team_title"><a href="#">{{ $gr->guru_nama }}</a></div>
							<div class="team_subtitle">NIP. {{ $gr->guru_nip }}</div>
							<div class="social_list">
								{{ $gr->guru_jabatan }}
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-12 team_col">
				</div>

				@else

				<div class="col-lg-3 col-md-6 team_col">
					<div class="team_item">
						<div class="team_image"><img src="{{ asset('guru/' . $gr->guru_foto) }}" alt="" style="width: 100%; height:100%; object-fit: cover;"></div>
						<div class="team_body">
							<div class="team_title"><a href="#">{{ $gr->guru_nama }}</a></div>
							<div class="team_subtitle">NIP. {{ $gr->guru_nip }}</div>
							<div class="social_list">
								{{ $gr->guru_jabatan }}
							</div>
						</div>
					</div>
				</div>

				@endif

				@endforeach
			</div>
		</div>
	</div>


@endsection
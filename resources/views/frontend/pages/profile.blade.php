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
								<li>{{ $profile->profile_nama }}</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>			
	</div>

	<div class="about">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="section_title_container">
						<div class="section_subtitle">
                            @if($profile->profile_tipe == 'teks')
                            {!! $profile->profile_desk !!}
                            @else
                            <iframe src="{{ asset('profile/' . $profile->profile_desk) }}" style="width: 100%; height: 800px;"></iframe>
                            @endif
                        </div>
					</div>
				</div>
			</div>
		</div>
	</div>


@endsection
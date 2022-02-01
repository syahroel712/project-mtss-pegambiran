@extends('frontend/layouts/app')
@push('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/blog_single.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/blog_single_responsive.css') }}">
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
								<li><a href="{{ route('frontend.info', $info_detail->info_tipe_slug) }}">{{ $info_detail->info_tipe }}</a></li>
								<li>{{ $info_detail->info_judul }}</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>			
	</div>

    <div class="blog">
		<div class="container">
			<div class="row">

				<!-- Blog Content -->
				<div class="col-lg-12">
					<div class="blog_content">
						<div class="blog_title">{{ $info_detail->info_judul }}</div>
						<div class="blog_meta">
							<ul>
								<li>Post on <a href="#">{{ \Carbon\Carbon::parse($info_detail->info_tgl)->isoFormat('D MMMM Y') }}</a></li>
								<li>By <a href="#">Admin</a></li>
							</ul>
						</div>
						<div class="blog_image"><img src="{{ asset('info/'. $info_detail->info_foto) }}" alt="" style="display: block; margin: 0 auto; margin-bottom: 30px;"></div>
						{!! $info_detail->info_desk !!}
					</div>
					<div class="blog_extra d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-start">
						<div class="blog_tags">
						</div>
						<div class="blog_social ml-lg-auto">
							<span>Share: </span>
							<ul>
								<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
								<li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
								<li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
								<li><a href="#"><i class="fa fa-envelope" aria-hidden="true"></i></a></li>
							</ul>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>


@endsection
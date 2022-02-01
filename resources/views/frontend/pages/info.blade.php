@extends('frontend/layouts/app')
@push('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/courses.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/courses_responsive.css') }}">
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
								<li>{{ $info[0]->info_tipe }}</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>			
	</div>

    <div class="courses">
		<div class="container">
			<div class="row">

				<!-- Courses Main Content -->
				<div class="col-lg-12">
					<div class="courses_search_container">
						<form action="#" id="courses_search_form" class="text-center courses_search_form d-flex flex-row align-items-center justify-content-start">
                            <h3 class="text-center">{{ $info[0]->info_tipe }} Terbaru</h3>
						</form>
					</div>
					<div class="courses_container">
						<div class="row courses_row">
							
							@foreach($info as $no => $in)
							<div class="col-lg-6 course_col">
								<div class="course">
									<div class="course_image"><img src="{{ asset('info/' . $in->info_foto) }}" alt=""></div>
									<div class="course_body">
										<h3 class="course_title"><a href="{{ route('frontend.info.detail', $in->info_slug) }}">{{ \Str::limit($in->info_judul) }}</a></h3>
										<div class="course_teacher">{{ \Carbon\Carbon::parse($in->info_tgl)->isoFormat('D MMMM Y') }}</div>
										<div class="course_text">
                                            {!! \Str::limit($in->info_desk) !!}
										</div>
									</div>
									<div class="course_footer">
										<div class="course_footer_content d-flex flex-row align-items-center justify-content-start">
                                            <div class="courses_button trans_200" style="margin-top: 0px !important">
                                                <a href="{{ route('frontend.info.detail', $in->info_slug) }}">Read More</a>
                                            </div>
										</div>
									</div>
								</div>
							</div>
                            @endforeach
						</div>
                        <div class="">
                            {!! $info->links('pagination::bootstrap-4') !!}
                        </div>
					</div>
				</div>

			</div>
		</div>
	</div>


@endsection
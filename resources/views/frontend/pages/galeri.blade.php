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
								<li>Galeri</li>
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
					<div class="section_title_container text-center">
						<h2 class="section_title">Kumpulan Galeri</h2>
						<div class="section_subtitle"></div>
					</div>
				</div>
			</div>
			<div class="row about_row">
				
				<!-- About Item -->
                @foreach($galeri as $no => $gl)
                @if(($no+1) % 3 == 0)
                <div class="col-lg-12 about_col about_col_left" >
                    <div class="about_item">
						<div class="about_item_image"><img src="{{ asset('galeri/' . $gl->galeri_foto) }}" alt="" style="display: block; margin: 0 auto;"></div>
						<div class="about_item_title"><a href="#">{{ $gl->galeri_nama }}</a></div>
                        <div class="about_item_text">
                            <hr>
						</div>
					</div>
                </div>
                @else
                <div class="col-lg-6 about_col about_col_left" >
                    <div class="about_item">
						<div class="about_item_image"><img src="{{ asset('galeri/' . $gl->galeri_foto) }}" alt="" style="box-shadow:0px 5px 40px rgba(29, 34, 47, 0.15);"></div>
						<div class="about_item_title"><a href="#">{{ $gl->galeri_nama }}</a></div>
                        <div class="about_item_text">
                            <hr>
						</div>
                        
					</div>
                </div>
                @endif
                @endforeach

                <div class="col-lg-12">
                    {!! $galeri->links('pagination::bootstrap-4') !!}
                </div>

			</div>
		</div>
	</div>

@endsection
@extends('frontend/layouts/app')
@push('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/about.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/about_responsive.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/main_styles.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/responsive.css') }}">
@endpush
@section('content')
        <!-- Home -->
                
        <div class="home">
            <div class="home_slider_container">

                <!-- Home Slider -->
                <div class="owl-carousel owl-theme home_slider">
                    @foreach($slider as $no => $sli)

                    <!-- Home Slider Item -->
                    <div class="owl-item">
                        <div class="home_slider_background" style="background-image:url({{ asset('slider/'. $sli->slider_foto) }})">
                        </div>
                        <div class="home_slider_content">
                            <div class="container">
                                <div class="row">
                                    <div class="col text-center">
                                        <div class="home_slider_title">{{ $sli->slider_nama }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    @endforeach
                </div>
            </div>

            <!-- Home Slider Nav -->

            <div class="home_slider_nav home_slider_prev"><i class="fa fa-angle-left" aria-hidden="true"></i></div>
            <div class="home_slider_nav home_slider_next"><i class="fa fa-angle-right" aria-hidden="true"></i></div>
        </div>

        <!-- Features -->

        <div class="features">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="section_title_container text-center">
                            <h2 class="section_title">Selamat Datang di Website MTSS AL Ihsan Pegambiran</h2>
                            <div class="section_subtitle">
                                <p>Change Your Life. Start Here.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row features_row">

                    <div class="col-lg-3 feature_col">
                        <div class="feature text-center trans_400">
                            <div class="feature_icon"><img src="{{ asset('frontend/images/moon.png') }}" alt="" style="width:5em;"></div>
                            <h3 class="feature_title">Islami</h3>
                            <div class="feature_text">
                                <p></p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 feature_col">
                        <div class="feature text-center trans_400">
                            <div class="feature_icon"><img src="{{ asset('frontend/images/goal.png') }}" alt="" style="width:5em;"></div>
                            <h3 class="feature_title">Berkarakter</h3>
                            <div class="feature_text">
                                <p></p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 feature_col">
                        <div class="feature text-center trans_400">
                            <div class="feature_icon"><img src="{{ asset('frontend/images/technology.png') }}" alt="" style="width:5em;"></div>
                            <h3 class="feature_title">Modern</h3>
                            <div class="feature_text">
                                <p></p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 feature_col">
                        <div class="feature text-center trans_400">
                            <div class="feature_icon"><img src="{{ asset('frontend/images/medal.png') }}" alt="" style="width:5em;"></div>
                            <h3 class="feature_title">Berprestasi</h3>
                            <div class="feature_text">
                                <p></p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!-- Pengumuman -->

        <div class="courses">
            <div class="section_background parallax-window" data-parallax="scroll"
                data-image-src="{{ asset('frontend/images/courses_background.jpg') }}" data-speed="0.8"></div>
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="section_title_container text-center">
                            <h2 class="section_title">Pengumuman Terbaru</h2>
                            <div class="section_subtitle">
                                <p></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row courses_row">

                    <!-- Pengumunan -->
                    @foreach($pengumuman as $no => $pen)
                    <div class="col-lg-4 course_col">
                        <div class="course">
                            <div class="course_image"><img src="{{ asset('info/' . $pen->info_foto) }}" alt=""></div>
                            <div class="course_body">
                                <h3 class="course_title"><a href="{{ route('frontend.info.detail', $pen->info_slug) }}">{!! \Str::limit($pen->info_judul) !!}</a></h3>
                                <div class="course_teacher">{{ \Carbon\Carbon::parse($pen->info_tgl)->isoFormat('D MMMM Y') }}</div>
                                <div class="course_text">
                                    {!! \Str::limit($pen->info_desk) !!}
                                </div>
                            </div>
                            <div class="course_footer">
                                <div class="course_footer_content d-flex flex-row align-items-center justify-content-start">
                                    <div class="courses_button trans_200" style="margin-top: 0px !important">
                                        <a href="{{ route('frontend.info.detail', $pen->info_slug) }}">Read More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach


                </div>
                <div class="row">
                    <div class="col">
                        <div class="courses_button trans_200"><a href="{{ route('frontend.info', 'pengumuman') }}">Lihat Semua Pengumuman</a></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Berita Utama -->

        <div class="news">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="section_title_container text-center">
                            <h2 class="section_title">Berita Terbaru</h2>
                            <div class="section_subtitle">
                                <p></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row news_row">
                    <div class="col-lg-7 news_col">
                        <!-- News Post Large -->
                        <div class="news_post_large_container">
                            <div class="news_post_large">
                                <div class="news_post_image"><img src="{{ asset('info/'.$berita_utama->info_foto) }}" alt=""></div>
                                <div class="news_post_large_title"><a href="{{ route('frontend.info.detail', $berita_utama->info_slug) }}">{{ \Str::limit($berita_utama->info_judul) }}</a></div>
                                <div class="news_post_meta">
                                    <ul>
                                        <li><a href="#">Admin</a></li>
                                        <li><a href="#">{{ \Carbon\Carbon::parse($berita_utama->info_tgl)->isoFormat('D MMMM Y') }}</a></li>
                                    </ul>
                                </div>
                                <div class="news_post_text">
                                    {!! \Str::limit($berita_utama->info_desk) !!}
                                </div>
                                <div class="news_post_link"><a href="{{ route('frontend.info.detail', $berita_utama->info_slug) }}">read more</a></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-5 news_col">
                        <div class="news_posts_small">
                            @foreach($berita as $no => $br)
                            <!-- News Posts Small -->
                            <div class="news_post_small">
                                <div class="news_post_small_title"><a href="{{ route('frontend.info.detail', $br->info_slug) }}">{{ \Str::limit($br->info_judul) }}</a></div>
                                <div class="news_post_meta">
                                    <ul>
                                        <li><a href="#">Admin</a></li>
                                        <li><a href="#">{{ \Carbon\Carbon::parse($br->info_tgl)->isoFormat('D MMMM Y') }}</a></li>
                                    </ul>
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Galeri --> 

        <div class="courses">
            <div class="section_background parallax-window" data-parallax="scroll"
                data-image-src="{{ asset('frontend/images/courses_background.jpg') }}" data-speed="0.8"></div>
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="section_title_container text-center">
                            <h2 class="section_title">Galeri</h2>
                            <div class="section_subtitle"><p></p></div>
                        </div>
                    </div>
                </div>
                <div class="row about_row">
                    
                    <!-- Galeri Item -->
                    @foreach($galeri as $no => $gl)
                    <div class="col-lg-6 about_col about_col_left">
                        <div class="about_item">
                            <div class="about_item_image"><img src="{{ asset('galeri/' . $gl->galeri_foto) }}" alt=""></div>
                            <div class="about_item_title"><a href="#">{{ \Str::limit($gl->galeri_nama) }}</a></div>
                        </div>
                    </div>
                    @endforeach

                </div>
                <div class="row">
                    <div class="col">
                        <div class="courses_button trans_200"><a href="{{ route('frontend.galeri') }}">Lihat Semua Galeri</a></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Foot -->

        <div class="newsletter">
            <div class="newsletter_background parallax-window" data-parallax="scroll"
                data-image-src="{{ asset('frontend/images/newsletter.jpg') }}" data-speed="0.8"></div>
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div
                            class="newsletter_container d-flex flex-lg-row flex-column align-items-center justify-content-start">

                            <!-- Newsletter Content -->
                            <div class="newsletter_content text-lg-left text-center">
                                <div class="newsletter_title">Ayo bergabung dengan kami sekarang</div>
                                <div class="newsletter_subtitle"></div>
                            </div>

                            <!-- Newsletter Form -->
                            <div class="newsletter_form_container ml-lg-auto">
                                <form action="#" id="newsletter_form"
                                    class="newsletter_form d-flex flex-row align-items-center justify-content-center">
                                    <input type="email" class="newsletter_input" placeholder="Your Email"
                                        required="required">
                                    <button type="submit" class="newsletter_button">subscribe</button>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>





@endsection
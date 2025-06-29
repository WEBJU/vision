<?php
$latestNews = latestNews();
$brands = brands();
?>
@extends('front_landing.layouts.app')
@section('title')
    {{__('messages.front_landing.home')}}
@endsection

@php $styleCss = 'style'; @endphp
@section('content')
    <div class="home-page">
        <!-- start hero-section -->
        <section class="hero-section">
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel" data-bs-wrap="true">
                <div class="carousel-indicators d-flex d-xl-none">
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                        aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                        aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                        aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <!-- First Slide -->
                    <div class="carousel-item active">
                        <div class="inner-bgimg position-relative" style="background: #000;">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-7 col-md-5">
                                        <div class="text-white inner-text position-relative">

                                            <h4 class="fs-1 mb-0 fw-6">Community Engagement</h4>
                                            <p class="fs-16">Establishing collaborative frameworks through sports for
                                                development and civic tech to encourage local communities to participate
                                                actively in dialogues and actions surrounding pressing social issues. This
                                                engagement is achieved through workshops, forums, and participatory
                                                decision-making processes that ensure diverse community voices are heard and
                                                acted upon.</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-5 col-md-7 mt-3 mt-md-4">
                                        <img src="{{asset('front_landing/images/banner-1.jpeg')}}" alt="Vision Changers"
                                            class="w-100 h-100 object-fit-cover" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Second Slide -->
                    <div class="carousel-item">
                        <div class="inner-bgimg position-relative" style="background: #000;">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-7 col-md-5">
                                        <div class="text-white inner-text position-relative">
                                            <h4 class="fs-1 mb-0 fw-6">Youth Empowerment</h4>
                                            <p class="fs-16">Cultivating a generation of leaders by providing young people
                                                with the necessary resources, skills, and platforms to engage meaningfully
                                                in community initiatives. This involves mentorship programs, leadership
                                                training, and opportunities for youth to voice their opinions and drive
                                                societal change.</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-5 col-md-7 mt-3 mt-md-4">
                                        <img src="{{asset('front_landing/images/banner-2.jpeg')}}" alt="Vision Changers"
                                            class="w-100 h-100 object-fit-cover" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Third Slide -->
                    <div class="carousel-item">
                        <div class="inner-bgimg position-relative" style="background: #000;">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-7 col-md-5">
                                        <div class="text-white inner-text position-relative">

                                            <h4 class="fs-1 mb-0 fw-6">Sports as a Catalyst for Change</h4>
                                            <p class="fs-16">Harnessing the power of sports not just as a means of
                                                recreation but as a tool for social cohesion, personal development, and
                                                community-building. Through organized sports events and programs, we aim to
                                                foster teamwork, discipline, and leadership among participants while also
                                                bridging divides in communities.</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-5 col-md-7 mt-3 mt-md-4">
                                        <img src="{{asset('front_landing/images/banner-1.jpeg')}}" alt="Vision Changers"
                                            class="w-100 h-100 object-fit-cover" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Third Slide -->
                    <div class="carousel-item">
                        <div class="inner-bgimg position-relative" style="background: #000;">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-7 col-md-5">
                                        <div class="text-white inner-text position-relative">

                                            <h4 class="fs-1 mb-0 fw-6">Art for Social Impact</h4>
                                            <p class="fs-16">Utilizing various forms of artistic expression, such as visual
                                                arts, theater, and music, to raise awareness and tackle social injustices.
                                                By promoting public art projects and community-based workshops, we aim to
                                                inspire dialogues around critical issues and empower artists to be agents of
                                                change.</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-5 col-md-7 mt-3 mt-md-4">
                                        <img src="{{asset('front_landing/images/banner-1.jpeg')}}" alt="Vision Changers"
                                            class="w-100 h-100 object-fit-cover" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="d-none d-xl-block">
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">{{__('messages.common.previous')}}</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">{{__('messages.common.next')}}</span>
                    </button>
                </div>
            </div>
        </section>



        <!-- start trending-causes-section -->
        <section class="trending-causes-section bg-white py-60">
            <div class="container">
                <div class="text-center p-2">
                    {{-- <h2 class="fs-6 fw-6 text-danger">{{__('messages.front_landing.trending_causes')}}</h2> --}}
                    <h3 class="fs-2 fw-6 mb-20 ">Our Pillars</h3>
                    <p class="px-8">Vision Changers Kenya is dedicated to transforming the lives of young people through a
                        focused approach that encompasses three core strategic priorities: Knowledge Development and
                        Learning, Civic Participation, and Livelihoods and Wellbeing.</p>
                </div>
                <div class="row">



                    <div class="col-xl-4 col-lg-6 col-12 trending-card">
                        <div class="card">
                            <div class="positon-relative">
                                <div class="card-img">
                                    <a href="{{route('landing.knowledge')}}">

                                        <img src="{{ asset('front_landing/images/vision-7.jpg')}}"
                                            class="card-img-top object-fit-cover" alt="card"></a>

                                </div>


                            </div>
                            <div class="card-body">
                                <h5 class="text-dark fs-14 mb-3">
                                    <a class="text-dark" href="{{route('landing.knowledge')}}">Knowledge Transfer and Learning</a>
                                </h5>
                                <div class="d-flex align-items-center justify-content-between flex-wrap">
                                    <div class="d-flex align-items-center me-2 mt-2">

                                        <div class="ms-0 ps-3">

                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-12 trending-card">
                        <div class="card">
                            <div class="positon-relative">
                                <div class="card-img">
                                    <a href="{{route('landing.participation')}}">

                                        <img src="{{ asset('front_landing/images/vision-17.jpg')}}"
                                            class="card-img-top object-fit-cover" alt="card"></a>

                                </div>


                            </div>
                            <div class="card-body">
                                <h5 class="text-dark fs-14 mb-3">
                                    <a class="text-dark" href="{{route('landing.participation')}}">Civic Participation</a>
                                </h5>
                                <div class="d-flex align-items-center justify-content-between flex-wrap">
                                    <div class="d-flex align-items-center me-2 mt-2">

                                        <div class="ms-0 ps-3">

                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-12 trending-card">
                        <div class="card">
                            <div class="positon-relative">
                                <div class="card-img">
                                    <a href="{{route('landing.livelihoods')}}">

                                        <img src="{{ asset('front_landing/images/vision-8.jpg')}}"
                                            class="card-img-top object-fit-cover" alt="card"></a>

                                </div>


                            </div>
                            <div class="card-body">
                                <h5 class="text-dark fs-14 mb-3">
                                    <a class="text-dark" href="{{route('landing.livelihoods')}}">Livelihoods and Wellbeing</a>
                                </h5>
                                <div class="d-flex align-items-center justify-content-between flex-wrap">
                                    <div class="d-flex align-items-center me-2 mt-2">

                                        <div class="ms-0 ps-3">

                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </section>
        <!-- end trending-causes-section -->

        <!-- start about-section -->
        <section class="about-section pb-60 pt-60 bg-gray">
            <div class="container">
                <h2 class="text-danger d-flex  align-items-center justify-content-center mb-5">
                    {{__('messages.about_us.about_us')}}
                </h2>
                <div class="row px-2">
                    <div class="col-xxl-4 col-xl-4 col-lg-4">
                        <div class="about-left">


                            <div class="d-md-flex align-items-center">
                                <div class="about-2">
                                    {{-- <img src="{{asset('front_landing/images/Untitled-1-02.jpg')}}"
                                        class="w-100 h-100 object-fit-cover"> --}}
                                    <img src="{{ asset('front_landing/images/vision-13.jpg')}}"
                                        class="w-100 h-100 object-fit-cover">
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-xxl-8 col-xl-8 col-lg-8 mt-lg-0 mt-sm-5 mt-4">
                        <div class="about-right">
                            {{-- <h3 class="text-dark fw-6 mb-3 pb-1">{{ $data['aboutUs']['title'] }}</h3> --}}
                            <p class="text-dark fs-16 mb-4 pb-lg-3 text-justify  lh-lg">Vision Changers Kenya is a youth led
                                not for profit organization registered in Kenya on the 6th of august 2014. At Vision
                                Changers Kenya we believe every person should have a chance to succeed independent of their
                                circumstances. As a dedicated Public Benefit Organization, we are passionate about using
                                sports and civic technology as a means of bringing about positive change in our communities.
                                What we do goes beyond just empowering people; we aim to develop and nurture an environment
                                where the marginalized can learn and participate in the development of their communities and
                                gain sustainable income. We recognize that innovation and collaboration are key to building
                                resilience, therefore, are keen on learning and creative thinking. We therefore seek to
                                enhance the marginalized voices by offering a safe environment for generating and acting on
                                insights. </p>

                        </div>
                    </div>
                </div>
                <div class="row px-2">

                    <div class="col-xxl-8 col-xl-8 col-lg-8 mt-lg-0 mt-sm-5 mt-4">
                        <div class="about-right">

                            <ul>
                                <li class="fs-16 mb-2"> <span class="fw-6">Our Mission </span> <br>
                                    Our mission is to champion innovative approaches that inspire prosperity and resilience,
                                    promoting a culture of teamwork, empowerment, and collective success. </li>
                                <li class="text-dark fs-16  mb-2"> <span class="fw-6">Our Vision</span> <br>
                                    We envision a world filled with optimism, tolerance, and social justice, where poverty
                                    has been eradicated, and every individual can live in dignity and security. </li>
                                <li class="text-dark fs-16 mb-2"><span class="fw-6">Our Core Values</span><br>Creativity,
                                    Integrity, Inquisitiveness, Participation </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xxl-4 col-xl-4 col-lg-4">
                        <div class="about-left">
                            <div class="d-md-flex align-items-center">
                                <div class="about-2">
                                    {{-- <img src="{{asset('front_landing/images/Untitled-1-02.jpg')}}"
                                        class="w-100 h-100 object-fit-cover"> --}}
                                    <img src="{{asset('front_landing/images/vision-7.jpg')}}"
                                        class="w-100 h-100 object-fit-cover">
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end about-section -->

        <!-- start count-section -->
        <section class="count-section bg-danger py-4">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-6 text-white text-center py-4">
                        <h2 class="fs-1 fw-6">
                            <span class="counter" data-countto="20" data-duration="3000">0</span>+
                        </h2>
                        <h3 class="fs-6 mb-0">{{__('messages.front_landing.projects_done')}}</h3>
                    </div>
                    <div class="col-lg-3 col-6 text-white text-center py-4">
                        <h2 class="fs-1 fw-6">
                            <span class="counter" data-countto="3" data-duration="3000">0</span>M+
                        </h2>
                        <h3 class="fs-6 mb-0">{{__('messages.front_landing.hopeless_child')}}</h3>
                    </div>
                    <div class="col-lg-3 col-6 text-white text-center py-4">
                        <h2 class="fs-1 fw-6">
                            <span class="counter" data-countto="75" data-duration="3000">0</span>
                        </h2>
                        <h3 class="fs-6 mb-0">{{__('messages.front_landing.team_member')}}</h3>
                    </div>
                    <div class="col-lg-3 col-6 text-white text-center py-4">
                        <h2 class="fs-1 fw-6">
                            <span class="counter" data-countto="12" data-duration="3000">0</span>+
                        </h2>
                        <h3 class="fs-6 mb-0">{{__('messages.front_landing.get_regards')}}</h3>
                    </div>
                </div>
            </div>
        </section>
        <!-- end count-section -->

        <!-- start video-section -->
        <section class="video-section pt-60">
            <div class="container">
                <div class="video-bg-img">
                    <div class="row position-relative">
                        <div class="col-md-8">
                            <h2 class="fs-6 fw-6 text-danger">{{ $data['homepageThreeVideo']['short_title'] }}</h2>
                            <h3 class="fs-2 fw-6 mb-0 text-white">{{ $data['homepageThreeVideo']['title'] }}</h3>
                        </div>
                        <div class="col-md-4 mt-3 mt-md-0">
                            <div class="video-play-btn m-lg-auto ms-md-auto">
                                <button type="button" class="play-video popup-video fs-4 border-0" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal4">
                                    <i class="fas fa-play text-danger"></i>
                                </button>
                            </div>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal4" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="btn-close text-white" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body w-100">
                                            <iframe
                                                src="https://www.youtube.com/embed/{{ YoutubeID($data['homepageThreeVideo']['youtube_video_link']) }}"
                                                class="w-100 h-100" title="YouTube video player" frameborder="0"
                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                                allowfullscreen></iframe>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end video-section -->

        <!-- start why-choose-section -->
        <section class="why-choose-section pt-60 bg-gray mt-4 mb-4 p-3">
            <div class="container">
                <div class="text-center p-3">
                    <h2 class="fs-3 fw-6 text-danger">{{__('messages.front_landing.why_choose_us')}}</h2>
                    <p class="fs-6 fw-4 mb-60">{{__("messages.front_landing.we've_funded_5k_dollars_over")}}</p>
                </div>
                <div class="row align-items-stretch mb-4">
                    <!-- Partner with Us -->
                    <div class="col-md-4 rounded">
                        <div class="card h-100 bg-white">
                            <div class="card-body d-flex align-items-center">
                                <div class="flex-grow-1">
                                    <h5 class="card-title text-dark">Partner with Us</h5>
                                    <p class="card-text text-dark">Contribute to initiatives that empower communities and
                                        drive sustainable change.</p>
                                    <a href="/register" class="custom-button">Join Now</a>
                                </div>
                                <div class="rounded p-3">
                                    <img src="{{asset('front_landing/images/about-us2.png')}}"
                                        class="w-100 h-100 object-fit-cover">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Become a Volunteer -->
                    <div class="col-md-4 rounded">
                        <div class="card h-100">
                            <div class="card-body d-flex bg-dark align-items-center">
                                <div class="flex-grow-1">
                                    <h5 class="card-title text-white">Become a Volunteer</h5>
                                    <p class="card-text text-white">Join us in changing lives of the youth for better
                                        leaders of tomorrow.</p>
                                    <a href="/register" class="custom-button">Join Now</a>
                                </div>
                                <div class="rounded p-3">
                                    <img src="{{asset('front_landing/images/about-us2.png')}}"
                                        class="w-100 h-100 object-fit-cover">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Become a Mentor -->
                    <div class="col-md-4 rounded">
                        <div class="card h-100 bg-white text-dark">
                            <div class="card-body d-flex align-items-center">
                                <div class="flex-grow-1">
                                    <h5 class="card-title text-dark">Become a Mentor</h5>
                                    <p class="card-text text-dark">Guide and inspire the next generation of leaders.</p>
                                    <a href="/register" class="custom-button">Join Now</a>
                                </div>
                                <div class="rounded p-3">
                                    <img src="{{asset('front_landing/images/about-us2.png')}}"
                                        class="w-100 h-100 object-fit-cover">
                                </div>
                            </div>
                            {{-- <img src="https://via.placeholder.com/13x13" alt="Arrow Icon" class="position-absolute"
                                style="width: 13px; height: 13px; right: 10px; bottom: 10px;"> --}}
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end why-chooses-section -->

        <!-- start news-feeds-section -->
        <section class="news-feed-section pb-60">
            <div class="container">
                <div class="text-center">
                    <h2 class="fs-6 fw-6 text-danger">{{__('messages.front_landing.insights')}}</h2>
                    <h3 class="fs-2 fw-6 mb-60">{{__('messages.front_landing.news_feeds')}}</h3>
                </div>
                <div class="row">
                    @foreach($latestNews as $news)
                        <div class="col-xl-4 col-lg-6 col-12 mb-2">
                            <div class="card">
                                <div class="positon-relative">
                                    <div class="card-img">
                                        <a href="{{route('landing.news-details', $news['slug'])}}">
                                            <img src="{{ $news['news_image'] ?: asset('front_landing/images/news-1.png') }}"
                                                class="card-img-top object-fit-cover" alt="card"></a>
                                    </div>
                                    <a href="{{ route('landing.publications') }}"
                                        class="badge small-btn">{{ $news->newsCategory->name }}</a>
                                </div>
                                <div class="card-body">
                                    <span class="mb-2 d-block">
                                        <i class="fa-solid fa-calendar-days text-danger fs-6 me-2"></i>
                                        <span
                                            class="text-dark">{{ Carbon\Carbon::parse($news->created_at)->isoFormat('Do MMMM YYYY') }}</span>
                                    </span>
                                    <h4 class="card-title fs-18">
                                        <a class="link-dark"
                                            href="{{route('landing.news-details', $news['slug'])}}">{{ Str::limit($news->title, 35) }}</a>
                                    </h4>
                                    <p class="mb-0 text-secondary">
                                        {!! !empty(strip_tags($news->description)) ? Str::limit(strip_tags($news->description), 40, '...') : __('messages.common.n/a') !!}
                                    </p>
                                    <a href="{{route('landing.news-details', $news['slug'])}}"
                                        class="read-more-btn">{{__('messages.front_landing.read_more')}}</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!-- end news-feeds-section -->

        <!-- start our-team-section -->
        <section class="our-team-section pb-60">
            <div class="container">
                <div class="text-center">
                    <h2 class="fs-6 fw-6 text-danger">{{__('messages.front_landing.volunteers')}}</h2>
                    <h3 class="fs-2 fw-6 mb-60">{{__('messages.front_landing.our_team_mates_with_good_history')}}</h3>
                </div>
                <div class="row">
                    @foreach($data['teams'] as $team)
                        <div class="col-lg-3 col-sm-6 col-12 our-team-block d-flex align-items-stretch mb-lg-0 mb-4">
                            <div class="card flex-fill border-0">
                                <div class="card-image  mx-auto ">
                                    <img src="{{ asset('front_landing/images/men.png')}}" alt="Vision Changers"
                                        class="img-fluid object-fit-cover">
                                    <img src="{{ $team->image_url ?: asset('front_landing/images/team-1.png')}}"
                                        alt="Vision Changers" class="img-fluid object-fit-cover">
                                </div>
                                <div class="card-body text-center d-flex flex-column">
                                    <h4 class="fs-18 fw-5">{{ $team->name }}</h4>
                                    <h5 class="text-danger fs-14 fw-5 mb-0">{{ $team->designation }}</h5>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!-- end our-team-section -->

    </div>
@endsection

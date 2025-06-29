@extends('front_landing.layouts.app')

@section('title')
    {{ __('messages.page.cause_details') }}
@endsection

@section('content')
    <div class="cause-details-page">
        <!-- start hero-section -->
        <section class="hero-section">
            <div class="inner-bgimg position-relative"
                 style="background: url('{{ asset('front_landing/images/vision-5.jpg') }}')">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-md-7 parallelogram-shape">
                            <div class="text-white inner-text position-relative">
                                {{-- <p class="fs-18 fw-5 mb-md-3 pb-lg-2 mb-2">Our Mission: To interrupt and disrupt oppressive systems that marginalize individuals and communities, leading to rights violations, poverty, and inequalities.</p> --}}
                                <h2 class="fs-3 mb-md-0 fw-6">Livelihoods and Wellbeing</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end hero-section -->

        <!-- start cause-details-section -->
        <section class="cause-details-section">
            <div class="container">
                <div class="row pt-100">
                    <div class="col-xl-8">
                        <div class="cause-image mb-20 rounded-20">
                            {{-- <img src="{{ asset($campaign->image ?: 'front_landing/images/card-img.png') }}" alt="causes-image" class="w-100 h-100 object-fit-cover"> --}}
                            <img src="{{ asset('front_landing/images/vision-8.jpg') }}" alt="causes-image" class="w-100 h-100 object-fit-cover">
                        </div>
                        <div class="cause-desc mb-40">
                            <h3 class="fw-6 fs-26 text-dark mb-3">Livelihoods and Wellbeing</h3>
                            <div class="desc-box d-flex flex-wrap">
                                <div class="d-flex align-items-center me-lg-5 me-4">
                                    <i class="fa-solid fa-tag text-danger fs-18 me-2"></i>
                                    <p class="fs-16 fw-5 text-danger mb-0">Wellbeing</p>
                                </div>
                            </div>
                        </div>
                        <div class="cause-tab">
                            <ul class="nav nav-pills overflow-auto flex-nowrap mb-40" id="pills-tab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active fs-16 fw-5 text-dark" id="pills-home-tab" data-bs-toggle="pill"
                                            data-bs-target="#pills-home" type="button" role="tab"
                                            aria-controls="pills-home" aria-selected="true">{{ __('messages.common.description') }}
                                    </button>
                                </li>
                            </ul>
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active mb-5" id="pills-home" role="tabpanel"
                                     aria-labelledby="pills-home-tab">
                                    <p class="fs-16 fw-5 text-dark mb-lg-4 mb-3"></p>
                                    <p class="fs-16 fw-5 text-dark mb-lg-4 mb-3 text-justify">
                                        We are dedicated to bridging the gap between young job seekers and opportunities for productive employment and entrepreneurship. We provide a range of training programs tailored to equip participants with essential skills—both technical and interpersonal—while fostering an entrepreneurial spirit among aspiring business leaders. Through mentorship, technical support, and resource provision, we empower youth, to empower communities to develop viable business ideas, craft business plans, and access funding opportunities. Beyond economic self-sufficiency, our programs are designed to build resilience, enabling young individuals to adapt and thrive in a rapidly changing world. Together, these efforts contribute to household incomes, community growth, and national economic development.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4 pb-4 mb-2">
                        <!--start time-counter-section -->
                        <div class="news-right-section gallery bg-light p-30 rounded-10 mb-20 position-relative">
                            <div class="d-flex justify-content-between align-items-center mb-4 pb-lg-1">
                                <h5 class="fs-20 fw-6 text-dark mb-0">Gallery</h5>
                                <div class="rectangle-shape"></div>
                            </div>
                            <div class="row">
                                {{-- Manually Add Image Media --}}
                                <div class="col-sm-4 col-6 mb-lg-4 mb-3">
                                    <div class="img-box rounded-10">
                                        <img class="img-timg" src="{{ asset('front_landing/images/vision-1.jpg') }}" alt="Image 1">
                                    </div>
                                </div>
                                <div class="col-sm-4 col-6 mb-lg-4 mb-3">
                                    <div class="img-box rounded-10">
                                        <img class="img-timg" src="{{ asset('front_landing/images/vision-2.jpg') }}" alt="Image 2">
                                    </div>
                                </div>
                                <div class="col-sm-4 col-6 mb-lg-4 mb-3">
                                    <div class="img-box rounded-10">
                                        <img class="img-timg" src="{{ asset('front_landing/images/vision-3.jpg') }}" alt="Image 3">
                                    </div>
                                </div>

                                {{-- Manually Add Video Link Media --}}
                                <div class="col-sm-4 col-6 mb-lg-4 mb-3">
                                    <a href="#" target="_blank" class="img-box rounded-10">
                                        <img class="video-timg" src="{{ asset('img/video-thumbnail.png') }}" alt="Video Thumbnail">
                                    </a>
                                </div>
                            </div>

                            {{-- Modal for viewing images/videos --}}
                            <div class="modal">
                                <span class="close">&times;</span>
                                <span class="previous">&#8249;</span>
                                <span class="next">&#8250;</span>
                                <img class="modal-content" src="" alt="Media Preview">
                            </div>
                        </div>

                        <!-- start categories-section -->
                        <div class="news-right-section mb-20">
                            <div class="categories-section bg-light p-30 rounded-10 position-relative pt-100">
                                <div class="d-flex justify-content-between align-items-center mb-4 pb-lg-1">
                                    <h5 class="fs-20 fw-6 text-dark mb-0">{{ __('messages.categories.categories') }}</h5>
                                    <div class="rectangle-shape"></div>
                                </div>

                                {{-- Hardcoded Categories --}}
                                <a href="{{ route('landing.causes' , ['category' => '1']) }}"
                                   data-id="1"
                                   class="categories d-flex align-items-center justify-content-between bg-white rounded-10 mb-2 news-category-filter1">
                                    <span class="text-dark fs-16 fw-5 news-category-filter1">Knowledge</span>
                                    <button class="border-0">
                                        <span class="text-dark">5</span> <!-- Replace 5 with the actual count -->
                                    </button>
                                </a>

                                <a href="{{ route('landing.causes' , ['category' => '2']) }}"
                                   data-id="2"
                                   class="categories d-flex align-items-center justify-content-between bg-white rounded-10 mb-2 news-category-filter1">
                                    <span class="text-dark fs-16 fw-5 news-category-filter1">Learning</span>
                                    <button class="border-0">
                                        <span class="text-dark">8</span> <!-- Replace 8 with the actual count -->
                                    </button>
                                </a>

                                <a href="{{ route('landing.causes' , ['category' => '3']) }}"
                                   data-id="3"
                                   class="categories d-flex align-items-center justify-content-between bg-white rounded-10 mb-2 news-category-filter1">
                                    <span class="text-dark fs-16 fw-5 news-category-filter1">Studying</span>
                                    <button class="border-0">
                                        <span class="text-dark">12</span> <!-- Replace 12 with the actual count -->
                                    </button>
                                </a>

                                <!-- Add more categories as needed -->
                            </div>
                        </div>
                        <!-- end categories-section -->
                    </div>
                </div>
            </div>
        </section>
        <!-- end cause-details-section -->
    </div>
@endsection

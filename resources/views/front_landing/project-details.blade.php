@extends('front_landing.layouts.app')
@section('title')
    {{__('messages.page.cause_details')}}
@endsection
@section('content')
    <div class="cause-details-page">
        <!-- start hero-section -->
        <section class="hero-section">
            <div class="inner-bgimg  position-relative"
                style="background: url('{{asset('front_landing/images/vision-7.jpg')}}')">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-md-7 parallelogram-shape">
                            <div class="text-white inner-text position-relative">
                                {{-- <p class="fs-18 fw-5 mb-md-3 pb-lg-2 mb-2">Our Mission: To interrupt and disrupt
                                    oppressive systems that marginalize individuals and communities, leading to rights
                                    violations, poverty, and inequalities.</p> --}}
                                <h2 class="fs-1 mb-md-0 fw-6">Project Details</h2>
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
                    <div class="col-xl-8 ">
                        <div class="cause-image mb-20 rounded-20">
                            <img src="{{asset($project->image ? : 'front_landing/images/card-img.png')}}"
                                alt="causes-image" class="w-100 h-100 object-fit-cover">
                            {{-- <img src="{{asset('front_landing/images/hero-image.png')}}" alt="causes-image"
                                class="w-100 h-100 object-fit-cover"> --}}

                        </div>
                        <div class="cause-desc mb-40">
                            <h3 class="fw-6 fs-26 text-dark mb-3">{{ Str::limit($project->title, 70) }}</h3>
                            <div class="desc-box d-flex flex-wrap">
                                <div class="d-flex align-items-center me-lg-5 me-4">
                                    <i class="fa-solid fa-tag text-danger fs-18 me-2"></i>
                                    <p class="fs-16 fw-5 text-danger mb-0">{{ $project->campaign->name }}</p>
                                </div>
                                {{-- <div class="d-flex align-items-center me-lg-5 me-4">
                                    <i class="fa-solid fa-calendar text-danger fs-18 me-2"></i>
                                    <p class="fs-16 fw-5 text-danger mb-0">{{__('messages.campaign.start_date')}}
                                        : {{ \Carbon\Carbon::parse($campaign->start_date )->isoFormat('Do MMMM YYYY')}} </p>
                                </div>
                                <div class="d-flex align-items-center">
                                    <i class="fa-solid fa-calendar text-danger fs-18 me-2"></i>
                                    <p class="fs-16 fw-5 text-danger mb-0">{{__('messages.campaign.end_date')}}
                                        : {{ \Carbon\Carbon::parse($campaign->deadline )->isoFormat('Do MMMM YYYY')}} </p>
                                </div> --}}
                            </div>
                        </div>
                        <div class="cause-tab">
                            <ul class="nav nav-pills overflow-auto flex-nowrap mb-40" id="pills-tab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active fs-16 fw-5 text-dark" id="pills-home-tab"
                                        data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab"
                                        aria-controls="pills-home"
                                        aria-selected="true">{{__('messages.common.description')}}
                                    </button>
                                </li>

                            </ul>
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active mb-5" id="pills-home" role="tabpanel"
                                    aria-labelledby="pills-home-tab">
                                    <p class="fs-16 fw-5 text-dark mb-lg-4 mb-3">
                                        {!! $project->short_description !!}
                                    </p>
                                    <p class="fs-16 fw-5 text-dark mb-lg-4 mb-3">
                                        {!! $project->description !!}
                                    </p>
                                </div>


                            </div>
                        </div>

                    </div>
                    <div class="col-xl-4  pb-4 mb-2">



                        <!--start input-section -->
                        <div class="input-group mb-20">
                            @php
                                $shareUrl = Request::root() . '/p/' . $project->slug;
                            @endphp
                            <input type="text" class="form-control text-dark p-2 fs-14 " placeholder=""
                                value="{{ $shareUrl }}" aria-label="Recipient's username" aria-describedby="basic-addon2"
                                readonly>
                            <div class="input-group-append">
                                <button class="input-group-text btn-danger p-3 fs-14 copy-link"
                                    data-link="{{ $shareUrl }}">Copy</button>
                            </div>
                        </div>
                        <!--end input-section -->
                        <div class="news-right-section share bg-light p-30 rounded-10 mb-20 position-relative">
                            <div class="d-flex justify-content-between align-items-center mb-4 pb-lg-1">
                                <h5 class="fs-20 fw-6 text-dark mb-0">Social share</h5>
                                <div class="rectangle-shape"></div>
                            </div>
                            {{-- <h5 class="fs-18 fw-5 text-dark mb-sm-4 mb-3">
                                {{__('messages.front_landing.social_share').(' :')}}</h5>--}}
                            @php
                                $shareUrl = Request::root() . '/p/' . $project->slug;
                            @endphp
                            <div class="social-media d-flex flex-wrap">
                                <div class="icon rounded-10 d-flex align-items-center justify-content-center me-3">
                                    <a href="https://www.facebook.com/sharer.php?u={{ $shareUrl }}" target="_blank"
                                        title="Facebook">
                                        <img src="{{ asset('front_landing/images/social-icon-images/facebook.png') }}"
                                            alt="facebook" class="w-100 h-100 object-fit-cover">
                                    </a>
                                </div>
                                <div
                                    class="custom-twitter-img icon rounded-10 d-flex align-items-center justify-content-center me-3">
                                    <a href="https://twitter.com/share?url={{$shareUrl}}&text={{ $project->title }}&hashtags=sharebuttons"
                                        target="_blank" title="Twitter">
                                        <img src="{{asset('front_landing/images/social-icon-images/twitter.png') }}"
                                            alt="twitter" class=" w-100 h-100 object-fit-cover">
                                    </a>
                                </div>
                                <div
                                    class="custom-instagram-img icon rounded-10 d-flex align-items-center justify-content-center me-3">
                                    <a href="https://www.instagram.com/sharer.php?u={{$shareUrl}}" target="_blank"
                                        title="Instagram">
                                        <img src="{{ asset('front_landing/images/social-icon-images/instagram.png') }}"
                                            alt="instagram" class="w-100 h-100 object-fit-cover">
                                    </a>
                                </div>
                                <div class="icon rounded-10 d-flex align-items-center justify-content-center  me-3">
                                    <a href="https://www.linkedin.com/shareArticle?mini=true&url={{$shareUrl}}"
                                        target="_blank" title="Linkedin">
                                        <img src="{{ asset('front_landing/images/social-icon-images/linkedin.png') }}"
                                            alt="linkedin" class="w-100 h-100 object-fit-cover">
                                    </a>
                                </div>
                                <div
                                    class="custom-gmail-img icon rounded-10 d-flex align-items-center justify-content-center  me-3">
                                    <a href="mailto:?Subject={{ $project->title }}
                                                    &Body=This%20is%20your%20campaign%20link%20:%20{{$shareUrl}}"
                                        title="Gmail" target="_blank">
                                        <img src="{{ asset('front_landing/images/social-icon-images/gmail.png') }}"
                                            alt="gmail" class="w-100 h-100 object-fit-cover">
                                    </a>
                                </div>
                                <div
                                    class="custom-pinterest-img icon rounded-10 d-flex align-items-center justify-content-center">
                                    <a href="https://pinterest.com/pin/create/link/?url={{$shareUrl}}" title="Pinterest"
                                        target="_blank">
                                        <img src="{{ asset('front_landing/images/social-icon-images/pinterest.png') }}"
                                            alt="pinterest" class="w-100 h-100 object-fit-cover">
                                    </a>
                                </div>
                            </div>
                        </div>
                        @if(count($medias) > 0 || !empty($project->video_link))
                            <div class="news-right-section gallery bg-light p-30 rounded-10 mb-20 position-relative">
                                <div class="d-flex justify-content-between align-items-center mb-4 pb-lg-1">
                                    <h5 class="fs-20 fw-6 text-dark mb-0">Gallery</h5>
                                    <div class="rectangle-shape"></div>
                                </div>
                                {{-- <h5 class="fs-18 fw-5 text-dark mb-sm-4 mb-3">{{__('messages.campaign.gallery').(' :')}}
                                </h5>--}}
                                <div class="row">
                                    @foreach($medias as $media)
                                        <div class="col-sm-4 col-6 mb-lg-4 mb-3">
                                            <div class="img-box rounded-10">
                                                <img class="img-timg"
                                                    src="{{$media->getFullUrl() ?: asset('front_landing/images/tranding-5.png')}}">
                                            </div>
                                        </div>
                                    @endforeach
                                    @if(!empty($project->video_link))
                                        <div class="col-sm-4 col-6 mb-lg-4 mb-3">
                                            <a href="{{ $project->video_link }}" target="_blank" class="img-box rounded-10">
                                                <img class="video-timg" src="{{ asset('img/video-thumbnail.png')}}">
                                            </a>
                                        </div>
                                    @endif
                                </div>
                                <div class="modal">
                                    <span class="close">&times;</span>
                                    <span class="previous">&#8249;</span>
                                    <span class="next">&#8250;</span>
                                    <img class="modal-content" src="" alt="">
                                </div>
                            </div>
                        @endif

                        <!-- start categories-section -->
                        <div class="news-right-section mb-20">
                            <div class="categories-section bg-light p-30 rounded-10 position-relative pt-100">
                                <div class="d-flex justify-content-between align-items-center mb-4 pb-lg-1">
                                    <h5 class="fs-20 fw-6 text-dark mb-0">{{ __('messages.categories.categories') }}</h5>
                                    <div class="rectangle-shape"></div>
                                </div>

                                {{-- Hardcoded Categories --}}
                                <a href="{{ route('landing.causes', ['category' => 'news']) }}" data-id="news"
                                    class="categories d-flex align-items-center justify-content-between bg-white rounded-10 mb-2 news-category-filter1">
                                    <span class="text-dark fs-16 fw-5 news-category-filter1">News</span>
                                    <button class="border-0">
                                        <span class="text-dark">5</span> <!-- Replace 5 with the actual count -->
                                    </button>
                                </a>

                                <a href="{{ route('landing.causes', ['category' => 'podcast']) }}" data-id="podcast"
                                    class="categories d-flex align-items-center justify-content-between bg-white rounded-10 mb-2 news-category-filter1">
                                    <span class="text-dark fs-16 fw-5 news-category-filter1">Podcast</span>
                                    <button class="border-0">
                                        <span class="text-dark">8</span> <!-- Replace 8 with the actual count -->
                                    </button>
                                </a>

                                <a href="{{ route('landing.causes', ['category' => 'reports']) }}" data-id="reports"
                                    class="categories d-flex align-items-center justify-content-between bg-white rounded-10 mb-2 news-category-filter1">
                                    <span class="text-dark fs-16 fw-5 news-category-filter1">Reports</span>
                                    <button class="border-0">
                                        <span class="text-dark">12</span> <!-- Replace 12 with the actual count -->
                                    </button>
                                </a>

                            </div>
                        </div>


                        <!-- end donation section -->
                    </div>
                </div>
            </div>
        </section>
        <!-- end cause-details-section-->
    </div>
@endsection
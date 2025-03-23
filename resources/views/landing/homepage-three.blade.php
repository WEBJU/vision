<?php
$latestNews = latestNews();
$brands = brands();
?>
@extends('landing.layouts.app')
@section('title')
    Home
@endsection
@php $styleCss = 'style'; @endphp
@section('content')

    <section class="hero-slider hero-style-1 hero-style-3">
        <div class="hero-slider-three-active owl-carousel">
            @foreach($data['homepageThreeSliders'] as $slider)
                <div class="single-slide" {{ $styleCss }}="background-image: url('{{$slider->slider_image}}')">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-8 text-lg-left col-12">
                            <div class="slide-contents text-white">
                                <div class="sub-title">
                                    <h4>{{ $slider->title_1 }}</h4>
                                </div>
                                <h1 class="fs-lg">{{ $slider->title_2 }}</h1>
                            </div>
                        </div>
                            <div class="col-lg-3 offset-lg-1 col-12 text-xl-right">
                                <div class="video-play-btn mt-80 mt-lg-0">
                                    <a href="https://www.youtube.com/watch?v={{ YoutubeID($data['homepageThreeVideo']['youtube_video_link']) }}"
                                       class="play-video popup-video"><i class="fas fa-play"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- single-slide end -->
            @endforeach
        </div>
    </section>

    <section class="promo-section cause-cat-section">
        <div class="container wow fadeInUp">
            <div class="row">
                @foreach($data['homepageThreeCategories'] as $category)
                    <div class="col-6 col-sm-4 col-lg-2 mb-3">
                        <a class="single-cause-cat h-100">
                            <div class="icon">
                                <img src="{{ $category->categories_image }}" alt="" width="59" height="59"
                                     class="object-fit-cover">
                            </div>
                            <p>{{ $category->title }}</p>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="about-section section-padding custom-about-padding">
        <div class="container">
            <div class="org-logo-wrap text-center custom-org-logo">
                <div class="org-logo">
                    <img src="{{ getFaviconUrl() }}" alt="" class="object-fit-cover" width="63px">
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-md-10 offset-md-1 text-center mb-sm-5 mb-3">
                    <div class="section-title">
                        <span><i class="fal fa-heart"></i>About Us</span>
                        <h1 class="mt-5">{{ $data['aboutUs']['title'] }}</h1>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="single-about-img bg-cover"
                    {{ $styleCss }}="background-image: url('{{$data['aboutUs']['image_1']}}')"></div>
            </div>
            <div class="col-lg-6 col-md-6 col-12">
                <div class="single-about-img bg-cover"
                {{ $styleCss }}="background-image: url('{{$data['aboutUs']['image_2']}}')"></div>
        </div>
        </div>
        </div>
    </section>

    <section class="funfact-wrap section-padding text-white">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-sm-6">
                    <div class="single-fact">
                        <div class="icon">
                            <img src="{{ asset('front_landing/landing/img/icon/1.png') }}" alt="" class="object-fit-cover">
                        </div>
                        <div class="numbers">
                            <div class="digit"><span>5</span>m</div>
                            <p>Projects Done</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="single-fact">
                        <div class="icon">
                            <img src="{{ asset('front_landing/landing/img/icon/2.png') }}" alt="" class="object-fit-cover">
                        </div>
                        <div class="numbers">
                            <div class="digit"><span>3</span>m</div>
                            <p>Hopeless Child</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="single-fact">
                        <div class="icon">
                            <img src="{{ asset('front_landing/landing/img/icon/3.png') }}" alt="" class="object-fit-cover">
                        </div>
                        <div class="numbers">
                            <div class="digit"><span>99</span></div>
                            <p>Team Member</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="single-fact">
                        <div class="icon">
                            <img src="{{ asset('front_landing/landing/img/icon/4.png') }}" alt="" class="object-fit-cover">
                        </div>
                        <div class="numbers">
                            <div class="digit"><span>10</span></div>
                            <p>Get Regards</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="team-section section-padding section-bg">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-8 offset-lg-2 text-center mb-40">
                    <div class="section-title">
                        <span><i class="fal fa-heart"></i>Volunteers</span>
                        <h1>Our Team Mates With <span>Good</span> History</h1>
                    </div>
                </div>
            </div>

            <div class="row">
                @foreach($data['teams'] as $team)
                    <div class="col-xl-3 col-lg-4 col-md-6 col-12">
                        <div class="single-team-member text-center">
                            <div class="member-img">
                                <img src="{{ $team->image_url }}" alt="" width="214px" height="271"
                                     class="object-fit-cover">
                                <div class="small-element"></div>
                            </div>
                            <div class="member-details">
                                <h3>{{ $team->name }}</h3>
                                <span>{{ $team->designation }}</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="join-cta-section text-white text-center text-lg-left">
        <div class="container bg-cover bg-overlay"
        {{ $styleCss }}="background-image: url('{{ $data['homepageThreeVideo']['bg_image'] }}')">
        <div class="row align-items-center">
            <div class="offset-xl-5 col-xl-6 col-lg-8 offset-lg-2 col-md-12">
                <div class="section-title">
                    <span><i class="fal fa-heart"></i>{{ $data['homepageThreeVideo']['short_title'] }}</span>
                    <h1>{{ $data['homepageThreeVideo']['title'] }}</h1>
                </div>
                <div class="video-play-btn mt-2">
                    <a href="https://www.youtube.com/watch?v={{ YoutubeID($data['homepageThreeVideo']['youtube_video_link']) }}"
                       class="play-video popup-video"><i class="fas fa-play"></i></a>
                    <a href="https://www.youtube.com/watch?v={{ YoutubeID($data['homepageThreeVideo']['youtube_video_link']) }}"
                           class="popup-video play-text text-white text-capitalize pl-4">play video</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="faq-section section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section-title">
                        <span><i class="fal fa-heart"></i>Why Choose Us</span>
                        <h1>We’ve Funded <span>5k</span> Dollars Over</h1>
                    </div>

                    <div class="faq-content">
                        <div class="faq-accordion">
                            <div id="accordion" class="accordion">
                                @foreach($data['faqs'] as $faq)
                                    <div class="card custom-card-radius">
                                        <div class="card-header custom-card-radius" id="faq1">
                                            <p class="mb-0 text-capitalize">
                                                <a class="collapsed" role="button" data-toggle="collapse"
                                                   aria-expanded="false" href="#faq-{{$faq->id}}">
                                                    {{ $faq->title }}
                                                </a>
                                            </p>
                                        </div>
                                        <div id="faq-{{$faq->id}}" class="collapse" data-parent="#accordion">
                                            <div class="card-body">
                                                {{ $faq->description }}
                                            </div>
                                        </div>
                                    </div> <!-- /card -->
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-12 mb-5 mb-lg-0 pr-lg-0">
                    <div class="block-img">
                        <img class="radius-four object-fit-cover" src="{{ $data['aboutUs']['image_1'] }}" alt="FundBux">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="cause-section section-padding section-bg custom-causes-padding">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-8 offset-lg-2 text-center">
                    <div class="section-title mb-md-40 mb-0">
                        <span><i class="fal fa-heart"></i>Trending Causes</span>
                        <h1>It’s About Impact, <span>Good</span> History</h1>
                    </div>
                </div>
            </div>

            <div class="row">
                @foreach($data['campaigns'] as $campaign)
                    @if(!campaignEnd($campaign->id))
                        <div class="col-xl-4 col-md-6 mt-4">
                            <div class="single-cause-item style-1 style-3 h-100 mt-0 trending-cause">
                                <div class="cause-bg bg-cover custom-img-radius"
                                {{ $styleCss }}="background-image: url('{{ $campaign->image }}');">
                                @if($campaign->is_featured)
                                    <div class="cause-feature-icon">
                                        <i class="fas fa-award"></i>
                                    </div>
                                @endif
                            </div>
                            <div class="cause-content cause-grid-content">
                                <div class="cause-meta d-flex align-items-center flex-wrap">
                                    <a href="{{route('landing.causes',$campaign->campaignCategory->id)}}"
                                       class="cause-cat cause-cat-top radius-four custom-cause-cat m-0 mr-2 {{ $campaign->is_emergency == 1 ? 'custom-cause-red' : ''}}">{{ $campaign->campaignCategory->name}}</a>
                                        <a class="cause-author my-1"><i
                                                    class="fal fa-user"></i>By {{ $campaign->user->full_name }}
                                        </a>
                                    </div>
                                    <h4>
                                        <a href="{{ route('landing.campaign.details',$campaign->slug) }}">{{ Str::limit($campaign->title,50) }}</a>
                                    </h4>
                                    <div class="cause-amount cause-grid mt-20  d-flex justify-content-between align-items-center flex-wrap">
                                        <div class="chart my-2"
                                             data-percent="{{getRaisedAmountPercentage($campaign->campaignDonations->sum('donated_amount'),$campaign->goal)}}">
                                            <span class="percent"></span>
                                        </div>
                                        <div class="right-info my-2">
                                            <div class="total-raised">
                                                <i class="fal fa-money-check-alt"></i><span>{{ getCurrencySymbol($campaign->currency) . $campaign->campaignDonations->sum('donated_amount') }}</span>
                                                Raised
                                            </div>
                                            <div class="price-goal">
                                                <i class="far fa-analytics"></i>
                                                <span>
                                                {{ getCurrencySymbol($campaign->currency) . ($campaign->goal ? $campaign->goal : 0) }}
                                            </span>
                                                Goal
                                            </div>
                                        </div>
                                        <div class="donate-btn my-2">
                                            <a class="radius-four">Donate</a>
                                        </div>
                                        @php
                                            $shareUrl = Request::root().'/c/'.$campaign->slug;
                                        @endphp
                                        <div class="btn-group dropleft share-dropdown my-2 justify-content-center">
                                            <button type="button" class="bg-white" data-toggle="dropdown"
                                                    aria-haspopup="true" aria-expanded="false">
                                            <span class="read-cause-link">
                                                <a class="cause-share-link mt-0"><i class="fal fa-share"></i></a>
                                            </span>
                                            </button>
                                            <div class="dropdown-menu p-2 border-0">
                                                <div class="d-flex justify-content-between">
                                                    <a href="https://www.facebook.com/sharer.php?u={{ $shareUrl }}"
                                                       class="mt-0"
                                                       target="_blank" title="Facebook">
                                                        <img src="{{ asset('front_landing/web/images/social-icon-images/facebook.png') }}"
                                                             width="20px" height="20px" class="object-fit-cover">
                                                    </a>
                                                    <a href="https://www.instagram.com/sharer.php?u={{$shareUrl}}"
                                                       class="mt-0"
                                                       target="_blank" title="Instagram">
                                                        <img src="{{ asset('front_landing/web/images/social-icon-images/instagram.png') }}"
                                                             width="20px" height="20px" class="object-fit-cover">
                                                    </a>
                                                    <a href="https://twitter.com/share?url={{$shareUrl}}&text={{ $campaign->title }}&hashtags=sharebuttons"
                                                       class="mt-0"
                                                       target="_blank" title="Twitter">
                                                        <img src="{{ asset('front_landing/web/images/social-icon-images/twitter.png') }}"
                                                             width="20px" height="20px" class="object-fit-cover">
                                                    </a>
                                                    <a href="https://www.linkedin.com/shareArticle?mini=true&url={{$shareUrl}}"
                                                       class="mt-0"
                                                       target="_blank" title="Linkedin">
                                                        <img src="{{ asset('front_landing/web/images/social-icon-images/linkedin.png') }}"
                                                             width="20px" height="20px">
                                                    </a>
                                                    <a href="mailto:?Subject={{ $campaign->title }}
                                                            &Body=This%20is%20your%20campaign%20link%20:%20{{$shareUrl}}"
                                                       class="mt-0" target="_blank" title="Gmail">
                                                        <img src="{{ asset('front_landing/web/images/social-icon-images/gmail.png') }}"
                                                             width="20px" height="20px" class="object-fit-cover">
                                                    </a>
                                                    <a href="https://pinterest.com/pin/create/link/?url={{$shareUrl}}"
                                                       class="mt-0"
                                                       target="_blank" title="Pinterest">
                                                        <img src="{{ asset('front_landing/web/images/social-icon-images/pinterest.png') }}"
                                                             width="20px" height="20px" class="object-fit-cover">
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- /.single-cause-item  -->
                        </div>
            @endif
            @endforeach
        </div>
        <div class="mt-5 d-flex justify-content-center w-100">
            <a href="{{ route('landing.causes') }}" class="theme-btn yellow">View All</a>
        </div>
        </div>
    </section>

    <section class="blog-card-section blog-3 section-padding bg-cover"
    {{ $styleCss }}="background-image: url('{{ asset('front_landing/landing/img/blog_3_bg.jpg') }}');">
    <div class="container">
        <div class="row">
            <div class="col-12 text-left mb-40">
                <div class="section-title">
                    <span><i class="fal fa-heart"></i>Insights</span>
                    <h1 class="text-white">News Feeds</h1>
                </div>
            </div>
        </div>

        <div class="row">
            @foreach($latestNews as $news)
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="single-blog-card card-2 custom-blog-radius">
                        <div class="featured-img bg-cover"
                        {{ $styleCss }}="background-image: url('{{ $news['news_image'] }}')"></div>
                    <div class="blog-details radius-four">
                        <a href="{{ route('landing.news') }}"
                           class="cat-name">{{ $news->newsCategory->name }}</a>
                        <span><i class="fal fa-calendar-alt"></i>{{ Carbon\Carbon::parse($news->created_at)->isoFormat('Do MMMM YYYY') }}</span>
                        <h3>
                            <a href="{{route('landing.news-details', $news['slug'])}}">{{ Str::limit($news->title , 35) }}</a>
                        </h3>
                        <p>{!!  Str::limit($news->description , 40) !!}</p>
                        <a href="{{route('landing.news-details', $news['slug'])}}" class="read-more-btn">Read
                            More</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

@endsection


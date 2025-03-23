<?php
$latestNews = latestNews();
?>
@extends('landing.layouts.app')
@section('title')
    Home
@endsection
@php $styleCss = 'style'; @endphp
@section('content')

    <section class="hero-slider hero-style-1 hero-style-2">
        <div class="hero-slider-two-active owl-carousel">
            @foreach($data['homepageTwoSliders'] as $slider)
                <div class="single-slide" {{ $styleCss }}="background-image: url({{$slider->slider_image}})">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-12">
                            <div class="slide-contents text-white">
                                <div class="sub-title">
                                    <h4>{{ $slider->title_1 }}</h4>
                                </div>
                                <h1 class="fs-lg">{{ $slider->title_2 }}</h1>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
                <!-- single-slide end -->
            @endforeach
        </div>
    </section>

    <section class="about-us-section about-us-two section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="about-shots d-flex justify-content-between align-center">
                        <div class="about-img mr-3"><img src="{{ $data['aboutUs']['image_1'] }}" alt="" width="270"
                                                         height="400"
                                                         class="object-fit-cover radius-four"/>
                        </div>
                        <div class="about-img"><img src="{{ $data['aboutUs']['image_2'] }}" width="310" height="480"
                                                    class="object-fit-cover radius-four"/>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 about_left_content mt-0 pl-lg-5 pr-lg-5">
                    <div class="section-title">
                        <span><i class="fal fa-heart"></i>About Us</span>
                        <h1>{{ $data['aboutUs']['title'] }}</h1>
                    </div>
                    <p>{{ $data['aboutUs']['short_description'] }}</p>
                    <ul class="checked-list mt-30">
                        <li>{{ $data['aboutUs']['point_1'] }}</li>
                        <li>{{ $data['aboutUs']['point_2'] }}</li>
                        <li>{{ $data['aboutUs']['point_3'] }}</li>
                        <li>{{ $data['aboutUs']['point_4'] }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="services-section section-padding pt-0">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-md-6 col-12">
                    <div class="single-service-item radius-four">
                        <div class="icon"><img src="{{ $data['homepageTwoCategories']['image_1'] }}" alt="" width="84"
                                               height="70" class="object-fit-cover"/></div>
                        <div class="service-details">
                            <h2>
                                <a>{{ Str::limit($data['homepageTwoCategories']['title_1'] , 18) }}</a>
                            </h2>
                            <p>{{ Str::limit($data['homepageTwoCategories']['description_1'] , 130) }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6 col-12">
                    <div class="single-service-item">
                        <div class="icon"><img src="{{ $data['homepageTwoCategories']['image_2'] }}" alt="" width="84"
                                               height="70" class="object-fit-cover"/></div>
                        <div class="service-details">
                            <h2>
                                <a>{{ Str::limit($data['homepageTwoCategories']['title_2'] , 18) }}</a>
                            </h2>
                            <p>{{ Str::limit($data['homepageTwoCategories']['description_2'] , 130) }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6 col-12">
                    <div class="single-service-item">
                        <div class="icon"><img src="{{ $data['homepageTwoCategories']['image_3'] }}" alt="" width="84"
                                               height="70" class="object-fit-cover"/></div>
                        <div class="service-details">
                            <h2>
                                <a>{{ Str::limit($data['homepageTwoCategories']['title_3'] , 18) }}</a>
                            </h2>
                            <p>{{ Str::limit($data['homepageTwoCategories']['description_3'] , 130) }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="video-section text-center bg-cover section-padding"
    {{ $styleCss }}="background-image: url({{ $data['homepageTwoVideo']['bg_image'] }})">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8 offset-lg-2 col-12">
                <div class="section-title">
                    <span><i class="fal fa-heart"></i>{{ $data['homepageTwoVideo']['short_title'] }}</span>
                    <h1>{{ $data['homepageTwoVideo']['title'] }}</h1>
                </div>
            </div>
            <div class="col-lg-12 mt-5">
                <div class="video-play-btn">
                        <a href="https://www.youtube.com/watch?v={{ YoutubeID($data['homepageTwoVideo']['youtube_video_link']) }}"
                           class="play-video popup-video"><i class="fas fa-play"></i></a>
                        <a href="https://www.youtube.com/watch?v={{ YoutubeID($data['homepageTwoVideo']['youtube_video_link']) }}"
                           class="popup-video play-text text-white text-capitalize pl-4">play video</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="popular-cause-section section-padding pb-0">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-8 text-left mb-40">
                    <div class="section-title">
                        <span><i class="fal fa-heart"></i>Trending Causes</span>
                        <h1>Popular Causes</h1>
                    </div>
                </div>
                <div class="col-4 text-right mb-40">
                    <div class="cause-carousel-nav"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="popular-cause-carousel-active owl-carousel owl-theme mt-40">
                        @foreach($data['campaigns'] as $campaign)
                            @if(!campaignEnd($campaign->id))
                                <div class="single-cause-item style-2">
                                    <a href="{{route('landing.causes',$campaign->campaignCategory->id)}}">
                                        <div class="cause-featured-img bg-cover cause-featured-img-radius"
                                        {{ $styleCss }}="background-image: url({{ $campaign->image }})">
                                        @if($campaign->is_featured)
                                            <div class="cause-feature-icon">
                                                <i class="fas fa-award"></i>
                                            </div>
                                        @endif
                                        <a href="{{route('landing.causes',$campaign->campaignCategory->id)}}"
                                           class="cause-cat radius-four custom-cause-cat-two m-0 {{ $campaign->is_emergency == 1 ? 'custom-cause-red' : ''}}">{{ $campaign->campaignCategory->name }}</a>
                                        <div class="donate-progress-bar wow fadeInLeft" data-wow-duration="2s"
                                             data-percentage="{{getRaisedAmountPercentage($campaign->campaignDonations->sum('donated_amount'),$campaign->goal)}}%">
                                            <div class="progress-title-holder clearfix"> <span
                                                            class="progress-number-wrapper">
                                            <span class="progress-number-mark"> <span class="percent"></span> <span
                                                        class="down-arrow"></span> </span> </span></div>
                                                <div class="progress-content-outter">
                                                    <div class="progress-content"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="cause-details cause-details-radius">
                                            <div class="cause-amount d-flex justify-content-between">
                                                <div class="price-raised"><i
                                                            class="fal fa-heart"></i><span>{{getRaisedAmountPercentage($campaign->campaignDonations->sum('donated_amount'),$campaign->goal)}}</span>
                                                    Raised
                                                </div>
                                                <div class="price-goal"><i
                                                            class="far fa-analytics"></i>
                                                    <span> 
                                                {{ getCurrencySymbol($campaign->currency) . ($campaign->goal ? $campaign->goal : 0) }}
                                            </span>
                                                    Goal
                                                </div>
                                            </div>
                                            <h4>
                                                <a href="{{ route('landing.campaign.details',$campaign->slug) }}">{{ Str::limit($campaign->title,50) }}</a>
                                            </h4>
                                            <div class="cause-btns">
                                                <a href="{{ route('landing.campaign.details',$campaign->slug) }}"
                                                   class="theme-btn minimal-btn donateBtn"><i
                                                            class="fal fa-heart"></i> Donate Now</a>
                                                @php
                                                    $shareUrl = Request::root().'/c/'.$campaign->slug;
                                                @endphp
                                                <div class="btn-group dropleft share-dropdown">
                                                    <button type="button" class="bg-white" data-toggle="dropdown"
                                                            aria-haspopup="true" aria-expanded="false">
                                            <span class="read-cause-link">
                                                <a class="cause-share-link mt-0"><i class="fal fa-share"></i></a>
                                            </span>
                                                    </button>
                                                    <div class="dropdown-menu home-two p-2 border-0">
                                                        <div class="d-flex justify-content-between">
                                                            <a href="https://www.facebook.com/sharer.php?u={{ $shareUrl }}"
                                                               class="mt-0"
                                                               target="_blank" title="Facebook">
                                                                <img src="{{ asset('front_landing/web/images/social-icon-images/facebook.png') }}"
                                                                     width="20px" height="20px"
                                                                     class="object-fit-cover">
                                                            </a>
                                                            <a href="https://www.instagram.com/sharer.php?u={{$shareUrl}}"
                                                               class="mt-0"
                                                               target="_blank" title="Instagram">
                                                                <img src="{{ asset('front_landing/web/images/social-icon-images/instagram.png') }}"
                                                                     width="20px" height="20px"
                                                                     class="object-fit-cover">
                                                            </a>
                                                            <a href="https://twitter.com/share?url={{$shareUrl}}&text={{ $campaign->title }}&hashtags=sharebuttons"
                                                               class="mt-0"
                                                               target="_blank" title="Twitter">
                                                                <img src="{{ asset('front_landing/web/images/social-icon-images/twitter.png') }}"
                                                                     width="20px" height="20px"
                                                                     class="object-fit-cover">
                                                            </a>
                                                            <a href="https://www.linkedin.com/shareArticle?mini=true&url={{$shareUrl}}"
                                                               class="mt-0"
                                                               target="_blank" title="Linkedin">
                                                                <img src="{{ asset('front_landing/web/images/social-icon-images/linkedin.png') }}"
                                                                     width="20px" height="20px"
                                                                     class="object-fit-cover">
                                                            </a>
                                                            <a href="mailto:?Subject={{ $campaign->title }}
                                                                    &Body=This%20is%20your%20campaign%20link%20:%20{{$shareUrl}}"
                                                               class="mt-0" target="_blank" title="Gmail">
                                                                <img src="{{ asset('front_landing/web/images/social-icon-images/gmail.png') }}"
                                                                     width="20px" height="20px"
                                                                     class="object-fit-cover">
                                                            </a>
                                                            <a href="https://pinterest.com/pin/create/link/?url={{$shareUrl}}"
                                                               target="_blank" title="Pinterest" class="mt-0">
                                                                <img src="{{ asset('front_landing/web/images/social-icon-images/pinterest.png') }}"
                                                                     width="20px" height="20px"
                                                                     class="object-fit-cover">
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </a>
                    </div>
                    @endif
                    @endforeach
                </div>
            </div>
        </div>
        </div>
    </section>

    <section class="sponsors-section section-padding"
    {{ $styleCss }}="background-image: url('{{ asset('front_landing/landing/img/map.png') }}')">
    <div class="container pt-100">
        <div class="row">
            <div class="col-12 text-center mb-50">
                <div class="title-wrap">
                    <p>Our Sponsors</p>
                </div>
            </div>
        </div>
        <div class="row text-center justify-content-around align-items-center">
            @foreach($data['brands'] as $brand)
                    <div class="col-12 col-md-4 col-lg-3">
                        <div class="single-brand-logo"><img src="{{ $brand->image_url }}" alt="" width="225" height="55"
                                                            class="radius-four object-fit-cover" data-toggle="tooltip"
                                                            data-placement="top" title="{{ $brand->name }}"/></div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    @if(!empty($data['events']) && count($data['events']) > 0)
        <section class="event-card-section section-padding section-bg">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center mb-40">
                        <div class="section-title">
                            <span><i class="fal fa-heart"></i>Event</span>
                            <h1>Upcoming Events</h1>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    @foreach($data['events'] as $event)
                        <div class="col-xl-4 col-md-6 col-12 mb-3">
                            <div class="single-event-card h-100 custom-event-radius"
                            {{ $styleCss }}="background-image: url('{{$event->image_url}}');background-size: cover">
                            <div class="cat-name"><a
                                        href="{{ route('landing.event') }}">{{ $event->eventCategory->name }}</a></div>
                            <div class="event-details">
                                <span>{{ Carbon\Carbon::parse($event->event_date)->isoFormat('Do MMMM YYYY') }}</span>
                                <h3>
                                    <a href="{{ route('landing.event.detail',$event->slug) }}">{{ Str::limit($event->title,35) }}
                                </h3>
                                <p><i class="fal fa-map-marker-alt"></i>{{ $event->venue_location }}</p>
                                <a href="{{ route('landing.event.detail',$event->slug) }}" class="buy-ticket"><i
                                            class="fal fa-chair"></i>Book Your
                                        Seat</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    <section class="blog-card-section section-padding">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mb-40">
                    <div class="section-title">
                        <span><i class="fal fa-heart"></i>Insights</span>
                        <h1>News Feeds</h1>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($latestNews as $news)
                    <div class="col-xl-4 col-md-6 col-12">
                        <div class="single-blog-card">
                            <div class="featured-img bg-cover"
                            {{ $styleCss }}="background-image: url('{{ $news['news_image'] }}')">
                        </div>
                        <div class="blog-details radius-four">
                            <span><i class="fal fa-calendar-alt"></i>{{ Carbon\Carbon::parse($news->created_at)->isoFormat('Do MMMM YYYY') }}</span>
                            <h3>
                                <a href="{{route('landing.news-details', $news['slug'])}}">{{ Str::limit($news->title , 35) }}</a>
                            </h3>
                            <p>{!!   Str::limit($news->description , 40) !!}</p>
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

 

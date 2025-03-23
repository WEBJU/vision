@extends('landing.layouts.app')
@section('title')
    Home
@endsection
@php $styleCss = 'style'; @endphp
@section('content')
    <section class="hero-slider hero-style-1">
        <div class="hero-slider-active owl-carousel">
            @foreach($data['sliders'] as $slider)
                <div class="single-slide object-fit-cover" {{ $styleCss }}="
                background-image: url('{{$slider->slider_image}}')">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-6">
                            <div class="slide-contents text-white">
                                <div class="sub-title">
                                    <h4>{{ $slider->title_1 }}</h4>
                                </div>
                                <h1 class="fs-lg">{{ $slider->title_2 }}</h1>
                            </div>
                        </div>
                        </div>
                    </div>
                </div> <!-- single-slide end -->
        @endforeach
        </div>
    </section>

    <section class="promo-section promo-box-items text-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="support-promo-box text-white">
                        <div class="promo-bg bg-cover object-fit-cover"
                    {{ $styleCss }}="
                    background-image: url('{{ $data['sliderCard']['image'] ? $data['sliderCard']['image'] : asset('assets/images/infyom-logo.png') }}')"></div>
                    <div class="promo-details">
                        <span>{{ $data['sliderCard']['title_1'] }}</span>
                        <h2><a>{{ $data['sliderCard']['title_2'] }}</a></h2>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-12">
                <div class="checkout-promo-box text-white">
                    <div class="icon">
                        <img class="object-fit-cover" src="{{asset('front_landing/landing/img/home1/support_icon.png')}}" alt="">
                        </div>
                        <span>Support Us</span>
                        <h2>Explore Causes</h2>
                        <a class="theme-btn black">Check It Out</a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="subscribe-promo-box text-white">
                        <div class="icon">
                            <img class="object-fit-cover" src="{{asset('front_landing/landing/img/home1/envalope.png')}}" alt="">
                        </div>
                        <span>Subscribe</span>
                        <h2>Get Updates</h2>
                        <form action="{{route('email.subscribe.store')}}" method="post" id="addEmailForm"
                              class="ajax-form form-wraper mailchimp-form">
                            @csrf()
                            <input type="email" placeholder="Enter email address" name="email" class="emailStyle">
                            <button type="submit" id="emailBtn"><i class="fal fa-envelope"></i></button>
                        </form>
                    </div>
                </div>
        </div>
        </div>
    </section>

    <section class="about-us-section section-padding pt-235 overflow-hidden home-about-us">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="about-shots">
                        <div class="about-top-img bg-cover object-fit-cover"
                        {{ $styleCss }}="background-image: url('{{ $data['aboutUs']['image_2'] }}')"></div>
                    <div class="about-main-img">
                        <img src="{{ $data['aboutUs']['image_1'] }}" alt="" width="500" height="563"
                             class="object-fit-cover" class="img-fluid">
                    </div>
                    <div class="our-experience text-white d-none d-sm-block">
                        <h1>{{ $data['aboutUs']['years_of_exp'] }}</h1>
                        <span>Years Of Experience</span>
                    </div>
                </div>
            </div>
                <div class="col-lg-6 about_left_content pr-lg-0 pl-lg-5">
                    <div class="section-title">
                        <span><i class="fal fa-heart"></i>About Us</span>
                        <h1>{{ $data['aboutUs']['title'] }}</h1>
                    </div>
                    <p>{{ $data['aboutUs']['short_description'] }}</p>
                    <ul class="checked-list ml-80 mt-30">
                        <li>{{ $data['aboutUs']['point_1'] }}</li>
                        <li>{{ $data['aboutUs']['point_2'] }}</li>
                        <li>{{ $data['aboutUs']['point_3'] }}</li>
                        <li>{{ $data['aboutUs']['point_4'] }}</li>
                    </ul>
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
                            <div class="single-cause-item style-1 h-100 mt-0">
                                <a href="{{route('landing.causes',$campaign->campaignCategory->id)}}">
                                    <div class="cause-bg bg-cover radius-four object-fit-cover"
                                    {{ $styleCss }}="background-image: url('{{ $campaign->image }}');">
                                    @if($campaign->is_featured)
                                        <div class="cause-feature-icon">
                                            <i class="fas fa-award"></i>
                                        </div>
                                @endif
                            </div>
                            <div class="cause-content">
                                <div class="cause-meta d-flex align-items-center flex-wrap">
                                    <a href="{{route('landing.causes',$campaign->campaignCategory->id)}}"
                                       class="cause-cat cause-cat-top radius-four custom-cause-cat m-0 mr-2 {{ $campaign->is_emergency == 1 ? 'custom-cause-red' : ''}}
                                                       ">{{ $campaign->campaignCategory->name }}</a>


                                    <a class="cause-author my-1"><i
                                                class="fal fa-user"></i>By {{ $campaign->user->full_name }}
                                    </a>
                                </div>
                                <h4>
                                    <a href="{{ route('landing.campaign.details',$campaign->slug) }}">{{ Str::limit($campaign->title,50) }}</a>
                                </h4>
                                <div class="goal-progress-wrap">
                                    <div class="progress">
                                        <div class="progress-bar wow fadeInLeft" role="progressbar"
                                        {{ $styleCss }}="
                                        width:{{getRaisedAmountPercentage($campaign->campaignDonations->sum('donated_amount'),$campaign->goal)}}
                                        %"></div>
                                </div>
                            </div>
                            <div class="cause-amount d-flex justify-content-between">
                                <div class="price-raised">
                                    <i class="fal fa-heart"></i><span>{{getRaisedAmountPercentage($campaign->campaignDonations->sum('donated_amount'),$campaign->goal)}}</span>
                                    Raised
                                </div>
                                <div class="price-goal">
                                    <i class="far fa-analytics"></i>
                                    <span>
                                            {{ getCurrencySymbol($campaign->currency) . ($campaign->goal ? $campaign->goal : 0) }}
                                        </span>
                                                Goal
                                            </div>

                                            @php
                                                $shareUrl = Request::root().'/c/'.$campaign->slug;
                                            @endphp
                                            <div class="btn-group dropleft share-dropdown">
                                                <button type="button" class="bg-white" data-toggle="dropdown"
                                                        aria-haspopup="true" aria-expanded="false">
                                                <span class="read-cause-link">
                                                    <i class="fal fa-share"></i>
                                                </span>
                                                </button>
                                                <div class="dropdown-menu p-2 border-0">
                                                    <div class="d-flex justify-content-between">
                                                        <a href=http://www.facebook.com/sharer.php?u={{$shareUrl}}"
                                                           target="_blank" title="Facebook">
                                                            <img src="{{ asset('front_landing/web/images/social-icon-images/facebook.png') }}"
                                                                 width="20px" height="20px" class="object-fit-cover">
                                                        </a>
                                                        <a href="https://www.instagram.com/?url={{$shareUrl}}"
                                                           target="_blank" title="Instagram">
                                                            <img src="{{ asset('front_landing/web/images/social-icon-images/instagram.png') }}"
                                                                 width="20px" height="20px" class="object-fit-cover">
                                                        </a>
                                                        <a href="https://twitter.com/shareArticle?mini=true&url={{$shareUrl}}&text={{ $campaign->title }}&hashtags=sharebuttons"
                                                           target="_blank" title="Twitter">
                                                            <img src="{{ asset('front_landing/web/images/social-icon-images/twitter.png') }}"
                                                                 width="20px" height="20px" class="object-fit-cover">
                                                        </a>
                                                        <a href="http://www.linkedin.com/shareArticle?mini=true&url={{$shareUrl}}"
                                                           target="_blank" title="Linkedin">
                                                            <img src="{{ asset('front_landing/web/images/social-icon-images/linkedin.png') }}"
                                                                 width="20px" height="20px" class="object-fit-cover">
                                                        </a>
                                                        <a href="mailto:?Subject={{ $campaign->title }} &Body=This%20is%20your%20campaign%20link%20:%20
                                                        {{$shareUrl}}" title="Gmail" target="_blank">
                                                            <img src="{{ asset('front_landing/web/images/social-icon-images/gmail.png') }}"
                                                                 width="20px" height="20px" class="object-fit-cover">
                                                        </a>
                                                        <a href="https://pinterest.com/pin/create/link/?url={{$shareUrl}}"
                                                           title="Pinterest" target="_blank">
                                                            <img src="{{ asset('front_landing/web/images/social-icon-images/pinterest.png') }}"
                                                                 width="20px" height="20px" class="object-fit-cover">
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
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

    <section class="cta-section theme-bg text-white section-padding">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-4 pr-xl-0">
                    <div class="section-title">
                        <span><i class="fal fa-heart"></i>Call To Action</span>
                        <h1>Give Your Big Hand Forever</h1>
                    </div>
                </div>
                <div class="col-xl-8 mt-5 mt-xl-0">
                    <div class="cta-subscribe-form">
                        <form id="callToActionForm" class="row" method="post">
                            @csrf
                            <div class="col-md-6 pr-5i">
                                <div class="single-input custom-input">
                                    <input type="text" name="name" id="name" class="radius-four"
                                           placeholder="Enter your name" required>
                                    <span class="fal fa-user"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="single-input custom-input">
                                    <input type="text" name="phone" id="phone" class="radius-four"
                                           placeholder="Enter phone number"
                                           onkeyup='if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,"")'
                                           required>
                                    <span class="fal fa-phone"></span>
                                </div>
                            </div>
                            <div class="col-md-4 pr-5i">
                                <div class="single-input custom-input">
                                    <input type="text" name="address" id="address" class="radius-four"
                                           placeholder="Enter address" required>
                                    <span class="far fa-map-marker-alt"></span>
                                </div>
                            </div>
                            <div class="col-md-4 pr-5i">
                                <div class="single-input custom-input">
                                    <input type="text" name="zip" id="zip" class="radius-four" placeholder="Zip Code"
                                           required="">
                                    <span class="fal fa-map"></span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="single-input custom-input">
                                    <button type="submit" id="callToActionSaveBtn" class="radius-four">Get Involved
                                        Today
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="event-section event-carousel text-white">
        <div class="event-carousel-active owl-carousel">
            @foreach($data['events'] as $event)
                <div class="single-event-item bg-cover object-fit-cover"
                {{ $styleCss }}="background-image: url('{{$event->image_url}}')">
                <div class="event-details">
                    <div class="event-date">
                        <span>{{ Carbon\Carbon::parse($event->event_date)->format('d') }}</span>
                        {{ Carbon\Carbon::parse($event->event_date)->format('M') }}
                    </div>
                    <div class="event-title">
                        <a href="{{ route('landing.event.detail',$event->slug )}}"><strong>{{ Str::limit($event->title , 20) }}</strong></a>
                        <h4>
                            <a href="{{ route('landing.event.detail',$event->slug )}}">{{ Str::limit($event->description , 40) }}</a>
                        </h4>
                        </div>
                    </div>
                    <div class="event-hover d-flex">
                        <div class="event-time">
                            <i class="fal fa-clock"></i>{{\Carbon\Carbon::createFromFormat('H:i:s',$event->start_time)->format('h:i')}}
                            - {{\Carbon\Carbon::createFromFormat('H:i:s',$event->end_time)->format('h:i')}}
                        </div>
                        <div class="event-author">
                            <i class="fal fa-user"></i>{{ $event->event_organizer_name }}
                        </div>
                    </div>
        </div>
        @endforeach
        </div>
    </section>
    <section class="video-section bg-cover section-padding object-fit-cover mt-5"
    {{ $styleCss }}="background-image: url('{{ $data['videoSection']['bg_image'] }}')">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-12 text-center text-lg-left">
                <div class="section-title">
                    <span><i class="fal fa-heart"></i>{{ $data['videoSection']['short_title'] }}</span>
                    <h1>{{ $data['videoSection']['title'] }}</h1>
                </div>
            </div>
            <div class="col-lg-4 col-12 text-center text-lg-right offset-lg-1 mt-4 mt-lg-0">
                <div class="video-play-btn">
                        <a href="https://www.youtube.com/watch?v={{ YoutubeID($data['videoSection']['youtube_video_link']) }}"
                           class="play-video popup-video yt"><i class="fas fa-play"></i></a>
                        <a href="https://www.youtube.com/watch?v={{ YoutubeID($data['videoSection']['youtube_video_link']) }}"
                           class="popup-video play-text text-white text-capitalize pl-4">play video</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @if($data['latestNewsFeeds'] != null)
        <div class="blog-section section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center mb-50">
                        <div class="section-title">
                            <span><i class="fal fa-heart"></i>Our Insights</span>
                            <h1>News Feeds</h1>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 pr-3 pl-3 pr-lg-5">
                        <div class="blog-card">
                            <div class="single-blog-card">
                                <img class="featured-img featured-img-radius bg-cover object-fit-cover"
                                     src="{{ !empty($data['latestNewsFeeds']['news_image']) ? $data['latestNewsFeeds']['news_image'] : url(asset('front_landing/landing/img/blog/1.jpg')) }}">
                                <div class="post-content news-post-content-radius">
                                    <div class="post-meta d-flex">
                                        <div class="post-author">
                                            <i class="fal fa-user"></i>By
                                            <a>{{$data['latestNewsFeeds']->user->full_name}}</a>
                                        </div>
                                        <div class="post-cat">
                                            <i class="fal fa-tags"></i>
                                            <a>{{isset($data['latestNewsFeeds']->newsCategory) ? $data['latestNewsFeeds']->newsCategory->name : ''}}</a>
                                        </div>
                                    </div>
                                    <h3>
                                        <a href="{{route('landing.news-details', $data['latestNewsFeeds']['slug'])}}">{{$data['latestNewsFeeds']['title']}}</a>
                                    </h3>
                                    <p>{!! nl2br( \Illuminate\Support\Str::limit($data['latestNewsFeeds']['description'], 350) ) !!}</p>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-6">
                        <div class="blog-list-view">
                            @foreach($data['oldNewsFeeds'] as $oldNewsFeed)
                                <div class="single-blog-item">
                                    <div class="post-date radius-four">
                                        <span>{{ \Carbon\Carbon::parse($oldNewsFeed->created_at)->format('d')}}</span>{{ \Carbon\Carbon::parse($oldNewsFeed->created_at)->format('M')}}
                                    </div>
                                    <div class="post-content">
                                        <div class="post-meta">
                                            <div class="post-author">
                                                <i class="fal fa-user"></i>By <a>{{$oldNewsFeed->user->full_name}}</a>
                                            </div>
                                            <div class="post-cat">
                                                <i class="fal fa-tags"></i>
                                                <a>{{isset($oldNewsFeed->newsCategory) ? $oldNewsFeed->newsCategory->name :''}}</a>
                                            </div>
                                        </div>
                                        <h3><a href="{{route('landing.news-details', $oldNewsFeed->slug)}}">
                                                {{ \Illuminate\Support\Str::limit($oldNewsFeed->title, 60) }}</a></h3>
                                        <p>{!! nl2br( \Illuminate\Support\Str::limit($oldNewsFeed->description, 92) ) !!}</p>
                                    </div>
                                </div> <!-- ./single-blog-item -->
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection

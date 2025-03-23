<?php
$settings = settings();
?>
@extends('landing.layouts.app')
@section('title')
    About
@endsection
@php $styleCss = 'style'; @endphp
@section('content')
    <section class="page-banner-wrap bg-cover object-fit-cover"
    {{ $styleCss }}="background-image: url('{{ $aboutUs['menu_bg_image'] }}')">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-8">
                <div class="page-heading text-white">
                    <div class="sub-title">
                        <h4>{{ $aboutUs['menu_title'] }}</h4>
                    </div>
                    <div class="page-title">
                        <h1>About Us</h1>
                    </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('landing.home') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">about us</li>
                        </ol>
                    </nav>
                </div>
        </div>
    </div>
    </section>

    <section class="about-us-section section-padding pt-235 overflow-hidden custom-about-sec home-about-us">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="about-shots">
                        <div class="about-top-img bg-cover object-fit-cover"
                        {{ $styleCss }}="background-image: url('{{ $aboutUs['image_2'] }}')"></div>
                    <div class="about-main-img">
                        <img src="{{ $aboutUs['image_1'] }}" alt="" width="500" height="563"
                             class="object-fit-cover">
                    </div>
                    <div class="our-experience text-white d-none d-sm-block">
                        <h1>{{ $aboutUs['years_of_exp'] }}</h1>
                        <span>Years Of Experience</span>
                    </div>
                </div>
            </div>
                <div class="col-lg-6 about_left_content pr-lg-0 pl-lg-5">
                    <div class="section-title">
                        <span><i class="fal fa-heart"></i>About Us</span>
                        <h1>{{ $aboutUs['title'] }}</h1>
                    </div>
                    <p>{{ $aboutUs['short_description'] }}</p>
                    <ul class="checked-list ml-80 mt-30">
                        <li>{{ $aboutUs['point_1'] }}</li>
                        <li>{{ $aboutUs['point_2'] }}</li>
                        <li>{{ $aboutUs['point_3'] }}</li>
                        <li>{{ $aboutUs['point_4'] }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    @if(!empty($successStories))
        <section class="success-area-two">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8 col-sm-11 col-11">
                        <div class="section-title section-title-four b-top text-center head-title">
                            <h1 class="title"> Success Stories</h1>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="success-slider owl-carousel" role="toolbar">
                            @foreach($successStories as $successStory)
                                <div class="row d-flex align-items-center">
                                    <div class="col-lg-6 order-2 order-lg-1">
                                        <div class="success-contents">
                                            <div class="section-title">
                                                <h4 class="success-titles">
                                                    <a href="javascript:void(0)"
                                                       tabindex="-1">{{ $successStory->title }}</a></h4>
                                            </div>
                                            <p>{!! $successStory->short_description !!}</p>

                                        </div>
                                    </div>
                                    <div class="col-lg-5 offset-lg-1 order-1 order-lg-2">
                                        <div class="success-mask margin-bottom-30">
                                            <img src="{{ $successStory->image }}" alt="{{ $successStory->title }}">
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

    @if(count($brands)>0 && $settings['active_homepage_status']!=\App\Models\Setting::STATUS_HOMEPAGE_3)
        <section class="brands-carousel-section bg-cover bg-overlay section-padding object-fit-cover"
        {{ $styleCss }}="background-image: url('{{asset('front_landing/landing/img/brand_carousel_bg.jpg')}}')">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 col-lg-12">
                    <div class="brands-carousel-active owl-carousel d-flex align-items-center">
                        @foreach($brands as $brand)
                            <div class="single-brand-logo">
                                <img src="{{ $brand->image_url }}" alt="" width="225" height="55"
                                     class="object-fit-cover"
                                     data-toggle="tooltip" data-placement="top"
                                     title="{{ $brand->name }}">
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

@endsection


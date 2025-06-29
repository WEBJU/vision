@php
    $settings  = settings();
    // Extract category from the URL (you can adjust this depending on how the category is passed in the URL)
    $urlSegments = explode('/', request()->path());
    $category = $urlSegments[1] ?? 'default'; // Default category if not found
@endphp

@extends('front_landing.layouts.app')

@section('title')
    {{ __('messages.news.news') }} - {{ ucfirst($category) }}
@endsection

@section('content')
    <div class="news-page">
        <!-- start hero-section -->
        <section class="hero-section">
            <div class="inner-bgimg position-relative"
                 style="background: url('{{ asset('front_landing/images/vision-12.jpg') }}');">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-md-7 parallelogram-shape">
                            <div class="text-white inner-text position-relative">
                                <h2 class="fs-1 mb-md-0 fw-6">{{ ucfirst($category) }}</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end hero-section -->

        <!-- start news-section -->
        <div class="news-section">
            <div class="container">
                <div class="row">
                    <div class="col-xl-8">
                        <!-- start news-left-section -->
                        <div class="news-left-section pt-60">
                            @livewire('show-news', ['newsCategory' => $category])
                        </div>
                        <!-- end news-left-section -->
                    </div>
                    @include('front_landing.sidebar_menu')
                </div>
            </div>
        </div>
        <!-- end news-section -->
    </div>
@endsection

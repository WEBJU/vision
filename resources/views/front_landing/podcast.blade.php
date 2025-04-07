@php
    $settings  = settings();
    $bannerImage = $podcastImg['menu_image'] ?? asset('front_landing/images/podcast-hero-img.png');
    $heroTitle = __('messages.front_landing.podcasts');
@endphp

@extends('front_landing.layouts.app')

@section('title')
    {{ __('messages.front_landing.podcasts') }}
@endsection

@section('content')
    <div class="podcast-page">
        @include('front_landing.partials.page-hero', [
            'bannerImage' => $bannerImage,
            'heroTitle' => $heroTitle
        ])

        <section class="podcast-section py-5">
            <div class="container">
                @livewire('show-podcast')
            </div>
        </section>
    </div>
@endsection


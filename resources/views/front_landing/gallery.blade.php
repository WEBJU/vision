@php
    $settings  = settings();
    $bannerImage = $galleryImg['menu_image'] ?? asset('front_landing/images/gallery-hero-img.png');
    $heroTitle = __('messages.front_landing.gallery');
@endphp

@extends('front_landing.layouts.app')

@section('title')
    {{ __('messages.front_landing.gallery') }}
@endsection

@section('content')
    <div class="gallery-page">
        @include('front_landing.partials.page-hero', [
            'bannerImage' => $bannerImage,
            'heroTitle' => $heroTitle
        ])

        <section class="gallery-section py-5">
            <div class="container">
                @livewire('show-gallery')
            </div>
        </section>
    </div>
@endsection

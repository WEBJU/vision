@php
    $settings  = settings();
    $bannerImage = $reportsImg['menu_image'] ?? asset('front_landing/images/reports-hero-img.png');
    $heroTitle = __('messages.front_landing.reports');
@endphp

@extends('front_landing.layouts.app')

@section('title')
    {{ __('messages.front_landing.reports') }}
@endsection

@section('content')
    <div class="reports-page">
        @include('front_landing.partials.page-hero', [
            'bannerImage' => $bannerImage,
            'heroTitle' => $heroTitle
        ])

        <div class="reports-section py-5">
            <div class="container">
                @livewire('show-reports')
            </div>
        </div>
    </div>
@endsection

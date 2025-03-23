@php
    $settings  = settings();
@endphp
@extends('landing.layouts.app')
@section('title')
    News
@endsection
@php $styleCss = 'style'; @endphp
@section('content')
    <section class="page-banner-wrap bg-cover object-fit-cover"
    {{ $styleCss }}="background-image: url('{{ $newsImg['menu_image'] }}')">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-8">
                <div class="page-heading text-white">
                    <div class="sub-title">
                        <h4><strong>Our Mission:</strong> Food, Education, Medicine</h4>
                    </div>
                    <div class="page-title">
                        <h1>News Feeds</h1>
                    </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('landing.home') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">news</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <section class="blog-wrapper news-wrapper section-padding">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-8">
                    @livewire('show-news',['newsCategory'=>$newsCategoryId , 'newsTags' => $newsTagId])
                </div>
                @include('landing.sidebar_menu')
            </div>
        </div>
    </section>
@endsection

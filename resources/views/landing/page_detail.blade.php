@extends('landing.layouts.app')
@section('title')
    {{ __('messages.page.page_detail') }}
@endsection
@php $styleCss = 'style'; @endphp
@section('content')
    <div class="col-md-12 ajax-message"></div>
    <section class="page-banner-wrap bg-cover"
    {{ $styleCss }}="background-image: url('{{ asset('front_landing/landing/img/event/1920-482.png') }}')">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-8">
                <div class="page-heading text-white">
                    <div class="sub-title">
                        <h4><strong>Our Mission:</strong> Food, Education, Medicine</h4>
                    </div>
                    <div class="page-title">
                        <h1>{{ $page->title }}</h1>
                    </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('events.index') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $page->title }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <section class="event-details-wrap section-padding">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-12 col-xl-12">
                    <div class="event-details-contents custom-event">
                        {!! nl2br($page->description) !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

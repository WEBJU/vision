@extends('landing.layouts.app')
@section('title')
    {{ __('messages.teams.teams') }}
@endsection
@php $styleCss = 'style'; @endphp
@section('content')
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
                        <h1>Our Team</h1>
                    </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('landing.home') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Our Team</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <section class="team-section section-padding">
        <div class="container">
            <div class="row">
                @foreach($teams as $team)
                    <div class="col-lg-4 col-xl-3 col-md-6 col-12">
                        <div class="single-team-member text-center">
                            <div class="member-img">
                                <img src="{{ !empty($team->image_url) ? $team->image_url : asset('assets/img/event/e1.jpg') }}"
                                     alt="" class="object-fit-cover">
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
            <div class="join-team-btn text-center mt-50">
                <a class="radius-four" href="{{ route('landing.contact') }}">Join With Us</a>
            </div>
        </div>
    </section>
@endsection

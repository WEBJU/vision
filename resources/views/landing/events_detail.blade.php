@extends('landing.layouts.app')
@section('title')
    Event Details
@endsection
@php $styleCss = 'style'; @endphp
@section('content')
    <div class="col-md-12 ajax-message"></div>
    <section class="page-banner-wrap bg-cover object-fit-cover"
    {{ $styleCss }}="background-image: url('{{ asset('front_landing/landing/img/event/1920-482.png') }}')">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-8">
                <div class="page-heading text-white">
                    <div class="sub-title">
                        <h4><strong>Our Mission:</strong> Food, Education, Medicine</h4>
                    </div>
                    <div class="page-title">
                        <h1>{{ $event->title }}</h1>
                    </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('landing.home')}}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Events Details</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <section class="event-details-wrap section-padding">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-12">
                    <div class="event-fetaured-thumb">
                        <img src="{{ !empty($event->image_url) ? $event->image_url : url('assets/img/event-details.jpg') }}"
                             alt="event details" width="1170" height="600" class="object-fit-cover radius-four">
                    </div>
                </div>
                <div class="col-12 col-lg-7 col-xl-8">
                    <div class="event-details-contents">
                        <p>{{ $event->description }}</p>
                    </div>
                </div>
                <div class="col-12 col-lg-5 col-xl-4">
                    <div class="event-details-sidebar ">
                        <div class="single-event-sidebar wow fadeInUp radius-four">
                            <div class="sidebar-title">
                                <h3>{{ $event->title }}</h3>
                            </div>

                            <div class="event-address-info">
                                <div class="single-address-info d-flex align-items-center">
                                    <div class="icon icon1">
                                        <i class="fal fa-map-marker-alt"></i>
                                    </div>
                                    <div class="address">
                                        <p>{{ $event->venue ? $event->venue : 'N/A' }}</p>
                                    </div>
                                </div>
                                <div class="single-address-info d-flex align-items-center">
                                    <div class="icon icon2">
                                        <a href="mailto::{{ $event->event_organizer_email }}"><i
                                                    class="fal fa-envelope"></i></a>
                                    </div>
                                    <div class="address">
                                        <p>{{ $event->event_organizer_email ? $event->event_organizer_email : 'N/A'}}</p>
                                    </div>
                                </div>
                                <div class="single-address-info d-flex align-items-center">
                                    <div class="icon icon3">
                                        <a href="tel:{{ $event->event_organizer_phone }}"><i
                                                    class="fal fa-phone phone-alt"></i></a>
                                    </div>

                                    <div class="address">
                                        <p>{{ $event->event_organizer_phone ? $event->event_organizer_phone : 'N/A' }}</p>
                                    </div>
                                </div>
                                <div class="single-address-info d-flex align-items-center">
                                    <div class="icon icon2" id="availableSeat">
                                        <p>  {{ $event->available_tickets }}</p>
                                    </div>
                                    <div class="address">
                                        <p>Available Seats </p>
                                    </div>
                                </div>
                                <button type="button" data-id="{{ $event->id }}" class="theme-btn minimal-btn bookSeatBtn mt-4" data-toggle="modal" data-target="#exampleModalLong">
                                    Book Your Seat
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('landing.book_seat')
    </section>
@endsection


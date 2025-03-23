@extends('landing.layouts.app')
@section('title')
    Events
@endsection
@php $styleCss = 'style'; @endphp
@section('content')
    <section class="page-banner-wrap bg-cover object-fit-cover"
    {{ $styleCss }}="background-image: url({{ asset('front_landing/landing/img/event/1920-482.png') }})">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-8">
                <div class="page-heading text-white">
                    <div class="sub-title">
                        <h4><strong>Our Mission:</strong> Food, Education, Medicine</h4>
                    </div>
                    <div class="page-title">
                        <h1>Upcoming Events</h1>
                    </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('landing.home') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">events</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <section class="upcoming-events-wrap section-padding custom-upcoming">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-12 text-center">
                    <div class="event-cat-filter mb-ms-20 mb-10">
                        @if(count($eventCategories) > 0)
                            <button data-filter="*" data-id="0" class="category_id active">All Categories</button>
                        @else
                            <p class="font-weight-bold">No Events available at this moment.</p>
                        @endif
                        
                        @foreach($eventCategories as $eventCategory)
                                @if($eventCategory->events_count > 0 && $eventCategory->is_active)
                            <button data-filter=".water" class="category_id"
                                    data-id="{{ $eventCategory->id }}">{{ $eventCategory->name }}</button>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
            @livewire('show-events')
        </div>
    </section>
@endsection


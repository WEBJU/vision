@extends('front_landing.layouts.app')

@section('title')
    {{ __('messages.programs.programs') }}
@endsection

@section('content')
    <div class="programs-page">
        <!-- start hero-section -->
        <section class="hero-section">
            <div class="inner-bgimg position-relative"
                 style="background: url('{{ $programsImg['menu_image'] ?? asset('front_landing/images/causes-hero-img.png') }}');">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-md-7 parallelogram-shape">
                            <div class="text-white inner-text position-relative">
                                <p class="fs-18 fw-5 mb-md-3 pb-lg-2 mb-2">
                                    {{ __('messages.front_landing.our_mission_food_education_medicine') }}
                                </p>
                                <h2 class="fs-1 mb-md-0 fw-6">{{ __('messages.programs.programs') }}</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end hero-section -->

        <!-- start programs-section -->
        <section class="programs-section mt-5 pb-100">
            <div class="container">
                <div class="row">
                    @foreach($programs as $program)
                        <div class="col-md-6 col-lg-4 mb-4">
                            <div class="card shadow-sm border-0">
                                <div class="card-body">
                                    <h5 class="card-title fw-bold">{{ $program->title }}</h5>
                                    <p class="fs-14 text-dark mb-2">
                                        {{ Str::limit($program->description, 100) }}
                                    </p>
                                    <a href="{{ route('landing.programs.show', $program->id) }}" class="btn btn-primary">
                                        {{ __('messages.programs.learn_more') }}
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!-- end programs-section -->
    </div>
@endsection

@extends('front_landing.layouts.app')
@section('title')
    {{__('messages.front_landing.causes')}}
@endsection
@section('content')
    <div class="our causes-page">
        <!-- start hero-section -->
        <section class="hero-section">
            <div class="inner-bgimg  position-relative"
                 style="background: url('{{ asset('front_landing/images/vision-13.jpg')}}');">
                <div class="container">
                    <div class="row ">
                        <div class="col-lg-6 col-md-7 parallelogram-shape">
                            <div class="text-white inner-text position-relative">
                                {{-- <p class="fs-18 fw-5 mb-md-3 pb-lg-2 mb-2">{{__('messages.front_landing.our_mission_food_education_medicine')}}</p> --}}
                                <h2 class="fs-1 mb-md-0 fw-6">Projects</h2>
                            </div>
                        </div>
                     
                    </div>
                </div>
            </div>
        </section>
        <!-- end hero-section -->

        <!-- start trending-causes-section -->
        <section class="trending-causes-section pt-100 pb-100">
            <div class="px-lg-5 px-md-2 ps-2 pe-2">
                <div class="row">
                    <div class="col-lg-4 col-md-12 col-xl-3 pt-5" >
                        <div class="news-right-section">
                            <div class="popular-tags bg-light rounded-10 position-relative ">
                                <div class="d-flex justify-content-between align-items-center mb-4 pb-lg-1">
                                    <h5 class="fs-20 fw-6 text-dark mb-0">{{ __('messages.front_landing.all_categories') }}</h5>
                                    <div class="rectangle-shape"></div>
                                </div>
                                <div class="tags">
                                    @if(count($projects) > 0 )
                                        <div class="tag me-2 mb-2">
                                            <a class="fs-16 text-dark fw-5  radius-four campaign_category_id">{{__('messages.front_landing.all')}}</a>
                                        </div>
                                    @else
                                        <p class="font-weight-bold">{{__('messages.front_landing.no_campaigns_available_at_this_moment')}}</p>
                                    @endif
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-9  col-lg-8 ">
                        @livewire('show-projects')
                    </div>
                </div>
            </div>
        </section>
        <!-- end trending-causes-section -->
    </div>
@endsection

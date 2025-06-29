@php
    $settings  = settings();
    $bannerImage = $galleryImg['menu_image'] ?? asset('front_landing/images/gallery-hero-img.png');
    $heroTitle = __('messages.gallery.gallery');
@endphp

@extends('front_landing.layouts.app')

@section('title')
    {{ __('messages.gallery.gallery') }}
@endsection

@section('content')
    <div class="gallery-page">
          <section class="hero-section">
            <div class="inner-bgimg  position-relative"
                 style="background: url('{{asset('front_landing/images/banner-2.jpeg')}}');">
                <div class="container">
                    <div class="row ">
                        <div class="col-lg-6 col-md-7 parallelogram-shape">
                            <div class="text-white inner-text position-relative">
                                {{-- <p class="fs-18 fw-5 mb-md-3 pb-lg-2 mb-2">{{__('messages.front_landing.our_mission_food_education_medicine')}}</p> --}}
                                <h2 class="fs-1 mb-md-0 fw-6">Photo Gallery</h2>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>

        <section class="gallery-section py-5">
            <div class="container">
              
                        <!--start time-counter-section -->
                        <div class="news-right-section gallery bg-light p-30 rounded-10 mb-20 position-relative">
                            <div class="d-flex justify-content-between align-items-center mb-4 pb-lg-1">
                                <h5 class="fs-20 fw-6 text-dark mb-0">Photo Gallery</h5>
                                {{-- <div class="rectangle-shape"></div> --}}
                            </div>
                            <div class="row">
                                {{-- Manually Add Image Media --}}
                                <div class="col-sm-4 col-6 mb-lg-4 mb-3">
                                    <div class="rounded-10">
                                        <img class="video-timg" src="{{ asset('front_landing/images/vision-1.jpg') }}" alt="Image 1">
                                    </div>
                                </div>
                                <div class="col-sm-4 col-6 mb-lg-4 mb-3">
                                    <div class="rounded-10">
                                        <img class="video-timg" src="{{ asset('front_landing/images/vision-2.jpg') }}" alt="Image 2">
                                    </div>
                                </div>
                                <div class="col-sm-4 col-6 mb-lg-4 mb-3">
                                    <div class=" rounded-10">
                                        <img class="video-timg" src="{{ asset('front_landing/images/vision-3.jpg') }}" alt="Image 3">
                                    </div>
                                </div>

                                {{-- Manually Add Video Link Media --}}
                                <div class="col-sm-4 col-6 mb-lg-4 mb-3">
                                    <a href="#" target="_blank" class=" rounded-10">
                                        <img class="video-timg" src="{{ asset('img/video-thumbnail.png') }}" alt="Video Thumbnail">
                                    </a>
                                </div>
                                 <div class="col-sm-4 col-6 mb-lg-4 mb-3">
                                    <div class=" rounded-10">
                                        <img class="video-timg" src="{{ asset('front_landing/images/vision-4.jpg') }}" alt="Image 1">
                                    </div>
                                </div>
                                <div class="col-sm-4 col-6 mb-lg-4 mb-3">
                                    <div class=" rounded-10">
                                        <img class="video-timg" src="{{ asset('front_landing/images/vision-5.jpg') }}" alt="Image 2">
                                    </div>
                                </div>
                                <div class="col-sm-4 col-6 mb-lg-4 mb-3">
                                    <div class=" rounded-10">
                                        <img class="video-timg" src="{{ asset('front_landing/images/vision-6.jpg') }}" alt="Image 3">
                                    </div>
                                </div>

                                {{-- Manually Add Video Link Media --}}
                                <div class="col-sm-4 col-6 mb-lg-4 mb-3">
                                    <a href="#" target="_blank" class=" rounded-10">
                                        <img class="video-timg" src="{{ asset('img/video-thumbnail.png') }}" alt="Video Thumbnail">
                                    </a>
                                </div>
                                 <div class="col-sm-4 col-6 mb-lg-4 mb-3">
                                    <div class=" rounded-10">
                                        <img class="video-timg" src="{{ asset('front_landing/images/vision-7.jpg') }}" alt="Image 1">
                                    </div>
                                </div>
                                <div class="col-sm-4 col-6 mb-lg-4 mb-3">
                                    <div class=" rounded-10">
                                        <img class="video-timg" src="{{ asset('front_landing/images/vision-8.jpg') }}" alt="Image 2">
                                    </div>
                                </div>
                                <div class="col-sm-4 col-6 mb-lg-4 mb-3">
                                    <div class=" rounded-10">
                                        <img class="video-timg" src="{{ asset('front_landing/images/vision-9.jpg') }}" alt="Image 3">
                                    </div>
                                </div>

                             
                                 <div class="col-sm-4 col-6 mb-lg-4 mb-3">
                                    <div class=" rounded-10">
                                        <img class="video-timg" src="{{ asset('front_landing/images/vision-10.jpg') }}" alt="Image 1">
                                    </div>
                                </div>
                                <div class="col-sm-4 col-6 mb-lg-4 mb-3">
                                    <div class=" rounded-10">
                                        <img class="video-timg" src="{{ asset('front_landing/images/vision-11.jpg') }}" alt="Image 2">
                                    </div>
                                </div>
                                <div class="col-sm-4 col-6 mb-lg-4 mb-3">
                                    <div class=" rounded-10">
                                        <img class="video-timg" src="{{ asset('front_landing/images/vision-12.jpg') }}" alt="Image 3">
                                    </div>
                                </div>
                                 <div class="col-sm-4 col-6 mb-lg-4 mb-3">
                                    <div class=" rounded-10">
                                        <img class="video-timg" src="{{ asset('front_landing/images/vision-13.jpg') }}" alt="Image 1">
                                    </div>
                                </div>
                                <div class="col-sm-4 col-6 mb-lg-4 mb-3">
                                    <div class=" rounded-10">
                                        <img class="video-timg" src="{{ asset('front_landing/images/vision-14.jpg') }}" alt="Image 2">
                                    </div>
                                </div>
                                <div class="col-sm-4 col-6 mb-lg-4 mb-3">
                                    <div class=" rounded-10">
                                        <img class="video-timg" src="{{ asset('front_landing/images/vision-15.jpg') }}" alt="Image 3">
                                    </div>
                                </div>
                                <div class="col-sm-4 col-6 mb-lg-4 mb-3">
                                    <div class=" rounded-10">
                                        <img class="video-timg" src="{{ asset('front_landing/images/vision-16.jpg') }}" alt="Image 3">
                                    </div>
                                </div>
                                
                            </div>

                            {{-- Modal for viewing images/videos --}}
                            <div class="modal">
                                <span class="close">&times;</span>
                                <span class="previous">&#8249;</span>
                                <span class="next">&#8250;</span>
                                <img class="modal-content" src="" alt="Media Preview">
                            </div>
                        </div>

                       
                 
            </div>
        </section>
    </div>
@endsection

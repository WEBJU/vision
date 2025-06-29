@php
    $settings  = settings();
@endphp
@extends('front_landing.layouts.app')
@section('title')
    {{__('messages.contact_us.contact_us')}}
@endsection
@section('content')
    <div class="Contact-page">
        <!-- start hero-section -->
        <section class="hero-section">
            <div class="inner-bgimg  position-relative"
                 style="background: url('{{ asset('front_landing/images/vision-14.jpg')}}');">
                <div class="container">
                    <div class="row ">
                        <div class="col-lg-6 col-md-7 parallelogram-shape">
                            <div class="text-white inner-text position-relative">
                                {{-- <p class="fs-18 fw-5 mb-md-3 pb-lg-2 mb-2">{{ $contactUs['menu_title'] }}</p> --}}
                                <h2 class="fs-1 mb-md-0 fw-6">{{__('messages.contact_us.contact_us')}}</h2>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
        <!-- end hero-section -->

        <!-- start contact-section -->
        <section class="contact-section pt-100 pb-100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6 mb-lg-0 mb-sm-5 mb-4">
                        <div class="d-flex align-items-center bg-light rounded-10 p-30 h-100">
                            <div class="icon me-4 ps-xl-3">
                                <i class="fa-solid fa-envelope text-danger"></i>
                            </div>
                            <div class="desc ms-xl-3 pe-xl-3">
                                <h4 class="fs-20 fw-6 text-danger">{{__('messages.front_landing.email_address')}}</h4>
                                <a href="mailto:{{ $settings['email'] }}" class="text-gray fs-16 fw-5">
                                    <span class="text-dark">{{ $settings['email'] }}</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mb-lg-0 mb-sm-5 mb-4">
                        <div class="d-flex  align-items-center bg-light rounded-10 p-30 h-100">
                            <div class="icon me-4 ps-xl-3">
                                <i class="fa-solid fa-phone text-danger"></i>
                            </div>
                            <div class="desc ms-xl-3 pe-xl-3">
                                <h4 class="fs-20 fw-6 text-danger">{{__('messages.profile.phone_number')}}</h4>
                                <a href="tel:+{{ $settings['phone'] }}"
                                   class="text-dark fs-16 fw-5">{{ $settings['phone'] }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 ">
                        <div class="d-flex  align-items-center bg-light rounded-10 p-30 h-100">
                            <div class="icon me-4 ps-xl-3">
                                <i class="fa-solid fa-location-dot text-danger"></i>
                            </div>
                            <div class="desc ms-xl-3 pe-xl-3">
                                <h4 class="fs-20 fw-6 text-danger">{{__('messages.front_landing.office_address')}}</h4>
                                <a href="#!" class="text-dark fs-16 fw-5">{{ $settings['address'] }}</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="contact-form pt-60 pb-60">
                    <div class="text-center text-dark pb-20">
                            <h1>{{__('messages.front_landing.get_in_touch')}}</h1>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 mb-lg-0 mb-5">
                            <div id="map" class="map ">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3988.6792842243076!2d36.9366141!3d-1.3691157!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x182f1dbe48e9bb6d%3A0xa69fe6cb0b8cb0!2sVISION%20CHANGERS%20KENYA!5e0!3m2!1sen!2ske!4v1747037339897!5m2!1sen!2ske" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="w-100 h-100 object-fit-cover rounded-10 border-0" ></iframe>
                               
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <form id="getInTouchForm" class="row conact-form" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6 mb-3 pb-1">
                                        <input type="text" id="name" name="name" class="form-control fs-14 text-dark"
                                               placeholder="{{(__('messages.front_landing.enter_first_name'))}} *"
                                               required>
                                    </div>
                                    <div class="col-lg-6 mb-3 pb-1">
                                        <input type="text" id="email" name="email" class="form-control fs-14 text-dark"
                                               placeholder="{{(__('messages.front_landing.enter_email_address'))}} *"
                                               required>
                                    </div>
                                    <div class="col-lg-6 mb-3 pb-1">
                                        <input type="tel" id="phone" class="form-control fs-14 text-dark" name="phone"
                                               onkeyup='if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,"")'
                                               placeholder="{{(__('messages.front_landing.enter_phone_number'))}} *"
                                               required>
                                    </div>
                                    <div class="col-lg-6 mb-3 pb-1">
                                        <input type="text" id="subject" name="subject"
                                               class="form-control fs-14 text-dark"
                                               placeholder="{{(__('messages.front_landing.enter_subject'))}} *"
                                               required>
                                    </div>
                                    <div class="col-12 mb-4 pb-2">
                                        <textarea class="form-control fs-14 text-dark" id="message" name="message"
                                                  rows="4"
                                                  placeholder="{{(__('messages.front_landing.enter_message'))}} *"
                                                  required></textarea>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-danger me-3"
                                                id="getInTouchSaveBtn">{{__('messages.front_landing.get_a_quote')}}
                                        </button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- end contact-section -->

    </div>
@endsection

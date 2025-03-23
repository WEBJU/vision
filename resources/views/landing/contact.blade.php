@php
    $settings  = settings();
@endphp
@extends('landing.layouts.app')
@section('title')
    Contact Us
@endsection
@php $styleCss = 'style'; @endphp
@section('content')
    <section class="page-banner-wrap bg-cover object-fit-cover"
    {{ $styleCss }}="background-image: url('{{ $contactUs['menu_image'] }}')">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-8">
                <div class="page-heading text-white">
                    <div class="sub-title">
                        <h4>{{ $contactUs['menu_title'] }}</h4>
                    </div>
                    <div class="page-title">
                        <h1>Contact Us</h1>
                    </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('landing.home') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">contact</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <section class="contact-page-wrap section-padding">
        <div class="container">
            <div class="row pb-4">
                <div class="col-lg-4 col-md-6 col-12 mb-4">
                    <div class="single-contact-card card1 h-100">
                        <div class="top-part d-flex flex-column align-items-center">
                            <div class="icon mr-0 mb-2">
                                <i class="fal fa-envelope"></i>
                            </div>
                            <div class="title">
                                <h4 class="text-center">Email Address</h4>
                                <span class="text-center">Sent mail asap anytime</span>
                            </div>
                        </div>
                        <div class="bottom-part d-flex flex-column align-items-center">
                            <div class="info mb-2">
                                <a href="mailto:{{ $settings['email'] }}"><p>{{ $settings['email'] }}</p></a>
                            </div>
                            <div class="icon ml-0">
                                <i class="fal fa-arrow-right"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12 mb-4">
                    <div class="single-contact-card card2 h-100">
                        <div class="top-part d-flex flex-column align-items-center">
                            <div class="icon mr-0 mb-2">
                                <i class="fal fa-phone"></i>
                            </div>
                            <div class="title">
                                <h4 class="text-center">Phone Number</h4>
                                <span class="text-center">call us asap anytime</span>
                            </div>
                        </div>
                        <div class="bottom-part d-flex flex-column align-items-center">
                            <div class="info mb-2">
                                <a href="tel:+{{ $settings['phone'] }}"><p>{{ $settings['phone'] }}</p></a>
                            </div>
                            <div class="icon ml-0">
                                <i class="fal fa-arrow-right"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12 mb-4">
                    <div class="single-contact-card card3 h-100">
                        <div class="top-part d-flex flex-column align-items-center">
                            <div class="icon mr-0 mb-2">
                                <i class="fal fa-map-marker-alt"></i>
                            </div>
                            <div class="title">
                                <h4 class="text-center">Office Address</h4>
                                <span class="text-center">Sent mail asap anytime</span>
                            </div>
                        </div>
                        <div class="bottom-part d-flex flex-column align-items-center">
                            <div class="info mb-2">
                                <p class="text-center">{{ $settings['address'] }}</p>
                            </div>
                            <div class="icon ml-0">
                                <i class="fal fa-arrow-right"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-lg-12">
                    <div class="contact-map-wrap">
                        <div id="map">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5457.875323165521!2d144.90402300269133!3d-37.792722838344716!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad646b5d2ba4df7%3A0x4045675218ccd90!2sMelbourne%20VIC%2C%20Australia!5e0!3m2!1sen!2sbd!4v1612018663424!5m2!1sen!2sbd"
                                    frameborder="0" {{ $styleCss }}="border:0; width:100%" allowfullscreen=""
                            aria-hidden="false" tabindex="0"></iframe>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row section-padding pb-0">
                <div class="col-12 text-center mb-20">
                    <div class="section-title">
                        <span><i class="fal fa-pen"></i>Write Here</span>
                        <h1>Get In Touch</h1>
                    </div>
                </div>
                <div class="col-12 col-lg-12">
                    <div class="contact-form">
                        <form id="getInTouchForm" class="row conact-form" method="post">
                            @csrf
                            <div class="col-md-12 ajax-message"></div>
                            <div class="col-md-6 col-12">
                                <div class="single-personal-info">
                                    <label for="name" class="required">Full Name</label>
                                    <input type="text" id="name" class="radius-four" placeholder="Enter Name"
                                           name="name">
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="single-personal-info">
                                    <label for="email" class="required">Email Address</label>
                                    <input type="email" id="email" class="radius-four" placeholder="Enter Email Address"
                                           name="email">
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="single-personal-info">
                                    <label for="phone" class="required">Phone Number</label>
                                    <input type="tel" id="phone" class="radius-four" placeholder="Enter Number"
                                           name="phone"
                                           onkeyup='if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,"")'>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="single-personal-info">
                                    <label for="subject" class="required">Subject</label>
                                    <input type="text" id="subject" class="radius-four" placeholder="Enter Subject"
                                           name="subject">
                                </div>
                            </div>
                            <div class="col-md-12 col-12">
                                <div class="single-personal-info">
                                    <label for="message" class="required">Enter Message</label>
                                    <textarea id="message" class="radius-four" placeholder="Enter Message"
                                              name="message"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12 col-12 text-center">
                                <button class="submit-btn radius-four" id="getInTouchSaveBtn">Get A Quote</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

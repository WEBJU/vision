@extends('landing.layouts.app')
@section('title')
    {{ __('messages.page.cause_details') }}
@endsection
@php $styleCss = 'style'; @endphp
@section('content')
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
                        <h1>Payment</h1>
                    </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('landing.home') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Cause Details</li>
                            
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <section class="section-padding payment-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="donation_wrapper">
                        {{-- <div class="btn-wrapper">
                            <a href="{{route('landing.campaign.details',$campaign->slug)}}"
                               class="goback-btn">Go Back</a>
                        </div> --}}
                        <div class="single_amount_wrapper d-flex align-items-center flex-wrap give-donation-amount donate-amount-buttons">
                            @if($campaign->currency != 'inr')
                                <span class="single_amount currency prefilled-amount" name="donateamount" value="20.00">20</span>
                            @endif
                            <span class="single_amount currency prefilled-amount" name="donateamount"
                                  value="40.00">40</span>
                            <span class="single_amount currency prefilled-amount" name="donateamount"
                                  value="60.00">60</span>
                            <span class="single_amount currency prefilled-amount" name="donateamount"
                                  value="80.00">80</span>
                            <span class="single_amount currency prefilled-amount" name="donateamount"
                                  value="100.00">100</span>
                            <span class="single_amount currency prefilled-amount" name="donateamount"
                                  value="120.00">120</span>
                        </div>

                        @if($campaign->goal)
                            {{ Form::open(['id'=>'campaignDonationForm' , 'class'=>'give-form mt-3']) }}
                            <input type="hidden" name="campaign_id" id="campaignId" value="{{$campaign->id}}">
                            <input type="hidden" name="user_id" id="userId"
                                   value="{{getLogInUser() ? getLogInUserId() : null}}">
                            <input type="hidden" name="currency_code" id="currencyCode"
                                   value="{{$campaign->currency}}">
                            <input type="hidden" name="stripe_key" id="stripeKey"
                                   value="{{ getSettingValue('stripe_key') }}">

                            <div class="input-group mb-3 amount-container">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"
                                          id="basic-addon1">{{ getCurrencySymbol($campaign->currency) }}</span>
                                </div>
                                <input type="text"
                                       class="form-control give-final-total-amount pl-1 custom-final-amount price donation_amount text-dark"
                                       placeholder="Amount" aria-label="Username"
                                       name="amount" id="amount"
                                       aria-describedby="basic-addon1"
                                       value="{{ $campaign->amount_prefilled }}" required
                                       onkeyup='if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,"")'>
                            </div>
                            <div class="form-group mt-2 ">
                                <div class="label text-dark required">{{__('messages.payment.first_name').' '.(':')}}</div>
                                <input type="text" name="first_name" placeholder="{{__('messages.payment.first_name')}}"
                                       id="firstName"
                                       value="{{ getLogInUser() ? getLogInUser()->first_name : '' }}"
                                       class="form-control ">
                            </div>
                            <div class="form-group mt-2 ">
                                <div class="label text-dark required">{{__('messages.payment.last_name').' '.(':')}}</div>
                                <input type="text" name="last_name" placeholder="{{__('messages.payment.last_name')}}"
                                       id="lastName"
                                       value="{{ getLogInUser() ? getLogInUser()->last_name : '' }}"
                                       class="form-control ">
                            </div>
                            <div class="form-group">
                                <div class="label text-dark">{{__('messages.payment.email').' '.(':')}}</div>
                                <input type="text"
                                       aria-describedby="emailHelp"
                                       placeholder="{{__('messages.payment.email')}}"
                                       id="email"
                                       value="{{ getLogInUser() ? getLogInUser()->email : '' }}" class="form-control">
                            </div>
                            <input type="hidden" name="admin_tip" value="2">
                            <div class="payment-gateway-wrapper mt-4">
                                <input type="hidden" name="selected_payment_gateway"
                                       value="paypal">
                                <ul>
                                    <li data-gateway="paypal" class="selected">
                                        <div class="img-select">
                                            <div class="form-group d-flex">
                                                @if(getSettingValue('stripe_enable') == 1)
                                                    <label
                                                            class="form-check-label radius-four position-relative d-flex align-items-center mr-3"
                                                            for="paymentStripe">
                                                        <img
                                                                src="{{asset('img/stripe-logo.png')}}"
                                                                alt="" class="payment-image">
                                                        <div class="form-check">
                                                            <input class="form-check-input img-cheacked  payment-method"
                                                                   type="radio"
                                                                   name="payment_method" id="paymentStripe"
                                                                   value="{{ \App\Models\CampaignDonationTransaction::STRIPE }}"
                                                                   checked>
                                                        </div>
                                                    </label>
                                                @endif
                                                @if($campaign->currency != 'inr' && getSettingValue('paypal_enable') == 1)
                                                    <label
                                                            class="form-check-label radius-four position-relative mr-3 d-flex align-items-center"
                                                            for="paymentPaypal">
                                                        <img
                                                                src="{{asset('img/paypal-logo.png')}}"
                                                                alt="" class="payment-image">
                                                        <div class="form-check">
                                                            <input class="form-check-input img-cheacked payment-method"
                                                                   type="radio"
                                                                   name="payment_method" id="paymentPaypal"
                                                                   value="{{ \App\Models\CampaignDonationTransaction::PAYPAL }}">
                                                        </div>
                                                    </label>
                                                @endif
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="donate-seperate-page-button stripePayment">
                                <div class="btn-wrapper">
                                    <button type="button"
                                            class="boxed-btn reverse-color btn mt-4 text-white donate-btn paymentByStripe">{{__('messages.payment.donate_now')}}
                                    </button>
                                </div>
                            </div>
                            <div class="donate-seperate-page-button d-none paypalPayment">
                                <div class="btn-wrapper">
                                    <button type="button"
                                            class="boxed-btn reverse-color btn mt-4 text-white donate-btn paymentByPaypal">{{__('messages.payment.donate_now')}}
                                    </button>
                                </div>
                            </div>
                            {{ Form::close() }}
                        @endif
                    </div>
                </div>
                <div class="col-lg-4 mt-lg-0 mt-4">
                    <div class="donation-amount-details-wrapper">
                        <h3 class="title">Your Donation Details</h3>
                        <div class="your-area-donation-wrap">
                            <div class="thumb">
                                <img
                                        src="{{ $campaign->image }}"
                                        alt="" width="80" height="80" class="radius-four">
                            </div>
                            <div class="content">
                                <h4 class="title"><a
                                            href="{{route('landing.campaign.details',$campaign->slug)}}">{{ Str::limit($campaign->title,50) }}</a>
                                </h4>
                                <span class="created_by">Created by {{$campaign->user->first_name.' '.$campaign->user->last_name}}</span>
                            </div>
                        </div>
                        <ul>
                            <li class="d-flex justify-content-between">
                                <span class="text-dark">Your Donation : </span>
                                <div class="d-flex">
                                    <span>{{ getCurrencySymbol($campaign->currency) }}</span>
                                    <span class="give-final-total-amount pl-1 custom-final-amount price donation_amount text-dark"
                                          id="yourAmount">
                                        {{ $campaign->amount_prefilled }}</span>
                                </div>
                            </li>
                            <li class="d-flex justify-content-between">

                            </li>
                            
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

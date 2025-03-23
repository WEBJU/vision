@extends('front_landing.layouts.app')
@section('title')
    {{ __('Donate') }}
@endsection
@section('content')
    <div class="payment-page">
        <!-- start hero-section -->
        <section class="hero-section">
            <div class="inner-bgimg  position-relative"
                 style="background: url('{{asset('front_landing/images/causes-hero-img.png')}}');">
                <div class="container">
                    <div class="row ">
                        <div class="col-lg-6 col-md-7 parallelogram-shape">
                            <div class="text-white inner-text position-relative">
                                <p class="fs-18 fw-5 mb-md-3 pb-lg-2 mb-2">{{__('messages.front_landing.our_mission_food_education_medicine')}}</p>
                                <h2 class="fs-1 mb-md-0 fw-6">{{ __('messages.front_landing.payment') }}</h2>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
        <!-- end hero-section -->

        <!-- start payment-section -->
        <section class="payment-section pt-100">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6">
                        <!-- start payment-left-section -->
                        <div class="payment-left-section pb-100">
                          
                                {{ Form::open(['id'=>'campaignDonationForm' , 'class'=>'give-form mt-3' , 'autocomplete' => 'off']) }}
                                @if(empty($donationAsGiftDetails))
                                <div class="tags d-flex flex-wrap pb-1 give-donation-amount donate-amount-buttons">
                                   
                                        <div class="tag bg-light rounded-10  mb-3">
                                            <span class="single_amount currency prefilled-amount">40</span>
                                        </div>
                                        <div class="tag bg-light rounded-10  mb-3 ">
                                            <span class="single_amount currency prefilled-amount">60</span>
                                        </div>
                                        <div class="tag bg-light rounded-10  mb-3 ">
                                            <span class="single_amount currency prefilled-amount">80</span>
                                        </div>
                                        <div class="tag bg-light rounded-10  mb-3 ">
                                            <span class="single_amount currency prefilled-amount">100</span>
                                        </div>
                                        <div class="tag bg-light rounded-10  mb-3 ">
                                            <span class="single_amount currency prefilled-amount">120</span>
                                        </div>
                                </div>
                                @endif

                                <input type="hidden" name="user_id" id="userId"
                                       value="{{getLogInUser() ? getLogInUserId() : null}}">
                                <input type="hidden" name="currency_code" id="currencyCode"
                                       value="$">
                                <input type="hidden" name="stripe_key" id="stripeKey"
                                       value="{{ getSettingValue('stripe_key') }}">

                                <div class="row">
                                    
                                    
                                        <div class="col-12 input-group mb-3 pb-1">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">$</span>
                                            </div>
                                            <input type="text"
                                                   class="form-control give-final-total-amount pl-1 custom-final-amount price donation_amount text-dark fillAmount"
                                                   placeholder="Amount"
                                                   aria-label="Username"
                                                   name="amount" id="amount"
                                                   aria-describedby="basic-addon1"
                                                   value="5" required
                                                   onkeyup='if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,"")'>
                                        </div>
                                  
                                    <div class="col-lg-6 mb-3 pb-1">
                                        <input type="text" name="first_name" class="form-control fs-14 text-dark"
                                               id="firstName"
                                               value="{{ getLogInUser() ? getLogInUser()->first_name : '' }}"
                                               placeholder="{{__('messages.user.first_name')}} *" required>
                                    </div>
                                    <div class="col-lg-6 mb-3 pb-1">
                                        <input type="text" name="last_name" class="form-control fs-14 text-dark"
                                               id="lastName"
                                               value="{{ getLogInUser() ? getLogInUser()->last_name : '' }}"
                                               class="form-control"
                                               placeholder="{{__('messages.user.last_name')}} *" required>
                                    </div>
                                    <div class="col-12 mb-3 pb-1">
                                        <input type="email" class="form-control fs-14 text-dark"
                                               aria-describedby="emailHelp"
                                               id="email"
                                               value="{{ getLogInUser() ? getLogInUser()->email : '' }}"
                                               placeholder="{{__('messages.common.email')}}">
                                    </div>
                                    <input type="hidden" name="admin_tip" value="2">
                                        @if(getSettingValue('stripe_enable') == 1 || getSettingValue('paypal_enable') == 1)
                                    <div class="col-12 mb-4 pb-2">
                                        <input type="hidden" name="selected_payment_gateway"
                                               value="paypal">
                                        <div class="radio-button rounded-10 d-flex flex-wrap align-items-center pt-3 px-4">
                                            @if(getSettingValue('stripe_enable') == 1)
                                                <div class="form-check me-lg-5 me-4 my-1 pb-3">
                                                    <input class="form-check-input me-2 payment-method checkPaymentType" type="radio"
                                                           name="payment_method" id="paymentStripe"
                                                           value="{{ \App\Models\CampaignDonationTransaction::STRIPE }}"
                                                           checked>
                                                    <label class="form-check-label" for="paymentStripe">
                                                        <img src="{{asset('front_landing/images/stripe.png')}}"
                                                             class="w-100 h-100 object-fit-cover">
                                                    </label>
                                                </div>
                                            @endif
                                            @if(getSettingValue('paypal_enable') == 1)
                                                <div class="form-check  my-1 pb-3">
                                                    <input class="form-check-input me-3 payment-method checkPaymentType"
                                                           type="radio"
                                                           name="payment_method" id="paymentPaypal"
                                                           value="{{ \App\Models\CampaignDonationTransaction::PAYPAL }}">
                                                    <label class="form-check-label" for="paymentPaypal">
                                                        <img src="{{asset('front_landing/images/paypal.png')}}"
                                                             class="w-100 h-100 object-fit-cover">
                                                    </label>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                        @endif
                                    <div class="col-12 mb-4 pb-2">
                                        <input type="checkbox" class="form-check-input" id="donateAnonymously" name="donateAnonymously" value="1" checked>
                                        <label>{{ __('Donate Anonymously') }}</label>
                                    </div>
                                   

                                    <div class="form-button donate-seperate-page-button stripePayment">
                                        <button type="button"
                                                class="btn btn-danger me-3 donate-btn paymentByStripe">{{__('messages.payment.donate_now')}}</button>
                                        <a href="{{route('landing.payment')}}"
                                           class="btn btn-gray">{{__('messages.front_landing.go_back')}}</a>
                                    </div>

                                    <div class="form-button donate-seperate-page-button d-none paypalPayment">
                                        <button type="button"
                                                class="btn btn-danger me-3 donate-btn paymentByPaypal">{{__('messages.payment.donate_now')}}</button>
                                        <a href="{{route('landing.payment')}}"
                                           class="btn btn-gray">{{__('messages.front_landing.go_back')}}</a>
                                    </div>
                                </div>
                                {{ Form::close() }}

                        </div>
                        <!-- end payment-left-section -->
                    </div>
                    <div class="col-xl-6" >
                        <!-- start payment-right-section -->
                        <div class="pb-100">
                            <div class="about-section bg-light p-30 rounded-10 position-relative mb-20">
                                <div class="d-flex flex-wrap justify-content-between align-items-center mb-4 pb-lg-1">
                                    <h5 class="fs-20 fw-6 text-dark mb-0 me-4"><span class="text-primary"> Donate Via MPESA</span> </h5>
                                    <div class="rectangle-shape"></div>
                                    <main class="container py-4">
                                        <ol class="list-group list-group-numbered">
                                          <li class="list-group-item bg-light border-0 shadow-sm">Go to M-PESA on your phone</li>                                    
                                          <li class="list-group-item bg-light border-0 shadow-sm">Select Pay Bill option</li>
                                          <li class="list-group-item bg-light border-0 shadow-sm">Enter Business no. <span class="text-primary"> 880100 <span></li>
                                          <li class="list-group-item bg-light border-0 shadow-sm">Enter Account no: <span class="text-primary">4291340025<span></li>
                                          <li class="list-group-item bg-light border-0 shadow-sm">Enter the Amount to donate</li>
                                          <li class="list-group-item bg-light border-0 shadow-sm">Enter your M-PESA PIN and Send You will receive a confirmation SMS from MPESA</li>
                                          
                                        </ol>
                                      </main>
                                      
                                </div>
                                <div class="d-flex mb-4">
                                    
                                </div>
                                   
                                
                                  
                            </div>
                        
                           
                        </div>
                        <!-- end payment-right-section -->
                    </div>
                    {{-- @else
                        <h5 align="center">{{__('messages.front_landing.the_goal_amount_should_be_greater_than_0')}}</h5>
                    @endif --}}

                </div>
            </div>
        </section>
        <!-- end payment-section -->
    </div>
@endsection

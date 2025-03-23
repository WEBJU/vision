@extends('landing.layouts.app')
@section('title')
    Campaign Details
@endsection
@php $styleCss = 'style'; @endphp
@section('content')
    <section class="page-banner-wrap bg-cover"
    {{ $styleCss }}="background-image: url('{{ $contactUs['menu_image'] }}')">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-8">
                <div class="page-heading text-white">
                    <div class="sub-title">
                        <h4><strong>Our Mission:</strong> Food, Education, Medicine</h4>
                    </div>
                    <div class="page-title">
                        <h1>Cause Details</h1>
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

    <div class="container mt-4 alert">
        @include('flash::message')
    </div>

    <section class="cause-contents-wrapper section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-12">
                    <div class="cause-details-wrapper">
                        <div class="featured-thumb">
                            <img src="{{ $campaign->image }}" alt="" width="820px" height="470px"
                                 class="object-fit-cover radius-four">
                        </div>
                        <div class="patient-cause-detail d-flex">
                            <img src="{{ $campaign->image }}" class="user-image radius-four" width="50" height="50">
                            <div class="ml-3">
                                <h4 class="mb-2">{{ Str::limit($campaign->title,70) }}</h4>
                                <div class="d-flex align-items-center">
                                    <span class="tag-icon d-flex align-items-center">
                                        <i class="fas fa-tag mr-2"></i>
                                        <span class="text-muted">{{ $campaign->campaignCategory->name }}</span>
                                    </span>
                                    <span class="tag-icon d-flex align-items-center ml-3">
                                        <i class="fal fa-calendar-alt mr-2 ml-1"></i>
                                        <span class="text-muted">Start Date : {{ \Carbon\Carbon::parse($campaign->start_date )->isoFormat('Do MMMM YYYY')}}</span>
                                    </span>
                                    <span class="tag-icon d-flex align-items-center ml-3">
                                        <i class="fal fa-calendar-alt ml-1 mr-2"></i>
                                        <span class="text-muted"> End Date : {{ \Carbon\Carbon::parse($campaign->deadline )->isoFormat('Do MMMM YYYY')}}</span>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="tabs-data mt-5">
                            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                <li class="nav-item mr-sm-3 mr-2">
                                    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home"
                                       role="tab" aria-controls="pills-home" aria-selected="true"> Description </a>
                                </li>
                                @if(count($campaignFaqs->campaignFaqs) > 0)
                                    <li class="nav-item mr-sm-3 mr-2">
                                        <a class="nav-link" id="pills-profile-tab" data-toggle="pill"
                                           href="#pills-profile"
                                           role="tab" aria-controls="pills-profile" aria-selected="false"> FAQ </a>
                                    </li>
                                @endif
                                @if(count($campaignUpdates->campaignUpdates ) > 0)
                                    <li class="nav-item mr-sm-3 mr-2">
                                        <a class="nav-link" id="pills-contact-tab" data-toggle="pill"
                                           href="#pills-contact"
                                           role="tab" aria-controls="pills-contact" aria-selected="false"> Updates </a>
                                    </li>
                                @endif
                            </ul>
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                                     aria-labelledby="pills-home-tab">
                                    <p class="mt-2">
                                        {!! $campaign->short_description !!}
                                    </p>
                                    <div class="causes-contents campaign-border">
                                        <div class="row mb-3">
                                            {!! $campaign->description !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                                     aria-labelledby="pills-profile-tab">
                                    <h4 class="my-4">General Question</h4>
                                    <div class="accordion" id="accordionExample">
                                        @foreach($campaignFaqs->campaignFaqs as $campaignFaq)
                                            <div class="card border-0 mb-3">
                                                <div class="card-header" id="description{{$campaignFaq->id}}">
                                                    <h2 class="mb-0 d-flex align-items-center">
                                                        <button class="btn btn-link collapsed text-left w-100"
                                                                type="button" data-toggle="collapse"
                                                                data-target="#collapse{{$campaignFaq->id}}"
                                                                aria-expanded="false"
                                                                aria-controls="collapse{{$campaignFaq->id}}">
                                                            {{$campaignFaq->title}}
                                                        </button>
                                                        <i class="fas fa-angle-down fs-5 down-arrow-icon"></i>
                                                    </h2>
                                                </div>
                                                <div id="collapse{{$campaignFaq->id}}" class="collapse"
                                                     aria-labelledby="description{{$campaignFaq->id}}"
                                                     data-parent="#accordionExample">
                                                    <div class="card-body">
                                                        {{$campaignFaq->description}}
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="pills-contact" role="tabpanel"
                                     aria-labelledby="pills-contact-tab">
                                    <h4 class="my-4">Updates ({{count($campaignUpdates->campaignUpdates)}})</h4>
                                    <div class="updates-section">
                                        @foreach($campaignUpdates->campaignUpdates as $campaignUpdate)
                                            <div class="d-flex mb-4">
                                                <div>
                                                    <h5 class="title">{{$campaignUpdate->title}}</h5>
                                                    <p>{{$campaignUpdate->description}}</p>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if(count($campaign->campaignCategory->campaigns) > 2)
                            <div class="related-cause-card border-top mt-5">
                                <h3 class="py-4">Related Causes</h3>
                                <div class="row">
                                    @foreach($campaign->campaignCategory->campaigns as $relatedCampaign)
                                        @if($relatedCampaign->id != $campaign->id && $relatedCampaign->status == \App\Models\Campaign::STATUS_ACTIVE && !campaignEnd($relatedCampaign->id))
                                            <div class="col-md-6 grid-item medicine">
                                                <div class="single-cause-item style-1 position-relative">
                                                    <div class="cause-bg bg-cover object-fit-cover"
                                                    {{ $styleCss }}="
                                                    background-image: url('{{ $relatedCampaign->image }}
                                                    '); border-radius: 4px;"></div>
                                                <div class="cause-content">
                                                    <div class="cause-meta">
                                                        <a href="{{route('landing.causes',$relatedCampaign->campaignCategory->id)}}"
                                                           class="cause-cat cause-cat-top campaign_category custom-causes-category radius-four custom-cause-cat-two m-0 {{ $relatedCampaign->is_emergency == 1 ? 'custom-cause-red' : ''}}"
                                                           data-id="{{ $relatedCampaign->campaignCategory->id }}">{{ $relatedCampaign->campaignCategory->name}}</a>
                                                        <a class="cause-author" {{ $styleCss }}="cursor:default"><i
                                                                class="fal fa-user"></i>By {{ $relatedCampaign->user->full_name }}
                                                        </a>
                                                    </div>
                                                    <h4>
                                                        <a href="{{ route('landing.campaign.details',$relatedCampaign->slug) }}">{{ Str::limit($relatedCampaign->title,50) }}</a>
                                                    </h4>
                                                    <div class="goal-progress-wrap mt-sm-4 mt-0">
                                                        <div class="progress">
                                                            <div class="progress-bar wow fadeInLeft"
                                                                 role="progressbar"
                                                            {{ $styleCss }}="
                                                            width:{{getRaisedAmountPercentage($relatedCampaign->campaignDonations->sum('donated_amount'),$relatedCampaign->goal)}}
                                                            %"></div>
                                                    </div>
                                                </div>
                                                <div class="cause-amount d-flex justify-content-between">
                                                    <div class="price-raised">
                                                        <i class="fal fa-heart"></i><span>{{getRaisedAmountPercentage($relatedCampaign->campaignDonations->sum('donated_amount'),$relatedCampaign->goal)}}</span>
                                                        Raised
                                                    </div>
                                                    <div class="price-goal">
                                                        <i class="far fa-analytics"></i>
                                                        <span>
                                    {{ getCurrencySymbol($relatedCampaign->currency) . ($relatedCampaign->goal ? $relatedCampaign->goal : 0) }}
                                </span>
                                                        Goal
                                                    </div>
                                                    @php
                                                        $shareUrl = Request::root().'/c/'.$campaign->slug;
                                                    @endphp
                                                    <div class="btn-group dropleft share-dropdown">
                                                        <button type="button" class="bg-white"
                                                                data-toggle="dropdown" aria-haspopup="true"
                                                                aria-expanded="false">
                                  <span class="read-cause-link">
                                        <i class="fal fa-share"></i>
                                    </span>
                                                        </button>
                                                        <div class="dropdown-menu p-2 border-0">
                                                            <div class="d-flex justify-content-between">
                                                                <a href="https://www.facebook.com/sharer.php?u={{$shareUrl}}"
                                                                   target="_blank" title="Facebook">
                                                                    <img src="{{ asset('front_landing/web/images/social-icon-images/facebook.png') }}"
                                                                         width="20px" height="20px">
                                                                </a>
                                                                <a href="https://www.instagram.com/sharer.php?u={{$shareUrl}}"
                                                                   target="_blank" title="Instagram">
                                                                    <img src="{{ asset('front_landing/web/images/social-icon-images/instagram.png') }}"
                                                                         width="20px" height="20px"
                                                                         class="object-fit-cover">
                                                                </a>
                                                                <a href="https://twitter.com/share?url={{$shareUrl}}&text={{ $campaign->title }}&hashtags=sharebuttons"
                                                                   target="_blank" title="Twitter">
                                                                    <img src="{{ asset('front_landing/web/images/social-icon-images/twitter.png') }}"
                                                                         width="20px" height="20px"
                                                                         class="object-fit-cover">
                                                                </a>
                                                                <a href="https://www.linkedin.com/shareArticle?mini=true&url={{$shareUrl}}"
                                                                   target="_blank" title="Linkedin">
                                                                    <img src="{{ asset('front_landing/web/images/social-icon-images/linkedin.png') }}"
                                                                         width="20px" height="20px"
                                                                         class="object-fit-cover">
                                                                </a>
                                                                <a href="mailto:?Subject={{ $campaign->title }}
                                                                        &Body=This%20is%20your%20campaign%20link%20:%20{{$shareUrl}}"
                                                                   title="Gmail" target="_blank">
                                                                    <img src="{{ asset('front_landing/web/images/social-icon-images/gmail.png') }}"
                                                                         width="20px" height="20px"
                                                                         class="object-fit-cover">
                                                                </a>
                                                                <a href="https://pinterest.com/pin/create/link/?url={{$shareUrl}}"
                                                                   title="Pinterest" target="_blank">
                                                                    <img src="{{ asset('front_landing/web/images/social-icon-images/pinterest.png') }}"
                                                                         width="20px" height="20px"
                                                                         class="object-fit-cover">
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                </div>
                            </div>
                        @endif
                        @endforeach
                    </div>
                </div>
                @endif
            </div>
        </div>
        <div class="col-lg-4 pl-lg-5 mt-5 mt-lg-0 col-12">
            @if($campaign->campaign_end_method == App\Models\Campaign::AFTER_END_DATE && isset($campaign->deadline))
                <div class="timer-div">
                    <div class=" time-number">
                        <div id="days"></div>
                        <span>day</span>
                    </div>
                    <div class=" time-number">
                        <div id="hours"></div>
                        <span>hours</span>
                    </div>
                    <div class=" time-number">
                        <div id="minutes"></div>
                        <span>min</span>
                    </div>
                    <div class=" time-number">
                        <div id="seconds"></div>
                        <span>sec</span>
                    </div>
                </div>
            @endif
                <input type="hidden" id="campaignEndDate" value="{{$campaign->deadline}}">
                <div class="casues-sidebar-wrapper">
                <div class="single-sidebar-widgets radius-four right-side-widgets p-4">
                    <div class="raise-amount">
                        <div class="d-flex align-items-center">
                            <h5 class="raise-amount__price">{{getCurrencySymbol($campaign->currency)}}{{$campaign->campaignDonations->sum('donated_amount')}}</h5>
                            <span class="text-muted ml-3 raise-amount__goal-text">Raised Of {{getCurrencySymbol($campaign->currency)}}{{ $campaign->goal }}</span>
                        </div>
                        <div class="progress mt-2">
                            <div class="progress-bar progress-bar-striped" role="progressbar"
                            {{ $styleCss }}="
                            width: {{getRaisedAmountPercentage($campaign->campaignDonations->sum('donated_amount'),$campaign->goal)}}
                            %"
                            aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <a href="{{route('landing.payment', $campaign->slug)}}"
                       class="btn btn-donate text-white px-3 py-2 mt-4 w-100 {{ ((getSettingValue('stripe_enable')) == 1 || (getSettingValue('paypal_enable')) == 1 ? '' : 'disabled' )}}">DONATE
                        NOW</a>
                </div>
                <div class="share-icons mt-4">
                    <h6>Share:</h6>
                    @php
                        $shareUrl = Request::root().'/c/'.$campaign->slug;



                    @endphp
                    <div class="share-icons__container d-flex flex-wrap mt-2">
                        <a href="https://www.facebook.com/sharer.php?u={{ $shareUrl }}" target="_blank"
                           title="Facebook"
                           class="text-decoration-none facebook-icon p-2 m-1 d-flex justify-content-center align-items-center radius-four">
                            <i class="fab fa-facebook text-white"></i>
                        </a>
                        <a href="https://twitter.com/share?url={{$shareUrl}}&text={{ $campaign->title }}&hashtags=sharebuttons"
                           target="_blank" title="Twitter"
                           class="text-decoration-none twitter-icon p-2 m-1 d-flex justify-content-center align-items-center radius-four">
                            <i class="fab fa-twitter text-white"></i>
                        </a>
                        <a href="https://www.linkedin.com/shareArticle?mini=true&url={{$shareUrl}}"
                           target="_blank" title="Linkedin"
                           class="text-decoration-none linkedin-icon p-2 m-1 d-flex justify-content-center align-items-center radius-four">
                            <i class="fab fa-linkedin-in text-white"></i>
                        </a>
                        <a href="https://pinterest.com/pin/create/link/?url={{$shareUrl}}" title="Pinterest"
                           target="_blank"
                           class="text-decoration-none pinterest-icon p-2 m-1 d-flex justify-content-center align-items-center radius-four">
                            <i class="fab fa-pinterest-p text-white"></i>
                        </a>
                        <a href="https://www.instagram.com/sharer.php?u={{$shareUrl}}"
                           target="_blank" title="Instagram"
                           class="text-decoration-none instagram-icon p-2 m-1 d-flex justify-content-center align-items-center radius-four">
                            <i class="fab fa-instagram text-white"></i>
                        </a>
                        <a href="mailto:?Subject={{ $campaign->title }}
                                &Body=This%20is%20your%20campaign%20link%20:%20{{$shareUrl}}" title="Gmail"
                           class="text-decoration-none envelope-icon p-2 m-1 d-flex justify-content-center align-items-center radius-four">
                            <i class="far fa-envelope text-white"></i>
                        </a>
                    </div>
                </div>
               
            </div>
            <!-- single-sidebar-widgets -->
            @if(count($medias) > 0 || !empty($campaign->video_link))
                <div class="single-sidebar-widgets right-side-widgets p-4">
                    <div class="widget-title">
                        <h4>Gallery</h4>
                    </div>
                    <div class="causue-gallery-wid">
                        <div class="row">
                            @foreach($medias as $media)
                                <div class="col-6">
                                    <a href="{{ $media->getFullUrl() }}"
                                       class="single-cause-img popup-gallery mb-3 object-fit-cover"
                                    {{ $styleCss }}="background-image: url('{{ $media->getFullUrl() }}')"></a>
                                </div>
                            @endforeach
                            @if(!empty($campaign->video_link))
                                <div class="col-6">
                                    <a href="{{ $campaign->video_link }}" target="_blank"
                                       class="single-cause-img mb-3 object-fit-cover"
                                    {{ $styleCss }}="background-image: url('{{ asset('img/video-thumbnail.png') }}')"
                                    ></a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </section>
@endsection


  


@extends('landing.layouts.app')
@section('title')
    Causes
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
                        <h4><strong>Our Vision:</strong> Food, Education, Medicine</h4>
                    </div>
                    <div class="page-title">
                        <h1>Our Causes</h1>
                    </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('landing.home') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Our Causes</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <section class="our-causes-section section-padding custom-causes-padding">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-12 text-center">
                    <div class="causes-cat-filter">
                        @if(count($campaignCategories) > 0 )
                            <button onClick="" data-filter=""
                                    class="{{ $campaignCategoryId  ? '' : 'active' }} campaign_category_id mb-3"
                                    data-id="">
                                View All
                            </button>
                        @else
                            <p class="font-weight-bold">No Campaigns available at this moment.</p>
                        @endif
                        @foreach($campaignCategories as $campaignCategory)
                            @php
                                $campaignCount = getCampaignCount($campaignCategory->id)
                            @endphp
                            @if($campaignCount > 0)
                                <button data-filter=""
                                        class="{{ ($campaignCategoryId == $campaignCategory->id) ? 'active' : '' }} campaign_category_id mb-3"
                                        data-id="{{ $campaignCategory->id }}"> {{ $campaignCategory->name }}
                                </button>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
            @livewire('show-campaigns',['campaignCategoryId'=>$campaignCategoryId])
        </div>
    </section>

@endsection


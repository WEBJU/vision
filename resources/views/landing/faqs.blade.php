@extends('landing.layouts.app')
@section('title')
    FAQs
@endsection
@php $styleCss = 'style'; @endphp
@section('content')
    <section class="page-banner-wrap bg-cover object-fit-cover"
    {{ $styleCss }}="background-image: url('{{ $faqsImg['menu_image'] }}')">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-8">
                <div class="page-heading text-white">
                    <div class="sub-title">
                        <h4><strong>Our Mission:</strong> Food, Education, Medicine</h4>
                    </div>
                    <div class="page-title">
                        <h1>FAQs</h1>
                    </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('landing.home') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">FAQs</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <section class="faq-section section-padding faq-bg custom-faq-padding">
        <div class="container">
            <div class="">
                <div class="wow fadeInUp">
                    <div class="faq-content">
                        <div class="faq-accordion">
                            <div id="accordion" class=" row accordion">
                                @foreach($faqs as $key => $faq)
                                    <div class="col-lg-6 ">
                                        <div class="card custom-card-radius">
                                            <div class="card-header custom-card-radius" id="{{$key}}">
                                                <p class="mb-0 text-capitalize">
                                                    <a class="collapsed radius-four" role="button"
                                                       data-toggle="collapse" aria-expanded="false"
                                                       href="#faq-{{$key}}">
                                                        {{$faq->title}}
                                                    </a>
                                                </p>
                                            </div>
                                            <div id="faq-{{$key}}" class="collapse" data-parent="#accordion">
                                                <div class="card-body radius-four">
                                                    {{$faq->description}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

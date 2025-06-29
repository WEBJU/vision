<?php
$settings = settings();
?>
@extends('front_landing.layouts.app')
@section('title')
    {{__('messages.about_us.about_us')}}
@endsection
@section('content')

    <div class="about-page">
        <!-- start hero-section -->
        <section class="hero-section">
            <div class="inner-bgimg position-relative"
                 style="background: url('{{ asset('front_landing/images/vision-17.jpg')}}');">
                <div class="container">
                    <div class="row ">
                        <div class="col-lg-6 col-md-7 parallelogram-shape">
                            <div class="text-white inner-text position-relative">
                                {{-- <p class="fs-18 fw-5 mb-md-3 pb-lg-2 mb-2">About Us:
                                    Creativity, Integrity, Inquisitiveness, Participation</p> --}}
                                <h2 class="fs-1 mb-md-0 fw-6"> {{__('messages.about_us.about_us')}} </h2>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
        <!-- end hero-section -->

        <!-- start about-section -->
        <section class="about-section pt-100 pb-100 bg-gray">
            <div class="container">
                <div class="row">
                    <div class="col-xxl-4 col-xl-5 col-lg-6">
                        <div class="about-left">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="about-1">
                                        {{-- <img src="{{ asset('front_landing/images/about-us1.png')}}"
                                             class="w-100 h-100 object-fit-cover"> --}}
                                             <img src="{{ asset('front_landing/images/banner-1.jpeg')}}"
                                             class="w-100 h-75 object-fit-cover">
                                    </div>
                                    <div class="about-content-box bg-danger ">
                                        <div class="about-content d-flex flex-column align-items-center justify-content-center ">
                                            <h2 class="number-big text-white fs-1 fw-6 counter"
                                                data-countto="{{ $aboutUs['years_of_exp'] }}"
                                                data-duration="3000">
                                            </h2>
                                            <p class="mb-0 text-white fs-14 fw-5">{{__('messages.about_us.years_of_exp')}}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 d-md-flex align-items-center">
                                    <div class="about-2">
                                        
                                             <img src="{{ asset('front_landing/images/banner-2.jpeg')}}"
                                             class="w-100 h-75 object-fit-cover">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-8 col-xl-7 col-lg-6 mt-lg-0 mt-sm-5 mt-4">
                        <div class="about-right">
                            <h3 class="text-dark fw-6 mb-3 pb-1">{{ $aboutUs['title'] }}</h3>
                            <p class="text-dark fs-16 fw-5 mb-4 pb-lg-3">Vision Changers Kenya is a youth led not for profit organization registered in Kenya on the 6th of august 2014. At Vision Changers Kenya we believe every person should have a chance to succeed independent of their circumstances. As a dedicated Public Benefit Organization, we are passionate about using sports and civic technology as a means of bringing about positive change in our communities. What we do goes beyond just empowering people; we aim to develop and nurture an environment where the marginalized can learn and participate in the development of their communities and gain sustainable income. We recognize that innovation and collaboration are key to building resilience, therefore, are keen on learning and creative thinking. We therefore seek to enhance the marginalized voices by offering a safe environment for generating and acting on insights.</p>
                            <ul>
                                <li class="text-dark fs-16 fw-5 mb-2"> <span class="fw-6">Our Vision </span> <br>
                                    Our mission is to champion innovative approaches that inspire prosperity and resilience, promoting a culture of teamwork, empowerment, and collective success.</li>
                                <li class="text-dark fs-16 fw-5 mb-2"> <span class="fw-6">Our Mission</span> <br>
                                    We envision a world filled with optimism, tolerance, and social justice, where poverty has been eradicated, and every individual can live in dignity and security.</li>
                                <li class="text-dark fs-16 fw-5 mb-2"><span class="fw-6">Our Core Values</span><br>Creativity, Integrity, Inquisitiveness, Participation </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end about-section -->
         <!-- start approach-section -->

        <!-- end approach-section -->    
        <!-- start success-stories-section -->
        
            <section class="success-stories-section pb-100 mt-4">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8 col-sm-11 col-11">
                            <div class="section-title section-title-four b-top text-center head-title">
                                <h1 class="text-dark fw-6 mb-2"> Our Approach</h1>

                            </div>
                        </div>
                    </div>
                    <p class="text-dark fs-16 mb-4 pb-lg-3 text-center">Vision Changers Kenya is dedicated to transforming the lives of young people through a focused approach that encompasses three core strategic priorities: Knowledge Development and Learning, Civic Participation, and Livelihoods and Wellbeing. </p>

                    <div class="success-stories-content bg-gray px-sm-5 py-sm-5 px-4 py-4">
                        {{-- @foreach($successStories as $successStory) --}}
                            <div class="row d-flex align-items-center pb-3 pt-3 border-bottom">
                                <div class="col-xxl-8 col-lg-7 pe-xxl-4 pe-lg-2">
                                    <div class="stories-content">
                                        <h3 class="text-danger fw-6 mb-3 pb-1">Knowledge Development and Learning</h3>
                                        <p class="text-dark fs-16 fw-5 mb-lg-0 mb-sm-5 mb-4">
                                            Our organization is committed to creating an enabling environment where individuals can thrive by enhancing their skills and knowledge, encouraging active civic engagement, and building sustainable livelihood opportunities. 
                                        </p>
                                    </div>
                                </div>
                                <div class="col-xxl-4 col-lg-5">
                                    <div class="stories-img">
                                        <img src="{{asset('front_landing/images/approach1.jpg')}}"
                                             alt="" class="w-100 h-100 rounded-10 object-fit-cover">
                                             {{-- <img src="{{$successStory->image ? : asset('front_landing/images/success-stories.png')}}"
                                             alt="{{ $successStory->title }}" class="w-100 h-100 rounded-10 object-fit-cover"> --}}
                                    </div>
                                </div>
                            </div>
                            <div class="row d-flex align-items-center pb-3 pt-3 border-bottom">
                                <div class="col-xxl-8 col-lg-7 pe-xxl-4 pe-lg-2">
                                    <div class="stories-content">
                                        <h3 class="text-danger fw-6 mb-3 pb-1">Livelihoods and Wellbeing</h3>
                                        <p class="text-dark fs-16 fw-5 mb-lg-0 mb-sm-5 mb-4">
                                            Our primary objective is to bridge the gap between young job seekers and the world of productive employment and entrepreneurship. We recognize that access to fulfilling job opportunities is vital for increasing household incomes and fostering economic growth at the community and national levels. To achieve this, we implement a range of targeted training programs that cover essential skills, from technical expertise to soft skills like communication, teamwork, and critical thinking. Our mentorship initiatives pair young people with experienced professionals who provide guidance, support, and real-world insights, ensuring that the youth we work with are well-prepared to navigate the complexities of today’s job market. Additionally, we offer technical support and resources that enable aspiring young entrepreneurs to develop viable business ideas, create business plans, and access funding opportunities, thus fostering an entrepreneurial spirit among the youth.
                                        </p>
                                    </div>
                                </div>
                                <div class="col-xxl-4 col-lg-5">
                                    <div class="stories-img">
                                        <img src="{{asset('front_landing/images/approach2.jpg')}}"
                                             alt="" class="w-100 h-100 rounded-10 object-fit-cover">
                                             {{-- <img src="{{$successStory->image ? : asset('front_landing/images/success-stories.png')}}"
                                             alt="{{ $successStory->title }}" class="w-100 h-100 rounded-10 object-fit-cover"> --}}
                                    </div>
                                </div>
                            </div>
                            <div class="row d-flex align-items-center pb-3 pt-3 border-bottom">
                                <div class="col-xxl-8 col-lg-7 pe-xxl-4 pe-lg-2">
                                    <div class="stories-content">
                                        <h3 class="text-danger fw-6 mb-3 pb-1">Civic Participation </h3>
                                        <p class="text-dark fs-16 fw-5 mb-lg-0 mb-sm-5 mb-4">
                                            Through our comprehensive support initiatives, we aim to cultivate a generation of young individuals who are not only economically self-sufficient but are also active participants and contributors to their communities. By promoting responsible civic participation, we continue to empower the youth to play an active role in decision-making and accountability processes, while advocating for their rights, and engaging in community development efforts. This has been achieved through planned workshops, Dialogue forums and town hall meeting, Community sports Festivals and participatory decision-making processes that ensures diverse community voices are heard and acted upon. This holistic approach not only enhances individual livelihoods but also strengthens the social fabric of the communities we serve, resulting in a ripple effect that has led to significant and sustainable change across the nation. 
                                        </p>
                                    </div>
                                </div>
                                <div class="col-xxl-4 col-lg-5">
                                    <div class="stories-img">
                                        <img src="{{asset('front_landing/images/approach3.jpg')}}"
                                             alt="" class="w-100 h-100 rounded-10 object-fit-cover">
                                             {{-- <img src="{{$successStory->image ? : asset('front_landing/images/success-stories.png')}}"
                                             alt="{{ $successStory->title }}" class="w-100 h-100 rounded-10 object-fit-cover"> --}}
                                    </div>
                                </div>
                            </div>
                        {{-- @endforeach --}}
                    </div>
                </div>
            </section>
        {{-- @endif --}}
    <!-- end success-stories-section -->
    </div>
@endsection


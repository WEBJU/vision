<footer class="footer-3 special-footer section-padding custom-footer-pos"
{{ $styleCss }}="background-image: url('{{ asset('front_landing/landing/img/footer_pattern.png') }}')">
<div class="footer-sponsers">
    <div class="container">
        <div class="row pb-sm-5 pb-3 text-center justify-content-center align-items-center">
            @foreach($brands as $brand)
                <div class="col-12 col-md-4 col-lg-3">
                    <div class="single-brand"><img src="{{ $brand->image_url }}" alt="" width="225" height="55"
                                                   class="object-fit-cover"
                                                   data-toggle="tooltip"
                                                   data-placement="top" title="{{ $brand->name }}"/></div>
                </div>
                @endforeach
            </div>
            <hr>
        </div>
    </div>

    <div class="footer-bottom text-center pt-sm-5 pt-3">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-xl-4 col-md-6 col-12">
                    <div class="subscribe-two-promo-box py-3">
                        <h4 class="text-white">Get Updates</h4>
                        <form action="{{route('email.subscribe.store')}}" method="post" id="addEmailForm"
                              class="ajax-form form-wraper mailchimp-form d-flex shadow-sm">
                            @csrf()
                            <input type="email" placeholder="Enter email address" name="email"
                                   class="form-control form-control-solid">
                            <button type="submit" id="emailBtn" class="btn ms-3 text-white">Subscribe</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-8 offset-xl-2">
                    <div class="footer-logo mb-30">
                        <a href="{{ route('landing.home')  }}">
                            <img src="{{ getLogoUrl() }}" alt="fundbux" class="object-fit-cover" 
                                 width="63px" height="56px">
                        </a>
                    </div>
                    <p>It’s been a year like no other, but we still have the chance to change the course of 2021 for
                        10,000 people in rural Mali. Together, we can transform the future for families who’ve endured
                        life without clean water for too long.</p>

                    <div class="social-link">
                        <a href="{{ $settings['facebook_url'] }}" target="_blank"><i class="fab fa-facebook-f"></i></a>
                        <a href="{{ $settings['twitter_url'] }}" target="_blank"><i class="fab fa-twitter"></i></a>
                        <a href="{{ $settings['instagram_url'] }}" target="_blank"><i class="fab fa-instagram"></i></a>
                        <a href="{{ $settings['youtube_url'] }}" target="_blank"><i class="fab fa-youtube"></i></a>
                        <a href="{{ $settings['linkedin_url'] }}" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

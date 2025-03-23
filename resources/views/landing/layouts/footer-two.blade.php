<footer class="footer-2 footer-wrap">
    <div class="footer-top-bar text-white">
        <div class="container custom-container-radius">
            <div class="row align-items-center">
                <div class="col-lg-3">
                    <div class="footer-logo">
                        <a href="{{ route('landing.home') }}">
                            <img src="{{ getLogoUrl() }}" alt="Charity" class="object-fit-cover" width="63px" height="56px"/>
                        </a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="contact-us">
                        <div class="single-info">
                            <div class="icon"><a href="mailto:{{ $settings['email'] }}"><i class="fal fa-envelope"></i></a>
                            </div>
                            <div class="contact-info">
                                <h4>Email Address</h4>
                                <a href="mailto:{{ $settings['email'] }}"><p>{{ $settings['email'] }}</p></a>
                            </div>
                        </div>
                        <div class="single-info">
                            <div class="icon"><a href="tel:{{ $settings['phone'] }}"><i class="fal fa-phone"></i></a>
                            </div>
                            <div class="contact-info">
                                <h4>Phone Number</h4>
                                <a href="tel:{{ $settings['phone'] }}"><p>{{ $settings['phone'] }}</p></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="social-link text-lg-right"><a href="{{ $settings['facebook_url'] }}" target="_blank"><i
                                    class="fab fa-facebook-f"></i></a> <a
                                href="{{ $settings['twitter_url'] }}" target="_blank"><i class="fab fa-twitter"></i></a>
                        <a href="{{ $settings['youtube_url'] }}" target="_blank"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-widgets section-bg pt-30 pb-5">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-md-6 col-12">
                    <div class="single-footer-wid">
                        <div class="wid-title">
                            <h4>About Us</h4>
                        </div>
                        <div class="special-menu">
                            <ul>
                                <li><a href="{{ route('landing.about') }}"
                                       class="{{ Request::is('about-us') ? 'active' : '' }}">about</a></li>
                                <li><a href="{{ route('landing.faqs') }}"
                                       class="{{ Request::is('faqs') ? 'active' : '' }}">FAQ</a></li>
                                <li><a href="{{ route('landing.event') }}"
                                       class="{{ Request::is('events','event-details*') ? 'active' : '' }}">events</a>
                                </li>
                                <li><a href="{{ route('landing.team') }}"
                                       class="{{ Request::is('teams') ? 'active' : '' }}">Team</a></li>
                                <li><a href="{{ route('landing.contact') }}"
                                       class="{{ Request::is('contact-us') ? 'active' : '' }}">Contact Us</a></li>
                                <li><a href="{{ route('landing.news') }}"
                                       class="{{ Request::is('news','news-details*') ? 'active' : '' }}">News</a></li>
                            </ul>
                        </div>
                        <div class="special-menu">
                            <ul>
                                <li><a href="{{ route('landing.causes') }}"
                                       class="{{ Request::is('causes') ? 'active' : '' }}">Causes List</a></li>
                                <li><a>donation</a></li>
                                <li><a href="#">Career</a></li>
                                <li><a href="#">Get A Quote</a></li>
                                <li><a href="{{ route('landing.terms-conditions') }}"
                                       class="{{ Request::is('terms-conditions') ? 'active' : '' }}">Terms &
                                        Conditions</a></li>
                                <li><a href="{{ route('landing.privacy-policy') }}"
                                       class="{{ Request::is('privacy-policy') ? 'active' : '' }}">Privacy Policy</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6 col-12 offset-xl-2">
                    <div class="subscribe-input-div-two">
                        <h4>Get Updates</h4>
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
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-12 text-center">
                    <div class="copyright-info">
                        <p> &copy; <a href="{{ route('landing.home') }}">{{ getAppName() }}</a> Charity Trust - 2022.
                            All rights reserved.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

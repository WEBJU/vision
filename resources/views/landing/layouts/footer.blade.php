<footer class="footer-1 footer-wrap">
    <div class="footer-widgets section-bg pt-md-5 pt-3 pb-md-5 pb-3">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-xl-4 col-12">
                    <div class="single-footer-wid site-info-widget">
                        <div class="wid-title">
                            <h4>Get In Touch</h4>
                        </div>
                        <div class="contact-us">
                            <div class="single-contact-info d-flex align-items-center">
                                <div class="icon radius-four">
                                    <i class="fal fa-phone"></i>
                                </div>
                                <div class="contact-info">
                                    <span>
                                        @if(!empty($settings['phone']))
                                            <a href="tel:+{{ $settings['phone'] }}" class="site-info-widget">{{ $settings['phone'] }}</a>
                                        @endif
                                    </span>
                                </div>
                            </div>
                            <div class="single-contact-info d-flex align-items-center">
                                <div class="icon radius-four">
                                    <i class="fal fa-envelope"></i>
                                </div>
                                <div class="contact-info">
                                    <span>
                                        @if(!empty($settings['email']))
                                            <a href="mailto:{{ $settings['email'] }}" class="site-info-widget">{{ $settings['email'] }}</a>
                                        @endif
                                    </span>
                                </div>
                            </div>
                            <div class="single-contact-info d-flex align-items-center">
                                <div class="icon radius-four">
                                    <i class="fal fa-map-marker-alt"></i>
                                </div>
                                <div class="contact-info">
                                    <span class="site-info-widget">     
                                       @if(!empty($settings['address']))
                                            {{ $settings['address'] }}
                                        @endif
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="social-link">
                            @if(!empty($settings['facebook_url']))
                                <a href="{{ $settings['facebook_url'] }}" target="_blank" class="mb-2 mr-1 radius-four"><i
                                            class="fab fa-facebook-f"></i></a>
                            @endif
                            @if(!empty($settings['youtube_url']))
                                <a href="{{ $settings['youtube_url'] }}" target="_blank"
                                   class="mb-2 mr-1 radius-four"><i
                                            class="fab fa-youtube"></i></a>
                            @endif
                            @if(!empty($settings['pinterest_url']))
                                <a href="{{ $settings['pinterest_url'] }}" target="_blank"
                                   class="mb-2 mr-1 radius-four"><i
                                            class="fab fa-pinterest"></i></a>
                            @endif
                            @if(!empty($settings['instagram_url']))
                                <a href="{{ $settings['instagram_url'] }}" target="_blank"
                                   class="mb-2 mr-1 radius-four"><i
                                            class="fab fa-instagram"></i></a>
                            @endif
                            @if(!empty($settings['twitter_url']))
                                <a href="{{ $settings['twitter_url'] }}" target="_blank"
                                   class="mb-2 mr-1 radius-four"><i
                                            class="fab fa-twitter"></i></a>
                            @endif
                            @if(!empty($settings['linkedin_url']))
                                <a href="{{ $settings['linkedin_url'] }}" target="_blank" class="mb-2 mr-1 radius-four"><i
                                            class="fab fa-linkedin-in"></i></a>
                            @endif
                        </div>
                    </div>
                </div> <!-- /.col-lg-3 - single-footer-wid -->
                <div class="col-md-6 col-xl-4 offset-xl-1 col-12">
                    <div class="single-footer-wid">
                        <div class="wid-title custom-width-space">
                            <h4>About Us</h4>
                        </div>
                        <div class="special-menu">
                            <ul>
                                <li><a href="{{ route('landing.about') }}"
                                       class="{{ Request::is('about-us') ? 'active' : '' }}">about</a></li>
                                <li><a href="{{ route('landing.faqs') }}"
                                       class="{{ Request::is('faqs') ? 'active' : '' }}">FAQs</a></li>
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
                </div> <!-- /.col-lg-3 - single-footer-wid -->
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-12 text-center">
                    <div class="copyright-info">
                        <p>&copy; <a href="{{ route('landing.home') }}">{{ getAppName() }}</a> Charity Trust - 2022. All
                            rights reserved.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

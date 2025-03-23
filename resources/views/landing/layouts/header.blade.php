<header class="header-wrap header-box-style header-1">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-12 p-0 d-lg-none d-block d-none-mobile">
                <div class="top-bar text-right ">
                    <a href="mailto:{{ $settings['email'] }}"><i class="fal fa-envelope"></i>{{ $settings['email'] }}
                    </a>
                    <a href="tel:{{ $settings['phone'] }}"><i class="fal fa-phone"></i>{{ $settings['phone'] }}</a>
                    <a class="d-btn">Donate Now</a>
                </div>
            </div>
            <div class="col-xl-3 col-6 col-lg-3 pr-0">
                <div class="logo custom-logo-radius">
                     <a href="{{ route('landing.home') }}" class="text-lg-center ">
                        <img src="{{ getLogoUrl() }}" alt="Vision Changers" class="object-fit-cover fit-img" width="63px" height="56px">
                    </a>
                </div>
            </div>
            <div class="col-xl-9 pl-lg-0 col-lg-9 d-none d-lg-block">
                <div class="box-wrap custom-wrap">
                    <div class="top-bar text-right custom-top-bar">
                        <a href="mailto:{{ $settings['email'] }}"><i
                                    class="fal fa-envelope"></i>{{ $settings['email'] }}</a>
                        <a href="tel:{{ $settings['phone'] }}"><i class="fal fa-phone"></i>{{ $settings['phone'] }}</a>
                        @if(getLogInUser())
                            @if(getLogInUser()->hasRole('admin'))
                                <a href="{{ route('admin.dashboard') }}" class="d-btn">Dashboard</a>
                            @else
                                <a href="{{ route('user.dashboard') }}" class="d-btn">Dashboard</a>
                            @endif
                        @else
                            <a href="{{ route('register') }}" class="d-btn custom-d-btn">Sign Up</a>
                            <a href="{{ route('login') }}" class="d-btn custom-btn-radius">Sign In</a>
                        @endif
                    </div>
                    <div class="menu-wrap d-flex align-items-center justify-content-around radius-four">
                        <div class="main-menu custom-menu">
                            <ul>
                                <li>
                                    <a href="{{ route('landing.home') }}" class="{{ Request::is('/') ? 'active' : ''}}">Home</a>
                                </li>
                                <li>
                                    <a href="{{ route('landing.about') }}"
                                       class="{{ Request::is('about-us') ? 'active' : ''}}">about</a>
                                </li>
                                <li>
                                    <a href="{{ route('landing.causes') }}"
                                       class="{{ Request::is('causes','campaign-details*') ? 'active' : ''}}">Causes</a>
                                </li>
                                <li><a href="#"
                                       class="{{ Request::is('faqs','events','page*','teams','event-details*') ? 'active' : '' }}">Pages</a>
                                    <ul class="sub-menu custom-sub-menu">
                                        <li><a href="{{ route('landing.faqs') }}"
                                               class="{{ Request::is('faqs') ? 'active' : '' }}">FAQ</a></li>
                                        <li><a href="{{ route('landing.event') }}"
                                               class="{{ Request::is('events','event-details*') ? 'active' : '' }}">events</a>
                                        </li>
                                        @foreach ( $pages as $page)
                                            @if($page->is_active)
                                                <li>
                                                    <a href="{{ route('landing.page.detail',$page->id) }}"
                                                       class="{{ Request::is('page/'.$page->id) ? 'active' : '' }}">{{ $page->name }}</a>
                                                </li>
                                            @endif
                                        @endforeach
                                        <li><a href="{{ route('landing.team')}}"
                                               class="{{ Request::is('teams') ? 'active' : '' }}">Team</a></li>
                                    </ul>
                                </li>
                                <li><a href="{{ route('landing.news') }}"
                                       class="{{ Request::is('news','news-details*') ? 'active' : ''}}">News</a></li>
                                <li>
                                    <a href="{{ route('landing.contact') }}"
                                       class="{{ Request::is('contact-us') ? 'active' : ''}}">Contact</a>
                                </li>
                            </ul>
                        </div>
                        <div class="social-link">
                            <a href="{{ $settings['facebook_url'] }}" target="_blank"><i class="fab fa-facebook-f"></i></a>
                            <a href="{{ $settings['twitter_url'] }}" target="_blank"><i class="fab fa-twitter"></i></a>
                            <a href="{{ $settings['linkedin_url'] }}" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                            <a href="{{ $settings['youtube_url'] }}" target="_blank"><i class="fab fa-youtube"></i></a>
                            <a href="{{ $settings['instagram_url'] }}" target="_blank"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 d-lg-none d-block pl-0">
                <div class="mobile-nav-wrap">
                    <div id="hamburger">
                        <i class="fal fa-bars"></i>
                    </div>
                    <!-- mobile menu - responsive menu  -->
                    <div class="mobile-nav">
                        <button type="button" class="close-nav">
                            <i class="fal fa-times-circle"></i>
                        </button>
                        <nav class="sidebar-nav">
                            <ul class="metismenu custom-sub-menu" id="mobile-menu">
                                <li>
                                    <a href="{{ route('landing.home') }}" class="{{ Request::is('/') ? 'active' : ''}}">Home</a>
                                </li>
                                <li>
                                    <a href="{{ route('landing.about') }}"
                                       class="{{ Request::is('about-us') ? 'active' : '' }}">about</a>
                                </li>
                                <li>
                                    <a href="{{ route('landing.causes') }} "
                                       class="{{ Request::is('causes','c/*') ? 'active' : '' }}">Causes</a>
                                </li>
                                <li>
                                    <a href="#"
                                       class="has-arrow {{ Request::is('faqs','events','page*','teams','event-details*') ? 'active' : '' }}">Pages</a>
                                    <ul class="sub-menu">
                                        <li><a href="{{ route('landing.faqs') }}"
                                               class="{{ Request::is('faqs') ? 'active' : '' }}">FAQ</a></li>
                                        <li><a href="{{ route('landing.event') }}"
                                               class="{{ Request::is('events','event-details*') ? 'active' : '' }}">events</a>
                                        </li>
                                        @foreach ( $pages as $page)
                                            @if($page->is_active)
                                                <li>
                                                    <a href="{{ route('landing.page.detail',$page->id) }}"
                                                       class="{{ Request::is('page/'.$page->id) ? 'active' : '' }}">{{ $page->name }}</a>
                                                </li>
                                            @endif
                                        @endforeach
                                        <li><a href="{{ route('landing.team') }}"
                                               class="{{ Request::is('teams') ? 'active' : '' }}">Team</a></li>
                                    </ul>
                                </li>
                                <li><a href="{{ route('landing.news') }}"
                                       class="{{ Request::is('news','news-details*') ? 'active' : '' }}">News</a></li>
                                <li><a href="{{ route('landing.contact') }}"
                                       class="{{ Request::is('contact-us') ? 'active' : '' }}">Contact</a></li>
                            </ul>
                        </nav>

                        <div class="action-bar">
                            <a href="mailto:{{ $settings['email'] }}"><i
                                        class="fal fa-envelope"></i>{{ $settings['email'] }}</a>
                            <a href="tel:{{ $settings['phone'] }}"><i class="fal fa-phone"></i>{{ $settings['phone'] }}
                            </a>
                            @if(getLogInUser())
                                @if(getLogInUser()->hasRole('admin'))
                                    <a href="{{ route('admin.dashboard') }}" class="d-btn theme-btn">Dashboard</a>
                                @else
                                    <a href="{{ route('user.dashboard') }}" class="d-btn theme-btn">Dashboard</a>
                                @endif
                            @else
                                <a href="{{ route('register') }}" class="d-btn theme-btn custom-d-btn">Sign Up</a>
                                <a href="{{ route('login') }}" class="d-btn theme-btn">Sign In</a>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="overlay"></div>
            </div>
        </div>
    </div>
</header>   

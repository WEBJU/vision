@php
    $pages  = pages();
@endphp
<header class="transparent-header header-2">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-xl-3 col-lg-8 col-sm-5 col-6 header-app-logo">
                <div class="logo"><a href="{{ route('landing.home')  }}">
                        <img src="{{ getLogoUrl() }}" alt="FundBux" class="object-fit-cover" width="63px" height="56px">
                    </a>
                </div>
            </div>
            <div class="col-lg-6 p-lg-0 d-none d-xl-block">
                <div class="menu-wrap">
                    <div class="main-menu">
                        <ul>
                            <li>
                                <a href="{{ route('landing.home') }}" class="{{ Request::is('/') ? 'active' : '' }}">Home</a>
                            </li>
                            <li><a href="{{ route('landing.about') }}"
                                   class="{{ Request::is('about-us') ? 'active' : '' }}">about</a></li>
                            <li>
                                <a href="{{ route('landing.causes') }}"
                                   class="{{ Request::is('causes','c/*') ? 'active' : '' }}">Causes</a>
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
                                   class="{{ Request::is('news','news-details*') ? 'active' : '' }}">News</a>
                            </li>
                            <li><a href="{{ route('landing.contact') }}"
                                   class="{{ Request::is('contact-us') ? 'active' : '' }}">Contact</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 pl-lg-0 d-none d-sm-block text-right">
                <div class="header-promo-btn">
                    @if(getLogInUser())
                        @if(getLogInUser()->hasRole('admin'))
                            <a href="{{ route('admin.dashboard') }}" class="theme-btn">Dashboard</a>
                        @else
                            <a href="{{ route('user.dashboard') }}" class="theme-btn">Dashboard</a>
                        @endif
                    @else
                        <a href="{{ route('register') }}" class="theme-btn custom-two-theme">Sign Up</a>
                        <a href="{{ route('login') }}" class="theme-btn">Sign In</a>
                    @endif
                </div>
            </div>
            <div class="d-block d-lg-none col-sm-1 col-6">
                <div class="mobile-nav-wrap">
                    <div id="hamburger"><i class="fal fa-bars"></i></div>
                    <!-- mobile menu - responsive menu  -->
                    <div class="mobile-nav">
                        <button type="button" class="close-nav"><i class="fal fa-times-circle"></i></button>
                        <nav class="sidebar-nav">
                            <ul class="metismenu" id="mobile-menu">
                                <li>
                                    <a href="{{ route('landing.home') }}"
                                       class="{{ Request::is('/') ? 'active' : '' }}">Home</a>
                                </li>
                                <li><a href="{{ route('landing.about') }}"
                                       class="{{ Request::is('about-us') ? 'active' : '' }}">about</a></li>
                                <li>
                                    <a href="{{ route('landing.causes') }}"
                                       class="{{ Request::is('causes','c/*') ? 'active' : '' }}">Causes</a>
                                </li>
                                <li>
                                    <a href="#"
                                       class="has-arrow {{ Request::is('faqs','events','teams','page*','event-details*') ? 'active' : '' }}">Pages</a>
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
                        <div class="action-bar"><a href="mailto:{{ $settings['email'] }}"><i
                                        class="fal fa-envelope"></i>{{ $settings['email'] }}</a> <a
                                    href="tel:123-456-7890"><i
                                        class="fal fa-phone"></i>tel:{{ $settings['phone'] }}</a>
                            @if(getLogInUser())
                                @if(getLogInUser()->hasRole('admin'))
                                    <a href="{{ route('admin.dashboard') }}" class="d-btn theme-btn">Dashboard</a>
                                @else
                                    <a href="{{ route('user.dashboard') }}" class="d-btn theme-btn">Dashboard</a>
                                @endif
                            @else
                                <a href="{{ route('register') }}" class="d-btn theme-btn custom-d-theme">Sign Up</a>
                                <a href="{{ route('login') }}" class="d-btn theme-btn">Sign In</a>
                            @endif
                        </div>
                    </div>
                    <div class="overlay"></div>
                </div>
            </div>
        </div>
</header>

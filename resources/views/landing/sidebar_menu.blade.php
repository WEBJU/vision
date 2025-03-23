@php
    $settings  = settings();
@endphp
@php
    $style = 'style';
@endphp
<div class="col-12 col-lg-4">
    <div class="main-sidebar">
        <div class="single-sidebar-widget author-box-widegts">
            <div class="wid-title">
                <h3>About Me</h3>
            </div>
            <div class="author-info text-center">
                <div class="author-img object-fit-cover" {{$style}}="
                background-image: url('{{ !empty($news->users->profile) ? $news->users->profile : asset('front_landing/web/media/avatars/150-26.jpg') }}
                ');background-size: 100% 100%;" alt=""></div>
            @if(isset($mostUser))
                @foreach($mostUser as $user)
                    <h4>{{$user->users[0]->full_name}}</h4>
                @endforeach

            @else
                @foreach($news->users as $user)<h4>{{$user->first_name.' '.$user->last_name}}</h4>@endforeach
            @endif
        </div>
    </div>
    <div class="single-sidebar-widget">
        <div class="wid-title">
            <h3>Search Objects</h3>
        </div>
        <div class="search_widget">
            <form action="#">
                <input type="text" class="radius-four" placeholder="Search your keyword...">
                <button type="submit" class="radius-four"><i class="fal fa-search"></i></button>
            </form>
        </div>
    </div>
    <div class="single-sidebar-widget">
        <div class="wid-title">
            <h3>Popular Feeds</h3>
        </div>
        <div class="popular-posts">
            @foreach($latestFourNews as $news)
                <div class="single-post-item">
                    <img class="thumb bg-cover object-fit-cover"
                         src="{{ !empty($news->news_image) ? $news->news_image : url(asset('front_landing/landing/img/blog/1.jpg')) }}">
                    <div class="post-content">
                        <h5><a href="{{route('landing.news-details',$news->slug)}}">{{$news->title}}</a></h5>
                        <div class="post-date">
                            <i class="far fa-calendar-alt"></i>{{ \Carbon\Carbon::parse($news->created_at)->isoFormat('Do MMMM YYYY')}}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="single-sidebar-widget">
        <div class="wid-title">
            <h3>Categories</h3>
        </div>
        <div class="widget_categories">
            <ul>
                @foreach($newsCategories as $newsCategory)
                    <li><a data-id="{{$newsCategory->id}}"
                           class="news-category-filter radius-four {{ ($newsCategoryId == $newsCategory->id) ? 'active' : '' }}">{{isset($newsCategory) ? $newsCategory->name : ''}}
                            <span class="radius-four">{{ $newsCategory->news->count() }}</span></a></li>
                @endforeach
            </ul>
        </div>
    </div>
    <div class="single-sidebar-widget">
        <div class="wid-title">
            <h3>Popular Tags</h3>
        </div>
        <div class="tagcloud">
            @foreach($newsTags as $newsTag)
                @if(count($newsTag->news) > 0)
                    <a class="news-tags-filter radius-four {{ ($newsTagId == $newsTag->id) ? 'active' : '' }}"
                       data-id="{{$newsTag->id}}">{{$newsTag->name}}</a>
                @endif
            @endforeach
        </div>
    </div>
</div>
</div>



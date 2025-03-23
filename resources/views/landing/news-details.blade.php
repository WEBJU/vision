@extends('landing.layouts.app')
@section('title')
    News
@endsection
@php $styleCss = 'style'; @endphp
@section('content')
    @php
        $style = 'style';
    @endphp
    <section class="page-banner-wrap bg-cover object-fit-cover"
    {{ $styleCss }}="background-image: url('{{ $newsDetailsImg['menu_image'] }}')">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-8">
                <div class="page-heading text-white">
                    <div class="sub-title">
                        <h4><strong>Our Mission:</strong> Food, Education, Medicine</h4>
                    </div>
                    <div class="page-title">
                        <h1>News Details</h1>
                    </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('landing.home')}}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">News Details</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <section class="blog-wrapper news-wrapper section-padding">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-8">
                    <div class="blog-post-details border-wrap radius-four">
                        <div class="single-blog-post post-details">
                            <div class="post-content">
                                <div class="post-cat">
                                    <a class="radius-four">{{ isset($news->newsCategory) ? $news->newsCategory->name : ''}}</a>
                                </div>
                                <img class="object-fit-cover"
                                     src="{{ !empty($news->news_image) ? $news->news_image : url(asset('front_landing/landing/img/blog/1.jpg')) }}"
                                     alt="">
                                <h2>{{$news->title}}</h2>
                                <div class="post-meta">
                                    <span><i class="fal fa-eye"></i>232 Views</span>
                                    <i class="fal fa-comments"></i> <span id="commentCounts"> {{$allCommnets->count()}} Comments</span>
                                    <span><i class="fal fa-calendar-alt"></i>{{ \Carbon\Carbon::parse($news->created_at)->isoFormat('Do MMMM YYYY')}}</span>
                                </div>
                                <p>{!! nl2br($news->description) !!}</p>

                            </div>
                        </div>
                        <div class="row tag-share-wrap">
                            <div class="col-lg-6 col-12">
                                <h4>Related Tags</h4>
                                <div class="tagcloud">
                                    @foreach($news->newsTags as $newsTag)  <a
                                            class="radius-four"> {{$newsTag->name}}</a>@endforeach
                                </div>
                            </div>
                            <div class="col-lg-6 col-12 text-lg-right">
                                <h4>Social Share</h4>
                                <div class="social-share">
                                    <a><i class="fab fa-facebook-f"></i></a>
                                    <a><i class="fab fa-twitter"></i></a>
                                    <a><i class="fab fa-instagram"></i></a>
                                    <a><i class="fab fa-linkedin-in"></i></a>
                                </div>
                            </div>
                            <hr>
                        </div>

                        @if(count($relatedPosts) > 0)
                        <div class="related-post-wrap">
                            <h3>Related Post</h3>
                            <div class="row">
                                @foreach($relatedPosts as $relatedPost)
                                <div class="col-md-6 col-12">
                                    <div class="single-related-post">
                                        <img class="featured-thumb bg-cover object-fit-cover" src="{{ !empty($relatedPost->news_image) ? $relatedPost->news_image : url(asset('front_landing/landing/img/blog/1.jpg')) }}" alt="">
                                        
                                        <div class="post-content">
                                            <div class="post-date">
                                                <span><i class="fal fa-calendar-alt"></i>{{ \Carbon\Carbon::parse($relatedPost->created_at)->isoFormat('Do MMMM YYYY')}}</span>
                                            </div>
                                            <h4><a href="{{route('landing.news-details',$relatedPost->slug)}}">{{ \Illuminate\Support\Str::limit($relatedPost->title, 30) }}</a></h4>
                                            <p>{!! nl2br( \Illuminate\Support\Str::limit($relatedPost->description, 100) ) !!}</p>
                                        </div>
                                    </div>
                                  
                                </div>
                                @endforeach
                            </div>
                        </div>
                        @endif
                        
                        <!-- comments section wrap start -->
                        <div class="comments-section-wrap pt-40">
                            <div class="comments-heading">
                                <h3><span id="commentCount">{{$allCommnets->count()}}</span> Comments </h3>
                            </div>
                            <ul class="comments-item-list">
                                <li class="single-comment-item">
                                    @foreach($allCommnets as $newsComment)
                                    <div class="author-img">
                                        <img class="author-img object-fit-cover" {{$style}}="background-image: url('{{ !empty($newsComment->users) ? $newsComment->users->profile_image : asset('front_landing/web/media/avatars/150-26.jpg') }}'); background-size: 100% 100%;">
                                
                                    </div>
                                    <div class="author-info-comment">
                                        <div class="info">
                                            <h5>{{isset($newsComment->name) ? $newsComment->name : ''}}</h5>
                                            <span>{{ \Carbon\Carbon::parse($news->created_at)->isoFormat('Do MMMM YYYY')}}</span>
                                            <a class="theme-btn minimal-btn"><i class="fal fa-reply"></i>Reply</a>
                                        </div>
                                        <div class="comment-text">
                                            <p>{{isset($newsComment->comments) ? $newsComment->comments : ''}}</p>
                                        </div>
                                    </div>
                                    @endforeach
                                </li>
                            </ul>
                        </div>
                        <div class="comment-form-wrap mt-40 ">
                            <h3>Post Comment</h3>

                            <form id="newsCommentsForm" method="post" action="#" class="comment-form radius-four">
                                @csrf
                                <input type="hidden" name="news_id" value="{{$news->id}}">
                                <input type="hidden" name="user_id" value="{{ \Illuminate\Support\Facades\Auth::id() }}">
                                <div class="single-form-input">
                                    <textarea id="comments" class="radius-four" name="comments"
                                              placeholder="Type your comments...."></textarea>
                                </div>
                                <div class="single-form-input">
                                    <input type="text" id="name" name="name" class="radius-four"
                                           placeholder="Type your name....">
                                </div>
                                <div class="single-form-input">
                                    <input type="email" id="email" name="email" class="radius-four"
                                           placeholder="Type your email....">
                                </div>
                                <div class="single-form-input">
                                    <input type="text" id="websiteName" class="radius-four" name="website_name"
                                           placeholder="Type your website....">
                                </div>
                                <button class="submit-btn radius-four" id="newsCommentsBtn" type="submit"><i
                                            class="fal fa-comments"></i>Post Comment
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                @include('landing.sidebar_news_detail')
            </div>  
        </div>
    </section>
@endsection

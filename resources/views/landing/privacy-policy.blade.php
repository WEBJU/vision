@extends('landing.layouts.app')
@section('title')
    {{ __('messages.teams.teams') }}
@endsection
@section('content')

    <section id="content">
        <div class="content-wrap">
            <div class="container">
                <div class="custom-margin mb-50">{!! $privacyPolicy->value !!}</div>
            </div>
        </div>
    </section>

@endsection

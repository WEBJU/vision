@extends('admin.layouts.auth')
@section('title')
    {{__('messages.common.register')}}
@endsection
@section('content')
    <div class="d-flex flex-column flex-column-fluid align-items-center justify-content-center p-4">
        <div class="col-12 text-center">
            <a href="{{ route('landing.home') }}" class=" mb-2 mb-sm-10">
                <img alt="Logo" src="{{ getLogoUrl() }}" style="width: 200px; height: 200px;" class="img-fluid">
            </a>
        </div>
        <div class="width-540">
            @include('admin.layouts.errors')
            @if (session('status'))
                @include('flash::message')
            @endif
        </div>
        <div class="bg-white rounded-15 shadow-md width-540 px-5 px-sm-7 py-10 mx-auto">
            <h1 class="text-center mb-7">Partner with us</h1>
            <form class="form w-100" method="POST" action="{{ route('register') }}">
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-sm-7 mb-4">
                        <label for="formInputFirstName" class="form-label">
                            {{ __('messages.user.first_name').':' }}<span class="required"></span>
                        </label>
                        <input name="first_name" type="text" class="form-control" id="first_name"
                               placeholder=" {{  __('auth.registration.first_name') }}"
                               aria-describedby="firstName" value="{{ old('first_name') }}" required>
                    </div>
                    <div class="col-md-6 mb-sm-7 mb-4">
                        <label for="last_name" class="form-label">
                            {{ __('messages.user.last_name').':' }}<span class="required"></span>
                        </label>
                        <input name="last_name" type="text" class="form-control" id="last_name"
                               placeholder=" {{ __('auth.registration.last_name') }}"
                               aria-describedby="lastName" required value="{{ old('last_name') }}">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 mb-sm-7 mb-4">
                        <label for="email" class="form-label">
                            {{ __('messages.common.email').':' }}<span class="required"></span>
                        </label>
                        <input name="email" type="email" class="form-control" id="email" aria-describedby="email"
                               placeholder=" {{ __('auth.login.enter_email') }}"
                               value="{{ old('email') }}" required>
                    </div>
                </div>

                <div class="row mb-sm-7">
                    <div class="col-md-6">
                        <label for="password" class="form-label">
                            Phone Number<span class="required"></span>
                        </label>
                        <div class="mb-3 position-relative">
                            <input type="password" name="password" class="form-control" id="password"
                                   placeholder=" Phone Number" aria-describedby="password" required
                                   aria-label="Password" data-toggle="password" autocomplete="new-password">
                            
                            </span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="dropdown_menu" class="form-label">
                           Select Your Partnership Interest<span class="required"></span>
                        </label>
                        <div class="mb-3 position-relative">
                            <select name="dropdown_menu" id="dropdown_menu" class="form-control" required aria-label="Dropdown">
                                <option value="" disabled selected>Choose one option</option>
                                <option value="option1">Partner with Us</option>
                                <option value="option2">Become a Volunteer</option>
                                <option value="option3">Become a Mentor</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="text-muted">{{__('messages.common.use_8_or_more_characters')}}</div>
                </div>
                <div class="mb-sm-4 form-check">
                    <input type="checkbox" class="form-check-input" name="toc" value="1" required/>
                    <span class="text-gray-700 me-2 ml-1">{{__('messages.common.i_agree')}}
									<a href="{{ route('landing.terms-conditions') }}" target="_blank"
                                       class="ms-1 link-primary">{{__('messages.common.terms_and_conditions')}}</a><span> and</span>
                        <a href="{{ route('landing.privacy-policy') }}"
                           target="_blank" class="ms-1 link-primary">{{__('messages.terms_conditions.privacy_policy')}}</a>.</span>
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">{{__('messages.common.submit')}}</button>
                </div>
                
            </form>
        </div>
    </div>
@endsection

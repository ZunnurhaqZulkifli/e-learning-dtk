@php

// dd(backpack_theme_config('layout'));

@endphp

@extends('app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card
                    @if(backpack_theme_config('layout') === 'dark_mode')
                        bg-dark text-white
                    @else
                        bg-light text-dark
                    @endif
                ">
                    <div class="card-header
                        @if(backpack_theme_config('layout') === 'dark_mode')
                            bg-secondary text-white
                        @else
                            bg-primary text-dark
                        @endif
                    ">
                        {{ __('Login') }}
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right 
                                    @if(backpack_theme_config('layout') === 'dark_mode') 
                                        text-white 
                                    @endif">
                                    {{ __('E-Mail Address') }}
                                </label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control 
                                        @error('email') is-invalid @enderror 
                                        @if(backpack_theme_config('layout') === 'dark_mode') 
                                            bg-dark text-white border-secondary 
                                        @endif" 
                                        name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right 
                                    @if(backpack_theme_config('layout') === 'dark_mode') 
                                        text-white 
                                    @endif">
                                    {{ __('Password') }}
                                </label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control 
                                        @error('password') is-invalid @enderror 
                                        @if(backpack_theme_config('layout') === 'dark_mode') 
                                            bg-dark text-white border-secondary 
                                        @endif" 
                                        name="password" required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" 
                                        {{ old('remember') ? 'checked' : '' }}
                                        @if(backpack_theme_config('layout') === 'dark_mode') 
                                            style="background-color: #333; border-color: #555;" 
                                        @endif>

                                        <label class="form-check-label 
                                            @if(backpack_theme_config('layout') === 'dark_mode') 
                                                text-white 
                                            @endif" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn 
                                        @if(backpack_theme_config('layout') === 'dark_mode') 
                                            btn-secondary 
                                        @else 
                                            btn-primary 
                                        @endif">
                                        {{ __('Login') }}
                                    </button>

                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link 
                                            @if(backpack_theme_config('layout') === 'dark_mode') 
                                                text-white 
                                            @endif" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

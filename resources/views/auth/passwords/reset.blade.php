@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="w-1/2  mx-auto justify-center flex flex-col form-des">
            <a class="text-lg font-semibold text-gray-800 pt-2 mb-4" href="{{ url('/') }}">
                <svg width="100" height="100" viewBox="0 0 200 200" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <!-- Background Circle -->
                    <circle cx="100" cy="100" r="90" fill="#2C3E50" stroke="#3498DB" stroke-width="10"/>

                    <!-- Document Shape -->
                    <rect x="60" y="50" width="80" height="100" rx="10" fill="white"/>

                    <!-- Checkmark -->
                    <path d="M75 100 L90 120 L125 80" stroke="#2ECC71" stroke-width="8" stroke-linecap="round" stroke-linejoin="round" fill="none"/>

                    <!-- Horizontal Lines inside Document -->
                    <line x1="70" y1="70" x2="130" y2="70" stroke="#BDC3C7" stroke-width="4"/>
                    <line x1="70" y1="85" x2="130" y2="85" stroke="#BDC3C7" stroke-width="4"/>
                    <line x1="70" y1="125" x2="130" y2="125" stroke="#BDC3C7" stroke-width="4"/>
                </svg>
            </a>
            <h2 class="text-3xl text-gray-950 text-start font-extrabold mb-2">Welcome Back</h2>
            <h5 class="text-sm text-gray-600 font-bold text-start">Enter your credentials to access your tasks</h5>
            <div class="flex gap-2">

            </div>

            <form method="POST" action="{{ route('password.update') }}">
                @csrf

                <input type="hidden" name="token" value="{{ $token }}">

                <div class="row mb-3">
                    <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                    <div class="col-md-6">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                    </div>
                </div>

                <div class="row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Reset Password') }}
                        </button>
                    </div>
                </div>
            </form>

         </div>
        </div>
    </div>
</div>
@endsection

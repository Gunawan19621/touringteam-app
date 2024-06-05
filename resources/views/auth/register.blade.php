{{-- <x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-label for="name" value="{{ __('Name') }}" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-label for="terms">
                        <div class="flex items-center">
                            <x-checkbox name="terms" id="terms" required />

                            <div class="ms-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ms-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout> --}}


@extends('auth.layouts.auth-master')

@section('title', 'Register')

{{-- @section('content')
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6 col-xl-6">
            <div class="text-center">
                <a href="index.html">
                    <img src="{{ asset('assets/images/logo-dark.png') }}" alt="" height="22" class="mx-auto">
                </a>
                <p class="text-muted mt-2 mb-3">Responsive Admin Dashboard</p>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="text-center mb-3">
                        <h4 class="text-uppercase mt-0">Register</h4>
                    </div>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="row mb-2">
                            <div class="col-md-6">
                                <label for="username" class="form-label">Username <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="username" id="username"
                                    placeholder="Masukan username anda" required autofocus autocomplete="username">
                                @error('username')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="fullname" class="form-label">Nama Lengkap <span
                                        class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="fullname" id="fullname"
                                    value="{{ old('fullname') }}" placeholder="Masukan nama lengkap anda" required autofocus
                                    autocomplete="fullname">
                                @error('fullname')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="col-md-6">
                                <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                                <input class="form-control" type="email" name="email" value="{{ old('email') }}"
                                    id="email" value="{{ old('email') }}" placeholder="Masukan email anda" required
                                    autocomplete="username">
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="no_phone" class="form-label">No. Telepon <span
                                        class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="no_phone" value="{{ old('no_phone') }}"
                                    id="no_phone" placeholder="Masukan nomro telepon anda" required
                                    autocomplete="no_phone">
                                @error('no_phone')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="col-md-6">
                                <label for="password" class="form-label">Password <span class="text-danger">*</span></label>
                                <input class="form-control" type="password" id="password" name="password" required
                                    placeholder="Enter your password" autocomplete="new-password">
                                @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="password_confirmation" class="form-label">Confirm Password <span
                                        class="text-danger">*</span></label>
                                <input class="form-control" type="password" id="password_confirmation"
                                    name="password_confirmation" required placeholder="Enter your confirmation password"
                                    autocomplete="new-password">
                                @error('password_confirmation')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="referral_code" class="form-label">Kode referal</label>
                            <input class="form-control" type="text" name="referral_code"
                                value="{{ old('referral_code') }}" id="referral_code"
                                placeholder="Masukan kode referal anda" autocomplete="referral_code">
                            @error('referral_code')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="checkbox-signup">
                                <label class="form-check-label" for="checkbox-signup">Saya menerima Syarat dan
                                    Ketentuan yang Berlaku</label>
                                @error('terms')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-2 text-center d-grid">
                            <button class="btn btn-primary" type="submit"> Sign Up </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Already account = Login -->
            <div class="row mt-3">
                <div class="col-12 text-center">
                    <p class="text-muted">Already have account? <a href="{{ route('login') }}"
                            class="text-dark ms-1"><b>Sign
                                In</b></a></p>
                </div>
            </div>
        </div>
    </div>
@endsection --}}
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6 col-xl-6">
            <div class="text-center">
                <a href="index.html">
                    <img src="{{ asset('assets/images/logo-dark.png') }}" alt="" height="22" class="mx-auto">
                </a>
                <p class="text-muted mt-2 mb-3">Responsive Admin Dashboard</p>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="text-center mb-3">
                        <h4 class="text-uppercase mt-0">Register</h4>
                    </div>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li class="text-danger">{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="row mb-2">
                            <div class="col-md-6">
                                <label for="username" class="form-label">Username <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="username" id="username"
                                    placeholder="Masukan username anda" value="{{ old('username') }}" required autofocus
                                    autocomplete="username">
                                @error('username')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="fullname" class="form-label">Nama Lengkap <span
                                        class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="fullname" id="fullname"
                                    value="{{ old('fullname') }}" placeholder="Masukan nama lengkap anda" required autofocus
                                    autocomplete="fullname">
                                @error('fullname')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="col-md-6">
                                <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                                <input class="form-control" type="email" name="email" value="{{ old('email') }}"
                                    id="email" placeholder="Masukan email anda" required autocomplete="email">
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="no_phone" class="form-label">No. Telepon <span
                                        class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="no_phone" value="{{ old('no_phone') }}"
                                    id="no_phone" placeholder="Masukan nomro telepon anda" required
                                    autocomplete="no_phone">
                                @error('no_phone')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="col-md-6">
                                <label for="password" class="form-label">Password <span class="text-danger">*</span></label>
                                <input class="form-control" type="password" id="password" name="password" required
                                    placeholder="Enter your password" autocomplete="new-password">
                                @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="password_confirmation" class="form-label">Confirm Password <span
                                        class="text-danger">*</span></label>
                                <input class="form-control" type="password" id="password_confirmation"
                                    name="password_confirmation" required placeholder="Enter your confirmation password"
                                    autocomplete="new-password">
                                @error('password_confirmation')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="referral_code" class="form-label">Kode referal</label>
                            <input class="form-control" type="text" name="referral_code"
                                value="{{ old('referral_code') }}" id="referral_code"
                                placeholder="Masukan kode referal anda" autocomplete="referral_code">
                            @error('referral_code')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="checkbox-signup" name="terms"
                                    required>
                                <label class="form-check-label" for="checkbox-signup">Saya menerima Syarat dan
                                    Ketentuan yang Berlaku</label>
                                @error('terms')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-2 text-center d-grid">
                            <button class="btn btn-primary" type="submit">Sign Up</button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Already have an account? -->
            <div class="row mt-3">
                <div class="col-12 text-center">
                    <p class="text-muted">Already have account? <a href="{{ route('login') }}"
                            class="text-dark ms-1"><b>Sign In</b></a></p>
                </div>
            </div>
        </div>
    </div>
@endsection

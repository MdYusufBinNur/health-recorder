@extends('view.home')
@section('content')
    <div class="m-5">
        <div class="nm-register justify-content-center align-items-center d-flex flex-column" >

            @if (session('resent'))
                <div class="alert alert-success m-2" role="alert">
                    {{ __('A new link has been sent to your email address. Please check and verify') }}
                </div>
            @endif

            <p class="login-p m-3" >{{ __('Verify Your Email Address') }}</p>

            <form class="nm-register-form col-4" method="POST" action="{{ route('verification.resend') }}">
                @csrf

                <button class="lg-button-submit" type="submit">{{ __('Resend Token') }}</button>

                <div class=" d-flex justify-content-between align-items-center">

                </div>

            </form>
            <div class="py-3"></div>

        </div>
    </div>

@endsection

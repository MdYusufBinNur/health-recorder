@extends('view.home')
@section('content')
    <div class="m-5">
        <div class="nm-register justify-content-center align-items-center d-flex flex-column" >

            @if (session('status'))
                <div class="alert alert-success m-2" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <p class="login-p m-3" >{{ __('Reset Password') }}</p>

            <form class="nm-register-form col-4" method="POST" action="{{ route('password.email') }}">
                @csrf


                <div class="form-group">
                    <label class="col-12" for="emailAddress">email</label>
                    <input type="email" id="emailAddress"  name="email" value="{{ old('email') }}" class="@error('email') is-invalid @enderror" required autocomplete="email" autofocus>

                    @error('email')
                    <strong style="color: red;">{{ $message }}</strong>
                    @enderror

                </div>

                <button class="lg-button-submit" type="submit">{{ __('Send Password Reset Link') }}</button>

            </form>
            <div class="py-3"></div>

        </div>
    </div>

@endsection


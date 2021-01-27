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

            <form class="nm-register-form col-4" method="POST" action="{{ route('password.update') }}">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">

                <div class="form-group">
                    <label class="col-12" for="emailAddress">email</label>
                    <input type="email" id="emailAddress"  name="email" value="{{ $email ?? old('email') }}" class="@error('email') is-invalid @enderror" required autocomplete="email" autofocus readonly>

                    @error('email')
                    <strong style="color: red;">{{ $message }}</strong>
                    @enderror

                </div>

                <div class="form-group">
                    <label class="col-12" for="password">password</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="col-12" for="cpassword">confirm password</label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                </div>

                <button class="lg-button-submit" type="submit">{{ __('Reset') }}</button>

            </form>
            <div class="py-3"></div>

        </div>
    </div>

@endsection



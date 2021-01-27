@extends('view.home')
@section('content')
    <div class="m-5">
        <div class="nm-register justify-content-center align-items-center d-flex flex-column" >

            <p class="login-p m-3" >  {{ __('Please confirm your password before continuing.') }}</p>

            <form class="nm-register-form col-4" method="POST" action="{{ route('password.confirm') }}">
                @csrf

                <div class="form-group">
                    <label class="col-12" for="password">password</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                    @enderror
                </div>
                <div class="form-group d-flex justify-content-around">
                    <div class="d-flex align-items-center justify-content-between">
                        <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        &nbsp;&nbsp;&nbsp;
                        <span class="text-white" >Remember Me</span>
                    </div>
                    @if (Route::has('password.request'))
                        <span> <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a></span>
                    @endif

                </div>

                <button class="lg-button-submit" type="submit">{{ __('Continue') }}</button>

            </form>
            <div class="py-3"></div>

        </div>
    </div>
@endsection

@extends('view.home')
@section('content')
    <div class="reg_field ">
        <div class="nm-register justify-content-center align-items-center d-flex flex-column">
            <div class="py-4"></div>
            <h1 class="text-center">Lets Get Started</h1>
            <div class="py-3"></div>
            <h2>SIGN UP</h2>
            <p class="login-p text-center">Already Have an account ? <a href="{{ route('login') }}">log in</a></p>

            <div class="d-flex" style="align-items: center">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <button class="login-button-label nav-link active text-sm-center" id="home-tab"
                                data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">
                            Designer
                        </button>
                    </li>
                    <li class="nav-item">
                        <button class="nav-link login-button-label" id="profile-tab" data-toggle="tab" href="#profile"
                                role="tab" aria-controls="profile" aria-selected="false">Employer
                        </button>
                    </li>
                </ul>

            </div>
            <div class="py-3"></div>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <form class="nm-register-form col-12" method="POST" action="{{ route('save_user') }}"
                          enctype="multipart/form-data">
                        @csrf()

                        <div class="form-group">
                            <label class="col-12" for="firstName">first name</label>

                            <input type="text" class="form-control @error('first_name') is-invalid @enderror"
                                   id="first_name" value="{{ old('first_name') }}" name="first_name">
                            @error('first_name')
                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="col-12" for="lastName">last name</label>
                            <input type="text" id="last_name"
                                   class="form-control @error('last_name') is-invalid @enderror"
                                   value="{{ old('last_name') }}" name="last_name">
                            @error('last_name')
                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="col-12" for="emailAddress">your email address</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                                   name="email" value="{{ old('email') }}">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="col-12" for="phone">Country</label>
                            <select title="-" class=" form-control" data-style="btn-dark  btn-block" data-size="4"
                                    name="role" id="role" required>
                                @if(!empty($countries))
                                    @foreach($countries as $key=>$country )
                                        @if($key == 0)
                                            <option value="{{ $country->country_name }}" selected>{{ $country->country_name }}</option>
                                        @else
                                            <option value="{{ $country->country_name }}" >{{ $country->country_name }}</option>
                                        @endif
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="col-12" for="phone">Phone</label>
                            <input type="tel" class="form-control @error('phone') is-invalid @enderror" id="phone"
                                   name="phone" value="{{ old('phone') }}">
                            @error('phone')
                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="col-12" for="phone">Select Image</label>
                            <input type="file" class="@error('image') is-invalid @enderror" id="image" name="image"
                                   value="{{ old('image') }}">
                            @error('image')
                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="col-12" for="password">password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                   name="password" required autocomplete="new-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="col-12" for="cpassword">confirm password</label>
                            <input id="password-confirm" type="password" class="form-control"
                                   name="password_confirmation" required autocomplete="new-password">
                        </div>

                        <div class="form-group d-flex justify-content-around mt-2">
                            <div class="d-flex align-items-center justify-content-between">
                                <input type="checkbox" class="" name="">
                                &nbsp;&nbsp;&nbsp;
                                <span class="text-white">I agree to the <a href="">Terms & Conditions</a></span>
                            </div>

                        </div>

                        <button class="lg-button-submit" type="submit">sign up</button>
                        <div class="py-3"></div>
                        <div class="nm-join-social d-flex justify-content-between align-items-center">
                            <p>Join with your social networks</p>
                            <div class="d-flex align-items-center">
                                <a href=""><i class="fab fa-facebook"></i></a>
                                <a href=""><i class="fab fa-facebook"></i></a>
                                <a href=""><i class="fab fa-google"></i></a>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <form class="nm-register-form col-12" method="POST" action="{{ route('save_buyer') }}">
                        @csrf()
                        <div class="form-group">
                            <label class="col-12" for="firstName">first name</label>
                            <input type="text" class="form-control @error('first_name') is-invalid @enderror"
                                   id="first_name" value="{{ old('first_name') }}" name="first_name">
                            @error('first_name')
                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="col-12" for="lastName">last name</label>
                            <input type="text" id="last_name"
                                   class="form-control @error('last_name') is-invalid @enderror"
                                   value="{{ old('last_name') }}" name="last_name">
                            @error('last_name')
                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="col-12" for="emailAddress">your email address</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                                   name="email" value="{{ old('email') }}">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="col-12" for="phone">Country</label>
                            <select title="-" class=" form-control" data-style="btn-dark  btn-block" data-size="4"
                                    name="role" id="role" required>
                                @if(!empty($countries))
                                    @foreach($countries as $key=>$country )
                                        @if($key == 0)
                                            <option value="{{ $country->country_name }}" selected>{{ $country->country_name }}</option>
                                        @else
                                            <option value="{{ $country->country_name }}" >{{ $country->country_name }}</option>
                                        @endif
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="col-12" for="phone">Phone</label>
                            <input type="tel" class="form-control @error('phone') is-invalid @enderror" id="phone"
                                   name="phone" value="{{ old('phone') }}">
                            @error('phone')
                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="col-12" for="phone">Select Image</label>
                            <input type="file" class="@error('image') is-invalid @enderror" id="image" name="image"
                                   value="{{ old('image') }}">
                            @error('image')
                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="col-12" for="password">password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                   name="password" required autocomplete="new-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="col-12" for="cpassword">confirm password</label>
                            <input id="password-confirm" type="password" class="form-control"
                                   name="password_confirmation" required autocomplete="new-password">
                        </div>

                        <div class="form-group d-flex justify-content-around mt-2">
                            <div class="d-flex align-items-center justify-content-between">
                                <input type="checkbox" class="" name="">
                                &nbsp;&nbsp;&nbsp;
                                <span class="text-white">I agree to the <a href="">Terms & Conditions</a></span>
                            </div>

                        </div>

                        <button class="lg-button-submit" type="submit">sign up</button>
                        <div class="py-3"></div>
                        <div class="nm-join-social d-flex justify-content-between align-items-center">
                            <p>Join with your social networks</p>
                            <div class="d-flex align-items-center">
                                <a href=""><i class="fab fa-facebook"></i></a>
                                <a href=""><i class="fab fa-facebook"></i></a>
                                <a href=""><i class="fab fa-google"></i></a>
                            </div>
                        </div>
                    </form>
                </div>

            </div>


            <div class="py-3"></div>
            <div class="text-center">
                <p>Welcome</p>
                <p>Create an account - it's simple and free</p>
                <div class="py-2"></div>
                <p>Work without limits</p>
                <p>We don't the number of Designer you can hire.</p>
                <div class="py-2"></div>
                <p>Easily make payments</p>
                <p>Use our SafePay service for a simple and secure solution to make and receive payments</p>
            </div>
            <div class="py-5"></div>
        </div>
    </div>
@endsection

{{--
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>--}}

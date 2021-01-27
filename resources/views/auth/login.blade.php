<html lang="en">
<head>
    <meta charset="utf-8">

    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('Admin/paper_dashboard/assets/img/apple-icon.png') }}">

    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('image/logo.png') }}">
    {{--    http://127.0.0.1:8000/View/img/logo.png--}}
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    <title>CMS ADMIN</title>

    <!-- Canonical SEO -->

    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport">
    <meta name="viewport" content="width=device-width">


    <!-- Bootstrap core CSS     -->
    <link href="{{ asset('Admin/paper_dashboard/assets/css/bootstrap.min.css') }}" rel="stylesheet">

    <!--  Paper Dashboard core CSS    -->
    <link href="{{ asset('Admin/paper_dashboard/assets/css/paper-dashboard.css') }}" rel="stylesheet">


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link  href="{{ asset('Admin/paper_dashboard/assets/css/demo.css') }}" rel="stylesheet">

    <link href="{{ asset('Admin/paper_dashboard/assets/css/themify-icons.css') }}" rel="stylesheet">
    <!--  Fonts and icons     -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Muli:400,300" rel="stylesheet" type="text/css">

<body>

<div class="wrapper wrapper-full-page">
    <div class="full-page login-page bg-light" data-color="black">
        <!--   you can change the color of the filter page using: data-color="blue | azure | green | orange | red | purple" -->
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-6 col-md-offset-4 col-sm-offset-3">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="card" data-background="color" data-color="blue">
                                <div class="card-header text-center">
                                    <h3 class="card-title">Login</h3>
                                </div>
                                <div class="card-content">
                                    <div class="form-group">
                                        <label>Email address</label>
                                        <input id="email" type="email" class="form-control  input-no-border @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                                <strong style="color: red">{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input id="password" type="password" class="form-control input-no-border @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong style="color: red;">{{ $message }}</strong>
                                        </span>
                                        @enderror

                                    </div>
                                </div>
                                <div class="card-footer text-center">
                                    <button type="submit" class="btn btn-fill btn-wd ">Let's go</button>
                                    <div class="forgot">

                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <footer class="footer footer-transparent">
        </footer>
        <div class="full-page-background" style="background-image: {{ asset('Admin/paper_dashboard/assets/img/background/background-2.jpg') }} "></div></div>
</div>
<script src="{{ asset('Admin/paper_dashboard/assets/js/jquery.min.js') }}"  type="text/javascript"></script>
<script src="{{ asset('Admin/paper_dashboard/assets/js/jquery-ui.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('Admin/paper_dashboard/assets/js/bootstrap.min.js') }}" type="text/javascript"></script>
</body>
</html>

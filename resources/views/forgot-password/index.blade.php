<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <link rel="shortcut icon" href="{{ url('assets/images/site-logo.png') }}" type="image/x-icon"/>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <title>Forgot Password Upskill</title>
    <link rel="stylesheet" href="{{ url('css/reset_password.css') }}">
    <link href="{{ url('assets/jquery-toastr/toastr.css') }}" rel="stylesheet" type="text/css">
    <script src="{{ url('assets/javascripts/jquery.min.js') }}" type="text/javascript"></script>
    <script type="text/javascript" src="{{ url('assets/jquery-toastr/toastr.js') }}"></script>
</head>
<body>
<div class="container padd-top">
    <div class="row">
        <div class="col-lg-6 col-lg-offset-3">
            @if(Session::has('success'))
                <script type="text/javascript">toastr["success"]('{!! session('success') !!}');</script>
            @endif
        </div>
        <div class="col-lg-6 col-lg-offset-3">
            @if(Session::has('error'))
                <script type="text/javascript">toastr["error"]('{!! session('error') !!}');</script>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-lg-offset-3 col-lg-6">
            <div class="box" style="text-align: center">
                <img src="{{ url('assets/images/site-logo.png') }}" width="auto" alt="Upskill Educator" s>
                <div class="info text-left" style="padding-top: 30px">
                    <h4 class="text-center">Reset Password</h4>
                    <form method="POST" action="{{ $url }}">
                        @csrf
                        <div class="form-group">
                            <label>
                                Password <span class="required">*</span>
                            </label>
                            <input type="password" class="form-control" required id="password"
                                   value="{{ old('password') }}"
                                   name="password" placeholder="Enter password">
                        </div>
                        <div class="form-group">
                            <label>
                                Confirm Password <span class="required">*</span>
                            </label>
                            <input type="password" class="form-control" required id="password"
                                   value="{{ old('re_password') }}"
                                   name="password_confirmation" placeholder="Enter confirm password">
                        </div>
                        <div class="form-group text-right">
                            <input type="submit" class="btn theme-btn" name="submit" value="Reset Password" id="submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>

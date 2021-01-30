@extends('website.layouts.app')

@section('title')
    Login - Up Skill Educator
@endsection

@section('content')
    <main id="main-content">
        <div class="innerbanner" style="background-image: url({{ url('assets/images/product-banner.jpg') }});">
            <div class="container">
                <h1>Login</h1>
                <div class="breadcrumbs">
                    <a href="{{ url('/') }}">Home</a>
                    <i class="fas fa-caret-right"></i>
                    <span>Login</span>
                </div>
            </div>
        </div>
        <div class="product-detail">
            <div class="container">
                <div class="detail-sub">
                    <div class="tab-content">
                        <div id="overview" class="tab-pane fade in active">
                            <div class="row">
                                <div class="col-lg-6 col-lg-offset-3">
                                    <div class="form-group text-center">
                                        @error('email')
                                        <span class="invalid-feedback" role="alert" style="color: red">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                        @error('password')
                                        <span class="invalid-feedback" role="alert" style="color: red">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                    <div
                                        style="background:url({{ url('assets/images/site-logo.png') }}) center center no-repeat; height: 100px">
                                    </div>
                                    <form action="{{ url('/pay') }}" method="post" class="form-input-style"
                                          id="loginForm">
                                        @csrf
                                        <div class="form-group">
                                            <label for="emailAddress">Email : <span
                                                    class="validation-error-label">*</span></label>
                                            <input type="email" name="email" required class="form-control"
                                                   value="{{ old('email') }}">
                                        </div>
                                       
                                        <div class="form-group text-center">
                                           <!--  <a class="btn btn-link" id="forgot" href="javascript:void(0)"
                                               data-toggle="modal" data-target="#forgotPassword">
                                                Forgot Your Password?
                                            </a> -->
                                            <a class="btn btn-link" id="create" href="{{ url('register') }}">
                                                Create an account ?
                                            </a>
                                            <br/>
                                            <br/>
                                            <button type="submit" class="site-btn">
                                                <i class="fas fa-lock"></i>
                                                Search
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <div id="forgotPassword" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <form action="{{ url('forgot-password/user?'.csrf_token()) }}" method="post">
                @csrf
                <input type="hidden" name="order_id" id="uuid">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title" id="myModalLabel">Forgot Password</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="emailAddress">Enter Email: <span class="validation-error-label">*</span></label>
                            <input type="email" name="email" required class="form-control" value="">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="site-btn">
                            Submit
                        </button>
                    </div>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
@endsection

@section('pagejs')
    <script type="text/javascript" src="{{ url('admin-assets/plugins/parsleyjs/parsley.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#loginForm').parsley();
        });
    </script>
@endsection


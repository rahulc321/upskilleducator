@extends('website.layouts.app')

@section('title')
    Register - Up Skill Educator
@endsection

@section('content')
    <main id="main-content">
        <div class="innerbanner" style="background-image: url({{ url('assets/images/product-banner.jpg') }});">
            <div class="container">
                <h1>Register</h1>
                <div class="breadcrumbs">
                    <a href="{{ url('/') }}">Home</a>
                    <i class="fas fa-caret-right"></i>
                    <span>Register</span>
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
                                    <div
                                        style="background:url({{ url('assets/images/site-logo.png') }}) center center no-repeat; height: 100px">
                                    </div>
                                    <form action="{{ route('register') }}" method="post" class="form-input-style"
                                          id="registerForm">
                                        @csrf
                                        <div class="form-group">
                                            <label for="fullname">Full Name : <span
                                                    class="validation-error-label">*</span></label>
                                            <input type="text" name="fullname" required class="form-control"
                                                   value="{{ old('fullname') }}">
                                        </div>
                                        @error('fullname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                        <div class="form-group">
                                            <label for="email">Email : <span
                                                    class="validation-error-label">*</span></label>
                                            <input type="email" name="email" required class="form-control"
                                                   value="{{ old('email') }}">
                                        </div>
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                        <div class="form-group">
                                            <label for="phone_no">Phone Number : <span
                                                    class="validation-error-label">*</span></label>
                                            <input type="number" name="phone_no" required class="form-control"
                                                   value="{{ old('phone_no') }}">
                                        </div>
                                        @error('phone_no')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                        {{--<div class="form-group">
                                            <label for="job_title">Job Title : <span
                                                    class="validation-error-label">*</span></label>
                                            <input type="text" name="job_title" required class="form-control"
                                                   value="{{ old('job_title') }}">
                                        </div>
                                        @error('job_title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                        <div class="form-group">
                                            <label for="company_name">Company Name : <span
                                                    class="validation-error-label">*</span></label>
                                            <input type="text" name="company_name" required class="form-control"
                                                   value="{{ old('company_name') }}">
                                        </div>
                                        @error('company_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                        <div class="form-group">
                                            <label for="company_address">Company Address : <span
                                                    class="validation-error-label">*</span></label>
                                            <textarea name="company_address" id="company_address" required
                                                      class="form-control">{{ old('company_address') }}</textarea>
                                        </div>
                                        @error('company_addres')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror--}}
                                        <div class="form-group">
                                            <label for="password">Password : <span
                                                    class="validation-error-label">*</span></label>
                                            <input type="password" id="password" name="password" required
                                                   class="form-control">
                                        </div>
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                        <div class="form-group">
                                            <label for="confirm_password">Confirm Password : <span
                                                    class="validation-error-label">*</span></label>
                                            <input type="password" name="confirm_password" required
                                                   data-parsley-equalto="#password"
                                                   data-parsley-error-message="Confirm password does not match with password."
                                                   class="form-control">
                                        </div>
                                        @error('confirm_password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                        <div class="form-group text-center">
                                            <button type="submit" class="site-btn">
                                                Register
                                            </button>
                                            <br/>
                                            <br/>
                                            <a class="btn btn-link" id="forgot" href="{{ url('login') }}">
                                                Return To Login
                                            </a>
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
@endsection

@section('pagejs')
    <script type="text/javascript" src="{{ url('admin-assets/plugins/parsleyjs/parsley.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#registerForm').parsley();
        });
    </script>
@endsection

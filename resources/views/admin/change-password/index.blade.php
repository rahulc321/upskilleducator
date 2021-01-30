@extends('admin.layouts.app')

@section('title')
    Change Password
@endsection

@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <form action="{{ url(\App\Utils\AppConstant::ADMIN_URL.'change-password') }}" id="changePass" method="post">
                @csrf
                <div class="card-box">
                    <h4 class="m-t-0 header-title"><b>Change Profile</b></h4>
                    <p class="text-muted font-13 m-b-30"></p>
                    <div class="form-group">
                        <label for="emailAddress">Current Password</label>
                        <input type="password" name="old_password" required="" placeholder="Enter current password"
                               class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="userName">New Password</label>
                        <input type="password" name="password" required placeholder="Enter new password"
                               class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="pass1">Old Password</label>
                        <input type="password" name="re_password" required placeholder="Enter new password"
                               class="form-control">
                    </div>
                    <div class="form-group text-right m-b-0">
                        <button class="btn btn-primary waves-effect waves-light" type="submit">
                            Submit
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('js')
    <script type="text/javascript" src="{{ url('admin-assets/plugins/parsleyjs/parsley.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#changePass').parsley();
        });
    </script>
@endsection

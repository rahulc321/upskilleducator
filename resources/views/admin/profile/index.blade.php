@extends('admin.layouts.app')

@section('title')
    Change Profile
@endsection

@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <form action="{{ url(\App\Utils\AppConstant::ADMIN_URL.'profile') }}" id="profile" method="post"
                  enctype="multipart/form-data">
                @csrf
                <div class="card-box">
                    <h4 class="m-t-0 header-title"><b>Change Profile</b></h4>
                    <p class="text-muted font-13 m-b-30"></p>
                    <form action="#" data-parsley-validate="" novalidate="">
                        <div class="form-group">
                            <label for="emailAddress">Email Address</label>
                            <input type="email" name="email" disabled class="form-control" value="{{ $admin->email }}">
                        </div>
                        <div class="form-group">
                            <label for="userName">User Name *</label>
                            <input type="text" name="username" required="" placeholder="Enter user name"
                                   class="form-control" value="{{ $admin->name }}">
                        </div>
                        <div class="form-group">
                            <label for="pass1">Profile Picture </label>
                            <input type="file" class="filestyle" name="profile_pic" data-buttonname="btn-primary">
                        </div>
                        <div class="form-group text-right m-b-0">
                            <button class="btn btn-primary waves-effect waves-light" type="submit">
                                Submit
                            </button>
                        </div>
                    </form>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ url('assets/plugins/bootstrap-filestyle/js/bootstrap-filestyle.min.js') }}"
            type="text/javascript"></script>
    <script type="text/javascript" src="{{ url('assets/plugins/parsleyjs/parsley.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#profile').parsley();
        });
    </script>
@endsection

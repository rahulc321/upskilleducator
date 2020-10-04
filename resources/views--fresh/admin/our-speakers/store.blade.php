@extends('admin.layouts.app')

@section('title')
    Create New Speaker
@endsection

@section('css')
    <link href="{{ url('admin-assets/plugins/summernote/summernote.css') }}" rel="stylesheet"/>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <form action="{{ route('our-speaker.store') }}" id="store" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-box">
                    <h4 class="m-t-0 header-title"><b>Create New Speaker</b></h4>
                    <p class="text-muted font-13 m-b-30"></p>
                    <div class="form-group">
                        <label for="emailAddress">Speaker Name <span class="validation-error-label">*</span></label>
                        <input type="text" name="title" required class="form-control" value="{{ old('title') }}">
                    </div>
                    <div class="form-group">
                        <label for="userName">Speaker Image <span class="validation-error-label">*</span></label>
                        <input type="file" class="filestyle" required name="profile_pic"
                               data-buttonname="btn-primary">
                    </div>
                    <br/>
                    <div class="form-group">
                        <label for="pass1">Description <span class="validation-error-label">*</span></label>
                        <textarea name="description" id="description" class="form-control"
                                  required>{{ old('description') }}</textarea>
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
    <script src="{{ url('admin-assets/plugins/bootstrap-filestyle/js/bootstrap-filestyle.min.js') }}"
            type="text/javascript"></script>
    <script type="text/javascript" src="{{ url('admin-assets/plugins/parsleyjs/parsley.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#store').parsley();
        });
    </script>
@endsection

@extends('admin.layouts.app')

@section('title')
    Update Content
@endsection

@section('css')
    <link href="{{ url('admin-assets/plugins/summernote/summernote.css') }}" rel="stylesheet"/>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <form action="{{ url(\App\Utils\AppConstant::ADMIN_URL.'update-application-data') }}" id="store"
                  method="post">
                @csrf
                <div class="card-box">
                    <h4 class="m-t-0 header-title"><b>Update Content</b></h4>
                    <p class="text-muted font-13 m-b-30"></p>
                    <input type="hidden" value="{{ $type }}" name="type">
                    <div class="form-group">
                        <label for="pass1">Description <span class="validation-error-label">*</span></label>
                        <textarea name="description" id="description" class="summernote"
                                  required>@isset($app_data){{ $app_data->description }}@endif</textarea>
                    </div>
                    <div class="form-group text-right m-b-0">
                        <button class="btn btn-primary waves-effect waves-light" type="submit">
                            Update
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
    <script src="{{ url('admin-assets/plugins/summernote/summernote.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('admin-assets/plugins/parsleyjs/parsley.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#store').parsley();
            $('.summernote').summernote({
                height: 350,
                minHeight: null,
                maxHeight: null,
                focus: false
            });
            $('.inline-editor').summernote({
                airMode: true
            });
        });
    </script>
@endsection

@extends('admin.layouts.app')

@section('title')
    Update Homepage Content
@endsection

@section('css')
    <link href="{{ url('admin-assets/plugins/summernote/summernote.css') }}" rel="stylesheet"/>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-6">
            <form action="{{ url(\App\Utils\AppConstant::ADMIN_URL.'homepage-content') }}" id="store" method="post"
                  enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{ $homepage->id }}">
                <div class="card-box">
                    <h4 class="m-t-0 header-title"><b>Update Homepage Content</b></h4>
                    <p class="text-muted font-13 m-b-30"></p>
                    <div class="form-group">
                        <label for="userName">Homepage Banner <span class="validation-error-label">*</span></label>
                        <input type="file" class="filestyle" required name="homepage_banner"
                               data-buttonname="btn-primary">
                    </div>
                    <br/>
                    <div class="form-group">
                        <label for="pass1">Homepage Content 1 Image <span
                                class="validation-error-label">*</span></label>
                        <input type="file" class="filestyle" name="homepage_content_1_img"
                               data-buttonname="btn-primary">
                    </div>
                    <div class="form-group">
                        <label for="emailAddress">Homepage Content 1 <span
                                class="validation-error-label">*</span></label>
                        <input type="text" name="homepage_content_1" class="form-control"
                               required value="{{ $homepage->homepage_text1 }}">
                    </div>
                    <div class="form-group">
                        <label for="emailAddress">Homepage Secondary Content 1 <span
                                class="validation-error-label">*</span></label>
                        <input type="text" name="homepage_secondary_content_1" class="form-control"
                               required value="{{ $homepage->homepage_secondary_text1 }}">
                    </div>
                    <div class="form-group">
                        <label for="pass1">Homepage Content 2 Image <span
                                class="validation-error-label">*</span></label>
                        <input type="file" class="filestyle" name="homepage_content_2_img"
                               data-buttonname="btn-primary">
                    </div>
                    <div class="form-group">
                        <label for="emailAddress">Homepage Content 2 <span
                                class="validation-error-label">*</span></label>
                        <input type="text" name="homepage_content_2" class="form-control"
                               required value="{{ $homepage->homepage_text2 }}">
                    </div>
                    <div class="form-group">
                        <label for="emailAddress">Homepage Secondary Content 2 <span
                                class="validation-error-label">*</span></label>
                        <input type="text" name="homepage_secondary_content_2" class="form-control"
                               required value="{{ $homepage->homepage_secondary_text2 }}">
                    </div>
                    <div class="form-group">
                        <label for="pass1">Homepage Content 3 Image <span
                                class="validation-error-label">*</span></label>
                        <input type="file" class="filestyle" name="homepage_content_3-img"
                               data-buttonname="btn-primary">
                    </div>
                    <div class="form-group">
                        <label for="emailAddress">Homepage Content 3 <span
                                class="validation-error-label">*</span></label>
                        <input type="text" name="homepage_content_3" class="form-control"
                               required value="{{ $homepage->homepage_text3 }}">
                    </div>
                    <div class="form-group">
                        <label for="emailAddress">Homepage Secondary Content 3 <span
                                class="validation-error-label">*</span></label>
                        <input type="text" name="homepage_secondary_content_3" class="form-control"
                               required value="{{ $homepage->homepage_secondary_text3 }}">
                    </div>
                    <div class="form-group text-right m-b-0">
                        <button class="btn btn-primary waves-effect waves-light" type="submit">
                            Submit
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-6">
            <div class="card-box">
                <div class="form-group">
                    <label for="emailAddress">Banner <span class="validation-error-label">*</span></label>
                    <img src="{{ $homepage->homepage_banner }}" alt="{{ $homepage->homepage_banner }}" width="100%">
                </div>
                <div class="form-group">
                    <label for="userName">Content-1 <span class="validation-error-label">*</span></label>
                    <br/>
                    <img src="{{ $homepage->homepage_text1_picture }}" alt="{{ $homepage->homepage_text1_picture }}"
                         width="100%"
                         style="background-image: linear-gradient(to right, #FF6463, #FFA971) !important; width: 50px;">
                    : {{ $homepage->homepage_text1 }} <br/> {{ $homepage->homepage_secondary_text1 }}
                </div>
                <br/>
                <div class="form-group">
                    <label for="userName">Content-2 <span class="validation-error-label">*</span></label>
                    <br/>
                    <img src="{{ $homepage->homepage_text2_picture }}" alt="{{ $homepage->homepage_text2_picture }}"
                         width="100%"
                         style="background-image: linear-gradient(to right, #FF6463, #FFA971) !important; width: 50px;">
                    : {{ $homepage->homepage_text2 }} <br/> {{ $homepage->homepage_secondary_text2 }}
                </div>
                <br/>
                <div class="form-group">
                    <label for="userName">Content-1 <span class="validation-error-label">*</span></label>
                    <br/>
                    <img src="{{ $homepage->homepage_text3_picture }}" alt="{{ $homepage->homepage_text3_picture }}"
                         width="100%"
                         style="background-image: linear-gradient(to right, #FF6463, #FFA971) !important; width: 50px;">
                    : {{ $homepage->homepage_text3 }} <br/> {{ $homepage->homepage_secondary_text3 }}
                </div>
            </div>
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

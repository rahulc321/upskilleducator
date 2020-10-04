@extends('admin.layouts.app')

@section('title')
    Update Product
@endsection

@section('css')
    <link href="{{ url('admin-assets/plugins/summernote/summernote.css') }}" rel="stylesheet"/>
    <link href="{{ url('assets/css/owl.carousel.min.css') }}" rel="stylesheet"/>
    <link href="{{ url('assets/css/global.css') }}" rel="stylesheet"/>
    <link href="{{ url('admin-assets/plugins/clockpicker/css/bootstrap-clockpicker.min.css') }}" rel="stylesheet">
    <link href="{{ url('admin-assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}"
          rel="stylesheet">
@endsection

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <form action="{{ route('products.update', $product->id) }}" id="store" method="post"
                  enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="card-box">
                    <h4 class="m-t-0 header-title"><b>Update Product</b></h4>
                    <p class="text-muted font-13 m-b-30"></p>
                    <form action="#" data-parsley-validate="" novalidate="">
                        <div class="form-group">
                            <label for="pass1">Select Category <span class="validation-error-label">*</span></label>
                            <select name="category" id="category" class="form-control" required>
                                <option value="">Select Category</option>
                                @foreach($categories as $category)
                                    @if($product->category_id == $category->id)
                                        <option selected
                                                value="{{ $category->id }}">{{ strip_tags($category->name) }}</option>
                                    @else
                                        <option value="{{ $category->id }}">{{ strip_tags($category->name) }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="pass1">Select Type <span class="validation-error-label">*</span></label>
                            <select name="type" id="type" class="form-control" required>
                                <option value="">Select Type</option>
                                @foreach(\App\Utils\AppConstant::TYPES as $key => $value)
                                    @if($product->type == $key)
                                        <option selected value="{{ $key }}">{{ $value }}</option>
                                    @else
                                        <option value="{{ $key }}">{{ $value }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="emailAddress">Title <span class="validation-error-label">*</span></label>
                            <input type="text" name="title" required class="form-control" value="{{ $product->title }}">
                        </div>
                        <div class="form-group">
                            <label for="emailAddress">Speaker Name <span class="validation-error-label">*</span></label>
                            <input type="text" name="speaker_name" required class="form-control"
                                   value="{{ $product->speaker_name }}">
                        </div>
                        <div class="form-group">
                            <label for="emailAddress">Price <span class="validation-error-label">*</span></label>
                            <input type="number" name="price" required class="form-control"
                                   value="{{ $product->price }}">
                        </div>
                        <div class="form-group">
                            <label for="emailAddress">Webinar Date <span
                                    class="validation-error-label">*</span></label>
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="mm/dd/yyyy" id="datepicker"
                                       name="webinar_date" required
                                       value="{{ \Carbon\Carbon::parse($product->webinar_date_time)->format('m/d/Y') }}">
                                <span class="input-group-addon bg-warning b-0 text-white"><i
                                        class="icon-calender"></i></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="emailAddress">Webinar Time <span
                                    class="validation-error-label">*</span></label>
                            <div class="input-group clockpicker " data-placement="top" data-align="top"
                                 data-autoclose="true">
                                <input type="text" class="form-control"
                                       value="{{ \Carbon\Carbon::parse($product->webinar_date_time)->format('h:i') }}"
                                       name="webinar_time" required>
                                <span class="input-group-addon"> <span class="glyphicon glyphicon-time"></span> </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="emailAddress">Duration <span class="validation-error-label">*</span></label>
                            <input type="text" name="duration" required class="form-control"
                                   value="{{ $product->duration }}">
                        </div>
                        <div class="form-group">
                            <label for="userName">Speaker Image <span class="validation-error-label">*</span></label>
                            <input type="file" class="filestyle" data-icon="false" name="speaker_image"
                                   data-buttonname="btn-primary">
                        </div>
                        <div class="form-group">
                            <label for="userName">Product Image <span class="validation-error-label">*</span></label>
                            <input type="file" class="filestyle" data-icon="false" name="product_image"
                                   data-buttonname="btn-primary">
                        </div>
                        <div class="form-group">
                            <div class="detail-sub" style="box-shadow: none;">
                                <ul class="link-tab">
                                    <li class="active"><a data-toggle="tab" href="#overview">Overview</a></li>
                                    <li><a data-toggle="tab" href="#speaker">Speaker</a></li>
                                    <li><a data-toggle="tab" href="#ceus">CEUs</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div id="overview" class="tab-pane fade in active">
                                        <textarea name="overview" id="overview" class="summernote"
                                                  required>{{$product->overview }}</textarea>
                                    </div>
                                    <div id="speaker" class="tab-pane fade">
                                        <textarea name="speaker" id="speaker" class="summernote"
                                                  required>{{ $product->speaker }}</textarea>
                                    </div>
                                    <div id="ceus" class="tab-pane fade">
                                        <textarea name="ceus" id="ceus" class="summernote"
                                                  required>{{ $product->ceus }}</textarea>
                                    </div>
                                </div>
                            </div>
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
    <script src="{{ url('admin-assets/plugins/moment/moment.js') }}"></script>
    <script src="{{ url('admin-assets/plugins/clockpicker/js/bootstrap-clockpicker.min.js') }}"></script>
    <script src="{{ url('admin-assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ url('admin-assets/plugins/bootstrap-filestyle/js/bootstrap-filestyle.min.js') }}"
            type="text/javascript"></script>
    <script src="{{ url('admin-assets/plugins/summernote/summernote.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('admin-assets/plugins/parsleyjs/parsley.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#store').parsley();
            $('#datepicker').datepicker();
            $('.clockpicker').clockpicker({
                donetext: 'Done'
            });
            $('.summernote').summernote({
                height: 350,
                minHeight: null,
                maxHeight: null,
                focus: false,
                fontSizes: ['8', '9', '10', '11', '12', '14', '18', '24', '36', '48', '64', '82', '150']
            });
        });
    </script>
@endsection

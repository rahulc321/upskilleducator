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
            <form action="{{ url('admin/update-package', $product->id) }}" id="store" method="post"
                  enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="card-box">
                    <h4 class="m-t-0 header-title"><b>Update Product</b></h4>
                    <p class="text-muted font-13 m-b-30"></p>
                    <form action="#" data-parsley-validate="" novalidate="">
                        
                         
                        <div class="form-group">
                            <label for="emailAddress">Title <span class="validation-error-label">*</span></label>
                            <input type="text" name="title" required class="form-control" value="{{ $product->title }}">
                        </div>
                        
                        <div class="form-group">
                            <label for="emailAddress">Price <span class="validation-error-label">*</span></label>
                            <input type="number" name="price"   class="form-control"
                                   value="{{ $product->price }}">
                        </div>
                        <div class="form-group">
                            <label for="emailAddress">Credit <span class="validation-error-label">*</span></label>
                            <input type="number" name="package_credit"   class="form-control"
                                   value="{{ $product->package_credit }}">
                        </div>

                          
                        <div class="form-group">
                            <div class="detail-sub" style="box-shadow: none;">
                                <ul class="link-tab">
                                    <li class="active"><a data-toggle="tab" href="#overview">Overview</a></li>
                                     
                                </ul>
                                <div class="tab-content">
                                    <div id="overview" class="tab-pane fade in active">
                                        <textarea name="overview" id="overview" class="summernote"
                                                  required>{{$product->overview }}</textarea>
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


            $('.checkbox').each(function(){
                var id= $(this).attr('data');
                var checkValue= $(this).is(':checked')
                if(checkValue==true){
                    $('.check'+id).val(1);
                }else{
                    $('.check'+id).val(0);
                }
            });

             $('.checkbox').click(function(){
                var id= $(this).attr('data');
                var checkValue= $(this).is(':checked')
                if(checkValue==true){
                    $('.check'+id).val(1);
                }else{
                    $('.check'+id).val(0);
                }
            });


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

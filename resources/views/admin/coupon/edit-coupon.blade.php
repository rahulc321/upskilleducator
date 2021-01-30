<?php  error_reporting(0); ?>
@extends('admin.layouts.app')

@section('title')
    Edit Coupon
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
            <form action="{{ url('/') }}/admin/update-coupon/{{$edit->id}}" id="store" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-box">
                    <h4 class="m-t-0 header-title"><b><i class="ti-gift"></i> Edit Coupon</b></h4>
                    <p class="text-muted font-13 m-b-30"></p>
                    <form action="#" data-parsley-validate="" novalidate="">
                        
                         
                        <div class="form-group">
                            <label for="emailAddress">Coupon Code <span class="validation-error-label">*</span></label>
                           <input type="text" class="form-control" id="txtName" name="coupon_code" value="{{$edit->coupon_code}}"  required="">
                        </div>
                        <div class="form-group">
                            <label for="emailAddress">Valid From <span
                                    class="validation-error-label">*</span></label>
                            <div class="input-group">
                                <input type="text" class="form-control datepicker" placeholder="yyyy/mm/dd"  
                                       name="from"   value="{{$edit->start_date}}" >
                                <span class="input-group-addon bg-warning b-0 text-white"><i
                                        class="icon-calender"></i></span>
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="emailAddress">Valid to <span
                                    class="validation-error-label">*</span></label>
                            <div class="input-group">
                                <input type="text" class="form-control datepicker" placeholder="yyyy/mm/dd"  
                                       name="to" value="{{$edit->end_date}}">
                                <span class="input-group-addon bg-warning b-0 text-white"><i
                                        class="icon-calender"></i></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="emailAddress">Uses <span class="validation-error-label">*</span></label>
                         <input type="text" class="form-control fixamt" id="fixamt" name="uses" value="{{$edit->uses}}" >
                        </div>

                        <div class="form-group">
                            <label for="emailAddress">Coupon Amount $ <span class="validation-error-label">*</span></label>
                          <input type="text" class="form-control" id="uses" name="famount" required=""  value="{{$edit->price}}">
                        </div>

                         
                        <div class="form-group text-right m-b-0">
                            <button class="btn btn-primary waves-effect waves-light" type="submit">
                                Update
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
            $('.datepicker').datepicker();
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

@extends('admin.layouts.app')

@section('title')
    Update User
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
            <form action="{{ url(\App\Utils\AppConstant::ADMIN_URL.'update/users/'.$user->id) }}" id="store" method="post"
                  enctype="multipart/form-data">
                @csrf
                
                <div class="card-box">
                    <h4 class="m-t-0 header-title"><b>Update User</b></h4>
                    <p class="text-muted font-13 m-b-30"></p>
                    <form action="#" data-parsley-validate="" novalidate="">
                         
                       
                        <div class="form-group">
                            <label for="emailAddress">Full Name <span class="validation-error-label">*</span></label>
                            <input type="text" name="fullname" required class="form-control" value="{{$user->fullname}}">
                        </div>

                        <div class="form-group">
                            <label for="emailAddress">Job Title <span class="validation-error-label">*</span></label>
                            <input type="text" name="job_title" required class="form-control" value="{{$user->job_title}}">
                        </div>

                        <div class="form-group">
                            <label for="emailAddress">Company Address <span class="validation-error-label">*</span></label>
                            <input type="text" name="company_address" required class="form-control" value="{{$user->company_address}}">
                        </div>

                        <div class="form-group">
                            <label for="emailAddress">Company Name <span class="validation-error-label">*</span></label>
                            <input type="text" name="company_name" required class="form-control" value="{{$user->company_name}}">
                        </div>

                        <div class="form-group">
                            <label for="emailAddress">Email <span class="validation-error-label">*</span></label>
                            <input type="text" name="email" required class="form-control" value="{{$user->email}}">
                        </div>

                        <div class="form-group">
                            <label for="emailAddress">Phone <span class="validation-error-label">*</span></label>
                            <input type="text" name="phone" required class="form-control" value="{{$user->mobile_no}}">
                        </div>

                        <div class="form-group">
                            <label for="emailAddress">Status <span class="validation-error-label">*</span></label>
                            <select class="form-control" name="status">
                                <option value=""> Select Status</option>
                                <option value="1" <?php if($user->status==1){ echo 'selected'; } ?>> Active</option>
                                <option value="0" <?php if($user->status==0){ echo 'selected'; } ?>> Suspended</option>
                            </select>
                        </div>

                        <hr>
                        <div class="form-group">
                            <label for="emailAddress">New Password <span class="validation-error-label">*</span></label>
                            <input type="text" name="cpass"      class="form-control" >
                        </div>

                        <div class="form-group">
                            <label for="emailAddress">Confirm Password <span class="validation-error-label">*</span></label>
                            <input type="text" name="confirmpass"   class="form-control" >
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

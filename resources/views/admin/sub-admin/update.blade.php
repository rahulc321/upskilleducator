@extends('admin.layouts.app')

@section('title')
    Edit Sub Admin
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
            <form action="{{ url('/admin/subadmin') }}/{{$admin->id}}/update" id="store" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-box">
                    <h4 class="m-t-0 header-title"><b>Edit Sub Admin</b></h4>
                    <p class="text-muted font-13 m-b-30"></p>
                    <form action="#" data-parsley-validate="" novalidate="">
                         
                         
                        <div class="form-group">
                            <label for="emailAddress">Name <span class="validation-error-label">*</span></label>
                            <input type="text" name="fullname" required class="form-control" value="{{ $admin->name }}">
                        </div>
                        <div class="form-group">
                            <label for="emailAddress">Email <span class="validation-error-label">*</span></label>
                            <input type="email" name="email" required class="form-control" value="{{ $admin->email }}">
                        </div>

                         <label for="emailAddress">Permision <span class="validation-error-label">*</span></label>
                         <table id="datatable" class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>Page Name</th>
                        <th>Half</th>
                        <th>Full</th>
                         
                    </tr>
                    </thead>
                    <tbody>
                     <?php 
                     $permisionPage = DB::table('permision')->where('status',1)->get();


                    
                     ?> 
                       @foreach($permisionPage as $key=>$user)
                        <tr>
                             

                            <td>{{$user->page_name}}</td>
                             <td>
                                <input type="checkbox" class="radio"   name="check[<?=$key?>][]" data="Half" id="<?=$key?>" <?php if($pagepPermision[$key]['permision']=='Half'){ echo 'checked'; } ?> />


                                <!-- Hidden fields -->
                                <input type="hidden" name="pageId[]" value="{{$pagepPermision[$key]['id']}}"> 
                                <input type="hidden" name="permision[]"  class="per<?=$key?>" value="{{$pagepPermision[$key]['permision']}}">

                                <!-- Hidden fields -->
                            </td>
                             <td>
                                <input type="checkbox" class="radio" id="<?=$key?>"   name="check[<?=$key?>][]" data="Full" <?php if($pagepPermision[$key]['permision']=='Full'){ echo 'checked'; } ?>  /> 
                            </td>


                             
                             
                        </tr>

                    @endforeach
                    
                    </tbody>
                </table>

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

            $("input:checkbox").on('click', function() {
  // in the handler, 'this' refers to the box clicked on
              var $box = $(this);
              if ($box.is(":checked")) {
                // the name of the box is retrieved using the .attr() method
                // as it is assumed and expected to be immutable
                var group = "input:checkbox[name='" + $box.attr("name") + "']";
                // the checked state of the group/box on the other hand will change
                // and the current value is retrieved using .prop() method
                $(group).prop("checked", false);
                $box.prop("checked", true);
                var val= $(this).attr('data');
                var id= $(this).attr('id');
                //alert(val);
                $('.per'+id).val(val);
              } else {
                $box.prop("checked", false);
                var id= $(this).attr('id');
                $('.per'+id).val(' ');
              }
            });
            
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

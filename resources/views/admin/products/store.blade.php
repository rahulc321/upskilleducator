@extends('admin.layouts.app')

@section('title')
    Create Product
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
            <form action="{{ route('products.store') }}" id="store" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-box">
                    <h4 class="m-t-0 header-title"><b>Create New Product</b></h4>
                    <p class="text-muted font-13 m-b-30"></p>
                    <form action="#" data-parsley-validate="" novalidate="">
                        <div class="form-group">
                            <label for="pass1">Select Category <span class="validation-error-label">*</span></label>
                            <select name="category" id="category" class="form-control" required>
                                <option value="">Select Category</option>
                                @foreach($categories as $category)
                                    @if(old('category') === $category->id)
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
                                    @if(old('type') === $key)
                                        <option selected value="{{ $key }}">{{ $value }}</option>
                                    @else
                                        <option value="{{ $key }}">{{ $value }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="emailAddress">Title <span class="validation-error-label">*</span></label>
                            <input type="text" name="title" required class="form-control" value="{{ old('title') }}">
                        </div>
                        <!--<div class="form-group">-->
                        <!--    <label for="emailAddress">Speaker Name <span class="validation-error-label">*</span></label>-->
                        <!--    <input type="text" name="speaker_name" required class="form-control"-->
                        <!--           value="{{ old('speaker_name') }}">-->
                        <!--</div>-->
                         <div class="form-group">
                            <label for="emailAddress">Speaker Name <span class="validation-error-label">*</span></label>
                            <select name="speaker_name"   class="form-control" required>
                                <option value="">Select Speaker</option>
                                <?php $spks= \App\Models\OurSpeaker::where('status',1)->get(); ?>
                                
                                @foreach($spks as $speaker)
                                <option value="{{$speaker->title}}">{{$speaker->title}}</option>

                                @endforeach

                            </select>
                        </div>
                        <div class="form-group">
                            <label for="emailAddress">Price <span class="validation-error-label">*</span></label>
                            <input type="number" name="price" required class="form-control" value="{{ old('price') }}">
                        </div>

                        <!-- live -->
                        <?php 
                        error_reporting(0);
                        $tag = DB::table('program_tag')->get();

                        $i=0;

                        
                        foreach ($tag as $key => $value) {
                              
                        ?>
                          
                         <div class="col-sm-6">
                                <div class="form-group">
                                    

                                @if($i==0)
                                <label for="emailAddress">Program <span class="validation-error-label">*</span></label>
                                @endif

                                <input type="text" name="p_name[<?=$i?>][name]" required class="form-control"
                                value="{{ $value->tag_name }}" readonly placeholder="Program Name">
                                </div>
                           </div>
                           <div class="col-sm-2">
                                <div class="form-group">
                                @if($i==0)
                                <label for="emailAddress">Price <span class="validation-error-label">*</span></label>
                                @endif
                                <input type="number" name="p_name[<?=$i?>][price]" required class="form-control"
                                value="{{ old('live_price ') }}" placeholder="Price">
                                </div>
                           </div>

                           <div class="col-sm-2">
                                <div class="form-group">
                                @if($i==0)
                                <label for="emailAddress">Show/Hiide<span class="validation-error-label"></span></label>
                                @endif
                                <input type="checkbox" data="<?=$i?>" class="checkbox" name="p_name[<?=$i?>][show]"  
                                   <?php if(old('live_show ')==1){ echo 'checked'; } ?> style="width: 51px;height: 34px;">
                                <input type="hidden" class="check<?=$i?>" name="p_name[<?=$i?>][show1]" value="0">
                                </div>
                           </div>
                           <div class="col-sm-2">
                                <div class="form-group">
                                @if($i==0)
                                <label for="emailAddress">Type<span class="validation-error-label"></span></label>
                                @endif
                                <input type="text" data="<?=$i?>" class="form-control" name="p_name[<?=$i?>][type]"  
                                    style="width: 51px;height: 34px;" value="{{$value->type}}">
                                
                                </div>
                           </div>

                            <?php 
                            $i++;
                        } ?>
                        <!-- new changes -->



                        <div class="form-group">
                            <label for="emailAddress">Webinar Date <span
                                    class="validation-error-label">*</span></label>
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="mm/dd/yyyy" id="datepicker"
                                       name="webinar_date" required value="{{ old('webinar_date') }}">
                                <span class="input-group-addon bg-warning b-0 text-white"><i
                                        class="icon-calender"></i></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="emailAddress">Webinar Time <span
                                    class="validation-error-label">*</span></label>
                            <div class="input-group clockpicker " data-placement="top" data-align="top"
                                 data-autoclose="true">
                                <input type="text" class="form-control" value="13:14" name="webinar_time" required>
                                <span class="input-group-addon"> <span class="glyphicon glyphicon-time"></span> </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="emailAddress">Duration <span class="validation-error-label">*</span></label>
                            <input type="text" name="duration" required class="form-control"
                                   value="{{ old('duration') }}">
                        </div>
                        <div class="form-group">
                            <label for="userName">Speaker Image <span class="validation-error-label">*</span></label>
                            <input type="file" class="filestyle" data-icon="false" name="speaker_image" required
                                   data-buttonname="btn-primary">
                        </div>
                        <div class="form-group">
                            <label for="userName">Product Image <span class="validation-error-label">*</span></label>
                            <input type="file" class="filestyle" data-icon="false" name="product_image" required
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
                                                  required>{{ old('overview') }}</textarea>
                                    </div>
                                    <div id="speaker" class="tab-pane fade">
                                        <textarea name="speaker" id="speaker" class="summernote"
                                                  required>{{ old('speaker') }}</textarea>
                                    </div>
                                    <div id="ceus" class="tab-pane fade">
                                        <textarea name="ceus" id="ceus" class="summernote"
                                                  required>{{ old('ceus') }}</textarea>
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

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
                        <div class="form-group">
                            <label for="emailAddress">Speaker Name <span class="validation-error-label">*</span></label>
                            <input type="text" name="speaker_name" required class="form-control"
                                   value="{{ old('speaker_name') }}">
                        </div>
                      <!--   <div class="form-group">
                            <label for="emailAddress">Price <span class="validation-error-label">*</span></label>
                            <input type="number" name="price" required class="form-control" value="{{ old('price') }}">
                        </div> -->

                        <!-- live -->
                         <div class="col-sm-6">
                                <div class="form-group">
                                <label for="emailAddress">Live <span class="validation-error-label">*</span></label>
                                <input type="text" name="live" required class="form-control"
                                value="{{ old('live') }}">
                                </div>
                           </div>
                           <div class="col-sm-4">
                                <div class="form-group">
                                <label for="emailAddress">Price <span class="validation-error-label">*</span></label>
                                <input type="number" name="live_price" required class="form-control"
                                value="{{ old('live_price ') }}">
                                </div>
                           </div>

                           <div class="col-sm-2">
                                <div class="form-group">
                                <label for="emailAddress">Show/Hiide<span class="validation-error-label"></span></label>
                                <input type="checkbox" name="live_show"  
                                value="1" <?php if(old('live_show ')==1){ echo 'checked'; } ?> style="width: 51px;height: 32px;">
                                </div>
                           </div>

                        <!-- 2nd -->
                         <div class="col-sm-6">
                                <div class="form-group">
                                <label for="emailAddress">Digital Download <span class="validation-error-label">*</span></label>
                                <input type="text" name="digital_download" required class="form-control"
                                value="{{ old('digital_download') }}">
                                </div>
                           </div>
                           <div class="col-sm-4">
                                <div class="form-group">
                                <label for="emailAddress">Price <span class="validation-error-label">*</span></label>
                                <input type="number" name="digital_download_price" required class="form-control"
                                value="{{ old('digital_download_price ') }}">
                                </div>
                           </div>

                           <div class="col-sm-2">
                                <div class="form-group">
                                <label for="emailAddress">Show/Hiide<span class="validation-error-label"></span></label>
                                <input type="checkbox" name="digital_download_show"  
                                value="1" <?php if(old('digital_download_show ')==1){ echo 'checked'; } ?> style="width: 51px;height: 32px;">
                                </div>
                           </div>

                           <!-- 3nd -->
                         <div class="col-sm-6">
                                <div class="form-group">
                                <label for="emailAddress">Live + Transcript <span class="validation-error-label">*</span></label>
                                <input type="text" name="live_transcript" required class="form-control"
                                value="{{ old('live_transcript') }}">
                                </div>
                           </div>
                           <div class="col-sm-4">
                                <div class="form-group">
                                <label for="emailAddress">Price <span class="validation-error-label">*</span></label>
                                <input type="number" name="live_transcript_price" required class="form-control"
                                value="{{ old('live_transcript_price') }}">
                                </div>
                           </div>

                           <div class="col-sm-2">
                                <div class="form-group">
                                <label for="emailAddress">Show/Hiide<span class="validation-error-label"></span></label>
                                <input type="checkbox" name="live_transcript_show"  
                                value="1" <?php if(old('live_transcript_show')==1){ echo 'checked'; } ?> style="width: 51px;height: 32px;">
                                </div>
                           </div>

                             <!-- 4nd -->
                         <div class="col-sm-6">
                                <div class="form-group">
                                <label for="emailAddress">Digital Download + Transcript<span class="validation-error-label">*</span></label>
                                <input type="text" name="dig_down_transcript" required class="form-control"
                                value="{{ old('dig_down_transcript') }}">
                                </div>
                           </div>
                           <div class="col-sm-4">
                                <div class="form-group">
                                <label for="emailAddress">Price <span class="validation-error-label">*</span></label>
                                <input type="number" name="dig_down_transcript_price" required class="form-control"
                                value="{{ old('dig_down_transcript_price') }}">
                                </div>
                           </div>

                           <div class="col-sm-2">
                                <div class="form-group">
                                <label for="emailAddress">Show/Hiide<span class="validation-error-label"></span></label>
                                <input type="checkbox" name="dig_down_transcript_show"  
                                value="1" <?php if(old('dig_down_transcript_show ')==1){ echo 'checked'; } ?> style="width: 51px;height: 32px;">
                                </div>
                           </div>

                           

                             <!-- 5nd -->
                         <div class="col-sm-6">
                                <div class="form-group">
                                <label for="emailAddress">DVD<span class="validation-error-label">*</span></label>
                                <input type="text" name="dvd" required class="form-control"
                                value="{{ old('dvd') }}">
                                </div>
                           </div>
                           <div class="col-sm-4">
                                <div class="form-group">
                                <label for="emailAddress">Price <span class="validation-error-label">*</span></label>
                                <input type="number" name="dvd_price" required class="form-control"
                                value="{{ old('dvd_price') }}">
                                </div>
                           </div>

                           <div class="col-sm-2">
                                <div class="form-group">
                                <label for="emailAddress">Show/Hiide<span class="validation-error-label"></span></label>
                                <input type="checkbox" name="dvd_show"  
                                value="1" <?php if(old('dvd_show ')==1){ echo 'checked'; } ?> style="width: 51px;height: 32px;">
                                </div>
                           </div>

                            <!-- 6nd -->
                         <div class="col-sm-6">
                                <div class="form-group">
                                <label for="emailAddress">Live + DVD<span class="validation-error-label">*</span></label>
                                <input type="text" name="live_dvd" required class="form-control"
                                value="{{ old('live_dvd') }}">
                                </div>
                           </div>
                           <div class="col-sm-4">
                                <div class="form-group">
                                <label for="emailAddress">Price <span class="validation-error-label">*</span></label>
                                <input type="number" name="live_dvd_price" required class="form-control"
                                value="{{ old('live_dvd_price') }}">
                                </div>
                           </div>

                           <div class="col-sm-2">
                                <div class="form-group">
                                <label for="emailAddress">Show/Hiide<span class="validation-error-label"></span></label>
                                <input type="checkbox" name="live_dvd_show"  
                                value="1" <?php if(old('live_dvd_show ')==1){ echo 'checked'; } ?> style="width: 51px;height: 32px;">
                                </div>
                           </div>


                            <!-- 7nd -->
                         <div class="col-sm-6">
                                <div class="form-group">
                                <label for="emailAddress">Live + DVD + Transcript<span class="validation-error-label">*</span></label>
                                <input type="text" name="live_dvd_transcript" required class="form-control"
                                value="{{ old('live_dvd_transcript') }}">
                                </div>
                           </div>
                           <div class="col-sm-4">
                                <div class="form-group">
                                <label for="emailAddress">Price <span class="validation-error-label">*</span></label>
                                <input type="number" name="live_dvd_transcript_price" required class="form-control"
                                value="{{ old('live_dvd_transcript_price') }}">
                                </div>
                           </div>

                           <div class="col-sm-2">
                                <div class="form-group">
                                <label for="emailAddress">Show/Hiide<span class="validation-error-label"></span></label>
                                <input type="checkbox" name="live_dvd_transcript_show"  
                                value="1" <?php if(old('live_dvd_transcript_show ')==1){ echo 'checked'; } ?> style="width: 51px;height: 32px;">
                                </div>
                           </div>

                             <!-- 8nd -->
                         <div class="col-sm-6">
                                <div class="form-group">
                                <label for="emailAddress">Live + Digital Download<span class="validation-error-label">*</span></label>
                                <input type="text" name="live_digi_download" required class="form-control"
                                value="{{ old('live_digi_download') }}">
                                </div>
                           </div>
                           <div class="col-sm-4">
                                <div class="form-group">
                                <label for="emailAddress">Price <span class="validation-error-label">*</span></label>
                                <input type="number" name="live_digi_download_price" required class="form-control"
                                value="{{ old('live_digi_download_price') }}">
                                </div>
                           </div>

                           <div class="col-sm-2">
                                <div class="form-group">
                                <label for="emailAddress">Show/Hiide<span class="validation-error-label"></span></label>
                                <input type="checkbox" name="live_digi_download_show"  
                                value="1" <?php if(old('live_digi_download_show  ')==1){ echo 'checked'; } ?> style="width: 51px;height: 32px;">
                                </div>
                           </div>

                             <!-- 9nd -->
                         <div class="col-sm-6">
                                <div class="form-group">
                                <label for="emailAddress">Transcript<span class="validation-error-label">*</span></label>
                                <input type="text" name="transcript" required class="form-control"
                                value="{{ old('transcript') }}">
                                </div>
                           </div>
                           <div class="col-sm-4">
                                <div class="form-group">
                                <label for="emailAddress">Price <span class="validation-error-label">*</span></label>
                                <input type="number" name="transcript_price" required class="form-control"
                                value="{{ old('transcript_price') }}">
                                </div>
                           </div>

                           <div class="col-sm-2">
                                <div class="form-group">
                                <label for="emailAddress">Show/Hiide<span class="validation-error-label"></span></label>
                                <input type="checkbox" name="transcript_show"  
                                value="1" <?php if(old('transcript_show  ')==1){ echo 'checked'; } ?> style="width: 51px;height: 32px;">
                                </div>
                           </div>

                             <!-- 10nd -->
                         <div class="col-sm-6">
                                <div class="form-group">
                                <label for="emailAddress">DVD + Transcript<span class="validation-error-label">*</span></label>
                                <input type="text" name="dvd_transcript" required class="form-control"
                                value="{{ old('dvd_transcript') }}">
                                </div>
                           </div>
                           <div class="col-sm-4">
                                <div class="form-group">
                                <label for="emailAddress">Price <span class="validation-error-label">*</span></label>
                                <input type="number" name="dvd_transcript_price" required class="form-control"
                                value="{{ old('dvd_transcript_price') }}">
                                </div>
                           </div>

                           <div class="col-sm-2">
                                <div class="form-group">
                                <label for="emailAddress">Show/Hiide<span class="validation-error-label"></span></label>
                                <input type="checkbox" name="dvd_transcript_show"  
                                value="1" <?php if(old('dvd_transcript_show  ')==1){ echo 'checked'; } ?> style="width: 51px;height: 32px;">
                                </div>
                           </div>

                            <!-- 11nd -->
                         <div class="col-sm-6">
                                <div class="form-group">
                                <label for="emailAddress">Digital Download + DVD<span class="validation-error-label">*</span></label>
                                <input type="text" name="digi_down_dvd" required class="form-control"
                                value="{{ old('digi_down_dvd') }}">
                                </div>
                           </div>
                           <div class="col-sm-4">
                                <div class="form-group">
                                <label for="emailAddress">Price <span class="validation-error-label">*</span></label>
                                <input type="number" name="digi_down_dvd_price" required class="form-control"
                                value="{{ old('digi_down_dvd_price') }}">
                                </div>
                           </div>

                           <div class="col-sm-2">
                                <div class="form-group">
                                <label for="emailAddress">Show/Hiide<span class="validation-error-label"></span></label>
                                <input type="checkbox" name="digi_down_dvd_show"  
                                value="1" <?php if(old('digi_down_dvd_show  ')==1){ echo 'checked'; } ?> style="width: 51px;height: 32px;">
                                </div>
                           </div>

                           <!-- 12nd -->
                         <div class="col-sm-6">
                                <div class="form-group">
                                <label for="emailAddress">Flash Drive<span class="validation-error-label">*</span></label>
                                <input type="text" name="flash_drive" required class="form-control"
                                value="{{ old('flash_drive') }}">
                                </div>
                           </div>
                           <div class="col-sm-4">
                                <div class="form-group">
                                <label for="emailAddress">Price <span class="validation-error-label">*</span></label>
                                <input type="number" name="flash_drive_price" required class="form-control"
                                value="{{ old('flash_drive_price') }}">
                                </div>
                           </div>

                           <div class="col-sm-2">
                                <div class="form-group">
                                <label for="emailAddress">Show/Hiide<span class="validation-error-label"></span></label>
                                <input type="checkbox" name="flash_drive_show"  
                                value="1" <?php if(old('flash_drive_show  ')==1){ echo 'checked'; } ?> style="width: 51px;height: 32px;">
                                </div>
                           </div>

                           <br>
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

@extends('admin.layouts.app')

@section('title')
    Order's Listing
@endsection

@section('css')
    <link href="{{ url('admin-assets/plugins/datatables/fixedColumns.dataTables.min.css') }}" rel="stylesheet"
          type="text/css"/>
@endsection

@section('content')
    <div class="row" id="datatable-editable">
        <div class="col-sm-12">
            <div class="card-box table-responsive">
                <div class="col-lg-6 text-left" style="padding-top: 10px">
                    <h4 class="m-t-0 header-title">
                        <b><i class="ti-settings"></i> Orders List</b>
                    </h4>
                </div>
                <br/>
                <br/>
                <br/>
                <?php
                $admin = Auth::guard(\App\Utils\AppConstant::ADMIN_GUARD)->user();
                $orderPageId= 24;
                $permisionPage = DB::table('page_permision')->where('page_id',$orderPageId)->where('user_id',$admin->id)->first();

                if(@$permisionPage->permision=='Half'){
                    $class="hide";
                }else{
                    $class="";
                }
                ?>

                <table id="datatable" class="table table-striped table-bordered" style="overflow-x: scroll">
                    <thead>
                    <tr>
                        <td>Order Number</th>
                        <th>Product Name</th>
                        <th class="<?=$class?>">User Name</th>
                        <th class="<?=$class?>">User Email</th>
                        <th class="<?=$class?>">User ContactNo</th>
                        <th >Order Date</th>
                        <th>Order Amount</th>
                        <th class="<?=$class?>">Order Address</th>
                        <th class="<?=$class?>">Order For</th>
                        <th class="<?=$class?>">Attendee Name</th>
                        <th class="<?=$class?>">Attendee Email</th>
                        <th class="<?=$class?>">Attendee Title</th>
                        <th class="<?=$class?>">Attendee Phone No</th>
                        <th class="<?=$class?>">Video URL</th>
                        <th class="<?=$class?>">Payment Status</th>
                        <th class="<?=$class?>">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($orders as $order)
                        <tr>
                            <td>{{ $order->order_number }}</td>
                            <td>
                                <ol>
                                    @foreach($order->order_items as $items)
                                    <?php
                                    $pName=  \App\Models\Program::where('id',$items->program_id)->first();

                                    ?>

                                        <li>{{ $items->product->title }} @if($pName['program_name']) ({{$pName['program_name']}})
                                        @endif
                                        </li>
                                    @endforeach
                                </ol>
                            </td>
                            <td class="<?=$class?>">{{ $order->first_name." ".$order->middle_name." ".$order->last_name }}</td>
                            <td class="<?=$class?>">{{ $order->email }}</td>
                            <td class="<?=$class?>">
                                {{ $order->mobile_no }} @if($order->mobile_no_2) {{ ' / '.$order->mobile_no_2 }} @endif
                            </td>
                            <td class="order_time">
                                {{ \Carbon\Carbon::parse($order->created_at)->format('Y-m-d H:i:s') }}
                            </td>
                            <td>$ {{ $order->payment_details->card_amount }}</td>
                            <td class="<?=$class?>">{{ $order->billing_address_1.", ".$order->billing_address_2.", ".$order->city.".".$order->state.". ".$order->country."-".$order->pincode }}</td>
                            <td class="<?=$class?>">{{ $order->attendee_name != null ? 'Attendee' : 'Self' }}</td>
                            <td class="<?=$class?>">{{ $order->attendee_name }}</td>
                            <td class="<?=$class?>">{{ $order->attendee_email }}</td>
                            <td class="<?=$class?>">{{ $order->attendee_title }}</td>
                            <td class="<?=$class?>">{{ $order->attendee_no }}</td>
                            <td class="<?=$class?>"><a href="{{ $order->webinar_link }}" target="_blank">{{ $order->webinar_link }}</a></td>
                            <td class="<?=$class?>">
                                @if($order->status == \App\Utils\AppConstant::STATUS_ACTIVE)
                                    <span class="label label-table label-success">Success</span>
                                @else
                                    <span class="label label-table label-danger">Failed</span>
                                @endif
                            </td>
                            <td class="<?=$class?>">
                                <i class="md md-cloud-upload text-info" style="font-size: 20px; cursor: pointer;"
                                   onclick="uploadModal('{{$order->uuid}}')"></i>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div id="uploadWebinar" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true"
         style="display: none;">
        <div class="modal-dialog">
            <form action="{{ route('orders.store') }}" method="post">
                @csrf
                <input type="hidden" name="order_id" id="uuid">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title" id="myModalLabel">Upload Webinar URL</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="emailAddress">Enter Link : <span class="validation-error-label">*</span></label>
                            <input type="text" name="link" required class="form-control" value="">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary waves-effect waves-light">Upload</button>
                    </div>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
@endsection

@section('js')
    <script src="{{ url('admin-assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ url('admin-assets/plugins/datatables/dataTables.bootstrap.js') }}"></script>
    <script src="{{ url('admin-assets/plugins/datatables/dataTables.fixedColumns.min.js') }}"></script>
    <script>
        function uploadModal(id) {
            $('#uuid').val(id);
            $('#uploadWebinar').modal();
        }

        $(document).ready(function () {
            $('#datatable').dataTable({
                fixedHeader: true,
                "aaSorting": []
            });
        })
    </script>
@endsection

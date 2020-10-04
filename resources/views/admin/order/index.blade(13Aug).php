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
                <table id="datatable" class="table table-striped table-bordered" style="overflow-x: scroll">
                    <thead>
                    <tr>
                        <th>Order Number</th>
                        <th width="33%">Product Name</th>
                        <th>Product Type</th>
                        <th>User Name</th>
                        <th>User Email</th>
                        <th>User ContactNo</th>
                        <th>Order Date</th>
                        <th>Order Amount</th>
                        <th>Order Address</th>
                        <th>Order For</th>
                        <th>Attendee Name</th>
                        <th>Attendee Email</th>
                        <th>Attendee Title</th>
                        <th>Attendee Phone No</th>
                        <th>Video URL</th>
                        <th>Payment Status</th>
                        <th>Action</th>
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
                            <td>
                                @foreach($order->order_items as $items)
                                @if($items->product->product_type==1)
                                {{'Product'}}
                                @else

                                {{'Package'}}
                                @endif
                                
                                  
                                 <?php break; ?>
                                @endforeach
                            </td>
                            <td>{{ $order->first_name." ".$order->middle_name." ".$order->last_name }}</td>
                            <td>{{ $order->email }}</td>
                            <td>
                                {{ $order->mobile_no }} @if($order->mobile_no_2) {{ ' / '.$order->mobile_no_2 }} @endif
                            </td>
                            <td class="order_time">
                                {{ \Carbon\Carbon::parse($order->created_at)->format('Y-m-d H:i:s') }}
                            </td>
                            <td>$ {{ $order->payment_details->card_amount }}</td>
                            <td>{{ $order->billing_address_1.", ".$order->billing_address_2.", ".$order->city.".".$order->state.". ".$order->country."-".$order->pincode }}</td>
                            <td>{{ $order->attendee_name != null ? 'Attendee' : 'Self' }}</td>
                            <td>{{ $order->attendee_name }}</td>
                            <td>{{ $order->attendee_email }}</td>
                            <td>{{ $order->attendee_title }}</td>
                            <td>{{ $order->attendee_no }}</td>
                            <td><a href="{{ $order->webinar_link }}" target="_blank">{{ $order->webinar_link }}</a></td>
                            <td>
                                @if($order->status == \App\Utils\AppConstant::STATUS_ACTIVE)
                                    <span class="label label-table label-success">Success</span>
                                @else
                                    <span class="label label-table label-danger">Failed</span>
                                @endif
                            </td>
                            <td>
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

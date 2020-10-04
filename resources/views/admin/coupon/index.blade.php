<?php error_reporting(0); ?>
@extends('admin.layouts.app')

@section('title')
    Coupon's Listing
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
                        <b><i class="ti-gift"></i> Coupons List</b>
                    </h4>
                </div>
                 <a href="add-coupon" class="btn btn-success" style="float:right">Add New Coupon</a>
                <br/>
                <br/>
                <br/>
                <table id="datatable" class="table table-striped table-bordered" style="overflow-x: scroll">
                    <thead>
                    <tr>
                        <th>SN</th>
                        <th class="sortableHeading" data-invoiceBy="OID">Name</th>
                        <th>Valid From</th>
                        <th>Valid to</th>
                        <th>Uses</th>
                        <th>Coupon Type</th>
                        <th>Coupon Amt</th>
                        <th>Info</th>
                        <th>Create Date</th>      
                        <th>Action</th>   
                    </tr>
                    </thead>
                    <tbody>
                         <?php
                         //echo '<pre>';print_r($userInfo);die;

                         ?>
                         <?php $i=1; ?>
                        @foreach($coupons as $coupon)
                       <?php $cpnCount=   \App\Models\CouponDetail::where('cpn_id',$coupon->id)->count();
                       // echo '<pre>';print_r($order->order_items);
                        ?>

                        <tr>
                            <td>{{$i}}</td>
                            <td>{{$coupon->coupon_code}}</td>
                            <td>{{$coupon->start_date}}</td>
                            <td>{{$coupon->end_date}}</td>
                            <td>{{$coupon->uses}}</td>
                            <td>{{$coupon->cupon_type}}</td>
                            <td>${{$coupon->price}}</td>
                            <td><a href="{{url('/admin/info')}}/{{$coupon->id}}">More Info ({{$cpnCount}})</a></td>
                            <td>{{$coupon->created_at}}</td>
                             
                            <td><a href="{{url('/admin/coupon-edit')}}/{{$coupon->id}}" class="btn btn-success">Edit</a>

                            <a href="{{url('/admin/delete-coupon')}}/{{$coupon->id}}" class="btn btn-warning" onclick="return confirm('Are you sure you want to delete this item?')">Delete</a></td>
                        </tr>
                        <?php $i++; ?>
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

<?php error_reporting(0); ?>
@extends('admin.layouts.app')

@section('title')
    Coupons Details
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
                        <b><i class="ti-gift"></i> Coupons Details</b>
                    </h4>
                </div>
                 
                <br/>
                <br/>
                <br/>
                 <table id="datatable" class="table table-striped table-bordered" style="overflow-x: scroll">
                    <thead>
                    <tr>
                        <th>SN</th>
                        <th class="sortableHeading" data-invoiceBy="OID">Order No</th>
                        <th>Product Name</th>
                        <th>Uses</th>
                        <th>User Name</th>
                        <th>Email</th>
                        <th>Create Date</th>      
                            
                    </tr>
                    </thead>
                    <tbody>
                         <?php
                         //echo '<pre>';print_r($userInfo);die;

                         ?>
                         <?php $i=1; ?>
                        @foreach($coupons as $coupon)

                        <?php $order=   \App\Models\Orders::where('id',$coupon->order_id)->orderBy('created_at','DESC')->first();

                        $user= \App\Models\Users::where('id',$coupon->user_id)->first();
                        
                        ?>
                        <tr>
                            <td>{{$i}}</td>
                            <td>{{$order->order_number}}</td>
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
                            <td>1</td>
                            <td>{{$user->fullname}}</td>
                            <td>{{$user->email}}</td>
                             
                             
                            <td>{{$coupon->created_at}}</td>
                             
                            
                        </tr>
                        <?php $i++; ?>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
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

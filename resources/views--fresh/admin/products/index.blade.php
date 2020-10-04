@extends('admin.layouts.app')

@section('title')
    Products
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
                        <b><i class="ti-settings"></i> Product List</b>
                    </h4>
                </div>
                <div class="col-lg-6 text-right">
                    <a class="btn btn-default" href="{{ route('products.create') }}">
                        <i class="fa fa-plus-circle"></i>
                        Add New
                    </a>
                </div>
                <br/>
                <br/>
                <br/>
                <table id="datatable" class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>Image</th>
                        <th>Category</th>
                        <th>Type</th>
                        <th width="300px">Title</th>
                        <th>Speaker Name</th>
                        <th>Price</th>
                        <th>Webinar Date-Time</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $product)
                        <tr>
                            <td class="text-center">
                                @if($product->picture)
                                    <img src="{{ $product->picture }}" alt="{{ $product->picture }}" width="70px">
                                @else
                                    <img src="{{ url('images/user.svg') }}" alt="user.svg" width="70px">
                                @endif
                            </td>
                            <td>{{ strip_tags($product->category->name) }}</td>
                            <td>
                                @if($product->type == 1)
                                    Live Webinar
                                @elseif($product->type == 2)
                                    On-Demand
                                @elseif($product->type == 3)
                                    Pre-Recorded
                                @endif
                            </td>
                            <td>{{ $product->title }}</td>
                            <td>{{ $product->speaker_name }}</td>
                            <td>{{ $product->price }}</td>
                            <td>{{ \Carbon\Carbon::parse($product->webinar_date_time)->format('M d, Y H:i A') }}</td>
                            <td>
                                @if($product->status == \App\Utils\AppConstant::STATUS_ACTIVE)
                                    <span class="label label-table label-success">Active</span>
                                @else
                                    <span class="label label-table label-danger">Suspended</span>
                                @endif
                            </td>
                            <td class="actions">
                                <a href="{{ route('products.edit',$product->id) }}" class="on-default edit-row">
                                    <i class="fa fa-pencil"></i>
                                </a>
                                <a onclick="return confirm('Are you sure you want to change status ?');"
                                   href="{{ url(\App\Utils\AppConstant::ADMIN_URL.'delete/products/'.$product->id) }}"
                                   class="on-default remove-row">
                                    <i class="fa fa-trash-o"></i>
                                </a>
                            </td>
                        </tr>
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
        $(document).ready(function () {
            $('#datatable').DataTable({
                fixedHeader: true,
                "aaSorting": []
            });
        })
    </script>
@endsection

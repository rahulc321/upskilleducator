@extends('admin.layouts.app')

@section('title')
    Users
@endsection

@section('css')
    <link href="{{ url('admin-assets/plugins/datatables/fixedColumns.dataTables.min.css') }}" rel="stylesheet"
          type="text/css"/>
@endsection

@section('content')
    <div class="row" id="datatable-editable">
        <div class="col-sm-12">
            <div class="card-box table-responsive">
                <h4 class="m-t-0 header-title">
                    <b><i class="ti-user"></i>Sub Admin List</b>
                </h4>
                <br/>
                <div class="col-lg-12 text-right">
                    <a class="btn btn-default" href="{{ url('/admin/create') }}">
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
                        <th>Profile Picture</th>
                        <th>Name</th>
                        <th>Email</th>
                        
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td class="text-center">
                                @if($user->profile_picture)
                                    <img src="{{ $user->profile_picture }}" alt="{{ $user->profile_picture }}"
                                         width="70px">
                                @else
                                    <img src="{{ url('assets/images/user.png') }}" alt="user.svg" width="70px">
                                @endif
                            </td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            
                            
                            <td>
                                @if($user->status == \App\Utils\AppConstant::STATUS_ACTIVE)
                                    <span class="label label-table label-success">Active</span>
                                @else
                                    <span class="label label-table label-danger">Suspended</span>
                                @endif
                            </td>
                            <td class="actions">

                                <a href="{{url('/admin/subadmin')}}/{{$user->id}}/edit" class="on-default edit-row">
                                    <i class="fa fa-pencil"></i>
                                </a>


                                <a onclick="return confirm('Are you sure you want to change status ?');"
                                   href="{{ url(\App\Utils\AppConstant::ADMIN_URL.'delete/subadmin/'.$user->id) }}"
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

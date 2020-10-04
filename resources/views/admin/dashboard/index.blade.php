@extends('admin.layouts.app')

@section('title')
    Dashboard
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <h4 class="page-title">Dashboard</h4>
            <p class="text-muted page-title-alt">Welcome to Up Skill Educator admin panel !</p>
        </div>
    </div>
    <?php
        $admin = Auth::guard(\App\Utils\AppConstant::ADMIN_GUARD)->user();
              
    ?>
    @if($admin->admin_type==1)
    <div class="row">
        <div class="col-md-6 col-lg-3">
            <div class="widget-bg-color-icon card-box fadeInDown animated">
                <div class="bg-icon bg-icon-info pull-left">
                    <i class="md md-attach-money text-info"></i>
                </div>
                <div class="text-right">
                    <h3 class="text-dark"><b>$ {{ $revenue }}</b></h3>
                    <p class="text-muted">Total Revenue</p>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <a href="{{ route('orders.index') }}">
            <div class="col-md-6 col-lg-3">
                <div class="widget-bg-color-icon card-box fadeInDown animated">
                    <div class="bg-icon bg-icon-info pull-left">
                        <i class="md md-shopping-cart text-info"></i>
                    </div>
                    <div class="text-right">
                        <h3 class="text-dark"><b>{{ count($orders) }}</b></h3>
                        <p class="text-muted">Total Orders</p>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </a>
        <a href="{{ route('users.index') }}">
            <div class="col-md-6 col-lg-3">
                <div class="widget-bg-color-icon card-box fadeInDown animated">
                    <div class="bg-icon bg-icon-info pull-left">
                        <i class="md md-people text-info"></i>
                    </div>
                    <div class="text-right">
                        <h3 class="text-dark"><b>{{ count($users) }}</b></h3>
                        <p class="text-muted">Total Users</p>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </a>
        <a href="{{ route('our-speaker.index') }}">
            <div class="col-md-6 col-lg-3">
                <div class="widget-bg-color-icon card-box fadeInDown animated">
                    <div class="bg-icon bg-icon-info pull-left">
                        <i class="md md-people text-info"></i>
                    </div>
                    <div class="text-right">
                        <h3 class="text-dark"><b>{{ count($speakers) }}</b></h3>
                        <p class="text-muted">Total Speakers</p>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </a>
    </div>
    @endif
@endsection



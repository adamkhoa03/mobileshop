@extends('backend.layout.layout')
@section('title','Dashboard')
@section('dashboard.active')
    class="active"
@endsection
@section('main')
    <div class="content">

        <div class="container-fluid">

            <div class="row">
                <div class="col-xl-12">
                    <div class="breadcrumb-holder">
                        <h1 class="main-title float-left">Dashboard</h1>
                        <ol class="breadcrumb float-right">
                            <li class="breadcrumb-item">Home</li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>


                </div>
            </div>
            <!-- end row -->


            <div class="row">
                <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
                    <div class="card-box noradius noborder bg-danger">
                        <i class="far fa-user float-right text-white"></i>
                        <h6 class="text-white text-uppercase m-b-20">Users</h6>
                        <h1 class="m-b-20 text-white counter">12</h1>
                        <span class="text-white">1 Today</span>
                    </div>
                </div>

                <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
                    <div class="card-box noradius noborder bg-purple">
                        <i class="fa-2x mr-2 fas fa-credit-card float-right text-white"></i>
                        <h6 class="text-white text-uppercase m-b-20">Turnover</h6>
                        <h1 class="m-b-20 text-white counter">290</h1>
                        <span class="text-white">12 Today</span>
                    </div>
                </div>

                <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
                    <div class="card-box noradius noborder bg-warning">
                        <i class="fas fa-shopping-cart float-right text-white"></i>
                        <h6 class="text-white text-uppercase m-b-20">Orders</h6>
                        <h1 class="m-b-20 text-white counter">320</h1>
                        <span class="text-white">25 Today</span>
                    </div>
                </div>

                <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
                    <div class="card-box noradius noborder bg-info">
                        <i class="fa-2x mr-2 fas fa-briefcase float-right text-white"></i>
                        <h6 class="text-white text-uppercase m-b-20">Products</h6>
                        <h1 class="m-b-20 text-white counter">58</h1>
                        <span class="text-white">5 New</span>
                    </div>
                </div>
            </div>
            <!-- end row -->


            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-6">
                    <div class="card mb-3">
                        <div class="card-header">
                            <h3><i class="fas fa-chart-bar"></i> Turnover Chart</h3>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus non luctus metus. Vivamus fermentum ultricies orci sit amet sollicitudin.
                        </div>

                        <div class="card-body">
                            <canvas id="comboBarLineChart"></canvas>
                        </div>
                        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
                    </div>
                    <!-- end card-->
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-6">
                    <div class="card mb-3">
                        <div class="card-header">
                            <h3><i class="fas fa-chart-bar"></i> Orders Chart</h3>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus non luctus metus. Vivamus fermentum ultricies orci sit amet sollicitudin.
                        </div>

                        <div class="card-body">
                            <canvas id="barChart"></canvas>
                        </div>
                        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
                    </div>
                    <!-- end card-->
                </div>
            </div>
            <!-- end row -->


            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="card mb-3">
                        <div class="card-header">
                            <h3><i class="fas fa-envelope"></i> Latest messenger</h3>
                            Showing responses from customer.
                        </div>

                        <div class="card-body">

                            <div class="widget-messages nicescroll" style="height: 200px;">
                                <a href="#">
                                    <div class="message-item">
                                        <p class="message-item-user">John Doe</p>
                                        <p class="message-item-msg">Hello. I want to buy your product</p>
                                        <p class="message-item-date">11:50 PM</p>
                                    </div>
                                </a>
                                <a href="#">
                                    <div class="message-item">
                                        <p class="message-item-user">Ashton Cox</p>
                                        <p class="message-item-msg">Great job for this task</p>
                                        <p class="message-item-date">14:25 PM</p>
                                    </div>
                                </a>
                                <a href="#">
                                    <div class="message-item">
                                        <p class="message-item-user">Colleen Hurst</p>
                                        <p class="message-item-msg">I have a new project for you</p>
                                        <p class="message-item-date">13:20 PM</p>
                                    </div>
                                </a>
                            </div>

                        </div>
                        <div class="card-footer small text-muted">Updated today at 11:59 PM</div>
                    </div>
                    <!-- end card-->
                </div>


                <!-- end row-->

            </div>
@endsection

@extends('backend.layout.layout')
@section('title','Update User')
@section('user.active')
    class="active"
@endsection
@section('main')
    <div class="content">

        <div class="container-fluid">


            <div class="row">
                <div class="col-xl-12">
                    <div class="breadcrumb-holder">
                        <h1 class="main-title float-left">User Profile</h1>
                        <ol class="breadcrumb float-right">
                            <li class="breadcrumb-item">Home</li>
                            <li class="breadcrumb-item active">Profile</li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <!-- end row -->

            <div class="row">

                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="card mb-3">
                        <div class="card-header">
                            <h3><i class="far fa-user"></i> Update Information</h3>
                        </div>

                        <div class="card-body">


                            <form action="" method="post" enctype="multipart/form-data">

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Full name</label>
                                            <input class="form-control" name="name" type="text" value=""
                                                   placeholder="Enter name"/>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input class="form-control" name="email" type="email"
                                                   placeholder="Enter email"
                                                   value=""/>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Gender</label>
                                            <select class="form-control" name="gender">
                                                <option value="1">Male</option>
                                                <option value="2">Female</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Phone</label>
                                            <input class="form-control" name="phone" type="tel" value=""
                                                   placeholder="Enter phone"/>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Role:</label>
                                            <select class="form-control" name="role">
                                                <option value="1">Administrator</option>
                                                <option value="2">Staff</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Active:</label>
                                            <select class="form-control" name="status">
                                                <option value="1">Yes</option>
                                                <option value="0">No</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-12">
                                        <hr>
                                        <button type="button" class="btn btn-primary">Edit profile</button>
                                    </div>
                                </div>

                            </form>

                        </div>
                        <!-- end card-body -->

                    </div>
                    <!-- end card -->

                </div>
                <!-- end col -->
            </div>
            <!-- end row -->


        </div>
        <!-- END container-fluid -->

    </div>
@endsection

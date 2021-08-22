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
                        <h1 class="main-title float-left">User Information</h1>
                        <ol class="breadcrumb float-right">
                            <li class="breadcrumb-item">Home</li>
                            <li class="breadcrumb-item active">User Information</li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <!-- end row -->
            @if($errors->first())
                <div class="alert alert-danger">{{$errors->first()}}</div>
            @endif
            <div class="row">

                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="card mb-3">
                        <div class="card-header">
                            <h3><i class="far fa-user"></i> Update Information</h3>
                        </div>

                        <div class="card-body">


                            <form action="{{route('admin.user.update', $user->id)}}" method="post"
                                  enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Full name</label>
                                            <input class="form-control" name="name" type="text" value="{{$user->name}}"
                                                   placeholder="Enter name"/>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input class="form-control" name="email" type="email"
                                                   placeholder="Enter email"
                                                   value="{{$user->email}}"/>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Gender</label>
                                            <select class="form-control" name="gender">
                                                <option @if($user->gender === 1) selected @endif value="1">Male</option>
                                                <option @if($user->gender === 2) selected @endif value="2">Female
                                                </option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Phone</label>
                                            <input class="form-control" name="phone" type="tel" value="{{$user->phone}}"
                                                   placeholder="Enter phone"/>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Role:</label>
                                            <select class="form-control" name="role">
                                                @foreach($roles as $role)
                                                    <option @if($role->id === $user->role) selected
                                                            @endif value="{{$role->id}}">{{$role->title}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Active:</label>
                                            <select class="form-control" name="status">
                                                <option @if($user->status === 1) selected @endif value="1">Yes</option>
                                                <option @if($user->status === 0) selected @endif value="0">No</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-12">
                                        <hr>
                                        <button type="submit" class="btn btn-primary">Update</button>
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

@extends('backend.layout.layout')
@section('title', 'Control Users')
@section('user.active')
    class="active"
@endsection
@section('main')
    <div class="content">

        <div class="container-fluid">

            <div class="row">
                <div class="col-xl-12">
                    <div class="breadcrumb-holder">
                        <h1 class="main-title float-left">Users</h1>
                        <ol class="breadcrumb float-right">
                            <li class="breadcrumb-item">Home</li>
                            <li class="breadcrumb-item active">Users</li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <!-- end row -->

            @if($errors->first())
                <div class="alert alert-danger">{{$errors->first()}}</div>
            @endif
            @if(session('success'))
                <div class="alert alert-success">{{session('success')}}</div>
            @endif
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="card mb-3">
                        <div class="card-header">
                                    <span class="pull-right">
                                        <button class="btn btn-primary btn-sm" data-toggle="modal"
                                                data-target="#modal_add_user">
                                            <i class="fas fa-user-plus" aria-hidden="true"></i> Add new user</button>
                                    </span>
                            <div class="modal fade custom-modal" tabindex="-1" role="dialog"
                                 aria-labelledby="modal_add_user" aria-hidden="true" id="modal_add_user">
                                <div class="modal-dialog">
                                    <div class="modal-content">

                                        <form action="" method="post"
                                              enctype="multipart/form-data">
                                            @csrf
                                            <div class="modal-header">
                                                <h5 class="modal-title">Add new user</h5>
                                                <button type="button" class="close" data-dismiss="modal">
                                                    <span aria-hidden="true">&times;</span>
                                                    <span class="sr-only">Close</span>
                                                </button>
                                            </div>

                                            <div class="modal-body">

                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="form-group">
                                                            <label>Full name (required)</label>
                                                            <input class="form-control" name="name" type="text"
                                                                   placeholder="Typing your name..."/>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label>Email (required)</label>
                                                            <input class="form-control" name="email" type="email"
                                                                   placeholder="Typing your email..."
                                                                   required/>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label>Password (required)</label>
                                                            <input class="form-control" name="password" type="password"
                                                                   placeholder="Typing your password..."
                                                                   required/>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">

                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label>Role</label>
                                                            <select name="role" class="form-control" required>
                                                                <option value="">- select -</option>
                                                                @foreach($roles as $role)
                                                                    <option
                                                                        value="{{$role->id}}">{{$role->title}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label>Phone Number (optional)</label>
                                                            <input class="form-control" name="phone" type="text"/>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label>Gender</label>
                                                            <select name="gender" class="form-control">
                                                                <option value="1">Male</option>
                                                                <option value="2">Female</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label>Active</label>
                                                            <select name="status" class="form-control">
                                                                <option value="1">YES</option>
                                                                <option value="0">NO</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="form-group">
                                                    <label>Avatar image (optional):</label>
                                                    <br/>
                                                    <input accept="image/jpeg, image/png, image/gif" type="file"
                                                           name="image">
                                                </div>

                                            </div>

                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary">Add user</button>
                                            </div>

                                        </form>

                                    </div>
                                </div>
                            </div>
                            <h3>
                                <i class="far fa-user"></i> All users</h3>
                        </div>
                        <!-- end card-header -->

                        <div class="card-body">

                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th style="min-width:300px">User details</th>
                                        <th style="width:120px">Role</th>
                                        <th style="width: 100px">Status</th>
                                        <th style="min-width:110px;">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($users as $user)
                                        <tr>
                                            <td>
                                                <div class="user_avatar_list d-none d-none d-lg-block">
                                                    <img alt="avatar"
                                                         @if($user->avatar === null)
                                                         src="images/avatars/avatar_small.png"
                                                         @else style="border-radius: 50%"
                                                         src="images/avatars/{{$user->avatar}}" @endif
                                                    />
                                                </div>
                                                <h4>{{$user->name}}</h4>
                                                <p>{{$user->email}}</p>
                                                <p>Bio: {{$user->bio}}</p>
                                            </td>

                                            <td>{{$user->roles->title}}</td>
                                            <td><a href="">@if($user->status === 1)
                                                        <span class="font-weight-bold text-primary">Activating</span>
                                                    @else
                                                        <span class="text-danger font-weight-bold"> Deactivated </span>
                                                    @endif
                                                </a></td>

                                            <td>
                                                <a href=""
                                                   class="btn btn-primary btn-sm btn-block"><i
                                                        class="far fa-edit"></i> Edit</a>
                                                <form method="post"
                                                      action="">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger btn-sm btn-block
                                                        mt-2"><i class="fas fa-trash"></i> Delete
                                                    </button>

                                                </form>

                                            </td>
                                        </tr>
                                    @endforeach


                                    </tbody>
                                </table>
                                <div class="col-sm-12 col-md-7">
                                    <div class="dataTables_paginate paging_simple_numbers" id="dataTable_paginate">
                                        <ul class="pagination">
                                            {{$users->links()}}
                                        </ul>
                                    </div>
                                </div>
                            </div>


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

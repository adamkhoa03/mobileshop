@extends('backend.layout.layout')
@section('title', 'Update Profile')
@section('main')
    <div class="content">
        <div class="container-fluid">


            <div class="row">
                <div class="col-xl-12">
                    <div class="breadcrumb-holder">
                        <h1 class="main-title float-left">User Profile Update</h1>
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
                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-9 col-xl-9">
                    @if(session('success'))
                        <div class="alert alert-success">{{session('success')}}</div>
                    @endif
                    @if($errors->first())
                        <div class="alert alert-danger">{{$errors->first()}}</div>
                    @endif
                    <div class="card mb-3">
                        <div class="card-header">
                            <h3><i class="far fa-user"></i> Profile details</h3>
                        </div>

                        <div class="card-body">


                            <form action="" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Full name (required)</label>
                                            <input class="form-control" name="name" type="text"
                                                   value="{{$profile->name}}"
                                                   placeholder="Enter your name..."/>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Valid Email (required)</label>
                                            <input class="form-control" name="email" type="email"
                                                   value="{{$profile->email}}"
                                                   placeholder="Enter your new email..."/>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input class="form-control" name="password" type="password" value=""
                                                   placeholder="Enter new password..."/>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Role</label>
                                            <select class="form-control" name="role">
                                                @foreach($roles as $role)
                                                    <option @if($role->id === $profile->role) selected
                                                            @endif value="{{$role->id}}">{{$role->title}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Gender</label>
                                            <select class="form-control" name="gender">
                                                <option @if($profile->gender === 1) selected @endif value="1">Male
                                                </option>
                                                <option @if($profile->gender === 2) selected @endif value="2">Female
                                                </option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Phone</label>
                                            <input class="form-control" name="phone" type="text"
                                                   value="{{$profile->phone}}"
                                                   placeholder="Your phone...">
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Bio</label>
                                            <input maxlength="100" class="form-control" name="bio" type="text"
                                                   value="{{$profile->bio}}"
                                                   placeholder="Enter something..."/>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <label>Active account</label>
                                        <select class="form-control" name="status">
                                            <option value="1">Yes</option>
                                            <option value="0">No</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-12">
                                        <hr>
                                        <button type="submit" class="btn btn-primary">Edit profile</button>
                                    </div>
                                </div>

                            </form>

                        </div>
                        <!-- end card-body -->

                    </div>
                    <!-- end card -->

                </div>
                <!-- end col -->

                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-3 col-xl-3">
                    <div class="card mb-3">
                        <div class="card-header">
                            <h3><i class="far fa-file-image"></i> Avatar</h3>
                        </div>

                        <div class="card-body text-center">
                            <form method="post" action="{{route('admin.user.profile.avatar')}}"
                                  enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="row">
                                    <div class="col-lg-12">
                                        <input name="name" value="{{$profile->name}}" hidden/>
                                        <input name="user_id" value="{{$profile->id}}" hidden/>
                                        <input hidden id="id_input" type="file" name="image"
                                               onchange="loadFile(event)">
                                        <label for="id_input"><img title="CLick for change avatar"
                                                                   style="cursor: pointer"
                                                                   id="output" alt="avatar" class="img-fluid"
                                                                   @if($profile->avatar === null)
                                                                   src="images/avatars/avatar.png" @else
                                                                   src="images/avatars/{{$profile->avatar}}" @endif>
                                        </label>

                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-12">
                                        <button type="submit" class="btn btn-info btn-block mt-3">Change avatar
                                        </button>
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

    <script>
        var loadFile = function (event) {
            var image = document.getElementById('output');
            image.src = URL.createObjectURL(event.target.files[0]);
        };
    </script>
@endsection

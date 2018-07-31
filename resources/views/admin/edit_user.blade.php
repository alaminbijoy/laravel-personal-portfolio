@extends('admin.layouts.admin_master')
@section('title', 'Add user')
@section('contentHeader', 'Add New user')
@section('breadcrumb', 'user')

@section('adminContent')

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-6">

                <!-- Profile Image -->
                <div class="box box-primary">
                    <div class="box-body box-profile">

                        <div class="user_img_profile">
                            <img class="img-responsive" src="{{ isset($user->user_image) ? $user->media->path . $user->media->image_name : asset('admin_dist/dist/img/avatar5.png') }}" alt="User profile picture">
                        </div>

                        <h3 class="profile-username text-center">{{$user->name}}</h3>

                        <p class="text-muted text-center">{{$user->user_occupation}}</p>

                        <ul class="list-group list-group-unbordered">

                            <li class="list-group-item">
                                <b>Gender</b> <span class="pull-right"><b>
                                        @if($user->gender == 1)
                                            Male
                                        @elseif($user->gender == 2)
                                            Female
                                        @elseif($user->gender == 3)
                                            Other
                                        @else
                                            No
                                        @endif
                                    </b></span>
                            </li>
                            <li class="list-group-item">
                                <b>Date of birth</b> <span class="pull-right"><b>{{ isset($user->date_of_birth) ? $user->date_of_birth : 'No' }}</b></span>
                            </li>
                            <li class="list-group-item">
                                <b>Phone Number</b> <span class="pull-right"><b>{{ isset($user->phone) ? $user->phone : 'No' }}</b></span>
                            </li>
                            <li class="list-group-item" style="overflow: auto;">
                                <b>Address</b> <span class="pull-right"><b>{{ isset($user->address) ? $user->address : 'No' }}</b></span>
                            </li>
                            <li class="list-group-item">
                                <b>Country</b> <span class="pull-right"><b>{{ isset($user->country) ? $user->country : 'No' }}</b></span>
                            </li>

                            <li class="list-group-item">
                                <b>Status</b> <span class="pull-right profile_label label-success">Approved</span>
                            </li>
                            <li class="list-group-item">
                                <b>Email Address</b> <span class="pull-right profile_label label-success">Verified</span>
                            </li>
                            <li class="list-group-item">
                                <b>Role</b>
                                @if($user->user_role == 1)
                                    <span class="pull-right profile_label label-success">Admin</span>
                                @else
                                    <span class="pull-right profile_label label-info">Member</span>
                                @endif
                            </li>

                            <li class="list-group-item">
                                <b>Since</b> <span class="pull-right profile_label label-primary">{{date('d-M-y', strtotime($user->created_at))}}</span>
                            </li>

                            <li class="list-group-item">
                                <b>Last Update</b> <div class="pull-right"><span class="profile_label label-primary">{{date('d-M-y', strtotime($user->updated_at))}}</span>  <span class="profile_label label-primary">{{$user->updated_at->diffForHumans()}}</span></div>
                            </li>
                        </ul>

                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
            <div class="col-md-6">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">

                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form method="post" action="{{ URL::to('/update-user-'.$user->id) }}">
                        @csrf
                        <div class="box-body">

                            <div class="form-group">
                                <label for="user_title">Email</label>
                                <input type="email" class="form-control" id="email" name="user_email" placeholder="User Email" value="{{$user->email}}">
                            </div>

                            <div class="col-md-6">
                                <!-- /.form-group -->
                                <div class="form-group">
                                    <label>User Role</label>
                                    <select class="form-control" name="user_role" data-placeholder="Select a role">
                                        <option @if($user->user_role == 1) selected="selected" @endif value="1">Admin</option>
                                        <option @if($user->user_role == 2) selected="selected" @endif value="2">Member</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <!-- /.form-group -->
                                <div class="form-group">
                                    <label>User Status</label>
                                    <select class="form-control" name="status">
                                        <option @if($user->status == 1) selected="selected" @endif value="1">Approved</option>
                                        <option @if($user->status == 0) selected="selected" @endif value="0">Block</option>
                                    </select>
                                </div>
                            </div>


                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
                <!-- /.box -->
            </div>


            <div class="col-md-6">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">

                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form method="POST" action="{{ URL::to('/update-user-password/'.$user->id) }}">
                        @csrf
                        <div class="box-body">

                            <div class="col-md-12 ">
                                <div class="form-group">
                                    <label for="password">Change Password</label>
                                </div>
                            </div>

                            <div class="col-md-6 ">
                                <div class="form-group">
                                    <input type="password" class="form-control" id="password" name="password" placeholder="New password">
                                </div>
                            </div>

                            <div class="col-md-6 ">
                                <div class="form-group">
                                    <input type="password" class="form-control" name="password_confirmation" placeholder="Repeat again">
                                </div>
                            </div>

                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>

                </div>
                <!-- /.box -->
            </div>
            <!--/.col (right) -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
@endsection
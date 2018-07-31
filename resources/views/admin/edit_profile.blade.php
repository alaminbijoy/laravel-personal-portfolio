@extends('admin.layouts.admin_master')
@section('title', 'User Profile')
@section('breadcrumb', 'Profile')
@section('contentHeader', 'Edit profile')

@section('adminContent')
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">

                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form method="POST" action="{{ route('updateProfile') }} "  enctype="multipart/form-data">
                        @csrf
                        <div class="box-body">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{$profile->name}}" required autofocus>
                            </div>
                            <div class="form-group">
                                <label for="occupation">Occupation</label>
                                <input type="text" class="form-control" id="occupation" name="user_occupation" placeholder="Occupation" value="{{$profile->user_occupation}}">
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" class="form-control" id="email" name="email" placeholder="Email Address" value="{{$profile->email}}" disabled>
                            </div>


                            <!-- /.form-group -->
                            <div class="form-group">
                                <div class="col-md-6  margin-top">
                                    <label for="media_id">File input</label>
                                    <input type="file" id="media_id" name="media_id">

                                    <p class="help-block">Upload your profile picture</p>
                                </div>
                                <div class="col-md-6 margin-top">
                                    @if(!$profile->user_image)
                                        -
                                    @else
                                        <img class="manage_post_img" src="{{$profile->media->path . $profile->media->image_name}}" alt="{{$profile->media->id}}">
                                    @endif
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

            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">

                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form method="POST" action="{{ route('updatePassword') }} "  enctype="multipart/form-data">
                        @csrf
                        <div class="box-body">

                            <div class="form-group">
                                <div class="col-md-12 ">
                                    <label for="password">Change Password</label>
                                </div>

                                <div class="col-md-6 ">
                                    <input type="password" class="form-control" id="password" name="password" placeholder="New password">
                                </div>

                                <div class="col-md-6 ">
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
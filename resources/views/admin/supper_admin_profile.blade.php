@extends('admin.layouts.admin_master')
@section('title', 'Supper Admin')
@section('breadcrumb', 'Supper Admin')
@section('contentHeader', 'Edit supper admin profile')

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
                    <form method="POST" action="{{ route('supperAdminUpdate') }} "  enctype="multipart/form-data">
                        @csrf
                        <div class="box-body">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{$sp_admin->name}}" required autofocus>
                            </div>
                            <div class="form-group">
                                <label for="occupation">Occupation</label>
                                <input type="text" class="form-control" id="occupation" name="user_occupation" placeholder="Occupation" value="{{$sp_admin->user_occupation}}" required>
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" class="form-control" id="email" name="email" placeholder="Email Address" value="{{$sp_admin->email}}" required>
                            </div>

                            <div class="form-group">
                                <label for="user_role">Role</label>
                                <input type="text" class="form-control" id="user_role" name="user_role" placeholder="Role" value="{{$sp_admin->user_role}}" required>
                            </div>


                            <!-- /.form-group -->
                            <div class="form-group">
                                <div class="col-md-6">
                                    <label for="media_id">File input</label>
                                    <input type="file" id="media_id" name="media_id">

                                    <p class="help-block">Example block-level help text here.</p>
                                </div>
                                <div class="col-md-6">
                                    @if(!$sp_admin->user_image)
                                        -
                                    @else
                                        <img class="manage_post_img" src="{{$sp_admin->media->path . $sp_admin->media->image_name}}" alt="{{$sp_admin->media->id}}">
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
            <!--/.col (right) -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
@endsection
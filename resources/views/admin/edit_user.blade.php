@extends('admin.layouts.admin_master')
@section('title', 'Add user')
@section('contentHeader', 'Add New user')
@section('breadcrumb', 'user')

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
                    <form method="post" action="{{ URL::to('/update-user/'.$user->id) }}">
                        @csrf
                        <div class="box-body">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="user_name" placeholder="User Name" value="{{$user->name}}">
                            </div>

                            <div class="form-group">
                                <label for="user_title">Email</label>
                                <input type="email" class="form-control" id="email" name="user_email" placeholder="User Email" value="{{$user->email}}">
                            </div>
                            <div class="form-group">
                                <label for="user_occupation">Occupation</label>
                                <input type="text" class="form-control" id="user_occupation" name="user_occupation" placeholder="User occupation" value="{{$user->user_occupation}}">
                            </div>
                            <div class="col-md-6">
                                <!-- /.form-group -->
                                <div class="form-group">
                                    <label>User Role</label>
                                    <select class="form-control" name="user_role" data-placeholder="Select a role">
                                        @foreach($roles as $role)
                                            <option @if($user->user_role == $role->id) selected @endif value="{{$role->id}}">{{$role->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <!-- /.form-group -->
                                <div class="form-group">
                                    <label>User Status</label>
                                    <select class="form-control" name="status">
                                        <option @if($user->status == 1)selected="selected" @endif value="1">Approved</option>
                                        <option @if($user->status == 0)selected="selected" @endif value="0">Block</option>
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
            <!--/.col (right) -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
@endsection
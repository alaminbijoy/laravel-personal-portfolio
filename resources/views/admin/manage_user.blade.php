@extends('admin.layouts.admin_master')
@section('title', 'Manage Role')
@section('breadcrumb', 'Role')
@section('contentHeader', 'Manage User Role')

@section('adminContent')
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <div class="box">

                    <div class="box-header">

                    </div><!-- /.box-header -->

                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th style="width: 20px">ID</th>
                                    <th style="width: 160px">Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th style="width: 80px">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                            @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->role->name }}</td>
                                    <td>
                                        <a class="btn btn-primary btn-sm" href="{{ URL::to('/edit-user/'.$user->id) }}">Edit</a>
                                        <a class="btn btn-danger btn-sm" href="{{ URL::to('/delete-user/'.$user->id) }}">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th style="width: 20px">ID</th>
                                <th style="width: 160px">Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th style="width: 80px">Action</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
@endsection
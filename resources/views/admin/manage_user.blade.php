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
                                    <th>Description</th>
                                    <th>Portfolios</th>
                                    <th style="width: 80px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @php $i = 1; @endphp
                            @foreach($categories as $category)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$category->category_name}}</td>
                                    <td>
                                        @if(!$category->category_description)
                                            -
                                            @else {{$category->category_description}}

                                        @endif
                                    </td>
                                    <td>
                                        @php $p = 0; @endphp
                                        @foreach($portfolios as $portfolio)
                                            @if($portfolio->category_name == $category->id)
                                                @php $p++; @endphp
                                            @endif
                                        @endforeach
                                        {{ $p }}
                                    </td>
                                    <td>
                                        <a class="btn btn-primary btn-sm" href="{{ URL::to('/edit-category/'.$category->id) }}">Edit</a>
                                        <a class="btn btn-danger btn-sm" href="{{ URL::to('/delete-category/'.$category->id) }}">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th style="width: 20px">SL.</th>
                                <th>Category Name</th>
                                <th>Description</th>
                                <th>Portfolios</th>
                                <th>Action</th>
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
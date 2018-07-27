@extends('admin.layouts.admin_master')
@section('title', 'Manage Category')
@section('breadcrumb', 'Category')
@section('contentHeader', 'Manage All Category')

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
                                    <th style="width: 20px">SL.</th>
                                    <th style="width: 160px">Category Name</th>
                                    <th>Description</th>
                                    <th>Post</th>
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
                                        @foreach($posts as $post)
                                            @if($post->category_name == $category->id)
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
                                <th>Post</th>
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
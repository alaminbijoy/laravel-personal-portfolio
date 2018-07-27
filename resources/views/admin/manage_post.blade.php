@extends('admin.layouts.admin_master')
@section('title', 'Manage Post')
@section('breadcrumb', 'Post')
@section('contentHeader', 'Manage All Post')

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
                                <th style="width: 160px">Post Title</th>
                                <th>Content</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>Category</th>
                                <th>Author</th>
                                <th>Created</th>
                                <th>Updated</th>
                                <th style="width: 100%;">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i = 1; ?>
                            @foreach($posts as $post)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$post->post_title}}</td>
                                    <td>
                                        @if(!$post->post_content)
                                            -
                                        @else
                                            {{ str_limit($post->post_content, 50) }}
                                        @endif
                                    </td>
                                    <td>
                                        @if(!$post->media)
                                            -
                                        @else
                                            <img class="manage_post_img" src="{{$post->media->path . $post->media->image_name}}" alt="{{$post->media->id}}">
                                        @endif
                                    </td>
                                    <td>
                                        @if($post->post_status == 1)
                                            Publish
                                        @elseif($post->post_status == 0)
                                            Unpublished
                                        @endif
                                    </td>
                                    <td>
                                        @if(!$post->category_name)
                                            -
                                        @else
                                            {{$post->cat->category_name}}
                                        @endif
                                    </td>
                                    <td>{{$post->user->name}}</td>
                                    <td>{{$post->created_at}}</td>
                                    <td>{{$post->updated_at}}</td>

                                    <td>
                                        <a class="btn btn-primary btn-sm" href="{{ URL::to('/edit-post/'.$post->id) }}">Edit</a>
                                        <a class="btn btn-danger btn-sm" href="{{ URL::to('/delete-post/'.$post->id) }}">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th style="width: 20px">SL.</th>
                                <th style="width: 160px">Post Title</th>
                                <th>Content</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>Category</th>
                                <th>Author</th>
                                <th>Created</th>
                                <th>Updated</th>
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
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
                                <th style="width: 160px">Title</th>
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
                            @foreach($portfolio_items as $portfolio_item)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$portfolio_item->title}}</td>
                                    <td>
                                        @if(!$portfolio_item->content)
                                            -
                                        @else
                                            {{ str_limit($portfolio_item->content, 50) }}
                                        @endif
                                    </td>
                                    <td>
                                        @if(!$portfolio_item->media)
                                            -
                                        @else
                                            <img class="manage_post_img" src="{{$portfolio_item->media->path . $portfolio_item->media->image_name}}" alt="{{$portfolio_item->media->id}}">
                                        @endif
                                    </td>
                                    <td>
                                        @if($portfolio_item->status == 1)
                                            Publish
                                        @elseif($portfolio_item->status == 0)
                                            Unpublished
                                        @endif
                                    </td>
                                    <td>
                                        @if(!$portfolio_item->category_name)
                                            -
                                        @else
                                            {{$portfolio_item->cat->category_name}}
                                        @endif
                                    </td>
                                    <td>{{$portfolio_item->user->name}}</td>
                                    <td>{{$portfolio_item->created_at}}</td>
                                    <td>{{$portfolio_item->updated_at}}</td>

                                    <td>
                                        <a class="btn btn-primary btn-sm" href="{{ URL::to('/edit-portfolio/'.$portfolio_item->id) }}">Edit</a>
                                        <a class="btn btn-danger btn-sm" href="{{ URL::to('/delete-portfolio/'.$portfolio_item->id) }}">Delete</a>
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
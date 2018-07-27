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
                                    <th style="width: 160px">Name</th>
                                    <th>URL</th>
                                    <th>Icon</th>
                                    <th style="width: 80px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $i = 1; ?>
                            @foreach($social_media as $sm)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$sm->social_media_name}}</td>
                                    <td>{{$sm->social_media_url}}</td>
                                    <td>
                                        @if($sm->media_id)
                                            <img style="width: 18px;" src="{{$sm->media->path . $sm->media->image_name}}" alt="{{ $sm->media_id }}">
                                        @else
                                            <i class="{{$sm->icon}}"></i>
                                            @php
                                                $name   = ucwords( str_replace( '-', ' ', str_replace( array(
                                                        'fa ',
                                                        'fa-',
                                                        '-play',
                                                        '-square',
                                                        '-alt',
                                                        '-circle'
                                                        ), '', $sm->icon ) ) );


                                            @endphp
                                                 {{$name}}
                                        @endif
                                    </td>
                                    <td>
                                        <a class="btn btn-primary btn-sm" href="{{ URL::to('/edit-social-media/'.$sm->id) }}">Edit</a>
                                        <a class="btn btn-danger btn-sm" href="{{ URL::to('/delete-social-media/'.$sm->id) }}">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th style="width: 20px">SL.</th>
                                <th>Category Name</th>
                                <th>Description</th>
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
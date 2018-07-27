@extends('admin.layouts.admin_master')
@section('title', 'Add Post')
@section('contentHeader', 'Add New Post')
@section('breadcrumb', 'Post')

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
                    <form method="POST" action="{{ route('newPost') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="box-body">
                            <div class="form-group">
                                <label for="post_title">Title</label>
                                <input type="text" class="form-control" id="post_title" name="post_title" placeholder="Add post title" autofocus>
                            </div>
                            <div class="form-group">
                                <textarea id="editor1" name="post_content" rows="10" cols="80">

                                </textarea>
                            </div>
                            <!-- /.form-group -->
                                <div class="form-group">
                                    <label>Category</label>
                                    <select class="form-control select2" multiple="multiple" name="category_name[]" data-placeholder="Select a category">
                                        @foreach($all_category as $category)
                                            <option value="{{$category->id}}">{{$category->category_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <!-- /.form-group -->

                            <!-- /.form-group -->
                            <div class="form-group">
                                <label>Post Status</label>
                                <select class="form-control" name="post_status">
                                    <option value="1" selected="selected">Publish</option>
                                    <option value="0">Unpublished</option>
                                </select>
                            </div>
                            <!-- /.form-group -->
                            <div class="form-group">
                                <label for="media_id">File input</label>
                                <input type="file" id="media_id" name="media_id">
                                <p class="help-block">Example block-level help text here.</p>
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
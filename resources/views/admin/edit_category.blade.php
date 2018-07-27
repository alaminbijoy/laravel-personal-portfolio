@extends('admin.layouts.admin_master')
@section('title', 'Edit Category')
@section('breadcrumb', 'Category')
@section('contentHeader', 'Edit Category')

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
                    <!-- form start -->
                    <form method="POST" action="{{ URL::to('/update-category/'.$edit_category->id) }}">
                        @csrf
                        <div class="box-body">
                            <div class="form-group">
                                <label for="category_name">Category name</label>
                                <input type="text" class="form-control" id="category_name" name="category_name" value="{{$edit_category->category_name}}" placeholder="Add category name" required>
                            </div>
                            <div class="form-group">
                                <label for="editor1">Description</label>
                                <textarea id="editor1" name="category_description" rows="10" cols="80">
                                    {{$edit_category->category_description}}
                                </textarea>
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
@extends('admin.layouts.admin_master')
@section('title', 'Compose')
@section('breadcrumb', 'Mailbox')
@section('contentHeader', '')

@section('style')
<link rel="stylesheet" href="{{ asset('admin_dist/plugins/iCheck/flat/blue.css') }}">
@endsection

@section('adminContent')
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-3">
                <a href="{{route('mailInbox')}}" class="btn btn-primary btn-block margin-bottom">Back to Inbox</a>

                <div class="box box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title">Folders</h3>

                        <div class="box-tools">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="box-body no-padding">
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="{{route('mailInbox')}}"><i class="fa fa-inbox"></i> Inbox
                                    @if($count > 0)
                                        <span class="label label-primary pull-right">{{$count}}</span>
                                    @endif
                                </a>
                            </li>
                            <li><a href="{{route('mailOutBox')}}"><i class="fa fa-envelope-o"></i> Sent</a></li>
                            <li><a href="#"><i class="fa fa-trash-o"></i> Trash</a></li>
                        </ul>
                    </div>
                    <!-- /.box-body -->
                </div>

            </div>
            <!-- /.col -->
            <div class="col-md-9">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Compose New Message</h3>
                    </div>
                    <form method="post" action="{{route('mailSend')}}">
                    @csrf
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="form-group">
                                <input class="form-control" placeholder="To:" name="email">
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Subject:" name="subject">
                            </div>
                            <div class="form-group">
                                <textarea id="compose-textarea" class="form-control" name="message" style="height: 200px"></textarea>
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <div class="pull-right">
                                <button type="button" class="btn btn-default"><i class="fa fa-pencil"></i> Draft</button>
                                <button type="submit" class="btn btn-primary"><i class="fa fa-envelope-o"></i> Send</button>
                            </div>
                            <button type="reset" class="btn btn-default"><i class="fa fa-times"></i> Discard</button>
                        </div>
                    </form>
                    <!-- /.box-footer -->
                </div>
                <!-- /. box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
@endsection
@section('script')
<script>
    $(function () {
        //Add text editor
        $("#compose-textarea").wysihtml5();
    });
</script>
@endsection
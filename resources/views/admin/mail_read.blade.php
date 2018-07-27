@extends('admin.layouts.admin_master')
@section('title', 'Mailbox')
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
                <a href="{{route('mailCompose')}}" class="btn btn-primary btn-block margin-bottom">Compose</a>

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
                            <li class="active"><a href="{{route('mailInbox')}}"><i class="fa fa-inbox"></i> Inbox
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
                        <h3 class="box-title">{{$message->subject}}</h3>

                        <div class="box-tools pull-right">
                            <a href="#" class="btn btn-box-tool" data-toggle="tooltip" title="Previous"><i class="fa fa-chevron-left"></i></a>
                            <a href="#" class="btn btn-box-tool" data-toggle="tooltip" title="Next"><i class="fa fa-chevron-right"></i></a>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body no-padding">
                        <div class="mailbox-read-info">
                            <h3>{{$message->name}}
                                @if($message->phone)
                                <span class="mailbox-read-time pull-right"><i class="fa fa-phone-square" aria-hidden="true"></i> {{$message->phone}}</span>
                                @endif
                            </h3>
                            <h5>From: {{$message->email}}
                                <span class="mailbox-read-time pull-right">{{$message->created_at->format('d-M-Y @ g:i a')}}</span>
                            </h5>

                        </div>
                        <!-- /.mailbox-read-info -->
                        <div class="mailbox-controls with-border text-center">
                            <div class="btn-group">
                                <button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" data-container="body" title="Delete">
                                    <i class="fa fa-trash-o"></i></button>
                                <button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" data-container="body" title="Reply">
                                    <i class="fa fa-reply"></i></button>
                                <button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" data-container="body" title="Forward">
                                    <i class="fa fa-share"></i></button>
                            </div>
                            <!-- /.btn-group -->
                            <button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" title="Print">
                                <i class="fa fa-print"></i></button>
                        </div>
                        <!-- /.mailbox-controls -->
                        <div class="mailbox-read-message">
                            <p>{!! $message->message !!}</p>

                        </div>
                        <!-- /.mailbox-read-message -->
                    </div>
                    <!-- /.box-body -->

                    <!-- /.box-footer -->
                    <div class="box-footer">
                        <div class="pull-right">
                            <button type="button" class="btn btn-default"><i class="fa fa-reply"></i> Reply</button>
                            <button type="button" class="btn btn-default"><i class="fa fa-share"></i> Forward</button>
                        </div>
                        <button type="button" class="btn btn-default"><i class="fa fa-trash-o"></i> Delete</button>
                        <button type="button" class="btn btn-default"><i class="fa fa-print"></i> Print</button>
                    </div>
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


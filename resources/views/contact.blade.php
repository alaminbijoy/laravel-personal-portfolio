@extends('layouts.master')

@section('title', 'Home')

@section('style')
<!-- Compiled and minified CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">
@endsection

@section('content')
    <!-- Start of Contact Section -->
    <section id="contact">
        <div class="container">
            <div class="header-area display-table">
                <div class="display-tablecell">
                    <div class="contact-top text-center">
                        <p class="group-span"><span></span> <span></span> <span></span></p>
                        <h3>Contact</h3>
                        <div class="border-bottom"></div>
                    </div>
                    <!-- End of Blog Post Top -->
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="contact-content">
                        <form class="form" method="post" action="{{ route('contactSend') }}">
                            @csrf
                            <div class="form-group input-field col-md-6">
                                <input type="text" name="name" id="name" class="name form-control">
                                <label for="name">Name *</label>
                            </div>
                            <div class="form-group input-field col-md-6">
                                <input type="email" name="email" id="contact-email" class="email form-control">
                                <label for="contact-email">Email *</label>
                            </div>
                            <div class="form-group input-field col-md-6">
                                <input type="text" name="phone" id="phone" class="phone form-control">
                                <label for="phone">Phone Number</label>
                            </div>
                            <div class="form-group input-field col-md-6">
                                <input type="text" name="subject" id="subject" class="subject form-control">
                                <label for="subject">Subject *</label>
                            </div>
                            <div class="form-group input-field col-xs-12">
                                <textarea name="message" id="textarea" class="textarea materialize-textarea form-control"></textarea>
                                <label for="textarea">How can I Help? *</label>
                            </div>
                            <div class="text-center col-xs-12">
                                <input type="submit" name="submit" id="submit" value="Submit Message" class="waves-effect waves-light btn btn-lg btn-success btn-orange btn-contact">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End of Contact Section -->
@endsection

@section('script')
<!-- Compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
@endsection
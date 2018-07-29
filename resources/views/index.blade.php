@extends('layouts.master')
@section('title')
    {{ isset($sp_admin) ? $sp_admin->name : 'Admin' }} - {{ isset($sp_admin->user_occupation) ? $sp_admin->user_occupation : 'Occupation'}}
@endsection
@section('content')

    <section class="header-section">
        <div class="container">
            <div class="row">
                <div class="header-area display-table">
                    <div class="display-tablecell">
                        <div class="col-md-3">
                            <div class="profile-img animated fadeInLeft">
                                <img src="{{ isset($sp_admin->user_image) ? $sp_admin->media->path . $sp_admin->media->image_name : asset('admin_dist/dist/img/avatar5.png') }}" alt="{{ isset($sp_admin->user_image) ? $sp_admin->media->image_name : 'User Image' }}">
                            </div>
                        </div>
                        <div class="col-md-9 d-table">
                            <div class="short-bio d-table-cell animated fadeInRight">
                                <h1>I'm <span>{{ isset($sp_admin) ? $sp_admin->name : 'Admin' }}</span></h1>
                                <p>{{ isset($sp_admin->user_occupation) ? $sp_admin->user_occupation : 'Occupation'}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="icon-scroll animated fadeInUp"></div>

                </div>
            </div>
        </div>
    </section>

    <!-- Portfolio Grid Section -->
    <section class="portfolio" id="portfolio">
        <div class="container">
            <h2 class="text-center text-uppercase text-secondary mb-0">Portfolio</h2>
            <div class="underline"></div>
            <div class="row">

                <div class="controls">
                    <button type="button" class="control" data-filter="all">All</button>
                    @foreach($categorys as $category)
                        @php
                            $category_name = str_replace(' ', '', $category->category_name);
                        @endphp
                        <button type="button" class="control" data-filter=".{{ $category_name }}">{{$category->category_name}}</button>
                    @endforeach
                </div>

                <div class="grid">
                    @foreach($portfolios as $portfolio)
                        @if($portfolio->status == 1)
                            <div class="mix {{ isset($portfolio->category_name) ? str_replace(' ', '', $portfolio->cat->category_name) : '' }}">
                                <a class="portfolio-item d-block mx-auto" href="#portfolio-modal-{{$portfolio->id}}">
                                    <span class="image-bg">
                                        <span class="image-shop-scroll lazy" style="background-image: url('{{$portfolio->media->path . $portfolio->media->image_name}}');"></span>
                                    </span>
                                </a>
                            </div>
                        @endif
                    @endforeach
                </div>

            </div>
        </div>
    </section>

    <!-- Start of Contact Section -->
    <section id="contact" class="contact">
        <div class="container">
            <div class="contact-top text-center">
                <p class="group-span"><span></span> <span></span> <span></span></p>
                <h2>Contact</h2>
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
                        <textarea name="message" id="textarea" class="textarea materialize-textarea form-control" style="height: 120px;"></textarea>
                        <label for="textarea">How can I Help? *</label>
                    </div>
                    <div class="text-center col-xs-12">
                        <input type="submit" name="submit" id="submit" value="Submit Message" class="btn-contact">
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- End of Contact Section -->

    <!-- Portfolio Modals -->
    @foreach($portfolios as $portfolio)
        @if($portfolio->status == 1)
            <div class="portfolio-modal mfp-hide" id="portfolio-modal-{{$portfolio->id}}">
                <div class="portfolio-modal-dialog bg-white">
                    <div class="close-model">
                        <a class="close-button d-none d-md-block portfolio-modal-dismiss" href="#">
                            <i class="fa fa-3x fa-times"></i>
                        </a>
                    </div>
                    <div class="container text-center">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="white-bg">
                                    <h1 class="portfolio-content-title">{{$portfolio->title}}</h1>
                                    <hr class="star-dark mb-5">
                                    <img class="img-fluid mb-5 lazy" src="{{$portfolio->media->path . $portfolio->media->image_name}}" alt="{{$portfolio->media->id}}">
                                    @if($portfolio->content)
                                        <hr class="star-dark mb-5">
                                        <div class="portfolio-content">
                                            <div class="content">
                                                {!! $portfolio->content !!}
                                            </div>
                                        </div>
                                    @endif
                                    <hr class="star-dark mb-5">
                                      <a class="btn btn-primary btn-lg rounded-pill portfolio-modal-dismiss" href="#"><i class="fa fa-close"></i> Close </a>
                                    <hr class="star-dark mb-5">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    @endforeach

@endsection

@extends('admin.layouts.admin_master')
@section('title', 'User Profile')
@section('breadcrumb', 'Profile')
@section('contentHeader', 'Edit profile')

@section('style')
<!-- bootstrap datepicker -->
<link rel="stylesheet" href="{{ asset( 'admin_dist/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}">
@endsection

@section('adminContent')
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-4">

                <!-- Profile Image -->
                <div class="box box-primary">
                    <div class="box-body box-profile">

                        <div class="user_img_profile">
                            <img class="img-responsive" src="{{ isset($profile->user_image) ? $profile->media->path . $profile->media->image_name : asset('admin_dist/dist/img/avatar5.png') }}" alt="User profile picture">
                        </div>

                        @if($profile->user_image)
                            <div class="delete_btn_div">
                                <a class="delete_btn" href="{{ route('deleteProfilePicture') }}">Delete Profile Picture</a>
                            </div>
                        @endif

                        <h3 class="profile-username text-center">{{$profile->name}}</h3>

                        <p class="text-muted text-center">{{$profile->user_occupation}}</p>

                        <ul class="list-group list-group-unbordered">
                            <li class="list-group-item">
                                <b>Status</b> <span class="pull-right profile_label label-success">Approved</span>
                            </li>
                            <li class="list-group-item">
                                <b>Email Address</b> <span class="pull-right profile_label label-success">Verified</span>
                            </li>
                            <li class="list-group-item">
                                <b>Role</b>
                                @if($profile->user_role == 1)
                                    <span class="pull-right profile_label label-success">Admin</span>
                                @else
                                    <span class="pull-right profile_label label-info">Member</span>
                                @endif
                            </li>

                            <li class="list-group-item">
                                <b>Since</b> <span class="pull-right profile_label label-primary">{{date('d-M-y', strtotime($profile->created_at))}}</span>
                            </li>

                            <li class="list-group-item">
                                <b>Last Update</b> <div class="pull-right"><span class="profile_label label-primary">{{date('d-M-y', strtotime($profile->updated_at))}}</span>  <span class="profile_label label-primary">{{$profile->updated_at->diffForHumans()}}</span></div>
                            </li>
                        </ul>

                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
                <!-- /.box -->
            <div class="col-md-8">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border"></div>
                    <!-- /.box-header -->
                    <!-- form start -->

                    <form method="POST" action="{{ route('updateProfile') }} "  enctype="multipart/form-data" class="form-horizontal">
                        @csrf
                        <div class="box-body">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-user"></i>
                                        </div>
                                        <input type="text" class="form-control" name="name" placeholder="Name" value="{{$profile->name}}" required autofocus>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-briefcase"></i>
                                        </div>
                                        <input type="text" class="form-control" name="user_occupation" placeholder="Occupation" value="{{$profile->user_occupation}}">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-transgender"></i>
                                        </div>
                                        <select class="form-control" name="gender">
                                            <option @if($profile->gender == Null || $profile->gender == 0  ) selected="selected" @endif value="0" >Select your gender</option>
                                            <option @if($profile->gender == 1) selected="selected" @endif value="1">Male</option>
                                            <option @if($profile->gender == 2) selected="selected" @endif value="2">Female</option>
                                            <option @if($profile->gender == 3) selected="selected" @endif value="3">Other</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- Date -->
                                <div class="form-group">
                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input type="text" class="form-control pull-right" id="datepicker" name="date_of_birth" value="{{$profile->date_of_birth}}" placeholder="Date of birth">
                                    </div>
                                    <!-- /.input group -->
                                </div>
                                <!-- /.form group -->

                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-phone"></i>
                                        </div>
                                        <input type="text" class="form-control" name="phone" placeholder="Phone Number" value="{{$profile->phone}}">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                        <input type="text" class="form-control" name="email" placeholder="Email Address" value="{{$profile->email}}" disabled>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-location-arrow"></i>
                                        </div>
                                        <input type="text" class="form-control" name="address" placeholder="Address" value="{{$profile->address}}">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-flag"></i>
                                        </div>
                                        @php
                                             $country = [
                                                    'Select your country',
                                                    'Afghanistan',
                                                    'Albania',
                                                    'Algeria',
                                                    'Andorra',
                                                    'Angola',
                                                    'Antigua & Deps',
                                                    'Argentina',
                                                    'Armenia',
                                                    'Australia',
                                                    'Austria',
                                                    'Azerbaijan',
                                                    'Bahamas',
                                                    'Bahrain',
                                                    'Bangladesh',
                                                    'Barbados',
                                                    'Belarus',
                                                    'Belgium',
                                                    'Belize',
                                                    'Benin',
                                                    'Bhutan',
                                                    'Bolivia',
                                                    'Bosnia Herzegovina',
                                                    'Botswana',
                                                    'Brazil',
                                                    'Brunei',
                                                    'Bulgaria',
                                                    'Burkina',
                                                    'Burundi',
                                                    'Cambodia',
                                                    'Cameroon',
                                                    'Canada',
                                                    'Cape Verde',
                                                    'Central African Rep',
                                                    'Chad',
                                                    'Chile',
                                                    'China',
                                                    'Colombia',
                                                    'Comoros',
                                                    'Congo',
                                                    'Congo {Democratic Rep}',
                                                    'Costa Rica',
                                                    'Croatia',
                                                    'Cuba',
                                                    'Cyprus',
                                                    'Czech Republic',
                                                    'Denmark',
                                                    'Djibouti',
                                                    'Dominica',
                                                    'Dominican Republic',
                                                    'East Timor',
                                                    'Ecuador',
                                                    'Egypt',
                                                    'El Salvador',
                                                    'Equatorial Guinea',
                                                    'Eritrea',
                                                    'Estonia',
                                                    'Ethiopia',
                                                    'Fiji',
                                                    'Finland',
                                                    'France',
                                                    'Gabon',
                                                    'Gambia',
                                                    'Georgia',
                                                    'Germany',
                                                    'Ghana',
                                                    'Greece',
                                                    'Grenada',
                                                    'Guatemala',
                                                    'Guinea',
                                                    'Guinea-Bissau',
                                                    'Guyana',
                                                    'Haiti',
                                                    'Honduras',
                                                    'Hungary',
                                                    'Iceland',
                                                    'India',
                                                    'Indonesia',
                                                    'Iran',
                                                    'Iraq',
                                                    'Ireland {Republic}',
                                                    'Israel',
                                                    'Italy',
                                                    'Ivory Coast',
                                                    'Jamaica',
                                                    'Japan',
                                                    'Jordan',
                                                    'Kazakhstan',
                                                    'Kenya',
                                                    'Kiribati',
                                                    'Korea North',
                                                    'Korea South',
                                                    'Kosovo',
                                                    'Kuwait',
                                                    'Kyrgyzstan',
                                                    'Laos',
                                                    'Latvia',
                                                    'Lebanon',
                                                    'Lesotho',
                                                    'Liberia',
                                                    'Libya',
                                                    'Liechtenstein',
                                                    'Lithuania',
                                                    'Luxembourg',
                                                    'Macedonia',
                                                    'Madagascar',
                                                    'Malawi',
                                                    'Malaysia',
                                                    'Maldives',
                                                    'Mali',
                                                    'Malta',
                                                    'Marshall Islands',
                                                    'Mauritania',
                                                    'Mauritius',
                                                    'Mexico',
                                                    'Micronesia',
                                                    'Moldova',
                                                    'Monaco',
                                                    'Mongolia',
                                                    'Montenegro',
                                                    'Morocco',
                                                    'Mozambique',
                                                    'Myanmar, {Burma}',
                                                    'Namibia',
                                                    'Nauru',
                                                    'Nepal',
                                                    'Netherlands',
                                                    'New Zealand',
                                                    'Nicaragua',
                                                    'Niger',
                                                    'Nigeria',
                                                    'Norway',
                                                    'Oman',
                                                    'Pakistan',
                                                    'Palau',
                                                    'Panama',
                                                    'Papua New Guinea',
                                                    'Paraguay',
                                                    'Peru',
                                                    'Philippines',
                                                    'Poland',
                                                    'Portugal',
                                                    'Qatar',
                                                    'Romania',
                                                    'Russian Federation',
                                                    'Rwanda',
                                                    'St Kitts & Nevis',
                                                    'St Lucia',
                                                    'Saint Vincent & the Grenadines',
                                                    'Samoa',
                                                    'San Marino',
                                                    'Sao Tome & Principe',
                                                    'Saudi Arabia',
                                                    'Senegal',
                                                    'Serbia',
                                                    'Seychelles',
                                                    'Sierra Leone',
                                                    'Singapore',
                                                    'Slovakia',
                                                    'Slovenia',
                                                    'Solomon Islands',
                                                    'Somalia',
                                                    'South Africa',
                                                    'South Sudan',
                                                    'Spain',
                                                    'Sri Lanka',
                                                    'Sudan',
                                                    'Suriname',
                                                    'Swaziland',
                                                    'Sweden',
                                                    'Switzerland',
                                                    'Syria',
                                                    'Taiwan',
                                                    'Tajikistan',
                                                    'Tanzania',
                                                    'Thailand',
                                                    'Togo',
                                                    'Tonga',
                                                    'Trinidad & Tobago',
                                                    'Tunisia',
                                                    'Turkey',
                                                    'Turkmenistan',
                                                    'Tuvalu',
                                                    'Uganda',
                                                    'Ukraine',
                                                    'United Arab Emirates',
                                                    'United Kingdom',
                                                    'United States',
                                                    'Uruguay',
                                                    'Uzbekistan',
                                                    'Vanuatu',
                                                    'Vatican City',
                                                    'Venezuela',
                                                    'Vietnam',
                                                    'Yemen',
                                                    'Zambia',
                                                    'Zimbabwe',
                                             ];
                                        @endphp
                                        <select class="form-control selectpicker" name="country" data-live-search="true">
                                            @foreach($country as $flag)
                                                <option @if($profile->country == $flag) selected="selected" @endif value="{{ $flag }}">{{ $flag }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <!-- /.form-group -->
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-file-image-o"></i></span>
                                        <input type="file" id="media_id" name="media_id">
                                    </div>
                                    <p>Upload your profile picture</p>
                                </div>

                                <!-- /.box-body -->
                                <div class="box-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="div clearfix"></div>

            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">

                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form method="POST" action="{{ route('updatePassword') }} "  enctype="multipart/form-data">
                        @csrf
                        <div class="box-body">

                                <div class="col-md-12 ">
                                    <div class="form-group">
                                        <label for="password">Change Password</label>
                                    </div>
                                </div>

                                <div class="col-md-6 ">
                                    <div class="form-group">
                                        <input type="password" class="form-control" id="password" name="password" placeholder="New password">
                                    </div>
                                </div>

                                <div class="col-md-6 ">
                                    <div class="form-group">
                                        <input type="password" class="form-control" name="password_confirmation" placeholder="Repeat again">
                                    </div>
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
            <!-- /.box -->
        </div>
    </section>
    <!-- /.content -->
@endsection
@section('script')
    <!-- bootstrap datepicker -->
    <script src="{{ asset('admin_dist/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
    //Date picker
    <script>
        $(function () {
            $('#datepicker').datepicker({
                autoclose: true,
                format: 'yyyy-mm-dd',
            })
        })
    </script>

@endsection
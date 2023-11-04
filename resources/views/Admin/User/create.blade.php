@extends('Partials.AdminLayout')

@section('title', 'Create Users')
@section('css')
    <style>
        .dt-button-collection{
            left: 0 !important;
            min-width: 82px !important;
        }
    </style>
@endsection


@section('content')

    <!--begin::Content-->
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Subheader-->
        <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
            <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                <!--begin::Info-->
                <div class="d-flex align-items-center flex-wrap mr-2">
                    <!--begin::Page Title-->
                    <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Dashboard</h5>
                    <!--end::Page Title-->
                    <!--begin::Actions-->
                    <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200"></div>
                    <span class="text-muted font-weight-bold mr-4">#XRS-45670</span>
                    <a href="#" class="btn btn-light-warning font-weight-bolder btn-sm">Add New</a>
                    <!--end::Actions-->
                </div>

            </div>
        </div>
        <!--end::Subheader-->
        <!--begin::Entry-->
        <div class="d-flex flex-column-fluid">
            <!--begin::Container-->
            <div class="container">
                <div class="card card-custom">
                    <div class="card-body">


                        <div style="text-align: right;" class="btn-group" id="dtButtons" role="group" aria-label="Button group with nested dropdown">
                        </div>

                        <div class="row">

                            <div class="col-lg-12 margin-tb">

                                <div class="pull-left">

                                    <h2>Create New User</h2>

                                </div>

                                <div class="pull-right">

                                    <a class="btn btn-primary" href="{{ route('Users.index') }}"> Back</a>

                                </div>

                            </div>

                        </div>



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




                        {!! Form::open(array('route' => 'Users.store','method'=>'POST','enctype' => 'multipart/form-data')) !!}

                        <div class="row">

                            <div class="col-xs-6 col-sm-12 col-md-6">

                                <div class="form-group">

                                    <strong>First Name:</strong>

                                    {!! Form::text('fname', null, array('placeholder' => 'First','class' => 'form-control')) !!}

                                </div>

                            </div>

                            <div class="col-xs-6 col-sm-12 col-md-6">

                                <div class="form-group">

                                    <strong>Last Name:</strong>

                                    {!! Form::text('lname', null, array('placeholder' => 'Last Name','class' => 'form-control')) !!}

                                </div>

                            </div>

                            <div class="col-xs-6 col-sm-12 col-md-6">

                                <div class="form-group">

                                    <strong>Email:</strong>

                                    {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}

                                </div>

                            </div>

                            <div class="col-xs-6 col-sm-12 col-md-6">

                                <div class="form-group">

                                    <strong>Password:</strong>

                                    {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control')) !!}

                                </div>

                            </div>

                            <div class="col-xs-6 col-sm-12 col-md-6">

                                <div class="form-group">

                                    <strong>Confirm Password:</strong>

                                    {!! Form::password('confirm-password', array('placeholder' => 'Confirm Password','class' => 'form-control')) !!}

                                </div>

                            </div>

                            <div class="col-xs-6 col-sm-12 col-md-6">

                                <div class="form-group">

                                    <strong>Phone:</strong>

                                    {!! Form::text('phone', null, array('placeholder' => 'Phone','class' => 'form-control')) !!}

                                </div>

                            </div>

                            <div class="col-xs-6 col-sm-12 col-md-6">

                                <div class="form-group">

                                    <strong>Gender:</strong>
                                    <select name="Type" class="form-control">
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    </select>

                                </div>

                            </div>

                            <div class="col-xs-6 col-sm-12 col-md-6">

                                <div class="form-group">

                                    <strong>Type:</strong>

                                    <select name="Type" class="form-control">
                                        <option value="Admin">Admin</option>
                                        <option value="User">User</option>
                                    </select>

                                </div>

                            </div>

                            <div class="col-xs-6 col-sm-12 col-md-6">

                                <div class="form-group">

                                    <strong>Role:</strong>

                                    {!! Form::select('roles[]', $roles,[], array('class' => 'form-control','multiple')) !!}

                                </div>

                            </div>

                            <div class="col-xs-6 col-sm-12 col-md-6">

                                <div class="form-group">

                                    <strong>Image:</strong>

                                    <input type="file" name="image" class="filepond">

                                </div>

                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12 text-center">

                                <button type="submit" class="btn btn-primary">Submit</button>

                            </div>

                        </div>

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
            <!--end::Container-->
        </div>
        <!--end::Entry-->
    </div>
    <!--end::Content-->

@endsection



@section('scripts')

    <script>
        $(document).ready(function(e) {

        });
    </script>

@endsection

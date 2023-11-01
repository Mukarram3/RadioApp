@extends('Partials.AdminLayout')

@section('title', 'Roles')
@section('css')
    <link href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css?v=7.0.5') }}" rel="stylesheet" type="text/css" />
    <link href="{{ url('assets/editor/css/editor.bootstrap4.css') }}" rel="stylesheet" type="text/css">
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

                                    <h2>Role Management</h2>

                                </div>

                                <div class="pull-right">

                                    @can('role-create')

                                        <a class="btn btn-success" href="{{ route('roles.create') }}"> Create New Role</a>

                                    @endcan

                                </div>

                            </div>

                        </div>



                        @if ($message = Session::get('success'))

                            <div class="alert alert-success">

                                <p>{{ $message }}</p>

                            </div>

                        @endif



                        <table class="table table-bordered">

                            <tr>

                                <th>No</th>

                                <th>Name</th>

                                <th width="280px">Action</th>

                            </tr>

                            @foreach ($roles as $key => $role)

                                <tr>

                                    <td>{{ ++$i }}</td>

                                    <td>{{ $role->name }}</td>

                                    <td>

                                        <a class="btn btn-info" href="{{ route('roles.show',$role->id) }}">Show</a>

                                        @can('role-edit')

                                            <a class="btn btn-primary" href="{{ route('roles.edit',$role->id) }}">Edit</a>

                                        @endcan

                                        @can('role-delete')

                                            {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}

                                            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}

                                            {!! Form::close() !!}

                                        @endcan

                                    </td>

                                </tr>

                            @endforeach

                        </table>



                        {!! $roles->render() !!}

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

    <script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js?v=7.0.5') }}"></script>
    <script src="{{ asset('assets/editor/js/dataTables.editor.js') }}" type="text/javascript"></script>

    <script>
        $(document).ready(function(e){



});

    </script>
@endsection

@extends('Partials.AdminLayout')

@section('title', 'Users')
@section('css')
<link href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css?v=7.0.5') }}" rel="stylesheet" type="text/css" />
{{-- <link href="{{ url('assets/editor/css/editor.bootstrap4.css') }}" rel="stylesheet" type="text/css">    /> --}}
    <style>
        .dt-button-collection {
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
                    <a href="{{ route('Users.create') }}" class="btn btn-light-warning font-weight-bolder btn-sm">Add New</a>
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


                        <div style="text-align: right;" class="btn-group" id="dtButtons" role="group"
                            aria-label="Button group with nested dropdown">
                        </div>

                        <div class="row">

                            <div class="col-lg-12 margin-tb">

                                <div class="pull-left">

                                    <h2>Users Management</h2>

                                </div>

                            </div>

                        </div>


                        <div class="card-body">
                            <!--begin: Datatable-->
                            <table class="table table-separate table-head-custom table-checkable" id="kt_datatable">
                                <thead>
                                    <tr>

                                        <th>No</th>

                                        <th>First Name</th>

                                        <th>Last Name</th>

                                        <th>Email</th>

                                        <th>Phone</th>

                                        <th>Image</th>

                                        <th>Type</th>

                                        <th>Gender</th>

                                        <th>Roles</th>

                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $key => $user)
                                    <tr>

                                        <td>{{ ++$i }}</td>

                                        <td>{{ $user->fname }}</td>

                                        <td>{{ $user->lname }}</td>

                                        <td>{{ $user->email }}</td>

                                        <td>{{ $user->phone }}</td>

                                        <td><img src="{{ asset('storage/editor/' . $user->image) }}" width="50px" height="50px" alt="" srcset=""></td>

                                        <td>{{ $user->type }}</td>

                                        <td>{{ $user->gender }}</td>

                                        <td>

                                            @if (!empty($user->getRoleNames()))
                                                @foreach ($user->getRoleNames() as $v)
                                                    <label
                                                        class="badge badge-success">{{ $v }}</label>
                                                @endforeach
                                            @endif

                                        </td>

                                        <td>

                                            <div class="btn-group">
                                                <a class="btn btn-info btn-sm"
                                                href="{{ route('Users.show', $user->id) }}">Show</a>
                                            <a class="btn btn-primary btn-sm"
                                                href="{{ route('Users.edit', $user->id) }}">Edit</a>
                                                {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                                            </div>

                                            {!! Form::open(['method' => 'DELETE', 'route' => ['Users.destroy', $user->id], 'style' => 'display:inline']) !!}

                                            {!! Form::close() !!}
                                            {{-- @endcan --}}

                                        </td>

                                    </tr>
                                @endforeach

                                 </tbody>
                            </table>
                            <!--end: Datatable-->
                        </div>

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
<script src="{{ asset('jquery/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('datatable/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('datatable/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('sweetalert2/sweetalert2.min.js') }}"></script>
<script src="{{ asset('toastr/toastr.min.js') }}"></script>
    <script>
        $(document).ready(function(e) {

            var table =  $('#kt_datatable').DataTable({
                         processing:true,
                         info:true,
                         "pageLength":5,
                         "aLengthMenu":[[5,10,25,50,-1],[5,10,25,50,"All"]],
                         crollY: '50vh',
                         scrollX: true,
                         scrollCollapse: true,
                    });


        });
    </script>
@endsection

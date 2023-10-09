@extends('Partials.AdminLayout')

@section('title', 'Users')
@section('css')
    <link href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css?v=7.0.5') }}" rel="stylesheet"
          type="text/css"/>
    <link href="{{ url('assets/editor/css/editor.bootstrap4.css') }}" rel="stylesheet" type="text/css">
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


                        <div style="text-align: right;" class="btn-group" id="dtButtons" role="group"
                             aria-label="Button group with nested dropdown">
                        </div>

                        <div class="row">

                            <div class="col-lg-12 margin-tb">

                                <div class="pull-left">

                                    <h2>Users Management</h2>

                                </div>

                                <div class="pull-right">

                                    <a class="btn btn-success" href="{{ route('Users.create') }}"> Create New User</a>

                                </div>

                            </div>

                        </div>


                        <div id="kt_datatable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">

                            <div class="row">
                                <div class="col-sm-12">

                                    @if ($message = Session::get('success'))

                                        <div class="alert alert-success">

                                            <p>{{ $message }}</p>

                                        </div>

                                    @endif


                                    <table
                                        class="table table-separate table-head-custom table-checkable dataTable no-footer dtr-inline collapsed"
                                        id="kt_datatable" role="grid" aria-describedby="kt_datatable_info"
                                        style="width: 979px;">
                                        <thead>
                                        <tr>
                                            {{--                                <th>ID</th>--}}

                                            <th>No</th>

                                            <th>First Name</th>

                                            <th>Last Name</th>

                                            <th>Email</th>

                                            <th>Phone</th>

                                            <th>Image</th>

                                            <th>Type</th>

                                            <th>Gender</th>

                                            <th>Roles</th>

                                            <th width="280px">Action</th>
                                            {{-- <th width="280px">Action</th> --}}
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

                                                <td><img src="{{asset('storage/'.$user->image)}}" width="50px" height="50px" alt=""
                                                    srcset=""></td>

                                                    <td>{{ $user->type }}</td>

                                                <td>{{ $user->gender }}</td>

                                                <td>

                                                    @if(!empty($user->getRoleNames()))

                                                        @foreach($user->getRoleNames() as $v)

                                                            <label class="badge badge-success">{{ $v }}</label>

                                                        @endforeach

                                                    @endif

                                                </td>

                                                <td>

                                                    <a class="btn btn-info" href="{{ route('Users.show',$user->id) }}">Show</a>

                                                    {{-- @can('user-edit') --}}
                                                        <a class="btn btn-primary"
                                                           href="{{ route('Users.edit',$user->id) }}">Edit</a>
                                                    {{-- @endcan
                                                    @can('user-delete') --}}
                                                        {!! Form::open(['method' => 'DELETE','route' => ['Users.destroy', $user->id],'style'=>'display:inline']) !!}

                                                        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}

                                                        {!! Form::close() !!}
                                                    {{-- @endcan --}}

                                                </td>
                                                {{-- <td>

                                                    @can('user-edit')
                                                        <a class="btn btn-primary"
                                                           href="{{ route('Users.edit',$user->id) }}">Edit</a>
                                                    @endcan
                                                    @can('user-delete')
                                                        {!! Form::open(['method' => 'DELETE','route' => ['Users.destroy', $user->id],'style'=>'display:inline']) !!}

                                                        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}

                                                        {!! Form::close() !!}
                                                    @endcan

                                                </td> --}}

                                            </tr>

                                        @endforeach

                                        </tbody>
                                    </table>

                                        {!! $data->render() !!}
                                </div>
                            </div>

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

    <script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js?v=7.0.5') }}"></script>
    <script src="{{ asset('assets/editor/js/dataTables.editor.js') }}" type="text/javascript"></script>
    <script src="{{asset('assets/js/pages/paginations.js?v=7.0.5')}}"></script>

    <script>
        $(document).ready(function (e) {


        });

    </script>
@endsection

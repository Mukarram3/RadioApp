@extends('Partials.AdminLayout')

@section('title', 'Create Radio Stations')
@section('css')
    <link href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css?v=7.0.5') }}" rel="stylesheet"
        type="text/css" />
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

                        <form class="form" method="post" action="{{route('create.song.details')}}" id="create-song-form">
                            @csrf
                            <div class="card-body">
                                <div class="form-group row">
                                    <div class="col-lg-6">
                                        <label>Song Title:</label>
                                        <input type="text" class="form-control" name="title" placeholder="Enter Song Title" />
                                        <span class="text-danger error-text title_error"></span>
                                    </div>
                                    <div class="col-lg-6">
                                        <label>Stream Url:</label>
                                        <input type="text" class="form-control" name="stream_url" placeholder="Enter Song Stream Url" />
                                    </div>

                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-6">
                                        <label>Artist:</label>
                                        <select class="form-control form-control" name="artist_id" id="exampleSelect2">
                                            <option value="">Choose Artist</option>
                                            @foreach ($artists as $artist)
                                            <option value="{{$artist->id}}">{{$artist->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg-6">
                                        <label>Channel:</label>
                                        <select class="form-control form-control" name="channel_id" id="exampleSelect3">
                                            <option value="">Choose Channel</option>
                                            @foreach ($channels as $channel)
                                            <option value="{{$channel->id}}">{{$channel->title}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-lg-6">
                                        <label>Plan:</label>
                                        <select class="form-control form-control" name="plan_id" id="exampleSelect4">
                                            <option value="">Choose Plan</option>
                                            @foreach ($plans as $plan)
                                            <option value="{{$plan->id}}">{{$plan->title}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg-6">
                                        <label>Category:</label>
                                        <select class="form-control form-control" name="category_id" id="exampleSelectl">
                                            <option value="">Choose Category</option>
                                            @foreach ($categories as $category)
                                            <option value="{{$category->id}}">{{$category->title}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-6">
                                        <label>Type:</label>
                                        <select class="form-control form-control" name="type" id="exampleSelectl">
                                            <option value="paid">Paid</option>
                                            <option value="free">Free</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-6">
                                        <label>Stream Type:</label>
                                        <select class="form-control form-control" name="stream_type" id="exampleSelectl">
                                            <option value="">Choose Streaming type</option>
                                            <option value="radio station">Radio Station</option>
                                            <option value="live dj">Live Dj</option>
                                            <option value="music">Music</option>
                                            <option value="video">Video</option>
                                        </select>
                                    </div>

                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <button type="submit" class="btn btn-primary mr-2">Save</button>
                                        <button type="reset" class="btn btn-secondary">Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </form>

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
    <script src="{{ asset('assets/editor/js/editor.bootstrap4.js') }}" type="text/javascript"></script>

    <script>

        $(document).ready(function(e) {


        });
    </script>
@endsection

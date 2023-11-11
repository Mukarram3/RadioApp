@extends('Partials.AdminLayout')

@section('title', 'Create Channel')
@section('css')
<link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" />
    <link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css" rel="stylesheet">
    <link href="https://unpkg.com/filepond-plugin-image-edit/dist/filepond-plugin-image-edit.css" rel="stylesheet"
    />
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

                        <a class="btn btn-success" href="{{ route('channelsindex') }}"> Go Back</a>

                        <div style="text-align: right;" class="btn-group" id="dtButtons" role="group"
                            aria-label="Button group with nested dropdown">
                        </div>

                        <form class="form" method="post" enctype="multipart/form-data" action="{{ route('create.channel.details') }}">
                            @csrf

                            <div class="card-body">
                                <div class="form-group row">
                                    <div class="col-lg-6">
                                        <label>Channel Name:</label>
                                        <input type="text" class="form-control" name="title">
                                    </div>
                                    <div class="col-lg-6">
                                        <label>Plan Selected</label>
                                        <select class="form-control form-control" name="plan" id="exampleSelect2">
                                            <option value="">Choose Plan Name</option>
                                            @foreach ($Plans as $Plan)
                                            <option value="{{ $Plan->id }}">{{ $Plan->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-6">
                                        <label>Status</label>
                                        <select class="form-control form-control" name="status" id="exampleSelect2">
                                            <option value="">Choose Status</option>
                                                <option value="1">Active</option>
                                                <option value="0">Disable</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-6">
                                        <label>Type:</label>
                                        <select class="form-control form-control" name="type" id="exampleSelect2">
                                            <option value="">Choose Type</option>
                                                <option value="free">Free</option>
                                                <option value="paid">Paid</option>
                                        </select>
                                    </div>

                                </div>

                                <div class="form-group row">
                                    <div class="col-lg-12">
                                        <label> Image:</label>
                                        <input type="file" name="image" class="filepond">

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

<script src="https://unpkg.com/filepond/dist/filepond.min.js"></script>
<script src="https://unpkg.com/filepond-plugin-file-encode/dist/filepond-plugin-file-encode.js"></script>
<script src="https://unpkg.com/filepond-plugin-image-resize/dist/filepond-plugin-image-resize.js"></script>

<script src="https://unpkg.com/filepond-plugin-image-validate-size/dist/filepond-plugin-image-validate-size.js"></script>
<script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>

<script src="https://unpkg.com/jquery-filepond/filepond.jquery.js"></script>

    <script>
        $(document).ready(function(e) {
            $.fn.filepond.registerPlugin(FilePondPluginFileEncode);
        $.fn.filepond.registerPlugin(FilePondPluginImagePreview);
        $.fn.filepond.registerPlugin(FilePondPluginImageResize);

        // Turn input element into a pond with configuration options
        $('.filepond').filepond({

            allowMultiple: false,
            name:'image',
            maxFiles: 1,
            imageResizeMode:'cover',
            acceptedFileTypes: ['image/png', 'image/jpg', 'image/jpeg'],
        });

        });
    </script>
@endsection

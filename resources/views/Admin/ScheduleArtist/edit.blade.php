@extends('Partials.AdminLayout')

@section('title', 'Edit Scheduling')
@section('css')
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

                        <a class="btn btn-success" href="{{ route('scheduleartists') }}"> Go Back</a>

                        <div style="text-align: right;" class="btn-group" id="dtButtons" role="group"
                            aria-label="Button group with nested dropdown">
                        </div>

                        <form class="form" method="post" action="{{route('update.ScheduleArtist.details')}}">
                            @csrf

                            <input type="hidden" value="{{$scheduleartistDetails->id}}" name="songid">
                            <div class="card-body">
                                <div class="form-group row">
                                    <div class="col-lg-6">
                                        <label>Schedule Date:</label>
                                        <input type="text" value="{{$scheduleartistDetails->date}}" class="form-control" name="date" required>
                                    </div>
                                    <div class="col-lg-6">
                                        <label>Start Time:</label>
                                        <input type="text" value="{{$scheduleartistDetails->start_time}}" class="form-control" name="start_time" required>
                                    </div>

                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-6">
                                        <label>END Time:</label>
                                        <input type="text" value="{{$scheduleartistDetails->end_time}}"class="form-control" name="end_time" required>
                                    </div>
                                    <div class="col-lg-6">
                                        <label>Artist:</label>
                                        <select class="form-control form-control" name="artist_id" id="exampleSelect2">
                                            <option value="">Choose Artist</option>
                                            @foreach ($artists as $artist)
                                            <option value="{{ $artist->id }}" {{ $artist->id == $scheduleartistDetails->artist_id ? 'selected' : '' }}>
                                                {{ $artist->name }}
                                            </option>
                                        @endforeach
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

    <script>

        $(document).ready(function(e) {

        });
    </script>
@endsection

@extends('Partials.AdminLayout')

@section('title', 'Channels')
@section('css')
<link href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css?v=7.0.5') }}" rel="stylesheet" type="text/css" />
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
                    <a href="{{ route('createchannel') }}" class="btn btn-light-warning font-weight-bolder btn-sm">Add New</a>
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

                        <!--begin: Datatable-->
                        <table class="table table-separate table-head-custom table-checkable" id="kt_datatable">
                            <thead>
                            <tr>
                                <th><input type="checkbox" name="main_checkbox"><label></label></th>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Artist Name</th>
                                <th>Type</th>
                                <th>Plan Name</th>
                                <th>Status</th>
                                <th>Image</th>
                                <th>Online</th>
                                <th>Actions <button class="btn btn-sm btn-danger d-none" id="deleteAllBtn">Delete All</button></th>
                            </tr>
                            </thead>
                        </table>
                        <!--end: Datatable-->

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


    toastr.options.preventDuplicates = true;

    $.ajaxSetup({
        headers:{
            'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
        }
    });

            $(document).ready(function(e){

                    //GET ALL COUNTRIES

                var table =  $('#kt_datatable').DataTable({
                         processing:true,
                         info:true,
                         ajax:"{{ route('get.channels.list') }}",
                         "pageLength":5,
                         "aLengthMenu":[[5,10,25,50,-1],[5,10,25,50,"All"]],
                         crollY: '50vh',
                         scrollX: true,
                         scrollCollapse: true,
                         columns:[
                             {data:'checkbox', name:'checkbox', orderable:false, searchable:false},
                             {data:'DT_RowIndex', name:'DT_RowIndex'},
                             {data:'title', name:'title', defaultContent: ''},
                             {data:'artist.name', name:'artist_id',defaultContent: ''},
                             {data:'type', name:'type'},
                             {data:'plans.title', name:'plan_id', defaultContent: ''},
                             {data:'status', name:'status'},
                             {data: 'image',
                             name : 'id',
                             render: function( data, type, full, meta ) {
                             return "<img src=\" {{asset('storage/')}}/" + data + "\" height=\"50\" />";
                             }
                             },

                             {data:'online', name:'online'},
                             {data:'actions', name:'actions', orderable:false, searchable:false},
                         ]
                    }).on('draw', function(){
                        $('input[name="country_checkbox"]').each(function(){this.checked = false;});
                        $('input[name="main_checkbox"]').prop('checked', false);
                        $('button#deleteAllBtn').addClass('d-none');
                    });


                    // Select Multiple checkbox and delete

    $(document).on('click','input[name="main_checkbox"]', function(){
                      if(this.checked){
                        $('input[name="country_checkbox"]').each(function(){
                            this.checked = true;
                        });
                      }else{
                         $('input[name="country_checkbox"]').each(function(){
                             this.checked = false;
                         });
                      }
                      toggledeleteAllBtn();
               });

               $(document).on('change','input[name="country_checkbox"]', function(){

                   if( $('input[name="country_checkbox"]').length == $('input[name="country_checkbox"]:checked').length ){
                       $('input[name="main_checkbox"]').prop('checked', true);
                   }else{
                       $('input[name="main_checkbox"]').prop('checked', false);
                   }
                   toggledeleteAllBtn();
               });


               function toggledeleteAllBtn(){
                   if( $('input[name="country_checkbox"]:checked').length > 0 ){
                       $('button#deleteAllBtn').text('Delete ('+$('input[name="country_checkbox"]:checked').length+')').removeClass('d-none');
                   }else{
                       $('button#deleteAllBtn').addClass('d-none');
                   }
               }

                               //DELETE Product RECORD
                               $(document).on('click','#deleteCountryBtn', function(){
                        var channel_id = $(this).data('id');
                        var url = '<?= route("delete.channel") ?>';

                        swal.fire({
                             title:'Are you sure?',
                             html:'You want to <b>delete</b> this Channel',
                             showCancelButton:true,
                             showCloseButton:true,
                             cancelButtonText:'Cancel',
                             confirmButtonText:'Yes, Delete',
                             cancelButtonColor:'#d33',
                             confirmButtonColor:'#556ee6',
                             width:300,
                             allowOutsideClick:false
                        }).then(function(result){
                              if(result.value){
                                  $.post(url,{channel_id:channel_id}, function(data){
                                       if(data.code == 1){
                                           $('#kt_datatable').DataTable().ajax.reload(null, false);
                                           toastr.success(data.msg);
                                       }else{
                                           toastr.error(data.msg);
                                       }
                                  },'json');
                              }
                        });

                    });

                    $(document).on('click','button#deleteAllBtn', function(){
                   var checkedCountries = [];
                   $('input[name="country_checkbox"]:checked').each(function(){
                       checkedCountries.push($(this).data('id'));
                   });

                   var url = '{{ route("delete.selected.channels") }}';
                   if(checkedCountries.length > 0){
                       swal.fire({
                           title:'Are you sure?',
                           html:'You want to delete <b>('+checkedCountries.length+')</b> Channels',
                           showCancelButton:true,
                           showCloseButton:true,
                           confirmButtonText:'Yes, Delete',
                           cancelButtonText:'Cancel',
                           confirmButtonColor:'#556ee6',
                           cancelButtonColor:'#d33',
                           width:300,
                           allowOutsideClick:false
                       }).then(function(result){
                           if(result.value){
                               $.post(url,{countries_ids:checkedCountries},function(data){
                                  if(data.code == 1){
                                      $('#kt_datatable').DataTable().ajax.reload(null, true);
                                      toastr.success(data.msg);
                                  }
                               },'json');
                           }
                       })
                   }
               });

    });


        </script>
@endsection

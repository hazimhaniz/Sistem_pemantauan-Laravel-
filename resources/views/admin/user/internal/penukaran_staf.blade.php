@extends('layouts.app')
@include('plugins.datatables')

@section('content')
<!-- START JUMBOTRON -->
<div class="jumbotron" data-pages="parallax">
    <div class=" container-fluid container-fixed-lg sm-p-l-0 sm-p-r-0">
        <div class="inner">
            <!-- START BREADCRUMB -->
            {{ Breadcrumbs::render('admin.user.internal') }}
            <!-- END BREADCRUMB -->
            <div class="row">
                <div class="col-xl-12 col-lg-12 ">
                    <!-- START card -->
                    <div class="card card-transparent">
                        <div class="card-block p-t-0">
                            <h3 class='m-t-0'>Penukaran Pengguna Dalaman</h3>
                            <p class="small hint-text m-t-5">
                                Pengurusan pengguna dalaman boleh dilakukan melalui jadual di bawah.
                            </p>
                            <!-- <div class="p-t-10" id="form-project" role="form" autocomplete="off" novalidate> -->
<!--                                 <form class="p-t-10" id="form-project" role="form" autocomplete="off" method="post" action="{{ route('admin.user.internal') }}" novalidate>
                                    <div class="form-group-attached">
                                        <div class="row clearfix">
                                            <div class="col-md-4">
                                                <div class="form-group form-group-default form-group-default-custom form-group-default-select2 required">
                                                    <label><span>Pejabat</span></label>
                                                    <select id="province_office_id" name="province_office_id" class="full-width autoscroll" data-init-plugin="select2" required="">
                                                        <option value="-1" selected="" >Pilih satu..</option>
                                                        @foreach($provinces as $index => $province)
                                                        <option value="{{ $province->id }}">{{ $province->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group form-group-default form-group-default-custom form-group-default-select2 required">
                                                    <label><span>Peranan</span></label>
                                                    <select id="role_id" name="role_id" class="full-width autoscroll" data-init-plugin="select2" required="">
                                                        <option value="-1" selected="" >Pilih satu..</option>
                                                        @foreach($roles as $index => $role)
                                                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group form-group-default form-group-default-custom form-group-default-select2 required">
                                                    <label><span>Status</span></label>
                                                    <select id="status_id" name="status_id" class="full-width autoscroll" data-init-plugin="select2" required="">
                                                        <option value="-1" selected="">Pilih satu..</option>
                                                        @foreach($all_status as $index => $status)
                                                        <option value="{{ $status->id }}">{{ $status->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form> -->
                                <!-- </div> -->
                            </div>
                        </div>
                        <!-- END card -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END JUMBOTRON -->

    <!-- START CONTAINER FLUID -->
    <div class=" container-fluid container-fixed-lg bg-white">
        <!-- START card -->
        <div class="card card-transparent">
            <div class="card-header px-0 search-on-button">
             
                <div class="pull-right">
                    <div class="col-xs-12">
                        <input type="text" id="search-table" class="form-control pull-right" placeholder="Carian...">
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="card-block">
                <table class="table table-responsive table-hover" id="table">
                    <thead>
                        <tr>
                            <th class="fit">Bil.</th>
                            <th>Nama</th>
                            <th>ID Pengguna</th>
                            <th>Peranan</th>
                            <th>Negeri</th>
                            <th>Status</th>
                            <th>Tindakan</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
        <!-- END card -->
    </div>
    <!-- END CONTAINER FLUID -->
    @endsection

    @push('js')
    <script type="text/javascript">
        var table = $('#table');

        var settings = {
            "processing": true,
    // "serverSide": true,
    "deferRender": true,
    "ajax": "{{ fullUrl() }}",
    "columns": [
    { data: 'index', defaultContent: '', orderable: false, searchable: false, render: function (data, type, row, meta) {
        return meta.row + meta.settings._iDisplayStart + 1;
    }},
    { data: "name", name: "name", defaultContent: "-", render: function(data, type, row){
        return $("<div/>").html(data).text();
    }},
    { data: "username", name: "username", defaultContent: "-", render: function(data, type, row){
        return $("<div/>").html(data).text();
    }},
    { data: "entity_staff.role.name", name: "entity_staff.role.name", defaultContent: "-" }, 
    { data: "state", name: "state", defaultContent: "-",render: function(data, type, row){
        return $("<div/>").html(data).text();
    }},   
    { data: "status.name", name: "status.name", defaultContent: "-",render: function(data, type, row){
        return $("<div/>").html(data).text();
    }},
    { data: "action", name: "action", orderable: false, searchable: false},
    ],
    "columnDefs": [
    { className: "nowrap", "targets": [ 5 ] }
    ],
    "sDom": "B<t><'row'<p i>>",
    // "buttons": [
    // {
    //     text: '<i class="fa fa-plus m-r-5"></i> Pengguna Dalaman',
    //     className: 'btn btn-success btn-cons',
    //     action: function ( e, dt, node, config ) {
    //         add();
    //     }
    // },
        // {
        //     text: '<i class="fa fa-print m-r-5"></i> Cetak',
        //     extend: 'print',
        //     className: 'btn btn-default btn-sm',
        //     exportOptions: {
        //         columns: ':visible:not(.nowrap)'
        //     }
        // },
        // {
        //     text: '<i class="fa fa-download m-r-5"></i> Excel',
        //     extend: 'excelHtml5',
        //     className: 'btn btn-default btn-sm',
        //     exportOptions: {
        //         columns: ':visible:not(.nowrap)'
        //     }
        // },
        // {
        //     text: '<i class="fa fa-download m-r-5"></i> PDF',
        //     extend: 'pdfHtml5',
        //     className: 'btn btn-default btn-sm',
        //     exportOptions: {
        //         columns: ':visible:not(.nowrap)'
        //     }
        // },
        // ],
        "destroy": true,
        "scrollCollapse": true,
        "oLanguage": {
            "sEmptyTable":      "Tiada data",
            "sInfo":            "Paparan dari _START_ hingga _END_ dari _TOTAL_ rekod",
            "sInfoEmpty":       "Paparan 0 hingga 0 dari 0 rekod",
            "sInfoFiltered":    "(Ditapis dari jumlah _MAX_ rekod)",
            "sInfoPostFix":     "",
            "sInfoThousands":   ",",
            "sLengthMenu":      "Papar _MENU_ rekod",
            "sLoadingRecords":  "Diproses...",
            "sProcessing":      "Sedang diproses...",
            "sSearch":          "Carian:",
            "sZeroRecords":      "Tiada padanan rekod yang dijumpai.",
            "oPaginate": {
             "sFirst":        "Pertama",
             "sPrevious":     "Sebelum",
             "sNext":         "Seterusnya",
             "sLast":         "Akhir"
         },
         "oAria": {
             "sSortAscending":  ": diaktifkan kepada susunan lajur menaik",
             "sSortDescending": ": diaktifkan kepada susunan lajur menurun"
         }
     },
     "iDisplayLength": 10
 };

 table.dataTable(settings);

 $("select, input").on('change', function() {

    var form = $("#form-project");

    var settings = {
        "processing": true,
        "serverSide": true,
        "deferRender": true,
        "ajax": form.attr('action')+"?"+form.serialize(),
        "columns": [
        { data: 'index', defaultContent: '', orderable: false, searchable: false, render: function (data, type, row, meta) {
            return meta.row + meta.settings._iDisplayStart + 1;
        }},
        { data: "name", name: "name", defaultContent: "-", render: function(data, type, row){
            return $("<div/>").html(data).text();
        }},
        { data: "username", name: "username", defaultContent: "-", render: function(data, type, row){
            return $("<div/>").html(data).text();
        }},
            // { data: "created_at", name: "created_at", defaultContent: "-" },
            { data: "entity_staff.role.name", name: "entity_staff.role.name", defaultContent: "-" },
            { data: "entity_staff.province_office.name", name: "entity_staff.province_office.name", searchable: false },    
            { data: "state", name: "state", defaultContent: "-",render: function(data, type, row){
                return $("<div/>").html(data).text();
            }},       
            { data: "status.name", name: "status.name", defaultContent: "-",render: function(data, type, row){
                return $("<div/>").html(data).text();
            }},
            { data: "action", name: "action", orderable: false, searchable: false},
            ],
            "columnDefs": [
            { className: "nowrap", "targets": [ 6 ] }
            ],
            "sDom": "B<t><'row'<p i>>",
            "buttons": [
            // {
            //     text: '<i class="fa fa-plus m-r-5"></i> Pengguna Dalaman',
            //     className: 'btn btn-success btn-cons',
            //     action: function ( e, dt, node, config ) {
            //         add();
            //     }
            // },
            // {
            //     text: '<i class="fa fa-print m-r-5"></i> Cetak',
            //     extend: 'print',
            //     className: 'btn btn-default btn-sm',
            //     exportOptions: {
            //         columns: ':visible:not(.nowrap)'
            //     }
            // },
            // {
            //     text: '<i class="fa fa-download m-r-5"></i> Excel',
            //     extend: 'excelHtml5',
            //     className: 'btn btn-default btn-sm',
            //     exportOptions: {
            //         columns: ':visible:not(.nowrap)'
            //     }
            // },
            // {
            //     text: '<i class="fa fa-download m-r-5"></i> PDF',
            //     extend: 'pdfHtml5',
            //     className: 'btn btn-default btn-sm',
            //     exportOptions: {
            //         columns: ':visible:not(.nowrap)'
            //     }
            // },
            ],
            "destroy": true,
            "scrollCollapse": true,
            "oLanguage": {
                "sEmptyTable":      "Tiada data",
                "sInfo":            "Paparan dari _START_ hingga _END_ dari _TOTAL_ rekod",
                "sInfoEmpty":       "Paparan 0 hingga 0 dari 0 rekod",
                "sInfoFiltered":    "(Ditapis dari jumlah _MAX_ rekod)",
                "sInfoPostFix":     "",
                "sInfoThousands":   ",",
                "sLengthMenu":      "Papar _MENU_ rekod",
                "sLoadingRecords":  "Diproses...",
                "sProcessing":      "Sedang diproses...",
                "sSearch":          "Carian:",
                "sZeroRecords":      "Tiada padanan rekod yang dijumpai.",
                "oPaginate": {
                 "sFirst":        "Pertama",
                 "sPrevious":     "Sebelum",
                 "sNext":         "Seterusnya",
                 "sLast":         "Akhir"
             },
             "oAria": {
                 "sSortAscending":  ": diaktifkan kepada susunan lajur menaik",
                 "sSortDescending": ": diaktifkan kepada susunan lajur menurun"
             }
         },
         "iDisplayLength": 10
     };

     table.dataTable(settings);
 });

// search box for table
$('#search-table').keyup(function() {
    table.fnFilter($(this).val());
});

function passwordUser(id) {
    $("#modal-div").load("{{ route('admin.user.internal') }}/password/"+id);
}

function edit(id) {
    $('#server').hide();
    $('#wujud').hide();
    $('#yes').hide();
    $('#no').hide();
    $("#modal-div").load("{{ route('admin.user.internal.tukarStaf.change') }}/"+id);
}

function add() {
    // $('#modal-add').modal('show');
    // document.getElementById("modal-add").reset();
    $('#server').hide();
    $('#wujud').hide();
    $('#yes').hide();
    $('#no').hide();
    $('#modal-add').modal({
        backdrop: 'static',
        keyboard: false
    });
    $('.modal form').trigger("reset");
    $('.modal form').validate();
}

$("#form-add").submit(function(e) {
    e.preventDefault();
    var form = $(this);

    if(!form.valid())
     return;

 $.ajax({
    url: form.attr('action'),
    method: form.attr('method'),
    data: new FormData(form[0]),
    dataType: 'json',
    async: true,
    contentType: false,
    processData: false,
    success: function(data) {
            // swal(data.title, data.message);
            swal.fire({
                title: data.title,
                text: data.message,
                // buttons: ["Batal", { text: "Padam", closeModal: false }],
                // dangerMode: false,
            },function(isConfirm){
                $("#modal-add").modal("hide");
                location.reload();
                table.api().ajax.reload(null, false);
            })
            location.reload();
        }
    });
 location.reload();
});

function remove(id) {
    swal.fire({
        title: "Padam Data",
        text: "Data yang telah dipadam tidak boleh dikembalikan. Teruskan?",
        icon: "warning",
        buttons: ["Batal", { text: "Padam", closeModal: false }],
        dangerMode: true,
    })
    .then((confirm) => {
        if (confirm) {
            $.ajax({
                url: '{{ route('admin.user.internal') }}/'+id,
                method: 'delete',
                dataType: 'json',
                async: true,
                contentType: false,
                processData: false,
                success: function(data) {
                    swal.fire(data.title, data.message, data.status);
                    table.api().ajax.reload(null, false);
                }
            });
        }
    });
}
function checkADfile()
{
// $("#email").keyup(function(event) {
    // if (event.keyCode === 13 || event.keyCode === 9) {
      var email = document.getElementById('email').value;
      if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email))
      {
          var url = "{{ route('adintegration.index',['email' => ":email"]) }}";
          url = url.replace('%3Aemail', email);

          var urlString = url.replace(/&amp;/g, '&');
          $.ajax({
              url: urlString,
              type: 'get',
              success: function(response) {
                console.log(response);
                if (response.result == 'yes') {
                  $('#server').hide();
                  $('#wujud').hide();
                  $('#yes').show();
                  $('#no').hide();
                  $('#hantar').show();
                  document.getElementById("name").value = response.name;
                  document.getElementById("negeri").value = response.negeri;
                  document.getElementById("username").value = response.username;
                  document.getElementById("cawangan").value = response.cawangan;
              }if (response.result == 'no') {
                $('#wujud').hide();
                $('#server').hide();
                $('#yes').hide();
                $('#no').show();
                $('#hantar').hide();
                document.getElementById("name").value = "";
                document.getElementById("negeri").value = "";
                document.getElementById("username").value = "";
                document.getElementById("cawangan").value = "";
            }if (response.result == 'wujud') {
              $('#wujud').show();
              $('#server').hide();
              $('#yes').hide();
              $('#no').hide();
              $('#hantar').hide();
          }if (response.result == 'server') {
            $('#wujud').hide();
            $('#server').show();
            $('#yes').hide();
            $('#no').hide();
            $('#hantar').hide();
        }
    }
});

      }
    // }
// });
}
</script>
@endpush
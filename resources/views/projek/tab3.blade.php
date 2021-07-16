<style>
    label {
        font-family: 'Montserrat' !important;
        font-size: 10.5px !important;
    }

    .hidden-xs {
        font-family: 'Montserrat' !important;
        font-size: 10.5px !important;

    }

    .btn {
        font-family: 'Montserrat' !important;
        font-size: 10.5px !important;
        s
    }

    .dashTitle {
        font-family: 'Montserrat' !important;
        font-size: 12.5px !important;
        letter-spacing: 0.06em !important;
        /* text-transform: uppercase !important; */
        font-weight: 500 !important;

    }

    th {
        background-color: #ebe8ec;
        color: #000 !important;
        //border-top: none;
        font-family: 'Montserrat' !important;
        font-size: 10.5px !important;
        letter-spacing: 0.06em !important;
        text-transform: uppercase !important;
        font-weight: 500 !important;
        //border-left: none !important;
        padding: 4px;
    }

    td {
      
        color: #000 !important;
      
        font-family: 'Montserrat' !important;
        font-size: 10.5px !important;
        letter-spacing: .06em !important;
        padding: 4px;
     
    }

    .modal-lg1 {
        max-width: 50% !important;
        width: 50% !important;
        margin: 0 auto !important;
    }

    .title {
        font-weight: 500 !important;
        font-size: 14.5px !important;
        font-family: 'Montserrat' !important;
    }

</style>


<div class="row">
    <form id='audit' role="form" method="post" action="{{ route('projek.audit') }}">
        <div class="col-md-12">
            <div class="title"><b>MAKLUMAT AUDIT ALAM SEKELILING</b></div>
            <br>

            <div class="dashTitle"><b>Status Kemajuan</b>.</div>
            <div class="row">

               @foreach($peringkatPengawasan as $value)
               <div class="col-md-4">
                <div class="form-group">
                    <div class="peringkatAudit">
                        <div class="radio radio-primary">
                            <input type="radio" value="{{$value->id}}" id="kemajuan_{{$value->id}}" class="projek1" name="peringkatPengawasan">
                            <label for="kemajuan_{{$value->id}}">{{$value->name}}</label>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

    </div>
    <br>
    <div class="col-md-12">
        <div class="form-group form-group-default">
            <div class="form-input-group">
                <label>
                    <span><b class="text-dark">Tarikh Cadangan Audit </b></span><span
                    style="color:red;">*</span>
                </label>
                <input class="form-control datepicker" type="text" id="tarikh_audit" name="tarikh_audit">
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="dashTitle"><b>Tempoh Audit Alam sekeling</b>.</div>
        <div class="row">

            @foreach ($tempohAudit as $valueaudit)
            <div class="col-md-4">
                <div class="form-group">
                    <div class="tempohAudit">
                        <div class="radio radio-primary">
                            <input name="jenis" value="{{ $valueaudit->id }}" id="tempoh_{{ $valueaudit->id }}" type="radio" class="projek1" required="" aria-required="true"  {{$ProjekDetail->jenis == $valueaudit->id ? "checked" : ""}}>

                            <label for="tempoh_{{ $valueaudit->id }}">{{ $valueaudit->name }}</label>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>




    <br>
    <div class="dashTitle"><b>Maklumat Pendaftaran EMP</b>.</div>
    <table class="table table-hover table-responsive dataTable no-footer display nowrap" id="table" role="grid"
    aria-describedby="table_info">
    <table class="table table-bordered" id="tableAudit" style="width: 100%">

        <thead>
            <tr role="row">
                <th bgcolor="#f0f0f0" class="fit align-top text-center" style="width: 5px; color:#000">No.
                </th>
                <th bgcolor="#f0f0f0" class="align-top text-center" style="width: 20px; color:#000">Tarikh Cadangan
                    Audit Alam Sekeliling
                </th>
                <th bgcolor="#f0f0f0" class="align-top text-center" style="width: 20px; color:#000"> Status Kemajuan
                    Kerja Projek
                </th>
                <th bgcolor="#f0f0f0" class="align-top text-center" style="width: 20px; color:#000">Kekerapan Audit
                </th>

                <th bgcolor="#f0f0f0" class="align-top text-center" style="width: 10px; color:#000">No.Rujukan</th>

                <th bgcolor="#f0f0f0" class="align-top text-center" style="width: 20px; color:#000">
                Tindakan</th>

            </tr>
        </thead>

    </table>
    <div class="col-md-12">
        <ul class="pager wizard no-style">
            <li class="submit">
                <button class="btn btn-info btn-cons from-left pull-right submitProjek" type="button">
                    <span>Hantar</span>
                </button>
            </li>
            <li class="submit">
                <button class="btn btn-info btn-cons from-left pull-right" type="button">
                    <span>Simpan</span>
                </button>
            </li>
           <!--  <li class="previous">
                <button class="btn btn-default btn-cons from-left" type="button">
                    <span>Kembali</span>
                </button>
            </li> -->
        </ul>
    </div>
</div>
</form>
</div>

@push('js')
<script type="text/javascript">

    $("input[name='jenis']").on('change', function(){
        console.log($(this).val());
        var projectID = "{{ $ProjekDetail->projek_id }}";
        var jenis = $(this).val();
        var peringkatPengawasan = $("input[name='peringkatPengawasan']:checked").val();
        var tarikh_audit = $("#tarikh_audit").val();

        var formData = new FormData();
        formData.append('projectID', projectID);
        formData.append('jenis', jenis);
        formData.append('peringkatPengawasan', peringkatPengawasan);
        formData.append('tarikh_audit', tarikh_audit);

        $.ajax({
            url: "{{ url('/projek/add-audit') }}",
            method: "post",
            data: formData,
            dataType: 'json',
            async: false,
            contentType: false,
            processData: false,
            success: function(data) {      
                console.log(data);
                tableAudit.api().ajax.reload(null, false);
                // tableAudit.dataTable(settingAudit);
            },
            error: function(data){
                console.log(data);
            }
        });
    });

    @if($ProjekDetail->peringkat_audit)
    $("#peringkat_audit").val( {{ $ProjekDetail->peringkat_audit }} ).trigger('change');
    @endif

    $("#tab_4_{{ $ProjekDetail->peringkat_audit }}").prop('checked', true).trigger('change');
    $("#tempoh_{{ $ProjekDetail->jenis }}").prop('checked', true).trigger('change');

    function editaudit(id) {
        $("#modal-div").load("../projek/kemaskiniaudit/"+id);
        $('.modal form').trigger("reset");
        $('.modal form').validate();
    }

    function editaudit1(id,frequent) {
        $("#modal-div").load("../projek/kemaskiniaudit1/"+id);
        $('.modal form').trigger("reset");
        $('.modal form').validate();
    }

    var tableAudit = $('#tableAudit');

    var settingAudit = {
        "processing": true,
        "serverSide": true,
        "deferRender": true,
        "searchable": false,
        "ajax": "{{ route('getTarikhAudit', $Projek->id) }}",
        "columns": [
        { data: 'index', defaultContent: '', orderable: false, searchable: false, render: function (data, type, row, meta) {
            return meta.row + meta.settings._iDisplayStart + 1;
        }},
        { data: "tarikh", name: "tarikh", defaultContent: "-", "searchable": false, render: function(data, type, row){
            return $("<div/>").html(data).text();
        }}, 
        { data: "status", name: "status", defaultContent: "-", "searchable": false, render: function(data, type, row){
            return $("<div/>").html(data).text();
        }}, 
        { data: "kekerapan", name: "kekerapan", defaultContent: "-", "searchable": false, render: function(data, type, row){
            return $("<div/>").html(data).text();
        }}, 
        { data: "rujukan", name: "rujukan", defaultContent: "-", "searchable": false, render: function(data, type, row){
            return $("<div/>").html(data).text();
        }},
        { data: "action", name: "action", orderable: false, searchable: false},
        ],
        "columnDefs": [
        { className: "nowrap", "targets": [ 2 ] }
        ],
        "sDom": "B<t><'row'<p i>>",
        "buttons": [
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
                    "iDisplayLength": 15
                };

                tableAudit.dataTable(settingAudit);

            </script>
            @endpush



<div class=" container-fluid container-fixed-lg bg-white">
    <div class="card card-transparent">
        <div class="card-block">
            <div class="card card-default">
                <div class="card-header separator">
                    <div class="card-title" style="font-weight: bold;font-size: 12.5px">MAKLUMAT AUDIT ALAM SEKELILING</div>
                </div>
                <div class="card-body">
                    <div class="form-group row control-label m-t-20">
                        <label class="col-md-3 m-t-15">Peringkat<span style="color:red;">*</span> </label>
                        <div class="col-md-9">
                            <div class="peringkatAudit">
                                <input class="form-control projek" name="peringkat_audit" aria-required="true" type="text" value="{{optional($ProjekDetail->peringkat_pengawasan)->name}}" required placeholder="Negeri" minlength="5" maxlength="5" readonly>
                                <!-- <div class="radio radio-primary"> 
                                    @foreach ($peringkatPengawasan as $value)
                                    <input name="peringkat_audit" value="{{ $value->id }}" id="tab_4_{{ $value->id }}" type="radio" class="projek" aria-required="true" {{$ProjekDetail->peringkat_audit == $value->id ? "checked" : ""}} disabled>
                                    <label for="tab_4_{{ $value->id }}">{{ $value->name }}</label>
                                    @endforeach
                                </div> -->
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 control-label m-t-15">Tempoh Audit Alam Sekeliling<span style="color:red;">*</span> </label>
                        <div class="col-md-9">
                            <div class="tempohAudit">
                                <div class="radio radio-primary">
                                    @foreach ($tempohAudit as $valueaudit)
                                    <input name="jenis" value="{{ $valueaudit->id }}" id="tempoh_{{ $valueaudit->id }}" type="radio" class="projek" required="" aria-required="true"  {{$ProjekDetail->jenis == $valueaudit->id ? "checked" : ""}} disabled>
                                    <label for="tempoh_{{ $valueaudit->id }}">{{ $valueaudit->name }}</label>
                                    <br>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row col-md-12">
                        <span class="text-danger disclaimerAudit"></span>
                        <div class="table-responsive">
                            <table class="table table-bordered" id="tableAudit" width="30%">
                                <thead>
                                    <tr>
                                        <th>Tarikh Cadangan Audit Alam Sekeliling</th>
                                        <!-- <th>Tindakan</th> -->
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row p-b-10">
            <div class="col-md-12">
                <ul class="pager wizard no-style">
                    <li class="next">
                        <button class="btn btn-success btn-cons from-left pull-right" type="button">
                            <span>Seterusnya</span>
                        </button>
                    </li>

                    <li class="submit">
                        @if($_GET['a']==1)
                            <button href="javascript:;" onclick="peraku(1)" class="btn btn-info btn-cons from-left pull-right" type="button">
                              <span>Sahkan</span>
                            </button>
                            <button href="javascript:;" onclick="tidaklengkap(1)" class="btn btn-danger btn-cons from-left pull-right" type="button">
                              <span>Tidak Lengkap</span>
                            </button>
                        @elseif($_GET['a']==12)
                            <button href="javascript:;" onclick="peraku(1)" class="btn btn-info btn-cons from-left pull-right " type="button">
                              <span>Sahkan</span>
                            </button>
                        @else
                            <button href="javascript:;" onclick="javascript:history.back()" class="btn btn-info btn-cons from-left pull-right " type="button">
                            <span>Selesai</span>
                        </button>
                        @endif
                    </li>

                    <li class="previous">
                        <button class="btn btn-default btn-cons from-left" type="button">
                            <span>Kembali</span>
                        </button>
                    </li>
                </ul>
            </div>
        </div>
        </div>
    </div>
</div>


@push('js')
    <script type="text/javascript">
        $("#tab_4_{{ $ProjekDetail->peringkat_audit }}").prop('checked', true).trigger('change');
        $("#tempoh_{{ $ProjekDetail->jenis }}").prop('checked', true).trigger('change');

    function editaudit(id) {
        $("#modal-div").load("../projek/kemaskiniaudit/"+id);
        $('.modal form').trigger("reset");
        $('.modal form').validate();
    }

    //Disable keluar dua kali noti di pengesahan Projek
    // $("#form-sah-projek").submit(function(e) {
    //     // alert('wdwdw');
    //     e.preventDefault();
    //     var form = $(this);

    //         if(!form.valid())
    //         return;

    //     $.ajax({
    //         url: form.attr('action'),
    //         method: form.attr('method'),
    //         data: new FormData(form[0]),
    //         dataType: 'json',
    //         async: true,
    //         contentType: false,
    //         processData: false,
    //         success: function(data) {
    //             swal(data.title, data.message);
    //             $("#modal-peraku").modal("hide");
    //             table.api().ajax.reload(null, false);
    //             location.href = '{{ route('pengesahanprojek.belumsah') }}';
    //         }
    //     });
    // });

//disable sebab hantar dua kali notifikasi di PP
//     $("#form-tidaklengkap").submit(function(e) {
//        e.preventDefault();
//        var form = $(this);

//        if(!form.valid())
//          return;

//      $.ajax({
//        url: form.attr('action'),
//        method: form.attr('method'),
//        data: new FormData(form[0]),
//        dataType: 'json',
//        async: true,
//        contentType: false,
//        processData: false,
//        success: function(data) {
//            swal(data.title, data.message);
//            $("#modal-tidaklengkap").modal("hide");
//            table.api().ajax.reload(null, false);
//            location.href = '{{ route('pengesahanprojek.belumsah') }}';
//        }
//    });
//  });
    function peraku() {
        $("#modal-peraku").modal("show");
        $('.modal form').trigger("reset");
        $('.modal form').validate();
    }

    function tidaklengkap() {
        $("#modal-tidaklengkap").modal("show");
    }

    var tableAudit = $('#tableAudit');

            var settingAudit = {
                "processing": true,
                "serverSide": true,
                "deferRender": true,
                "searchable": false,
                "ajax": "{{ route('viewAudit', ['id'=>$Projek->id,'a'=>request()->a]) }}",
                "columns": [
                    { data: "tarikh", name: "tarikh", defaultContent: "-", orderable: false, searchable: false, render: function(data, type, row){
                            return $("<div/>").html(data).text();
                        }},           
                    // { data: "action", name: "action", orderable: false, searchable: false},
                ],
                "columnDefs": [
                    { className: "nowrap", "targets": [ 0 ] }
                ],
                "sDom": "B<t><'row'<p i>>",
                "buttons": [
                    {
				text: '<i class="fa fa-print text-info"></i>',
				extend: 'print',
				className: 'btn btn-default btn-sm',
				exportOptions: {
					columns: ':visible:not(.nowrap)'
				}
			},
			{
				text: '<i class="fas fa-file-excel text-success"></i>',
				extend: 'excelHtml5',
				className: 'btn btn-default btn-sm',
				exportOptions: {
					columns: ':visible:not(.nowrap)'
				}
			},
			{
				text: '<i class="fas fa-file-pdf text-danger"></i>',
				extend: 'pdfHtml5',
				className: 'btn btn-default btn-sm',
				exportOptions: {
					columns: ':visible:not(.nowrap)'
				}
			},,
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
@include('layouts.modal')
<div class="modal fade" id="modal-kuiri" tabindex="-1" role="dialog" aria-labelledby="addModalTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalTitle"><span class="bold">Makmal Akreditasi</span></h5>
                <!-- <small class="text-muted">Kindly fill in the fields in the form below.</small> -->
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php //dd($id); ?>
            <div class="modal-body m-t-20">
              <form id='makmalAkreditasi' role="form" method="post" action="{{ route('makmalAkreditasi.simpan') }}" enctype="multipart/form-data">
                @include('components.input', [
                'name' => 'id',
                'id' => 'lab',
                'mode' => 'hidden',
                'value' => $id,
                ])
                @include('components.input', [
                'label' => 'Kod Makmal Akreditasi',
                'name' => 'kodmakmal',
                'id' => 'lab',
                'mode' => 'required',
                ])
                <button class="btn btn-successs btn-cons btn-animated from-left pull-right fa fa-check" type="button" onclick="checkmakmal()">
                  <span>Kemaskini Kod Makmal Akreditasi</span>
                </button><br><br>
                @include('components.input', [
                'label' => 'Nama Makmal Akreditasi',
                'info' => 'eg: Makmal 1 ',
                'name' => 'lab',
                'id' => 'lab',
                'mode' => 'required',
                ])

                <!-- @include('components.input', [
                'label' => 'No Tel Makmal Akreditasi',
                'info' => 'eg : 013123456',
                'mode' => 'required',
                'name' => 'lab_tel',
                'id' => 'lab_tel',
                ]) -->

                <div class="form-group form-group-default required">
                    <label class="fade">
                        <span id="label_lab_tel">No Tel Makmal Akreditasi</span>
                        <i style="cursor: help; color: #48B0F7;" class="fa fa-question-circle" data-html="true" data-toggle="tooltip" title="" data-original-title="Cth : 013123456"></i>       
                    </label>
                    <input id="lab_tel" class="form-control" name="lab_tel" placeholder="" onkeypress="" required="" type="text" value="">
                    <label id="lab_telerror" class="error" style="color: red;display: none;">Sila isi nombor telefon yang sah.</label>
                </div>

                @include('components.input', [
                'label' => 'Alamat Makmal Akreditasi',
                'info' => 'Alamat Makmal Akreditasi',
                'name' => 'location',
                'id' => 'location',
                'mode' => 'required',
                'value' => '',
                ])

                <div class="form-group form-group-default required">
                    <label>
                        <span id="label_location">Skop Pengawasan</span>
                      </label>
                      <select class="form-group full-width autoscroll state" name="Pengawasan" id="Pengawasan" data-init-plugin="select2">
                        <option value="" selected="" disabled="">Pilih Skop Pengawasan</option>
                        @foreach($MasterPengawasan as $MasterPengawasans)
                        <option value="{{$MasterPengawasans->id}}">{{$MasterPengawasans->jenis_pengawasan}}</option>
                        @endforeach
                      </select>
                </div>

              <button class="btn btn-info btn-cons btn-animated from-left pull-right fa fa-check" type="button" onclick="submitForm('makmalAkreditasi')">
                  <span>Tambah</span>
              </button><br><br>
            </form>
            <table class="table table-hover table-responsive" id="tablemakmal1">
                <thead>
                <tr>
                    <th class="bold">Bil.</th>
                    <th class="bold">Kod Makmal</th>
                    <th class="bold">Nama Makmal Akreditasi</th>
                    <th class="bold">No Tel Makmal Akreditasi</th>
                    <th class="bold">Alamat Makmal Akreditasi</th>
                    <th class="bold">Skop Pengawasan</th>
                    <th class="bold">Tindakan</th>
                </tr>
                </thead>
            </table>
            </div>
            <div style="width: 100%">
                <button class="btn btn-info pull-right" style="width: 13%;margin-right: 26px;margin-bottom: 20px;margin-top: 20px;" type="button" data-dismiss="modal" onclick="selesai_btn()">
                    <span>Selesai</span>
                </button><br>
                
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">

    function checkmakmal(){
        window.open("about:blank", "hello", "width=900,height=500");
    }

    $("#modal-kuiri").modal("show");

    var table = $('#tablemakmal1');
    var settingstablemakmal = {
        "processing": true,
        "serverSide": true,
        "deferRender": true,
        "ajax": "{{ route('senaraimakmaldetail', $id) }}",
        "columns": [
            { data: 'index', defaultContent: '', orderable: false, searchable: false, render: function (data, type, row, meta) {
                return meta.row + meta.settings._iDisplayStart + 1;
            }},
            { data: "kodmakmal", name: "kodmakmal", defaultContent: "-", render: function(data, type, row){
                return $("<div/>").html(data).text();
            }},
            { data: "name", name: "name", defaultContent: "-", render: function(data, type, row){
                return $("<div/>").html(data).text();
            }},
            { data: "notel", name: "notel", defaultContent: "-", render: function(data, type, row){
                return $("<div/>").html(data).text();
            }},
            { data: "address", name: "address", defaultContent: "-" },
            { data: "pengawasan", name: "pengawasan", defaultContent: "-", render: function(data, type, row){
                return $("<div/>").html(data).text();
            }},
            { data: "action", name: "action", orderable: false, searchable: false},
        ],
        "columnDefs": [
            { className: "nowrap", "targets": [ 5 ] }
        ],
        "sDom": "B<t><'row'<p i>>",
        "buttons": [
            {
                text: '<i class="fa fa-plus m-r-5"></i> Pendaftaran Baharu EO',
                className: 'btn btn-success btn-cons',
                action: function ( e, dt, node, config ) {
                    addData();
                }
            },
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
			},
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

    table.dataTable(settingstablemakmal);

    $("#makmalAkreditasi").submit(function(e) {
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
                swal(data.title, data.message);
                $("#modal-add").modal("hide");
                table.api().ajax.reload(null, false);
            }
        });
    });

    function remove(id) {

            swal({
                title: "",
                text: "Adakah anda pasti ?",
                type: "",
                showCancelButton: true,
                confirmButtonClass: "btn-outline green-meadow",
                cancelButtonClass: "btn-danger",
                confirmButtonText: "Tidak",
                cancelButtonText: "Ya",
                closeOnConfirm: true,
                closeOnCancel: false,
            },
            function(isConfirm) {
                if (isConfirm) {
                    
                } else {
                    $.ajax({
                        url: 'pengurusan_emc/makmalAkreditasibuang/'+id,
                        method: 'delete',
                        dataType: 'json',
                        async: true,
                        contentType: false,
                        processData: false,
                        success: function(data) {
                            swal(data.title, data.message);
                            table.api().ajax.reload(null, false);
                            $('.cancel').removeClass('btn-default');
                        }
                    });
                }
            });
}


        function selesai_btn(){

        }


</script>

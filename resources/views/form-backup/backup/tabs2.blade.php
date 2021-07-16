<style>
    table {
        border-collapse: separate;

    }
    th {
        background-color: #ebe8ec;
        color: #000 !important;
        border-top: none;
        border-left: none !important;
        font-family: 'Montserrat' !important;
        font-size: 10.5px !important;
        letter-spacing: 0.06em !important;
        text-transform: uppercase !important;
        font-weight: 500 !important;
    }
    label{
        font-size:14px 
    }

    .card {
        border: none !important;
    }

</style>

<div class="tab-content">
    <input type="hidden" name="current_tab" id="current_tab" value="2">
    <div class="tab-pane active slide-right" id="tab2_view">
        <div class="m-t-20">

            <div class="card card-transparent">
                <div class="card-block">

                    <div class="alert alert-primary" style="font-size:14.5px; font-family: 'Montserrat'">
                        <label>    MAKLUMAT PELAPORAN BAHAGIAN B (EIA 2-18) BAGI BULAN JANUARI TAHUN 2020</label>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="card card-default">
                                <div class="row">
                                    <div class="col-md-6">  
                                        <div class="form-group-attached m-b-10">
                                            <div class="row">
                                                <form class="form-inline" id="form-tambahB" method="post" action="{{route('form.bSyarat')}}">
                                                    <div class="col-md-6">
                                                        <div class="form-group form-group-default">
                                                            <label>
                                                                <span><b class="text-dark">JURURUNDING LAPORAN EIA:</b></span><span style="color:red;">*</span>
                                                            </label>
                                                            <input class="form-control form-control-lg" name="jurunding_eia" type="text" placeholder="">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group form-group-default">

                                                            <label>
                                                                <span><b class="text-dark">TARIKH LAPORAN EIA DILULUSKAN</b></span> &nbsp;<i class="fa fa-calendar"></i>
                                                            </label>
                                                            <input id="" class="form-control datepicker " name="tarikh_laporan_eia" placeholder="" required="" type="" value="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">  

                                            <div class="form-group-attached m-b-10">



                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group form-group-default">
                                                            <label>
                                                                <span><b class="text-dark">JURURUNDING PENGAWASAN POST EIA:</b></span><span style="color:red;">*</span>
                                                            </label>
                                                            <input class="form-control form-control-lg" name="jurunding_pengawasan_eia" type="text" placeholder="">
                                                        </div>



                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group form-group-default">

                                                            <label>
                                                                <span><b class="text-dark">TARIKH LAPORAN EIA DILULUSKAN</b></span> &nbsp;<i class="fa fa-calendar"></i>
                                                            </label>
                                                            <input id="" class="form-control datepicker " name="tarikh_laporan_eia_diluluskan" placeholder="" required="" type="" value="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">  
                                    <div class="form-group mb-2">
                                        <label>
                                            <span><b class="text-dark">Syarat</b></span><span style="color:red;">*</span>
                                        </label>
                                    </div>
                                    <div class="form-group mx-sm-3 mb-2">
                                        <input class="form-control form-control-lg" name="syarat" type="text" placeholder="">
                                    </div>
                                    <button type="submit" class="btn btn-primary mb-2">Simpan</button>
                                </form>
                            </div>
                            <br><br>
                            <div class="col-md-12">
                                <table class="" id="table" role="grid" aria-describedby="table_info" border="1px" style="padding:0px;">
                                    <thead>
                                        <tr>
                                            <th bgcolor="#EBE8EC" class="align-top text-center" style="width:2%; vertical-align:top; color:#">NO</th>
                                            <th bgcolor="#EBE8EC" class="align-top text-center" style="width:20%; vertical-align:top; color:#">Syarat-syarat Kelulusan</th>
                                            <th bgcolor="#EBE8EC" class="align-top text-center" style="width:40%; vertical-align:top; color:#">Ulasan</th>
                                            <th bgcolor="#EBE8EC" class="align-top text-center" style="width:10%; vertical-align:top; color:#">Gambar</th>
                                            <th bgcolor="#EBE8EC" class="align-top text-center" style="width:5%; vertical-align:top; color:#">Tindakan</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                                <br>
                                <div class="alert alert-success" style="padding:10px;">
                                    <div class="form-group">
                                        <label>
                                            <u>NOTA</u><br>
                                            *ULASAN PEMAJU HENDAKLAH MERANGKUMI PERKARA-PERKARA BERIKUT:-<br>
                                            (I) RINGKASAN MENGENAI LANGKAH KAWALAN YANG DICADANGKAN DI DALAM LAPORAN EIA;<br>
                                            (II) LANGKAH KAWALAN SEBENAR YANG DIAMBIL DI PERINGKAT PELAKSANAAN PROJEK. JUSTIFIKASI KE ATAS SEBARANG PINDAAN YANG DIBUAT KEPADA CADANGAN ASAL DI DALAM LAPORAN EIA DARI SUDUT KEBERKESANAN LANGKAH KAWALAN;<br>
                                            (III) GAMBAR /BUKTI-BUKTI SOKONGAN HENDAKLAH JUGA DILAMPIRKAN; DAN<br>
                                            (IV) PERUNDING DAN PEMAJU DIMINTA MEMBUAT PERBANDINGAN KE ATAS RAMALAN IMPAK/KESAN KE ATAS ALAM SEKITAR YANG DIBUAT DI DALAM LAPORAN EIA DENGAN KESAN SEBENAR PELAKSANAAN PROJEK KE ATAS ALAM SEKITAR
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-12 p-t-20">
                                    <ul class="pager wizard no-style">
                                        <li class="submit">
                                            <button onclick="submitForm('form-add')" class="btn btn-info btn-cons from-left pull-right" id="simpan" type="button">
                                                <span>Sahkan</span>
                                            </button>
                                        </li>
                                    </ul>
                                </div>




                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>


@push('js')
<script type="text/javascript">

    $(document).ready(function(){
        $("#form-tambahB").submit(function(e) {
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
                swal(data.status);
                location.reload();
                table.api().ajax.reload(null, false);

            }
        });
     });

        var table = $('#table');

        var settings = {
            "processing": true,
            "serverSide": true,
            "deferRender": true,
            "ajax": "{{ fullUrl() }}",
            "columns": [{
                data: 'index',
                defaultContent: '',
                orderable: false,
                searchable: false,
            },
            {
                data: "syarat",
                name: "syarat",
                defaultContent: "-",
            },

            {
                data: "ulasan",
                name: "ulasan",
                defaultContent: "-",
            },
            {
                data: "gambar",
                name: "gambar",
                defaultContent: "-"
            },
            {
                data: "action",
                name: "action",
                orderable: false,
                searchable: false
            },
            ],
            "columnDefs": [{
                className: "nowrap",
                "targets": [4]
            }],
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
			},
            ],
            "destroy": true,
            "scrollCollapse": true,
            "oLanguage": {
                "sEmptyTable": "Tiada data",
                "sInfo": "Paparan dari _START_ hingga _END_ dari _TOTAL_ rekod",
                "sInfoEmpty": "Paparan 0 hingga 0 dari 0 rekod",
                "sInfoFiltered": "(Ditapis dari jumlah _MAX_ rekod)",
                "sInfoPostFix": "",
                "sInfoThousands": ",",
                "sLengthMenu": "Papar _MENU_ rekod",
                "sLoadingRecords": "Diproses...",
                "sProcessing": "Sedang diproses...",
                "sSearch": "Carian:",
                "sZeroRecords": "Tiada padanan rekod yang dijumpai.",
                "oPaginate": {
                    "sFirst": "Pertama",
                    "sPrevious": "Sebelum",
                    "sNext": "Seterusnya",
                    "sLast": "Akhir"
                },
                "oAria": {
                    "sSortAscending": ": diaktifkan kepada susunan lajur menaik",
                    "sSortDescending": ": diaktifkan kepada susunan lajur menurun"
                }
            },
            "iDisplayLength": 10
        };
        console.log(settings);
        table.dataTable(settings);
    });
</script>
@endpush





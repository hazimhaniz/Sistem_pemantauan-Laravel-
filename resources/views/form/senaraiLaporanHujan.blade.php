<br>
<div class="col-md-12">
    <div class="card card-transparent">
        <table class="table" id="table-hujan" role="grid" aria-describedby="table_info" border="1px" style="padding:0px; width:100%">
            <thead>
                <tr>
                    <th bgcolor="#" class="align-top text-center" style="vertical-align:top; color:#">
                        Bil
                    </th>
                    <th bgcolor="#" class="align-top text-center" style="vertical-align:top; color:#">
                      Tarikh Laporan Hujan
                  </th>
                  <th bgcolor="#" class="align-top text-center" style="vertical-align:top; color:#">
                    Masa Hujan
                </th>
                <th bgcolor="#" class="align-top text-center" style="vertical-align:top; color:#">
                 Tindakan
             </th>                
         </tr>
     </thead>
 </table>
</div>
</div>

<script type="text/javascript">

    function viewHujan(id) {
      $('#viewHujan').modal('show');
  }


</script>


<script type="text/javascript">
 $(document).ready(function() { 
  var table = $('#table-hujan');
  var settings = {
    "processing": true,
    "serverSide": true,
    "deferRender": true,
    "searchable": false,
    "ajax": "{{ route('projek.senaraiHujan',['id' => $laporan_hujan->projek_id, 'year' => $year, 'month' => $month]) }}",
    "columns": [{
        data: 'index',
        defaultContent: '',
        orderable: false,
        searchable: false,
        render: function(data, type, row, meta) {
            return meta.row + meta.settings._iDisplayStart + 1;
        }
    },
    {
        data: "tarikh_pemeriksaan",
        name: "tarikh_pemeriksaan",
        defaultContent: "-",
        "searchable": false,
        render: function(data, type, row) {
            return $("<div/>").html(data).text();
        }
    },
    {
        data: "masa",
        name: "masa",
        defaultContent: "-",
        "searchable": false,
        render: function(data, type, row) {
            return $("<div/>").html(data).text();
        }
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

table.dataTable(settings);

});

</script>





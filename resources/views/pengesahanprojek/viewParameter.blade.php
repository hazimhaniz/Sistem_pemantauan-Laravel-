@extends('layouts.modal')

<div class="modal fade" id="modal-edit" tabindex="-1" role="dialog" aria-labelledby="addModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-xs" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalTitle">Maklumat <span class="bold">Parameter</span></h5>
                <small class="text-muted">Standard merujuk kepada National Quality Standards</small>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
          
            <div class="modal-body m-t-20 table-responsive">            

               <table class="table  table-bordered" id="tableParameterSungai">
                <thead>
                    <tr>
                        <th>Parameter</th>
                        <th>Standard</th>
                        <th>Baseline</th>
                        <!-- <th>Tindakan</th> -->
                    </tr>
                </thead>
               </table>
            </div>
            <div class="modal-footer">
              
            </div>
        
        </div>
    </div>
</div>

<script type="text/javascript">
$("#modal-edit").modal("show");
$('.modal form').trigger("reset");
$(".modal form").validate();

var tableParameterSungai = $('#tableParameterSungai');

var settingParameterSungai = {
    "processing": true,
    "serverSide": true,
    "deferRender": true,
    "ajax": "{{ route('getParameter', $stesen_id) }}",
    "columns": [
        { data: "parameter", name: "parameter", defaultContent: "-", render: function(data, type, row){
                return $("<div/>").html(data).text();
            }},
        { data: "standard", name: "standard", defaultContent: "-", render: function(data, type, row){
            return $("<div/>").html(data).text();
        }},
        { data: "baseline", name: "baseline", defaultContent: "-", render: function(data, type, row){
            return $("<div/>").html(data).text();
        }},
        // { data: "action", name: "action", orderable: false, searchable: false},
    ],
    "columnDefs": [
        { className: "nowrap", "targets": [ 2 ] }
    ],
    "sDom": "B<t><'row'<p i>>",
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

tableParameterSungai.dataTable(settingParameterSungai);



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
                    url: 'buangParameter/'+id,
                    method: 'delete',
                    dataType: 'json',
                    async: true,
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        swal(data.title, data.message);
                        tableParameterSungai.api().ajax.reload(null, false);
                        $('.cancel').removeClass('btn-default');
                    }
                });
            }
        });
}




$('body').on('change','select[name="parameter"]',function(){
  
    var parameter= $(this).val();
    
    $.ajax({
        url: '{{ route('standardlisted') }}', 
        method: 'POST',
        data: {parameter_id:parameter},
        success: function(data) {
            data2 = '<option disabled hidden selected> Sila Pilih </option>';
            data.masterstandard.forEach(function(item){
                    dropdown = '<option value="'+item.id+'">'+item.class+'</option>';
                    data2 = data2 + dropdown;
                    
            });
            $('#standard').empty().append(data2);
        }
    });
});


</script>
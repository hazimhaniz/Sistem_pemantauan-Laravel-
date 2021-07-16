@extends('layouts.modal')



<div class="modal fade" id="modal-edit" tabindex="-1" role="dialog" aria-labelledby="addModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-xs" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalTitle">Maklumat <span class="bold">Parameter</span></h5>
				<small class="text-muted">{{$masterpengawasan->standard_dirujuk}}</small>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
            </div>
            <form id='form-parameter-edit' role="form" method="post" action="{{ route('projek.updateparametersg') }}">
            <div class="modal-body m-t-20">
            	<input type="hidden" name="stesen_id" value="{{$stesen_id}}">
                <div class="form-group form-group-default form-group-default-custom form-group-default-select2">
                    <label>Class <span style="color:red;">*</span>
                    </label>
                    <select id="standard" name="standard" data-placeholder="bulan" class="full-width autoscroll" data-init-plugin="select2" required>
                        <option disabled hidden selected> Sila Pilih </option>
                        @foreach($masterstandard as $masterstandards)
                        <option value="{{$masterstandards->id}}">{{$masterstandards->class}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group form-group-default form-group-default-custom form-group-default-select2">
                    <label>Parameter <span style="color:red;">*</span>
                    </label>
                    <select id="parameter" name="parameter" data-placeholder="bulan" class="full-width autoscroll" data-init-plugin="select2" required>
                        <option disabled hidden selected> Sila Pilih </option>
                        @if($masterpengawasan->id==6)
                            @foreach($masterparameter as $valueparameter)
                            <option value="{{$valueparameter->id}}" >{{$valueparameter->jenis_parameter}} | Purata Masa :  {{$valueparameter->schedule}}</option>
                            @endforeach
                        @else
                            @foreach($masterparameter as $valueparameter)
                            <option value="{{$valueparameter->id}}" >{{$valueparameter->jenis_parameter}}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
                <!-- <div class="form-group form-group-default form-group-default-custom form-group-default-select2">
                    <label>Standard <span style="color:red;">*</span>
                    </label>
                    <select id="standard" name="standard" data-placeholder="" class="full-width autoscroll" data-init-plugin="select2" required>

                    </select>
                </div> -->

                <div class="form-group form-group-default input-group">
                    <div class="form-input-group">
                        <label>Baseline <span style="color:red;">*</span>
                        </label>
                        <input type="text" id="baseline" name="baseline" class="form-control" required>
                    </div>
                </div>
                <!-- @include('components.input', [
                'label' => 'Parameter',
                'info' => 'Parameter',
                'name' => 'parameter',
                'id' => 'parameter',
                'mode' => 'required',
                'value' => '',
                ])

                @include('components.input', [
                'label' => 'Standard',
                'info' => 'Standard',
                'name' => 'standard',
                'mode' => 'required',
                'id' => 'standard',
                'value' => '',
                ]) -->

                <!-- @include('components.input', [
                'label' => 'Baseline',
                'info' => 'Baseline',
                'name' => 'baseline',
                'mode' => 'required',
                'id' => 'baseline',
                'value' => '',
                ]) -->
               <button type="button" class="btn btn-info" onclick="submitForm('form-parameter-edit')"><i class="fa fa-check m-r-5"></i> Simpan</button>

               <table class="table table-responsive table-bordered" id="tableParameterSungai">
               	<thead>
               		<tr>
               			<th>Parameter</th>
               			<th>Standard</th>
               			<th>Baseline</th>
               			<th>Tindakan</th>
               		</tr>
               	</thead>
               </table>
            </div>
            <div class="modal-footer">

            </div>
        </form>
        </div>
    </div>
</div>

<script type="text/javascript">
// $("#modal-edit").modal("show");
$('#modal-edit').modal({
    backdrop: 'static',
    keyboard: false
});
$('.modal form').trigger("reset");
$(".modal form").validate();


$("#form-parameter-edit").submit(function(e) {
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
            $('#form-parameter-edit')[0].reset();
            $("select.select2").select2('data', {}); // clear out values selected
            $("select.select2").select2({ allowClear: true }); // re-init to show default status
            //document.getElementById("select2-standard-container").value= " Sila Pilih ";
            //var dropDown2 = document.getElementById("standard");
            //console.log(dropDown);
            //console.log(dropDown2);

            tableParameterSungai.api().ajax.reload(null, false);
        }
    });
});

var tableParameterSungai = $('#tableParameterSungai');

var settingParameterSungai = {
    "processing": true,
    "serverSide": true,
    "deferRender": true,
    "ajax": "{{ route('getParameterSungai', $stesen_id) }}",
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
        { data: "action", name: "action", orderable: false, searchable: false},
    ],
    "columnDefs": [
        { className: "nowrap", "targets": [ 3 ] }
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
    var standard= $('#standard').val();
    console.log(standard);

    $.ajax({
        url: '{{ route('standardlisted') }}',
        method: 'POST',
        data: {parameter_id:parameter,standard:standard},
        success: function(data) {

            document.getElementById("baseline").value = data.masterstandard.parameter;


        }
    });
});


</script>

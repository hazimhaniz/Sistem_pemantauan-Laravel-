@extends('layouts.modal')



<div class="modal fade" id="modal-edit" tabindex="-1" role="dialog" aria-labelledby="addModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-xs" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalTitle">Maklumat <span class="bold">Parameter</span></h5>
				<small class="text-muted">{{$stesen->namaProgram->standard_dirujuk}}</small>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
            </div>
            <form id='form-parameter-edit' role="form" method="post" action="{{ route('projek.updateparametersg1') }}">
            <div class="modal-body m-t-20">
                <div class="card card-default m-b-20">
                    <div class="card-body">
                        <input type="hidden" name="id" value="{{$stesen->id}}">
                        <input type="hidden" name="jenis_pengawasan_id" value="{{$stesen->jenis_pengawasan_id}}">
                        @if($stesen->class)
                        @include('components.input', [
                        'label' => 'Kelas',
                        'info' => 'Kelas',
                        'name' => 'class',
                        'id' => 'class',
                        'mode' => 'readonly',
                        'value' => $stesen->class,
                        ])
                        @endif

                        @if(in_array($stesen->versi,[2]))
                            @if($stesen->is_prima==1)
                                @include('components.input', [
                                'label' => 'Standard R',
                                'info' => 'Standard R',
                                'name' => 'is_prima',
                                'id' => 'is_prima',
                                'mode' => 'readonly',
                                'value' => 'Sentuhan Prima',
                                ])
                            @endif

                            @if($stesen->is_sekunder==1)
                                @include('components.input', [
                                'label' => 'Standard R',
                                'info' => 'Kelas',
                                'name' => 'is_sekunder',
                                'id' => 'is_sekunder',
                                'mode' => 'readonly',
                                'value' => 'Sentuhan Sekunder',
                                ])
                            @endif
                        @endif
                        <!-- untuk AIR TANAH -->
                        @if(in_array($stesen->jenis_pengawasan_id,[4]))
                        <?php 
                            if($stesen->kategori_tanah==1){
                                $name = 'Industri';
                            }
                            if($stesen->kategori_tanah==2){
                                $name = 'Pertanian';
                            }
                            if($stesen->kategori_tanah==3){
                                $name = 'Tapak Pelupusan Sisa Pepejal';
                            }
                            if($stesen->kategori_tanah==4){
                                $name = 'Kawasan Bandar/ Pinggir Bandar';
                            }
                            if($stesen->kategori_tanah==5){
                                $name = 'Kawasan Lombong';
                            }
                            if($stesen->kategori_tanah==6){
                                $name = 'Padang Golf';
                            }
                            if($stesen->kategori_tanah==7){
                                $name = 'Kawasan Peranginan(resort)';
                            }
                            if($stesen->kategori_tanah==8){
                                $name = 'Akuakultur';
                            }
                            if($stesen->kategori_tanah==9){
                                $name = '>Bekalan Air Tempatan';
                            }
                            if($stesen->kategori_tanah==10){
                                $name = 'Kawasan Luar Bandar';
                            }

                         ?>
                         <div class="form-group form-group-default input-group">
                            <div class="form-input-group">
                                <label>Kategori Jenis Guna Tanah<span style="color:red;">*</span> </label>
                                <input class="form-control" name="kategori_tanah" aria-required="true" type="text" value="{{$name}}" required placeholder="kategori guna tanah" readonly>
                            </div>
                        </div>
                        @endif


                        @if($stesen->date_eia)
                        <div class="form-group form-group-default input-group">
                            <div class="form-input-group">
                                <label>Tarikh Pengawasan (EIA)</label>
                                <input class="form-control"  name="date_eia" type="date" value="{{ $stesen->date_eia}}" readonly>
                            </div>
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                        </div>
                        @endif
                        @if($stesen->is_emp==1)
                        @if($stesen->date_emp)
                        <div class="form-group form-group-default input-group">
                            <div class="form-input-group">
                                <label>Tarikh Pengawasan (EMP)</label>
                                <input class="form-control"  name="date_emp" type="date" value="{{$stesen->date_emp}}" readonly>
                            </div>
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                        </div>
                         @endif
                        @endif
                        @if($parameters->count() < 1)
                        <div class="alert alert-warning">
                            Sila <strong>Kemaskini Stesen</strong> Terlebih Dahulu.
                        </div>
                        @endif
                        <div style="overflow-y: auto !important;max-height: 700px !important">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="fit">Bil</th>
                                    <th>Parameter</th>
                                    @if(!in_array($stesen->jenis_pengawasan_id,[4]))
                                        <th>Unit</th>
                                    @endif
                                    @if(in_array($stesen->jenis_pengawasan_id,[2]))
                                        <th>Kelas</th>
                                    @endif
                                    @if(!in_array($stesen->jenis_pengawasan_id,[4]))
                                        <th width="20%">Standard/Kelas <span class="text-bold"><b>@if($stesen->class)[{{$stesen->class}}]@endif</b></span></th>
                                    @endif
                                    <th>Data Baseline (EIA)</th>
                                    @if($stesen->is_emp==1)
                                    <th>Data Baseline (EMP)</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1 ?>
                                @if($parameters)
                                    @foreach($parameters as $parameter)
                                    <tr>
                                        <td>
                                            {{$no++}}
                                        </td>
                                        <td>
                                           {{optional($parameter->jenisparameter)->jenis_parameter}}
                                           @if($parameter->mode=='mandatory')<span style="color:red;">*</span>@endif
                                        </td>
                                        @if(!in_array($stesen->jenis_pengawasan_id,[4]))
                                            <td>
                                                @if(in_array(optional($parameter->jenisparameter)->unit,['','-']))
                                                    
                                                @else
                                                    <span style="text-transform:none !important">{{optional($parameter->jenisparameter)->unit}}</span>
                                                @endif
                                            </td>
                                        @endif
                                        @if(in_array($stesen->jenis_pengawasan_id,[2]))
                                            <td>
                                                
                                                @if(optional($parameter->jenisstandard)->class=="")
                                                    <strong>Racun Perosak</strong>
                                                @else
                                                    <strong>{{optional($parameter->jenisstandard)->class}}</strong>
                                                @endif
                                            </td>
                                        @endif
                                        @if(!in_array($stesen->jenis_pengawasan_id,[4]))
                                            <td>
                                                {{optional($parameter->jenisstandard)->parameter}}
                                            </td>
                                        @endif
                                        <td>
                                            <input type="hidden" name="parameter_id{{$parameter->parameter}}" id="parameter_id{{$parameter->parameter}}" value="{{$parameter->parameter}}">
                                            <input type="hidden" name="standard_id{{$parameter->standard}}" id="standard_id{{$parameter->standard}}" value="{{$parameter->standard}}">
                                            <input class="form-control" type="text" id="baselineeia{{$parameter->parameter}}" name="baselineeia{{$parameter->parameter}}" value="{{$parameter->baselineeia}}" @if($parameter->mode=='mandatory') required @endif readonly>
                                        </td>
                                        @if($stesen->is_emp==1)
                                        <td>
                                            <input class="form-control" type="text" id="baselineemp{{$parameter->parameter}}" name="baselineemp{{$parameter->parameter}}" value="{{$parameter->baselineemp}}" @if($parameter->mode=='mandatory') required @endif readonly>
                                        </td>
                                        @endif
                                    </tr>
                                    @endforeach
                                @else
                                    @empty(!$parameters)
                                    <tr>
                                   <td valign="top" colspan="4" class="dataTables_empty"> <div class="alert alert-warning">
                                <strong>Sorry!</strong> No Product Found.
                            </div></td>
                                </tr>
                            
                            @endempty
                                <tr>
                                   <td valign="top" colspan="4" class="dataTables_empty"> <span class="text-danger">Sila Pilih Kelas Pada Kemaskini Stesen</span></td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                        </div>
                    </div>
                </div>
                <!-- </div> -->
                
               <!-- <button type="button" class="btn btn-info pull-right" onclick="submitForm('form-parameter-edit')"><i class="fa fa-check m-r-5"></i> Simpan</button> -->

               <!-- <div class="table-responsive">
               <table class="table table-bordered" id="tableParameterSungai">
               	<thead>
               		<tr>
               			<th>Parameter</th>
               			<th>Standard</th>
               			<th>Baseline</th>
               			<th>Tindakan</th>
               		</tr>
               	</thead>
               </table>
               </div> -->
            </div>
            <div class="modal-footer">
              
            </div>
        </form>
        </div>
    </div>
</div>

<script type="text/javascript">
$("#modal-edit").modal("show");
$('.modal form').trigger("reset");
$(".modal form").validate();

$('body').on('change','input:checkbox[name="jenis_pengawasan_id1[]"]',function () {
    if ($('input[name=\'jenis_pengawasan_id1[]\'][value=1]').prop('checked')==true) {
        document.getElementById('1').style.display = 'block';
    }else{
        document.getElementById('1').style.display = 'none';
    }

    if ($('input[name=\'jenis_pengawasan_id1[]\'][value=2]').prop('checked')==true) {
        document.getElementById('2').style.display = 'block';
    }else{
        document.getElementById('2').style.display = 'none';
    }
})

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
            $("#modal-edit").modal("hide");
            $('#form-parameter-edit')[0].reset();
            $("select.select2").select2('data', {}); // clear out values selected
            $("select.select2").select2({ allowClear: true }); // re-init to show default status
            //document.getElementById("select2-standard-container").value= " Sila Pilih ";
            //var dropDown2 = document.getElementById("standard");
            //console.log(dropDown);
            //console.log(dropDown2);
            
            // tableParameterSungai.api().ajax.reload(null, false);
        }
    });
});




</script>
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
                            <input type="hidden" name="type" value="{{$type}}">
                            <input type="hidden" name="jenis_pengawasan_id" value="{{$stesen->jenis_pengawasan_id}}">
                            @if($stesen->class)
                            @include('components.input', [
                            'label' => 'Kategori',
                            'info' => 'Kategori',
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
                            if ($stesen->kategori_tanah == 1) {
                                $name = 'Industri';
                            }
                            if ($stesen->kategori_tanah == 2) {
                                $name = 'Pertanian';
                            }
                            if ($stesen->kategori_tanah == 3) {
                                $name = 'Tapak Pelupusan Sisa Pepejal';
                            }
                            if ($stesen->kategori_tanah == 4) {
                                $name = 'Kawasan Bandar/ Pinggir Bandar';
                            }
                            if ($stesen->kategori_tanah == 5) {
                                $name = 'Kawasan Lombong';
                            }
                            if ($stesen->kategori_tanah == 6) {
                                $name = 'Padang Golf';
                            }
                            if ($stesen->kategori_tanah == 7) {
                                $name = 'Kawasan Peranginan(resort)';
                            }
                            if ($stesen->kategori_tanah == 8) {
                                $name = 'Akuakultur';
                            }
                            if ($stesen->kategori_tanah == 9) {
                                $name = '>Bekalan Air Tempatan';
                            }
                            if ($stesen->kategori_tanah == 10) {
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
                                    <input class="form-control" name="date_eia" type="date" value="{{ $stesen->date_eia}}" readonly>
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
                                    <input class="form-control" name="date_emp" type="date" value="{{$stesen->date_emp}}" readonly>
                                </div>
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                            </div>
                            @endif
                            @endif
                            @if($parameters->count() < 1) <div class="alert alert-warning">
                                Sila <strong>Kemaskini Stesen</strong> Terlebih Dahulu.
                        </div>
                        @endif
                        <div style="overflow-y: auto !important;max-height: 700px !important">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th class="fit">Bil</th>
                                        <th>Parameter</th>
                                        <th>Unit</th>
                                        @if(in_array($stesen->jenis_pengawasan_id,[2]))
                                        <th>Kelas</th>
                                        @endif
                                        <th width="20%">
                                            {{ (!in_array($stesen->jenis_pengawasan_id,[5]))?'Standard':'Had Maximum' }}
                                            <span class="text-bold">
                                                <b>@if($stesen->class)[{{$stesen->class}}]@endif</b>
                                            </span>
                                        </th>
                                        @if(!in_array($stesen->jenis_pengawasan_id,[5]))
                                        <th>Data Baseline (EIA)</th>
                                        @if($stesen->is_emp==1)
                                        <th>Data Baseline (EMP)</th>
                                        @endif
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php $no = 1 ?>
                                    @if($parameters)
                                    <?php //dd($parameters->toArray()); 
                                    ?>
                                    @foreach($parameters as $parameter)
                                    <tr>
                                        <td>
                                            {{$no++}}
                                        </td>
                                        <td>
                                            @if(in_array($stesen->jenis_pengawasan_id,[8]))
                                            <span style="text-transform:none !important">{{optional($parameter->jenisparameter)->jenis_parameter}}</span>
                                            @if($parameter->mode=='mandatory')<span style="color:red;">*</span>@endif

                                            @else
                                            @if(optional($parameter->jenisparameter)->id==500)
                                            {{optional($parameter->jenisparameter)->jenis_parameter}}
                                            @elseif(in_array($stesen->jenis_pengawasan_id,[2]))
                                            <span style="text-transform:none !important">
                                                {{optional($parameter->jenisparameter)->jenis_parameter}}
                                                @if(optional($parameter->jenisstandard)->class == 'Sentuhan Prima' || optional($parameter->jenisstandard)->class == 'Sentuhan Sekunder')
                                                - {{optional($parameter->jenisstandard)->class}}
                                                @endif
                                                @if($parameter->mode=='mandatory')<span style="color:red;">*</span>@endif</span>
                                            @else
                                            <span style="text-transform:none !important">
                                                {{optional($parameter->jenisparameter)->jenis_parameter}}
                                                @if($parameter->mode=='mandatory')<span style="color:red;">*</span>@endif</span>
                                            @endif
                                            <!-- {{optional($parameter->jenisparameter)->jenis_parameter}} -->
                                            <!-- @if($parameter->mode=='mandatory')<span style="color:red;">*</span>@endif -->
                                            @endif
                                        </td>
                                        <td>@if(in_array(optional($parameter->jenisparameter)->unit,['','-']))

                                            @else
                                            <span style="text-transform:none !important">{{optional($parameter->jenisparameter)->unit}}</span>
                                            @endif
                                        </td>
                                        @if(in_array($stesen->jenis_pengawasan_id,[2]))
                                        <td>

                                            @if(optional($parameter->jenisstandard)->class=="")
                                            <strong>Racun Perosak</strong>
                                            @else
                                            @if($stesen->class == optional($parameter->jenisstandard)->class)
                                            <strong>{{optional($parameter->jenisstandard)->class}}</strong>
                                            @endif
                                            @endif
                                        </td>
                                        @endif
                                        @if(!in_array($stesen->jenis_pengawasan_id,[5]))
                                        <td>
                                            @if($pengawasan_id == 8)
                                            <b>10-100</b>
                                            <!-- <input class="form-control" id="standard{{$parameter->parameter}}" name="standard{{$parameter->parameter}}" value="10-100" onkeypress="return onlyNumberKey(event);" @if($parameter->mode=='mandatory') title="Masukkan nombor sahaja" type="text" required @else type="text" @endif @if($stesen_status <= 2 && auth()->user()->hasRole('emc')) @else readonly @endif> -->
                                            <!-- <input class="form-control" id="standard{{$parameter->parameter}}" name="standard{{$parameter->parameter}}" value="{{$parameter->standard}}" onkeypress="return onlyNumberKey(event);" @if($parameter->mode=='mandatory') title="Masukkan nombor sahaja" type="text" required @else type="text" @endif @if($stesen_status <= 2 && auth()->user()->hasRole('emc')) @else readonly @endif> -->
                                            @else
                                            @if(in_array($stesen->jenis_pengawasan_id,[4]))
                                            <?php  //dd(optional($parameter->jenisparameter)->getstandard->parameter);
                                            ?>
                                            @if(isset(optional($parameter->jenisparameter)->getstandard->parameter))
                                            {{optional($parameter->jenisparameter)->getstandard->parameter}}
                                            @else
                                            -
                                            @endif
                                            @else
                                            {{optional($parameter->jenisstandard)->parameter}}
                                            @endif
                                            @endif
                                        </td>
                                        @endif

                                        <td>
                                            <!-- <input class="form-control" id="standard{{$parameter->parameter}}" name="standard{{$parameter->parameter}}" value="10-100" onkeypress="return onlyNumberKey(event);" @if($parameter->mode=='mandatory') title="Masukkan nombor sahaja" type="text" required @else type="text" @endif @if($stesen_status <= 2 && auth()->user()->hasRole('emc')) @else readonly @endif> -->
                                            <!-- <input type="hidden" name="parameter_id{{$parameter->parameter}}" id="parameter_id{{$parameter->parameter}}" value="{{$parameter->parameter}}"> -->
                                            <!-- <input class="form-control" name="parameter_id{{$parameter->parameter}}" id="parameter_id{{$parameter->parameter}}" value="{{$parameter->baselineeia}}"> -->
                                            @if($pengawasan_id != 8)
                                            <input type="hidden" name="standard_id{{$parameter->standard}}" id="standard_id{{$parameter->standard}}" value="{{$parameter->standard}}">
                                            @endif
                                            @if($parameter->parameter==500)
                                            <input class="form-control" type="text" id="baselineeia{{$parameter->parameter}}" name="baselineeia{{$parameter->parameter}}" value="{{$parameter->baselineeia}}" @if($stesen_status <=2 && auth()->user()->hasRole('emc')) @else readonly @endif>
                                            @elseif($parameter->parameter==232)
                                            <input class="form-control" id="baselineeia{{$parameter->parameter}}" name="baselineeia{{$parameter->parameter}}" onkeypress="return onlyNumberKey(event);" value="50" @if($parameter->mode=='mandatory') title="Masukkan nombor sahaja" type="text" required @else type="text" @endif readonly >
                                            @elseif($parameter->parameter==233)
                                            <input class="form-control" id="baselineeia{{$parameter->parameter}}" name="baselineeia{{$parameter->parameter}}" onkeypress="return onlyNumberKey(event);" value="250" @if($parameter->mode=='mandatory') title="Masukkan nombor sahaja" type="text" required @else type="text" @endif readonly >
                                            @else
                                            <!-- <input class="form-control" id="baselineeia{{$parameter->parameter}}" name="baselineeia{{$parameter->parameter}}" onkeypress="return onlyNumberKey(event);" value="{{$parameter->baselineeia}}" @if($parameter->mode=='mandatory') title="Masukkan nombor sahaja" type="text" required @else type="text" @endif @if($stesen_status <= 2 && auth()->user()->hasRole('emc')) @else readonly @endif> -->
                                            <input class="form-control" name="baselineeia{{$parameter->parameter}}" id="baselineeia{{$parameter->parameter}}" value="{{$parameter->baselineeia}}">
                                            @endif

                                        </td>
                                        @if($stesen->is_emp==1)
                                        @if(!in_array($stesen->jenis_pengawasan_id,[5]))
                                        <td>
                                            <input class="form-control" type="text" id="baselineemp{{$parameter->parameter}}" name="baselineemp{{$parameter->parameter}}" value="{{$parameter->baselineemp}}">
                                            <!-- <input class="form-control" type="text" id="baselineemp{{$parameter->parameter}}" name="baselineemp{{$parameter->parameter}}" value="{{$parameter->baselineemp}}" @if($parameter->mode=='mandatory') required @endif @if($stesen_status <= 2 && auth()->user()->hasRole('emc')) @else readonly @endif> -->
                                        </td>
                                        @endif
                                        @endif
                                    </tr>
                                    @endforeach
                                    @else
                                    @empty(!$parameters)
                                    <tr>
                                        <td valign="top" colspan="4" class="dataTables_empty">
                                            <div class="alert alert-warning">
                                                <strong>Sorry!</strong> No Product Found.
                                            </div>
                                        </td>
                                    </tr>

                                    @endempty
                                    <tr>
                                        <td valign="top" colspan="4" class="dataTables_empty"> <span class="text-danger">Sila Pilih Kelas Pada Kemaskini Stesen</span></td>
                                    </tr>
                                    @endif
                                </tbody>
                            </table>

                            @if($pengawasan_id == 8)
                            <br>
                            <br>
                            <label><strong> Garis Panduan : </strong></label>
                            <table class="table table-bordered" style="width: 56% !important;">
                                <tr>
                                    <th style="width: 44% !important;">Keterangan Kerosakan</th>
                                    <th>
                                        Vertical Vibration Peak Velocity νmax ,
                                        [mm/s] (0 to Peak)
                                        (10 - 100 Hz)
                                    </th>
                                </tr>
                                <tr>
                                    <td style="text-align: center !important;">Selamat</td>
                                    <td style="text-align: center !important;">
                                        < 3</td> </tr> <tr>
                                    <td style="text-align: center !important;">
                                        Tahap Perhatian
                                    </td>
                                    <td style="text-align: center !important;">3 - 5</td>
                                </tr>
                                <tr>
                                    <td style="text-align: center !important;">Kerosakan Kecil</td>
                                    <td style="text-align: center !important;">5 - 30</td>
                                </tr>
                                <tr>
                                    <td style="text-align: center !important;">Kerosakan Besar</td>
                                    <td style="text-align: center !important;"> > 30</td>
                                </tr>
                            </table>
                            @endif
                        </div>
                    </div>
                </div>
                <!-- </div> -->
                @if($stesen_status <= 2 && auth()->user()->hasRole('emc'))
                    <button type="button" class="btn btn-danger pull-right" data-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-info pull-right" onclick="submitForm('form-parameter-edit')" style="margin-right: 10px;">Simpan</button>

                    @else
                    <button type="button" class="btn btn-info pull-right" onclick="submitForm('form-parameter-edit')" style="margin-right: 10px;">Simpan</button>
                    <!-- <button type="button" class="btn btn-info pull-right" data-dismiss="modal">Selesai</button> -->
                    @endif
                    <div style="width: 100%">
                        <!-- <button type="button" class="btn btn-info" data-dismiss="modal" style="float: right;"><i class="fa fa-check m-r-5"></i> Selesai</button> -->
                    </div>

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
    function onlyNumberKey(evt) {

        // Only ASCII charactar in that range allowed 
        var ASCIICode = (evt.which) ? evt.which : evt.keyCode
        if (ASCIICode != 46 && ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
            return false;
        return true;
    }

    $('input').bind('paste', function(event) {
        // var regex = /^[a-zA-Z1-100%()#@_& -]+$/;
        // var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
        // if (!regex.test(key)) {
        //     event.preventDefault();
        //     return false;
        // }
        if (event.originalEvent.clipboardData.getData('Text').match(/[^\d]/)) {
            event.preventDefault();
        }

    });
    // $("#modal-edit").modal("show");
    $('#modal-edit').modal({
        backdrop: 'static',
        keyboard: false
    });
    $('.modal form').trigger("reset");
    $(".modal form").validate();

    $('body').on('change', 'input:checkbox[name="jenis_pengawasan_id1[]"]', function() {
        if ($('input[name=\'jenis_pengawasan_id1[]\'][value=1]').prop('checked') == true) {
            document.getElementById('1').style.display = 'block';
        } else {
            document.getElementById('1').style.display = 'none';
        }

        if ($('input[name=\'jenis_pengawasan_id1[]\'][value=2]').prop('checked') == true) {
            document.getElementById('2').style.display = 'block';
        } else {
            document.getElementById('2').style.display = 'none';
        }
    })

    $("#form-parameter-edit").submit(function(e) {
        e.preventDefault();
        var form = $(this);

        if (!form.valid()) {
            swal('Perhatian', 'Maklumat tidak lengkap. Sila rujuk pada mesej ralat pada ruangan maklumat.');
            return;
        }

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
                $("select.select2").select2({
                    allowClear: true
                }); // re-init to show default status
                //document.getElementById("select2-standard-container").value= " Sila Pilih ";
                //var dropDown2 = document.getElementById("standard");
                //console.log(dropDown);
                //console.log(dropDown2);

                // tableParameterSungai.api().ajax.reload(null, false);
            }
        });
    });
</script>
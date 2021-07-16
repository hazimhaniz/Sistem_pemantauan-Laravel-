@extends('layouts.modal')
@include('plugins.dropify')

<div class="modal fade" id="modal-edit" tabindex="-1" role="dialog" aria-labelledby="addModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-xs" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalTitle">Maklumat <span class="bold">Stesen</span></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id='form-stesen-edit' role="form" method="post" action="{{ route('projek.updatestesen1') }}">

            <input type="hidden" name="id" value="{{$stesen->id}}">
            <input type="hidden" name="jenis_pengawasan_id" value="{{$stesen->jenis_pengawasan_id}}">
            <div class="modal-body m-t-20">

                @include('components.input', [
                'label' => 'Nama Stesen',
                'info' => 'Nama Stesen',
                'name' => 'stesen',
                'id' => 'stesen',
                'mode' => 'readonly',
                'value' => $stesen->stesen,
                ])

                @include('components.input', [
                'label' => 'Latitud',
                'info' => 'Latitud',
                'name' => 'latitud',
                'id' => 'latitud',
                'mode' => 'readonly',
                'value' => $stesen->latitud,
                ])

                @include('components.input', [
                'label' => 'Longitud',
                'info' => 'Longitud',
                'name' => 'longitud',
                'id' => 'longitud',
                'mode' => 'readonly',
                'value' => $stesen->longitud,
                ])

            @if($stesen->jenis_pengawasan_id==1)
                 @include('components.input', [
                'label' => 'Nama Sungai',
                'info' => 'Nama Sungai',
                'name' => 'nama',
                'id' => 'nama',
                'mode' => 'readonly',
                'value' => $stesen->nama,
                ])
            @endif

            @if($stesen->jenis_pengawasan_id==3)
                 @include('components.input', [
                'label' => 'Nama Tasik',
                'info' => 'Nama Tasik',
                'name' => 'nama',
                'id' => 'nama',
                'mode' => 'readonly',
                'value' => $stesen->nama,
                ])
            @endif

                @if(!in_array($stesen->jenis_pengawasan_id,[4,5,8,7,9]))
                @include('components.input', [
                'label' => 'Kelas',
                'info' => 'Kelas',
                'name' => 'class',
                'id' => 'class',
                'mode' => 'readonly',
                'value' => $stesen->class,
                ])
                <!-- <div class="form-group form-group-default form-group-default-custom form-group-default-select2">
                    <label>Kelas <span style="color:red;">*</span>
                    </label>
                    <select id="class" name="class" data-placeholder="bulan" class="full-width autoscroll" data-init-plugin="select2" readonly>
                        <option disabled hidden selected> Sila Pilih </option>
                        @foreach($masterstandard as $masterstandards)
                        <option value="{{$masterstandards->class}}" {{ $stesen->class==$masterstandards->class ? 'selected' : ''}}>{{$stesen->class}}</option>
                        @endforeach
                    </select>
                </div> -->
                @endif

                @if(in_array($stesen->jenis_pengawasan_id,[7]))
                    @include('components.input', [
                    'label' => 'Kelas',
                    'info' => 'Kelas',
                    'name' => 'class',
                    'id' => 'class',
                    'mode' => 'readonly',
                    'value' => $stesen->class,
                    ])
                <!-- <div class="form-group form-group-default form-group-default-custom form-group-default-select2">
                    <label>Jadual <span style="color:red;">*</span>
                    </label>
                    <select id="class" name="class" class="full-width autoscroll" data-init-plugin="select2" required>
                        <option disabled hidden selected> Sila Pilih </option>
                        @foreach($masterparameter as $masterparameters)
                        <option value="{{$masterparameters->schedule}}" {{ $stesen->class==$masterparameters->schedule ? 'selected' : ''}} disabled>{{$masterparameters->schedule}}</option>
                        @endforeach
                    </select>
                </div> -->
                @endif

                <!-- untuk sungai sahaja -->
                @if(in_array($stesen->jenis_pengawasan_id,[1]))
               <!--  <label class="col-md-3 m-t-15 control-label"><strong>*Rujukan</strong></label>
                <table class="table table-bordered">
                    <tr style="text-align: center">
                        <th>Kelas</th>
                        <th>Kegunaan</th>
                    </tr>
                    <tr>
                        <td>Class I</td>
                        <td>Conservation of natural environment<br>Water Supply I - Practically no treatment necessary<br>Fishery I - Very sensitive aquatic species</td>
                    </tr>
                    <tr>
                        <td>Class IIA</td>
                        <td>Water Supply II - Conventional treatment required<br>Fishery II - Sensitive aquatic species</td>
                    </tr>
                    <tr>
                        <td>Class IIB</td>
                        <td>Recreational ise with body contact</td>
                    </tr>
                    <tr>
                        <td>Class III</td>
                        <td>Water Supply III - Extensive treatment required<br>Fishery III - Common, of economic value and tolerant species; livestock drinking</td>
                    </tr>
                    <tr>
                        <td>Class IV</td>
                        <td>Irrigation</td>
                    </tr>
                    <tr>
                        <td>Class V</td>
                        <td>None of the above</td>
                    </tr>
                </table> -->
                @endif

                <!-- untuk Tanah -->
                @if(in_array($stesen->jenis_pengawasan_id,[4]))
                <div class="form-group form-group-default form-group-default-custom form-group-default-select2">
                    <label>Kategori Jenis Guna Tanah <span style="color:red;">*</span>
                    </label>
                    <select id="kategori_tanah" name="kategori_tanah" data-placeholder="bulan" class="full-width autoscroll" data-init-plugin="select2" required>
                        <option disabled hidden selected> Sila Pilih </option>
                        <option value="1" {{ $stesen->kategori_tanah=='1' ? 'selected' : ''}}>Industri</option>
                        <option value="2" {{ $stesen->kategori_tanah=='2' ? 'selected' : ''}}>Pertanian</option>
                        <option value="3" {{ $stesen->kategori_tanah=='3' ? 'selected' : ''}}>Tapak Pelupusan Sisa Pepejal</option>
                        <option value="4" {{ $stesen->kategori_tanah=='4' ? 'selected' : ''}}>Kawasan Bandar/ Pinggir Bandar</option>
                        <option value="5" {{ $stesen->kategori_tanah=='5' ? 'selected' : ''}}>Kawasan Lombong</option>
                        <option value="6" {{ $stesen->kategori_tanah=='6' ? 'selected' : ''}}>Padang Golf</option>
                        <option value="7" {{ $stesen->kategori_tanah=='7' ? 'selected' : ''}}>Kawasan Peranginan(resort)</option>
                        <option value="8" {{ $stesen->kategori_tanah=='8' ? 'selected' : ''}}>Akuakultur</option>
                        <option value="9" {{ $stesen->kategori_tanah=='9' ? 'selected' : ''}}>Bekalan Air Tempatan</option>
                        <option value="10" {{ $stesen->kategori_tanah=='10' ? 'selected' : ''}}>Kawasan Luar Bandar</option>
                    </select>
                </div>
                @endif

                <!-- untuk Marin Standard baru sahaja iaitu pemakaian slps 2019 -->
                @if(in_array($stesen->versi,[2]))
                <div class="col-md-12 p-t-10">
                    <div class="form-group row">
                        <label class="col-md-3 m-t-15 control-label">Sila Pilih Jika Melibatkan Standard R </label>
                        <div class="checkbox check-primary">
                            <input name="is_prima" value="1" id="is_prima" type="checkbox" class="hidden is_prima" aria-required="true" readonly>
                            <label for="is_prima">Sentuhan Prima</label>
                            <input name="is_sekunder" value="1" id="is_sekunder" type="checkbox" class="hidden is_sekunder" aria-required="true" readonly>
                            <label for="is_sekunder">Sentuhan Sekunder</label>
                        </div>
                    </div>
                </div>
                @endif

                <div class="col-md-12 p-t-10">
                    <div class="form-group row">
                        <label class="col-md-3 m-t-15 control-label">Jenis Pengawasan<span style="color:red;">*</span> </label>
                        <div class="checkbox check-primary">
                            <input name="is_tanah" value="1" id="is_tanah" type="checkbox" class="hidden is_tanah" aria-required="true">
                            <label for="is_tanah">Kerja Tanah</label>
                            <input name="is_pembinaan" value="1" id="is_pembinaan" type="checkbox" class="hidden is_pembinaan" aria-required="true">
                            <label for="is_pembinaan">Pembinaan</label>
                            <input name="is_operasi" value="1" id="is_operasi" type="checkbox" class="hidden is_operasi" aria-required="true">
                            <label for="is_operasi">Operasi</label>
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group row">
                        <label class="col-md-3 m-t-15 control-label">Bacaan Garis Dasar </label>
                        <div class="checkbox check-primary">
                           <input name="is_eia" value="1" id="is_eia" type="checkbox" class="hidden is_eia" aria-required="true" checked readonly>
                           <label for="is_eia">Peringkat EIA<span style="color:red;">*</span></label>
                           <input name="is_emp" value="1" id="is_emp" type="checkbox" class="hidden is_emp" readonly>
                           <label for="is_emp">Peringkat EMP</label>
                       </div>
                   </div>
               </div>

             <div class="form-group form-group-default input-group" id="date_eia" style="display: none">
                <div class="form-input-group">
                    <label>Tarikh Pengawn (EIA)</label>
                    <input class="form-control"  name="date_eia" type="date" value="{{ $stesen->date_eia}}" readonly>
                </div>
                <!-- <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                </div> -->
            </div>
            <div class="form-group form-group-default input-group" id="date_emp" style="display: none">
                <div class="form-input-group">
                    <label>Tarikh Pengawasan (EMP)</label>
                    <input class="form-control"  name="date_emp" type="date" value="{{$stesen->date_emp}}" readonly>
                </div>
                <!-- <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                </div> -->
            </div>
                <div class="form-group form-group-default">
                    <label>Gambar Stesen</label>
                    <input type="hidden" name="stesenid" id="stesenid" value="{{$stesen->id}}">
                    
                    <input type="file" class="dropify ldp2m2" id="gambar_stesen" name="gambar_stesen" data-allowed-file-extensions='["png", "jpg"]' data-max-file-size="10M" data-default-file="{{ asset('../'.$stesen->gambar_stesen) }}" disabled />
                </div>
               
               
            </div>
            <div class="modal-footer">
            @if(auth()->user()->hasRole('staff')){
              <button type="button" class="btn btn-info" onclick="submitForm('form-stesen-edit')"><i class="fa fa-check m-r-5"></i> Simpan</button>
            @endif
            </div>
        </form>
        </div>
    </div>
</div>
<script type="text/javascript">
$("#modal-edit").modal("show");
$('.modal form').trigger("reset");
$(".modal form").validate();

$('.dropify').dropify({
    messages: {
        'default': 'Drag and drop a file here or click',
        'replace': 'Drag and drop or click to replace',
        'remove':  'Remove',
        'error':   'Ooops, something wrong happended.'
    }
});

$('body').on('change','input:checkbox[name="is_eia"]',function () {
    if ($('input[name=\'is_eia\'][value=1]').prop('checked')==true) {
        document.getElementById('date_eia').style.display = 'block';
    }else{
        document.getElementById('date_eia').style.display = 'none';
    }

    if ($('input[name=\'is_emp\'][value=1]').prop('checked')==true) {
        document.getElementById('date_emp').style.display = 'block';
    }else{
        document.getElementById('date_emp').style.display = 'none';
    }
})

$('body').on('change','input:checkbox[name="is_emp"]',function () {
    if ($('input[name=\'is_emp\'][value=1]').prop('checked')==true) {
        document.getElementById('date_emp').style.display = 'block';
    }else{
        document.getElementById('date_emp').style.display = 'none';
    }
})

$(document).ready(function() {
    if($('.is_eia').prop("checked") == true) {
        document.getElementById('date_eia').style.display = 'block';
    } else document.getElementById('date_eia').style.display = 'none';

    if($('.is_emp').prop("checked") == true) {
        document.getElementById('date_emp').style.display = 'block';
    } else document.getElementById('date_emp').style.display = 'none';
});

$("#form-stesen-edit").submit(function(e) {
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
            tableSungai.api().ajax.reload(null, false);
            tableMarin.api().ajax.reload(null, false);
            tableTasik.api().ajax.reload(null, false);
            tableTanah.api().ajax.reload(null, false);
            tableAir.api().ajax.reload(null, false);
            tableUdara.api().ajax.reload(null, false);
            tableBunyi.api().ajax.reload(null, false);
            tableGetaran.api().ajax.reload(null, false);
            tableDron.api().ajax.reload(null, false);
        }
    });
});

@if($stesen->is_tanah == 1)
$("#is_tanah").prop('checked', true).trigger('change');
@endif

@if($stesen->is_pembinaan == 1)
$("#is_pembinaan").prop('checked', true).trigger('change');
@endif

@if($stesen->is_operasi == 1)
$("#is_operasi").prop('checked', true).trigger('change');
@endif

@if($stesen->is_eia == 1)
$("#is_eia").prop('checked', true).trigger('change');
@endif

@if($stesen->is_emp == 1)
$("#is_emp").prop('checked', true).trigger('change');
@endif

@if($stesen->is_prima == 1)
$("#is_prima").prop('checked', true).trigger('change');
@endif

@if($stesen->is_sekunder == 1)
$("#is_sekunder").prop('checked', true).trigger('change');
@endif

@if($stesen->class)
$("#class").prop('checked', true).trigger('change');
@endif

</script>

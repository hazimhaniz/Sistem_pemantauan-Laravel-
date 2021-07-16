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
            <form id='form-stesen-edit' role="form" method="post" action="{{ route('projek.updatestesen') }}">

            <input type="hidden" name="id" value="{{$stesen->id}}">
            <div class="modal-body m-t-20">
                <div class="form-group form-group-default input-group">
                    <div class="form-input-group">
                        <label>Nama Stesen <span style="color:red;">*</span>
                        </label>
                        <input type="text" id="stesen" name="stesen" class="form-control" value="{{$stesen->stesen}}" required>
                    </div>
                </div>
                <div class="form-group form-group-default input-group">
                    <div class="form-input-group">
                        <label>Longitud <span style="color:red;">*</span>
                        </label>
                        <input type="text" id="longitud" name="longitud" class="form-control" value="{{$stesen->longitud}}" required>
                    </div>
                </div>
                <div class="form-group form-group-default input-group">
                    <div class="form-input-group">
                        <label>Latitud <span style="color:red;">*</span>
                        </label>
                        <input type="text" id="latitud" name="latitud" class="form-control" value="{{$stesen->latitud}}" required>
                    </div>
                </div>
                <!-- @include('components.input', [
                'label' => 'Nama Stesen',
                'info' => 'Nama Stesen',
                'name' => 'stesen',
                'id' => 'stesen',
                'mode' => 'required',
                'value' => $stesen->stesen,
                ])

                @include('components.input', [
                'label' => 'Longitud',
                'info' => 'Longitud',
                'name' => 'longitud',
                'id' => 'longitud',
                'mode' => 'required',
                'value' => $stesen->longitud,
                ])

                @include('components.input', [
                'label' => 'Latitud',
                'info' => 'Latitud',
                'name' => 'latitud',
                'id' => 'latitud',
                'mode' => 'required',
                'value' => $stesen->latitud,
                ]) -->

                @if($stesen->jenis_pengawasan_id!=7)
                <div class="form-group form-group-default form-group-default-custom form-group-default-select2">
                    <label>Standard <span style="color:red;">*</span>
                    </label>
                    <select id="standard" name="standard" data-placeholder="bulan" class="full-width autoscroll" data-init-plugin="select2" required>
                        <option disabled hidden selected> Sila Pilih </option>
                        @foreach($masterstandard as $masterstandards)
                        <option value="{{$masterstandards->id}}" {{ $parameter_standard->standard==$masterstandards->id ? 'selected' : ''}}>{{$masterstandards->class}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="table-responsive form-group row control-label  p-t-20">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>Parameter</th>
                                <!-- <th>Standard Dirujuk</th> -->
                                <th>Data Baseline</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php $count =0; ?>
                            @foreach ($parameter as $key => $value_parameter)
                            <?php
                                  $count =$count +1;
                                  $name = "parameter".$count;
                            ?>
                            <tr>
                                <td >
                                    <input type="hidden" name="{{$name}}" id="{{$name}}" value="{{$value_parameter->parameter}}">
                                    {{$value_parameter->jenisparameter->jenis_parameter}}</td>
                                <!-- <td>
                                    <select id="standard{{$value_parameter->parameter}}" name="standard{{$value_parameter->parameter}}" data-placeholder="" class="full-width autoscroll" data-init-plugin="select2" required>
                                        <option disabled hidden selected> Sila Pilih </option>
                                        <?php
                                        foreach ($masterstandard as $key => $value_standard) {
                                            if($value_parameter->parameter== $value_standard->jenis_parameter)
                                            { ?>
                                                <option value="{{$value_standard->id}}" {{ $value_parameter->standard==$value_standard->id ? 'selected' : ''}}>{{$value_standard->class}}</option>
                                            }
                                            }
                                        <?php }
                                        }
                                        ?>
                                    </select>
                                </td> -->
                                <td>
                                    <input type="hidden" name="parameter_id{{$value_parameter->parameter}}" id="parameter_id{{$value_parameter->parameter}}" value="{{$value_parameter->id}}">
                                    <input class="form-control" type="text" id="baseline{{$value_parameter->parameter}}" name="baseline{{$value_parameter->parameter}}" value="{{$value_parameter->baseline}}" />
                                </td>

                                <!-- <td>
                                    <input type="hidden" name="bacaan_cerap_id{{$value_parameter->id}}" id="bacaan_cerap_id{{$value_parameter->id}}" value="{{$value_parameter->id}}">
                                    <input class="form-control" type="text" id="bacaan_cerap{{$value_parameter->id}}" name="bacaan_cerap{{$value_parameter->id}}" value="{{$value_parameter->bacaan_cerap}}" />
                                </td> -->
                            </tr>
                            @endforeach

                            <!-- <tr>
                                <td>Parameter 2</td>
                                <td>12</td>
                                <td>Kelas 1 - 12</td>
                                <td><input class="form-control" type="text"/></td>
                            </tr> -->
                            </tbody>
                        </table>
                    </div>
                @endif
                <div class="form-group form-group-default">
                    <label>Gambar Stesen</label>
                    <input type="hidden" name="stesenid" id="stesenid" value="{{$stesen->id}}">
                     @if($stesen->jenis_pengawasan_id!=7)
                    <input type="hidden" name="count" id="count" value="{{$count}}">
                     @endif
                    <input type="file" class="dropify ldp2m2" id="gambar_stesen" name="gambar_stesen" data-allowed-file-extensions='["png", "jpg"]' data-max-file-size="10M" data-default-file="{{ asset('../'.$stesen->gambar_stesen) }}"/>
                </div>


            </div>
            <div class="modal-footer">
                @if($stesen_status < 3 )
                    <button type="button" class="btn btn-info" onclick="submitForm('form-stesen-edit')"><i class="fa fa-check m-r-5"></i> Simpan</button>
                @else
                    <button type="button" class="btn btn-info" data-dismiss="modal"><i class="fa fa-check m-r-5"></i> Selesai</button>
                @endif
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

$('.dropify').dropify({
    messages: {
        'default': 'Drag and drop a file here or click',
        'replace': 'Drag and drop or click to replace',
        'remove':  'Remove',
        'error':   'Ooops, something wrong happended.'
    }
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
        }
    });
});

$('body').on('change','select[name="standard"]',function(parameter){

    var standard= $(this).val();
    var length = $('#count').val();
    var stesenid = $('#stesenid').val();

    //console.log(stesenid);

    $.ajax({
        url: '{{ route('showbaseline') }}',
        method: 'POST',
        data: {standard:standard,stesenid:stesenid},
        success: function(data) {
            var count = 0;

            data.idname.forEach(function(item){
                count = count +1;
                var count2 = 0;
                //console.log(count);
                data.iddata.forEach(function(item2){
                    count2 = count2 +1;
                   // console.log(count2);
                    if(count == count2)
                    {
                        //$('#'+idname).val() = item2;
                        document.getElementById(item).value = item2;
                        //console.log(count2);
                        //console.log(item2);
                        //console.log(count+'=='+count2);
                    }

                });
            });
            /*console.log(data);
            data.test.forEach(function(item){
                console.log(item);
            });*/
        }
    });
});

</script>

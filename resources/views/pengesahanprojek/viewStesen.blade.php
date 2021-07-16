@extends('layouts.modal')
@include('plugins.dropify')

<style type="text/css">
    .dropify-clear{
        display: none !important;
    }
</style>

<div class="modal fade" id="modal-edit" tabindex="-1" role="dialog" aria-labelledby="addModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-xs" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalTitle">Maklumat <span class="bold">Stesen</span></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <input type="hidden" name="id" value="{{$stesen->id}}">
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
                'label' => 'Longitud',
                'info' => 'Longitud',
                'name' => 'longitud',
                'id' => 'longitud',
                'mode' => 'readonly',
                'value' => $stesen->longitud,
                ])

                @include('components.input', [
                'label' => 'Latitud',
                'info' => 'Latitud',
                'name' => 'latitud',
                'id' => 'latitud',
                'mode' => 'readonly',
                'value' => $stesen->latitud,
                ])

                <div class="form-group row control-label  p-t-20">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>Parameter</th>
                                <th>Standard Dirujuk</th>
                                <th>Data Baseline</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($parameter as $key => $value_parameter)
                            <tr>
                                <td>{{$value_parameter->jenisparameter->jenis_parameter}}</td>
                                <td>
                                    <select id="standard{{$value_parameter->parameter}}" name="standard{{$value_parameter->parameter}}" data-placeholder="" class="full-width autoscroll" data-init-plugin="select2" required disabled>
                                        <option disabled hidden selected> Sila Pilih </option>
                                        <?php 
                                        foreach ($masterstandard as $key => $value_standard) {
                                            if($value_parameter->parameter== $value_standard->jenis_parameter)
                                            { ?> 
                                                <option value="{{$value_standard->id}}" {{ $value_parameter->standard==$value_standard->id ? 'selected' : ''}} >{{$value_standard->class}}</option> 
                                            }
                                            }
                                        <?php }
                                        }   
                                        ?>
                                    </select>
                                </td>
                                <td>
                                    <input type="hidden" name="parameter_id{{$value_parameter->parameter}}" id="parameter_id{{$value_parameter->parameter}}" value="{{$value_parameter->id}}">
                                    <input class="form-control" type="text" id="baseline{{$value_parameter->parameter}}" name="baseline{{$value_parameter->parameter}}" value="{{$value_parameter->baseline}}" readonly/>
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

                <div class="form-group form-group-default">
                    <label>Gambar Stesen</label>
                    <input type="file" class="dropify ldp2m2" id="gambar_stesen" name="gambar_stesen" data-allowed-file-extensions='["png", "jpg"]' data-max-file-size="10M" data-default-file="{{ asset('../'.$stesen->gambar_stesen) }}" disabled />
                </div>
               
               
            </div>
            <div class="modal-footer">
              <!-- <button type="button" class="btn btn-info" onclick="submitForm('form-stesen-edit')"><i class="fa fa-check m-r-5"></i> Simpan</button> -->
            </div>
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

</script>

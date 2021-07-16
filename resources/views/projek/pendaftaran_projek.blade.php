@extends('layouts.app')
@push('css')
<style>
    .test {
        font-family: 'Montserrat';
        font-size: 10.5px;
        letter-spacing: 0.06em;
        text-transform: uppercase;
        font-weight: 500;
    }
</style>
@endpush
@section('content')
<div class="" data-pages="parallax">
    <div class=" container-fluid container-fixed-lg sm-p-l-0 sm-p-r-0">
        <div class="inner">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Utama</a></li>
                <li class="breadcrumb-item">Projek</li>
                <li class="breadcrumb-item active">Pendaftaran Projek</li>
            </ol>
            <div class="row">
                <div class="col-xl-12 col-lg-12 ">
                    <div class="card card-transparent">
                        <div class="card-block p-t-0">
                            <!-- <h3 class='m-t-0'>Pendaftaran Projek</h3>
                            <p class="small hint-text m-t-5">
                                <p class="hint-text">Pendaftaran Projek di Bawah EIA</p> -->
                                <!-- <button class="btn btn-default btn-sm pull-right"><i class="fa fa-download m-r-5"></i> PDF</button> -->
                                <!-- <button class="btn btn-default btn-sm pull-right"><i class="fa fa-download m-r-5"></i> Excel</button> -->
                                <!-- <button class="btn btn-default btn-sm pull-right"><i class="fa fa-print m-r-5"></i> Cetak</button> -->
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<ul class="nav nav-tabs nav-tabs-fillup d-none d-md-flex d-lg-flex d-xl-flex" role="tablist"></ul>
<div class="tab-content">
    <div class=" container-fluid container-fixed-lg bg-white">
        <div class="card card-transparent">
            <div class="card-block">
                <div class=" container-fluid container-fixed-lg">
                    <div class="card card-transparent">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card card-default">
                                        <div class="card-header separator">
                                            <div class="card-title" style="font-weight: bold;font-size: 12.5px">Pendaftaran Projek</div>
                                        </div>
                                        <div class="card-body m-t-20">
                                            <div class="form-group row control-label ">
                                                <label class="col-md-3">No Fail JAS</label>
                                                <div class="col-md-9"><input class="form-control" type="text" value="789" disabled></div>
                                            </div>
                                            <div class="form-group row control-label ">
                                                <label class="col-md-3">Nama Projek<span style="color:red;">*</span> </label>
                                                <div class="col-md-9"><input class="form-control" type="text" value=""></div>
                                            </div>
                                            <div class="form-group row control-label">
                                                <label class="col-md-3">Nama Penggerak Projek<span style="color:red;">*</span> </label>
                                                <div class="col-md-9"><input class="form-control" type="text" value=""></div>
                                            </div>
                                            <div class="form-group row control-label">
                                                <label class="col-md-3">Lokasi Tapak Projek<span style="color:red;">*</span> </label>
                                                <div class="col-md-9"><input class="form-control" type="text" value=""></div>
                                            </div>
                                            <div class="form-group row control-label">
                                                <label class="col-md-3">Negeri<span style="color:red;">*</span> </label>
                                                <div class="col-md-3"><input class="form-control" type="text" value=""></div>
                                                <label class="col-md-3">Daerah<span style="color:red;">*</span> </label>
                                                <div class="col-md-3"><input class="form-control" type="text" value=""></div>
                                            </div>
                                            <div class="form-group row control-label">
                                                <label class="col-md-3">Bandar<span style="color:red;">*</span> </label>
                                                <div class="col-md-3"><input class="form-control" type="text" value=""></div>
                                                <label class="col-md-3">Poskod<span style="color:red;">*</span> </label>
                                                <div class="col-md-3"><input class="form-control" type="text" value=""></div>
                                            </div>
                                            <div class="form-group row control-label">
                                                <label class="col-md-3">Alamat Surat-menyurat<span style="color:red;">*</span> </label>
                                                <div class="col-md-9"><input class="form-control" type="text" value=""></div>
                                            </div>
                                            <div class="form-group row control-label">
                                                <label class="col-md-3">Negeri<span style="color:red;">*</span> </label>
                                                <div class="col-md-3"><input class="form-control" type="text" value=""></div>
                                                <label class="col-md-3">Daerah<span style="color:red;">*</span> </label>
                                                <div class="col-md-3"><input class="form-control" type="text" value=""></div>
                                            </div>
                                            <div class="form-group row control-label">
                                                <label class="col-md-3">Bandar<span style="color:red;">*</span> </label>
                                                <div class="col-md-3"><input class="form-control" type="text" value=""></div>
                                                <label class="col-md-3">Poskod<span style="color:red;">*</span> </label>
                                                <div class="col-md-3"><input class="form-control" type="text" value=""></div>
                                            </div>
                                            <div class="form-group row control-label">
                                                <label class="col-md-3">Jenis Projek<span style="color:red;">*</span> </label>
                                                <div class="col-md-9">
                                                    <div class="radio radio-primary">
                                                        <input name="project_type" value="tidak_pakej" id="tidak_pakej" type="radio" class="hidden" required="" aria-required="true" onclick="yesnoCheck();">
                                                        <label for="tidak_pakej">Tidak Berpakej</label>
                                                        <input name="project_type" value="pakej" id="pakej" type="radio" class="hidden" required="" aria-required="true" onclick="yesnoCheck();" >
                                                        <label for="pakej">Berpakej</label>
                                                        <input name="project_type" value="fasa" id="fasa" type="radio" class="hidden" required="" aria-required="true" onclick="yesnoCheck();">
                                                        <label for="fasa">Berfasa</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div style="display: none;" id="pakej_content">
                                                <div class="form-group row control-label">
                                                    <label class="col-md-3">Negeri Terlibat<span style="color:red;">*</span> </label>
                                                    <div class="col-md-9">
                                                        <select class="full-width autoscroll state" data-init-plugin="select2" multiple>
                                                            <option value="0">-Select-</option>
                                                            <option value="1">Johor</option>
                                                            <option value="2">Perak</option>
                                                            <option value="3">Kuala Lumpur</option>
                                                            <option value="4">Kedah</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row control-label">
                                                    <label class="col-md-3">Tarikh Mula<span style="color:red;">*</span> </label>
                                                    <div class="col-md-3"><input class="form-control datepicker" type="text" value=""></div>
                                                    <label class="col-md-3">Tarikh Tamat<span style="color:red;">*</span> </label>
                                                    <div class="col-md-3"><input class="form-control datepicker" type="text" value=""></div>
                                                </div>
                                                <div class="form-group row control-label">
                                                    <label class="col-md-3">Nama Pakej<span style="color:red;">*</span> </label>
                                                    <div class="col-md-3"><input class="form-control" type="text" value=""></div>
                                                    <label class="col-md-3">Nama Kontraktor<span style="color:red;">*</span> </label>
                                                    <div class="col-md-3"><input class="form-control" type="text" value=""></div>
                                                </div>
                                                <div class="form-group row control-label">
                                                    <label class="col-md-3">Alamat<span style="color:red;">*</span> </label>
                                                    <div class="col-md-9"><textarea class="form-control" type="text" style="height: 100px;"></textarea></div>
                                                </div>
                                            </div>

                                            <div class="form-group row control-label">
                                                <label class="col-md-3">Environmental Officer<span style="color:red;">*</span> </label>
                                                <div class="col-md-3">
                                                    <select class="full-width autoscroll" style="border-color: rgba(0, 0, 0, 0.07);padding: 9px;min-height: 35px">
                                                        <option value="0">-Select-</option>
                                                        <option value="1">EO 1</option>
                                                        <option value="2">EO 2</option>
                                                        <option value="3">EO 3</option>
                                                        <option value="4">EO 4</option>
                                                    </select>
                                                </div>

                                                <label class="col-md-3">Environmental Monitoring Officer<span style="color:red;">*</span> </label>
                                                <div class="col-md-3">
                                                    <select class="full-width autoscroll" style="border-color: rgba(0, 0, 0, 0.07);padding: 9px;min-height: 35px">
                                                        <option value="0">-Select-</option>
                                                        <option value="1">EMC 1</option>
                                                        <option value="2">EMC 2</option>
                                                        <option value="3">EMC 3</option>
                                                        <option value="4">EMC 4</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row control-label">
                                                <label class="col-md-3">Jenis Pengawasan<span style="color:red;">*</span> </label>
                                                <div class="col-md-9">
                                                    <div class="checkbox check-primary">
                                                        <input value="" type="checkbox" id="type1" checked onclick="typeYesNoCheck();">
                                                        <label for="type1">Air</label>
                                                    </div>

                                                    <div id="choose" style="display: none;">
                                                        <div class="col-md-9">
                                                            <div class="checkbox check-primary">
                                                                <input value="" type="checkbox" id="choose1" onclick="airYesNoCheck();" checked>
                                                                <label for="choose1">Sungai</label>
                                                            </div>
                                                            <div class="checkbox check-primary">
                                                                <input value="" type="checkbox" id="choose2" onclick="airYesNoCheck();">
                                                                <label for="choose2">Laut</label>
                                                            </div>
                                                            <div class="checkbox check-primary">
                                                                <input value="" type="checkbox" id="choose3" onclick="airYesNoCheck();">
                                                                <label for="choose3">Tasik</label>
                                                            </div>
                                                            <div class="checkbox check-primary">
                                                                <input value="" type="checkbox" id="choose4" onclick="airYesNoCheck();">
                                                                <label for="choose4">Air Tanah</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="checkbox check-primary">
                                                        <input value="" type="checkbox" id="type2"checked onclick="typeYesNoCheck();">
                                                        <label for="type2">Udara</label>
                                                    </div>
                                                    <div class="checkbox check-primary">
                                                        <input value="" type="checkbox" id="type3"checked onclick="typeYesNoCheck();">
                                                        <label for="type3">Bunyi bising</label>
                                                    </div>
                                                    <div class="checkbox check-primary">
                                                        <input value="" type="checkbox" id="type4" onclick="typeYesNoCheck();">
                                                        <label for="type4">Vibration</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- START JENIS PENGAWASAN -->
                                            @include('projek._jenis_pengawasan')
                                            <!-- END JENIS PENGAWASAN -->

                                            <!-- START MODAL -->
                                            @include('projek._modal')
                                            <!-- END MODAL -->
                                        </div>
                                    </div>
                                    <div class="card card-default">
                                        <!-- START EMP -->
                                        <div class="card-header">
                                            <div class="card-title" style="font-weight: bold;font-size: 12.5px">
                                                Maklumat EMP <span style="color:red;">*</span>
                                                <button onclick="addData2(2)" class="btn btn-success"><i class="fa fa-plus m-r-5"></i></button>
                                            </div>
                                        </div>
                                        <!-- START CONTAINER FLUID -->
                                        <div class=" container-fluid container-fixed-lg bg-white">
                                            <!-- START card -->
                                            <div class="card card-transparent">
                                                <div class="card-block">
                                                    <table class="table table-hover" id="table">
                                                        <thead>
                                                        <tr>
                                                            <th>No.</th>
                                                            <th>Tarikh Kelulusan EMP</th>
                                                            <th>Nama Laporan EMP</th>
                                                            <th>Nama Jururunding</th>
                                                            <th>Tindakan</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr>
                                                            <td>1.</td>
                                                            <td>23/05/2019</td>
                                                            <td>Laporan EMP 1</td>
                                                            <td>Jururunding 1</td>
                                                            <td>
                                                                <a onclick="editData2(3)" href="javascript:;" class="btn btn-primary btn-xs mb-1"><i class="fa fa-edit mr-1"></i> Kemaskini</a>
                                                                <a onclick="deleteData(2)" href="javascript:;" class="btn btn-danger btn-xs mb-1"><i class="fa fa-trash mr-1"></i> Padam</a>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>2.</td>
                                                            <td>23/07/2019</td>
                                                            <td>Laporan EMP 2</td>
                                                            <td>Jururunding 2</td>
                                                            <td>
                                                                <a onclick="editData2(3)" href="javascript:;" class="btn btn-primary btn-xs mb-1"><i class="fa fa-edit mr-1"></i> Kemaskini</a>
                                                                <a onclick="deleteData(1)" href="javascript:;" class="btn btn-danger btn-xs mb-1"><i class="fa fa-trash mr-1"></i> Padam</a>
                                                            </td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <!-- END card -->
                                        </div>
                                        <!-- END CONTAINER FLUID -->
                                        <!-- END EMP -->
                                    </div>
                                    <div class="card card-default">
                                        <!-- START LDP2M2 -->
                                        <div class="card-header">
                                            <div class="card-title" style="font-weight: bold;font-size: 12.5px">
                                                Maklumat LDP2M2 <span style="color:red;">*</span>
                                                <button onclick="addData3(3)" class="btn btn-success"><i class="fa fa-plus m-r-5"></i></button>
                                            </div>
                                        </div>
                                        <!-- START CONTAINER FLUID -->
                                        <div class=" container-fluid container-fixed-lg bg-white">
                                            <!-- START card -->
                                            <div class="card card-transparent">
                                                <div class="card-block">
                                                    <table class="table table-hover" id="table">
                                                        <thead>
                                                        <tr>
                                                            <th>No.</th>
                                                            <th>Nama Dokumen LDP2M2</th>
                                                            <th>Tarikh Kelulusan LDP2M2</th>
                                                            <th>No Plan Diluluskan</th>
                                                            <th>Tindakan</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr>
                                                            <td>1.</td>
                                                            <td>LDP2M2 1</td>
                                                            <td>23/05/2019</td>
                                                            <td>123</td>
                                                            <td>
                                                                <a onclick="editData3(3)" href="javascript:;" class="btn btn-primary btn-xs mb-1"><i class="fa fa-edit mr-1"></i> Kemaskini</a>
                                                                <a onclick="deleteData(2)" href="javascript:;" class="btn btn-danger btn-xs mb-1"><i class="fa fa-trash mr-1"></i> Padam</a>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>2.</td>
                                                            <td>LDP2M2 2</td>
                                                            <td>23/05/2019</td>
                                                            <td>123</td>
                                                            <td>
                                                                <a onclick="editData3(3)" href="javascript:;" class="btn btn-primary btn-xs mb-1"><i class="fa fa-edit mr-1"></i> Kemaskini</a>
                                                                <a onclick="deleteData(1)" href="javascript:;" class="btn btn-danger btn-xs mb-1"><i class="fa fa-trash mr-1"></i> Padam</a>
                                                            </td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <!-- END card -->
                                        </div>
                                        <!-- END CONTAINER FLUID -->
                                        <!-- END LDP2M2 -->
                                    </div>
                                    <div class="card card-default">
                                        <!-- START FIELD TARIKH AUDIT -->
                                        <div class="card-header">
                                            <div class="card-title" style="font-weight: bold;font-size: 12.5px">
                                                Bil. Audit Yang Disyaratkan <span style="color:red;">*</span>
                                                <button onclick="addData()" class="btn btn-success"><i class="fa fa-plus m-r-5"></i></button>
                                            </div>
                                        </div>
                                        <!-- START CONTAINER FLUID -->
                                        <div class=" container-fluid container-fixed-lg bg-white">
                                            <!-- START card -->
                                            <div class="card card-transparent">
                                                <div class="card-block">
                                                    <table class="table table-hover" id="table">
                                                        <thead>
                                                        <tr>
                                                            <th>No.</th>
                                                            <th>Tarikh</th>
                                                            <th>Tindakan</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr>
                                                            <td>1.</td>
                                                            <td>23/05/2019</td>
                                                            <td>
                                                                <a onclick="editData(1)" href="javascript:;" class="btn btn-primary btn-xs mb-1"><i class="fa fa-edit mr-1"></i> Kemaskini</a>
                                                                <a onclick="deleteData(1)" href="javascript:;" class="btn btn-danger btn-xs mb-1"><i class="fa fa-trash mr-1"></i> Padam</a>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>2.</td>
                                                            <td>23/07/2019</td>
                                                            <td>
                                                                <a onclick="editData3()" href="javascript:;" class="btn btn-primary btn-xs mb-1"><i class="fa fa-edit mr-1"></i> Kemaskini</a>
                                                                <a onclick="deleteData(1)" href="javascript:;" class="btn btn-danger btn-xs mb-1"><i class="fa fa-trash mr-1"></i> Padam</a>
                                                            </td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <!-- END card -->
                                        </div>
                                        <!-- END CONTAINER FLUID -->
                                        <!-- END FIELD AUDIT -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <button type="button" class="btn btn-info pull-right m-r-30" id="submit"><i class="fa fa-check m-r-5"></i> Simpan</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
<script type="text/javascript">

function removepakej(id) {

swal({
        title: "Anda pasti?",
        text: "Data yang telah dipadam tidak boleh dikembalikan. Teruskan?",
        type: "info",
        showCancelButton: true,
        confirmButtonClass: "btn-outline green-meadow",
        cancelButtonClass: "btn-danger",
        confirmButtonText: "Ya",
        cancelButtonText: "Tidak",
        closeOnConfirm: true,
        closeOnCancel: true,
        showLoaderOnConfirm: true
    },
    function(isConfirm) {
        if (isConfirm) {
            $.ajax({
                url: 'buangpakej/'+id,
                method: 'delete',
                dataType: 'json',
                async: true,
                contentType: false,
                processData: false,
                success: function(data) {
                    swal(data.title, data.message);
                    table.api().ajax.reload(null, false);
                }
            });
        }
    });
}
    $('#submit').click(function(){
        swal("", "Pendaftaran projek berjaya dilakukan.")
    });

    $(document).ready(function () {
        $('#type1').change(function () {
            if (!this.checked)
                $('#choose').fadeOut('slow');
            else
                $('#choose').fadeIn('slow');
        });
    });

    $(document).ready(function () {
        if ($('#type1').checked)
            $('#choose').fadeOut('slow');
        else
            $('#choose').fadeIn('slow');
    });

    function yesnoCheck() {
        if (document.getElementById('pakej').checked) {
            document.getElementById('pakej_content').style.display = 'block';
        }
        else document.getElementById('pakej_content').style.display = 'none';

    }

    function auditYesNoCheck() {
        if (document.getElementById('yearly').checked) {
            document.getElementById('yearly_content').style.display = 'block';
        }else{
            document.getElementById('yearly_content').style.display = 'none';
        }

        if (document.getElementById('twice').checked) {
            document.getElementById('twice_content').style.display = 'block';
        }else{
            document.getElementById('twice_content').style.display = 'none';
        }

        if (document.getElementById('quarterly').checked) {
            document.getElementById('quarterly_content').style.display = 'block';
        }else{
            document.getElementById('quarterly_content').style.display = 'none';
        }

        if (document.getElementById('monthly').checked) {
            document.getElementById('monthly_content').style.display = 'block';
        }else{
            document.getElementById('monthly_content').style.display = 'none';
        }
    }

    function typeYesNoCheck(){
        if (document.getElementById('type1').checked) {
            document.getElementById('air').style.display = 'block';
        }else{
            document.getElementById('air').style.display = 'none';
        }

        if (document.getElementById('type2').checked) {
            document.getElementById('udara').style.display = 'block';
        }else{
            document.getElementById('udara').style.display = 'none';
        }

        if (document.getElementById('type3').checked) {
            document.getElementById('bunyi').style.display = 'block';
        }else{
            document.getElementById('bunyi').style.display = 'none';
        }

        if (document.getElementById('type4').checked) {
            document.getElementById('getaran').style.display = 'block';
        }else{
            document.getElementById('getaran').style.display = 'none';
        }
    }

    if (document.getElementById('type1').checked) {
        document.getElementById('air').style.display = 'block';
    }else{
        document.getElementById('air').style.display = 'none';
    }

    if (document.getElementById('type2').checked) {
        document.getElementById('udara').style.display = 'block';
    }else{
        document.getElementById('udara').style.display = 'none';
    }

    if (document.getElementById('type3').checked) {
        document.getElementById('bunyi').style.display = 'block';
    }else{
        document.getElementById('bunyi').style.display = 'none';
    }

    if (document.getElementById('type4').checked) {
        document.getElementById('getaran').style.display = 'block';
    }else{
        document.getElementById('getaran').style.display = 'none';
    }

    function airYesNoCheck(){
        if (document.getElementById('choose1').checked) {
            document.getElementById('sungai').style.display = 'block';
        }else{
            document.getElementById('sungai').style.display = 'none';
        }

        if (document.getElementById('choose2').checked) {
            document.getElementById('laut').style.display = 'block';
        }else{
            document.getElementById('laut').style.display = 'none';
        }

        if (document.getElementById('choose3').checked) {
            document.getElementById('tasik').style.display = 'block';
        }else{
            document.getElementById('tasik').style.display = 'none';
        }

        if (document.getElementById('choose4').checked) {
            document.getElementById('tanah').style.display = 'block';
        }else{
            document.getElementById('tanah').style.display = 'none';
        }
    }

    if (document.getElementById('choose1').checked) {
        document.getElementById('sungai').style.display = 'block';
    }else{
        document.getElementById('sungai').style.display = 'none';
    }

    if (document.getElementById('choose2').checked) {
        document.getElementById('laut').style.display = 'block';
    }else{
        document.getElementById('laut').style.display = 'none';
    }

    if (document.getElementById('choose3').checked) {
        document.getElementById('tasik').style.display = 'block';
    }else{
        document.getElementById('tasik').style.display = 'none';
    }

    if (document.getElementById('choose4').checked) {
        document.getElementById('tanah').style.display = 'block';
    }else{
        document.getElementById('tanah').style.display = 'none';
    }


    function addData2() {
        $("#modal-add2").modal("show");
    }

    function editData2() {
        $("#modal-edit2").modal("show");
    }

    function addData3() {
        $("#modal-add3").modal("show");
    }

    function editData3() {
        $("#modal-edit3").modal("show");
    }

    function editKimia() {
        $("#modal-kimia").modal("show");
    }

    function parameter() {
        $("#modal-parameter").modal("show");
    }

</script>
@endpush

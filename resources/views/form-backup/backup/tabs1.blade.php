<style>
    .table>tbody>tr>td {
        padding: 6px;
        vertical-align: top !important;
        text-align: left !important;
        //font-size: 11px !important;
        //border: 1px solid #DDDDDD;
        color: #000 !important;
        font-family: 'Montserrat' !important;
        font-size: 10.5px !important;
        letter-spacing: 0.06em !important;
        /* text-transform: uppercase !important; */
        font-weight: 500 !important;
    }

    .table thead tr th {
        padding: 4px;
        vertical-align: top !important;
        text-align: left !important;
        font-size: 11px !important;
        //border: 1px solid #DDDDDD;
        color: #000 !important;
    }

    .checkbox-wrapper {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        grid-template-rows: repeat(2, 1fr);
    }
    label{
        font-family: 'Montserrat' !important;  
    }
    .table>tbody>tr>td {
        font-family: 'Montserrat' !important;
    font-size: 10.5px !important;
    text-align:center !important; 
    }

</style>
<div class="tab-content">
    <input type="hidden" name="current_tab" id="current_tab" value="1">

    <div class="tab-pane active slide-right" id="tab1_view">
        <div class="m-t-20">
            <!-- START card -->
            <div class="card card-transparent">

                <div class="card-block">
                    <div class="alert alert-primary" style="font-size:14.5px; font-family: 'Montserrat'">
                        <label>MAKLUMAT STATUS BAGI PROJEK YANG TERTAKLUK KEPADA EIA BAGI BULAN JANUARI TAHUN
                            2020.</label>
                    </div>
                    <div class="row">

                        <div class="col-md-6">

                            <div class="form-group-attached m-b-10">
                                <label>
                                    <span><b class="text-dark">MAKLUMAT PROJEK</b></span>
                                </label>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group form-group-default">
                                            <label>
                                                <span><b class="text-dark">Nama Projek</b></span> <span
                                                    style="color:red;">*</span>
                                            </label>

                                            <input class="form-control form-control-lg" type="text" placeholder="">
                                        </div>

                                    </div>
                                </div>

                                <div class="row">

                                    <div class="form-group form-group-default">
                                        <label>
                                            <span><b class="text-dark">Alamat Tapak</b></span><span
                                                style="color:red;">*</span>
                                        </label>
                                        <input class="form-control form-control-lg" type="text" placeholder="">
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-md-12">

                                        <div class="form-group form-group-default">
                                            <label>
                                                <span><b class="text-dark">Alamat Tapak baris 2</b></span>
                                            </label>
                                            <input class="form-control form-control-lg" type="text" placeholder="">
                                        </div>

                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">

                                        <div class="form-group form-group-default">
                                            <label>
                                                <span><b class="text-dark">Alamat Tapak baris 3</b></span>
                                            </label>
                                            <input class="form-control form-control-lg" type="text" placeholder="">
                                        </div>

                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group form-group-default">
                                            <label>
                                                <span><b class="text-dark">Poskod</b></span><span
                                                    style="color:red;">*</span>
                                            </label>
                                            <input class="form-control form-control-lg" type="text" placeholder="">
                                        </div>



                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group form-group-default">
                                            <label>
                                                <span><b class="text-dark">Negeri</b></span><span
                                                    style="color:red;">*</span>
                                            </label>
                                            <input class="form-control form-control-lg" type="text" placeholder="">
                                        </div>


                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">

                                        <div class="form-group form-group-default">
                                            <label>
                                                <span><b class="text-dark">Daerah</b></span>
                                            </label>
                                            <input class="form-control form-control-lg" type="text" placeholder="">
                                        </div>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group form-group-default">
                                            
                                            <label>
                                                <span><b class="text-dark">Tarikh Awal</b></span>
                                            <i class="fa fa-calendar"></i></label>
                                            <input id="" class="form-control datepicker " name="" placeholder=""
                                                required="" type="" value="">
                                        </div>



                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group form-group-default">
                                            <label>
                                                <span><b class="text-dark">Tarikh Akhir</b></span>
                                            <i class="fa fa-calendar"></i></label>
                                            <input id="" class="form-control datepicker " name="" placeholder=""
                                                required="" type="" value="">
                                        </div>


                                    </div>
                                </div>


                            </div>
                            <table class="table table-hover table-responsive dataTable no-footer display nowrap"
                                id="table" role="grid" aria-describedby="table_info">
                                <thead>
                                    <tr role="row">
                                        <th bgcolor="#f0f0f0" class="fit align-top text-left"
                                            style="width: 5px; color:#000">No.</th>
                                        <th bgcolor="#f0f0f0" class="align-top text-left"
                                            style="width: 20px; color:#000"> Nama Laporan EMP</th>
                                        <th bgcolor="#f0f0f0" class="align-top text-left"
                                            style="width: 20px; color:#000">Tarikh Kelulusan EMP</th>
                                        <th bgcolor="#f0f0f0" class="align-top text-left"
                                            style="width: 20px; color:#000">Nama Jururunding</th>


                                        <!-- <th bgcolor="#f0f0f0" class="align-top text-left" style="width: 20px; color:#000">Action</th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>CAROLIN SYMMONS</td>
                                        <td>93621285</td>
                                        <td>93621285</td>


                                    </tr>
                                </tbody>
                            </table>
                            <br>
                            <table class="table table-hover table-responsive dataTable no-footer display nowrap"
                                id="table" role="grid" aria-describedby="table_info">
                                <thead>
                                    <tr role="row">
                                        <th bgcolor="#f0f0f0" class="fit align-top text-left"
                                            style="width: 5px; color:#000">No.</th>
                                        <th bgcolor="#f0f0f0" class="align-top text-left"
                                            style="width: 20px; color:#000">Nama Dokumen LDP2M2</th>
                                        <th bgcolor="#f0f0f0" class="align-top text-left"
                                            style="width: 20px; color:#000">Tarikh Kelulusan LDP2M2</th>
                                        <th bgcolor="#f0f0f0" class="align-top text-left"
                                            style="width: 20px; color:#000">No Pelan</th>
                                        <th bgcolor="#f0f0f0" class="align-top text-left"
                                            style="width: 20px; color:#000">Dokumen</th>

                                        <!-- <th bgcolor="#f0f0f0" class="align-top text-left" style="width: 20px; color:#000">Action</th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>CAROLIN SYMMONS</td>
                                        <td>93621285</td>
                                        <td>ehheheh</td>
                                        <td><span style="text-align:center;font-size:12px padding-bottom:5px"" class="
                                                label label-lg label-light-blue label-inline">muat turun</span></td>

                                    </tr>
                                </tbody>
                            </table>
                            <br><br>



                            <div class="form-group-attached m-b-10">
                                <div class="form-group row">
                                    <label for="name" id="susun" class="col-md-3 control-label">
                                        <b>Pelan Susunatur :</b>

                                    </label>
                                    <div class="col-md-8">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="inlineRadioOptions"
                                                id="inlineRadio1" value="option1"> <label>diluluskan</label>

                                        </div>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="inlineRadioOptions"
                                                id="inlineRadio2" value="option2"> <label>belum diluluskan</label>

                                        </div>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group form-group-default">

                                            <label>
                                                <span><b class="text-dark">Tarikh Kelulusan</b></span>
                                            <i class="fa fa-calendar"></i></label>
                                            <input id="" class="form-control datepicker " name="" placeholder=""
                                                required="" type="" value="">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group form-group-default">
                                            <label>
                                                <span><b class="text-dark">No.Rujukan</b></span>
                                            </label>
                                            <input class="form-control form-control-lg" type="text" placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group form-group-default">
                                            <label>
                                                <span><b class="text-dark">No.Pelan</b></span>
                                            </label>
                                            <input class="form-control form-control-lg" type="text" placeholder="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="form-group-attached m-b-10">
                                <div class="form-group row">
                                    <label for="name" id="susun" class="col-md-3 control-label">
                                        <b>Pelan KerjaTanah:
                                        </b>
                                    </label>
                                    <div class="col-md-9">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="inlineRadioOptions"
                                                id="inlineRadio1" value="option1"> <label>diluluskan</label>

                                        </div>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="inlineRadioOptions"
                                                id="inlineRadio2" value="option2"> <label>belum diluluskan</label>

                                        </div>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group form-group-default">

                                            <label>
                                                <span><b class="text-dark">Tarikh Kelulusan</b></span>
                                            <i class="fa fa-calendar"></i></label>
                                            <input id="" class="form-control datepicker " name="" placeholder=""
                                                required="" type="" value="">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group form-group-default">
                                            <label>
                                                <span><b class="text-dark">No.Rujukan</b></span>
                                            </label>
                                            <input class="form-control form-control-lg" type="text" placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group form-group-default">
                                            <label>
                                                <span><b class="text-dark">No.Pelan</b></span>
                                            </label>
                                            <input class="form-control form-control-lg" type="text" placeholder="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br><br><br>
                            <label
                                style="margin-left: 10px;margin-top: 6px; font-size:11.5px;font-family: 'Montserrat'; color:red">*Tekan
                                butang tambah
                                untuk tambah Pelan Kawalan: Hakisan dan Kelodakan (ESCP)</label>
                            {{-- <a
                                class="dt-button buttons-html5 btn btn-default btn-sm pull-right" tabindex="-1"
                                aria-controls="table" type="button" onclick="" style="" data-toggle="modal"
                                id="addBusOwnerModalBtn" data-target="#exampleModal"><span> <i class="fa fa-plus"></i>
                                    Add New</span></a> --}}
                            <button type="button" class="dt-button buttons-html5 btn btn-default btn-sm pull-right"
                                data-toggle="modal" data-target=".bd-example-modal-lg"><span> <i class="fa fa-plus"></i>
                                    ESCP</span></button>

                            <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog"
                                aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="addModalTitle"> Tambah <b>ESCP</b></h5>
                                            <small class="text-muted">Isi dan pilih maklumat yang berkaitan.</small>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <div class="modal-body m-t-20">
                                            <form id="form-bayaranfilemmodaladd" role="form" method="post" action=""
                                                class="has-validation-callback">
                                                <div id="add_message_1"></div>
                                                <div class="row">

                                                    <div class="form-group form-group-default">
                                                        <label>
                                                            <span><b class="text-dark">NAMA</b></span>
                                                        </label>
                                                        <input class="form-control form-control-lg" type="text"
                                                            placeholder="">
                                                    </div>

                                                </div>
                                                <div class="row">
                                                    <label style="font-family: 'Montserrat'; font-size:12px">PELAN
                                                        KAWASAN HAKISAN DAN KELODAKAN(ESCP)</label>
                                                    <div class="radio radio-success">
                                                        <input type="radio" value="35mm" name="format" id="35mm"
                                                            checked="checked">
                                                        <label for="35mm">DILULUSKAN</label>
                                                        <input type="radio" value="16mm" name="format" id="16mm">
                                                        <label for="16mm">BELUM DILULUSKAN</label>

                                                    </div>
                                                </div>
                                                <div class="form-group-attached m-b-12">


                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group form-group-default">
                                                                <div class="form-input-group">
                                                                    <label>
                                                                        <label>Tarikh Kelulusan</label>
                                                                        <i style="cursor: help; color: #48B0F7;"
                                                                            class="fa fa-question-circle info_ "
                                                                            data-html="true" data-toggle="tooltip"
                                                                            title=""
                                                                            data-original-title="Yang dikeluarkan oleh perbadanan"></i>
                                                                    </label>
                                                                    <input id="" class="form-control datepicker "
                                                                        name="" placeholder="" required="" type=""
                                                                        value="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group form-group-default">
                                                                <label>
                                                                    <span><b class="text-dark">No.Rujukan</b></span>
                                                                </label>
                                                                <input class="form-control form-control-lg" type="text"
                                                                    placeholder="">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group form-group-default">
                                                                <label>
                                                                    <span><b class="text-dark">No.Pelan</b></span>
                                                                </label>
                                                                <input class="form-control form-control-lg" type="text"
                                                                    placeholder="">
                                                            </div>
                                                        </div>





                                                    </div>

                                                </div>
                                                <br>



                                                <br><br>
                                            </form>

                                        </div>
                                        <div class="modal-footer">

                                            <!-- <button type="button" class="btn btn-info" onclick="submitForm('form-decision')"><i class="fa fa-check m-r-5"></i> Submit</button> -->
                                            <button type="button" class="btn btn-success"
                                                id="btnSubmit-bayaranfilemmodaladd" onclick=""></i>Simpan</button>

                                        </div>
                                    </div>
                                </div>
                            </div>



                        </div>



                        <div class="col-md-6">

                            <!-- Check this box if Registered Address and Correspondence Address are the same -->


                            <label>
                                <span><b class="text-dark">MAKLUMAT PENGGERAK PROJEK</b></span>
                            </label>
                            <div class="form-group-attached m-b-10">



                                <div class="row">
                                    <div class="col-md-12">

                                        <div class="form-group form-group-default">
                                            <label>
                                                <span><b class="text-dark">Nama Pengerak Projek</b></span> <span
                                                    style="color:red;">*</span>
                                            </label>

                                            <input class="form-control form-control-lg" type="text" placeholder="">
                                        </div>

                                    </div>
                                </div>

                                <div class="row">

                                    <div class="form-group form-group-default">
                                        <label>
                                            <span><b class="text-dark">Alamat Pengerak Projek</b></span><span
                                                style="color:red;">*</span>
                                        </label>
                                        <input class="form-control form-control-lg" type="text" placeholder="">
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-md-12">

                                        <div class="form-group form-group-default">
                                            <label>
                                                <span><b class="text-dark">Alamat Pengerak Projek 2</b></span>
                                            </label>
                                            <input class="form-control form-control-lg" type="text" placeholder="">
                                        </div>

                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">

                                        <div class="form-group form-group-default">
                                            <label>
                                                <span><b class="text-dark">Alamat Pengerak Projek 3</b></span>
                                            </label>
                                            <input class="form-control form-control-lg" type="text" placeholder="">
                                        </div>

                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group form-group-default">
                                            <label>
                                                <span><b class="text-dark">Poskod</b></span><span
                                                    style="color:red;">*</span>
                                            </label>
                                            <input class="form-control form-control-lg" type="text" placeholder="">
                                        </div>



                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group form-group-default">
                                            <label>
                                                <span><b class="text-dark">Negeri</b></span><span
                                                    style="color:red;">*</span>
                                            </label>
                                            <input class="form-control form-control-lg" type="text" placeholder="">
                                        </div>


                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">

                                        <div class="form-group form-group-default">
                                            <label>
                                                <span><b class="text-dark">Daerah</b></span>
                                            </label>
                                            <input class="form-control form-control-lg" type="text" placeholder="">
                                        </div>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group form-group-default">
                                            <label>
                                                <span><b class="text-dark">No.Tel</b></span><span
                                                    style="color:red;">*</span>
                                            </label>
                                            <input class="form-control form-control-lg" type="text" placeholder="">
                                        </div>



                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group form-group-default">
                                            <label>
                                                <span><b class="text-dark">No Faks</b></span>
                                            </label>
                                            <input class="form-control form-control-lg" type="text" placeholder="">
                                        </div>


                                    </div>
                                </div>



                            </div>

                            <br>
                            <div class="checkbox check-primary">
                                <input name="usbu_email_checker" value="1" id="usbu_email_checker" type="checkbox"
                                    class="hidden">
                                <label for="usbu_email_checker">PERTUKARAN HAK MILIK PENGURUSAN</label>
                                <!-- <i style="cursor: help; color: #48B0F7;" class="fa fa-question-circle info_ " data-html="true" data-toggle="tooltip" title="This email will be use to send verification and confirmation once approved by officer"></i> -->
                            </div>
                            <div class="form-group-attached m-b-10">
                                <!-- <div class="row">
                                    <div class="col-md-12">

                                        <div class="form-group form-group-default">
                                            <label>
                                                <span><b class="text-dark">Nama Projek</b></span> <span
                                                    style="color:red;">*</span>
                                            </label>

                                            <input class="form-control form-control-lg" type="text" placeholder="">
                                        </div>

                                    </div>
                                </div> -->

                                <div class="row">

                                    <div class="form-group form-group-default">
                                        <label>
                                            <span><b class="text-dark">Alamat Tapak</b></span><span
                                                style="color:red;">*</span>
                                        </label>
                                        <input class="form-control form-control-lg" type="text" placeholder="">
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-md-12">

                                        <div class="form-group form-group-default">
                                            <label>
                                                <span><b class="text-dark">Alamat Tapak baris 2</b></span>
                                            </label>
                                            <input class="form-control form-control-lg" type="text" placeholder="">
                                        </div>

                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">

                                        <div class="form-group form-group-default">
                                            <label>
                                                <span><b class="text-dark">Alamat Tapak baris 3</b></span>
                                            </label>
                                            <input class="form-control form-control-lg" type="text" placeholder="">
                                        </div>

                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group form-group-default">
                                            <label>
                                                <span><b class="text-dark">Poskod</b></span><span
                                                    style="color:red;">*</span>
                                            </label>
                                            <input class="form-control form-control-lg" type="text" placeholder="">
                                        </div>



                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group form-group-default">
                                            <label>
                                                <span><b class="text-dark">Negeri</b></span><span
                                                    style="color:red;">*</span>
                                            </label>
                                            <input class="form-control form-control-lg" type="text" placeholder="">
                                        </div>


                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">

                                        <div class="form-group form-group-default">
                                            <label>
                                                <span><b class="text-dark">Daerah</b></span>
                                            </label>
                                            <input class="form-control form-control-lg" type="text" placeholder="">
                                        </div>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group form-group-default">
                                            <label>
                                                <span><b class="text-dark">No.Tel</b></span><span
                                                    style="color:red;">*</span>
                                            </label>
                                            <input class="form-control form-control-lg" type="text" placeholder="">
                                        </div>



                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group form-group-default">
                                            <label>
                                                <span><b class="text-dark">No Faks</b></span>
                                            </label>
                                            <input class="form-control form-control-lg" type="text" placeholder="">
                                        </div>


                                    </div>
                                </div>




                            </div>
                        </div>
                    </div>
                    <br>
                    <table class="table table-hover table-responsive dataTable no-footer display nowrap" id="table"
                        role="grid" aria-describedby="table_info">
                        <thead>
                            <tr role="row">
                                <th bgcolor="#f0f0f0" class="fit align-top text-left" style="width: 5px; color:#000">No.
                                </th>
                                <th bgcolor="#f0f0f0" class="align-top text-left" style="width: 20px; color:#000"> Nama
                                </th>
                                <th bgcolor="#f0f0f0" class="align-top text-left" style="width: 20px; color:#000">Status
                                </th>
                                <th bgcolor="#f0f0f0" class="align-top text-left" style="width: 20px; color:#000">Tarikh
                                    Kelulusan</th>
                                <th bgcolor="#f0f0f0" class="align-top text-left" style="width: 20px; color:#000">
                                    No.Rujukan</th>
                                <th bgcolor="#f0f0f0" class="align-top text-left" style="width: 20px; color:#000">No
                                    Pelan</th>
                                <th bgcolor="#f0f0f0" class="align-top text-left" style="width: 20px; color:#000">
                                    Tindakan</th>

                                <!-- <th bgcolor="#f0f0f0" class="align-top text-left" style="width: 20px; color:#000">Action</th> -->
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>CAROLIN SYMMONS</td>
                                <td>93621285</td>
                                <td>ehheheh</td>
                                <td>ehheheh</td>
                                <td>ehheheh</td>
                                <td><span style="text-align:center;font-size:12px padding-bottom:5px"" class=" label
                                        label-lg label-light-danger label-inline">PADAM</span></td>


                            </tr>
                        </tbody>
                    </table>
                    <br>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="alert alert-primary" role="alert"
                                    style="background-color: #563D7C;color:white; font-size:11.5px; font-family: 'Montserrat'">
                                    <strong>

                                        STATUS KEMAJUAN KERJA PROJEK
                                    </strong>
                                </div>

                                <div class="form-check form-check-inline" style="margin-bottom:0px">
                                    <div class="checkbox check-primary">
                                        <input name="usbu_email_checker" value="1" id="usbu_email_checker"
                                            type="checkbox" class="hidden">
                                        <label for="usbu_email_checker">BELUM DIMULAKAN</label>
                                        <!-- <i style="cursor: help; color: #48B0F7;" class="fa fa-question-circle info_ " data-html="true" data-toggle="tooltip" title="This email will be use to send verification and confirmation once approved by officer"></i> -->
                                    </div>
                                </div>
                                <div class="form-check form-check-inline" style="">
                                    <div class="checkbox check-primary">
                                        <input name="usbu_email_checker" value="1" id="usbu_email_checker"
                                            type="checkbox" class="hidden">
                                        <label for="usbu_email_checker">KERJA TANAH</label>
                                        <!-- <i style="cursor: help; color: #48B0F7;" class="fa fa-question-circle info_ " data-html="true" data-toggle="tooltip" title="This email will be use to send verification and confirmation once approved by officer"></i> -->
                                    </div>
                                </div>
                                <div class="form-check form-check-inline" style="">
                                    <div class="checkbox check-primary">
                                        <input name="usbu_email_checker" value="1" id="usbu_email_checker"
                                            type="checkbox" class="hidden">
                                        <label for="usbu_email_checker">PEMBINAAN</label>
                                        <!-- <i style="cursor: help; color: #48B0F7;" class="fa fa-question-circle info_ " data-html="true" data-toggle="tooltip" title="This email will be use to send verification and confirmation once approved by officer"></i> -->
                                    </div>
                                </div>
                                <div class="form-check form-check-inline" style="">
                                    <div class="checkbox check-primary">
                                        <input name="usbu_email_checker" value="1" id="usbu_email_checker"
                                            type="checkbox" class="hidden">
                                        <label for="usbu_email_checker">OPERASI</label>
                                        <!-- <i style="cursor: help; color: #48B0F7;" class="fa fa-question-circle info_ " data-html="true" data-toggle="tooltip" title="This email will be use to send verification and confirmation once approved by officer"></i> -->
                                    </div>
                                </div>
                                <div class="form-check form-check-inline" style="">
                                    <div class="checkbox check-primary">
                                        <input name="usbu_email_checker" value="1" id="usbu_email_checker"
                                            type="checkbox" class="hidden">
                                        <label for="usbu_email_checker">SIAP</label>
                                        <!-- <i style="cursor: help; color: #48B0F7;" class="fa fa-question-circle info_ " data-html="true" data-toggle="tooltip" title="This email will be use to send verification and confirmation once approved by officer"></i> -->
                                    </div>
                                </div>
                                <div class="form-check form-check-inline" style="">
                                    <div class="checkbox check-primary">
                                        <input name="usbu_email_checker" value="1" id="usbu_email_checker"
                                            type="checkbox" class="hidden">
                                        <label for="usbu_email_checker">TANGGUH</label>
                                        <!-- <i style="cursor: help; color: #48B0F7;" class="fa fa-question-circle info_ " data-html="true" data-toggle="tooltip" title="This email will be use to send verification and confirmation once approved by officer"></i> -->
                                    </div>
                                </div>
                                <div class="form-check form-check-inline" style="">
                                    <div class="checkbox check-primary">
                                        <input name="usbu_email_checker" value="1" id="usbu_email_checker"
                                            type="checkbox" class="hidden">
                                        <label for="usbu_email_checker">TERBENGKALAI</label>
                                        <!-- <i style="cursor: help; color: #48B0F7;" class="fa fa-question-circle info_ " data-html="true" data-toggle="tooltip" title="This email will be use to send verification and confirmation once approved by officer"></i> -->
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">

                                        <div class="form-group form-group-default">
                                            <div class="form-input-group">
                                                <label>
                                                    <label>
                                                        <span id="label_">Tarikh Awal</span>
                                                        <i class="fa fa-calendar"></i></label>
                                                    <input id="" class="form-control datepicker " name="" placeholder=""
                                                        required="" type="" value="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group form-group-default">
                                            <div class="form-input-group">
                                                <label>
                                                    <span id="label_">Tarikh AKhir</span>
                                                    <i class="fa fa-calendar"></i></label>
                                                <input id="" class="form-control datepicker " name="" placeholder=""
                                                    required="" type="" value="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group form-group-default">
                                            <label>
                                                <span><b class="text-dark">Peratus (%)</b></span>
                                            </label>
                                            <input class="form-control form-control-lg" type="text" placeholder="">
                                        </div>
                                    </div>
                                </div>



                            </div>

                        </div>
                        
                            {{--<button type="button" class="dt-button buttons-html5 btn btn-default btn-sm pull-right"
                                data-toggle="modal" data-target=".bd-example-modal-lg1"><span> <i
                                        class="fa fa-plus"></i>
                                    FASA</span></button>

                            <div class="modal fade bd-example-modal-lg1" tabindex="-1" role="dialog"
                                aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="addModalTitle"> Tambah</h5>
                                            <small class="text-muted">Isi dan pilih maklumat yang berkaitan.</small>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <div class="modal-body m-t-20">
                                            <form id="form-bayaranfilemmodaladd" role="form" method="post" action=""
                                                class="has-validation-callback">
                                                <div id="add_message_1"></div>
                                                <div class="row">

                                                    <div class="form-group form-group-default">
                                                        <label>
                                                            <span><b class="text-dark">NAMA FASA</b></span>
                                                        </label>
                                                        <input class="form-control form-control-lg" type="text"
                                                            placeholder="">
                                                    </div>

                                                </div>
                                                <div class="form-group-attached m-b-12">


                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group form-group-default">
                                                                <div class="form-input-group">
                                                                    <label>
                                                                        <span id="label_">Tarikh Mula</span>
                                                                        <i class="fa fa-calendar"></i> </label>
                                                                    <input id="" class="form-control datepicker "
                                                                        name="" placeholder="" required="" type=""
                                                                        value="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group form-group-default">
                                                                <div class="form-input-group">
                                                                    <label>
                                                                        <span id="label_">Tarikh AKhir</span>
                                                                        <i class="fa fa-calendar"></i></label>
                                                                    <input id="" class="form-control datepicker "
                                                                        name="" placeholder="" required="" type=""
                                                                        value="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group form-group-default">
                                                                <label>
                                                                    <span><b class="text-dark">Peratus (%)</b></span>
                                                                </label>
                                                                <input class="form-control form-control-lg" type="text"
                                                                    placeholder="">
                                                            </div>
                                                        </div>





                                                    </div>

                                                </div>
                                                <br>
                                                <label style="font-size:13px; font-family: 'Montserrat'">Jadual
                                                    Perlaksanaan
                                                    Projek</label>
                                                <div class="input-group file-caption-main">
                                                    <div class="file-caption form-control  kv-fileinput-caption icon-visible"
                                                        tabindex="500">
                                                        <span class="file-caption-icon"><i
                                                                class="fa fa-file kv-caption-icon"></i> </span>

                                                    </div>
                                                    <div class="input-group-btn input-group-append">

                                                        <div tabindex="500" class="btn btn-primary btn-file"><i
                                                                class="fa fa-folder-open"></i> <span
                                                                class="hidden-xs">Muat Naik</span><input
                                                                id="input-ke-salinan" name="input-ke-salinan[]"
                                                                type="file" multiple=""></div>
                                                    </div>
                                                </div>
                                                <br>
                                                <label style="font-size:13px; font-family: 'Montserrat'">Sertakan gambar
                                                    foto yang menunjukkan status projek</label>
                                                <div class="input-group file-caption-main">
                                                    <div class="file-caption form-control  kv-fileinput-caption icon-visible"
                                                        tabindex="500">
                                                        <span class="file-caption-icon"><i
                                                                class="fa fa-file kv-caption-icon"></i> </span>

                                                    </div>
                                                    <div class="input-group-btn input-group-append">

                                                        <div tabindex="500" class="btn btn-primary btn-file"><i
                                                                class="fa fa-folder-open"></i> <span
                                                                class="hidden-xs">MuatNaik</span><input
                                                                id="input-ke-salinan" name="input-ke-salinan[]"
                                                                type="file" multiple=""></div>
                                                    </div>
                                                </div>
                                                <br><br>
                                            </form>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                            <!-- <button type="button" class="btn btn-info" onclick="submitForm('form-decision')"><i class="fa fa-check m-r-5"></i> Submit</button> -->
                                            <button type="button" class="btn btn-success"
                                                id="btnSubmit-bayaranfilemmodaladd" onclick=""><i
                                                    class="fa fa-check m-r-5"></i> Submit</button>

                                        </div>
                                    </div>

                                </div>
                            </div>
                            </div> --}}
                        <div class="col-md-12">
                                <div class="alert alert-primary" role="alert"
                                    style="background-color: #563D7C;color:white ;font-size:11.5px; font-family: 'Montserrat'">
                                    <strong>
    
                                        FASA
                                    </strong>
    
                                </div>
                            <br>
                            <table class="table table-hover table-responsive dataTable no-footer display nowrap"
                                id="table" role="grid" aria-describedby="table_info" >
                                <thead>
                                    <tr role="row">
                                        <th bgcolor="#f0f0f0" class="fit align-top text-left"
                                            style="width: 5px; color:#000">No.
                                        </th>
                                        <th bgcolor="#f0f0f0" class="align-top text-left"
                                            style="width: 20px; color:#000"> Nama
                                        </th>
                                        <th bgcolor="#f0f0f0" class="align-top text-left"
                                            style="width: 20px; color:#000">Tarikh Mula
                                        </th>
                                        <th bgcolor="#f0f0f0" class="align-top text-left"
                                            style="width: 20px; color:#000">Tarikh
                                            Akhir</th>
                                        <th bgcolor="#f0f0f0" class="align-top text-left"
                                            style="width: 20px; color:#000">
                                            Peratus (%)</th>
                                            <th bgcolor="#f0f0f0" class="align-top text-left"
                                            style="width: 20px; color:#000">
                                           Status Kemajuan</th>
                                        <th bgcolor="#f0f0f0" class="align-top text-left"
                                            style="width: 20px; color:#000">Jadual</th>
                                        <th bgcolor="#f0f0f0" class="align-top text-left"
                                            style="width: 20px; color:#000">
                                            Gambar</th>
                                            <th bgcolor="#f0f0f0" class="align-top text-left"
                                            style="width: 20px; color:#000">
                                            Tindakan</th>

                                        <!-- <th bgcolor="#f0f0f0" class="align-top text-left" style="width: 20px; color:#000">Action</th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Fasa 1</td>
                                        <td>93621285</td>
                                        <td>93621285</td>
                                        
                                        <td><input type="number" class="form-control input-radius-all border border-default" value=""></td>
                                        <td> <select id="selectrequired" class="select-normal full-width"
                                            required="" data-error-msg="Silih pilih cara penerbitan."
                                            style="border: none">
                                            <option selected=""></option>
                                            <option value="belumdimulakan">BELUM DIMULAKAN</option>
                                            <option value="kerjatanah">KERJA TANAH</option>
                                            <option value="kerjatanah">PEMBINAAN</option>
                                            <option value="kerjatanah">OPERASI</option>
                                            <option value="kerjatanah">SIAP</option>
                                            <option value="kerjatanah">TANGGUH</option>
                                            <option value="kerjatanah">TERBENGKALAI</option>
                                        </select></td>
                                        <td><span style="text-align:center;font-size:12px padding-bottom:5px"" class="
                                                label label-lg label-light-blue label-inline">muat turun</span></td>
                                        <td><span style="text-align:center;font-size:12px padding-bottom:5px"" class="
                                                label label-lg label-light-blue label-inline">muat turun</span></td>
                                                <td>
                                                    <a data-toggle="tooltip" title="" class="btn btn-default btn-xs" style="" type="button" onclick=""><span style="color:#fff"> <i class="fas fa-edit text-warning"></i></span>
                                                    </a>
                                                    <a data-toggle="tooltip" title="" class="btn btn-default btn-xs" style="" type="button" onclick=""><span style="color:#fff"> <i class="far fa-save text-success"></i></span>
                                                    </a>
                                                </td>


                                    </tr>
                                </tbody>
                            </table>

                       


                    </div>
                </div>
                    <br><br>
                    <div class="form-group form-group-default  dim">
                        <label style="font-size:13px; font-family: 'Montserrat' ">
                            <span id="label_checkbox_declaration_in_modal">Perakuan</span>
                        </label>
                        <div class="checkbox check-primary ">
                            <input name="checkbox_declaration_in_modal_1" value="2" id="checkbox_declaration_in_modal_1"
                                onclick="handleClick()" type="checkbox">
                            <label style="font-size:13px; font-family: 'Montserrat' "
                                for="checkbox_declaration_in_modal_1">DENGAN INI SAYA MENGAKU DAN MENGESAHKAN SEMUA
                                KENYATAAN DAN BUTIR-BUTIR YANG DIKEMUKAKAN ADALAH BENAR.</label>
                        </div>
                    </div>

                    <div class="col-md-12 p-t-20">
                        <ul class="pager wizard no-style">
                            <li class="submit">
                                <button onclick="submitForm('form-add')"
                                    class="btn btn-info btn-cons from-left pull-right" id="simpan" type="button">
                                    <span>Simpan</span>
                                </button>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<br>




<div class="row">
    <div class="col-md-6">
        <span class="bold"
            style="color:#000; font-family: 'Montserrat'; font-size: 10.5px; text-transform: uppercase; font-weight: 500;">
            Senarai Stesen
        </span>
    </div>
    <div class="col-md-6">
        <span class="float-right">

            <a id="form-modal" href="" data-toggle="modal" data-target="#exampleModalCenter-modal-xl" title=""
                class="btn btn-default btn-xs" style="" type="button" onclick="">
                <span
                    style="color:#000; font-family: 'Montserrat'; font-size: 10.5px; text-transform: uppercase; font-weight: 500;">
                    <i class="fa fa-plus text-success"></i> &nbsp; <span style="color:blue;">STESEN</span>
                </span>
            </a>
        </span>
        <!-- Modal -->
        <div class="modal fade" id="exampleModalCenter-modal-xl" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addModalTitle"> Tambah <b>STESEN</b></h5>
                        <small class="text-muted">Isi dan pilih maklumat yang berkaitan.</small>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body m-t-20">
                        <div class="row">
                            <div class="col-md-6">

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group required form-group-default">
                                            <label class="" for="">
                                                <i class="fal fa-file fa-lg"></i>
                                                &nbsp; NAMA STESEN
                                                <span class="text-danger" style="font-size:14px">*</span>
                                            </label>
                                            <input class="form-control form-control-lg" type="text" placeholder="">

                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <a onclick="openPopup()" class="btn btn-default-focus btn-xs m-t-5 "><i
                                                        class="fa fa-search mr-1"></i>Cari</a>

                                            </div>
                                        </div>


                                        <div class="form-group-attached m-b-10">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group form-group-default">
                                                        <label>
                                                            <span><b class="text-dark">Latitud</b></span><span
                                                                style="color:red;">*</span>
                                                        </label>
                                                        <input class="form-control form-control-lg" type="text"
                                                            placeholder="">
                                                    </div>



                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group form-group-default">
                                                        <label>
                                                            <span><b class="text-dark">Longitude</b></span><span
                                                                style="color:red;">*</span>
                                                        </label>
                                                        <input class="form-control form-control-lg" type="text"
                                                            placeholder="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group form-group-default">
                                                        <label>
                                                            <span><b class="text-dark">Lembangan</b></span><span
                                                                style="color:red;">*</span>
                                                        </label>
                                                        <select id="selectrequired" class="select-normal full-width"
                                                            required="" data-error-msg="Silih pilih cara penerbitan."
                                                            style="border: none">
                                                            <option selected=""></option>
                                                            <option value="sendiri">Sendiri</option>
                                                            <option value="usahasama">Usahasama</option>
                                                        </select>
                                                    </div>



                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group form-group-default">
                                                        <label>
                                                            <span><b class="text-dark">Sungai</b></span><span
                                                                style="color:red;">*</span>
                                                        </label>
                                                        <select id="selectrequired" class="select-normal full-width"
                                                            required="" data-error-msg="Silih pilih cara penerbitan."
                                                            style="border: none">
                                                            <option selected=""></option>
                                                            <option value="sendiri">Sendiri</option>
                                                            <option value="usahasama">Usahasama</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group form-group-default">
                                                        <label>
                                                            <span><b class="text-dark">Kategori</b></span><span
                                                                style="color:red;">*</span>
                                                        </label>
                                                        <select id="selectrequired" class="select-normal full-width"
                                                            required="" data-error-msg="Silih pilih cara penerbitan."
                                                            style="border: none">
                                                            <option selected=""></option>
                                                            <option value="sendiri">Sendiri</option>
                                                            <option value="usahasama">Usahasama</option>
                                                        </select>
                                                    </div>


                                                </div>
                                            </div>
                                           

                                        </div>
                                        <div class="col-md-12">

                                            <div class="form-group row">
                                                <label class="col-md-3 m-t-15 control-label">Bacaan Garis Dasar
                                                </label>
                                                <div class="checkbox check-primary">
                                                    <input name="is_eia" value="1" id="is_eia" type="checkbox"
                                                        class="hidden is_eia" aria-required="true" checked="">
                                                    <label for="is_eia">Peringkat EIA<span
                                                            style="color:red;">*</span></label>
                                                    <input name="is_emp" value="1" id="is_emp" type="checkbox"
                                                        class="hidden is_emp">
                                                    <label for="is_emp">Peringkat EMP</label>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group form-group-default input-group" id="date_eia"
                                                    style="display: block;">
                                                    <div class="form-input-group">
                                                        <label>Tarikh Pengawasan (EIA)</label>
                                                        <input class="form-control" name="date_eia" type="date"
                                                            value="" required="">
                                                    </div>

                                                </div>


                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </div>

                            <div class="col-md-6">

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="dashTitle">Maklumat Parameter</div>
                                        <label>Standard merujuk kepada National Water Quality Standards</label>

                                        <table class="" id="table" role="grid" aria-describedby="table_info"
                                            border="1px" style="padding:10px;">
                                            <thead>
                                                <tr role="row">
                                                    <th bgcolor="#" class=" th-stesen align-top text-center"
                                                        style="width:2%; vertical-align:top; color:#">BIL.</th>
                                                    <th bgcolor="#" class="align-top text-center"
                                                        style="width:10%; vertical-align:top; color:#">PARAMETER
                                                    </th>
                                                    <th bgcolor="#" class="align-top text-center"
                                                        style="width:10%; vertical-align:top; color:#">UNIT</th>
                                                    <th bgcolor="#" class="align-top text-center"
                                                        style="width:10%; vertical-align:top; color:#">STANDARD<br></th>
                                                    <th bgcolor="#" class="align-top text-center"
                                                        style="width:10%; vertical-align:top; color:#">DATA BASELINE
                                                        (EIA)
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="align-middle text-center">1</td>
                                                    <td class="align-middle text-center">

                                                        Ammoniacal Nitrogen
                                                        <span style="color:red;">*</span></small>
                                                    </td>
                                                    <td class="align-middle text-center">mg/L</td>
                                                    <td class="align-middle text-center">-</td>
                                                    <td class="align-middle text-center"><input class="form-control"
                                                            name="baselineeia56" id="baselineeia56" value=""></td>
                                                </tr>
                                                <tr>
                                                    <td class="align-middle text-center">2</td>
                                                    <td class="align-middle text-center">
                                                        Biochemical Oxygen Demand
                                                        <span style="color:red;">*</span>
                                                    </td>
                                                    <td class="align-middle text-center">mg/L</td>
                                                    <td class="align-middle text-center">-</td>
                                                    <td class="align-middle text-center"><input class="form-control"
                                                            name="baselineeia56" id="baselineeia56" value=""></td>
                                                </tr>
                                                <tr>
                                                    <td class="align-middle text-center">3</td>
                                                    <td class="align-middle text-center">

                                                        Chemical Oxygen Demand
                                                        <span style="color:red;">*</span></small>
                                                    </td>
                                                    <td class="align-middle text-center">mg/L</td>
                                                    <td class="align-middle text-center">-</td>
                                                    <td class="align-middle text-center"><input class="form-control"
                                                            name="baselineeia56" id="baselineeia56" value=""></td>
                                                </tr>
                                                <tr>
                                                    <td class="align-middle text-center">4</td>
                                                    <td class="align-middle text-center">

                                                        Dissolved Oxygen
                                                        <span style="color:red;">*</span></small>
                                                    </td>
                                                    <td class="align-middle text-center">mg/L</td>
                                                    <td class="align-middle text-center">-</td>
                                                    <td class="align-middle text-center"><input class="form-control"
                                                            name="baselineeia56" id="baselineeia56" value=""></td>
                                                </tr>
                                                <tr>
                                                    <td class="align-middle text-center">5</td>
                                                    <td class="align-middle text-center">

                                                        pH
                                                        <span style="color:red;">*</span></small>
                                                    </td>
                                                    <td class="align-middle text-center">mg/L</td>
                                                    <td class="align-middle text-center">-</td>
                                                    <td class="align-middle text-center"><input class="form-control"
                                                            name="baselineeia56" id="baselineeia56" value=""></td>
                                                </tr>
                                                <tr>
                                                    <td class="align-middle text-center">6</td>
                                                    <td class="align-middle text-center">

                                                        Total Suspended Solid *
                                                        <span style="color:red;">*</span></small>
                                                    </td>
                                                    <td class="align-middle text-center">mg/L</td>
                                                    <td class="align-middle text-center">-</td>
                                                    <td class="align-middle text-center"><input class="form-control"
                                                            name="baselineeia56" id="baselineeia56" value=""></td>
                                                </tr>
                                            </tbody>
                                        </table>

                                        
                                    </div>
                                    
                                        <div class="col-md-12">
                                            <br>
                                                <label style="font-size:13px; font-family: 'Montserrat'"><b>GAMBAR STESEN</b></label>
                                                <div class="input-group file-caption-main">
                                                    <div class="file-caption form-control  kv-fileinput-caption icon-visible"
                                                        tabindex="500">
                                                        <span class="file-caption-icon"><i
                                                                class="fa fa-file kv-caption-icon"></i> </span>

                                                    </div>
                                                    <div class="input-group-btn input-group-append">

                                                        <div tabindex="500" class="btn btn-primary btn-file"><i
                                                                class="fa fa-folder-open"></i> <span
                                                                class="hidden-xs">Muat Naik..</span><input
                                                                id="input-ke-salinan" name="input-ke-salinan[]"
                                                                type="file" multiple=""></div>
                                                    </div>
                                                </div>


                                        </div>
                                    
                                </div>

                            </div>
                            

                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="dashTitle"><span
                                    style="color:red;">*</span><b>Rujukan</b></div>
                               <br>
                                <table class="" id="table" role="grid" aria-describedby="table_info"
                                    border="1px" style="padding:10px;">
                                    <thead>
                                        <tr role="row">
                                            <th bgcolor="#" class="align-top text-center"
                                                style="width:2%; vertical-align:top; color:#">KELAS</th>
                                            <th bgcolor="#" class="align-top text-center"
                                                style="width:10%; vertical-align:top; color:#">KEGUNAAN
                                            </th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="align-middle text-center"> CLASS I </td>
                                            <td>
                                                CONSERVATION OF NATURAL ENVIRONMENT
                                                WATER SUPPLY I - PRACTICALLY NO TREATMENT NECESSARY
                                                FISHERY I - VERY SENSITIVE AQUATIC SPECIES
                                            </td>
                                           
                                        </tr>
                                        <tr>
                                            <td class="align-middle text-center"> CLASS IIA</td>
                                            <td>
                                                WATER SUPPLY II - CONVENTIONAL TREATMENT REQUIRED
                                                FISHERY II - SENSITIVE AQUATIC SPECIES
                                            </td>
                                           
                                        </tr>
                                        <tr>
                                            <td class="align-middle text-center">CLASS IIB</td>
                                            <td>
                                                RECREATIONAL ISE WITH BODY CONTACT
                                            </td>
                                           
                                        </tr>
                                        <tr>
                                            <td class="align-middle text-center">CLASS III</td>
                                            <td>
                                                WATER SUPPLY III - EXTENSIVE TREATMENT REQUIRED
                                                FISHERY III - COMMON, OF ECONOMIC VALUE AND TOLERANT SPECIES; LIVESTOCK DRINKING
                                        </tr>
                                        <tr>
                                            <td class="align-middle text-center">CLASS IV</td>
                                            <td>
                                                IRRIGATION

                                            </td>
                                           
                                        </tr>
                                        <tr>
                                            <td class="align-middle text-center">CLASS V</td>
                                            <td>
                                                NONE OF THE ABOVE
                                            </td>
                                           
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success">Simpan</button>
                    </div>
                </div>
            </div>
        </div>


    </div>
    <br>
    <br>
    <div class="card card-transparent">
        <table class="" id="table" role="grid" aria-describedby="table_info" border="1px" style="padding:0px;">
            <thead>
                <tr role="row">
                    <th bgcolor="#" class="align-top text-center" style="width:2%; vertical-align:top; color:#">Bil
                    </th>
                    <th bgcolor="#" class="align-top text-center" style="width:10%; vertical-align:top; color:#">
                        Nama
                        Stesen</th>
                    <th bgcolor="#" class="align-top text-center" style="width:10%; vertical-align:top; color:#">
                        Latitude</th>
                    <th bgcolor="#" class="align-top text-center" style="width:10%; vertical-align:top; color:#">
                        Longitude</th>
                    <th bgcolor="#" class="align-top text-center" style="width:10%; vertical-align:top; color:#">
                        Gambar
                        Stesen</th>
                    <th bgcolor="#" class="align-top text-center" style="width:10%; vertical-align:top; color:#">
                        Tindakan</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="align-top text-center">1</td>
                    <td class="align-top text-center">Sungai</td>
                    <td class="align-top text-center">PENGELUARAN VIDEO</td>
                    <td class="align-top text-center">W.P KUALA LUMPUR</td>
                    <td class="align-top text-center">BANGSAR</td>
                    <td class="align-top text-center">
                        <a id="btn_view_pbaru" data-toggle="modal" data-target="#modal_view_pbaru" title=""
                            class="btn btn-default btn-xs" style="" type="button" onclick=""
                            data-original-title="Ubah Data Permohonan"><span style="color:#fff"> <i
                                    class="fa fa-pencil text-warning"></i></span></a>
                        <a id="" data-toggle="tooltip" title="" class="btn btn-default btn-xs btn_batal" style=""
                            type="button" onclick="" data-original-title="Pembatalan Permohonan"><span
                                style="color:#fff"> <i class="fas fa-trash text-danger"></i></span></a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

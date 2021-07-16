<style>
    label {
        font-family: 'Montserrat' !important;
        font-size: 10.5px !important;
    }

    .hidden-xs {
        font-family: 'Montserrat' !important;
        font-size: 10.5px !important;

    }

    .btn {
        font-family: 'Montserrat' !important;
        font-size: 10.5px !important;
        s
    }

    .dashTitle {
        font-family: 'Montserrat' !important;
        font-size: 12.5px !important;
        letter-spacing: 0.06em !important;
        /* text-transform: uppercase !important; */
        font-weight: 500 !important;

    }

    th {
        background-color: #ebe8ec;
        color: #000 !important;
        //border-top: none;
        font-family: 'Montserrat' !important;
        font-size: 10.5px !important;
        letter-spacing: 0.06em !important;
        text-transform: uppercase !important;
        font-weight: 500 !important;
        //border-left: none !important;
        padding: 4px;
    }

    td {
        //background-color: #ebe8ec;
        color: #000 !important;
        //border-top: none !important;
        //border-bottom: none !important;
        //border-top: 1px solid #E7E7E7;
        //border-left: 1px solid #E7E7E7;
        //border-bottom: none !important;
        //border-left: none !important;
        //border-right: none !important;
        font-family: 'Montserrat' !important;
        font-size: 10.5px !important;
        letter-spacing: 0.06em !important;
        text-transform: uppercase !important;
        //font-weight: 500 !important;
        padding: 4px;
        text-align: center !important;
    }

    .modal-lg1 {
        max-width: 50% !important;
        width: 50% !important;
        margin: 0 auto !important;
    }

    .title1 {
        font-weight: 500 !important;
        font-size: 14.5px !important;
        font-family: 'Montserrat' !important;
    }

</style>


<div class="row">
    <div class="col-md-12">
        <div class="title1"><b>MAKLUMAT AUDIT ALAM SEKELILING</b></div>
        <br>

        <div class="dashTitle"><b>Status Kemajuan</b>.</div>

        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <div class="checkbox check-primary">
                        <input type="checkbox" value="1" id="belumdimulakan">
                        <label for="belumdimulakan">BELUM DIMULAKAN</label>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <div class="checkbox check-primary">
                        <input type="checkbox" value="2" id="kerjatanah">
                        <label for="kerjatanah">KERJA TANAH</label>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <div class="checkbox check-primary">
                        <input type="checkbox" value="3" id="pembinaan">
                        <label for="pembinaan">PEMBINAAN</label>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <div class="checkbox check-primary">
                        <input type="checkbox" value="4" id="operasi">
                        <label for="operasi">OPERASI</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <div class="checkbox check-primary">
                        <input type="checkbox" value="5" id="tangguh">
                        <label for="tangguh">TANGGUH/TERBENGKALAI</label>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <div class="checkbox check-primary">
                        <input type="checkbox" value="6" id="selesai">
                        <label for="selesai">SELESAI PERLU KEMAJUAN</label>
                    </div>
                </div>
            </div>

        </div>
        <br>
        <div class="dashTitle"><b>Tempoh Audit Alam sekeling</b>.</div>

        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <div class="checkbox check-primary">
                        <input type="checkbox" value="1" id="belumdimulakan">
                        <label for="belumdimulakan">SEKALI SETAHUN</label>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <div class="checkbox check-primary">
                        <input type="checkbox" value="2" id="kerjatanah">
                        <label for="kerjatanah">DUA KALI SETAHUN</label>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <div class="checkbox check-primary">
                        <input type="checkbox" value="3" id="pembinaan">
                        <label for="pembinaan">TIGA KALI SETAHUN</label>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <div class="checkbox check-primary">
                        <input type="checkbox" value="4" id="operasi">
                        <label for="operasi">EMPAT KALI SETAHUN</label>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <div class="checkbox check-primary">
                        <input type="checkbox" value="4" id="operasi">
                        <label for="operasi">SETIAP BULAN</label>
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group-attached m-b-12">


            <div class="row">


                <div class="col-md-12">
                    <div class="form-group form-group-default">
                        <div class="form-input-group">
                            <label>
                                <span><b class="text-dark">Tarikh Cadangan Audit </b></span><span
                                    style="color:red;">*</span>
                            </label>
                            <input id="" class="form-control datepicker " type="month" id="start" name="start"
                                min="2020-12" value="2020-01">
                        </div>
                    </div>
                </div>

            </div>

        </div>
        <br>
        <div class="dashTitle"><b>Maklumat Pendaftaran LDP2M2</b>.</div>
        <table class="table table-hover table-responsive dataTable no-footer display nowrap" id="table" role="grid"
            aria-describedby="table_info">
            <thead>
                <tr role="row">
                    <th bgcolor="#f0f0f0" class="fit align-top text-center" style="width: 5px; color:#000">No.
                    </th>
                    <th bgcolor="#f0f0f0" class="align-top text-center" style="width: 20px; color:#000">Tarikh Cadangan
                        Audit Alam Sekeliling
                    </th>
                    <th bgcolor="#f0f0f0" class="align-top text-center" style="width: 20px; color:#000"> Status Kemajuan
                        Kerja Projek
                    </th>
                    <th bgcolor="#f0f0f0" class="align-top text-center" style="width: 20px; color:#000">Kekerapan Audit
                    </th>

                    <th bgcolor="#f0f0f0" class="align-top text-center" style="width: 10px; color:#000">No.Rujukan</th>

                    <th bgcolor="#f0f0f0" class="align-top text-center" style="width: 20px; color:#000">
                        Tindakan</th>

                    <!-- <th bgcolor="#f0f0f0" class="align-top text-left" style="width: 20px; color:#000">Action</th> -->
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>January 2020</td>
                    <td>Kerja Tanah</td>
                    <td>Setahun Sekali</td>


                    <td>55</td>
                    <td>
                        <a data-toggle="tooltip" title="" class="btn btn-default btn-xs" style="" type="button"
                            onclick=""><span style="color:#fff"> <i class="fas fa-edit text-warning"></i></span>
                        </a>
                        <a data-toggle="tooltip" title="" class="btn btn-default btn-xs" style="" type="button"
                            onclick=""><span style="color:#fff"> <i class="far fa-save text-success"></i></span>
                        </a>
                    </td>


                </tr>
            </tbody>
        </table>
        <div class="col-md-12 p-t-20">
            <ul class="pager wizard no-style">
                <li class="submit">
                    <button onclick="submitForm('form-add')" class="btn btn-success btn-cons from-left pull-right "
                        id="simpan" type="button">
                        <span>Hantar</span>
                    </button>
                    <button onclick="submitForm('form-add')" class="btn btn-info btn-cons from-left pull-right"
                        id="simpan" type="button">
                        <span>Simpan</span>
                    </button>

                </li>
            </ul>
        </div>

    </div>
</div>

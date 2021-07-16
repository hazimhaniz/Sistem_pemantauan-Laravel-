<style>
    td{
        text-transform: none !important;
    }
    </style>
    
    
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
    
                <a id="form-modal" href="" data-toggle="modal" data-target="#stesenMarin-modal-xl" title=""
                    class="btn btn-default btn-xs" style="" type="button" onclick="">
                    <span
                        style="color:#000; font-family: 'Montserrat'; font-size: 10.5px; text-transform: uppercase; font-weight: 500;">
                        <i class="fa fa-plus text-success"></i> &nbsp; <span style="color:blue;">STESEN</span>
                    </span>
                </a>
            </span>
            <!-- Modal -->
            <div class="modal fade" id="stesenMarin-modal-xl" tabindex="-1" role="dialog"
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
                                                    <!-- <label class="col-md-3 m-t-15 control-label">Sila Pilih Jika Melibatkan Standard R </label> -->
                                                    <label><b>Sila Pilih Jika Projek Berdekatan Dengan Kawasan Rekreasi (Kelas R)</b></label>
                                                    <div class="radio radio-primary">
                                                        <input name="prima_sekunder" value="1" id="is_prima" type="radio" class="hidden is_prima">
                                                        <label for="is_prima">Sentuhan Prima</label>
                                                        <input name="prima_sekunder" value="2" id="is_sekunder" type="radio" class="hidden is_sekunder">
                                                        <label for="is_sekunder">Sentuhan Sekunder</label>
                                                    </div>
                                                </div>
    
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
                                                <td class="align-middle text-center"><b>KELAS 1: HABITAT MARIN SENSITIF</b></td>
                                                <td>
                                                   <b> Kelas 1 Mewakili Set Standard Yang Paling Ketat Selaras Dengan Ahap Perlindungan Yang Diperlukan Oleh Habitat Marin Yang Sensitif.
                                                    Perairan Kelas 1 Terdiri Daripada:</b><br>
                                                    1) Perairan Yang Diwartakan & Perlindungan Berkanun.
                                                    - Perairan Laut Yang Diwartakan Secara Sah Untuk Perlindungan Dan Pengurusan Khas Atau Perairan Laut Yang Tertakluk Pada Beberapa Bentuk Perlindungan Statutori Atau Perundangan.
                                                    - Contohnya Kawasan Perlindungan Marin (Taman Marin, Kawasan Larangan Perikanan), Taman Negeri, Tapak Ramsar Dan Kawasan Perlindungan Laut Yang Lain.<br>
                                                    2) Perairan Tidak Diwartakan.
                                                    - Kawasan Habitat Marin Sensitif Yang Memerlukan Perlindungan Khas Standard Kelas 1.
                                                    - Contohnya Terumbu Karang, Rumput Laut, Laluan & Tapak Pendaratan Penyu Dan Perairan Berkaitan Dengan Habitat Tertentu.

                                                </td>
                                               
                                            </tr>
                                            <tr>
                                                <td class="align-middle text-center"> <b>KELAS 2: PERIKANAN
                                                    (TERMASUK MARIKULTUR</b></td>
                                                <td>
                                                    Kelas 2 Merangkumi Aktiviti Perikanan Dan Marikultur Adalah Dikenal Pasti Menggunakan Zon Penangkapan Ikan Yang Dibangunkan Oleh Jabatan Perikanan Sebagai Panduan.
                                                    Perairan Kelas 2 Terdiri Daripada Sebahagian Zon Pemuliharaan (Termasuk Kawasan Larangan Perikanan) Sehingga Ke Zon Ekonomi Eksklusif (Eez).
                                                    Aktiviti Marikultur Yang Ditakrifkan Sebagai Kelas 2 Adalah Yang Terlibat Dengan Badan Air Marin Seperti Penternakan Sangkar Dan Penternakan Kerang Dan Tidak Termasuk Aktiviti Akuakultur Perikanan Darat.

                                                </td>
                                               
                                            </tr>
                                            <tr>
                                                <td class="align-middle text-center"><b>KELAS 3: INDUSTRI, AKTIVITI KOMERSIAL & KAWASAN KEDIAMAN PESISIR PANTAI</b></td>
                                                <td>
                                                    Kelas 3 Ialah Standard Untuk Perairan Laut Yang Terdedah Pada Pelapasan Efluen Secara Langsung Daripada Aktiviti Antropogenik.
                                                    Oleh Itu, Ekosistem Di Perairan Ini Tertakluk Pada Beberapa Tahap Gangguan.
                                                    Tahap Perlindungan Ini Bertujuan Untuk Mengekalkan Kesihatan Ekosistem Yang Sedia Ada Dan Untuk Meningkatkan Keseluruhan Kualiti Air Kawasan Yang Terjejas.
                                                    Contoh Aktiviti Yang Berpotensi Memberi Kesan Kepada Kesihatan Ekosistem Laut Adalah Seperti Pelabuhan Dan Jeti, Loji Penjanaan Kuasa, Eksploitasi Mineral, Hotel Dan Pusat Peranginan, Aktiviti Penambakan, Limbungan Kapal, Aktiviti Penerokaan Dan Pengeluaran Minyak Dan Gas, Akuakultur Perikanan Darat Dan Kawasan Kediaman Pesisir Pantai.


                                                </td>
                                               
                                            </tr>
                                            <tr>
                                                <td class="align-middle text-center"><b>KELAS E (INTERIM) MUARA SUNGAI</b></td>
                                                <td>
                                                    Kelas E (Interim) Adalah Standard Yang Tertakluk Pada Variasi Musim Dan Diurnal. Selain Itu, Ciri-Ciri Geologi Dan Corak Peredaran Air Turut Menyumbang Pada Sifat Dinamik Perairan Ini. Berdasarkan Kepelbagaian Semulajadi Ini, Kelas E Berasal Daripada Ciri-Ciri Kualiti Air Muara Sungai Yang Mewakili Persekitaran Yang Tidak Terganggu. Kawasan Ini Disebut Sebagai Tapak Rujukan Yang Dipilih Untuk Mewakili Tiga Jenis Muara Utama Di Malaysia.
                                                    Kelas E1 Dipilih Mewakili Dataran Pantai, Kelas E2 Mewakili Muara Jenis Lagun Manakala Kelas E3 Akan Dirujuk Apabila Muara Sungai Terdapat Rangkaian Kompleks.


                                            </tr>
                                            <tr>
                                                <td class="align-middle text-center"><b>KELAS R: REKREASI</b></td>
                                                <td>
                                                    Standard Untuk Kegunaan Rekreasi Perairan Laut Merujuk Kepada Standard Kebangsaan Kualiti Air Rekreasi Semulajadi Dan Garispanduan Bagi Pemantauan Air Rekreasi Semulajadi (Air Marin & Air Tawar) Yang Diterbitkan Oleh Kementerian Kesihatan, Malaysia.
    
                                                </td>
                                               
                                            </tr>
                                            <tr>
                                                <td class="align-middle text-center"><b>CLASS V</b></td>
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
                        <td class="align-top text-center">Marin</td>
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
    
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
    
    .title1{
        font-weight: 500 !important;
        font-size: 14.5px !important;
        font-family: 'Montserrat' !important;  
    }
    
</style>


<div class="row">
    <div class="col-md-12">
        <div class="title1"><b>MAKLUMAT (EMP)</b></div>
        <br class="formEmp">
        <div class="dashTitle formEmp"><b>Tambah Maklumat EMP </b>.</div>
        <br class="formEmp">
        <div class="form-group-attached m-b-12 formEmp">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group form-group-default">
                        <div class="form-input-group">
                            <label>
                                <span><b class="text-dark">Tarikh Kelulusan EMP</b></span><span style="color:red;">*</span>
                                <i class="fa fa-calendar"></i>
                            </label>
                            <input name="emp_tarikh_kelulusan" id="emp_tarikh_kelulusan" class="form-control datepicker" data-date-end-date="0d" required>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group form-group-default">
                        <div class="form-input-group">
                            <label>
                                <span><b class="text-dark">No.Rujukan</b></span>
                                <span style="color:red;">*</span>
                            </label>
                            <input name="emp_no_rujukan" id="emp_no_rujukan" class="form-control form-control-lg" type="text" required>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group form-group-default">
                        <div class="form-input-group">
                            <label>
                                <span><b class="text-dark">Nama Perunding</b></span><span style="color:red;">*</span>
                            </label>
                            <input name="emp_perunding" id="emp_perunding" class="form-control form-control-lg" type="text" required>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group-attached m-b-12 formEmp">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group form-group-default">
                        <div class="form-input-group">
                            <label>
                                <span><b class="text-dark">Nama Laporan EMP</b></span><span style="color:red;">*</span>
                            </label>
                            <input name="emp_nama_laporan" id="emp_nama_laporan" class="form-control form-control-lg" type="text" required>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 p-t-20">
                <ul class="pager wizard no-style">
                    <li class="submit">
                        <button onclick="tambahMaklumatEMP()" class="btn btn-success btn-cons from-left pull-right " id="simpan" type="button">
                            <span>Tambah</span>
                        </button>
                    </li>
                </ul>
            </div>
        </div>
        
        <br class="formEmp">

        <div class="dashTitle"><b>Maklumat EMP</b></div>
        <div id="projekEMPTable"></div>
        
        <br><br>
        <div class="title1"><b>MAKLUMAT LAND DISTURBING POLLUTION PREVENTION & MITIGATION MEASURE (LDP2M2)</b></div>
        <br class="formLDP2M2">
        <div class="dashTitle formLDP2M2"><b>Tambah Maklumat LDP2M2</b>.</div>
        <br class="formLDP2M2">
        
        <div class="form-group-attached m-b-12 formLDP2M2">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group form-group-default">
                        <div class="form-input-group">
                            <label>
                                <span><b class="text-dark">Nama Dokumen LDP2M2</b></span>
                                <span style="color:red;">*</span>
                                <input name="ldp2m2_nama_dokumen" id="ldp2m2_nama_dokumen" class="form-control form-control-lg" type="text"  required>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group form-group-default">
                            <div class="form-input-group">
                                <label>
                                    <span><b class="text-dark">Tarikh Kelulusan LDP2M2</b></span><span style="color:red;">*</span>
                                    <i class="fa fa-calendar"></i>
                                </label>
                                <input name="ldp2m2_tarikh_kelulusan" id="ldp2m2_tarikh_kelulusan" class="form-control datepicker" data-date-end-date="0d" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group form-group-default">
                            <div class="form-input-group">
                                <label>
                                    <span><b class="text-dark">No.Rujukan</b></span><span style="color:red;">*</span>
                                </label>
                                <input name="ldp2m2_no_rujukan" id="ldp2m2_no_rujukan" class="form-control form-control-lg" type="text" required>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="form-group-attached m-b-12 formLDP2M2">
                <div class="row">
                    <div class="input-group file-caption-main">
                        <div class="file-caption form-control  kv-fileinput-caption icon-visible" tabindex="500">
                            <span class="file-caption-icon"><i class="fa fa-file kv-caption-icon"></i> </span>
                        </div>
                        <div class="input-group-btn input-group-append">
                            <div tabindex="500" class="btn btn-primary btn-file"><i class="fa fa-folder-open"></i> <span class="hidden-xs">Muat Naik</span>
                                <input id="input-ke-salinan" name="input-ke-salinan[]" type="file" multiple="">
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
            <div class="form-group form-group-default formLDP2M2">
                <label style="font-size:13px; font-family: 'Montserrat'">Muat Naik</label>
                <div tabindex="500" class="">
                    <i class="fa fa-folder-open"></i>
                    <input type="file" id="ldp2m2_file" name="ldp2m2_file[]" multiple>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 p-t-20">
                    <ul class="pager wizard no-style">
                        <li class="submit">
                            <button onclick="tambahMaklumatLDP2M2()" class="btn btn-success btn-cons from-left pull-right " id="simpan" type="button">
                                <span>Tambah</span>
                            </button>
                        </li>
                    </ul>
                </div>
            </div>
            <br class="formLDP2M2">
            <div class="dashTitle"><b>Maklumat LDP2M2</b></div>
            <div id="projekLDP2M2Table"></div>
        </div>
    </div>
    
    <script>
        var tambahMaklumatEMP;
        var tambahMaklumatLDP2M2;
        $(document).ready(function(){
            $("#projekEMPTable").load("{{ url('/projek/pendaftaranprojek/senarai_emp/') }}/{{ $projek->id }}");
            $("#projekLDP2M2Table").load("{{ url('/projek/pendaftaranprojek/senarai_ldp2m2/') }}/{{ $projek->id }}");
            
            tambahMaklumatEMP = function()
            {
                var formData = new FormData;
                formData.append('emp_tarikh_kelulusan', $("#emp_tarikh_kelulusan").val());
                formData.append('emp_no_rujukan', $("#emp_no_rujukan").val());
                formData.append('emp_perunding', $("#emp_perunding").val());
                formData.append('emp_nama_laporan', $("#emp_nama_laporan").val());
                
                $.ajax({
                    url: "{{ url('/projek/pendaftaranprojek/tambah_emp') }}/{{ $projek ? $projek->id : '' }}",
                    method: "POST",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        console.log(response);
                        $("#projekEMPTable").load("{{ url('/projek/pendaftaranprojek/senarai_emp/') }}/{{ $projek->id }}");

                        $("#emp_tarikh_kelulusan").val('');
                        $("#emp_no_rujukan").val('');
                        $("#emp_perunding").val('');
                        $("#emp_nama_laporan").val('');
                        
                        Swal.fire('Berjaya', 'Maklumat Telah Disimpan', 'success');
                    }
                });
            }
            
            tambahMaklumatLDP2M2 = function()
            {
                var formData = new FormData;
                formData.append('ldp2m2_nama_dokumen', $("#ldp2m2_nama_dokumen").val());
                formData.append('ldp2m2_tarikh_kelulusan', $("#ldp2m2_tarikh_kelulusan").val());
                formData.append('ldp2m2_no_rujukan', $("#ldp2m2_no_rujukan").val());
                
                for (var x = 0; x < $('#ldp2m2_file')[0].files.length; x++) {
                    formData.append("ldp2m2_file[]", $('#ldp2m2_file')[0].files[x]);
                }
                
                $.ajax({
                    url: "{{ url('/projek/pendaftaranprojek/tambah_ldp2m2') }}/{{ $projek ? $projek->id : '' }}",
                    method: "POST",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        console.log(response);
                        $("#projekLDP2M2Table").load("{{ url('/projek/pendaftaranprojek/senarai_ldp2m2/') }}/{{ $projek->id }}");

                        $("#ldp2m2_nama_dokumen").val('');
                        $("#ldp2m2_tarikh_kelulusan").val('');
                        $("#ldp2m2_no_rujukan").val('');
                        $("#ldp2m2_file").val('');

                        Swal.fire('Berjaya', 'Maklumat Telah Disimpan', 'success');
                    }
                });
            }
        });
        
        
    </script>
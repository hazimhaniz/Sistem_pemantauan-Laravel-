<style>
    .table>tbody>tr>td {
        padding: 6px;
        vertical-align: top !important;
        
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
        /* text-align: left !important; */
        font-size: 11px !important;
        //border: 1px solid #DDDDDD;
        color: #000 !important;
    }

    .checkbox-wrapper {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        grid-template-rows: repeat(2, 1fr);
    }

</style>

<div class="tab-content">
    <input type="hidden" name="current_tab" id="current_tab" value="3">

    <div class="tab-pane active slide-right" id="tab3_view">
        <div class="m-t-20">
            <!-- START card -->
            <div class="card card-transparent">

                <div class="card-block">
                    <div class="alert alert-primary" style="font-size:14.5px; font-family: 'Montserrat'">
                       
                        <label> LAPORAN BULANAN BAHAGIAN E (PERLAKSANAAN AUDIT)BAGI BULAN JANUARI TAHUN 2020.</label>
                    </div>
                    <div class="row">

                        <div class="col-md-6">

                            <div class="form-group-attached m-b-10">
                                <div class="form-check form-check-inline" style="margin-bottom:0px">
                                    <div class="checkbox check-primary">
                                        <input name="usbu_email_checker" value="1" id="usbu_email_checker"
                                            type="checkbox" class="hidden">
                                        <label for="usbu_email_checker">KEMASKINI AUDIT</label>
                                        <!-- <i style="cursor: help; color: #48B0F7;" class="fa fa-question-circle info_ " data-html="true" data-toggle="tooltip" title="This email will be use to send verification and confirmation once approved by officer"></i> -->
                                    </div>
                                </div>
                                
                                <div class="form-check form-check-inline" style="">
                                    <div class="checkbox check-primary">
                                        <input name="usbu_email_checker" value="1" id="usbu_email_checker"
                                            type="checkbox" class="hidden">
                                        <label for="usbu_email_checker">TIDAK DIJADUALKAN</label>
                                        <!-- <i style="cursor: help; color: #48B0F7;" class="fa fa-question-circle info_ " data-html="true" data-toggle="tooltip" title="This email will be use to send verification and confirmation once approved by officer"></i> -->
                                    </div>
                                </div>





                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group form-group-default">
                                            <label>
                                                <span><b class="text-dark">TARIKH CADANGAN AUDIT</b></span><i
                                                    class="fa fa-calendar"></i>
                                            </label>
                                            <input id="" class="form-control datepicker " name="" placeholder=""
                                                required="" type="" value="">
                                        </div>



                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group form-group-default">
                                            <label>
                                                <span><b class="text-dark">TARIKH AUDIT DIJALANKAN</b></span><i
                                                    class="fa fa-calendar"></i><span style="color:red;">*</span>
                                            </label>
                                            <input id="" class="form-control datepicker " name="" placeholder=""
                                                required="" type="" value="">
                                        </div>


                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">

                                        <div class="form-group form-group-default">
                                            <label>
                                                <span><b class="text-dark">AUDITOR</b></span><span
                                                    style="color:red;">*</span>
                                            </label>
                                            <input class="form-control form-control-lg" type="text" placeholder="">
                                        </div>

                                    </div>
                                </div>
                                
                                
                            </div>
                            <div class="form-group row">
                                <label for="name" id="susun" class="col-md-3 control-label">
                                    <b>ADA NCR :</b>

                                </label>
                                <div class="col-md-9">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions"
                                            id="inlineRadio1" value="option1"> <label>YA</label>

                                    </div>
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions"
                                            id="inlineRadio2" value="option2"> <label>TIDAK</label>

                                    </div>

                                </div>
                                <label for="name" id="susun" class="col-md-3 control-label">
                                    <b>ADA OFI :</b>

                                </label>
                                <div class="col-md-9">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions"
                                            id="inlineRadio1" value="option1"> <label>YA</label>

                                    </div>
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions"
                                            id="inlineRadio2" value="option2"> <label>TIDAK</label>

                                    </div>
                            </div>
                            
                          
                            </div>
                            <label style="font-family: 'Montserrat'">DOKUMEN SOKONGAN</label>
                            <div class="input-group file-caption-main">
                                <div class="file-caption form-control  kv-fileinput-caption icon-visible"
                                    tabindex="500">
                                    <span class="file-caption-icon"><i
                                            class="fa fa-file kv-caption-icon"></i> </span>

                                </div>
                                <div class="input-group-btn input-group-append">

                                    <div tabindex="500" class="btn btn-primary btn-file"><i
                                            class="fa fa-folder-open"></i> <span
                                            class="hidden-xs">Muat Naik …</span><input
                                            id="input-ke-salinan" name="input-ke-salinan[]"
                                            type="file" multiple=""></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">

                            <div class="form-group-attached m-b-10">
                                
                                <div class="form-check form-check-inline" style="">
                                    <div class="checkbox check-primary">
                                        <input name="usbu_email_checker" value="1" id="usbu_email_checker"
                                            type="checkbox" class="hidden">
                                        <label for="usbu_email_checker">TIDAK DAPAT MELAKSANAKAN AUDIT</label>
                                        <!-- <i style="cursor: help; color: #48B0F7;" class="fa fa-question-circle info_ " data-html="true" data-toggle="tooltip" title="This email will be use to send verification and confirmation once approved by officer"></i> -->
                                    </div>
                                </div>
           
                          
                            </div>
                            <textarea class="form-control border border-default rounded" id="name" style="height: 220px;" placeholder="" aria-invalid="false"></textarea>
                        </div>
                        
                    </div>
                    <br>
                    <div class="alert alert-primary" style="font-size:14.5px; font-family: 'Montserrat'">
                        <label> LAPORAN BULANAN BAHAGIAN F (PERLAKSANAAN EMT)</label>
                    </div>
                    <label style="font-family: 'Montserrat'"><b>STATUS PELAKSANAAN EMT BAGI BULAN JANUARI TAHUN 2020</b></label><br><br>
                    <div class="form-check form-check-inline" style="font-size:10.5px; font-family: 'Montserrat'">
                        <div class="checkbox check-primary">
                            <input name="usbu_email_checker" value="1" id="usbu_email_checker"
                                type="checkbox" class="hidden">
                            <label for="usbu_email_checker">Environmental Policy (EP)</label>
                            <!-- <i style="cursor: help; color: #48B0F7;" class="fa fa-question-circle info_ " data-html="true" data-toggle="tooltip" title="This email will be use to send verification and confirmation once approved by officer"></i> -->
                        </div>
                    </div>
                    <div class="form-check form-check-inline" style="font-size:10.5px; font-family: 'Montserrat'">
                        <div class="checkbox check-primary">
                            <input name="usbu_email_checker" value="1" id="usbu_email_checker"
                                type="checkbox" class="hidden">
                            <label for="usbu_email_checker">Environmental Budgeting (EB)</label>
                            <!-- <i style="cursor: help; color: #48B0F7;" class="fa fa-question-circle info_ " data-html="true" data-toggle="tooltip" title="This email will be use to send verification and confirmation once approved by officer"></i> -->
                        </div>
                    </div>
                    <div class="form-check form-check-inline" style="font-size:10.5px; font-family: 'Montserrat'">
                        <div class="checkbox check-primary">
                            <input name="usbu_email_checker" value="1" id="usbu_email_checker"
                                type="checkbox" class="hidden">
                            <label for="usbu_email_checker">Environmental Competency (EC)</label>
                            <!-- <i style="cursor: help; color: #48B0F7;" class="fa fa-question-circle info_ " data-html="true" data-toggle="tooltip" title="This email will be use to send verification and confirmation once approved by officer"></i> -->
                        </div>
                    </div>
                    <div class="form-check form-check-inline" style="font-size:10.5px; font-family: 'Montserrat'">
                        <div class="checkbox check-primary">
                            <input name="usbu_email_checker" value="1" id="usbu_email_checker"
                                type="checkbox" class="hidden">
                            <label for="usbu_email_checker">Environmental Facility (EF)</label>
                            <!-- <i style="cursor: help; color: #48B0F7;" class="fa fa-question-circle info_ " data-html="true" data-toggle="tooltip" title="This email will be use to send verification and confirmation once approved by officer"></i> -->
                        </div>
                    </div>
                    <div class="form-check form-check-inline" style="font-size:10.5px; font-family: 'Montserrat'">
                        <div class="checkbox check-primary">
                            <input name="usbu_email_checker" value="1" id="usbu_email_checker"
                                type="checkbox" class="hidden">
                            <label for="usbu_email_checker">Environmental Monitoring Committee (EMC)</label>
                            <!-- <i style="cursor: help; color: #48B0F7;" class="fa fa-question-circle info_ " data-html="true" data-toggle="tooltip" title="This email will be use to send verification and confirmation once approved by officer"></i> -->
                        </div>
                    </div>
                    <div class="form-check form-check-inline" style="font-size:10.5px; font-family: 'Montserrat'">
                        <div class="checkbox check-primary">
                            <input name="usbu_email_checker" value="1" id="usbu_email_checker"
                                type="checkbox" class="hidden">
                            <label for="usbu_email_checker">Environmental Reporting and Communication (ERC</label>
                            <!-- <i style="cursor: help; color: #48B0F7;" class="fa fa-question-circle info_ " data-html="true" data-toggle="tooltip" title="This email will be use to send verification and confirmation once approved by officer"></i> -->
                        </div>
                    </div>
                    <div class="form-check form-check-inline"style="font-size:10.5px; font-family: 'Montserrat'">
                        <div class="checkbox check-primary">
                            <input name="usbu_email_checker" value="1" id="usbu_email_checker"
                                type="checkbox" class="hidden">
                            <label for="usbu_email_checker">Environmental Transparency (ET)</label>
                            <!-- <i style="cursor: help; color: #48B0F7;" class="fa fa-question-circle info_ " data-html="true" data-toggle="tooltip" title="This email will be use to send verification and confirmation once approved by officer"></i> -->
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

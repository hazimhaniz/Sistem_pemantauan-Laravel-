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

    .title{
        font-weight: 500 !important;
        font-size: 14.5px !important;
        font-family: 'Montserrat' !important;  
    }
        
</style>


<div class="row">
    <div class="col-md-12">
        <div class="title"><b>MAKLUMAT (EMP)</b></div>
                              <br>
        <div class="dashTitle"><b>Tambah Maklumat EMP</b>.</div>
       
        <br>

        <div class="form-group-attached m-b-12">


            <div class="row">
                <div class="col-md-4">
                    <div class="form-group form-group-default">
                        <div class="form-input-group">
                            <label>
                                <span><b class="text-dark">Tarikh Kelulusan EMP</b></span><span style="color:red;">*</span>
                                <i class="fa fa-calendar"></i> </label>
                            <input id="" class="form-control datepicker " name="" placeholder="" required="" type="" value="">
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group form-group-default">
                        <div class="form-input-group">
                            <label>
                                <span><b class="text-dark">No.Rujukan</b></span>
                                <span style="color:red;">*</span>
                                <input class="form-control form-control-lg" type="text" placeholder="">
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group form-group-default">
                        <div class="form-input-group">
                            <label>
                                <span><b class="text-dark">Nama Perunding</b></span><span style="color:red;">*</span>
                            </label>
                            <input class="form-control form-control-lg" type="text" placeholder="">
                        </div>
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
                                <span><b class="text-dark">Nama Laporan EMP</b></span><span style="color:red;">*</span>
                            </label>
                            <input class="form-control form-control-lg" type="text" placeholder="">
                        </div>
                    </div>
                </div>
        
            </div>
        
        </div>
        <div class="row">
            <div class="col-md-12 p-t-20">
                <ul class="pager wizard no-style">
                    <li class="submit">
                        
                        <button onclick="submitForm('form-add')"
                            class="btn btn-success btn-cons from-left pull-right " id="simpan" type="button">
                            <span>Hantar</span>
                        </button>
                    </li>
                </ul>
            </div>
        </div>
       
        <br>
        <div class="dashTitle"><b>Maklumat Pendaftaran EMP</b>.</div>
        <table class="table table-hover table-responsive dataTable no-footer display nowrap"
                                id="table" role="grid" aria-describedby="table_info" >
                                <thead>
                                    <tr role="row">
                                        <th bgcolor="#f0f0f0" class="fit align-top text-center"
                                            style="width: 5px; color:#000">No.
                                        </th>
                                        <th bgcolor="#f0f0f0" class="align-top text-center"
                                            style="width: 20px; color:#000"> Nama Laporan
                                        </th>
                                        <th bgcolor="#f0f0f0" class="align-top text-center"
                                            style="width: 20px; color:#000">Tarikh Kelulusan
                                        </th>
                                        <th bgcolor="#f0f0f0" class="align-top text-center"
                                            style="width: 20px; color:#000">Nama Perunding</th>
                                        
                                        <th bgcolor="#f0f0f0" class="align-top text-center"
                                            style="width: 10px; color:#000">No.Rujukan</th>
                                        
                                            <th bgcolor="#f0f0f0" class="align-top text-center"
                                            style="width: 20px; color:#000">
                                            Tindakan</th>

                                        <!-- <th bgcolor="#f0f0f0" class="align-top text-left" style="width: 20px; color:#000">Action</th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Laporan Sungai</td>
                                        <td>93621285</td>
                                        <td>93621285</td>
                                        
                                       
                                        <td>55</td>
                                       <td>
                                                    <a data-toggle="tooltip" title="" class="btn btn-default btn-xs" style="" type="button" onclick=""><span style="color:#fff"> <i class="fas fa-edit text-warning"></i></span>
                                                    </a>
                                                    <a data-toggle="tooltip" title="" class="btn btn-default btn-xs" style="" type="button" onclick=""><span style="color:#fff"> <i class="far fa-save text-success"></i></span>
                                                    </a>
                                                </td>


                                    </tr>
                                </tbody>
                              </table>
                              <br><br>
                              <div class="title"><b>MAKLUMAT LAND DISTURBING POLLUTION PREVENTION & MITIGATION MEASURE (LDP2M2)</b></div>
                              
                              <br>
                              <div class="dashTitle"><b>Tambah Maklumat LDP2M2</b>.</div>
       
                              <br>
                      
                              <div class="form-group-attached m-b-12">
                      
                      
                                  <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group form-group-default">
                                            <div class="form-input-group">
                                                <label>
                                                    <span><b class="text-dark">Nama Dokumen LDP2M2</b></span>
                                                    <span style="color:red;">*</span>
                                                    <input class="form-control form-control-lg" type="text" placeholder="">
                                            </div>
                                        </div>
                                    </div>
                                      <div class="col-md-4">
                                          <div class="form-group form-group-default">
                                              <div class="form-input-group">
                                                  <label>
                                                      <span><b class="text-dark">Tarikh Kelulusan EMP</b></span><span style="color:red;">*</span>
                                                      <i class="fa fa-calendar"></i> </label>
                                                  <input id="" class="form-control datepicker " name="" placeholder="" required="" type="" value="">
                                              </div>
                                          </div>
                                      </div>
                                      
                                      <div class="col-md-4">
                                          <div class="form-group form-group-default">
                                              <div class="form-input-group">
                                                  <label>
                                                      <span><b class="text-dark">No.Rujukan</b></span><span style="color:red;">*</span>
                                                  </label>
                                                  <input class="form-control form-control-lg" type="text" placeholder="">
                                              </div>
                                          </div>
                                      </div>
                              
                                  </div>
                              
                              </div>
                              <div class="form-group-attached m-b-12">
                      
                      
                                  <div class="row">
                                    <div class="input-group file-caption-main">
                                        <div class="file-caption form-control  kv-fileinput-caption icon-visible" tabindex="500">
                                            <span class="file-caption-icon"><i class="fa fa-file kv-caption-icon"></i> </span>
                                    
                                        </div>
                                        <div class="input-group-btn input-group-append">
                                    
                                            <div tabindex="500" class="btn btn-primary btn-file"><i class="fa fa-folder-open"></i> <span
                                                    class="hidden-xs">Muat Naik</span><input id="input-ke-salinan" name="input-ke-salinan[]" type="file"
                                                    multiple=""></div>
                                        </div>
                                     </div>
                                  </div>
                              
                              </div>
                              <div class="row">
                                <div class="col-md-12 p-t-20">
                                    <ul class="pager wizard no-style">
                                        <li class="submit">
                                            
                                            <button onclick="submitForm('form-add')"
                                                class="btn btn-success btn-cons from-left pull-right " id="simpan" type="button">
                                                <span>Hantar</span>
                                            </button>
                                        </li>
                                    </ul>
                                </div>
                              </div>
                              
                              <br>
                              <div class="dashTitle"><b>Maklumat Pendaftaran EMP</b>.</div>
                              <table class="table table-hover table-responsive dataTable no-footer display nowrap"
                                                      id="table" role="grid" aria-describedby="table_info" >
                                                      <thead>
                                                          <tr role="row">
                                                              <th bgcolor="#f0f0f0" class="fit align-top text-center"
                                                                  style="width: 5px; color:#000">No.
                                                              </th>
                                                              <th bgcolor="#f0f0f0" class="align-top text-center"
                                                                  style="width: 20px; color:#000"> Nama Dokumen 
                                                              </th>
                                                              <th bgcolor="#f0f0f0" class="align-top text-center"
                                                                  style="width: 20px; color:#000">Tarikh Kelulusan
                                                              </th>
                                                              <th bgcolor="#f0f0f0" class="align-top text-center"
                                                                  style="width: 10px; color:#000">No.Rujukan</th>
                                                              
                                                                  <th bgcolor="#f0f0f0" class="align-top text-center"
                                                                  style="width: 20px; color:#000">
                                                                  Tindakan</th>
                      
                                                              <!-- <th bgcolor="#f0f0f0" class="align-top text-left" style="width: 20px; color:#000">Action</th> -->
                                                          </tr>
                                                      </thead>
                                                      <tbody>
                                                          <tr>
                                                              <td>1</td>
                                                              <td>Laporan Sungai</td>
                                                              <td>93621285</td>
                                                              <td>55</td>
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
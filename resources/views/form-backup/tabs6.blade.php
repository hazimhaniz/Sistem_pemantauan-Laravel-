<style type="text/css">
   

    .text-info {
        color: #ab70a6 !important;
    }

    .modal-lg {
        max-width: 60% !important;
        width: 60% !important;
        margin: 0 auto !important;
    }

    .nav-tabs-blue.nav-tabs-fillup>li>a:after {
        background: none repeat scroll 0 0 #006c80;
        border: 1px solid #006c80;
    }
    label{
        font-family: 'Montserrat' !important;
    font-size: 10.5px !important;
    }
    .hidden-xs{
        font-family: 'Montserrat' !important;
    font-size: 10.5px !important;
      
    }

    .btn{
        font-family: 'Montserrat' !important;
    font-size: 10.5px !important;s  
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
    text-align:center !important; 
}

</style>



<div class=" container-fluid container-fixed-lg">
    <div class="row">
        <div class="col-md-12 ">
            <table class="table" id="" role="grid" aria-describedby="table_info" border="0px" style="padding:10px;">
                <thead>
                    <tr role="row">
                    <tr>
                        <th bgcolor="#ddfada" class="align-top text-center" style="width:5%;  color:#fff">No.</th>
                        <th bgcolor="#ddfada" class="align-top text-center" style="width:20%;  color:#fff">Laporan</th>
                        <th bgcolor="#ddfada" class="align-top text-center" style="width:15%;  color:#fff">Status</th>
                        <th bgcolor="#ddfada" class="align-top text-center" style="width:15%;  color:#fff">Tindakan</th>


                    </tr>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>BAHAGIAN A</td>
                        <td>Kuiri</td>
                        <td>
                            <button type="button" class="dt-button buttons-html5 btn btn-default btn-xs m-t-5"
                                data-toggle="modal" data-target="#kuiri">
                                </i> Jawab Kuiri
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>BAHAGIAN B</td>
                        <td>Kuiri</td>
                        <td>
                            <button type="button" class="dt-button buttons-html5 btn btn-default btn-xs m-t-5"
                                data-toggle="modal" data-target="#kuiri">
                                </i> Jawab Kuiri
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>BAHAGIAN C</td>
                        <td>Kuiri</td>
                        <td>
                            <button type="button" class="dt-button buttons-html5 btn btn-default btn-xs m-t-5"
                                data-toggle="modal" data-target="#kuiri">
                                </i> Jawab Kuiri
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>BAHAGIAN D</td>
                        <td>Kuiri</td>
                        <td>
                            <button type="button" class="dt-button buttons-html5 btn btn-default btn-xs m-t-5"
                                data-toggle="modal" data-target="#kuiri">
                                </i> Jawab Kuiri
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>BAHAGIAN E</td>
                        <td>Kuiri</td>
                        <td>
                            <button type="button" class="dt-button buttons-html5 btn btn-default btn-xs m-t-5"
                                data-toggle="modal" data-target="#kuiri">
                                </i> Jawab Kuiri
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td>6</td>
                        <td>BAHAGIAN F</td>
                        <td>Kuiri</td>
                        <td>
                            <button type="button" class="dt-button buttons-html5 btn btn-default btn-xs m-t-5"
                                data-toggle="modal" data-target="#kuiri">
                                </i> Jawab Kuiri
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td>7</td>
                        <td>LAPORAN HUJAN</td>
                        <td>Kuiri</td>
                        <td>
                            <button type="button" class="dt-button buttons-html5 btn btn-default btn-xs m-t-5"
                                data-toggle="modal" data-target="#kuiri">
                                </i> Jawab Kuiri
                            </button>
                        </td>
                    </tr>
                    




                </tbody>
            </table>
            <div class="modal fade " id="kuiri" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class=" modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addModalTitle"> <b>Jawab Kuiri</b></h5>
                            <small class="text-muted">Isi dan pilih maklumat yang berkaitan.</small>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body m-t-20">
                            <div class="form-group form-group-default">
                                <label>
                                    <span><b class="text-dark">ISI KUIRI</b></span>
                                </label>
                                <input class="form-control form-control-lg" type="text" placeholder="">
                            </div>
                            <br>
                            <div class="form-group form-group-default">
                                <label>
                                    <span><b class="text-dark">JAWAB KUIRI</b></span>
                                </label>
                                <input class="form-control form-control-lg" type="text" placeholder="">
                            </div>
                            <br>
                            <button onclick="submitForm('form-add')"
                            class="btn btn-success btn-sm from-left pull-right" id="simpan" type="button">
                            <span>HANTAR</span>
                        </button>


                        </div>
                        
                    </div>
                </div>
            </div>
                {{-- <table class="table" id="" role="grid" aria-describedby="table_info"
                    border="0px" style="padding:10px;">
                    <thead>
                        <tr>
                            <th bgcolor="#ddfada" class="align-top text-center"
                                style="width:15%; vertical-align:top; color:#fff">No.</th>
                            <th bgcolor="#ddfada" class="align-top text-center"
                                style="width:15%; vertical-align:top; color:#fff">Laporan</th>
                            <th bgcolor="#ddfada" class="align-top text-center"
                                style="width:15%; vertical-align:top; color:#fff">Status</th>
                            <th bgcolor="#ddfada" class="align-top text-center"
                                style="width:15%; vertical-align:top; color:#fff">Tindakan</th>


                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="align-middle text-center">1</td>
                            <td class="align-middle text-center">BAHAGIAN A</td>
                            <td class="align-middle text-center">Kuiri</td>
                            <td class="align-middle text-center"> <button type="button"
                                    class="dt-button  btn btn-default btn-sm m-t-10" data-toggle="modal"
                                    data-target="#">
                                    </i> Jawab Kuiri&nbsp;
                                </button></td>

                        </tr>
                        <tr>
                            <td class="align-middle text-center">2</td>
                            <td class="align-middle text-center">BAHAGIAN B</td>
                            <td>Kuiri</td>
                            <td></td>

                        </tr>
                        <tr>
                            <td>3</td>
                            <td>BAHAGIAN C</td>
                            <td>Kuiri</td>
                            <td></td>

                        </tr>
                        <tr>
                            <td>4</td>
                            <td>BAHAGIAN D</td>
                            <td>Kuiri</td>
                            <td></td>

                        </tr>
                        <tr>
                            <td>5</td>
                            <td>BAHAGIAN E</td>
                            <td>Kuiri</td>
                            <td></td>

                        </tr>
                        <tr>
                            <td>6</td>
                            <td>BAHAGIAN F</td>
                            <td>Kuiri</td>
                            <td></td>

                        </tr>
                        <tr>
                            <td>7</td>
                            <td>LAPORAN HUJAN</td>
                            <td>Kuiri</td>
                            <td></td>

                        </tr>




                    </tbody>
                </table> --}}
            </div>
            <!-- /.col -->
        </div>
    </div>

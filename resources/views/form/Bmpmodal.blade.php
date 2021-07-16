<style>
    th {
        /* background-color: #034ec4; */
        color: #000 !important;
        border-top: none;
        border-left: none !important;
        font-family: 'Montserrat' !important;
        font-size: 10.5px !important;
        letter-spacing: 0.06em !important;
        text-transform: uppercase !important;
        font-weight: 500 !important;
    }

    td {
        color: #000 !important;
        border-top: 1px solid #DDDDDD;
        border-left: 1px solid #DDDDDD;
        border-top: none !important;
        border-left: none !important;
        border-bottom: none !important;
        border-right: none !important;
        */ font-family: 'Montserrat' !important;
        font-size: 10.5px !important;
        letter-spacing: 0.06em !important;
       
    }
</style>
<br>
<!-- <form id="bmpHujan" action="{{route('form.laporanHujan')}}" method="post" enctype="multipart/form-data">
    @csrf -->
    <div class="row">
        <div class="col-md-12">
            <div class="form-group-attached">
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group form-group-default">
                            <div class="form-input-group">
                                <label>
                                    <label>Tarikh Hujan</label>
                                    
                                </label>
                                <input name="" class="form-control datepicker tarikh_hujan"  required>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group form-group-default">
                            <div class="form-input-group">
                                <label>
                                    <label>Masa Hujan</label>                                    
                                </label>
                                <input name="" type="time" class="form-control masa" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group form-group-default">
                            <label>
                                <span><b class="text-dark">Tempoh hujan (jam)</b></span>
                            </label>
                            <input type="number" name="" min="1" class="form-control tempoh_hujan" value="1">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group form-group-default">
                            <label>
                                <span><b class="text-dark">Bacaan hujan melebihi 12.5mm</b></span>
                            </label>
                            <input type="number" name="" min="12.5" class="form-control bacaan_hujan" value="12.5" step=".01">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <br>

    <div class="row">
        <div class="col-md-12">
            <div class="dashTitle">&nbsp;</i>Pemantauan Best Practices Management(BMPs)</div>
            <br>
            <div class="row">
                <div class="col-md-3 ">
                    <a href="#" id="elementHujan" class="btn btn-primaryred  btn-sm btn-block"> Elemen Pemeriksaan</></a>
                </div>

                <div class="col-md-3 ">
                    <a href="#" id="hakisanHujan" class=" btn btn-primaryred btn-sm btn-block"> Kawalan Hakisan</a>
                </div>

                <div class="col-md-3 ">
                    <a href="#" id="kawalanHujan" class=" btn btn-primaryred btn-sm btn-block"> Kawalan Lain-lain </a>
                </div>

                <div class="col-md-3 ">
                    <a href="#" id="sedimenHujan" class="btn btn-primaryred btn-sm btn-block"> Kawalan Sedimen</a>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-3 ">
                    <a href="#" id="permukaanHujan" class="btn btn-primaryred btn-sm btn-block">Kawalan Air Larian Permukaan</a>
                </div>
                <div class="col-md-3">
                    <!-- biar je kosong / kuiri : kalau tak kosong jadi apa? hahaha -->
                </div>
            </div>
        </div>
    </div>
    <br>

    <div class="row">

    </div>
    <!-- </form> -->


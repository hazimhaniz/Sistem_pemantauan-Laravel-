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
    //: ;
    border-top: 1px solid #DDDDDD;
    //: ;
    border-left: 1px solid #DDDDDD;
    border-top: none !important;
    border-left: none !important;
    border-bottom: none !important;
    border-right: none !important; */
    font-family: 'Montserrat' !important;
    font-size: 10.5px !important;
    letter-spacing: 0.06em !important;
    text-transform: capitalize!important;
}
/* .btn-primaryred {
    background-color: #008080 !important;
    color: #fff;
}
.btn-primaryred:hover {
    background-color: #155454 !important;
    color: #fff;
} */
</style>

<div class="card-block">
    <div id="rootwizard">
        <!-- Nav tabs -->

        <ul class="nav nav-tabs nav-tabs-linetriangle nav-tabs-separator nav-stack-sm" id="myTab" role="tablist">
            <li class="nav-item ml-md-6">
                <a class="active" data-toggle="tab" href="#" data-target="#tabsenarai" role="tab" onclick=""><span><i class="fas fa-cloud-rain fa-lg text-success"></i>
                        Senarai Laporan Hujan</span></a>
            </li>
            <li class="nav-item">
                <a class="" data-toggle="tab" href="#" data-target="#tablaporan" role="tab" onclick=""><span>
                    <i class="fas fa-list-alt fa-lg text-success"></i> Laporan Hujan</span></a>
            </li>
           
            

        </ul>
    </div>
    <!-- Tab panes -->
    <div class="tab-content">
        <div class="tab-pane active" id="tabsenarai">
           @include ('form.senaraiLaporanHujan')
        </div>
        <div class="tab-pane disable" id="tablaporan">
            
            @include('form.Bmp')
        </div>
    </div>
</div>


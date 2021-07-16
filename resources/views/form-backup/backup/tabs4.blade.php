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
    border-right: none !important; */
    font-family: 'Montserrat' !important;
    font-size: 10.5px !important;
    letter-spacing: 0.06em !important;
    /* text-transform: capitalize!important;
} */
.btn-primaryred {
    background-color: #315548 !important;
    color: #fff;
}
</style>


<div class="row">
    <div class="col-md-12">
        <div class="dashTitle">&nbsp;</i>Pemantauan Best Practices Management(BMPs)</div>
        <br>
        <div class="row">
            <div class="col-md-3 ">
            <a href="#" id="element" class="btn btn-primaryred  btn-sm btn-block"> Elemen Pemeriksaan</></a>
            </div>

            <div class="col-md-3 ">
                <a href="#" id="hakisan" class="btn btn-primaryred btn-sm btn-block"> Kawalan Hakisan</a>
            </div>

            <div class="col-md-3 ">
                <a href="#" id="kawalan" class="btn btn-primaryred btn-sm btn-block"> Kawalan Lain-lain </a>
            </div>
            <div class="col-md-3 ">
                <a href="#" id="permukaan" class="btn btn-primaryred btn-sm btn-block"> Kawalan Air Larian Permukaan </a>
            </div>

            <div class="col-md-3 ">
                <a href="#" id="sedimen" class="btn btn-primaryred btn-sm btn-block"> Kawalan Sedimen</a>
            </div>

        </div>
    </div>
</div>
<br>

<div id="rootwizard" class="elemen">
    <!-- Nav tabs -->
    @include('form.accessTab') {{-- yang ni tak payah tukar --}}
</div>
<div id="rootwizard" class="elemen1">
    <!-- Nav tabs -->
    @include('form.kawalanHakisan') {{-- nnti tukar kat sini --}}
</div>
<div id="rootwizard" class="elemen2">
    <!-- Nav tabs -->
    @include('form.kawalanLain') {{-- nnti tukar kat sini --}}
</div>
<div id="rootwizard" class="elemen3">
    <!-- Nav tabs --> 
    @include('form.kawalanAir') {{-- nnti tukar kat sini --}}
</div>
<div id="rootwizard" class="elemen4">
    <!-- Nav tabs -->
    @include('form.kawalanSedimen') {{-- nnti tukar kat sini --}}
</div>



<!-- Tab panes -->

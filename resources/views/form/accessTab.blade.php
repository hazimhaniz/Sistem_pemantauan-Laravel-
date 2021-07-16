<style>
    .text-info {
    color: #ba6a64!important;
}
</style>

<div id="rootwizard">
    <!-- Nav tabs -->
    <ul class="nav nav-tabs nav-tabs-linetriangle nav-tabs-separator nav-stack-sm" id="myTab2" role="tablist">
        <li class="nav-item">
            <a class="" data-toggle="tab" href="#" data-target="#tabKP1" role="tab" onclick=""> <span>
                 <i class="fas fa-sensor-alert fa-lg text-info"> </i> AKSES KELUAR MASUK </span></a>
        </li>
        <li class="nav-item">
            <a class="" data-toggle="tab" href="#" data-target="#tabKP2" role="tab" onclick=""> <span> 
                <i class="far fa-exclamation-triangle fa-lg text-info"></i> KAWASAN
                    SENSITIF </span></a>
        </li>
        <li class="nav-item">
            <a class="" data-toggle="tab" href="#" data-target="#tabKP3" role="tab" onclick=""> <span> 
                <i class="fas fa-integral fa-lg text-info"></i>  
                KAWASAN LALUAN AIR
                    LARIAN PERMUKAAN </span></a>
        </li>
        <li class="nav-item">
            <a class="" data-toggle="tab" href="#" data-target="#tabKP4" role="tab" onclick=""> <span>
                <i class="far fa-tachometer-slowest fa-lg text-info"></i> PERIMETER TAPAK
                </span></a>
        </li>
        <li class="nav-item">
            <a class="" data-toggle="tab" href="#" data-target="#tabKP5" role="tab" onclick=""> <span>
                <i class="far fa-mountains fa-lg text-info"></i> KAWASAN
                    PENGAMBILAN TANAH </span></a>
        </li>
        <li class="nav-item">
            <a class="" data-toggle="tab" href="#" data-target="#tabKP6" role="tab" onclick=""> <span>
                <i class="fal fa-dumpster fa-lg text-info"></i> TAPAK
                    PELUPUSAN</span></a>
        </li>
        <li class="nav-item">
            <a class="" data-toggle="tab" href="#" data-target="#tabKP7" role="tab" onclick=""> <span>
                <i class="far fa-box-alt fa-lg text-info"></i> PENSTORAN
                    BAHAN</span></a>
        </li>
        <li class="nav-item">
            <a class="" data-toggle="tab" href="#" data-target="#tabKP8" role="tab" onclick=""> <span>
                <i class="far fa-clipboard-list fa-lg text-info"></i> FASA 2 JADUAL
                    PEMBINAAN</span></a>
        </li>
        <li class="nav-item">
            <a class="" data-toggle="tab" href="#" data-target="#tabKP9" role="tab" onclick=""> <span>
                <i class="far fa-tools fa-lg text-info"></i> REKOD
                    PENYELENGGARAAN BMPs </span></a>
        </li>
        <li class="nav-item">
            <a class="" data-toggle="tab" href="#" data-target="#tabKP10" role="tab" onclick=""> <span>
                <i class="fad fa-clone fa-lg text-info"></i> PENGURUSAN
                    BUANGAN</span></a>
        </li>
        <li class="nav-item">
            <a class="" data-toggle="tab" href="#" data-target="#tabKP11" role="tab" onclick=""> <span>
                <i class="far fa-palette fa-lg text-info"></i> KAWASAN
                    BANCUHAN</span></a>
        </li>
    </ul>
 
    <div class="tab-content">
        <div class="tab-pane active" id="tabKP1">
            @include('form.borangD.access')
        </div>
        <div class="tab-pane disable" id="tabKP2">
            @include('form.borangD.place')
        </div>
        <div class="tab-pane disable" id="tabKP3">
            @include('form.borangD.air')
        </div>
        <div class="tab-pane disable" id="tabKP4">
            @include('form.borangD.parameter')
        </div>
        <div class="tab-pane disable" id="tabKP5">
            @include('form.borangD.tanah')
        </div>
        <div class="tab-pane disable" id="tabKP6">
            @include('form.borangD.pelupusan')
        </div>
        <div class="tab-pane disable" id="tabKP7">
            @include('form.borangD.bahan')
        </div>
        <div class="tab-pane disable" id="tabKP8">
            @include('form.borangD.jadual')
        </div>
        <div class="tab-pane disable" id="tabKP9">
            @include('form.borangD.selenggara')
        </div>
        <div class="tab-pane disable" id="tabKP10">
            @include('form.borangD.buangan')
        </div>
        <div class="tab-pane disable" id="tabKP11">
            @include('form.borangD.bancuhan')
        </div>
       
       
    </div>
   
</div>


<style>
    .text-info {
    color: #ba6a64!important;
}
</style>

<div id="rootwizard">
    <!-- Nav tabs -->
    <ul class="nav nav-tabs nav-tabs-linetriangle nav-tabs-separator nav-stack-sm" id="myTab2" role="tablist">
        <li class="nav-item">
            <a class="active" data-toggle="tab" href="#" data-target="#tabKP1Hujan1" role="tab"> <span>
                 <i class="fas fa-sensor-alert fa-lg text-info"> </i> AKSES KELUAR MASUK </span></a>
        </li>
        <li class="nav-item">
            <a class="hujanTab" data-toggle="tab" href="#" data-target="#tabKP2Hujan2" role="tab"> <span> 
                <i class="far fa-exclamation-triangle fa-lg text-info"></i> KAWASAN
                    SENSITIF </span></a>
        </li>
        <li class="nav-item">
            <a class="hujanTab" data-toggle="tab" href="#" data-target="#tabKP3Hujan3" role="tab"> <span> 
                <i class="fas fa-integral fa-lg text-info"></i>  
                KAWASAN LALUAN AIR
                    LARIAN PERMUKAAN </span></a>
        </li>
        <li class="nav-item">
            <a class="hujanTab" data-toggle="tab" href="#" data-target="#tabKP4Hujan4" role="tab"> <span>
                <i class="far fa-tachometer-slowest fa-lg text-info"></i> PARAMETER TAPAK
                </span></a>
        </li>
        <li class="nav-item">
            <a class="hujanTab" data-toggle="tab" href="#" data-target="#tabKP5Hujan5" role="tab"> <span>
                <i class="far fa-mountains fa-lg text-info"></i> KAWASAN
                    PENGAMBILAN TANAH </span></a>
        </li>
        <li class="nav-item">
            <a class="hujanTab" data-toggle="tab" href="#" data-target="#tabKP6Hujan6" role="tab"> <span>
                <i class="fal fa-dumpster fa-lg text-info"></i> TAPAK
                    PELUPUSAN</span></a>
        </li>
        <li class="nav-item">
            <a class="hujanTab" data-toggle="tab" href="#" data-target="#tabKP7Hujan7" role="tab"> <span>
                <i class="far fa-box-alt fa-lg text-info"></i> PENSTORAN
                    BAHAN</span></a>
        </li>
        <li class="nav-item">
            <a class="hujanTab" data-toggle="tab" href="#" data-target="#tabKP8Hujan8" role="tab"> <span>
                <i class="far fa-clipboard-list fa-lg text-info"></i> FASA 2 JADUAL
                    PEMBINAAN</span></a>
        </li>
        <li class="nav-item">
            <a class="hujanTab" data-toggle="tab" href="#" data-target="#tabKP9Hujan9" role="tab"> <span>
                <i class="far fa-tools fa-lg text-info"></i> REKOD
                    PENYELENGGARAAN BMPs </span></a>
        </li>
        <li class="nav-item">
            <a class="hujanTab" data-toggle="tab" href="#" data-target="#tabKP10Hujan10" role="tab"> <span>
                <i class="fad fa-clone fa-lg text-info"></i> PENGURUSAN
                    BUANGAN</span></a>
        </li>
        <li class="nav-item">
            <a class="hujanTab" data-toggle="tab" href="#" data-target="#tabKP11Hujan11" role="tab"> <span>
                <i class="far fa-palette fa-lg text-info"></i> KAWASAN
                    BANCUHAN</span></a>
        </li>
    </ul>
    <div class="tab-content" style="background-color:# !important;">
        <div class="tab-pane paneHujan tabKP1Hujan1 active" id="tabKP1Hujan1">
            @include('form.hujan.elemen_pemeriksaan.access')
        </div>
        <div class="tab-pane paneHujan tabKP2Hujan2 " id="tabKP2Hujan2">
            @include('form.hujan.elemen_pemeriksaan.place')
        </div>
        <div class="tab-pane paneHujan tabKP3Hujan3 " id="tabKP3Hujan3">
            @include('form.hujan.elemen_pemeriksaan.air')
        </div>
        <div class="tab-pane paneHujan tabKP4Hujan4 " id="tabKP4Hujan4">
            @include('form.hujan.elemen_pemeriksaan.parameter')
        </div>
        <div class="tab-pane paneHujan tabKP5Hujan5 " id="tabKP5Hujan5">
            @include('form.hujan.elemen_pemeriksaan.tanah')
        </div>
        <div class="tab-pane paneHujan tabKP6Hujan6 " id="tabKP6Hujan6">
            @include('form.hujan.elemen_pemeriksaan.pelupusan')
        </div>
        <div class="tab-pane paneHujan tabKP7Hujan7 " id="tabKP7Hujan7">
            @include('form.hujan.elemen_pemeriksaan.bahan')
        </div>
        <div class="tab-pane paneHujan tabKP8Hujan8 " id="tabKP8Hujan8">
            @include('form.hujan.elemen_pemeriksaan.jadual')
        </div>
        <div class="tab-pane paneHujan tabKP9Hujan9 " id="tabKP9Hujan9">
            @include('form.hujan.elemen_pemeriksaan.selenggara')
        </div>
        <div class="tab-pane paneHujan tabKP10Hujan10 " id="tabKP10Hujan10">
            @include('form.hujan.elemen_pemeriksaan.buangan')
        </div>
        <div class="tab-pane paneHujan tabKP11Hujan11 " id="tabKP11Hujan11">
            @include('form.hujan.elemen_pemeriksaan.bancuhan')
        </div>  
    </div>
   
</div>

<script>
    $(".hujanTab").on('click', function(){
        // console.log($(this).attr('data-target'));

        var targetClass = $(this).attr('data-target');
        targetClass = targetClass.replace("#", ".");
        $(".paneHujan").removeClass('active');

        console.log(targetClass);
        $(targetClass).addClass('active');
        // $(targetID).tab('show');
    });
</script>
<style>
    th {
        
        color: #000 !important;
        border-top: none;
        border-left: none !important;
        font-family: 'Montserrat' !important;
        font-size: 10.5px !important;
        letter-spacing: 0.06em !important;
        /* text-transform: uppercase !important; */
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
        border-right: none !important;
        */ font-family: 'Montserrat' !important;
        font-size: 10.5px !important;
        letter-spacing: 0.06em !important;
        /* text-transform: uppercase !important; */
    }

</style>


<div class="card-block">
    <div id="rootwizard">
        <!-- Nav tabs -->

        <ul class="nav nav-tabs nav-tabs-linetriangle nav-tabs-separator nav-stack-sm" id="myTab" role="tablist">
            <li class="nav-item ml-md-6">
                <a class="active" data-toggle="tab" href="#" data-target="#tabstesen1" role="tab" onclick=""><span><i class="fas fa-water fa-lg text-success"></i>
                        SUNGAI</span></a>
            </li>
            <li class="nav-item">
                <a class="" data-toggle="tab" href="#" data-target="#tabstesen2" role="tab" onclick=""><span>
                    <i class="fas fa-ship fa-lg text-success"></i> MARIN</span></a>
            </li>
            <li class="nav-item">
                <a class="" data-toggle="tab" href="#" data-target="#tabstesen3" role="tab" onclick=""><span>
                    <i class="fas fa-wave-sine fa-lg text-success"></i></i> TASIK</span></a>
            </li>
            <li class="nav-item">
                <a class="" data-toggle="tab" href="#" data-target="#tabstesen4" role="tab" onclick=""><span>
                    <i class="fas fa-cloud-sleet fa-lg text-success"></i></i> AIR TANAH</span></a>
            </li>
            <li class="nav-item">
                <a class="" data-toggle="tab" href="#" data-target="#tabstesen5" role="tab" onclick=""><span>
                    <i class="fas fa-ring fa-lg text-success"></i>KOLAM</span></a>
            </li>
            <li class="nav-item">
                <a class="" data-toggle="tab" href="#" data-target="#tabstesen6" role="tab" onclick=""><span>
                    <i class="far fa-wind fa-lg text-success"></i>  UDARA</span></a>
            </li>
            <li class="nav-item">
                <a class="" data-toggle="tab" href="#" data-target="#tabstesen7" role="tab" onclick=""><span>
                    <i class="fas fa-waveform-path fa-lg text-success"></i> BUNYI BISING </span></a>
            </li>
            <li class="nav-item">
                <a class="" data-toggle="tab" href="#" data-target="#tabstesen8" role="tab" onclick=""><span>
                    <i class="fal fa-heart-rate fa-lg text-success"></i>  GETARAN </span></a>
            </li>
            <li class="nav-item">
                <a class="" data-toggle="tab" href="#" data-target="#tabstesen9" role="tab" onclick=""><span>
                    <i class="fal fa-drone-alt fa-lg text-success"></i> DRON </span></a>
            </li>

        </ul>
    </div>
    <!-- Tab panes -->
    <div class="tab-content">
        <div class="tab-pane active" id="tabstesen1">
            @include('form.stesenSungai')
        </div>
        <div class="tab-pane disable" id="tabstesen2">
            @include('form.stesenMarin')
        </div>
        <div class="tab-pane disable" id="tabstesen3">
            @include('form.stesenTasik')
        </div>
        <div class="tab-pane disable" id="tabstesen4">
            @include('form.stesenAirTanah')
        </div>
        <div class="tab-pane disable" id="tabstesen5">
            @include('form.stesenKolam')
        </div>
        <div class="tab-pane disable" id="tabstesen6">
            @include('form.stesenUdara')
        </div>
        <div class="tab-pane disable" id="tabstesen7">
            @include('form.stesenBunyi')
        </div>
        <div class="tab-pane disable" id="tabstesen8">
            @include('form.stesenGetaran')
        </div>
        <div class="tab-pane disable" id="tabstesen9">
            @include('form.stesenDron')
        </div>
    </div>
</div>

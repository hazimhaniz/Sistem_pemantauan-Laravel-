<div class="container-fluid container-fixed-lg bg-white">
    <!-- <div class="card card-transparent"> -->
    <div class="card card-sng" style="background-color:# !important;">


            <ul id="tabs-sng" class="nav nav-tabs nav-tabs-blue nav-tabs-fillup d-none d-md-flex d-lg-flex d-xl-flex"
                role="tablist" style="background-color:# !important;">
                    <li class="nav-item">
                        <a class="active" data-toggle="tab" href="#" data-target="#fasa2tab2" role="tab" onclick=""><span>(B)
                                EIA 2-18</span></a>
                    </li>
                    <li class="nav-item ">
                        <a class="" data-toggle="tab" href="#" data-target="#fasa2tab3" role="tab" onclick=""><span>(C)
                                Audit</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="" data-toggle="tab" href="#" data-target="#fasa2tab4" role="tab" onclick=""><span>(D)
                            BMP's</span></a>
                    </li>
            </ul>
     
        <!-- Tab panes -->
        <div class="tab-content">
            <div class="tab-pane active" id="fasa2tab2">
               @include ('form.tabs2')
            </div>
            <div class="tab-pane disable" id="fasa2tab3"> 
                @include('form.tabs3')
            </div>
            <div class="tab-pane disable" id="fasa2tab4">
                @include('form.tabs4')
            </div>
        </div>
    </div>
</div>
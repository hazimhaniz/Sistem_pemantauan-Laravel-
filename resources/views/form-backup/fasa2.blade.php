<div class="container-fluid container-fixed-lg bg-white">
        
    <!-- START card -->
    <!-- <div class="card card-transparent"> -->
    <div class="card card-sng" style="background-color:# !important;">

        
    

            <ul id="tabs-sng" class="nav nav-tabs nav-tabs-blue nav-tabs-fillup d-none d-md-flex d-lg-flex d-xl-flex"
                role="tablist" style="background-color:# !important;">
        <li class="nav-item">
            <a class="active" data-toggle="tab" href="#" data-target="#tab2" role="tab"><span>(B)
                    EIA 2-18</span></a>
        </li>
        <li class="nav-item ">
            <a class="" data-toggle="tab" href="#" data-target="#tab3" role="tab"><span>(C)
                    Audit</span></a>
        </li>
        <li class="nav-item">
            <a class="" data-toggle="tab" href="#" data-target="#tab4" role="tab"><span>(D)
                BMP's</span></a>
        </li>
            </ul>
     
        <!-- Tab panes -->
        <div class="tab-content">
            <div class="tab-pane active" id="tab2">
               @include ('form.tabs2')
            </div>
            <div class="tab-pane disable" id="tab3">
                
                @include('form.tabs3')
            </div>
            <div class="tab-pane disable" id="tab4">
                
                @include('form.tabs4')
            </div>
        </div>
    </div>
</div>

<style>
    .widget-9 {
        height: unset !important;
        padding-bottom: 20px;
        padding-top: 20px;
    }
    
    .text-black {
        color: #000 !important;
    }
    
    x-small {
        font-size: medium !important;
    }
    
    .modal-open .select2-container {
        z-index: unset !important;
    }
    
    /****************** Card Standard Size ******************/
    .card-counter {
        box-shadow: 2px 2px 10px #DADADA;
        padding: 20px 10px;
        background-color: #fff;
        height: 100px;
        border-radius: 5px;
        transition: .3s linear all;
    }
    
    .card{
        border: none;
    }
    
    
    .card-counter:hover {
        box-shadow: 4px 4px 20px #DADADA;
        transition: .3s linear all;
    }
    
    .card-counter i {
        font-size: 4em;
        opacity: 0.2;
    }
    
    .card-counter .count-numbers {
        position: absolute;
        right: 35px;
        top: 20px;
        font-size: 28px;
        display: block;
    }
    
    .card-counter .count-name {
        position: absolute;
        right: 35px;
        top: 65px;
        font-style: italic;
        text-transform: capitalize;
        opacity: 0.5;
        display: block;
        font-size: 12px;
    }
    
    .smallcard-sng.card-counter.active {
        background-color: #1f3953;
        color: #FFF;
    }
    
    .smallcard-sng.card-counter.unactive {
        background-color: #b9d3e8;
        color: #FFF;
    }
    
    /****************** End Card Standard Size ******************/
    
    /****************** Card Small Size ******************/
    .card-counter-small {
        box-shadow: 2px 2px 10px #DADADA;
        padding: 20px 10px;
        background-color: #fff;
        height: 100px;
        border-radius: 5px;
        transition: .3s linear all;
    }
    
    .card-counter-small:hover {
        box-shadow: 4px 4px 20px #DADADA;
        transition: .3s linear all;
    }
    
    .card-counter-small i {
        font-size: 1.5em;
        opacity: 0.2;
    }
    
    .card-counter-small .count-numbers-small {
        position: absolute;
        right: 30px;
        top: 15px;
        font-size: 20px;
        display: block;
    }
    
    .card-counter-small .count-name-small {
        position: absolute;
        right: 35px;
        top: 55px;
        font-style: italic;
        text-transform: capitalize;
        opacity: 0.5;
        display: block;
        font-size: 12px;
    }
    
    .smallcard-sng.card-counter-small.active {
        background-color: #1f3953;
        color: #FFF;
    }
    
    .smallcard-sng.card-counter-small.unactive {
        background-color: #b9d3e8;
        color: #FFF;
    }
    
    /****************** End Card Small Size ******************/
    
    .grafico {
        min-width: 310px;
        max-width: 400px;
        height: 280px;
        margin: 0 auto
    }
    
    .grafico1 {
        min-width: 310px;
        max-width: 400px;
        width: 500px;
        height: 280px;
        margin: 0 auto
    }
    
    .main-header {
        font-size: x-large;
        color: #888;
        font-family: Verdana;
        margin-bottom: 20px;
    }
    
    .destaque {
        color: #f88;
        font-weight: bolder;
    }
    
    .highcharts-tooltip h3 {
        margin: 0.3em 0;
    }
    
    
    .nav-tabs-blue.nav-tabs-fillup>li>a:after {
        background: none repeat scroll 0 0 #006c80;
        border: 1px solid #006c80;
    }
    
    
    .tableSummaryStatus>thead>tr>th {
        
        //background-color: #ebe8ec;
        background-color: #ffff;
        color: #000 !important;
        
        border-top: none !important;
        border-left: none !important;
        border-right: none !important;
        //border-bottom: none !important;
        
        font-family: 'Montserrat' !important;
        font-size: 10.5px !important;
        letter-spacing: 0.06em !important;
        /* text-transform: uppercase !important; */
        font-weight: 500 !important;
        padding: 4px !important;
        margin-left: 4px !important;
        
        text-align: center !important;
        
    }
    
    .tableSummaryStatus>tbody>tr>td {
        
        border-top: none !important;
        border-left: none !important;
        border-right: none !important;
        border-bottom: none !important;
        
        font-family: 'Montserrat' !important;
        font-size: 10.5px !important;
        letter-spacing: 0.06em !important;
        /* text-transform: uppercase !important; */
        font-weight: 500 !important;
        padding: 0px !important;
        margin-left: 0px !important;
        margin-right: 0px !important;
        
        //text-align: center !important;
        
    }
    
    .tableSummaryFRP>thead>tr>th {
        
        //background-color: #ebe8ec;
        background-color: #ffff;
        color: #000 !important;
        
        border-top: none !important;
        border-left: none !important;
        border-right: none !important;
        //border-bottom: none !important;
        
        font-family: 'Montserrat' !important;
        font-size: 10.5px !important;
        letter-spacing: 0.06em !important;
        /* text-transform: uppercase !important; */
        font-weight: 500 !important;
        padding: 4px !important;
        margin-left: 4px !important;
        
        text-align: center !important;
        
    }
    
    .tableSummaryFRP>tbody>tr>td {
        
        border-top: none !important;
        border-left: none !important;
        border-right: none !important;
        border-bottom: none !important;
        
        font-family: 'Montserrat' !important;
        font-size: 10.5px !important;
        letter-spacing: 0.06em !important;
        /* text-transform: uppercase !important; */
        font-weight: 500 !important;
        padding: 0px !important;
        margin-left: 0px !important;
        margin-right: 0px !important;
        
        //text-align: center !important;
        
    }
    
    
    .tableSummaryAppStatus>thead>tr>th {
        
        //background-color: #ebe8ec;
        //background-color: #ffff;
        //color: #000 !important;
        //color: #eeee !important;
        
        border-top: none !important;
        border-left: none !important;
        border-right: none !important;
        //border-bottom: none !important;
        
        font-family: 'Montserrat' !important;
        font-size: 10.5px !important;
        letter-spacing: 0.06em !important;
        /* text-transform: uppercase !important; */
        font-weight: 500 !important;
        padding: 4px !important;
        margin-left: 4px !important;
        
        text-align: center !important;
        
    }
    
    .tableSummaryAppStatus>tbody>tr>td {
        
        border-top: none !important;
        border-left: none !important;
        border-right: none !important;
        border-bottom: none !important;
        
        font-family: 'Montserrat' !important;
        font-size: 10.5px !important;
        letter-spacing: 0.06em !important;
        /* text-transform: capitalize !important; */
        font-weight: 500 !important;
        padding: 4px !important;
        margin-left: 0px !important;
        margin-right: 0px !important;
        
        //text-align: center !important;
        
    }
    
    
    table {
        border-collapse: separate;
        border: solid #DDDDDD 1px;
        border-radius: 6px;
        -moz-border-radius: 6px;
    }
    
    td:first-child,
    th:first-child {
        border-left: none;
    }
    
    
    .FRPprofile {
        
        font-family: 'Montserrat' !important;
        font-size: 10.5px !important;
        letter-spacing: 0.06em !important;
        text-transform: uppercase !important;
        font-weight: 500 !important;
    }
    
    .FRPprofilebtn {
        
        font-family: 'Montserrat' !important;
        font-size: 9.5px !important;
        letter-spacing: 0.06em !important;
        text-transform: uppercase !important;
        font-weight: 500 !important;
    }
    
    
    .label.label-darkblue-gradient-1 {
        color: #fff;
        background-color: #131c32;
        font-size: 8.5px !important;
    }
    
    .label.label-darkblue-gradient-2 {
        color: #fff;
        background-color: #041b3b;
        font-size: 8.5px !important;
    }
    
    .label.label-darkblue-gradient-3 {
        color: #fff;
        background-color: #303b58;
        font-size: 8.5px !important;
    }
    
    .label.label-darkblue-gradient-4 {
        color: #fff;
        background-color: #565d77;
        font-size: 8.5px !important;
    }
    
    .label.label-darkblue-gradient-5 {
        color: #fff;
        background-color: #7e8398;
        font-size: 8.5px !important;
    }
    
    .label.label-darkblue-gradient-6 {
        color: #fff;
        background-color: #a8abb9;
        font-size: 8.5px !important;
    }
    
    .label.label-darkblue-gradient-7 {
        color: #fff;
        background-color: #d3d4db;
        font-size: 8.5px !important;
    }
    
    .label.label-light-grey {
        color: #3F4254;
        background-color: #EBEDF3;
        font-size: 8.5px !important;
    }
    
    .label.label-light-blue {
        color: #3699FF;
        background-color: #E1F0FF;
        font-size: 8.5px !important;
    }
    
    .label.label-light-purple {
        color: #8950FC;
        background-color: #EEE5FF;
        font-size: 8.5px !important;
    }
    
    .label.label-light-warning {
        color: #FFA800;
        background-color: #FFF4DE;
        font-size: 8.5px !important;
    }
    
    .label.label-light-success {
        color: #1BC5BD;
        background-color: #C9F7F5;
        font-size: 8.5px !important;
    }
    
    .label.label-light-danger {
        color: #F64E60;
        background-color: #FFE2E5;
        font-size: 8.5px !important;
    }
    
    .label.label-invisible {
        color: #ffff;
        background-color: #ffff;
        font-size: 8.5px !important;
    }
    
    .label-status-count {
        font-size: 13px !important;
    }
    
    .label-status-count-invisible {
        font-size: 13px !important;
        color: #ffff !important;
    }
    
    .label-status-count-total {
        font-size: 22px !important;
        font-weight: 300 !important;
    }
    .blink {
        animation: blinker 1s linear infinite;
    }
    
    @keyframes blinker { 
        
        50% { opacity: 0;
            color: #000; }
        }
    </style>
<div class=" container-fluid container-fixed-lg bg-white m-t-20">
    <ul id="tabs-sng" class="nav nav-tabs nav-tabs-blue nav-tabs-fillup d-none d-md-flex d-lg-flex d-xl-flex" role="tablist" style="background-color:# !important;">
    <li class="nav-item ml-md-3">
            <a class="active" data-toggle="tab" data-target="#DBtab1" role="tab" aria-selected="false"><span>Status Kerja</span></a>
        </li>
<!--         <li class="nav-item ml-md-3">
            <a class="" data-toggle="tab" data-target="#DBtab2" role="tab" aria-selected="false"><span> Sejarah Rumusan</span></a>
        </li> -->
        @hasanyrole(['superadmin|staff|penyiasat|penyelia|pengarah'])
        <li class="nav-item">
            <a class="" data-toggle="tab" data-target="#DBtab3" role="tab" aria-selected="true"><span> Statistik Stesen Pengawasan</span></a>
        </li>
        @endhasrole
        @hasanyrole(['superadmin|staff|penyiasat|penyelia|pengarah'])
        <li class="nav-item">
            <a class="" data-toggle="tab" data-target="#DBtab4" role="tab" aria-selected="false"><span> Statistik EIA</span></a>
        </li>
        @endhasrole
        @hasanyrole(['superadmin|staff|penyiasat|penyelia|pengarah'])
        <li class="nav-item">
            <a class="" data-toggle="tab" data-target="#DBtab5" role="tab" aria-selected="false"><span>Statistik Permarkahan</span></a>
        </li>
        @endhasrole
        @hasanyrole(['superadmin|staff|penyiasat|penyelia|pengarah'])
        <li class="nav-item">
            <a class="" data-toggle="tab" data-target="#DBtab6" role="tab" aria-selected="false"><span> Statistik Perbandingan</span></a>
        </li>
        @endhasrole
    </ul>
    <div class="tab-content" style="background-color:# !important;">
        <div class="tab-pane active" id="DBtab1">
            @include('dashboard.statusKerja')
        </div>
        <div class="tab-pane disable" id="DBtab2">
            @include('dashboard.maindash')
        </div>
        <div class="tab-pane disable" id="DBtab3">
        @include('form.statistics.statistikPengawasan')
        </div>
        <div class="tab-pane disable" id="DBtab4">
        @include('form.statistics.statistikEia')
        </div>
        <div class="tab-pane disable" id="DBtab5">
        @include('form.statistics.statistikPermarkahan')
        </div>
        <div class="tab-pane disable" id="DBtab6">
            @include('form.statistics.statisticPerbandingan')
        </div>
        
    </div>
</div>  

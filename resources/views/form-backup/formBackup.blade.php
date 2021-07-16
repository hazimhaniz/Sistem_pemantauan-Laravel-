<style>
    .bg-complete {
        background-color: #8ac926 !important;
    }

    .bg-danger {
        background-color: #ff595e !important;
    }

    .bg-pending {
        background-color: #939393 !important;
    }

    .bg-success {
        background-color: #8ac926 !important;
    }

    .rounded {
        //border-radius:.25rem!important
    }

    p,
    a,
    .font-montserrat,
    .bold {

        color: #fff;
    }

    a:hover {

        color: #fff;
    }

    .rounded {
        //width:500px;
        //height:300px;
        //background:lightGrey; 
        border-radius: 10px 10px 10px 10px;
        //overflow:hidden;
    }

    .font-montserrat {

        font-size: 14px !important;
    }

    .hide {
        display: none;
    }

    .dash-baha {
        background-color: #ffffff;
        color: #923535;
        border-color: #923535;
    }

    .dash {
        background-image: none;
        box-shadow: none;
        text-shadow: none;
        padding: 9px 19px 9px 15px;
        border-radius: 3px;
        font-size: 13px;
        border-width: 0;
        -webkit-transition: all 0.2s linear 0s;
        transition: all 0.2s linear 0s;
    }

    .dash-baha {
        color: #721c24;
        background-color: #ffffff;
        border-color: #f5c6cb;
    }

    .baha {
        position: relative;
        padding: 5px 1.25rem;
        margin-bottom: 3px;
        border: 1px solid transparent;
        border-radius: .25rem;
    }

    .indi-label {
        pointer-events: none;
        border: 2px solid white;
        width: 92px;
    }

    .indi-stat {
        width: 46%;
        pointer-events: none;
    }

    h3 {
        font-size: 17px !important;
    }

    .div {
        text-align: center;
    }

    .font-size-lg {
        font-size: 14px;
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
        font-family: 'Montserrat' !important;
        font-size: 10.5px !important;
        letter-spacing: 0.06em !important;
        /* text-transform: uppercase !important; */
        font-weight: 500 !important;
        padding: 4px !important;
        margin-left: 4px !important;
    }

    .label-status-count-invisible {
        //font-size: 9.5px !important;
        color: #ffff !important;
        font-family: 'Montserrat' !important;
        font-size: 10.5px !important;
        letter-spacing: 0.06em !important;
        /* text-transform: uppercase !important; */
        font-weight: 500 !important;
        padding: 4px !important;
        margin-left: 4px !important;
    }

    .label-status-count-total {
        font-size: 9.5px !important;
        font-weight: 300 !important;
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
        font-size: 9.5px !important;
        letter-spacing: 0.06em !important;
        /* text-transform: uppercase !important; */
        font-weight: 500 !important;
        padding: 6px !important;
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

    td{
        font-family: 'Montserrat' !important; 
    }

    td:first-child,
    th:first-child {
        border-left: none;
    }

    .no-gutters {
        padding: 10px !important;
    }

    .dashTitle {
        font-family: 'Montserrat' !important;
        font-size: 12.5px !important;
        letter-spacing: 0.06em !important;
        /* text-transform: uppercase !important; */
        font-weight: 500 !important;

    }

</style>


<style type="text/css">
    .circle-green {
        height: 75px;
        width: 75px;
        background-color: gray;
        border-radius: 50%;
        display: inline-block;
    }

    .number {
        color: '#fff';
        font-size: 35px;
        margin-top: 23px;
        font-weight: bold;
    }


    .dot {
        width: 112px;
        height: 37px;
        border-bottom: 1px dashed #8ac928;
        line-height: 65px;
        /* position: absolute; */
    }

    .title-timeline {
        color: #8ac928;
        margin-top: 30px;
    }


    .card-counter {
        box-shadow: 2px 2px 10px #DADADA;
        //margin: 5px;
        padding: 20px 10px;
        background-color: #fff;
        height: 110px;
        border-radius: 5px;
        transition: .3s linear all;
    }

    .card-counter:hover {
        box-shadow: 4px 4px 20px #DADADA;
        transition: .3s linear all;
    }


    /*
.card-counter.one {
background-color: #323237;
color: #FFF;
}

.card-counter.two {
background-color: #80688c;
color: #FFF;
}

.card-counter.three {
//background-color: #9885a2;
background-color: #cbc0d0;
color: #FFF;
}

.card-counter.four {
background-color: #cbc0d0;
color: #FFF;
}

.card-counter.five {
//background-color: #b1a2b9;
background-color: #cbc0d0;
color: #FFF;
}

.card-counter.six {
//background-color: #b1a2b9;
background-color: #cbc0d0;
color: #FFF;
}
*/
    .card-counter i {
        //font-size: 5em;
        font-size: 3em;
        /* opacity: 0.2; */
    }

    .card-counter .count-numbers {
        /* position: absolute; */
        /* right: 35px; */
        top: 20px;
        //font-size: 32px;
        font-size: 12.5px;
        display: block;
        font-style: italic;
    }

    .card-counter .count-name {
        position: absolute;
        text-align: center;
        top: 15px;
        //font-size: 32px;
        font-size: 12.5px;
        /* display: block; */
        font-style: italic;
        font-family: 'Montserrat' !important;
        font-size: 14px !important;
        letter-spacing: 0.06em !important;
        /* text-transform: uppercase !important; */
        font-weight: 500 !important;
    }

    .smallcard-sng.card-counter.active {
        background-color: rgb(61, 131, 189);
        color: #FFF;
    }

    .smallcard-sng.card-counter.unactive {
        background-color: #b9d3e8;
        color: #FFF;
    }

    .btn-primary {
        font-size: 10.5px;
        font-family: 'Montserrat';
        background-color: #071f33;

        font-weight: normal;
        letter-spacing: 0.01em;
        -webkit-font-smoothing: antialiased;
        -webkit-text-size-adjust: 100%;
        -ms-text-size-adjust: 100%;
        -webkit-font-feature-settings: "kern"1;
        -moz-font-feature-settings: "kern"1;
        margin-right: 4px;
        margin-bottom: 6px;
        border: 1px solid #e7e7e7;
        border-radius: 5px;
        text-align: center !important;
        vertical-align: middle;
        cursor: pointer;
    }
    

</style>

{{-- <div class="row">
    <div class="col-md-12">
        <div class="dashTitle">&nbsp; <i class="fa fa-line-chart" aria-hidden="true"></i> JENIS PENGAWASAN </div>
        <div class="row no-gutters">
            <div class="col-md-2 ">
                <button type="button" class="btn btn-primary btn-sm btn-block">SUNGAI</button>
            </div>

            <div class="col-md-2 ">
                <button type="button" class="btn btn-primary btn-sm btn-block">MARIN</button>
            </div>

            <div class="col-md-2 ">
                <button type="button" class="btn btn-primary btn-sm btn-block">TASIK</button>
            </div>
            <div class="col-md-2 ">
                <button type="button" class="btn btn-primary btn-sm btn-block">AIR TANAH</button>
            </div>

            <div class="col-md-2 ">
                <button type="button" class="btn btn-primary btn-sm btn-block">KOLAM</button>
            </div>
            <div class="col-md-2 ">
                <button type="button" class="btn btn-primary btn-sm btn-block">UDARA</button>
            </div>

            <div class="col-md-2 ">
                <button type="button" class="btn btn-primary btn-sm btn-block">BUNYI BISING</button>
            </div>

            <div class="col-md-2 ">
                <button type="button" class="btn btn-primary btn-sm btn-block">GETARAN</button>
            </div>

            <div class="col-md-2 ">
                <button type="button" class="btn btn-primary btn-sm btn-block">DRON</button>
            </div>

        </div>

    </div>

</div> --}}

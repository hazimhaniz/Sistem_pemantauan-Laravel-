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
        color: #000 ;
      
        border-top: 1px solid #DDDDDD;
      
        border-left: 1px solid #DDDDDD;
        border-top: none !important;
        border-left: none !important;
        border-bottom: none !important;
        border-right: none !important; */
        font-family: 'Montserrat' !important;
        font-size: 10.5px !important;
        letter-spacing: 0.06em !important;
        
        
    }
    
    .btn-primaryred {
        background-color: #b3daf1 !important;
        color: black;
    }
    .btn-primaryred:hover {
        background-color: #d4dde3 !important;
        color: black;
    }

    @media (min-width: 992px) {
  .modal-xl {
    width: 1200px !important;
  }
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
                <a href="#" id="permukaan" class="btn btn-primaryred btn-sm btn-block"> Kawalan Air Larian Permukaan </a>
            </div>
            
            <div class="col-md-3 ">
                <a href="#" id="hakisan" class="btn btn-primaryred btn-sm btn-block"> Kawalan Hakisan</a>
            </div>            
            <div class="col-md-3 ">
                <a href="#" id="sedimen" class="btn btn-primaryred btn-sm btn-block"> Kawalan Sedimen</a>
            </div>            
            <div class="col-md-3 ">
                <a href="#" id="kawalan" class="btn btn-primaryred btn-sm btn-block"> Kawalan Lain-lain </a>
            </div>            
        </div>
    </div>
</div>
<br>

<div id="rootwizard" class="elemen">
    <!-- Nav tabs -->
    @include('form.accessTab')
</div>
<div id="rootwizard" class="elemen3">
    <!-- Nav tabs --> 
    @include('form.kawalanAir')
</div>
<div id="rootwizard" class="elemen1">
    <!-- Nav tabs -->
    @include('form.kawalanHakisan')
</div>
<div id="rootwizard" class="elemen4">
    <!-- Nav tabs -->
    @include('form.kawalanSedimen')
</div>
<div id="rootwizard" class="elemen2">
    <!-- Nav tabs -->
    @include('form.kawalanLain')
</div>



<div class="col-md-12 p-t-20">
    <ul class="pager wizard no-style">        
        @hasanyrole('pp')
        @if($borangD->status_id == 13)
        <li>
            <button id="tindakanBorangDPP" onclick="tindakanBorangD({{ $borangD->id }}, 602)" type="button" class="btn btn-success btn-cons from-left pull-right">
                <span>Sahkan</span>
            </button>
        </li>
        @endif
        @endhasanyrole
        
    </ul>
</div>

<script>

    var tindakanBorangD;
    $(document).ready(function(){

        tindakanBorangD = function(borangBID, nextStatus){
            console.log(borangBID);
            window.location.replace("{{ url('/projek/tindakan-borang-d') }}/" + borangBID + "/" + nextStatus);
        }
        
    });
</script>

@push('js')
<script type="text/javascript">
   // $('#tindakanBorangDEO').hide();
   var flag1 = $('#flagD1').val(); 
   var flag2 = $('#flagD2').val();
   var flag3 = $('#flagD3').val();
   var flag4 = $('#flagD4').val();
   var flag5 = $('#flagD5').val();

   console.log(flag1);

   if(flag1=='1' && flag2=='1' && flag3=='1' && flag4=='1' && flag5=='1'){
    $('#tindakanBorangDEO').show();
}

</script>
@endpush
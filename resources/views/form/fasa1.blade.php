
<?php
    if (Auth::user()->hasRole('pp')) {
        $user = 'pp';
    } elseif (Auth::user()->hasRole('eo')) {
        $user = 'eo';
    } elseif (Auth::user()->hasRole('emc')) {
        $user = 'emc';
    }
    $projek  = json_decode($projek);

    $borangA = App\MonthlyA::where('projek_id',$projek->id)->where('bulan', $month)->where('tahun', $year)->first();
    $borangB = App\MonthlyB::where('projek_id',$projek->id)->where('bulan', $month)->where('tahun', $year)->first();
    $borangE = App\MonthlyE::where('projek_id',$projek->id)->where('bulan', $month)->where('tahun', $year)->first();
    $borangF = App\MonthlyF::where('projek_id',$projek->id)->where('bulan', $month)->where('tahun', $year)->first();
    $borangD = App\MonthlyD::where('projek_id',$projek->id)->where('bulan', $month)->where('tahun', $year)->first();

    $stesen = App\Models\Stesen::whereIn('projek_id', [$projek->id])->whereIn('status', [13, 607])->where('tahun', $year)->where('bulan', $month)->get()->count();

    $borangC = $borangCs = App\Models\MonthlyC::where('projek_id', $projek->id)->where('bulan', $month)->where('tahun', $year)->get();

    $status602 = false;
    $status13 = false;
    $status11 = false;
    
    foreach ($borangCs as $key => $value) {
        if ($value->status_id == 602) {
            $status602 = true;
        }
        if ($value->status_id == 13) {
            $status13 = true;
        }
        if ($value->status_id == 11) {
            $status11 = true;
        }
    }
?>

<div class="container-fluid container-fixed-lg bg-white">
    <div class="card card-sng" style="background-color:# !important;">
        <ul id="tabs-sng" class="nav nav-tabs nav-tabs-blue nav-tabs-fillup d-none d-md-flex d-lg-flex d-xl-flex" role="tablist" style="background-color:# !important;">
            @if ($user == 'pp')
                @if ($borangB)
                    @if ($borangB->status_id == '602' || $borangB->status_id ==13)
                    <li class="nav-item">
                       
                         <a class="active" data-toggle="tab" href="#" data-target="#fasa1tab2" role="tab" ><span>(B)
                    EIA 2-18</span></a>
                    </li>
                        @else
                     <li class="nav-item">
                        <a><span>(B)EIA 2-18</span></a>
                    </li>
                    @endif
                @else
                 <li class="nav-item">
                    <a><span>(B)EIA 2-18</span></a>
                </li>
                @endif



                @if ($borangC)
                    @if ($status602 || $status13)
                        <li class="nav-item">
                           <a class="active" data-toggle="tab" href="#" data-target="#fasa1tab3" role="tab" ><span>(C) Pengawasan</span></a>
                        </li>
                    @elseif ($stesen >= 1)
                        <li class="nav-item">
                           <a class="active" data-toggle="tab" href="#" data-target="#fasa1tab3" role="tab" onclick=""><span>(C)  Pengawasan</span></a>
                        </li>
                    @else
                         <li class="nav-item">
                            <a><span>(C)  Pengawasan</span></a>
                        </li>
                    @endif
                @elseif ($stesen >= 1)
                        <li class="nav-item">
                           <a class="active" data-toggle="tab" href="#" data-target="#fasa1tab3" role="tab" onclick=""><span>(C)  Pengawasan</span></a>
                        </li>
                @else
                 <li class="nav-item">
                    <a><span>(C)  Pengawasan</span></a>
                </li>
                @endif
                <!-- //for d -->

                @if ($borangD)
                    @if ($borangD->status_id == '602' || $borangD->status_id ==13)
                        <li class="nav-item">
                            <a class="" data-toggle="tab" href="#" data-target="#fasa1tab4" role="tab" ><span>(D) BMP's</span></a>
                        </li>
                    @else
                         <li class="nav-item">
                            <a ><span>(D) BMP's</span></a>
                        </li>
                    @endif
                @else
                 <li class="nav-item">
                    <a ><span>(D) BMP's</span></a>
                </li>
                @endif
            @endif

                @if ($user == 'eo')
                    @if ($borangB)
                        @if ($borangB->status_id == '602' || $borangB->status_id == '600' || $borangB->status_id ==13)
                            <li class="nav-item">
                                <a class="active" data-toggle="tab" href="#" data-target="#fasa1tab2" role="tab" ><span>(B)
                            EIA 2-18</span></a> </li>
                        @else
                             <li class="nav-item">
                                <a ><span>(B)EIA 2-18</span></a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item">
                            <a><span>(B)EIA 2-18</span></a>
                        </li>
                    @endif
             
                     <!-- <li class="nav-item">
                        <a><span>(C)  Pengawasan</span></a>
                    </li> -->
                        @if ($borangC)
                            @if ($status11)
                            <li class="nav-item">
                                <a class="" data-toggle="tab" href="#" data-target="#fasa1tab3" role="tab" onclick=""><span>(C)  Pengawasan</span></a>
                            </li>
                            @else
                            <li class="nav-item ">
                                <a ><span>(C)
                                        Pengawasan</span></a>
                            </li>
                            @endif
                        @else 
                            <li class="nav-item "> <a ><span>(C)  Pengawasan</span></a> </li>
                        @endif


                @if ($borangD)
                    @if ($borangD->status_id == '602' || $borangD->status_id ==13 || $borangD->status_id == 600)
                        <li class="nav-item">
                            <a class="" data-toggle="tab" href="#" data-target="#fasa1tab4" role="tab" ><span>(D) BMP's</span></a>
                        </li>
                    @else
                         <li class="nav-item">
                            <a ><span>(D) BMP's</span></a>
                        </li>
                    @endif
                @else
                 <li class="nav-item">
                    <a ><span>(D) BMP's</span></a>
                </li>
                @endif
            @endif


            @if ($user == 'emc')
           
                 <li class="nav-item">
                    <a><span>(B)EIA 2-18</span></a>
                </li>
                 <li class="nav-item">
                     <li class="nav-item">
                           <a class="" data-toggle="tab" href="#" data-target="#fasa1tab3" role="tab" ><span>(C) Pengawasan</span></a>
                        </li>
                </li>
                 <li class="nav-item">
                    <a ><span>(D) BMP's</span></a>
                </li>
            @endif
              
        </ul>


        <div class="tab-content">
            @if ($user == 'pp')
                @if ($borangB)
                    @if ($borangB->status_id == '602' || $borangB->status_id ==13)
                        <div class="tab-pane active" id="fasa1tab2">
                            @include('form.tabs2',['borangB' => $borangB])
                        </div>
                    @elseif ($stesen >= 1)
                        <div class="tab-pane active" id="fasa1tab3">
                           @include('form.tabs3fasa',['pakejId' => $pakejId, 'year' => $year, 'month' => $month])
                        </div>
                    @else
                        <div class="tab-pane disable" id="fasa1tab2">
                            @include('form.tabs2',['borangB' => $borangB])
                        </div>
                    @endif
                @elseif($borangC)
                     @if ($status602 || $status13)
                       <div class="tab-pane active" id="fasa1tab3">
                           @include('form.tabs3fasa',[ 'pakejId' => $pakejId, 'year' => $year, 'month' => $month])
                        </div>
                    @elseif ($stesen >= 1)
                        <div class="tab-pane active" id="fasa1tab3">
                           @include('form.tabs3fasa',['pakejId' => $pakejId, 'year' => $year, 'month' => $month])
                        </div>
                    @else
                        <div class="tab-pane disable" id="fasa1tab3">
                           @include('form.tabs3fasa',['pakejId' => $pakejId, 'year' => $year, 'month' => $month])
                        </div>
                    @endif
                @elseif ($stesen >= 1)
                    <div class="tab-pane active" id="fasa1tab3">
                        @include('form.tabs3fasa',['pakejId' => $pakejId, 'year' => $year, 'month' => $month])
                    </div>
                @else
                    <div class="tab-pane disable" id="fasa1tab2">
                        @include('form.tabs2',['borangB' => $borangB])
                    </div>
                     <div class="tab-pane disable" id="fasa1tab3">
                        @include('form.tabs3fasa',['pakejId' => $pakejId, 'year' => $year, 'month' => $month])
                    </div>
                @endif
            @endif

             @if ($user == 'eo')
                @if ($borangB)
                    @if ($borangB->status_id == '602'|| $borangB->status_id == '600' || $borangB->status_id ==13)
                        <div class="tab-pane active" id="fasa1tab2"> 
                            @include('form.tabs2',['borangB' => $borangB])
                        </div>
                    @else
                        <div class="tab-pane disable" id="fasa1tab2"> 
                            @include('form.tabs2', ['borangB' => $borangB])
                        </div>
                    @endif
                @else
                    <div class="tab-pane disable" id="fasa1tab2"> 
                        @include('form.tabs2', ['borangB' => $borangB])
                    </div>
                @endif
                 @if ($borangC)
                    @if ($status11)
                         <div class="tab-pane active" id="fasa1tab3"> 
                            @include('form.tabs3fasa', ['pakejId' => $pakejId, 'year' => $year, 'month' => $month])
                        </div>
                    @else
                        <div class="tab-pane disable" id="fasa1tab3"> 
                            @include('form.tabs3fasa', ['pakejId' => $pakejId, 'year' => $year, 'month' => $month])
                        </div>
                    @endif
                @endif


                 @if ($borangD)
                    @if ($borangD->status_id == '602' || $borangD->status_id ==13 || $borangD->status_id == 600)
                        <div class="tab-pane active" id="fasa1tab4">
                            @include('form.tabs4', ['year' => $year, 'month' => $month])
                        </div>
                    @else
                        <div class="tab-pane disable" id="fasa1tab4">
                            @include('form.tabs4', ['year' => $year, 'month' => $month])
                        </div>
                    @endif
                @endif

            @endif

             @if ($user == 'emc')
                <div class="tab-pane active" id="fasa1tab3"> 
                    @include('form.tabs3fasa', ['pakejId' => $pakejId, 'year' => $year, 'month' => $month])
                </div>
            @endif

            <div class="tab-pane disable" id="fasa1tab4">
                @include('form.tabs4')
            </div>
        </div>
    </div>
</div>

@push('js')

<script type="text/javascript">
    loadTabs3 = (elem) => {
        Swal.fire({
            title: 'Data sedang dikemaskini. Sila Tunggu Sebentar...',
            onOpen: function() {
                Swal.showLoading();

                $.get("{{ route('project.tabs3') }}", (response) => {
                    $("#tab3").empty().append(response);
                }).then(() => {
                    // TODO: wan fix this project id parameter 
                    $.get("{{ route('form.stesen.sungai', 1) }}", (response) => {
                        $("#tabstesen1").empty().append(response);
                    }).then(() => {
                        Swal.close();
                    });
                });
            }
        })
    }

    loadTabs4 = (elem) => {
        Swal.fire({
            title: 'Data sedang dikemaskini. Sila Tunggu Sebentar...',
            onOpen: function() {
                Swal.showLoading();

                $.get("{{ route('project.tabs4') }}", (response) => {
                    $("#tab4").empty().append(response);
                }).then(() => {
                    Swal.close();
                });
            }
        })
    }

</script>

@endpush

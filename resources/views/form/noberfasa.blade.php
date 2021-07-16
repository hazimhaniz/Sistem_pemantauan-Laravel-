<!-- END JUMBOTRON -->
<?php
    if (Auth::user()->hasRole('pp')) {
        $user = 'pp';
    } elseif (Auth::user()->hasRole('eo')) {
        $user = 'eo';
    } elseif (Auth::user()->hasRole('emc')) {
        $user = 'emc';
    }

    $borangA = App\MonthlyA::where('projek_id',$projek->id)->where('bulan', $month)->where('tahun', $year)->first();
    $borangB = App\MonthlyB::where('projek_id',$projek->id)->where('bulan', $month)->where('tahun', $year)->first();
    $borangE = App\MonthlyE::where('projek_id',$projek->id)->where('bulan', $month)->where('tahun', $year)->first();
    $borangF = App\MonthlyF::where('projek_id',$projek->id)->where('bulan', $month)->where('tahun', $year)->first();
    $borangD = App\MonthlyD::where('projek_id',$projek->id)->where('bulan', $month)->where('tahun', $year)->first();
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
   

    $stesen = App\Models\Stesen::whereIn('projek_id', [$projek->id])->whereIn('status', [13, 607])->where('tahun', $year)->where('bulan', $month)->get()->count();

    $withoutStatus = [212,203,204];
    $kemajuanStatus = ['siap','tangguh','terbengkalai'];

    if ($borangA) {
        $kemajuan = App\MonthlyAKemajuanStatus::where('monthlya_id', $borangA->id)->first();
    } else {
        $kemajuan = 'no record';
    }

?>
    <div class="container-fluid container-fixed-lg bg-white" id="hideTabs">
        <!-- START card -->
        <div class="card card-sng" style="background-color:# !important;">
            <ul id="tabs-sng" class="nav nav-tabs nav-tabs-blue nav-tabs-fillup d-none d-md-flex d-lg-flex d-xl-flex"
                role="tablist" style="background-color:# !important;">
                @if ($user == 'pp')
                        <li class="nav-item">
                            <a class="active" data-toggle="tab" href="#" data-target="#tab1" role="tab" onclick=""><span>(A)
                                    EIA 1-18</span></a>
                        </li>
                        @if ( !in_array($borangA->status_id, $withoutStatus))
                            @if ($borangB)
                                @if ($borangB->status_id == '602' || $borangB->status_id ==13)
                            <li class="nav-item">
                                <a class="" data-toggle="tab" href="#" data-target="#tab2" role="tab" onclick=""><span>(B)EIA 2-18</span></a>
                            </li>
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
                            <!-- //for c -->
                            @if ($borangC)
                                @if ($status602 || $status13)
                                    <li class="nav-item">
                                       <a class="" data-toggle="tab" href="#" data-target="#tab3" role="tab" onclick=""><span>(C)  Pengawasan</span></a>
                                    </li>
                                @elseif ($stesen >= 1)
                                    <li class="nav-item">
                                       <a class="" data-toggle="tab" href="#" data-target="#tab3" role="tab" onclick=""><span>(C)  Pengawasan</span></a>
                                    </li>
                                @else
                                    <li class="nav-item">
                                        <a><span>(C)  Pengawasan</span></a>
                                    </li>
                                @endif
                            @elseif($stesen == 0)
                            <!-- // if no stesen dont show c -->
                                <li class="nav-item">
                                    <a><span>(C)  Pengawasan</span></a>
                                </li>
                          @elseif($stesen >= 1)
                               <li class="nav-item">
                                       <a class="" data-toggle="tab" href="#" data-target="#tab3" role="tab" onclick=""><span>(C)  Pengawasan</span></a>
                                    </li>
                                    @else
                                     <li class="nav-item">
                                    <a><span>(C)  Pengawasan</span></a>
                                </li>
                            @endif
                            <!-- //for d -->

                            @if ($borangD)
                                @if ($borangD->status_id == '602' || $borangD->status_id == 13)
                                    <li class="nav-item">
                                       <a class="" data-toggle="tab" href="#" data-target="#tab4" role="tab" onclick=""><span>(D) BMP's</span></a>
                                    </li>
                                @else
                                     <li class="nav-item">
                                        <a ><span>(D) BMP's</span></a>
                                    </li>
                                @endif
                            @else
                             <li class="nav-item">
                                <a><span>(D) BMP's</span></a>
                            </li>
                            @endif
                             <li class="nav-item">
                                <a class="" data-toggle="tab" href="#" data-target="#tab5" role="tab" onclick=""><span>(E&F)
                                       Audit dan Perlaksanaan EMT</span></a>
                            </li>
                        @else
                            <!-- // in the 3 status doesnt allow to click the remainig -->
                            
                             <li class="nav-item">
                                <a><span>(B)EIA 2-18</span></a>
                            </li>  
                            <li class="nav-item">
                                <a><span>(C)  Pengawasan</span></a>
                            </li>
                               <li class="nav-item">
                                <a><span>(D) BMP's</span></a>
                            </li>
                             <li class="nav-item">
                                <a><span>(E&F)
                                       Audit dan Perlaksanaan EMT</span></a>
                            </li>
                        @endif
                  
                    
                    @endif

                    @if ($user == 'eo')
                        @if (in_array($kemajuan, $kemajuanStatus))
                            
                             <li class="nav-item">
                            <a ><span>(A) EIA 1-18</span></a>
                            </li>
                            <li class="nav-item">
                                <a><span>(B) EIA 2-18</span></a>
                            </li>
                            <li class="nav-item ">
                                <a ><span>(C)  Pengawasan</span></a>
                            </li>
                            <li class="nav-item active" >
                                <a ><span>(D) BMP's</span></a>
                            </li>
                             <li class="nav-item">
                                <a ><span>(E&F) Audit dan Perlaksanaan EMT</span></a>
                            </li>
                        @else

                        <li class="nav-item">
                            <a ><span>(A)
                                    EIA 1-18</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="active" data-toggle="tab" href="#" data-target="#tab2" role="tab" onclick=""><span>(B)
                                    EIA 2-18</span></a>
                        </li>

                        @if($borangC)
                            @if ($status11)
                            <li class="nav-item">
                                <a class="" data-toggle="tab" href="#" data-target="#tab3" role="tab" onclick=""><span>(C)  Pengawasan</span></a>
                            </li>
                            @else
                            <li class="nav-item ">
                                <a ><span>(C)
                                        Pengawasan</span></a>
                            </li>
                            @endif
                        @else 
                        <li class="nav-item ">
                            <a ><span>(C)
                                    Pengawasan</span></a>
                        </li>
                        @endif
                            <li class="nav-item active" >
                                <a class="" data-toggle="tab" href="#" data-target="#tab4" role="tab" onclick=""><span>(D)
                                    BMP's</span></a>
                            </li>
                             <li class="nav-item">
                                <a ><span>(E&F)
                                       Audit dan Perlaksanaan EMT</span></a>
                            </li>
                      
                        @endif
                       
                    @endif
                    @if ($user == 'emc')
                         @if (in_array($kemajuan, $kemajuanStatus))
                            
                             <li class="nav-item">
                            <a ><span>(A) EIA 1-18</span></a>
                            </li>
                            <li class="nav-item">
                                <a><span>(B) EIA 2-18</span></a>
                            </li>
                            <li class="nav-item ">
                                <a ><span>(C)  Pengawasan</span></a>
                            </li>
                            <li class="nav-item active" >
                                <a ><span>(D) BMP's</span></a>
                            </li>
                             <li class="nav-item">
                                <a ><span>(E&F) Audit dan Perlaksanaan EMT</span></a>
                            </li>
                        @else
                             <li class="nav-item">
                                <a ><span>(A)
                                        EIA 1-18</span></a>
                            </li>
                            <li class="nav-item">
                                <a><span>(B)
                                        EIA 2-18</span></a>
                            </li>
                            <li class="nav-item active">
                                <a class="active" data-toggle="tab" href="#" data-target="#tab3" role="tab" onclick=""><span>(C)
                                        Pengawasan</span></a>
                            </li>
                            <li class="nav-item">
                                <a c><span>(D)
                                    BMP's</span></a>
                            </li>
                             <li class="nav-item">
                                <a><span>(E&F)
                                       Audit dan Perlaksanaan EMT</span></a>
                            </li>
                        @endif
                    @endif


                   @if (in_array($kemajuan, $kemajuanStatus))
                    <li class="nav-item">
                        <a class="active" data-toggle="tab" href="#" data-target="#tab6" role="tab" onclick=""><span>
                                Kuiri <i class="fas fa-question-circle fa-lg text-warning"></i></span></a>
                    </li>
                    @else
                         <li class="nav-item">
                        <a class="" data-toggle="tab" href="#" data-target="#tab6" role="tab" onclick=""><span>
                                Kuiri <i class="fas fa-question-circle fa-lg text-warning"></i></span></a>
                    </li>
                    @endif

                    <li class="nav-item">
                        <a class="" data-toggle="tab" href="#" data-target="#tab7" role="tab" onclick=""><span>
                                Laporan Hujan <i class="fas fa-raindrops fa-lg text-primary"></i></span></a>
                    </li> 
                    <li class="nav-item">
                        <a class="" data-toggle="tab" href="#" data-target="#tab8" role="tab" onclick=""><span>
                                Sejarah </span></a>
                    </li>

            </ul>

            <div class="tab-content" style="background-color:# !important;">
                @if ($user == 'pp')
                    <div class="tab-pane active" id="tab1">
                        @include('form.tabs1')
                    </div>
                @else 
                    <div class="tab-pane disable" id="tab1">
                        @include('form.tabs1')
                    </div>
                @endif
               

                @if ($user == 'eo')
                    @if (!in_array($kemajuan, $kemajuanStatus))
                     <div class="tab-pane active" id="tab2">
                            @include('form.tabs2')
                        </div>
                    @endif
                @else 
                    <div class="tab-pane disable" id="tab2">
                    @include('form.tabs2')
                    </div>
                @endif


                 @if ($user == 'emc')
                    @if (!in_array($kemajuan, $kemajuanStatus))
                        <div class="tab-pane active" id="tab3">
                            @include('form.tabs3', ['year' => $year, 'month' => $month])
                        </div>
                        @endif
                    @else
                <div class="tab-pane disable" id="tab3">
                    @include('form.tabs3', ['year' => $year, 'month' => $month])
                </div>
                @endif

                <div class="tab-pane disable" id="tab4">
                    @include('form.tabs4')
                </div>

                <div class="tab-pane disable" id="tab5">
                    @include('form.tabs5')
                </div>
                   @if (in_array($kemajuan, $kemajuanStatus))
                    <div class="tab-pane active" id="tab6">
                        @include('form.tabs6')
                    </div>
                    @else
                         <div class="tab-pane disable" id="tab6">
                        @include('form.tabs6')
                    </div>
                    @endif
                <div class="tab-pane disable" id="tab7">
                    @include('form.laporanHujan', ['year' => $year, 'month' => $month])
                </div>
                 <div class="tab-pane disable" id="tab8">
                    @include('form.history')
                </div>
              
            </div>
        </div>
       
    </div>
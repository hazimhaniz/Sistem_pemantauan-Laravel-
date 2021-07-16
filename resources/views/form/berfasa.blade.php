 <!-- END JUMBOTRON -->
 <?php
    if (Auth::user()->hasRole('pp')) {
        $user = 'pp';
    } elseif (Auth::user()->hasRole('eo')) {
        $user = 'eo';
    } elseif (Auth::user()->hasRole('emc')) {
        $user = 'emc';
    }
    
    $borangA = App\MonthlyA::where('projek_id', $projek->id)->where('bulan', $month)->where('tahun', $year)->first();
    $borangB = App\MonthlyB::where('projek_id', $projek->id)->where('bulan', $month)->where('tahun', $year)->first();
    $borangE = App\MonthlyE::where('projek_id', $projek->id)->where('bulan', $month)->where('tahun', $year)->first();
    $borangF = App\MonthlyF::where('projek_id', $projek->id)->where('bulan', $month)->where('tahun', $year)->first();
    $borangD = App\MonthlyD::where('projek_id', $projek->id)->where('bulan', $month)->where('tahun', $year)->first();
    $borangC = App\Models\MonthlyC::where('projek_id', $projek->id)->where('bulan', $month)->where('tahun', $year)->first();
    if ($borangA) {
        $kemajuan = App\MonthlyAKemajuanStatus::where('monthlya_id', $borangA->id)->first();
    } else {
        $kemajuan = null;
    }
    ?>
 <div class="container-fluid container-fixed-lg bg-white">

     <!-- START card -->
     <!-- <div class="card card-transparent"> -->
     <div class="card card-sng" style="background-color:# !important;" id="hideTabs">

         <ul id="tabs-sng" class="nav nav-tabs nav-tabs-blue nav-tabs-fillup d-none d-md-flex d-lg-flex d-xl-flex" role="tablist" style="background-color:# !important;">

            @if ($user == 'pp')
                 <li class="nav-item ">
                     <a class="active" data-toggle="tab" href="#" data-target="#tab1" role="tab" onclick=""><span>(A)
                             EIA 1-18</span></a>
                 </li>
                 <li class="nav-item">
                     <a class="" data-toggle="tab" href="#" data-target="#tab5" role="tab" onclick=""><span>(E&F)
                             Audit dan Perlaksanaan EMT</span></a>
                 </li>
            @endif
            @if ($user == 'eo' || $user == 'emc')
                 <li class="nav-item">
                     <a><span>(A)
                             EIA 1-18</span></a>
                 </li>
                 <li class="nav-item">
                     <a><span>(E&F) Audit dan Perlaksanaan EMT</span></a>
                 </li>
            @endif


             <?php
                $projekFasa = App\ProjekFasa::where('projek_id', $projek->id)->get();
                $totalFasa = count($projekFasa);
                ?>
             <input type="hidden" name="fasacount" value="{{$totalFasa}}" id="fasacount">
             @foreach($projekFasa as $key => $fasa)
             <?php
                $selectedYear = Request::segment(4);
                $selectedMonth = Request::segment(5);
                if (empty($selectedYear)) {
                    $selectedYear = date('Y');
                    $selectedMonth = date('m');
                }
                $startYear = date('Y', strtotime($fasa->tarikh_mula));
                $startMonth =  date('m', strtotime($fasa->tarikh_mula));

                $startDate = date('Y-m-t', strtotime($fasa->tarikh_mula));
                $endDate = date('Y-m-t', strtotime($fasa->tarikh_akhir));

                $endYear = date('Y', strtotime($fasa->tarikh_akhir));
                $endMonth = date('m', strtotime($fasa->tarikh_akhir));
                $diffMonths = abs($endMonth - $startMonth);

                $start = date('Y-m', strtotime($fasa->tarikh_mula));
                $st = strtotime($start);

                $end = date('Y-m', strtotime($fasa->tarikh_akhir));
                $ed = strtotime($fasa->tarikh_akhir);

                $d1 = strtotime($fasa->tarikh_mula);
                $d2 = strtotime($fasa->tarikh_akhir);
                $totalSecondsDiff = abs($st - $ed);
                $totalMonthsDiff  = round($totalSecondsDiff / 60 / 60 / 24 / 30);

                for ($i = 0; $i <= $totalMonthsDiff; $i++) {
                    $year2 = date('Y-m', strtotime('+' . $i . 'months', strtotime($fasa->tarikh_mula)));
                    $data[] = $date = date('Y-m', strtotime($year2));
                    $time[] = strtotime($date);
                }

                $selectedTime = date('Y-m', strtotime($selectedYear . '-' . $selectedMonth));
                $selectedTime = strtotime($selectedTime);
                // strtotime($selectedYear.'-'.$selectedMonth);
                $enable = 'disabled';

                if ($selectedTime > $st) {
                    $enable = '';
                }
                if ($selectedTime == $st || $selectedTime == $ed) {
                    $enable = '';
                }
                if (!in_array($selectedTime, $time)) {
                    $enable = 'disabled';
                }

                ?>

             <li class="nav-item">
                 @if($enable == 'disabled')
                 <a class="btn " style="color:grey;" disabled><span>FASA {{$key+1}}</span></a>
                 @else
                 <a class="" data-toggle="tab" href="#" data-target="#tab2" role="tab" onclick="clickFasa({{$fasa->id}})" id="fasa-{{$fasa->id}}"><span>FASA {{$key+1}}</span></a>
                 @endif

             </li>

             @endforeach

             <li class="nav-item">
                 <a class="" data-toggle="tab" href="#" data-target="#tab6" role="tab" onclick=""><span>
                         Kuiri <i class="fas fa-question-circle fa-lg text-warning"></i></span></a>
             </li>
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

             <div class="tab-pane disable" id="tab2">
                 <div id="fasa"></div>
             </div>
             <div class="tab-pane disable" id="tab5">
                 @include('form.tabs5')
             </div>
             <div class="tab-pane disable" id="tab6">
                 @include('form.tabs6')
             </div>
             <div class="tab-pane disable" id="tab7">
                 @include('form.laporanHujan')
             </div>
             <div class="tab-pane disable" id="tab8">
                 @include('form.history',['logdata' => $logdata])
             </div>


         </div>
     </div>
<input type="hidden" name="year" id="year" value="{{$year}}">
<input type="hidden" name="month" id="month" value="{{$month}}">
<input type="hidden" name="projek" id="projek" value="{{$projek}}">
 </div>

 <script type="text/javascript">
    
    function clickFasa(id) {

        var projek = $('#projek').val();
        var year = $('#year').val();
        var month = $('#month').val();

         $.ajax({
            url: "{{ url('projek/getfasa') }}" + '/' + id,
            method: "POST",
            data : {
                projek :projek,
                month: month,
                year : year
            },
            success: function(response) {
              $("#fasa").html(response);  
            },
            error: function(response) {

            }
        });
    }
     loadPengawasan = (elem, pengawasanId) => {
        let baseUrl = `{{ route('form.load.pengawasan', ['data-id', $projek->id]) }}?year={{ $year }}&month={{ $month }}`;
        baseUrl = baseUrl.replace('data-id', pengawasanId);
        
        $.get(baseUrl, (response) => {
            $(`#tabstesen${pengawasanId}`).empty().append(response);
        });
    }

 </script>
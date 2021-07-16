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
        text-align: center !important;
    }

    td {
        color: #000 !important;
        border-top: 1px solid #DDDDDD;
        border-left: 1px solid #DDDDDD;
        border-top: none !important;
        border-left: none !important;
        border-bottom: none !important;
        border-right: none !important;
       font-family: 'Montserrat' !important;
        font-size: 10.5px !important;
        letter-spacing: 0.06em !important;
       
    }
</style>
<?php
    $borangC = $borangCs = App\Models\MonthlyC::where('projek_id', $projek->id)->where('bulan', $month)->where('tahun', $year)->get();
    $status = true;
    foreach ($borangCs as $key => $value) {
        if ($value->status_id != 602) {
            $status = false;
        }
    }

    $userId = Auth::user()->id;
?>
<div class="card-block">
    <div id="rootwizard">
        <!-- Nav tabs -->

        <ul class="nav nav-tabs nav-tabs-linetriangle nav-tabs-separator nav-stack-sm" id="myTab" role="tablist">
            <?php 
                $i = 1;
                $id = Auth::user()->id;
                $pengawasans = App\ProjekPengawasan::where('projek_id',$projek->id)->where('user_id', $id)->join('master_pengawasan','projek_pengawasan.pengawasan_id','=','master_pengawasan.id')->select(['master_pengawasan.id',
                    'master_pengawasan.jenis_pengawasan','projek_pengawasan.pengawasan_id'])->get();
                if (Auth::user()->hasrole('pp')) {
                    $pakejPengawasan = App\PakejHasPengawasan::where('pakej_id',$pakejId)->select(['pengawasan_id'])->get();
                } else {
                    $pakejPengawasan = App\PakejHasPengawasan::where('pakej_id',$pakejId)->where('user_emc_id',$userId)->select(['pengawasan_id'])->get();
                }
                // dd($pakejPengawasan);
                $data = [];
                foreach ($pakejPengawasan as $key => $pakej) {
                    $data[] = $pakej->pengawasan_id;
                }
                $pengawasansData = App\ProjekPengawasan::where('projek_id',$projek->id)->join('master_pengawasan','projek_pengawasan.pengawasan_id','=','master_pengawasan.id')->select(['master_pengawasan.id',
                    'master_pengawasan.jenis_pengawasan','projek_pengawasan.pengawasan_id as id'])->get();

            ?>
            @if (Auth::user()->hasrole('emc')) 

                @foreach($pengawasans as $key => $value)
                <?php
                    if (!in_array($value->pengawasan_id, $data)) {
                        continue;
                    }
                ?>
                <li class="nav-item ml-md-6">
                    <a class="{{ ($value->id == 1) ? 'active' : '' }}" data-toggle="tab" href="#" data-target="#tabstesen{{ $value->id }}" role="tab" onclick="loadPengawasan(this, {{ $value->id }})">
                        <span>
                            <i class="fas fa-water fa-lg text-success"></i>{{ strtoupper($value->jenis_pengawasan) }}
                        </span>
                    </a>
                </li>
                @endforeach
            @else 
                 @foreach($pengawasansData as $key => $value)
                 <?php
                    if (!in_array($value->id, $data)) {
                        continue;
                    }
                ?>

                <li class="nav-item ml-md-6">
                    <a class="{{ ($value->id == 1) ? 'active' : '' }}" data-toggle="tab" href="#" data-target="#tabstesen{{ $value->id }}" role="tab" onclick="loadPengawasan(this, {{ $value->id }})">
                        <span>
                            <i class="fas fa-water fa-lg text-success"></i>{{ strtoupper($value->jenis_pengawasan) }}
                        </span>
                    </a>
                </li>
                @endforeach
            @endif

 
        </ul>
    </div>
    <!-- Tab panes -->
    <div class="tab-content">
        @if (Auth::user()->hasrole('emc')) 
            @foreach($pengawasans as $key => $value)
            <?php
                if (!in_array($value->pengawasan_id, $data)) {
                    continue;
                }
            ?>
                
            <div class="tab-pane {{ ($value->id == 1) ? 'active' : '' }}" id="tabstesen{{ $value->id }}">
                <!--  -->
            </div>
            @endforeach
        @else
            @foreach($pengawasansData as $key => $value)
            <?php
                    if (!in_array($value->id, $data)) {
                        continue;
                    }
                ?>
            <div class="tab-pane {{ ($value->id == 1) ? 'active' : '' }}" id="tabstesen{{ $value->id }}">
                <!--  -->
            </div>
            @endforeach
        @endif
        
    
    </div>
    <div class="col-md-12 p-t-20">
        <ul class="pager wizard no-style">
            @if (auth()->user()->entity_type == 'App\UserPP')
                @if ($status)
                <li class="submit">
                    <button onclick="submitForm('form-add')" class="btn btn-info btn-cons from-left pull-right" id="simpan" type="button">
                        <span>Sahkan</span>
                    </button>
                </li>
                @endif
            @endif
        </ul>
    </div>
</div>

@push('js')

<script type="text/javascript">
    loadPengawasan = (elem, pengawasanId) => {
        let baseUrl = `{{ route('form.load.pengawasan', ['data-id', $projek->id]) }}?year={{ $year }}&month={{ $month }}`;
        baseUrl = baseUrl.replace('data-id', pengawasanId);
        
        $.get(baseUrl, (response) => {
            $(`#tabstesen${pengawasanId}`).empty().append(response);
        });
    }

</script>

@endpush
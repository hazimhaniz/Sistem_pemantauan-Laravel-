{{-- @include('form.petunjuk') --}}
<div class="row">
    <div class="col-md-12">
        <button class="btn btn-petunjuk" type="button" data-toggle="collapse" data-target="#collapsesenarai" aria-expanded="false" aria-controls="multiCollapseExample2">PETUNJUK <i class="fas fa-map-pin text-dark"></i></button>
        <div class="collapse" id="collapsesenarai">
            <table class="table" role="grid" aria-describedby="table_info" border="0px" style="padding:10px;">
                <thead>
                    <tr role="row">
                        <th bgcolor="#50b447" class="align-top text-center" style="width:30%; vertical-align:top; color:#fff">STATUS</th>
                        <th bgcolor="#a0dd84" class="align-top text-center" style="width:70%; vertical-align:top; color:#fff">PENERANGAN</th>
                    </tr>
                </thead>
                <tbody>
                    @isset($legendStatuses)
                    @foreach($legendStatuses as $status)
                    <tr>
                        <td> <span class="label label-lg label-inline ow pull-left {{ $status->badge }}"> {{ $status->name }} </span> </td>
                        <td class="ow pull-left"> {{ $status->desc }} </td>
                    </tr>
                    @endforeach
                    @endisset
                </tbody>  
            </table>
        </div>
    </div>
</div>
<br>
<div class="row">
    <div class="col-md-12">
        <table class="" id="table" role="grid" aria-describedby="table_info"  style="padding:10px; width:100%">
            <thead>
                <tr>
                    <th class="align-top text-center" bgcolor="#" style="color:#; width:20%;">Peranan</th>
                    <th class="align-top text-center" bgcolor="#" style="color:#; width:20%;">Nama</th>
                    <th class="align-top text-center" bgcolor="#" style="color:#; width:20%;">Kad Pengenalan</th>
                    <th class="align-top text-center" bgcolor="#" style="color:#; width:20%;">Status</th>
                    <th class="align-top text-center" bgcolor="#" style="color:#; width:20%;">Fasa</th>
                    <th class="align-top text-center" bgcolor="#" style="color:#; width:20%;">Pengawasan</th>
                    <th class="align-top text-center" bgcolor="#" style="color:#; width:20%;">Tindakan</th>
                </tr>
            </thead>
            <tbody>
                @foreach($projekHasUsers as $projekHasUser)
                <tr>
                    <td> {{ $projekHasUser->role ? $projekHasUser->role->description : '' }} </td>
                    <td> {{ $projekHasUser->user ? $projekHasUser->user->name : '-' }} </td>
                    <td> {{ $projekHasUser->user ? $projekHasUser->user->username : '-' }} </td>
                    <td>
                        <span class="label label-lg label-inline {{ $projekHasUser->statusFiling ? $projekHasUser->statusFiling->badge : '' }}"> {{ $projekHasUser->statusFiling ? $projekHasUser->statusFiling->name : '' }} </span>
                    </td>
                    <td>-</td>
                    <?php
                    if (isset($projekHasUser->pengawasan_id))  {
                        // $pengawasan = App\ProjekPengawasan::where('projek_id', $projekHasUser->projek_id)->where('projek_has_userid', $projekHasUser->id)->first();
                        $name = '';
                        $master = App\MasterModel\MasterPengawasan::where('id', $projekHasUser->pengawasan_id)->first();
                        if ($master) {
                            $name = $master->jenis_pengawasan;
                        }
                    } else {
                        $name = '-';
                    }
                    ?>
                    <td>{{$name}}</td>
                    <td>
                        @if(in_array($projekHasUser->role->id,[5,6]))
                        <a href="senarai_projek/delete/{{$projekHasUser->role->id}}/{{$projekHasUser->projek_id}}/{{$projekHasUser->user_id}}">
                            <i class="fas fa-trash text-danger"></i>
                        </a>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<table class="table" id="" role="grid" aria-describedby="table_info" border="0px" style="padding:10px;">
    <thead>
        <tr role="row">
            <tr>
                <th bgcolor="#ddfada" class="align-top text-center" style="width:5%; color:#fff">No.</th>
                <th bgcolor="#ddfada" class="align-top text-center" style="width:5%; color:#fff">Borang</th>
                <th bgcolor="#ddfada" class="align-top text-center" style="width:20%; color:#fff">Syarat / Pengawasan / Elemen</th>
                <th bgcolor="#ddfada" class="align-top text-center" style="width:15%; color:#fff">Status</th>
                <th bgcolor="#ddfada" class="align-top text-center" style="width:15%; color:#fff">Tindakan</th>
            </tr>
        </tr>
    </thead>
    <tbody>
        @foreach($kuiris as $kuiri)
        <tr>
            <td> {{ $loop->iteration }} </td>
            <td> {{ $kuiri->form_class }} </td>
            <td> {{ $kuiri->subText }} </td>
            <td>
                <span class="label {{ $kuiri->statusid ? $kuiri->statusid->badge : '' }}">{{ $kuiri->statusid ? $kuiri->statusid->name : '' }}</span>
            </td>
            <td>
                <button onclick="lihatKuiri({{ $kuiri->id }})" class="dt-button buttons-html5 btn btn-default btn-xs m-t-5">
                    Lihat Kuiri
                </button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
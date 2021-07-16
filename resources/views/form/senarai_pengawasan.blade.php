<table class="table table-responsive" id="tablePengawasan" role="grid" aria-describedby="table_info" border="0px" style="padding:10px;">
    <thead>
        <tr role="row">
            <th class="align-top text-center" style="width:30%; color:#fff">Bil</th>
            <th class="align-top text-center" style="width:70%; color:#fff">Jenis Pengawasan</th>
            <th class="align-top text-center" style="width:70%; color:#fff">Kod Makmal Akreditasi</th>
            <th class="align-top text-center" style="width:70%; color:#fff">No.Tel Makmal Akreditasi</th>
            <th class="align-top text-center" style="width:70%; color:#fff">Nama Makmal Akreditasi</th>
            <th class="align-top text-center" style="width:70%; color:#fff">Alamat</th>
        </tr>
    </thead>
    <tbody id="table-body">
        <?php $no=1; ?>
        @forelse($pengawasan as $awas)
        <tr>
            <td>{{$no++}}</td>
            <td>{{$awas->jenisPengawasan->jenis_pengawasan}}</td>
            <td>{{$awas->kod_makmal}}</td>
            <td>{{$awas->no_tel_makmal}}</td>
            <td>{{$awas->nama_makmal}}</td>
            <td>{{$awas->alamat_makmal}}</td>
        </tr>
        @empty
        <tr>
            <td>Tiada maklumat</td>
        </tr>
        @endforelse
    </tbody>  
</table>
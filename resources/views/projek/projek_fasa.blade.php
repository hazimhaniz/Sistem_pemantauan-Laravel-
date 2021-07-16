<table class="table table-hover table-responsive dataTable no-footer display nowrap" id="table" role="grid" aria-describedby="table_info" >
    <thead>
        <tr role="row">
            <th bgcolor="#f0f0f0" class="fit align-top text-left" style="width: 5px; color:#000">No.</th>
            <th bgcolor="#f0f0f0" class="align-top text-left" style="width: 20px; color:#000">Nama</th>
            <th bgcolor="#f0f0f0" class="align-top text-left" style="width: 20px; color:#000">Tarikh Mula</th>
            <th bgcolor="#f0f0f0" class="align-top text-left" style="width: 20px; color:#000">Tarikh Akhir</th>
            <th bgcolor="#f0f0f0" class="align-top text-left" style="width: 10px; color:#000">Dokumen</th>
            <th bgcolor="#f0f0f0" class="align-top text-left" style="width: 20px; color:#000">Tindakan</th>
        </tr>
    </thead>
    <tbody>
        @foreach($projekFasas as $projekFasa)
        <tr>
            <td> {{ $loop->iteration }} </td>
            <td> {{ $projekFasa->nama_pakej }} </td>
            <td> {{ $projekFasa->tarikh_mula ? $projekFasa->tarikh_mula->format('d/m/Y') : '' }} </td>
            <td> {{ $projekFasa->tarikh_akhir ? $projekFasa->tarikh_akhir->format('d/m/Y') : '' }} </td>
            <td>
                @foreach ($projekFasa->docType as $docJadual)
                <a href="{{ Storage::url($docJadual->path) }}" download> FAIL {{ $loop->iteration }} </a> <br/>
                @endforeach
            </td>
            <td>
                <a onclick="kemaskiniFasa({{ $projekFasa->id }})" class="btn btn-default btn-xs editBtn"><span style="color:#fff"> <i class="fas fa-edit text-warning"></i></span></a>
                <a href="{{ url('/projek/pendaftaranprojek/deletefasa') }}/{{ $projekFasa->id }}" class="btn btn-default btn-xs delBtn"><span style="color:#fff"> <i class="far fa-trash text-danger"></i></span></a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
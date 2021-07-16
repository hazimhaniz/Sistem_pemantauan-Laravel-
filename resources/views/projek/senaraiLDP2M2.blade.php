<table class="table table-hover table-responsive dataTable no-footer display nowrap" id="table" role="grid" aria-describedby="table_info" >
    <thead>
        <tr role="row">
            <th bgcolor="#f0f0f0" class="fit align-top text-center" style="width: 5px; color:#000">No. </th>
            <th bgcolor="#f0f0f0" class="align-top text-center" style="width: 20px; color:#000"> Nama Dokumen </th>
            <th bgcolor="#f0f0f0" class="align-top text-center" style="width: 20px; color:#000">Tarikh Kelulusan </th>
            <th bgcolor="#f0f0f0" class="align-top text-center" style="width: 10px; color:#000">No.Rujukan</th>
            <th bgcolor="#f0f0f0" class="align-top text-center" style="width: 10px; color:#000">Dokumen</th>
            <th bgcolor="#f0f0f0" class="align-top text-center" style="width: 20px; color:#000"> Tindakan</th>
        </tr>
    </thead>
    <tbody>
        @foreach($projekLDP2M2s as $projekLDP2M2)
        <tr>
            <td> {{ $loop->iteration }} </td>
            <td> {{ $projekLDP2M2->nama }} </td>
            <td> {{ $projekLDP2M2->tarikh_kelulusan ? $projekLDP2M2->tarikh_kelulusan->format('d/m/Y') : '' }} </td>
            <td> {{ $projekLDP2M2->no_plan_diluluskan }} </td>
            <td>
                @foreach ($projekLDP2M2->docType as $docLDP2M2)
                <a href="{{ Storage::url($docLDP2M2->path) }}" download> FAIL {{ $loop->iteration }} </a> <br/>
                @endforeach
            </td>
            <td>
                <a href="{{ url('/projek/pendaftaranprojek/delete_ldp2m2/') }}/{{ $projekLDP2M2->id }}" data-toggle="tooltip" class="btn btn-default btn-xs delBtn"><span style="color:#fff"> <i class="far fa-trash text-danger"></i></span> </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
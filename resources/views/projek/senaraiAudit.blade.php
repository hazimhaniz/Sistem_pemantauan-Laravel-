<table class="table table-responsive" id="table" role="grid" aria-describedby="table_info">
    <thead>
        <tr>
            <th bgcolor="#f0f0f0" class="fit align-top text-center" style=" color:#000">No. </th>
            <th bgcolor="#f0f0f0" class="align-top text-center" style=" color:#000">Tarikh Cadangan Audit Alam Sekeliling </th>
            <th bgcolor="#f0f0f0" class="align-top text-center" style=" color:#000">Status Kemajuan Kerja Projek </th>
            <th bgcolor="#f0f0f0" class="align-top text-center" style=" color:#000">Kekerapan Audit</th>
            {{-- <th bgcolor="#f0f0f0" class="align-top text-center" style="width: 10px; color:#000">No.Rujukan</th> --}}
            <th bgcolor="#f0f0f0" class="align-top text-center" style=" color:#000">Tindakan</th>
        </tr>
    </thead>
    <tbody>
        @forelse($projekAudits as $projekAudit)
        <tr>
            <td> {{ $loop->iteration }} </td>
            <td>
                {{ $projekAudit->tarikh_audit ? $projekAudit->tarikh_audit != '-0001-11-30 00:00:00' ? $projekAudit->tarikh_audit->format('d/m/Y') : '' : '' }}
            </td>
            @if($projekAudit->status_kemajuan == 1)
            <td> Belum Dimulakan </td>
            @elseif($projekAudit->status_kemajuan == 2)
            <td> Kerja Tanah </td>
            @elseif($projekAudit->status_kemajuan == 3)
            <td> Pembinaan </td>
            @elseif($projekAudit->status_kemajuan == 4)
            <td> Operasi </td>
            @elseif($projekAudit->status_kemajuan == 5)
            <td> Selesai Perlu Pemantauan </td>
            @elseif($projekAudit->status_kemajuan == 6)
            <td> Tangguh/Terbengkalai </td>
            @endif
            @if($projekAudit->kekerapan_audit == 1)
            <td> Sekali Setahun </td>
            @elseif($projekAudit->kekerapan_audit == 2)
            <td> Dua Kali Setahun </td>
            @elseif($projekAudit->kekerapan_audit == 3)
            <td> Tiga Kali Setahun </td>
            @elseif($projekAudit->kekerapan_audit == 4)
            <td> Empat Kali Setahun </td>
            @elseif($projekAudit->kekerapan_audit == 5)
            <td> Setiap Bulan </td>
            @endif
            {{-- <td> {{ $projekAudit->no_rujukan }} </td> --}}
            <td>
                <a onclick="editAudit('{{ $projekAudit->id }}', '{{ $projekAudit->tarikh_audit ? $projekAudit->tarikh_audit->format('d/m/Y') : '' }}', '{{ $projekAudit->no_rujukan }}')" class="btn btn-default btn-xs editBtn"><span style="color:#fff"> <i class="far fa-edit text-warning"></i></span></a>
                {{-- <a href="{{ url('/projek/pendaftaranprojek/delete_audit') }}/{{ $projekAudit->id }}" class="btn btn-default btn-xs delBtn"><span style="color:#fff"> <i class="far fa-trash text-danger"></i></span></a> --}}
            </td>
        </tr>
        @empty
        <tr>
            <td></td>
            <td colspan="12">Tiada Maklumat</td>
            <td></td>
        </tr>
        @endforelse
    </tbody>
</table>

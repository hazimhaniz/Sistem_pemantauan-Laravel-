<table class="table table-hover table-responsive dataTable no-footer display nowrap" id="table" role="grid" aria-describedby="table_info" >
    <thead>
        <tr role="row">
            <th bgcolor="#f0f0f0" class="fit align-top text-center" style="width: 5px; color:#000">No. </th>
            <th bgcolor="#f0f0f0" class="align-top text-center" style="width: 20px; color:#000"> Nama Laporan </th>
            <th bgcolor="#f0f0f0" class="align-top text-center" style="width: 20px; color:#000">Tarikh Kelulusan </th>
            <th bgcolor="#f0f0f0" class="align-top text-center" style="width: 20px; color:#000">Nama Perunding</th>
            <th bgcolor="#f0f0f0" class="align-top text-center" style="width: 10px; color:#000">No.Rujukan</th>
            <th bgcolor="#f0f0f0" class="align-top text-center" style="width: 20px; color:#000"> Tindakan</th>
        </tr>
    </thead>
    <tbody>
        @foreach($projekEMPs as $projekEMP)
        <tr>
            <td> {{ $loop->iteration }} </td>
            <td> {{ $projekEMP->laporan }} </td>
            <td> {{ $projekEMP->tarikh_kelulusan ? $projekEMP->tarikh_kelulusan->format('d/m/Y') : '' }} </td>
            <td> {{ $projekEMP->jururunding }} </td>
            <td> {{ $projekEMP->No_Rujukan }} </td>
            <td>
                <a href="{{ url('/projek/pendaftaranprojek/delete_emp/') }}/{{ $projekEMP->id }}" data-toggle="tooltip" class="btn btn-default btn-xs delBtn" type="button"><span style="color:#fff"> <i class="far fa-trash text-danger"></i></span></a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

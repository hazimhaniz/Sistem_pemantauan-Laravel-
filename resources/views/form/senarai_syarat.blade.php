
<div id="tableSenaraiSyarat">
    <table id="tableSenaraiSyarat1" class="table" role="grid" aria-describedby="table_info" border="1px" style="padding:0px;">
        <thead>
            <tr>
                <th bgcolor="#EBE8EC" class="align-top text-center" style="width:2%; vertical-align:top; color:#">No</th>
                <th bgcolor="#EBE8EC" class="align-top text-center" style="width:20%; vertical-align:top; color:#">Syarat</th>
                <th bgcolor="#EBE8EC" class="align-top text-center" style="width:20%; vertical-align:top; color:#">Status</th>
                <th bgcolor="#EBE8EC" class="align-top text-center" style="width:5%; vertical-align:top; color:#">Tindakan</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; ?>
            @forelse($syaratEIA as $sya)
            <tr>
                <td>{{$no++}}</td>
                <td>
                    <textarea dataID="{{ $sya->id }}" dataColumn="syarat" class="form-control border border-default rounded syaratB " {{(in_array($sya->status,[608,610,611]))?'disabled':''}} style="width: 100%">{{ $sya->syarat }}</textarea>
                </td>
                <td style="text-align: center !important;">
                    <span class="label label-lg label-inline {{$sya->filing_status->badge}}">{{$sya->filing_status->name}}</span>
                </td>
                <td>
                    @if(in_array($sya->status,[609]))
                    <a href="#" onclick="deleteSyaratB({{ $sya->id }})" class="btn btn-default btn-xs">
                        <span style="color:#fff"> <i class="fas fa-trash text-danger"></i></span>
                    </a>
                    @elseif(!in_array($sya->status,[609,608,611]))
                    <a href="#" onclick="viewKuiri({{ $sya->id }})" class="btn btn-default btn-xs">
                        <span style="color:#fff"> <i class="fas fa-pencil text-warning"></i></span>
                    </a>
                    @endif
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5">Tiada Maklumat</td>
            </tr>
            @endforelse

        </tbody>
    </table>
    <br>
<br>
@hasanyrole('pp')
<button onclick="simpanSyarat({{ $projekid }})" class="btn btn-success btn-sm from-left pull-right" id="simpanEIA" type="button">
    <span>Simpan</span>
</button>
@endhasanyrole
</div>

<br>
<br>
{{-- @hasanyrole('pp')
<button onclick="simpanSyarat({{ $projekid }})" class="btn btn-success btn-sm from-left pull-right" id="simpanEIA" type="button">
    <span>Simpan</span>
</button>
@endhasanyrole --}}

<div id="lihatKuiriDiv"></div>

<script>


    modalClose = (elem) => { 
        $('#viewKuiriSyaratModal').modal('hide');
    }

    function deleteSyaratB(syaratBID)
    {
       Swal.fire({
        title: 'Adakah anda pasti?',
        text: 'Anda tidak akan dapat memulihkan data ini!',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#fc0330',
        cancelButtonColor: '#999',
        confirmButtonText: 'Ya',
        cancelButtonText: 'Tidak'
    }).then((result) => {
        $.ajax({
            url: "{{ url('/projek/deleteSyaratEIA') }}/" + syaratBID,
            method: "GET",
            dataType: 'json',
            async: true,
            contentType: false,
            processData: false,
            success: function(data) {
                swal.fire('Padam syarat','Maklumat berjaya dipadam','success');
                $("#syaratBTable").load("{{route('projek.viewSyarat',$projekid)}}");
            }
        });
    });
}

$(".syaratB").on('change', function(){

    var dataID = $(this).attr('dataID');
    var dataColumn = $(this).attr('dataColumn');
    var value = $(this).val();

    var formData = new FormData;
    formData.append('dataID', dataID);
    formData.append('dataColumn', dataColumn);

    formData.append('value', value);

    $.ajax({
        url: "{{ url('/projek/save-syarat') }}",
        method: "POST",
        data: formData,
        dataType: 'json',
        async: true,
        contentType: false,
        processData: false,
        success: function(data) {
            $("#syaratBTable").load("{{ route('projek.viewSyarat',$projekid) }}");
        }
    });
});

function simpanSyarat(id){
    $.ajax({
        url: "{{ url('/projek/simpan-syarat') }}"+'/'+id,
        method: "GET",
        dataType: 'json',
        async: true,
        contentType: false,
        processData: false,
        success: function(data) {
            swal.fire('Pendaftaran Syarat EIA','Maklumat berjaya disimpan','success');
            $("#syaratBTable").load("{{ route('projek.viewSyarat',$projekid) }}");
        }
    });
}

function viewKuiri(id){
    $("#lihatKuiriDiv").load("{{url('/projek/viewKuiri')}}/"+id);
}




</script>
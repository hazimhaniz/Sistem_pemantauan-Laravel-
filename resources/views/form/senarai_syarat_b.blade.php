<table id="table" role="grid" aria-describedby="table_info" border="1px" style="padding:0px;">
    <thead>
        <tr>
            <th bgcolor="#EBE8EC" class="align-top text-center" style="width:2%; vertical-align:top; color:#">No</th>
            <th bgcolor="#EBE8EC" class="align-top text-center" style="width:20%; vertical-align:top; color:#">Syarat</th>
            <th bgcolor="#EBE8EC" class="align-top text-center" style="width:40%; vertical-align:top; color:#">Ulasan</th>
            <th bgcolor="#EBE8EC" class="align-top text-center" style="width:10%; vertical-align:top; color:#">Gambar</th>
            <!-- <th bgcolor="#EBE8EC" class="align-top text-center" style="width:5%; vertical-align:top; color:#">Tindakan</th> -->
        </tr>
    </thead>
    <tbody>
        <?php $no = 1; ?>
        @if(!empty($borangBSyarats))
        @foreach($borangBSyarats as $borangBSyarat)
        <tr>
            <td>{{$no++}}</td>
            <td>
                <textarea class="form-control border border-default rounded" style="width: 100%" disabled>{{ $borangBSyarat->senaraiSyarat->syarat }}</textarea>
            </td>
            <td>
                <textarea dataID="{{ $borangBSyarat->id }}" dataColumn="ulasan" class="form-control border border-default rounded syaratB" rows="3" style="width: 100%" {{ $monthlyB->status_id == 600 ? '' : 'disabled' }}>{{ $borangBSyarat->ulasan }}</textarea>
            </td>
            <td class="align-top text-left">
                @if($monthlyB->status_id == 600)
                <input id="fail_{{ $borangBSyarat->id }}" dataID="{{ $borangBSyarat->id }}" dataColumn="fail" type="file" class="syaratB" multiple> <br/>
                @endif

                <table class="" style="width: 100%; border: 1px !important">
                    @foreach ($borangBSyarat->docType as $doc)
                        <tr>
                            <td class="text-left">
                                <a href="{{ Storage::url($doc->path) }}" download> FAIL {{ $loop->iteration }} </a>
                            </td>
                            <td width="30%" class="text-center">
                                <input type="button" class="btn btn-xs btn-danger" onclick="deleteDocSyaratB('{{ $doc->id }}')" value="X" />
                            </td>
                        </tr>
                    @endforeach
                </table>
            </td>
  <!--           <td>
                @if($monthlyB->status_id == 600)
                <a href="#" onclick="deleteSyaratB({{ $borangBSyarat->id }})" class="btn btn-default btn-xs">
                    <span style="color:#fff"> <i class="fas fa-trash text-danger"></i></span>
                </a>
                @endif
            </td> -->
        </tr>
        @endforeach
        @else
        <tr>
            <td colspan="5">Tiada Maklumat</td>
        </tr>
        @endif
    </tbody>
</table>

<script>
    function deleteSyaratB(syaratBID)
    {
        $.ajax({
            url: "{{ url('/form/deleteSyarat') }}/" + syaratBID,
            method: "GET",
            dataType: 'json',
            async: true,
            contentType: false,
            processData: false,
            success: function(data) {
                $("#syaratBTable").load("{{ url('/projek/get-syarat-b/') }}/{{ $projek->id }}/{{ $year }}/{{ $month }}");
            }
        });
    }

    function deleteDocSyaratB(syaratBDocID)
    {
        $.ajax({
            url: "{{ url('/projek/delete-doc-syarat-b') }}/" + syaratBDocID,
            method: "GET",
            async: true,
            success: function(data) {
                $("#syaratBTable").load("{{ url('/projek/get-syarat-b/') }}/{{ $projek->id }}/{{ $year }}/{{ $month }}");
            }
        });
    }
    
    $(".syaratB").on('change', function(){
        
        var dataID = $(this).attr('dataID');
        var dataColumn = $(this).attr('dataColumn');
        var value = $(this).val();
        
        var formData = new FormData;
        formData.append('dataID', dataID);
        formData.append('dataColumn', dataColumn);
        
        if(dataColumn == 'fail')
        {
            var fieldID = "fail_" + dataID;
            for (var x = 0; x < $('#' + fieldID)[0].files.length; x++) {
                formData.append("fail[]", $('#' + fieldID)[0].files[x]);
            }
        }
        else{
            formData.append('value', value);
        }
        
        $(".syaratB").attr('disabled', true);
        
        $.ajax({
            url: "{{ url('/projek/save-syarat-b') }}",
            method: "POST",
            data: formData,
            dataType: 'json',
            async: true,
            contentType: false,
            processData: false,
            success: function(data) {
                $("#syaratBTable").load("{{ url('/projek/get-syarat-b/') }}/{{ $projek->id }}/{{ $year }}/{{ $month }}");
            }
        });
    });

    @if(Session::has('maxFile'))       
        Swal.fire('Ralat!', 'File hendaklah 2MB kebawah', 'error');
    @endif
        
</script>
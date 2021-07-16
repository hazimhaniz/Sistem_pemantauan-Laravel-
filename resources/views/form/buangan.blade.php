    <form action="{{route('form.buangan')}}" method="POST">
        <div class="row">

            @csrf
            <div class="col-md-12 p-t-20" style="padding-bottom: 15px;">
                <ul class="pager wizard no-style">
                    @if($borangD)
                    @hasanyrole('eo')
                    @if($borangD->status_id == 600)
                    <li class="submit">
                        <button class="btn btn-info btn-cons from-left pull-right" onclick="submitBuangan('buangan')" type="button">
                            <span>Simpan</span>
                        </button>
                    </li>
                    @endif
                    @endhasanyrole
                    @endif
                </ul>
            </div> 
            <div class="col-md-12">
               <input type="hidden" name="borangD_id" value="{{$borangD->id}}">
               <input type="hidden" name="projek_id" value="{{$borangD->projek_id}}">
               <style>
                table, th, td {
                    //border: 1px solid gray;
                }
            </style>
            <table class="" id="table" role="grid" aria-describedby="table_info" border="1px" style="padding:0px;">
                <thead>
                    <tr>
                        <th bgcolor="#" class="align-top text-center" style="width:10%; vertical-align:top; color:#">KOMPONEN</th>
                        <th bgcolor="#" class="align-top text-center" style="width:15%; vertical-align:top; color:#">PEMATUHAN BMPS</th>
                        <th bgcolor="#" class="align-top text-center" style="width:20%; vertical-align:top; color:#">ULASAN</th>
                        <th bgcolor="#" class="align-top text-center" style="width:20%; vertical-align:top; color:#">GAMBAR KEADAAN BAIK/SEBELUM DAN SELEPAS SELENGGARA</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td bgcolor="#EFD9DB">TEMPAT PENSTORAN KHAS	</td>
                        <td bgcolor="#f0f0f0" >TEMPAT PENSTORAN SELAMAT
                        </td>
                        <td bgcolor="#f0f0f0"><textarea class="form-control border border-default rounded" id="name" style="height: 35px;" placeholder="Expandable area" aria-invalid="false"></textarea></td>
                        <td bgcolor="#f0f0f0" class="align-center text-center">
                          <div tabindex="500" class="btn btn-default">
                            <input type="file" name="files[]" multiple>
                        </div>
                    </td>
                </tr>

                <tr>
                    <td bgcolor="#EFD9DB">INVENTORI	</td>
                    <td bgcolor="#f0f0f0">INVENTORI DIKEMASKINI</td>
                    <td bgcolor="#f0f0f0"><textarea class="form-control border border-default rounded" id="name" style="height: 35px;" placeholder="Expandable area" aria-invalid="false"></textarea></td>
                    <td bgcolor="#f0f0f0" class="align-center text-center"> 
                      <div tabindex="500" class="btn btn-default">
                        <input type="file" name="files[]" multiple>
                    </div>
                </td>
            </tr>
            <tr>
                <td bgcolor="#EFD9DB">PELABELAN	</td>
                <td bgcolor="#f0f0f0">ADA PELABELAN</td>
                <td bgcolor="#f0f0f0"><textarea class="form-control border border-default rounded" id="name" style="height: 35px;" placeholder="Expandable area" aria-invalid="false"></textarea></td>
                <td bgcolor="#f0f0f0" class="align-center text-center"> 
                  <div tabindex="500" class="btn btn-default">
                    <input type="file" name="files[]" multiple>
                </div>
            </td>
        </tr>


    </tbody>
</table>
</div>

<input type="hidden" name="elemen_pemeriksaan" value="1">

</div>
</form>
@push('js')

<script type="text/javascript">

    function submitBuangan(form_id) {

        var form = $("#buangan");
        Swal.fire({
            title: 'Adakah Anda Pasti?',
            text: 'Data akan disimpan',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#038cfc',
            cancelButtonColor: '#999',
            confirmButtonText: 'Ya',
            cancelButtonText: 'Tidak'
        }).then((result)=>{
            if(result.value){
                $.ajax({
                    url: "{{ route('form.buangan') }}",
                    method: "POST",
                    data: new FormData(form[0]),
                    dataType: 'json',
                    async: true,
                    contentType: false,
                    processData: false,
                    success: function(data) {
                     swal.fire(data.test,data.text,data.status);
                 },
                 fail: (data) => {
                  Swal.fire(
                    'Opps!',
                    'An error occurred, we are sorry for inconvenience.',
                    'danger'
                    )
              } 
          });
            }

        })

    }
</script>
@endpush
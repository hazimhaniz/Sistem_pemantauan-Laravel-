 <form id="keluar_masuk" action="{{route('form.borangDKeluarMasuk')}}" method="post" enctype="multipart/form-data">
    <div class="row">

        @csrf
        <div class="col-md-12 p-t-20" style="padding-bottom: 15px;">
            <ul class="pager wizard no-style">
                @if($borangD)
                @hasanyrole('eo')
                @if($borangD->status_id == 600)
                <li class="submit">
                    <button class="btn btn-info btn-cons from-left pull-right" onclick="submitAksesKeluarMasuk('keluar_masuk')"  type="button">
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
                        <td bgcolor="#EFD9DB" rowspan="4">KEMUDAHAN PELAN BASUHAN TAYAR (WASHTHROUGH)</td>
                        <td bgcolor="#f0f0f0" >MEMASANG PELAN KEMUDAHAN TAYAR <br>(WASHTHROUGH) </td>
                        <td bgcolor="#f0f0f0">
                            <textarea class="form-control border border-default rounded" name="ulasan[]" id="name" style="height: 35px;" placeholder="Expandable area" aria-invalid="false"></textarea>
                        </td>
                        <td bgcolor="#f0f0f0" class="align-center text-center">
                            <div tabindex="500" class="btn btn-default">
                                <input type="file" name="files[]" multiple>
                            </div>
                        </td>
                    </tr>            
                    <tr>
                        <td bgcolor="#f0f0f0">ADA KOLAM SEDIMEN.</td>
                        <td bgcolor="#f0f0f0">
                            <textarea class="form-control border border-default rounded" name="ulasan[]" id="name" style="height: 35px;" placeholder="Expandable area" aria-invalid="false"></textarea>
                        </td>
                        <td bgcolor="#f0f0f0" class="align-center text-center"> 
                            <div tabindex="500" class="btn btn-default">
                                <input type="file" name="files[]" multiple>
                            </div>

                        </td>
                    </tr>
                    <tr>
                        <td bgcolor="#f0f0f0">KEMUDAHAN PELAN BASUHAN TAYAR BERADA DI SEBELAH KIRI LALUAN KELUAR.</td>
                        <td bgcolor="#f0f0f0">
                            <textarea class="form-control border border-default rounded" id="name" name="ulasan[]" style="height: 35px;" placeholder="Expandable area" aria-invalid="false"></textarea>
                        </td>
                        <td bgcolor="#f0f0f0" class="align-center text-center"> 
                            <div tabindex="500" class="btn btn-default">
                                <input type="file" name="files[]" multiple>
                            </div>

                        </td>
                    </tr>
                    <tr>
                        <td bgcolor="#f0f0f0">PASANG DAN DIGUNAKAN</td>
                        <td bgcolor="#f0f0f0">
                            <textarea class="form-control border border-default rounded" name="ulasan[]" id="name" style="height: 35px;" placeholder="Expandable area" aria-invalid="false"></textarea>
                        </td>
                        <td bgcolor="#f0f0f0" class="align-center text-center"> 
                            <div tabindex="500" class="btn btn-default">
                                <input type="file" name="files[]" multiple>
                            </div>
                        </td>

                    </tr>
                    <tr>
                        <td bgcolor="#EFD9DB" rowspan="2">KEMUDAHAN PEMBASUHAN TAYAR (WATER JET)</td>
                        <td bgcolor="#f0f0f0" >DISELENGGARA (DESILTING).</td>
                        <td bgcolor="#f0f0f0">
                            <textarea class="form-control border border-default rounded" name="ulasan[]" id="name" style="height: 35px;" placeholder="Expandable area" aria-invalid="false"></textarea>
                        </td>
                        <td bgcolor="#f0f0f0" class="align-center text-center"> 
                            <div tabindex="500" class="btn btn-default">
                                <input type="file" name="files[]" multiple>
                            </div>

                        </td>
                    </tr>
                    <tr>
                        <td bgcolor="#f0f0f0">KOLAM SEDIMAN DISEDIAKAN</td>
                        <td bgcolor="#f0f0f0">
                            <textarea class="form-control border border-default rounded" name="ulasan[]" id="name" style="height: 35px;" placeholder="Expandable area" aria-invalid="false"></textarea>
                        </td>
                        <td bgcolor="#f0f0f0" class="align-center text-center"> 
                            <div tabindex="500" class="btn btn-default">
                                <input type="file" name="files[]" multiple>
                            </div>

                        </td>
                    </tr>
                    <tr>
                        <td bgcolor="#EFD9DB">RUBBER GRATE/MILD STEEL GRATING</td>
                        <td bgcolor="#f0f0f0" >DISELENGGARA (DESILTING).</td>
                        <td bgcolor="#f0f0f0">
                            <textarea class="form-control border border-default rounded" name="ulasan[]" id="name" style="height: 35px;" placeholder="Expandable area" aria-invalid="false"></textarea>
                        </td>
                        <td bgcolor="#f0f0f0" class="align-center text-center"> 
                            <div tabindex="500" class="btn btn-default">
                                <input type="file" name="files[]" multiple>
                            </div>

                        </td>
                    </tr>
                    <tr>
                        <td bgcolor="#EFD9DB">CRUSHER RUN (AGREGAT KASAR)</td>
                        <td bgcolor="#f0f0f0" >MENGGUNAKAN BAHAN MENGIKUT SPESIFIKASI ESCP.</td>
                        <td bgcolor="#f0f0f0">
                            <textarea class="form-control border border-default rounded" id="name" name="ulasan[]" style="height: 35px;" placeholder="Expandable area" aria-invalid="false"></textarea>
                        </td>
                        <td bgcolor="#f0f0f0" class="align-center text-center"> 
                            <div tabindex="500" class="btn btn-default">
                                <input type="file" name="files[]" multiple>
                            </div>

                        </td>
                    </tr>
                    <tr>
                        <td bgcolor="#EFD9DB">NOTA:
                            PEMASANGAN SATU ATAU LEBIH BMPS BOLEH DI TERIMA
                        </td>
                        <td bgcolor="#f0f0f0" >
                        PENYELENGGARAAN PENSTABILAN AKSES KELUAR MASUK (INGRESS/ENGRASS STABILIZATION) SEHINGGA SEDIMEN BERPINDAH KE ROW (RIGHT OF WAY) DIJALANKAN.</td>
                        <td bgcolor="#f0f0f0">
                            <textarea class="form-control border border-default rounded" name="ulasan[]" id="name" style="height: 35px;" placeholder="Expandable area" aria-invalid="false"></textarea>
                        </td>
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


<script type="text/javascript">

    function submitAksesKeluarMasuk(form_id) {

        var form = $("#keluar_masuk");
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
                    url: "{{ route('form.borangDKeluarMasuk') }}",
                    method: "POST",
                    data: new FormData(form[0]),
                    dataType: 'json',
                    async: true,
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        var next_tab = $('.nav-tabs > .active').next('li').find('a');
                        if(data.status='success'){
                          next_tab.trigger('click');
                      }else{
                          $('.nav-tabs li:eq(0) a').trigger('click');
                      }
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
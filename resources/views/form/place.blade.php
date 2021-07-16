<style>
  th {
    background-color: #ebe8ec;
    color: #000 !important;
    border-top: none;
    border-left: none !important;
    font-family: 'Montserrat' !important;
    font-size: 10.5px !important;
    letter-spacing: 0.06em !important;
    text-transform: uppercase !important;
    font-weight: 500 !important;
}
td {
    color: #000 !important;
    //: ;
    border-top: 1px solid #DDDDDD;
    //: ;
    border-left: 1px solid #DDDDDD;
    border-top: none !important;
    border-left: none !important;
    border-bottom: none !important;
    border-right: none !important; */
    font-family: 'Montserrat' !important;
    font-size: 10.5px !important;
    letter-spacing: 0.06em !important;
    /* text-transform: uppercase !important; */
}
</style>
<form id="place" action="{{route('form.borangDKawasanSensitif')}}" method="POST">
    <div class="row">

        @csrf
        <div class="col-md-12 p-t-20" style="padding-bottom: 15px;">
            <ul class="pager wizard no-style">
                @if($borangD)
                @hasanyrole('eo')
                @if($borangD->status_id == 600)
                <li class="submit">
                    <button class="btn btn-info btn-cons from-left pull-right" onclick="submitPlace('place')" type="submit">
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
                    <th bgcolor="#" class="align-top text-center" style="width:20%; vertical-align:top; color:#">ELEMEN PEMERIKSAAN</th>

                    <th bgcolor="#" class="align-top text-center" style="width:10%; vertical-align:top; color:#">KOMPONEN</th>
                    <th bgcolor="#" class="align-top text-center" style="width:15%; vertical-align:top; color:#">PEMATUHAN BMPS</th>

                    <th bgcolor="#" class="align-top text-center" style="width:20%; vertical-align:top; color:#">ULASAN</th>
                    <th bgcolor="#" class="align-top text-center" style="width:20%; vertical-align:top; color:#">GAMBAR KEADAAN BAIK/SEBELUM DAN SELEPAS SELENGGARA</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td bgcolor="#EFD9DB">KAWASAN SENSITIF</td>
                    <td bgcolor="#f0f0f0" ></td>
                    <td bgcolor="#f0f0f0" rowspan="1">
                        KELEBARAN ZON PENAMPAN PATUH SYARAT EIA
                    </td>
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
                    <td bgcolor="#EFD9DB" rowspan="2">NOTA:
                    1. BERPOTENSI TINGGI KEPADA HAKISAN</td>
                    <td bgcolor="#f0f0f0" rowspan="2">ZON PENAMPAN SUNGAI/ALUR AIR</td>
                    <td bgcolor="#f0f0f0" rowspan="1">ADA PENANDAAN DI TAPAK (DELINEATION)
                    </td>
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
                <td bgcolor="#f0f0f0" rowspan="1">PENCEROBOHAN ZON PENAMPAN DIELAKKAN
                </td>
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
            <td bgcolor="#EFD9DB" rowspan="18">NOTA:
            1. BERPOTENSI TINGGI KEPADA HAKISAN</td>
            <td bgcolor="#f0f0f0" rowspan="9">CERUN</td>
            <td bgcolor="#f0f0f0" rowspan="1">TERES BERTINGKAT DILAKSANAKAN
            </td>
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
            <td bgcolor="#f0f0f0" rowspan="1">PENSTABILAN DILAKSANAKAN BAGI PERMUKAAN YANG TERDEDAH YANG MELEBIH 14 HARI SELEPAS SIAP ARAS FORMASI (FORMATION LEVEL)
            </td>
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
        <td bgcolor="#f0f0f0" rowspan="1">PENSTABILAN/PENUTUPAN SEMENTARA BAGI KERJA-KERJA PEMOTONGAN CERUN YANG BELUM SIAP ARAS FORMASI (FORMATION LEVEL) DILAKSANAKAN DAN PENANGGUHAN BERLAKU TIDAK MELEBIHI 21 HARI.
        </td>
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
        <td bgcolor="#f0f0f0" rowspan="1">CERUN DIMAMPATKAN
        </td>
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
        <td bgcolor="#f0f0f0" rowspan="1">CERUN DITUTUP SEPENUHNYA/SEMPURNA
        </td>
        <td bgcolor="#f0f0f0">
            <textarea class="form-control border border-default rounded" name="ulasan[]" id="name" style="height: 35px;" placeholder="Expandable area" aria-invalid="false"></textarea>
        </td>
        <td bgcolor="#f0f0f0" class="align-top text-center"> 
         <div tabindex="500" class="btn btn-default">
            <input type="file" name="files[]" multiple>
        </div>
    </td>
</tr>
<tr>
    <td bgcolor="#f0f0f0" rowspan="1">MENJALANKAN SURFACE ROUGHENING ATAU MENGGUNAKAN KAEDAH YANG BETUL
    </td>
    <td bgcolor="#f0f0f0">
        <textarea class="form-control border border-default rounded" name="ulasan[]" id="name" style="height: 35px;" placeholder="Expandable area" aria-invalid="false"></textarea>
    </td>
    <td bgcolor="#f0f0f0" class="align-top text-center"> 
       <div tabindex="500" class="btn btn-default">
        <input type="file" name="files[]" multiple>
    </div>
</td>
</tr>
<tr>
    <td bgcolor="#f0f0f0" rowspan="1">TERDAPAT BERM DRAIN DI KAKI CERUN.
    </td>
    <td bgcolor="#f0f0f0">
        <textarea class="form-control border border-default rounded" name="ulasan[]" id="name" style="height: 35px;" placeholder="Expandable area" aria-invalid="false"></textarea>
    </td>
    <td bgcolor="#f0f0f0" class="align-top text-center"> 
      <div tabindex="500" class="btn btn-default">
        <input type="file" name="files[]" multiple>
    </div>
</td>
</tr>
<tr>
    <td bgcolor="#f0f0f0" rowspan="1">TERDAPAT UPSLOPE DRAIN.
    </td>
    <td bgcolor="#f0f0f0">
        <textarea class="form-control border border-default rounded" name="ulasan[]" id="name" style="height: 35px;" placeholder="Expandable area" aria-invalid="false"></textarea>
    </td>
    <td bgcolor="#f0f0f0" class="align-top text-center"> 
      <div tabindex="500" class="btn btn-default">
        <input type="file" name="files[]" multiple>
    </div>
</td>
</tr>
<tr>
    <td bgcolor="#f0f0f0" rowspan="1">TERDAPAT KAWASAN ANJAKAN (SET BACK) DI SEPANJANG TEPI CERUN (SIDE SLOPE).
    </td>
    <td bgcolor="#f0f0f0">
        <textarea class="form-control border border-default rounded" name="ulasan[]" id="name" style="height: 35px;" placeholder="Expandable area" aria-invalid="false"></textarea>
    </td>
    <td bgcolor="#f0f0f0" class="align-top text-center"> 
        <div tabindex="500" class="btn btn-default">
            <input type="file" name="files[]" multiple>
        </div>
    </td>
</tr>
<tr>
    <td bgcolor="#f0f0f0" rowspan="1">MERENTAS ALUR AIR (WATERWAY CROSSING)
    </td>
    <td bgcolor="#f0f0f0" rowspan="1">PEMASANGAN/ PENGGUNAAN BMPS YANG SESUAI MERENTASI ALUR AIR (WATERWAY CROSSING)
    </td>
    <td bgcolor="#f0f0f0">
        <textarea class="form-control border border-default rounded" name="ulasan[]" id="name" style="height: 35px;" placeholder="Expandable area" aria-invalid="false"></textarea>
    </td>
    <td bgcolor="#f0f0f0" class="align-top text-center"> 
        <div tabindex="500" class="btn btn-default">
            <input type="file" name="files[]" multiple>
        </div>
    </td>
</tr>


<tr>
    <td bgcolor="#f0f0f0" rowspan="4">PUNCAK BUKIT
    </td>
    <td bgcolor="#f0f0f0" rowspan="1">TIADA PENCEROBOHAN KAWASAN ANJAKAN.
    </td>
    <td bgcolor="#f0f0f0">
        <textarea class="form-control border border-default rounded" name="ulasan[]" id="name" style="height: 35px;" placeholder="Expandable area" aria-invalid="false"></textarea>
    </td>
    <td bgcolor="#f0f0f0" class="align-top text-center"> 
        <div tabindex="500" class="btn btn-default">
            <input type="file" name="files[]" multiple>
        </div>
    </td>
</tr>
<tr>

    <td bgcolor="#f0f0f0" rowspan="1">PENGGODOLAN DENGAN CARA MENOLAK (TIPPING) OVERBURDEN TERUS KE TEBING CERUN DIELAKKAN.
    </td>
    <td bgcolor="#f0f0f0">
        <textarea class="form-control border border-default rounded" name="ulasan[]" id="name" style="height: 35px;" placeholder="Expandable area" aria-invalid="false"></textarea>
    </td>
    <td bgcolor="#f0f0f0" class="align-top text-center"> 
       <div tabindex="500" class="btn btn-default">
        <input type="file" name="files[]" multiple>
    </div>
</td>
</tr>
<tr>

    <td bgcolor="#f0f0f0" rowspan="1">TERDAPAT EARTH BANK/SILT FENCE SELEPAS UPSLOPE DRAIN.
    </td>
    <td bgcolor="#f0f0f0">
        <textarea class="form-control border border-default rounded" name="ulasan[]" id="name" style="height: 35px;" placeholder="Expandable area" aria-invalid="false"></textarea>
    </td>
    <td bgcolor="#f0f0f0" class="align-top text-center"> 
        <div tabindex="500" class="btn btn-default">
            <input type="file" name="files[]" multiple>
        </div>
    </td>
</tr>
<tr>

    <td bgcolor="#f0f0f0" rowspan="1">TERDAPAT DIVERSION DIKE ATAU PIPE SLOPE SRAIN DI ATAS PUNCAK BUKIT.
    </td>
    <td bgcolor="#f0f0f0">
        <textarea class="form-control border border-default rounded" name="ulasan[]" id="name" style="height: 35px;" placeholder="Expandable area" aria-invalid="false"></textarea>
    </td>
    <td bgcolor="#f0f0f0" class="align-top text-center">    
     <div tabindex="500" class="btn btn-default">
        <input type="file" name="files[]" multiple>
    </div>
</td>
</tr>
<tr>
    <td bgcolor="#f0f0f0" rowspan="3">KAWASAN HIJAU
    </td>
    <td bgcolor="#f0f0f0" rowspan="1">ADA PENANDAAN DI TAPAK (DELINEATION/DEMARCATION)
    </td>
    <td bgcolor="#f0f0f0">
        <textarea class="form-control border border-default rounded" name="ulasan[]" id="name" style="height: 35px;" placeholder="Expandable area" aria-invalid="false"></textarea>
    </td>
    <td bgcolor="#f0f0f0" class="align-top text-center">
       <div tabindex="500" class="btn btn-default">
        <input type="file" name="files[]" multiple>
    </div>
</td>
</tr>
<tr>

    <td bgcolor="#f0f0f0" rowspan="1">DILAKSANAKAN MENGIKUT ESCP
    </td>
    <td bgcolor="#f0f0f0">
        <textarea class="form-control border border-default rounded" name="ulasan[]" id="name" style="height: 35px;" placeholder="Expandable area" aria-invalid="false"></textarea>
    </td>
    <td bgcolor="#f0f0f0" class="align-top text-center"> 
       <div tabindex="500" class="btn btn-default">
        <input type="file" name="files[]" multiple>
    </div>
</td>
</tr>
<tr>

    <td bgcolor="#f0f0f0" rowspan="1">TIADA PENCEROBOHAN KAWASAN HIJAU
    </td>
    <td bgcolor="#f0f0f0">
        <textarea class="form-control border border-default rounded" name="ulasan[]" id="name" style="height: 35px;" placeholder="Expandable area" aria-invalid="false"></textarea>
    </td>
    <td bgcolor="#f0f0f0" class="align-top text-center"> 
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

    function submitPlace(form_id) {

        var form = $("#place");
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
                    url: "{{ route('form.borangDKawasanSensitif') }}",
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
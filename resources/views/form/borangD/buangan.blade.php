<form id="formDBuangan_{{ $elemen_id }}" method="POST" action="{{ route('form.submitborangD') }}">
  @csrf
  <div class="row">
    <input type="hidden" name="borangDID" value="{{ $borangD->id }}" />
    <div class="col-md-12 p-t-20" style="padding-bottom: 15px;">
      <ul class="pager wizard no-style">
        @if($borangD)
        @hasanyrole('eo')
        @if($borangD->status_id == 600)
        <li class="submit">
          <button onclick="submitFormDBuangan_{{ $elemen_id }}()" class="btn btn-info btn-cons from-left pull-right" name="submit" value="Simpan" type="button">
            <span>Simpan</span>
          </button>
        </li>
        @endif
        @endhasanyrole
        @endif
      </ul>
    </div>
    <div class="col-md-12">
      <table class="" id="table" role="grid" aria-describedby="table_info" border="1px" style="padding:0px;">
        <thead>
          <tr>
            <th bgcolor="#" class="align-top text-center" style="width:10%; vertical-align:top; color:#">KOMPONEN</th>
            <th bgcolor="#" class="align-top text-center" style="width:15%; vertical-align:top; color:#">PEMATUHAN BMPS</th>
            <th bgcolor="#" class="align-top text-center" style="width:20%; vertical-align:top; color:#">ULASAN</th>
            <th bgcolor="#" class="align-top text-center" style="width:20%; vertical-align:top; color:#">GAMBAR KEADAAN BAIK/SEBELUM DAN SELEPAS SELENGGARA</th>
          </tr>
        </thead>
        <?php
        $count = [2, 2, 2];
        $no = 0;
        $no2 = 0;
        ?>
        <tbody>
          @foreach($MasterBMPs as $MasterBMP)
          <tr>
            <td bgcolor="#EFD9DB" rowspan="{{$count[$no++]}}">{{$MasterBMP->komponen}}</td>
          </tr>
          @foreach($MasterBMP->pematuhan as $pematuhan)
          <tr>
            <td bgcolor="#f0f0f0">{{ $pematuhan->pematuhan_bmp }}</td>
            <td bgcolor="#f0f0f0">
              <input type="hidden" name="master_bmp_id[]" value="{{$pematuhan->id}}" />
              <input type="hidden" name="master_bmp_code[]" value="{{ $MasterBMP->komponen }}" />
              <input type="hidden" name="master_bmp_component[]" value="{{ $MasterBMP->KodPemeriksaan->jenis_pemeriksaan }}" />
              <textarea class="form-control border border-default rounded" name="ulasan[]" id="ulasan_{{ $elemen_id }}_{{ $pematuhan->id }}" style="height: 35px;" placeholder="Expandable area" aria-invalid="false" {{($borangD->status_id==602 || $borangD->status_id==13)?'disabled':''}}></textarea>
            </td>
            <td bgcolor="#f0f0f0" class="align-center text-center">
              <div tabindex="500">
                @if($borangD->status_id==600)
                <input type="file" name="files[]" multiple>
                @elseif($borangD->status_id==602 || $borangD->status_id==13 )
                <div id="downloadFile_{{ $elemen_id }}_{{ $pematuhan->id }}" style="border: none !important; b">
                <a class='btn btn-xs btn-fail disabled' href='#' download>Tiada Dokumen</a><br>
                </div>
                @endif
              </div>
            </td>
          </tr>
          @endforeach
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</form>

<script>
  function submitFormDBuangan_{{$elemen_id}}(){
    var form = $("#formDBuangan_{{ $elemen_id }}");
    $.ajax({
      url: "{{ route('form.submitborangD') }}",
      method: "POST",
      data: new FormData(form[0]),
      dataType: 'json',
      async: true,
      contentType: false,
      processData: false,
      success: function(data) {
        Swal.fire(data.test,data.txt, data.status);
      },
      error: function() {
                //console.log(data);
                Swal.fire('Gagal', 'Maklumat Gagal disimpan', 'error');
              }
            });
  }
</script>
<script>
 var populateBorangD;
 $(document).ready(function() {
   populateBorangD = function() {
     $.ajax({
       url: "{{ url('/projek/get-form-d') }}/{{ $borangD->id }}",
       method: "GET",
       dataType: 'json',
       async: true,
       contentType: false,
       processData: false,
       success: function(data) {
         for (let i = 0; i < data.length; i++) {
           var monthlyD = data[i];
           if(monthlyD.ulasan){
            $("#ulasan_{{ $elemen_id }}_" + monthlyD.elemen_pemeriksaan).val(monthlyD.ulasan).css('background-color','white');
           }
           if (monthlyD.doc_type.length > 0) {
             let html = '';
             for (let a = 0; a < monthlyD.doc_type.length; a++) {
              if (monthlyD.doc_type[a].path.length > 0) {
                html = `<a class='btn btn-xs btn-primary' href='{{ asset("storage") }}/${monthlyD.doc_type[a].path}' download>Muat Turun</a><br>`;
               $(`#downloadFile_{{$elemen_id}}_` + monthlyD.elemen_pemeriksaan).html(html);
              }
             }
           }else{
                html = `<a class='btn btn-xs btn-fail disabled' href='#' download>Tiada Dokumen</a><br>`;
                $(`#downloadFile_{{$elemen_id}}_` + monthlyD.elemen_pemeriksaan).html(html);
           }
      }
    },
    error: function(data) {
     console.log(data);
   }
 })
   };
   populateBorangD();
 });
</script>


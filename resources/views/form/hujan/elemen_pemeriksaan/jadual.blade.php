<form id="formDJadualHujan_{{ $elemen_id }}" method="POST" action="{{ route('form.laporanHujan') }}">
  @csrf
  <div class="row">
    @if($laporan_hujan)
    <input type="hidden" name="hujan_id" value="{{ $laporan_hujan->id }}" />
    @endif
    <?php 
    if(empty($laporan_hujan)){
      $laporan_hujan = '';
    }
    ?>
    <div class="col-md-12">
      <input id="tarikh_hujan_copy8" type="hidden" readonly name="tarikh_hujan" class="form-control" required>
      <input id="tempoh_hujan_copy8" type="hidden" readonly name="tempoh_hujan" min="1" class="form-control" value="1" required>
      <input id="bacaan_hujan_copy8" type="hidden" readonly name="bacaan_hujan" min="12.5" class="form-control" value="12.5" required>
      <input type="hidden" name="tahun" value="{{$laporan_hujan->tahun}}" readonly>
      <input type="hidden" name="bulan" value="{{$laporan_hujan->bulan}}" readonly>
      <input type="hidden" name="borangDID" value="{{$borangD->id}}" readonly>
      <input type="hidden" name="hujan_id" value="{{$laporan_hujan->id}}" readonly>
      <input type="hidden" name="projek_id" value="{{$laporan_hujan->projek_id}}">
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
        $count = [2, 2, 4];
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
              <textarea class="form-control border border-default rounded" name="ulasan[]" id="ulasan_hujan_{{ $elemen_id }}_{{ $pematuhan->id }}" style="height: 35px;" placeholder="Expandable area" aria-invalid="false" {{($laporan_hujan->status_id==602 || $laporan_hujan->status_id==13)?'disabled':''}}></textarea>
            </td>
            <td bgcolor="#f0f0f0" class="align-center text-center">
              <div tabindex="500">
                @if($laporan_hujan->status_id==600)
                <input type="file" name="files[]" multiple>
                @elseif($laporan_hujan->status_id==602 || $laporan_hujan->status_id==13 )
                <div id="downloadFileHujan_{{ $elemen_id }}_{{ $pematuhan->id }}" style="border: none !important; b">
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
    <div class="col-md-12 p-t-20" style="padding-bottom: 15px;">
      <ul class="pager wizard no-style">
        
        @if($laporan_hujan)
        @hasanyrole('eo')
        @if($laporan_hujan->status_id == 600)
        <li class="submit">
          <button onclick="submitFormDJadualHujan_{{ $elemen_id }}()" class="btn btn-info btn-cons from-left pull-right" name="submit" value="Simpan" type="button">
            <span>Simpan</span>
          </button>
        </li>
        @endif
        @endhasanyrole
        @endif
      </ul>
    </div>
  </div>
</form>

<script>
  $(document).ready(function() { 
    $('#tarikh_hujan').change(function() {
      $('#tarikh_hujan_copy8').val($('#tarikh_hujan').val());
    });
    $('#tempoh_hujan').change(function() {
      $('#tempoh_hujan_copy8').val($('#tempoh_hujan').val());
    });
    $('#bacaan_hujan').change(function() {
      $('#bacaan_hujan_copy8').val($('#bacaan_hujan').val());
    });
  });

  function submitFormDJadualHujan_{{$elemen_id}}(){
    var form = $("#formDJadualHujan_{{ $elemen_id }}");
    $.ajax({
      url: "{{ route('form.laporanHujan') }}",
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
 var populateBorangHujan;
 $(document).ready(function() {
  populateBorangHujan = function() {
     $.ajax({
      url: "{{ url('/projek/get-form-hujan') }}/{{ $laporan_hujan->id }}",
       method: "GET",
       dataType: 'json',
       async: true,
       contentType: false,
       processData: false,
       success: function(data) {
         for (let i = 0; i < data.length; i++) {
           var monthlyD = data[i];
           if(monthlyD.ulasan){
             $("#ulasan_hujan_{{ $elemen_id }}_" + monthlyD.elemen_pemeriksaan).val(monthlyD.ulasan).prop('readonly', true).css('background-color','white');
           }
           if (monthlyD.doc_type.length > 0) {
             let html = '';
             for (let a = 0; a < monthlyD.doc_type.length; a++) {
              if (monthlyD.doc_type[a].path.length > 0) {
                html = `<a class='btn btn-xs btn-primary' href='{{ asset("storage") }}/${monthlyD.doc_type[a].path}' download>Muat Turun</a><br>`;
                $(`#downloadFileHujan_{{$elemen_id}}_` + monthlyD.elemen_pemeriksaan).html(html);
              }
            }
          }else{
            html = `<a class='btn btn-xs btn-fail disabled' href='#' download>Tiada Dokumen</a><br>`;
            $(`#downloadFileHujan_{{$elemen_id}}_` + monthlyD.elemen_pemeriksaan).html(html);
          }
        }
      },
      error: function(data) {
       console.log(data);
     }
   })
   };
   populateBorangHujan();
 });
</script>

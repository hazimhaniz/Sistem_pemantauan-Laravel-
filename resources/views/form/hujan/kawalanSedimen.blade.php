<form id="formDSedimenHujan_{{ $elemen_id }}" method="POST" action="{{ route('projek.submitHujan') }}">
  @csrf
  <input type="hidden" name="hujanID" value="{{ $laporan_hujan->id }}"/>
  <input type="hidden" name="projekID" value="{{ $laporan_hujan->projek_id }}"/>
  <input type="hidden" name="month" value="{{ $laporan_hujan->bulan }}"/>
  <input type="hidden" name="year" value="{{ $laporan_hujan->tahun }}"/>
  <div class="row">
<div class="col-md-12">
  <input type="hidden" readonly name="tarikh_hujan" class="form-control tarikh_hujan_copy" required>
  <input type="hidden" readonly name="tempoh_hujan" min="1" class="form-control tempoh_hujan_copy" value="1" required>
  <input type="hidden" readonly name="bacaan_hujan" min="12.5" class="form-control bacaan_hujan_copy" value="12.5" required>
  <table class="table-responsive" id="table" role="grid"  border="1px" style="padding:0px; font-size:12.5px;">
    <thead>
      <tr>
        <th bgcolor="#" class="align-top text-center" style="width:2%; vertical-align:top; color:#">BIL</th>
        <th bgcolor="#" class="align-top text-center" style="width:8%; vertical-align:top; color:#">KOD BMPS</th>
        <th bgcolor="#" class="align-top text-center" style="width:10%; vertical-align:top; color:#">KOMPONEN</th>
        <th bgcolor="#" class="align-top text-center" style="width:30%; vertical-align:top; color:#">PEMATUHAN BMPS</th>
        <th bgcolor="#" class="align-top text-center" style="width:20%; vertical-align:top; color:#">STATUS</th>
        <th bgcolor="#" class="align-top text-center" style="width:15%; vertical-align:top; color:#">TARIKH</th>
        <th bgcolor="#" class="align-top text-center" style="width:15%; vertical-align:top; color:#">ULASAN</th>
        <th bgcolor="#" class="align-top text-center" style="width:10%; vertical-align:top; color:#">GAMBAR</th>
      </tr>
    </thead>
    <tbody>
      @foreach($MasterBMPs as $MasterBMP)
      <tr>
        <td bgcolor="#f0f0f0"> {{ $loop->iteration }} </td>
        <td bgcolor="#f0f0f0"> {{ $MasterBMP->code }} </td>
        <td bgcolor="#f0f0f0"> {{ $MasterBMP->component }} </td>
        <td bgcolor="#f0f0f0" class="text-left">
          <ol type="i">
            @foreach($MasterBMP->pematuhans as $pematuhan)
            <li> {{ $pematuhan->name }} </li>
            @endforeach
          </ol>
        </td>
        <td bgcolor="#f0f0f0">
          <input type="hidden" name="master_bmp_id[]" value="{{ $MasterBMP->id }}"/>
          <input type="hidden" name="master_bmp_code[]" value="{{ $MasterBMP->code }}"/>
          <input type="hidden" name="master_bmp_component[]" value="{{ $MasterBMP->component }}"/>
          <div class="form-group alignment text-left">
            <div class="radio radio-primary">
              <input type="radio" value="1" name="status_hujan_{{ $MasterBMP->id }}" id="status_hujan_{{ $elemen_id }}_{{ $MasterBMP->id }}_1" {{($laporan_hujan->status_id==602 || $laporan_hujan->status_id==13)?'disabled':''}}>
              <label for="status_hujan_{{ $elemen_id }}_{{ $MasterBMP->id }}_1">Baik</label>
            </div>

            <div class="radio radio-primary">
              <input type="radio" value="2" name="status_hujan_{{ $MasterBMP->id }}" id="status_hujan_{{ $elemen_id }}_{{ $MasterBMP->id }}_2" {{($laporan_hujan->status_id==602 || $laporan_hujan->status_id==13)?'disabled':''}}>
              <label for="status_hujan_{{ $elemen_id }}_{{ $MasterBMP->id }}_2">Perlu diselenggara</label>
            </div>

            <div class="radio radio-primary">
              <input type="radio" value="3" name="status_hujan_{{ $MasterBMP->id }}" id="status_hujan_{{ $elemen_id }}_{{ $MasterBMP->id }}_3" checked {{($laporan_hujan->status_id==602 || $laporan_hujan->status_id==13)?'disabled':''}}>
              <label for="status_hujan_{{ $elemen_id }}_{{ $MasterBMP->id }}_3">Tidak Berkaitan</label>
            </div>   
          </div>
        </td>
        <td bgcolor="#f0f0f0">
          @php $firstMonthDay = \Carbon\Carbon::createFromFormat('Y-m-d', $borangD->tahun."-".$borangD->bulan."-"."01") @endphp
          <input type="text" name="bmp_date[]" id="bmp_date_{{ $elemen_id }}_{{ $MasterBMP->id }}" class="form-control datepicker" data-date-start-date="{{ $firstMonthDay->format('d/m/Y') }}" data-date-end-date="{{ $firstMonthDay->endOfMonth() }}" autocomplete="off" {{($borangD->status_id==602 || $borangD->status_id==13)?'disabled':''}}>
        </td>
        <td bgcolor="#f0f0f0">
          <textarea name="ulasan[]" id="ulasan_hujan_{{ $elemen_id }}_{{ $MasterBMP->id }}" class="form-control border border-default rounded" style="height: 35px;" aria-invalid="false" {{($laporan_hujan->status_id==602 || $laporan_hujan->status_id==13)?'disabled':''}}></textarea>
        </td>
        <td bgcolor="#f0f0f0" class="text-center">
         <div tabindex="500">
          @if($laporan_hujan->status_id==600)
          <input name="file[]" id="file_{{ $elemen_id }}_{{ $MasterBMP->id }}" type="file" />
          @elseif($laporan_hujan->status_id==602 || $laporan_hujan->status_id==13 )
          <div id="downloadFile_hujan_{{ $elemen_id }}_{{ $MasterBMP->id}}" class="downloadFileHujanDivSedimen">
          <a class='btn btn-xs btn-fail disabled' href='#' download>Tiada Dokumen</a><br>
          </div>
          @endif
        </div>
      </td>
    </tr>
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
      <button onclick="submitFormDSedimenHujan_{{ $elemen_id }}()" class="btn btn-info btn-cons from-left pull-right" name="submit" value="Simpan" type="button">
        <span>Simpan</span>
      </button>
    </li>
    @endif
    @endhasanyrole
    @endif
   
  </ul>
</div>                                                         
</div>
<br>

</form>

<script>
  function submitFormDSedimenHujan_{{ $elemen_id }}()
  {
    var form = $("#formDSedimenHujan_{{ $elemen_id }}");

    $.ajax({
      url: form.attr('action'),
      method: form.attr('method'),
      data: new FormData(form[0]),
      dataType: 'json',
      async: true,
      contentType: false,
      processData: false,
      success: function(data) {
        Swal.fire(data.test,data.txt, data.status);
      },
      error: function(){
        console.log(data);
        Swal.fire('Gagal', 'Maklumat Gagal disimpan', 'error');
      }
    });
  }
</script>
<script>
  var populateBorangHujan;
  $(document).ready(function(){
   $(".downloadFileHujanDivSedimen").hide();
   populateBorangHujan = function(){
    $.ajax({
      url: "{{ url('/projek/get-form-hujan') }}/{{ $laporan_hujan->id }}",
      method: "GET",
      dataType: 'json',
      async: true,
      contentType: false,
      processData: false,
      success: function(data) {
       for (let i = 0; i < data.length; i++) {
        var hujan = data[i];
        $("#status_hujan_{{ $elemen_id }}_" + hujan.elemen_pemeriksaan + "_" + hujan.kod_bmp_status).prop('checked', true);
        $("#bmp_date_hujan_{{ $elemen_id }}_" + hujan.elemen_pemeriksaan).val(hujan.kod_bmp_date_dmy);
        $("#ulasan_hujan_{{ $elemen_id }}_" + hujan.elemen_pemeriksaan).val(hujan.ulasan);

        if (hujan.doc_type.length > 0) {
         let html = '';
         for (let a = 0; a < hujan.doc_type.length; a++) {
          if (hujan.doc_type[a].path.length > 0) {
           html = `<a  class='btn fail  btn-xs' href='{{ asset("storage") }}/${hujan.doc_type[a].path}' download>Muat Turun</a><br>`;
           $(`#downloadFile_hujan_{{$elemen_id}}_` + hujan.elemen_pemeriksaan).html(html);
           $('.downloadFileHujanDivSedimen').show();
         }
       }
     }else{
        html = `<a class='btn btn-xs btn-fail disabled' href='#' download>Tiada Dokumen</a><br>`;
        $(`#downloadFile_hujan_{{$elemen_id}}_` + hujan.elemen_pemeriksaan).html(html);
        $('.downloadFileHujanDivSedimen').show();
      }
   }
 },
 error: function(data){
  console.log(data);
}
});
  };        
  populateBorangHujan();
});
</script>
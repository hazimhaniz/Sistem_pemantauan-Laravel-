<form id="formDSedimen_{{ $elemen_id }}" method="POST" action="{{ url('/projek/submit-form-d') }}">
    @csrf
    <input type="hidden" name="borangDID" value="{{ $borangD->id }}"/>

    <div class="row">

        <div class="col-md-12">
            <table class="table-responsive" id="table" role="grid"  border="1px" style="padding:0px; font-size:12.5px;">
                <thead>
                    <tr>
                        <th bgcolor="#" class="align-top text-center" style="width:2%; vertical-align:top; color:#">BIL</th>
                        <th bgcolor="#" class="align-top text-center" style="width:8%; vertical-align:top; color:#">KOD BMPS</th>
                        <th bgcolor="#" class="align-top text-center" style="width:10%; vertical-align:top; color:#">KOMPONEN</th>
                        <th bgcolor="#" class="align-top text-center" style="width:15%; vertical-align:top; color:#">PEMATUHAN BMPS</th>
                        <th bgcolor="#" class="align-top text-center" style="width:20%; vertical-align:top; color:#">STATUS</th>
                        <th bgcolor="#" class="align-top text-center" style="width:20%; vertical-align:top; color:#">TARIKH PEMERIKSAAN/ULASAN/GAMBAR</th>
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
                            <input type="hidden" name="master_bmp_id[]" value="{{ $MasterBMP->id }}" />
                            <input type="hidden" name="master_bmp_code[]" value="{{ $MasterBMP->code }}" />
                            <input type="hidden" name="master_bmp_component[]" value="{{ $MasterBMP->component }}" />
                            <div class="form-group alignment text-left">
                                <div class="radio radio-primary">
                                    <input type="radio" value="1" name="status_{{ $MasterBMP->id }}" id="status_{{ $elemen_id }}_{{ $MasterBMP->id }}_1" {{($borangD->status_id==602 || $borangD->status_id==13)?'disabled':''}}>
                                    <label for="status_{{ $elemen_id }}_{{ $MasterBMP->id }}_1">Baik</label>
                                </div>

                                <div class="radio radio-primary">
                                    <input type="radio" value="2" name="status_{{ $MasterBMP->id }}" id="status_{{ $elemen_id }}_{{ $MasterBMP->id }}_2" {{($borangD->status_id==602 || $borangD->status_id==13)?'disabled':''}}>
                                    <label for="status_{{ $elemen_id }}_{{ $MasterBMP->id }}_2">Perlu diselenggara</label>
                                </div>

                                <div class="radio radio-primary">
                                    <input type="radio" value="3" name="status_{{ $MasterBMP->id }}" id="status_{{ $elemen_id }}_{{ $MasterBMP->id }}_3" {{($borangD->status_id==602 || $borangD->status_id==13)?'disabled':''}}>
                                    <label for="status_{{ $elemen_id }}_{{ $MasterBMP->id }}_3">Tidak Berkaitan</label>
                                </div>
                            </div>
                        </td>
                        <td bgcolor="#f0f0f0">
                          <div tabindex="500">
                            @php $firstMonthDay = \Carbon\Carbon::createFromFormat('Y-m-d', $borangD->tahun."-".$borangD->bulan."-"."01") @endphp
                            <input type="text" name="bmp_date[]" id="bmp_date_{{ $elemen_id }}_{{ $MasterBMP->id }}" class="form-control datepicker" data-date-start-date="{{ $firstMonthDay->format('d/m/Y') }}" data-date-end-date="{{ $firstMonthDay->endOfMonth() }}" autocomplete="off" {{($borangD->status_id==602 || $borangD->status_id==13)?'disabled':''}} placeholder="Tarikh Pemeriksaan">
                        </div>
                        <div tabindex="500">
                            <textarea name="ulasan[]" id="ulasan_{{ $elemen_id }}_{{ $MasterBMP->id }}" class="form-control border border-default rounded" style="height: 35px;" {{($borangD->status_id==602 || $borangD->status_id==13)?'disabled':''}} aria-invalid="false" placeholder="Ulasan"></textarea>
                        </div>
                        <br>
                        <div tabindex="500">
                            @if($borangD->status_id==600)
                            <input type="file" name="files[]" multiple>
                            @elseif($borangD->status_id==602 || $borangD->status_id==13 )
                            <div id="downloadFile_{{ $elemen_id }}_{{ $MasterBMP->id }}" class="downloadFileDivSedimen">
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
</div>
<br>
<div class="col-md-12 p-t-20" style="padding-bottom: 15px;">
   <input type="hidden" name="flag" id="flagD5" value="">
   <ul class="pager wizard no-style">
    @if($borangD)
    @hasanyrole('eo')
    @if($borangD->status_id == 600)
    <li class="submit">
        <button onclick="submitFormD_{{ $elemen_id }}()" class="btn btn-info btn-cons from-left pull-right" name="submit" value="Simpan" type="button">
            <span>Simpan</span>
        </button>
    </li>
    @endif
    @endhasanyrole
    @endif
</ul>
</div>
</form>

<script>
    function submitFormD_{{ $elemen_id }}()
    {
        var form = $("#formDSedimen_{{ $elemen_id }}");
        
        $.ajax({
            url: form.attr('action'),
            method: form.attr('method'),
            data: new FormData(form[0]),
            dataType: 'json',
            async: true,
            contentType: false,
            processData: false,
            success: function(data) {
                Swal.fire('Berjaya', 'Maklumat telah disimpan', 'success');
                $('#flagD5').val('1');
            },
            error: function(){
                console.log(data);
                Swal.fire('Gagal', 'Maklumat Gagal disimpan', 'error');
            }
        });
    }
</script>
<script>
    var populateBorangD;
    $(document).ready(function(){
        $(".downloadFileDivSedimen").hide();

        populateBorangD = function(){
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
                        $("#status_{{ $elemen_id }}_" + monthlyD.elemen_pemeriksaan + "_" + monthlyD.kod_bmp_status).prop('checked', true);
                        $("#bmp_date_{{ $elemen_id }}_" + monthlyD.elemen_pemeriksaan).val(monthlyD.kod_bmp_date_dmy);
                        $("#ulasan_{{ $elemen_id }}_" + monthlyD.elemen_pemeriksaan).val(monthlyD.ulasan);

                        if (monthlyD.doc_type.length > 0) {
                            let html = '';
                            for (let a = 0; a < monthlyD.doc_type.length; a++) {
                                if (monthlyD.doc_type[a].path.length > 0) {
                                    html = `<a class='btn btn-xs btn-primary' href='{{ asset("storage") }}/${monthlyD.doc_type[a].path}' download>Muat Turun</a><br>`;
                                    $(`#downloadFile_{{$elemen_id}}_` + monthlyD.elemen_pemeriksaan).html(html);
                                    $('.downloadFileDivSedimen').show();
                                }
                            }
                        }else{
                            html = `<a class='btn btn-xs btn-fail disabled' href='#' download>Tiada Dokumen</a><br>`;
                            $(`#downloadFile_{{$elemen_id}}_` + monthlyD.elemen_pemeriksaan).html(html);
                            $('.downloadFileDivSedimen').show();
                        }
                    }
                },
                error: function(data){
                    console.log(data);
                }
            });
        };
        populateBorangD();
    });
</script>


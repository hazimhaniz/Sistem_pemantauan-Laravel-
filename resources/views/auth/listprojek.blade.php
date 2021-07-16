<div class="modal fade show" id="modal-project" tabindex="-1" role="dialog" aria-labelledby="addModalTitle" style="padding-right: 17px; display: none;">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalTitle">Senarai <span class="bold">Projek</span></h5>
            </div>
            <div class="modal-body m-t-20">
                <div class=" container-fluid bg-white">
                  @if($projekarray)
                  <table class="table" id="table">
                      <thead>
                          <tr>
                              <th>No</th>
                              <th width="80%">Nama Projek</th>
                              <th>Tindakan</th>
                          </tr>
                      </thead>
                      <tbody>
                        @php
                        $i = 1;
                        @endphp
                        @foreach($projekarray as $key => $projekarrays)
                          <tr bgcolor="#ff0000">
                            <td>{{$i}}</td>
                            <td>{{$projekarrays['1']}}</td>
                            <td>
                              @if($projekarrays['4'] == 'Sah')
                              <button type="button" class="btn btn-info btn-block m-t-5" onclick="projeklist({{$projekarrays['0']}},{{$projekarrays['2']}},'{{$projekarrays['3']}}')">Teruskan</button>
                              @elseif($projekarrays['4'] == 'Tidak Active')
                              Akaun Belum Disahkan
                              @elseif($projekarrays['4'] == 'Tidak Sah')
                              Invalid Credential
                              @endif
                            </td>
                          </tr>
                          @php
                          $i = $i + 1;
                          @endphp
                        @endforeach
                      </tbody>
                  </table>
                  @endif
                </div>
            </div>
            <div class="modal-footer">
              <a href="{{ route('login') }}" class="btn btn-default btn-cons from-left pull-right">Kembali</a>
            </div>
        </div>
    </div>
</div>
<script>
$("#modal-project").modal("show");
$('#modal-project').modal({backdrop: 'static', keyboard: false})
</script>

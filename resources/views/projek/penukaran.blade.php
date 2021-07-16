<div class="row">
    <form id='pendaftaraneoemc' role="form" method="post" action="{{ route('pendaftaraneoemc') }}">
        {{ csrf_field() }}
        <div class="col-md-12">
            <table class="" id="table" role="grid" aria-describedby="table_info"
            style="padding:10px; width:100%">

            <thead>
                <tr>
                    <th class="align-top text-center" bgcolor="#" style="color:#; width:20%;">Pengawasan</th>
                    <th class="align-top text-center" bgcolor="#" style="color:#; width:20%;">Nama EO</th>
                    <th class="align-top text-center" bgcolor="#" style="color:#; width:20%;">Nama EMC
                    </th>

                </tr>
            </thead>
            <tbody>
                @foreach($PakejHasPengawasan as $pengawasan)
                <tr>
                    <td style="text-align: left !important;">
                        {{$pengawasan->jenis_pengawasan}}
                        <input type="hidden" name="pakej_pengawasan_id[] " value="{{$pengawasan->pengawasan_id}}">
                        <input type="hidden" name="pakej_id[] " value="{{$pengawasan->pakej_id}}">
                    </td>

                    <td>
                        <select id="selectrequired" name="user_eo[]" class="select-normal full-width custom-select border border-default" required>
                            <option selected=""></option>
                            @foreach($userEOs as $userEO)
                            <option value="{{ $userEO->user_id }}"> {{ $userEO->user ? $userEO->user->name : '' }} </option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <select id="selectrequired" name="user_emc[]" class="select-normal full-width custom-select border border-default" required>
                            <option selected=""></option>
                           @foreach($userEMCs as $userEMC)
                            <option value="{{ $userEMC->user_id }}"> {{ $userEMC->user ? $userEMC->user->name : '' }} </option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <br>
    </div>
    <button class="btn btn-info btn-cons from-left pull-right" onclick="pendaftaraneoemc('pendaftaraneoemc')" type="button">
        <span>Simpan1</span>
    </button>

    <button class="btn btn-danger btn-cons from-left pull-right daftar_ldp2m2" onclick="$('.dropify-clear').click();" data-dismiss="modal" type="button">
        <span>Tutup1</span>
    </button>
</form>
</div>

@push('js')
<script type="text/javascript">
    function pendaftaraneoemc(form_id){
        var form = $('#pendaftaraneoemc');

        $.ajax({
          url: "{{ route('pendaftaraneoemc') }}",
          method: "POST",
          data: new FormData(form[0]),
          dataType: 'json',
          async: false,
          contentType: false,
          processData: false,
          success: function(data) {      
            alert(data.status);
            $("#daftareoemc").modal("hide")
            // tableEMP.api().ajax.reload(null, false);
        }
    });
    }


</script>

@endpush

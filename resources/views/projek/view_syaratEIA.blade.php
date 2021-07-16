<div class=" container-fluid container-fixed-lg bg-white">
    <div class="card card-transparent">

                    <div class="card-title dashTitle" style="font-weight: bold;font-size: 12.5px">Pendaftaran Syarat EIA</div>
                </div>

                    <table class="table dataTable no-footer" id="loadKuiri" border="0px">
                        <thead>
                            <tr>
                                <th style="width: 5%;">No</th>
                                <th style="width: 30%;">Syarat</th>
                                <th style="width: 30%;">Status</th>
                                <th style="width: 35%;">Tindakan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1; ?>
                            @forelse($syaratEIA as $syarat)
                            <tr>
                                <td>{{$no++}}</td>
                                <td style="text-align: left !important;">{{$syarat->syarat}}</td>
                                <td style="text-align: center !important;">
                                    <span class="label label-lg label-inline {{$syarat->filing_status->badge}}">{{$syarat->filing_status->name}}</span>
                                </td>
                                <td>
                                    @if(!in_array($syarat->status,[610,611]))
                                    <button onclick="lihatKuiriSyarat({{ $syarat->id }})" class="btn btn-sm btn-danger">Kuiri</button>
                                    <button onclick="sahKuiriSyarat({{ $syarat->id }})" class="btn btn-sm btn-success">Sahkan</button>
                                    @endif
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="12">Tiada Maklumat</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>


<div id="lihatKuiriDiv"></div>

<script type="text/javascript">
   function lihatKuiriSyarat(kuiriID) {
    $("#lihatKuiriDiv").load("{{ url('/projek/kuiri') }}/" + kuiriID);
}

$(document).ready(function(){
   sahKuiriSyarat=function(sahID){
    Swal.fire({
        title: 'Adakah Anda Pasti?',
        text: 'Data akan disahkan',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#038cfc',
        cancelButtonColor: '#999',
        confirmButtonText: 'Ya',
        cancelButtonText: 'Tidak'
    }).then((result)=>{

        $.ajax({
            url: "{{ url('/projek/sahSyarat') }}" +'/'+ sahID,
            method: "GET",
            dataType: 'json',
            async: true,
            contentType: false,
            processData: false,
            success: function(data) {
             Swal.fire({
                title: data.test,
                text: 'Maklumat telah disahkan',
                icon: 'success',
                buttons: true
            }).then(function(data){
               $("#loadKuiri").load("{{ url('/projek/loadKuiri') }}/" + {{ $projek->id }});
           });


        }
    });

    });

}
});

</script>

@push('js')

<script type="text/javascript">
    var sahKuiriSyarat;
    $(document).ready(function(){
        $("#loadKuiri").load("{{route('projek.viewSyarat',$projek->id)}}");


    });

</script>
@endpush

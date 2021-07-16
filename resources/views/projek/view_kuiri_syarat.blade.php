<style>
 .center {
  position: absolute;
  left: 30%;
  top: 10%;
  /*bottom: 60%;*/
  transform: translate(-50%, -50%);
}
</style>

<div class="modal fade" id="viewKuiriSyaratModal" tabindex="-1"  aria-labelledby="exampleModalLabel" style="display: block; padding-right: 17px;">
    <div class="modal-dialog  center" role="document">
        <div class="modal-content" style= "border: 2px solid #990033">
            <div class="modal-header">
                <h3 class="modal-title" id="addModalTitle"><label><span><b class="text-dark"> KUIRI </b></span></label></h3>
                <small> {{ $projek ? $projek->no_fail_jas : '' }} </small>
                <br/>
                <small> Syarat : {{ $kuiri->syarat }} </small>
                <button type="button" class="close" onClick="modalClose(this)">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body m-t-20">
                <div class="form-group form-group-default" style= "border: 2px solid #d8d8d8">
                    <label>
                        <span><b class="text-dark"> Syarat </b></span>
                    </label>
                    <textarea class="form-control form-control-lg" style="min-height: 100px; " disabled>{{ $kuiri->syarat }}</textarea>
                </div>
                <br>
                <div class="form-group form-group-default" style= "border: 2px solid #d8d8d8">
                    <label>
                        <span><b class="text-dark"> Kuiri</b></span>
                    </label>
                    <textarea id="kuiriSyarat" class="form-control form-control-lg" style="min-height: 100px">@if($kuiri->status==611){{$kuiri->kuiri}}@endif</textarea>
                </div>
                <br>
                <button onclick="jawabKuiriSyarat({{ $kuiri->id }})" class="btn btn-success btn-sm from-left pull-right" id="simpan" type="button">
                    <span>HANTAR</span>
                </button>
            </div>

        </div>
    </div>
</div>

<script type="text/javascript">
    $("#viewKuiriSyaratModal").modal('show');

    modalClose = (elem) => { 
        $('#viewKuiriSyaratModal').modal('hide');
    }

    function jawabKuiriSyarat(id){
        var kuiriSyarat = $("#kuiriSyarat").val();
        
        var formData = new FormData;
        formData.append('kuiriSyarat', kuiriSyarat);

        $.ajax({
            url: "{{ route('projek.submitKuiri',$kuiri->id) }}",
            method: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                console.log(response);

                Swal.fire({
                    title: 'Berjaya',
                    text: 'Maklumat telah disimpan',
                    icon: 'success',
                    buttons: true
                }).then(function(response){
                 $('#viewKuiriSyaratModal').modal('hide');
                 $("#loadKuiri").load("{{ url('/projek/loadKuiri') }}/" + {{ $kuiri->projek_id }});
             });

            },
            error: function(response) {
                Swal.fire('Gagal', 'Maklumat gagal disimpan', 'error');
            }
        });
        
    }
</script>
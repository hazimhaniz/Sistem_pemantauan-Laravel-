<style>
   .center {
      position: absolute;
      left: 30%;
      top: 10%;
      transform: translate(-50%, -50%);
  }



</style>

<div class="modal fade" id="viewKuiriSyaratModal2" tabindex="-1"  aria-labelledby="exampleModalLabel" style="display: block; padding-right: 17px;">
    <div class="modal-dialog  center" role="document">
        <div class="modal-content" style= "border: 2px solid #990033">

            <div class="modal-header">
                <h3 class="modal-title" id="addModalTitle"><label><span><b class="text-dark"> KEMASKINI SYARAT </b></span></label></h3>

                <br/>

                <small> Syarat : {{ ucfirst($syaratEIA->syarat) }} </small>

                <table class="table table-bordered">
                    <thead>
                        <td>No</td>
                        <td>Kuiri</td>
                        <td>Tarikh Kuiri</td>
                    </thead>
                    <tbody>
                        <?php $no=1; ?>

                        @foreach($syaratEIA->senarai_kuiri as $senarai)
                        <tr>
                            <td>{{$no++}}</td>
                            <td>{{$senarai->kuiri}}</td>
                            <td>{{date('d/m/Y', strtotime($senarai->tarikh_kuiri))}}</td>
                        </tr>
                        @endforeach
                    </tbody>

                </table>
                <button type="button" class="close" onClick="modalClose(this)">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body m-t-20">
                <div class="form-group form-group-default" style= "border: 2px solid #d8d8d8">
                    <label>
                        <span><b class="text-dark">Kemaskini Syarat </b></span>
                    </label>
                    <textarea id="kuiriSyarat" class="form-control form-control-lg" style="min-height: 100px;"></textarea>
                </div>
                <br>
                <br>
                <button onclick="simpanKemaskiniSyarart()" class="btn btn-success btn-sm from-left pull-right" id="simpan" type="button">
                    <span>Simpan</span>
                </button>
            </div>

        </div>
    </div>
</div>

<script type="text/javascript">
    $("#viewKuiriSyaratModal2").modal('show');

    modalClose = (elem) => { 
        $('#viewKuiriSyaratModal2').modal('hide');
    }

    function simpanKemaskiniSyarart(id){
        var kuiriSyarat = $("#kuiriSyarat").val();
        
        var formData = new FormData;
        formData.append('kuiriSyarat', kuiriSyarat);

        $.ajax({
            url: "{{ route('projek.submitKemaskini',$syaratEIA->id) }}",
            method: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                console.log(response);

                Swal.fire({
                    title: 'Berjaya',
                    text: 'Maklumat telah disimpan.',
                    icon: 'success',
                    buttons: true
                }).then(function(response){
                 $('#viewKuiriSyaratModal2').modal('hide');
                 $("#tableSenaraiSyarat").load("{{ url('/projek/viewSyarat') }}/" + {{ $syaratEIA->projek_id }});
             });

            },
            error: function(response) {
                Swal.fire('Gagal', 'Maklumat gagal disimpan', 'error');
            }
        });
        
    }

</script>
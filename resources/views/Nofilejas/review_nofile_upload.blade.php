<div class="modal fade" id="test" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 style=" font-family: 'Montserrat'; font-size:13.5px ; font-weight:800" class="modal-title text-dark" id="exampleModalLabel">Muat Naik Fail JAS</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <br>
            <form id="submit-files"  method="POST" enctype="multipart/form-data" >
            <div class="modal-body">
                <div class="row">
                    <p style=" font-family: 'Montserrat';">Sila rujuk ini <a href="{{ asset('ldp2m2/dokumen/Contoh_Struktur_data_ekas.xls') }}" style="color: #78bd11; font-weight:800">Ekas.xls</a> untuk contoh file.</p>
                    <div class="col-md-12">
                        <div class="form-group form-group-default">
                            <label style=" font-family: 'Montserrat';">
                                <span><b class="text-dark">Muat Naik Excel (No Fail JAS)</b></span><span style="color:red;">*</span>
                            </label>
                            <div tabindex="500" class="" style="border:none">
                                <input id="file" type="file" name="files" >
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                <button id="#" onclick="submitFile('submit-files')" type="button" class="btn btn-success">Hantar</button>
            </div>
            </form>
        </div>
    </div>
</div>

@push('js')

<script type="text/javascript">
    function submitFile(form_id){
        var form = $('#submit-files');
       
        var file_data = $('#file').prop('files')[0];
        let formData = new FormData();
        formData.append('file',file_data);

    if(document.getElementById("file").files.length === 0){
        swal.fire('Ralat', 'Sila muat naik fail terlebih dahulu.', 'error');
    } else {
        swal.fire({
            title: "Perhatian",
            text: "Anda pasti untuk menghantar fail ini?",
            icon: "info",
        })
        .then((confirm) => {
            if (confirm) {
                $.ajax({
                    url: "{{ route('admin.review.submit.nofile') }}",
                    method: 'POST',
                    data: formData,
                    contentType:false,
                    cache:false,
                    processData:false,

                    success: function(data) {
                        swal.fire(data.title, data.message, data.status)
                        .then(function(){
                            if(data.status == 'success'){
                                swal.fire('Perhatian', 'Jika ingin memadam data sila hubungi IT JAS.', 'info').then(function(){location.href=data.redirect});
                            }
                        });
                        //console.log(form);
                    }
                });
            }
        })
    }
    }

</script>
@endpush
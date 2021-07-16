<div class="modal fade" id="modal-nyahaktif" tabindex="-1" role="dialog" aria-labelledby="addModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addModalTitle"><span class="bold">Sebab Nyah Aktif</span></h5>
                    <!-- <small class="text-muted m-b-20">Sila isi ruangan di bawah bagi pendaftaran baharu environmental officer.</small> -->
                    <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button> -->
                </div>
                <div class="modal-body">
                    <form id='form-nyahaktif' role="form" method="post" action="{{ route('external.pengguna.pengurusan.deactivatepost') }}">
                        <input type="hidden" name="userID" id="userID" value="{{$user->id}}">
                        <br><br>
                        <div id="mel" class="form-group form-group-default">
                            <label>
                                <span id="label_username">Sebab Nyah Aktif</span><span style="color:red;">*</span>
                                <i style="cursor: help; color: #48B0F7;" class="fa fa-question-circle" data-html="true" data-toggle="tooltip" title="" data-original-title="cth : email@gmail.com"></i>
                            </label>
                            <textarea id="sebab" class="form-control " name="sebab" type="text" required title="" ></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-info btn-cons from-left pull-right" type="button" onclick="submitForm('form-nyahaktif')">
                        <span>Simpan</span>
                    </button>
                    <button class="btn btn-danger btn-cons from-left pull-right" onclick="batalform()" type="button">
                        <span>Batal</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <script>
        $("#modal-nyahaktif").modal("show");

        function batalform(){
            $('#modal-nyahaktif').modal('hide');        
        }

        $("#form-nyahaktif").submit(function(e) {
            e.preventDefault();
            var form = $(this);
  
            $.ajax({
                url: form.attr('action'),
                method: form.attr('method'),
                data: new FormData(form[0]),
                dataType: 'json',
                async: true,
                contentType: false,
                processData: false,
                success: function(data) {
                    swalFunction(data.title,data.message,'');
                    // swal('Rekod permohonan nyah aktif telah dihantar', '');
                },
                error: function(e) {
                    // console.log(e.responseJSON.errors.failjas);
                    // if (e.responseJSON.errors.failjas) {
                    //     // console.log('css in js');
                    //     // document.getElementById("failno").style.backgroundColor = 'background-color: rgba(243, 89, 88, 0.1) !important;'
                    //     var sijilkom = document.getElementById("failno");
                    //     sijilkom.classList.add("has-error");
                    //     $('#failnoerror').show();
                    // }
                }
            });
        });
    </script>
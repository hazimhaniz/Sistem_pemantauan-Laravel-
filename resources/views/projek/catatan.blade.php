<div class="modal fade" id="modal-tidaklengkap" tabindex="-1" role="dialog" aria-labelledby="addModalTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalTitle">Sebab <span class="bold">Tidak Lengkap</span></h5>
                <!-- <small class="text-muted">Sila masukkan maklumat tidak lengkap.</small> -->
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body m-t-20">
                <div class="form-group row control-label col-md-12">
                    <div class="col-md-12">
                        <textarea id="ulasan1" class="form-control " name="ulasan1" placeholder="" style="height: 400px;text-transform: none !important;" disabled>{{$projek->pindaan_catatan}}</textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
  $('#modal-tidaklengkap').modal('show');
</script>

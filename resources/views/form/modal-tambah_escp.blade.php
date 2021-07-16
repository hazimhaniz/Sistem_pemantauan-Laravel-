<div id="tambahescp" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalTitle"> Tambah <b>ESCP</b></h5>
                <small class="text-muted">Isi dan pilih maklumat yang berkaitan.</small>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form id="form-tambahescp" role="form" method="POST" action="{{ route('form.hantarBorangESCP') }}">
                <div class="modal-body m-t-20">
                    <div id="add_message_1"></div>
                    <div class="row">
                    <div id="alertESCP"></div>
                        <div class="form-group form-group-default">
                            <label>
                                <span><b class="text-dark">NAMA</b></span>
                            </label>
                            <input class="form-control form-control-lg" id="escp_name" name="escp_name" type="text" required>
                            <input class="form-control form-control-lg" id="borang_id" name="borang_id" type="hidden" value="{{$borangA->id}}" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <label style="font-family: 'Montserrat'; font-size:12px" class="col-md-3">
                        PELAN KAWASAN HAKISAN DAN KELODAKAN(ESCP)</label>
                        <div class="radio radio-primary col-md-9">
                            <input checked type="radio" value="1" name="status_escp" id="dilulukan_escp">
                            <label for="dilulukan_escp">DILULUSKAN</label>
                            <input type="radio" value="0" name="status_escp" id="belum_diluluskan_escp">
                            <label for="belum_diluluskan_escp">BELUM DILULUSKAN</label>
                        </div>
                    </div>
                    <div class="form-group-attached m-b-12">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group form-group-default">
                                    <div class="form-input-group">
                                        <label>
                                            <span id="label_">Tarikh Kelulusan</span>
                                            <i style="cursor: help; color: #48B0F7;" class="fa fa-question-circle info_ " data-html="true" data-toggle="tooltip"
                                            title="" data-original-title="Yang dikeluarkan oleh perbadanan"></i>
                                        </label>
                                        <input  class="form-control tarikh_kelulusan" data-date-end-date="0d" name="tarikh_kelulusan_escp" id="tarikh_kelulusan_escp" type="text" required autocomplete="off">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group form-group-default">
                                    <label>
                                        <span><b class="text-dark">No.Rujukan</b></span>
                                    </label>
                                    <input class="form-control form-control-lg" name="no_rujukan_escp" id="no_rujukan_escp" type="text"
                                    placeholder="" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group form-group-default">
                                    <label>
                                        <span><b class="text-dark">No.Pelan</b></span>
                                    </label>
                                    <input class="form-control form-control-lg" name="no_pelan_escp" id="no_pelan_escp" type="text"
                                    placeholder="" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <br>
                    <br>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" id="simpan_escp" onclick="submitFormEscp('form-tambahescp')"></i>Simpan</button>
                </div>
            </form> 
        </div>
    </div>
</div>

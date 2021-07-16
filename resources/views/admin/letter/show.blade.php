<div class="modal fade" id="baseAjaxModalContent" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Lihat Notifikasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group form-group-default required">
                    <label>
                        <span>Subjek</span>
                    </label>
                    <input type="text" disabled class="form-control" name="subject" value="{{ $letter->subject ?? '' }}" id="subject" required autocomplete="off" />
                </div>

                <label>
                    <span>Mesej</span>
                </label>
                <textarea disabled name="message" id="message" required>{{ $letter->message ?? '' }}</textarea>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

@include('admin.letter.js.show')
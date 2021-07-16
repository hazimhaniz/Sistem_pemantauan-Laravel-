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
                        <span>Kod Notifikasi</span>
                    </label>
                    <input type="text" disabled class="form-control" name="code" value="{{ $notification->code ?? '' }}" id="code" required autocomplete="off" />
                </div>

                <div class="form-group form-group-default required">
                    <label>
                        <span>Nama Notifikasi</span>
                    </label>
                    <input type="text" disabled class="form-control" name="name" value="{{ $notification->name ?? '' }}" id="name" autocomplete="off" required />
                </div>

                <label>
                    <span>Notifikasi</span>
                </label>
                <textarea disabled name="message" id="message" required>{{ $notification->message ?? '' }}</textarea>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

@include('admin.notification.js.show')
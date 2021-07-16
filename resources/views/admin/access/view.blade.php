<!-- Modal -->
<div class="modal fade" id="modal-view" tabindex="-1" role="dialog" aria-labelledby="addModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalTitle">Papar <span class="bold">Maklumat</span></h5>
                <small class="text-muted">Sila lihat maklumat di bawah.</small>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body m-t-20">

                <div class="row">
                    <div class="col-md-12">
                        @component('components.label', [
                            'name' => 'description',
                            'label' => 'Data Keizinan',
                        ])
                        <div id="json-new" style="word-wrap: break-word;"></div>
                        @endcomponent
                </div>

            </div>
            <!-- <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div> -->
        </div>
    </div>
</div>
<script type="text/javascript">
$('#modal-view').modal('show');

$('#json-new').jsonPresenter({
    json: {!! $access->description ? $access->description : "{}" !!} // JSON objects here
});
</script>
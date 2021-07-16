<style>
 .center {
  position: absolute;
  left: 30%;
  top: 10%;
  transform: translate(-50%, -50%);
}



</style>

<div class="modal fade" id="viewKuiriModal" tabindex="-1"  aria-labelledby="exampleModalLabel" style="display: block; padding-right: 17px;">
    <div class="modal-dialog center" role="document">
        <div class="modal-content" style= "border: 2px solid #990033">
            <div class="modal-header">
                <h3 class="modal-title" id="addModalTitle"><label><span><b class="text-dark"> KUIRI </b></span></label></h3>
                <small> {{ $projek ? $projek->no_fail_jas : '' }} ({{ $kuiri->year }} - {{ $kuiri->month }}) </small>
                <br/>
                <small> Borang : {{ $kuiri->form_class }} </small>
                <button type="button" class="close" onClick="modalClose(this)">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body m-t-20">
                <div class="form-group form-group-default" style= "border: 2px solid #d8d8d8">
                    <label>
                        <span><b class="text-dark"> KUIRI </b></span>
                    </label>
                    <textarea class="form-control form-control-lg" style="min-height: 100px; " disabled>{{ $kuiri->kuiri }}</textarea>
                </div>
                <br>
                <div class="form-group form-group-default" style= "border: 2px solid #d8d8d8">
                    <label>
                        <span><b class="text-dark"> JAWAPAN 1</b></span>
                    </label>
                    <textarea id="queryJawabText" class="form-control form-control-lg" style="min-height: 100px" {{ in_array($kuiri->status, [503]) && Auth::user()->hasRole('pp') ? '' : 'disabled' }}>{{ $kuiri->balas }}</textarea>
                </div>
                <br>
                @hasanyrole('pp')
                @if(in_array($kuiri->status, [503]))
                <button onclick="jawabQuerySubmit({{ $kuiri->id }})" class="btn btn-success btn-sm from-left pull-right" id="simpan" type="button">
                    <span>HANTAR</span>
                </button>
                @endif
                @endhasanyrole
            </div>

        </div>
    </div>
</div>

<script type="text/javascript">
    $("#viewKuiriModal").modal('show');

    modalClose = (elem) => { 
        $('#viewKuiriModal').modal('hide');
    }
</script>
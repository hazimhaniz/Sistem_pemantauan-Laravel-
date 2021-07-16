@extends('layouts.auth')

@section('content')
<div style="width:100%;">
  <div class="row">
    <h4 class="bold" style="padding-left: 2%;">Lupa Kata Laluan</h4>
    <div class="col-lg-12">
    <label for="type1">Sila Pilih Peranan Anda.</label><BR>
        <div class="radio radio-primary">
            <input name="project_type" value="0" id="type1" onclick="luaran()" type="radio" class="hidden" required="" aria-required="true">
            <label for="type1">Penggerak Projek / EO / EMC</label><BR>
            <input name="project_type" value="1" id="type2" onclick="dalaman()" type="radio" class="hidden" required="" aria-required="true">
            <label for="type2">Pegawai JAS</label>
        </div>
    </div>
  </div>
    <div id="internal" style="display: none;">
        <br>
        <div class="row" style="padding: 2%;">
            <div style="width:100%;">
                <p>Sila hubungi 03-88712186 (Unit Rangkaian, BTM JAS) untuk reset kata laluan.</p>
                <a class="btn btn-default m-t-10" href="{{ route('login') }}"><i class="fa fa-angle-left m-r-5"></i> Kembali</a>
            </div>
        </div>
    </div>
    <div id="external" style="display: none;">
        <div class="row" style="padding: 2%;">
            <div style="width:100%;">
               
                <p>Sila masukkan alamat e-mel yang didaftarkan di sistem ini.</p>
                <form method="POST" action="{{ route('password.email') }}" class="p-t-15" id="form-recover" name="form-recover" role="form">
                    {{ csrf_field() }}
                    <div class="row m-b-10">
                        <div class="col-md-12">
                        <!-- @include('components.input', [
                                'label' => 'No Kad Pengenalan',
                                'info' => 'No Kad Pengenalan yang telah didaftrakna dalam sistem ini',
                                'mode' => 'required',
                                'name' => 'nokp',
                                'type' => 'text',
                            ]) -->
                            @include('components.input', [
                                'label' => 'Alamat E-mel ',
                                'info' => 'Email used to registered with your account',
                                'mode' => 'required',
                                'name' => 'email',
                                'type' => 'email',
                                'id' => 'email',
                            ])
                        </div>
                        <div class="col-md-12 p-l-0 m-t-20">
                            <p>Sebarang masalah sila e-mel kepada Pentadbir Sistem di <a class="text-complete" href="mailto:admin@email.com">spppeia@doe.gov.my</a></p>
                        </div>
                    </div>
                    <button onclick="submitreset()" class="btn btn-info m-t-10 pull-right" type="submit"><!-- <i class="fa fa-check m-r-5"></i> --> Hantar</button>
                    <a class="btn btn-default m-t-10" href="{{ route('login') }}"><i class="fa fa-angle-left m-r-5"></i> Kembali</a>
                </form>
            </div>
        </div>
    </div>
    <a id="kembali" class="btn btn-default m-t-10" href="{{ route('login') }}"><i class="fa fa-angle-left m-r-5"></i> Kembali</a>
</div>
@endsection

@push('js')
<script type="text/javascript">
    $(function() {
        $('#form-recover').validate()
    })

    function submitreset(){
        var email_value = $('#email').val();
        if(email_value.indexOf('doe.gov.my') >= 0){
            swal('','Bagi pegawai JAS, sila hubungi 03-88712186 (Unit Rangkaian, BTM JAS) untuk reset kata laluan.','');
            event.preventDefault();
        }
    }

    function dalaman() {
        $("#internal").show();
        $("#external").hide();
        $("#kembali").hide();
    }
    function luaran() {
        $("#internal").hide();
        $("#external").show();
        $("#kembali").hide();
    }
</script>
@endpush
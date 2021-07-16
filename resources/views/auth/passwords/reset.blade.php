<!DOCTYPE html>
<html>

<head>
    <meta content="text/html; charset=utf-8" http-equiv="content-type">
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, shrink-to-fit=no" name="viewport">

    <meta content="yes" name="apple-mobile-web-app-capable">
    <meta content="yes" name="apple-touch-fullscreen">
    <meta content="default" name="apple-mobile-web-app-status-bar-style">
    <meta content="{{ env('APP_DESC') }}" name="description">
    <meta content="{{ env('APP_AUTHOR') }}" name="author">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="{{ asset('assets/plugins/pace/pace-theme-flash.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/plugins/font-awesome/css/font-awesome.css') }}" rel="stylesheet" type="text/css">

    <link href="{{ asset('assets/plugins/fontawesome-pro-5.13.0/css/all.css') }}" rel="stylesheet" type="text/css">

    <link href="{{ asset('assets/plugins/jquery-scrollbar/jquery.scrollbar.css') }}" media="screen" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/plugins/select2/css/select2.min.css') }}" media="screen" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/plugins/switchery/css/switchery.min.css') }}" media="screen" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/plugins/bootstrap-datepicker/css/datepicker3.css') }}" rel="stylesheet" type="text/css" media="screen">
    <link href="{{ asset('pages/css/pages-icons.css') }}" rel="stylesheet" type="text/css">
    <link class="main-stylesheet" href="{{ asset('pages/css/themes/corporate.css') }}" rel="stylesheet" type="text/css">

    <link href="{{ asset('css/global.css') }}" rel="stylesheet" type="text/css">

    <script type="text/javascript">
        window.onload = function() {
            // fix for windows 8
            if (navigator.appVersion.indexOf("Windows NT 6.2") != -1)
                document.head.innerHTML +=
            '<link rel="stylesheet" type="text/css" href="{{ asset("pages/css/windows.chrome.fix.css") }}" />'
        }
    </script>

    <style type="text/css">
        .btn-complete,
        .btn-complete.active,
        .btn-complete:active,
        .btn-complete.active:focus,
        .btn-complete:active:focus,
        .btn-complete:active:hover,
        .show .dropdown-toggle.btn-complete {
            background-color: #2d8fbd !important;
            border-color: #2d8fbd !important;
            color: #fff;
        }

        .check-icon {
            right: 15px;
            position: absolute;
            top: 30px;
            color: green;
            font-size: 10.5px;
        }

        #checkhideemcp {
            display: none;
        }

        .btn-info:focus {
            color: black;
            background-color: #1f3953;
            border-color: #6a74b7;
        }

        .btn-info:active {
            color: #fff;
            background-color: #1f3953;
            border-color: #1f3953;
        }

        .register-container {
            width: 768px;
            //width: 1200px;
            //width: 1000px;
            max-width: 100%;
        }

        .logo {
            padding-left: 25%;
            margin-top: 50px;
            display: block;
        }

        .logo>img {
            width: 60%;
            height: 100%;
        }

        .content {
            background-color: white;
            border-top: 5px solid #1e5377;
            border-radius: 3px;
        }

        #div-announcement {
            border-left: 1px solid #f0f0f0;
            border-top: unset;
        }

        @media (max-width: 767.98px) {
            .logo {
                padding-left: 0;
                margin-top: 10px;
            }

            .logo>img {
                width: 100%;
            }

            #div-announcement {
                border-top: 1px solid #f0f0f0;
                border-left: unset;
                margin-top: 20px;
            }
        }

        .btn-box {
            height: 50px;
            margin: 10px 0px;
            cursor: pointer !important;
        }

        .login-wrapper {
            background-color: #00a46c;
            background: url("/images/ldp2m2.png");
            //background: url("http://192.168.1.103/pmo/public/sng-images/bglogin/bglogin_my.jpg");
            width: 100%;
            height: 100%;
            overflow: hidden;
            background-size: cover;
            background-repeat: no-repeat;
            background-position: bottom;
            //-webkit-transition: background-image 0.2s ease-in-out;
            //transition: background-image 0.2s ease-in-out;
            //object-fit: contain;
        }

        .float-top-right {
            position: fixed;
            top: 15px;
            right: 40px;
            text-align: center;
        }

        .float-top-right-desc {
            position: fixed;
            top: 25px;
            right: 200px;
            text-align: center;
        }

        #flagcountries {
            color: #000;
            font-family: 'Montserrat';
            font-size: 10.5px;
            text-transform: uppercase;
            font-weight: 500;
        }

        @media screen and (max-width: 600px) {
            .hideinmobile {
                visibility: hidden;
                clear: both;
                float: left;
                margin: 10px auto 5px 20px;
                width: 28%;
                display: none;
            }
        }

        .modal-dialog .modal-xs {
            //max-width: 50% !important;
            //width:200px !important;
        }

        @media (min-width: 992px) {
            .modal-xxs {
                max-width: 25%;
            }
        }

        .form-separator {
            height: 12px;
            margin: 26px 0 32px;
            text-align: center;
            border-bottom: 1px solid #e4e5e7;
        }

        .btn-register {
            background-color: #ffce00;
            border-color: #ffce00;
            color: #000;
            font-family: 'Montserrat' !important;
            font-size: 12.5px;
        }

        .btn-log{
            background-color: #00A651;
            border-color: #00A651;
            color:#fff;
            font-family: 'Montserrat' !important;
            font-size:12.5px;
            font-weight: 500;
        }

        .btn-lupa {
            background-color: #fff;
            border-color: #c4342d;
            color: #000;
            font-family: 'Montserrat' !important;
            font-size: 12.5px;
        }

        .custom-select {
            font-family: 'Montserrat' !important;
            font-size: 11.5px !important;
        }

        .swal2-title {
            font-family: 'Montserrat' !important;
            font-size: 20.5px !important;
        }


        .swal2-styled.swal2-confirm {

            background-color: #1BAAA0 !important;
            border-color: #1BAAA0 !important;
            font-family: 'Montserrat' !important;
            font-size: 14.5px !important;
        }

        .swal2-styled.swal2-cancel {
            color: #fff !important;
            background-color: #f35958 !important;
            border-color: #f35958 !important;
            font-family: 'Montserrat' !important;
            font-size: 14.5px !important;
        }

        .swal2-icon.swal2-info {
            border-color: #facea8;
            color: #f8bb86;
        }

        .swal2-popup {
            width: 25em !important;
        }

        .swal2-content {
            font-family: 'Montserrat' !important;
            font-size: 14.5px !important;
        }

        body.swal2-shown:not(.swal2-no-backdrop):not(.swal2-toast-shown) {
            overflow: hidden;
            height: 100% !important;
        }
        .bg-caption{
    text-align: center !important;
    width: 900px !important;
  
}
    </style>
    @stack('css')

</head>

<body class="fixed-header menu-pin menu-behind">
    <div class="login-wrapper">
        <div class="bg-pic">
            <div class="bg-caption pull-bottom sm-pull-bottom text-white m-b-20">
            <h3 class="bold text-white">
                   <center>SPEIA - Sistem Pemantauan EIA</center> 
                </h3>
                <p class="small">
                  Hak cipta terpelihara 2020 Jabatan Alam Sekitar, Kementerian Alam Sekitar dan Air
                </p>
            </div>
        </div>

        <div class="login-container bg-white" style="opacity:">
            <div class="p-l-50 p-r-50 p-t-50 m-t-30 sm-p-l-15 sm-p-r-15 sm-p-t-40">
            <img src="{{ URL::to('images/jata.png') }}" class="img-fluid"">
                <img src="{{ URL::to('images/jabatan.png') }}" class="img-fluid">
                <h2 class="p-t-15">Selamat Datang  <br/> ke Sistem Pemantauan EIA (SPEIA)</h2>
                <form method="POST" action="{{ route('reset.password.post') }}" class="p-t-15" name="form-internal" role="form">
                    {{ csrf_field() }}
                    <div class="row">
                        <h2 class="p-t-15"><b>Lupa kata laluan</b></h2>
                        <div class="col-lg-12">
                            <label for="type1">Sila pilih peranan anda.</label><br>
                            <div class="radio radio-primary">
                                <input name="project_type" value="0" id="type1" onclick="luaran()" type="radio" class="hidden" required="" aria-required="true">
                                <label for="type1">Penggerak Projek / EO / EMC</label><BR>
                                <input name="project_type" value="1" id="type2" onclick="dalaman()" type="radio" class="hidden" required="" aria-required="true">
                                <label for="type2">Pegawai JAS</label>
                            </div>
                        </div>
                        <div id="internal" class="col-lg-12" style="display: none;">
                            <br>
                            <div class="" style="padding: 2%;">
                                <div style="width:100%;">
                                    <p>Sila hubungi 03-88712186 (Unit Rangkaian, BTM JAS) untuk reset kata laluan.</p>
                                </div>
                            </div>
                        </div>
                        <div id="external" style="display: none;">
                            <p class="mw-80 m-t-5">Sila masukkan emel yang didaftarkan di dalam sistem ini.</p>
                            <div class="col-md-12">
                                @include('components.input', [
                                'label' => 'Emel',
                                'mode' => 'required',
                                'name' => 'login'
                                ])
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <a href="{{ route('login') }}" class="btn btn-lupa m-t-10 pull-left">Kembali</a>
                        </div>
                        <div class="col-md-4">
                            <button id="dalamanBtn" class="btn btn-log m-t-10 pull right" data-action="{{ route('reset.password.post') }}" onclick="resetPassword(this)" type="button">Hantar</button>
                        </div>
                    </div>
                </form>
               
            </div>
        </div>
    </div>

    <!-- BEGIN VENDOR JS -->
    <script src="{{ asset('assets/plugins/pace/pace.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/plugins/jquery/jquery-1.11.1.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/plugins/modernizr.custom.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/plugins/jquery-ui/jquery-ui.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/plugins/popper/umd/popper.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/plugins/jquery/jquery-easy.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/plugins/jquery-unveil/jquery.unveil.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/plugins/jquery-ios-list/jquery.ioslist.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/plugins/jquery-actual/jquery.actual.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/select2/js/select2.full.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/plugins/sweetalert/sweetalert.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/plugins/classie/classie.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/plugins/switchery/js/switchery.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/plugins/jquery-validation/js/jquery.validate.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js') }}" type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <!-- END VENDOR JS -->

    <!-- BEGIN CORE TEMPLATE JS -->
    <script src="{{ asset('pages/js/pages.min.js') }}"></script>
    <!-- END CORE TEMPLATE JS -->

    <!-- BEGIN PAGE LEVEL JS -->
    <script src="{{ asset('assets/js/scripts.js') }}" type="text/javascript"></script>
    <!-- END PAGE LEVEL JS -->

    <script src="{{ asset('js/global.js') }}"></script>

    <script type="text/javascript">
        $(function() {
            $('#form-recover').validate()
        })

        function resetPassword(elem){
           // console.log(elem);
           var email_value = $('#email').val();
            //console.log(email_value.indexOf('doe.gov.my'));
            if(email_value.indexOf('doe.gov.my') >= 0){
                swal.fire('Ralat','Bagi pegawai JAS, sila hubungi 03-88712186 (Unit Rangkaian, BTM JAS) untuk reset kata laluan.','error');
                event.preventDefault();
            }
        }

        function dalaman() {
            $("#internal").show();
            $("#external").hide();
            $("#kembali").hide();
            $("#dalamanBtn").hide();
        }

        function luaran() {
            $("#internal").hide();
            $("#external").show();
            $("#kembali").hide();
            $("#dalamanBtn").show();
        }
    </script>

    <script type="text/javascript">
        confirmReset = (elem) => {
            return Swal.fire({
                title: 'Adakah anda pasti?',
                text: 'Emel akan dihantar!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#fc0330',
                cancelButtonColor: '#999',
                confirmButtonText: 'Ya',
                cancelButtonText: 'Tidak'
            })
        }

        // penyeliasppjohor@getnada.com
        resetPassword = (elem) => {
            confirmReset().then((result) => {
                if (result.value) {
                    Swal.fire({
                        //title: 'Data sedang dikemaskini. Sila Tunggu Sebentar...',
                        didOpen: function() {
                            Swal.showLoading();
                            $.ajax({
                                url: elem.dataset.action,
                                data: $('form').serialize(),
                                type: 'POST',
                                success: function(response) {
                                    if (response.success) {
                                        Swal.fire({
                                            icon: 'success',
                                            title: response.message,
                                            showConfirmButton: true,
                                        })
                                    } else if (response.code == 422) {
                                        Swal.fire({
                                            icon: 'error',
                                            title: response.message,
                                            text: response.field['login'],
                                            showConfirmButton: true,
                                        })
                                    }  else if (response.code == 880) {
                                        Swal.fire({
                                            icon: 'error',
                                            title: response.title,
                                            text: response.msg,
                                            showConfirmButton: true,
                                        })
                                    }else if (response.code == 888){
                                        Swal.fire({
                                            icon:'error',
                                            title: 'Ralat',
                                            text: response.msg,
                                            showConfirmButton: true,
                                        })
                                    }
                                },
                                fail: (response) => {
                                    Swal.fire(
                                        'Ralat!',
                                        'Berlaku ralat, kami mohon maaf atas kesulitan.',
                                        'danger'
                                        )
                                }
                            })
                        }
                    });
                } else {
                    Swal.fire(
                        'Batal',
                        'Proses telah dibatalkan',
                        'info'
                        );
                }
            });
        }
    </script>

</body>

</html>
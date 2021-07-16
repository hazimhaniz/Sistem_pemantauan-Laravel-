<!DOCTYPE html>
<html>

<head>
    <title>{{ config('global')['system_name'] }}</title>
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
        window.onload = function () {
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
        #checkhideemcp{
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
            position:fixed;
            top:15px;
            right:40px;
            text-align:center;
        }	
        
        .float-top-right-desc {
            position:fixed;
            top:25px;
            right:200px;
            text-align:center;
        }	
        
        #flagcountries {
            color:#000; 
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
        
        .btn-register{
            background-color: #ffce00;
            border-color: #ffce00;
            color:#000;
            font-family: 'Montserrat' !important; 
            font-size:12.5px; 
        }
        .btn-log{
            background-color: #00A651;
            border-color: #00A651;
            color:#fff;
            font-family: 'Montserrat' !important;
            font-size:12.5px;
            font-weight: 500;
        }
        .btn-lupa{
            background-color: #fff;
            border-color: #c4342d;
            color:#000;
            font-family: 'Montserrat' !important;  
            font-size:12.5px;
        } 
        .custom-select {
            font-family: 'Montserrat' !important;
            font-size: 11.5px !important;
        }
        .swal2-title{
            font-family: 'Montserrat' !important;
            font-size:20.5px !important;
        }


        .swal2-styled.swal2-confirm {

            background-color: #1BAAA0 !important;
            border-color: #1BAAA0 !important; 
            font-family: 'Montserrat' !important;
            font-size:14.5px !important;
        }
        .swal2-styled.swal2-cancel{
            color: #fff !important;
            background-color: #f35958 !important;
            border-color: #f35958 !important; 
            font-family: 'Montserrat' !important;
            font-size:14.5px !important;
        }
        .swal2-icon.swal2-info{
            border-color: #facea8;
            color: #f8bb86;
        }
        .swal2-popup{
            width: 25em !important;
        }

        .swal2-content{
            font-family: 'Montserrat' !important;
            font-size:14.5px !important;
        }
        body.swal2-shown:not(.swal2-no-backdrop):not(.swal2-toast-shown) {
            overflow: hidden;
            height: 100%!important;
        }
        .fixed-content {
    top: 0;
    bottom:0;
    position:fixed;
    overflow-y:auto;
    overflow-x:hidden;
}
.checkboxes label {
  display: block;
  padding-right: 10px;
  padding-left: 22px;
  text-indent: -22px;
}
.checkboxes input {
  vertical-align: middle;
}
.checkboxes label span {
  vertical-align: middle;
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
        
        <div class="login-container bg-white fixed-content" style="opacity:">
            <div class="p-l-50 p-r-50 p-t-20 m-t-30 sm-p-l-15 sm-p-r-15 sm-p-t-20 p-b-20">
                <img src="{{ URL::to('images/jata.png') }}" class="img-fluid"">
                <img src="{{ URL::to('images/jabatan.png') }}" class="img-fluid">
                <h4 class="p-t-15">Selamat Datang  <br/> ke Sistem Pemantauan EIA (SPEIA)</h4>
                <p class="mw-80 m-t-5">Sila log masuk menggunakan akaun yang didaftarkan.</p>
                <div class="row">
                </div>
                    <form id='logininternalform_lol' method="POST" action="{{ route('login') }}" class="p-t-15" name="form-internal" role="form">
                        <div class="row">
                            <div class="col-lg-12">
                                <label for="type1">Sila pilih peranan anda.</label><br/>
                                <div class="radio radio-primary">
                                    <input name="project_type" value="0" id="type1" onclick="luaran()" type="radio" class="hidden" aria-required="true">
                                    <label for="type1">Penggerak Projek (PP) / EO / EMC</label>
                                    <br/>
                                    <input name="project_type" value="1" id="type2" onclick="dalaman()" type="radio" class="hidden"  aria-required="true">
                                    <label for="type2">Pegawai JAS</label>
                                </div>
                            </div>
                        </div>
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                @include('components.input', [
                                'label' => 'No. KP / Emel',
                                'mode' => 'required',
                                'name' => 'login'
                                ])
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                @include('components.input', [
                                'label' => 'Kata Laluan',
                                'mode' => 'required',
                                'name' => 'password',
                                'type' => 'password',
                                'options' => 'minlength=8',                    
                                'placeholder' => '',
                                ])
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8 no-padding sm-p-l-10">
                                <div class="form-check">
                                    <input type="checkbox" name="remember" value="1" id="checkbox_remember">
                                    <label for="checkbox_remember">Ingat saya</label>
                                </div>
                            </div>	
                            
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <a href="{{ route('reset.password') }}" class="btn btn-lupa m-t-10 pull-left">Lupa Kata Laluan?</a>
                            </div>	
                            <div class="col-md-4">
                                <button aria-label="" class="btn btn-log m-t-10 pull right">Log Masuk</button>
                            </div>
                        </div>
                        <br>
                        <p class=""><b>Untuk mendaftar penggerak projek sila klik,</b></p>
                        <div class="row">
                         <div class="col-md-8">

                        <button aria-label="" <a href="javascript:;" onclick="modalUsersDemo()"class="btn btn-register m-t-10 pull-left"> Daftar Penggerak Projek</button>
                        </div>
                   
                        </div>
                    </form>
                    
                    <!-- <div class="pull-bottom sm-pull-bottom">
                        <div class="m-b-20 p-r-80 sm-m-t-20 sm-p-r-15 sm-p-b-20 clearfix">
                            <div class="col-sm-9 no-padding m-t-10">
                                <p class="small-text normal hint-text">
                                    ©2019-2020 All Rights Reserved. SPEIA® is a registered trademark of Kementerian Alam Sekitar Dan Air.</a>.
                                </p>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
            
        </div>
        
        <!-- Modal -->
        <div class="modal fade" id="daftarPPModal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="daftarPPModalTitle" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <form method="POST" action="{{ url('/daftar-pp-projek') }}" autocomplete="off" id="daftarProjek">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title" id="daftarPPModalTitle"><span class="bold"></span></h5>
                            <small class="text-muted">Daftar  <b>Penggerak Projek</b></small>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body m-t-20">
                            <div class="row">
                                <div class="col-md-12">
                                  
                                    <div class="form-group form-group-default ">
                                        <label>
                                            <span style="color:red;">*</span><span id="label_no_fail_jas">No. Fail JAS</span>
                                            <i style="cursor: help; color: #48B0F7;" class="fa fa-question-circle" data-html="true" data-toggle="tooltip" title="" data-original-title="No. Fail JAS adalah nombor rujukan yang digunakan di dalam Sistem eKAS"></i>        
                                        </label>
                                        <input id="no_fail_jas" name="no_fail_jas" class="form-control" type="text" value="" required="" aria-required="true">
                                      
                                    </div>
                                    <button type="button" class="btn btn-info pull-right" id="semakFailJas">Semak</button>
                                    <br/>
                                    <input type="hidden" id="jasFailID" name="jasFailID" value="">
                                </div>
                            </div>
                            <div class="form-group-attached m-b-10 daftarPPField">
                                <br/>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group form-group-default">
                                            <label>
                                                <span><b class="text-dark">Nama Projek </b></span><span style="color:red;">*</span>
                                            </label>
                                            <textarea id="nama_projek" class="form-control" rows="5" style="min-height: 50px;" readonly></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group form-group-default">
                                            <label>
                                                <span><b class="text-dark">NAMA PENGAWAI PENGERAK PROJEK DI SISTEM EKAS</b></span><span style="color:red;">*</span>
                                            </label>
                                            <input id="nama_pegawai_penggerak_ekas" class="form-control form-control-lg" type="text" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group form-group-default">
                                            <label>
                                                <span><b class="text-dark">PENGGERAK PROJEK</b></span><span style="color:red;">*</span>
                                            </label>
                                            <input id="penggerak_projek" class="form-control form-control-lg" type="text" readonly>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group form-group-default">
                                            <label>
                                                <span><b class="text-dark">NO KAD PENGENALAN</b></span><span style="color:red;">*</span>
                                            </label>
                                            <input name="no_kp" id="no_kp" onkeyup="checkUserEmcp()" class="form-control form-control-lg" type="text" onkeypress="return onlyNumberKey(event);" minlength="12" maxlength="12"><i class='fa fa-check fa-2x check-icon' aria-hidden='true' id="checkhideemcp"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group form-group-default">
                                            <label>
                                                <span><b class="text-dark">EMEL</b></span><span style="color:red;">*</span>
                                            </label>
                                            <input name="email" class="form-control form-control-lg" type="email" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group form-group-default">
                                            <label>
                                                <span><b class="text-dark">NAMA PENGAWAI PENGGERAK PROJEK</b></span><span style="color:red;">*</span>
                                            </label>
                                            <input name="nama_pegawai_penggerak" class="form-control form-control-lg" type="text" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group form-group-default daftarPPField">
                                        <div class="form-input-group">
                                            <label class="col-md-12 control-label">
                                                <b>Jenis Pengawasan :</b>
                                            </label>
                                            
                                            
                                        </div>
                                       
                                        <div class="col-md-12">
                                            <div class="row">
                                            @foreach($pengawasans as $pengawasan)
                                           
                                            <div class="form-check-inline p-l-10">
                                                <input class="form-check-input" type="checkbox" id="pengawasan_{{ $pengawasan->id }}" name="pengawasan[]" value="{{ $pengawasan->id }}">
                                                @if ($pengawasan->jenis_pengawasan == 'Perlepasan Dari Kolam Perangkap Mendap Air Larian Permukaan')
                                                <label for="pengawasan_{{ $pengawasan->id }}"> KOLAM &nbsp;</label>
                                                @else 
                                               <label for="pengawasan_{{ $pengawasan->id }}">{{ $pengawasan->jenis_pengawasan }} &nbsp;&nbsp;&nbsp;&nbsp;</label>
                                                @endif
                                            </div>
                                            
                                            @endforeach
                                            </div>
                                        </div>
                                        
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        
                        <br/>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group row daftarPPField pull-right">
                                    <button type="submit" class="btn btn-success " id="daftar">Daftar</button> &nbsp;
                                </div>
                            </div>
                        </div>
                        <!-- <div class="form-group row daftarPPField pull-right">
                            <button type="submit" class="btn btn-success " id="daftar">Daftar</button> &nbsp;
                        </div> -->
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<div id="modal-div"></div>

@stack('modal')

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

   function  checkUserEmcp(projectId) {
    var username = $('#no_kp').val();
    if (username == '') {
        $('#checkhideemcp').css('display','block');
        return false;
    }
    $.ajax({
        url: "{{ url('checkuseremc') }}"+'/'+username+'/'+0,
        method: "GET",

        success: function(response){

            if (response.success) {
                $('#checkhideemcp').css('display','block');
                $('input[name="nama_pegawai_penggerak"]').val(response.data.name)
            } else {
                $('#checkhideemcp').css('display','none');
                $('input[name="nama_pegawai_penggerak"]').val('');
            }              
        },
        error: function(response){
        }
    });

}

$('#passwordl').on('keydown', function(e) {
    if (e.which == 13) {
        e.preventDefault();
        $('form#loginexternalform').submit();
    }
});

$('#password').on('keydown', function(e) {
    if (e.which == 13) {
        e.preventDefault();
        $('form#logininternalform').submit();
    }
});

function onlyNumberKey(evt) {       
  var ASCIICode = (evt.which) ? evt.which : evt.keyCode 
  if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57)) 
      return false; 
  return true; 
}


function manual() {
    $("#modal-video").modal("show");
}

function dalaman() {
    $("#internal").show();
    $("#external").hide();
    $("#loginternal").hide();
    $("#loginexternal").show();
    $("#label_login").text("EMEL");
    $("#email").attr("readonly", false);
    $("#login").attr("readonly", false);
    $("#password").attr("readonly", false);
}
$('#modal-project').modal({backdrop: 'static', keyboard: false})
@if($projekarray)
$('#modal-project').modal({backdrop: 'static', keyboard: false})
$("#modal-project").modal("show");
@endif

function projeklist(projekid,userid,password){
    var url = "{{ route('login-projek-external',['projekid' => ":projekid",'userid' => ":userid",'password' => ":password"]) }}";

    url = url.replace('%3Aprojekid', projekid);
    url = url.replace('%3Auserid', userid);
    url = url.replace('%3Apassword', password);
    var urlString = url.replace(/&amp;/g, '&');
    $.ajax({
        url: urlString,
        type: 'get',
        success: function(response) {
            if (response.status == 'success') {
                window.location.href = "/home";
            }else if (response.status == 'invalid') {
                window.location.href = "/login";
            }
        }
    });
}

function luaran() {
    $("#internal").hide();
    $("#external").show();
    $("#username").attr("readonly", false);
    $("#passwordl").attr("readonly", false);
    $("#loginternal").show();
    $("#loginexternal").hide();
    $("#label_login").text("NO. KP");
    $("#login").attr("readonly", false);
    $("#password").attr("readonly", false);
}
function manuals() {
    $("#modal-videos").modal("show");
}

$('body').on('click', '.logmasukexternal', function(event) {
    var test = $('input[name="project_type"]:checked').val();
    var username = $('#username').val();
    if(test == 0 &&  username == 'admin'){
        swal({
            title: "",
            text: "Pengguna tidak aktif. Sila hubungi Pegawai Penyiasat untuk aktifkan pengguna.",

            button: "OK",
        })
        $('#loginexternalform')[0].reset();
        $('#logininternalform')[0].reset();
    }else{
        $('form#loginexternalform').submit();
    }

});
$('body').on('submit', 'form#loginexternalform', function(e) {
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
        success: function(response) {
            if(response.status == 'ok'){

                location.href = response.url;

            }
            if (response.status == 'notok') {
                swal({
                    title: "",
                    text: "ID Pengguna atau Kata Laluan tidak sah. Sila cuba semula.",

                    button: "OK",
                })
                .then((confirm) => {
                    location.href = response.url;
                });
            }if (response.status == 'xactive') {
                swal({
                    title: "",
                    text: "Pengguna tidak aktif. Sila hubungi Pegawai Penyiasat untuk aktifkan pengguna.",

                    button: "OK",
                })
                .then((confirm) => {
                    location.href = response.url;
                });
            }
            if (response.status == 'projeklist') {

                if (response.status == 'projeklist' && response.data != null) {
                    $("#modal-div").load("/listProjek/"+response.data+"/"+response.password);
                }else {
                    swal('Perhatian','Sila masukkan no. kad pengenalan dan kata laluan yang sah','info');
                }
            }
        }
    });
    return false;
});

$('body').on('click', '.logmasukinternal', function(event) {

    var test = $('input[name="project_type"]:checked').val();
    var email = $('#email').val();
    if(test == 1 &&  email == 'admin'){
        $('#username').val('admin');
        $('#passwordl').val('password');
        $('form#loginexternalform').submit();
    }else{
        $('form#logininternalform').submit();
    }

});

$('body').on('submit', 'form#logininternalform', function(e) {
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
        success: function(response) {
            if(response.status == 'ok'){
                location.href = response.url;
            }
            if (response.status == 'nodata') {
                swal({
                    title: "",
                    text: "Pengguna tidak wujud dalam rekod Sistem SPPPEIA.",
                    button: "OK",
                })
                .then((confirm) => {
                    location.href = response.url;
                });
            }if (response.status == 'notok') {
                swal({
                    title: "",
                    text: "Sila masukkan maklumat email dan kata laluan.",
                    button: "OK",
                })
                .then((confirm) => {
                    swal.close()
                });
            }if (response.status == 'nodataAD') {
                swal({
                    title: "",
                    text: "Data tidak wujud dalam rekod Sistem EKAS.",
                    button: "OK",
                })
                .then((confirm) => {
                    location.href = response.url;
                });
            }if (response.status == 'server') {
                swal({
                    title: "",
                    text: "ID Pengguna atau Kata Laluan tidak sah. Sila cuba semula.",
                    button: "OK",
                })
                .then((confirm) => {
                    location.href = response.url;
                });
            }
        }
    });
    return false;
});

function login(id) {
    if(id == 1){
        var x = document.getElementById("username").value;
        if(x !== ''){
            document.getElementById("form-login").submit();
        }
    }
    if(id == 2){
        var x = document.getElementById("email").value;
        if(x !== ''){
            document.getElementById("form-internal").submit();
        }
    }
}
@if(request()->has('registered'))
swal({
    title: "Pendaftaran Selesai",
    content: "{!! App\OtherModel\Notification::where('code', 'PB_KS_1.1_A')->first()->message !!}",
});
window.history.pushState({}, null, "{{ route('login') }}");
@endif

function pegawai(){
    document.getElementById("username").value = "pegawai";
    document.getElementById("password").value = "password";
}
function penyelia(){
    document.getElementById("username").value = "penyelia";
    document.getElementById("password").value = "password";
}
function hq(){
    document.getElementById("username").value = "hq";
    document.getElementById("password").value = "password";
}
function admin(){
    document.getElementById("username").value = "superadmin";
    document.getElementById("password").value = "password";
}
function adminnegeri(){
    document.getElementById("username").value = "admin";
    document.getElementById("password").value = "password";
}
function projek() {
    document.getElementById("username").value = "";
    document.getElementById("password").value = "";
    $("#jenis_projek").show();
}

$('#user_type').click(function(){
    var input = $('#user_type').val();
    if(input === 'penggerak'){
        document.getElementById("username").value = "PP";
        document.getElementById("password").value = "password";
    } else if (input === 'eo'){
        document.getElementById("username").value = "EO";
        document.getElementById("password").value = "password";
    } else if (input === 'emc'){
        document.getElementById("username").value = "EMC";
        document.getElementById("password").value = "password";
    } else {
        document.getElementById("username").value = "";
        document.getElementById("password").value = "";
    }
});

function modalUsersDemo() {
    $(".daftarPPField").hide();
    $("#daftarPPModal").modal('show');
}
</script>

<script>
    $("#semakFailJas").on('click', function(){
        $(".daftarPPField").hide();

        var no_fail_jas = $("#no_fail_jas").val();
        console.log(no_fail_jas);

        var formData = new FormData;
        formData.append('no_fail_jas', no_fail_jas);

        $.ajax({
            url: "{{ url('/semak-fail-jas') }}",
            method: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: function(response){
                if(response.exist)
                {
                    if(response.canRegister)
                    {
                        $("#jasFailID").val(response.jasFail.id);
                        $("#nama_projek").val(response.jasFail.name);
                        $("#nama_pegawai_penggerak_ekas").val(response.jasFailDetail.pegawai_penggerak);
                        $("#penggerak_projek").val(response.jasFailDetail.nama_penggerak);

                        $(".daftarPPField").show();
                    }
                }

                if(response.msg.length > 0)
                {
                    Swal.fire('', response.msg, 'info');
                }
            },
            error: function(response){
                console.log(response);
            }
        });

    });
</script>

<script>
    $(document).ready(function(){
        $("#login, #password").on('keydown', function(event){
            if (event.keyCode === 13) { 
                $("#logininternalform_lol").submit();
            } 
        });
    });

</script>
<script>
    @if(Session::has('success'))
    Swal.fire("Berjaya", '{{ Session::get('success') }}', 'success');
    @endif
    @if(Session::has('error'))
    Swal.fire("Gagal", '{{ Session::get('error') }}', 'error');
    @endif
    @if(Session::has('errorp'))
    Swal.fire("Gagal", '{{ Session::get('errorp') }}', 'error');
    @endif
</script>
@stack('js')



</body>
</html>


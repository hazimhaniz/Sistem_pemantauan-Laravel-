<!DOCTYPE html>
<html>

<head>
	<meta content="text/html; charset=utf-8" http-equiv="content-type">
	<meta charset="utf-8">
	<title>SPEIA</title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, shrink-to-fit=no"
		name="viewport">
	<link href="{{ asset('favicon1.ico') }}" rel="icon" type="image/x-icon">
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
	<link href="{{ asset('assets/plugins/jquery-scrollbar/jquery.scrollbar.css') }}" media="screen" rel="stylesheet"
		type="text/css">
	<link href="{{ asset('assets/plugins/select2/css/select2.min.css') }}" media="screen" rel="stylesheet"
		type="text/css">
	<link href="{{ asset('assets/plugins/switchery/css/switchery.min.css') }}" media="screen" rel="stylesheet"
		type="text/css">
	<link href="{{ asset('assets/plugins/bootstrap-datepicker/css/datepicker3.css') }}" rel="stylesheet" type="text/css"
		media="screen">
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
		body {
			background-image: url('{{ asset('images/gn.jpg') }}');
			background-size: cover;
			background-position: center;
			background-attachment: fixed;
			width: 100%;
		}

		.register-container {
			width: 768px;
			max-width: 100%;
		}

		.logo {
			padding-left: 30%;
			margin-top: 50px;
			display: block;
		}

		.logo>img {
			width: 50%;
			height: 100%;
			/*margin: -25px 0;*/
		}

		.content {
			background-color: white;
			border-radius: 10px;
			box-shadow: 3px 3px 100px 6px #ccc;
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

		.modalss {
			display: none;
			/* Hidden by default */
			position: fixed;
			/* Stay in place */
			z-index: 1;
			/* Sit on top */
			left: 0;
			top: 0;
			width: 100%;
			/* Full width */
			height: 100%;
			/* Full height */
			overflow: auto;
			/* Enable scroll if needed */
			background-color: rgb(0, 0, 0);
			/* Fallback color */
			background-color: rgba(0, 0, 0, 0.4);
			/* Black w/ opacity */
		}

		.modal-contents {
			background-color: #fefefe;
			margin: 15% auto;
			/* 15% from the top and centered */
			padding: 50px;
			border: 1px solid #dedede;
			border-radius: 3px;
			width: 100%;
			/* Could be more or less, depending on screen size */
		}

		.myimage {
			display: block;
			margin-left: auto;
			margin-right: auto;
			margin-bottom: 10px;
			margin-top: 10px;
		}

		/* Add by Sharul */
		.swal-footer {
			text-align: center;
		}

		.swal-button--confirm {
			background: #0a0;
		}

		.swal-button--cancel {
			background: #aaa;
		}

		.swal-button--danger {
			background: #a00;
		}


		@media screen and ( max-width: 640px ) {
			#login-logo-kementrian { width: 60% !important; margin-bottom:20px !important; }
			#login-logo { width: 100% !important; margin:0 !important; }
		}

	
	</style>

	@stack('css')

</head>

<body class="fixed-header menu-pin menu-behind">
	<div class="register-container full-height sm-p-t-30">
		<div class="row d-flex justify-content-center">
		<img id="login-logo-kementrian" class="img-responsive" alt="logo" style="width:23%;margin:1em;" data-src="{{ asset('images/jatara.png') }}"
		data-src-retina="{{ asset('images/jatara.png') }}" src="{{ asset('images/jatara.png') }}">
		<img id="login-logo" class="img-responsive" alt="logo"  style="width:20%;height:160px;margin-top:30px;" data-src="{{ asset('images/JAS.png') }}"
		data-src-retina="{{ asset('images/JAS.png') }}" src="{{ asset('images/JAS.png') }}">
		<img id="login-logo" class="img-responsive" alt="logo"  style="width:45%;height:140px;margin-top:40px;" data-src="{{ asset('images/ldp2m2.png') }}"
		data-src-retina="{{ asset('images/ldp2m2.png') }}" src="{{ asset('images/ldp2m2.png') }}">
		
		</div>
		<br>
		<div class="d-flex flex-column full-height">

			<div class="content padding-20 p-b-40" style="">

				@yield('content')

			</div>

			<a href={{ asset('ldp2m2/dokumen/Manual_Pengguna_Luaran.pdf') }} target="_blank">
			<div class="row d-flex justify-content-center">
				
				<!-- <img id="login-logo-kementrian" class="img-responsive" alt="logo" style="width:15%;margin:1em;" data-src="{{ asset('images/manual_user.png') }}"
				data-src-retina="{{ asset('images/manual_user.png') }}" src="{{ asset('images/manual_user.png') }}"> -->	

				<img class="img-responsive" style="width:15%;margin:1em;" src="{{ asset('images/manual_user.png') }}" onclick="window.open('//speiahelpdesk.unijaya.com/')">
			    
			</div>
		    </a>

			<div class="row m-t-5 p-b-30 m-b-50">
				<div class="col-md-12 text-center" style="width: 100%;">
					<small>Hakcipta Terpelihara © <span id="current_year"></span> | Jabatan Alam Sekitar, Kementerian Alam Sekitar dan Air</small>
				</div>
			</div>
		</div>
	</div>

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
	<script src="{{ asset('assets/plugins/jquery-validation/js/jquery.validate.min.js') }}" type="text/javascript">
	</script>
	<script src="{{ asset('assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js') }}" type="text/javascript">
	</script>
	<!-- END VENDOR JS -->

	<!-- BEGIN CORE TEMPLATE JS -->
	<script src="{{ asset('pages/js/pages.min.js') }}"></script>
	<!-- END CORE TEMPLATE JS -->

	<!-- BEGIN PAGE LEVEL JS -->
	<script src="{{ asset('assets/js/scripts.js') }}" type="text/javascript"></script>
	<!-- END PAGE LEVEL JS -->

	<script src="{{ asset('js/global.js') }}"></script>

	<script type="text/javascript">
		document.getElementById("current_year").innerHTML = new Date().getFullYear();

		@if(session('status')) 
		<?php
		$status_list = ['success', 'error', 'warning', 'info'];
		$swal_title = session('title') ? session('title') : '';
		$swal_message = session('message') ? session('message') : session('status');

		if (!in_array(strtolower(session('status')), $status_list)) {
			$swal_status = "info";
		} else {
			$swal_status = session('status');
		}
		?>
		swal("{{ $swal_title }}", "{{ $swal_message }}", "");
		@elseif(count($errors) > 0)
		swal("", "{{ $errors->first() }}");
		@endif
	</script>

	@stack('js')

</body>

</html>
<!DOCTYPE html>
<html>

<head>
    <meta content="text/html; charset=utf-8" http-equiv="content-type">
    <meta charset="utf-8">
    <title>{{ config('global')['system_name'] }}</title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, shrink-to-fit=no" name="viewport">
    <link rel="icon" type="image/png" href="{{ asset(config('global')['favicon']) }}">
    
    <?php if (file_exists(public_path(config('global')['favicon']))) : ?>
        <link rel="icon" type="image/png" href="{{ asset(config('global')['favicon']) }}">
        <?php else : ?>
            <link rel="icon" type="image/png" href="{{ asset('storage/'.config('global')['favicon']) }}">
        <?php endif ?>

        <meta content="yes" name="apple-mobile-web-app-capable">
        <meta content="yes" name="apple-touch-fullscreen">
        <meta content="default" name="apple-mobile-web-app-status-bar-style">
        <meta content="{{ env('APP_DESC') }}" name="description">
        <meta content="{{ env('APP_AUTHOR') }}" name="author">
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
        <link href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css">

        <link href="{{ asset('css/global.css') }}" rel="stylesheet" type="text/css">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css" rel="stylesheet" type="text/css">

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" type="text/javascript"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>

        @stack('css')
        <style type="text/css">

            .modal {
                overflow-y: auto !important;
            }
            .img-size {
                border: 1px solid #ddd;
                border-radius: 4px;
                padding: 5px;
                width: 150px;
                height: : 80px;
            }

            .img-size:hover {
                box-shadow: 0 0 2px 1px rgba(0, 140, 186, 0.5);
            }

            .inbox-topmenu {
                position: absolute !important;
                top: 60px;
                right: 30px;
                bottom: 0;
                /*left: 0;*/
                z-index: 100;
                height: 55px;
                width: 350px;
            }

            .btn-breadcrumb {
                height: 34px;
                width: 34px;
                margin-top: 10px;
                color: #fff;
                padding: 0px;
            }

            .btn-breadcrumb:hover {
                color: #fff;
            }

            .btn-breadcrumb .badge {
                position: absolute;
                top: 20px;
                left: 15px;
            }

            .dim {
                background-color: #efefef;
            }

            .form-group-default.required2:after {
                color: #f35958;
                content: "**";
                font-family: arial;
                font-size: 20px;
                position: absolute;
                right: 12px;
                top: 6px;
            }

            /* Custom Sidebar Menu Color by Sharul */
            .page-sidebar {
                background-color: #0d1719;
                font-family: 'Montserrat' !important;
                font-size: 10.5px;
            }

            .page-sidebar .sidebar-menu .menu-items>li>a>.title {
                font-family: 'Montserrat' !important;
                font-size: 10.5px;
                text-transform: uppercase !important;
            }

            .page-sidebar .sidebar-menu .menu-items>li ul.sub-menu>li>a {
                font-family: 'Montserrat' !important;
                font-size: 10.5px;
                text-transform: uppercase !important;
            }
        /* .sidebar-menu .menu-items li.open > a, .page-sidebar .sidebar-menu .menu-items li.active > a {
            color: yellow;
            } */

            .page-sidebar a:hover, .page-sidebar button:hover, .page-sidebar a:active, .page-sidebar button:active {
                color: yellow !important;
            }


            .page-sidebar .sidebar-menu .menu-items>li ul.sub-menu {
                background-color: #101d1f;
                font-family: 'Montserrat' !important;
                font-size: 10.5px;
            }

            .fail:hover {
                color: black !important;
                background-color: #fff !important;
                border-color: #6a74b7 !important;
            }

            .fail {
                background-color: #fff !important;
                border-color: #6a74b7 !important;
                color: #000 !important;
                font-family: 'Montserrat' !important;
                font-size: 12.5px;

            }

            .fail:focus {
                color: black !important;
                background-color: #1f3953 !important;
                border-color: #6a74b7 !important;
            }

            .btn-bulan {
                background-color: #1BAAA0 !important;
                border-color: #1BAAA0 !important;
                color: #fff !important;
                font-family: 'Montserrat' !important;
                font-size: 12.5px;
                font-weight: 500;
            }

            .btn-bulan-active {
                color: #fff !important;
                ;
                background-color: #1f3953 !important;
                ;
                border-color: #1f3953 !important;
                ;
            }

            .nav-tabs-blue.nav-tabs-fillup>li>a:after {
                background: none repeat scroll 0 0 #669dec !important;
                border: 1px solid #669dec !important;
            }

            .swal2-content {
                font-family: 'Montserrat' !important;

            }

            table {
                border-collapse: separate !important;
                border: solid #DDDDDD 1px;
                border-radius: 6px;
                -moz-border-radius: 6px;
            }

            .table.dataTable.no-footer {
                border: solid #DDDDDD 1px;
                border-radius: 6px;
                -moz-border-radius: 6px;

            }

            table.dataTable thead th,
            table.dataTable thead td {
                padding: none !important;
                border-bottom: none !important;

            }


            table.dataTable {
                border-spacing: 2px;
                font-weight: 500;
                border: solid #DDDDDD 1px;
                border-radius: 6px;
                -moz-border-radius: 6px;
            }

            .swal2-title {
                font-family: 'Montserrat' !important;
                font-size: 20.5px !important;
            }


            .swal2-styled.swal2-confirm {

                background-color: #1BAAA0 !important;
                border-color: #1BAAA0 !important;
            }

            .swal2-styled.swal2-cancel {
                color: #fff !important;
                background-color: #f35958 !important;
                border-color: #f35958 !important;
            }

            .swal2-icon.swal2-info {
                border-color: #facea8;
                color: #f8bb86;
            }

            .swal2-popup {
                width: 25em !important;
            }

            .form-control {
                font-family: 'Montserrat' !important;
            }

            .btn {
                font-family: 'Montserrat' !important;
            }

            .custom-select {
                font-family: 'Montserrat' !important;
                font-size: 11.5px !important;
            }

            button,
            input,
            optgroup,
            select,
            textarea {
                font-family: 'Montserrat' !important;
                font-size: 11.5px !important;
            }

            .select2-results li {
                font-family: 'Montserrat' !important;
                font-size: 11.5px !important;
            }

            .select2-container .select2-selection--single {
                font-family: 'Montserrat' !important;
                font-size: 11.5px !important;
            }

            .form-group-default label {
                font-family: 'Montserrat' !important;
                font-size: 10.5px !important;
            }

            .label.label-light-grey {
                color: #3F4254;
                background-color: #EBEDF3;
                font-size: 8.5px !important;
                min-width: 200px !important;
                text-align: center !important;
            }

            .label.label-light-blue {
                color: #000;
                background-color: #E1F0FF;
                font-size: 8.5px !important;
                min-width: 200px !important;
                text-align: center !important;
            }

            .label.label-light-purple {
                color: #000;
                background-color: #EEE5FF;
                font-size: 8.5px !important;
                min-width: 200px !important;
                text-align: center !important;
            }

            .label.label-light-warning {
                color: #000;
                background-color: #FFF4DE;
                font-size: 8.5px !important;
                min-width: 200px !important;
                text-align: center !important;
            }

            .label.label-light-success {
                color: #000;
                background-color: #C9F7F5;
                font-size: 8.5px !important;
                min-width: 200px !important;
                text-align: center !important;
            }

            .label.label-light-danger {
                color: #000;
                background-color: #FFE2E5;
                font-size: 8.5px !important;
                min-width: 200px !important;
                text-align: center !important;
            }

            .container-fluid {
                margin-right: auto;
                margin-left: auto;
            }

            body {
                background-color: #fff !important;
            }

            .blink {
                animation: blinker 1s linear infinite;
            }

            @keyframes blinker {

                50% {
                    opacity: 0;
                    color: #000;
                }
            }

            .ow {
                overflow-wrap: break-word !important;
                word-wrap: break-word !important;
                hyphens: auto !important;
                text-align: left;

            }

            td .ow {
                text-align: left;
            }

            .table>tbody>tr>td {
                padding: 6px;
                vertical-align: top !important;
                text-align: center !important;

                color: #000 !important;
                font-family: 'Montserrat' !important;
                letter-spacing: 0.06em !important;
                /* text-transform: uppercase !important; */
                font-weight: 500 !important;
            }

            .table thead tr th {
                padding: 4px;
                vertical-align: top !important;
                text-align: center !important;
                font-size: 11px !important;
                color: #000 !important;
                font-weight: 500 !important;
            }

            ol,
            ul {
                padding-left: 0 !important;
                list-style-position: inside;
            }

            th {
                background-color: #ebe8ec;
                color: #000 !important;
                border-top: none;
                font-family: 'Montserrat' !important;
                font-size: 10.5px !important;
                letter-spacing: 0.06em !important;
                text-transform: uppercase !important;
                font-weight: 500 !important;
                border-left: none !important;
                padding: 4px;
            }

            td {
                color: #000 !important;
                font-family: 'Montserrat' !important;
                font-size: 10.5px !important;
                letter-spacing: 0.06em !important;
                padding: 4px !important;
                text-align: center;
            }
            .nav-tabs-fillup > li > a span {
                cursor:pointer;
            }

            .form-control[disabled], .form-control[readonly], fieldset[disabled] .form-control {
                color: #000 !important;
                font-weight: 900 !important;
                /* background-color: beige; //boleh buang if taknak  */
            }

            .close{
                font-size:20px !important;
            }

            .dataTables_filter input { width: 250px !important;}

            h1, .h1,
            h2, .h2,
            h3, .h3,
            h4, .h4,
            h5, .h5,
            h6, .h6 {
                font-family: 'Montserrat' !important;
                font-weight: 500 !important;
            }
            .text-page {
                color: #006c80 !important;


            }

            .jawatan{
                color: #29207a!important; 

            }

            .btn-petunjuk{
                border: 1px solid #49b675;
                color:#000;
                background-color: #49b675;
                font-family: 'Montserrat' !important;
                font-weight: 500 !important;
                font-size: 15.5px;
            }



        </style>
    </head>

    <body class="fixed-header menu-pin menu-behind">

        @include('layouts.sidebar')

        <!-- START PAGE-CONTAINER -->
        <div class="page-container">
            <!-- START PAGE CONTENT WRAPPER -->
            <div class="page-content-wrapper">

                @include('layouts.header')

                <!-- START PAGE CONTENT -->
                <div class="content">
                    @if(Auth::user()->hasRole('superadmin'))
                    @include('inbox-topmenu.topmenu_superadmin', ['unread'=> App\OtherModel\Inbox::where('receiver_user_id', auth()->id())->where('inbox_status_id', 2)->count()])
                    @elseif(Auth::user()->hasRole('admin'))
                    @include('inbox-topmenu.topmenu_admin', ['unread'=> App\OtherModel\Inbox::where('receiver_user_id', auth()->id())->where('inbox_status_id', 2)->count()])
                    @else
                    @include('inbox-topmenu.topmenu', ['unread'=> App\OtherModel\Inbox::where('receiver_user_id', auth()->id())->where('inbox_status_id', 2)->count()])
                    @endif
                    @yield('content')

                </div>
                <!-- END PAGE CONTENT -->

                @include('layouts.footer')

            </div>
            <!-- END PAGE CONTENT WRAPPER -->
        </div>
        <!-- END PAGE CONTAINER -->

        @stack('modal')

        <!-- Modal -->
    <!-- <div class="modal fade" id="modal-password" tabindex="-1" role="dialog" aria-labelledby="addModalTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addModalTitle">Kemaskini <span class="bold">Kata Laluan</span></h5>
                    <small class="text-muted">Sila isi maklumat pada ruangan di bawah.</small>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body m-t-20">
                    <form id='form-password' role="form" method="post" action="{{ route('profile.update_password') }}">
                        @include('components.input', [
                        'name' => 'old_password',
                        'label' => 'Kata Laluan Lama',
                        'mode' => 'required',
                        'type' => 'password',
                        'options' => 'minlength=8',
                        'value' => '',
                        ])
                        
                        @include('components.input', [
                        'name' => 'password',
                        'label' => 'Kata Laluan Baru',
                        'mode' => 'required',
                        'type' => 'password',
                        'options' => 'minlength=8',
                        'value' => '',
                        ])
                        
                        @include('components.input', [
                        'name' => 'password_confirmation',
                        'label' => 'Pengesahan Kata Laluan Baru',
                        'mode' => 'required',
                        'type' => 'password',
                        'options' => 'minlength=8',
                        'value' => '',
                        ])
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-info" onclick="submitForm('form-password')"><i class="fa fa-check m-r-5"></i> Hantar</button>
                </div>
            </div>
        </div>
    </div> -->
    
    <div id="modal-div"></div>
    
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
    <script src="{{ asset('assets/plugins/select2/js/i18n/ms.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/plugins/sweetalert/sweetalert.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/plugins/classie/classie.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/plugins/switchery/js/switchery.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/plugins/jquery-validation/js/jquery.validate.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/plugins/bootstrap-datepicker/js/locales/bootstrap-datepicker.ms.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/plugins/socketio/socket.io.js') }}" type="text/javascript"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <!-- END VENDOR JS -->
    
    <!-- BEGIN CORE TEMPLATE JS -->
    <script src="{{ asset('pages/js/pages.min.js') }}"></script>
    <!-- END CORE TEMPLATE JS -->
    
    <!-- BEGIN PAGE LEVEL JS -->
    <script src="{{ asset('assets/js/scripts.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/dropzone.js') }}" type="text/javascript"></script>
    <!-- END PAGE LEVEL JS -->
    
    <script src="{{ asset('js/global.js') }}"></script>
    
    <script type="text/javascript">
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
        swal("{{ $swal_title }}", "{!! $swal_message !!}", "{{ $swal_status }}");
        @elseif(count($errors) > 0)
        swal("Ralat!", "{!! $errors->first() !!}", "error");
        @endif
    </script>
    
    @stack('js')
    
    <script type="text/javascript">
        $(document).on('input', () => {
            toastr.options = {
                "closeButton": true,
                "debug": false,
                "newestOnTop": true,
                "progressBar": true,
                "positionClass": "toast-top-right",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }
            
            var timeoutId;
            clearTimeout(timeoutId);
            timeoutId = setTimeout(function() {
                saveToDB();
            }, 1000);
        });
        
        function saveToDB() {
            // toastr.success('A wild pokemon appeared');
        }
        
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        
        getModalContent = (elem) => {
            $.get(elem.dataset.action, function(response) {
                $("#modal-div").html(response);
                $("#baseAjaxModalContent").modal("show");
            });
        }
        
        confirmDelete = (elem) => {
            return Swal.fire({
                title: 'Adakah anda pasti?',
                text: 'Anda tidak akan dapat memulihkan data ini!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#fc0330',
                cancelButtonColor: '#999',
                confirmButtonText: 'Ya',
                cancelButtonText: 'Tidak'
            })
        }
        
        confirmCreate = (elem) => {
            return Swal.fire({
                title: 'Adakah Anda Pasti?',
                text: 'Data akan disimpan',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#038cfc',
                cancelButtonColor: '#999',
                confirmButtonText: 'Ya',
                cancelButtonText: 'Tidak'
            })
        }
        
        confirmUpdate = (elem) => {
            return Swal.fire({
                title: 'Adakah anda pasti?',
                text: 'Data akan dikemaskini!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#fc0330',
                cancelButtonColor: '#999',
                confirmButtonText: 'Ya',
                cancelButtonText: 'Tidak'
            })
        }
        
        processCreation = (elem, datatable, data) => {
            Swal.fire({
                title: 'Data sedang dikemaskini. Sila Tunggu Sebentar...',
                onOpen: function() {
                    Swal.showLoading();
                    $.ajax({
                        url: elem.dataset.action,
                        data: data,
                        type: 'POST',
                        contentType: false,
                        processData: false,
                        success: function(response) {
                            if (response.success) {
                                Swal.fire({
                                    icon: 'success',
                                    title: response.message,
                                    showConfirmButton: true,
                                }).then(() => {
                                    $(baseAjaxModalContent).modal("hide");
                                    datatable.DataTable().ajax.reload()
                                });
                                console.log(response.error_code);
                            } else if (response.error_code == 422) {
                                Swal.fire({
                                    icon: 'error',
                                    title: response.message,
                                    text: response.field['code'] ?? response.field['name'] ?? response.field['message'],
                                    showConfirmButton: true,
                                })
                            }
                        },
                        fail: (response) => {
                            Swal.fire(
                                'Ralat!',
                                'Berlaku ralat, kami mohon maaf atas kesulitan.',
                                'danger')
                        }
                    })
                }
            })
        }
        
        processUpdation = (elem, datatable, data) => {
            Swal.fire({
                title: 'Data sedang dikemaskini. Sila Tunggu Sebentar...',
                onOpen: function() {
                    Swal.showLoading();
                    $.ajax({
                        url: elem.dataset.action,
                        data: data,
                        type: 'POST',
                        contentType: false,
                        processData: false,
                        success: function(response) {
                            if (response.success) {
                                Swal.fire({
                                    icon: 'success',
                                    title: response.message,
                                    showConfirmButton: true,
                                }).then(() => {
                                    $(baseAjaxModalContent).modal("hide");
                                    datatable.DataTable().ajax.reload()
                                });
                                console.log(response.error_code);
                            } else if (response.error_code == 422) {
                                Swal.fire({
                                    icon: 'error',
                                    title: response.message,
                                    text: response.field,
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
                            failCallback()
                        }
                    })
                }
            })
        }
        
        processDeletion = (elem, successCallback, failCallback) => {
            Swal.fire({
                title: 'Data is being processed. Please wait...',
                onOpen: function() {
                    Swal.showLoading();
                    confirmDelete(elem).then((choice) => {
                        if (choice.value) {
                            deleteItem(elem, successCallback, failCallback)
                        } else {
                            Swal.fire(
                                'Dibatalkan',
                                'Proses telah dibatalkan',
                                'info'
                                )
                        }
                    })
                }
            })
        }
        
        deleteItem = (elem, successCallback = () => {}, failCallback = () => {}) => {
            $.ajax({
                url: elem.dataset.action,
                type: 'DELETE',
                success: function(response) {
                    if (response.success) {
                        Swal.fire({
                            icon: 'success',
                            title: response.message,
                            showConfirmButton: true,
                        }).then(() => {
                            $(elem).closest('table').DataTable().ajax.reload()
                            successCallback()
                        });
                    }
                },
                fail: (response) => {
                    Swal.fire(
                        'Ralat!',
                        'Berlaku ralat, kami mohon maaf atas kesulitan.',
                        'danger'
                        )
                    failCallback()
                }
            })
        }
        
        $("#form-password").validate();
        
        function queryData(id) {
            $("#modal-query").modal("show");
        }
        
        function profileData() {
            location.href = "{{ route('profile') }}";
        }
        
        function rejectBook() {
            $("#modal-rejected").modal("show");
        }
        
        $("#form-password").submit(function(e) {
            e.preventDefault();
            var form = $(this);
            
            if (!form.valid())
                return;
            
            $.ajax({
                url: form.attr('action'),
                method: form.attr('method'),
                data: new FormData(form[0]),
                dataType: 'json',
                async: true,
                contentType: false,
                processData: false,
                success: function(data) {
                    swal(data.title, data.message, data.status);
                    $("#modal-password").modal("hide");
                }
            });
        });
        
        function viewFiling(filing_type, filing_id) {
            var data = $.param({
                filing_type: filing_type,
                filing_id: filing_id
            }, true);
            
            $("#modal-div").load("{{ route('general.getFilingDetails') }}?" + data);
        }
    </script>
    
    <script>
        @if(Session::has('success'))
        Swal.fire('Berjaya', 'Maklumat berjaya disimpan.', 'success');  
        @endif
        @if(Session::has('error'))
        Swal.fire('Gagal', 'Maklumat tidak berjaya disimpan', 'error');
        @endif
        @if(Session::has('maxPic'))       
        Swal.fire('Gagal', 'sila muat naik fail berformat jpg, jpeg dan png bersaiz 2MB kebawah', 'error');
        @endif
        @if(Session::has('maxFile'))       
        Swal.fire('Gagal', 'sila muat naik fail berformat pdf & doc bersaiz 3MB kebawah', 'error');
        @endif
        @if(Session::has('fileType'))       
        Swal.fire('Gagal', 'Fail hendaklah dalam format png, jpeg, jpg dan pdf sahaja.', 'error');
        @endif
        @if(Session::has('aktif'))       
        Swal.fire('Berjaya', 'Status EO berjaya dikemaskini.', 'success');
        @endif
        @if(Session::has('not_found'))       
        Swal.fire('Ralat!', 'Fail tidak dijumpai.', 'error');
        @endif
        @if(Session::has('EOW'))       
        Swal.fire('Ralat!', 'EO sudah berdaftar di dalam sistem.', 'error');
        @endif
        @if(Session::has('DaftarEO'))       
        Swal.fire('Berjaya!', 'Pendaftaran EO berjaya disimpan.', 'success');
        @endif
        @if(Session::has('DaftarEOGagal'))       
        Swal.fire('Gagal!', 'Pendaftaran EO Gagal. Sila masukkan maklumat kompetensi yang sah.', 'error');
        @endif
        @if(Session::has('DaftarEMC'))       
        Swal.fire('Berjaya!', 'Pendaftaran EMC telah berjaya disimpan.', 'success');
        @endif

        @if(Session::has('gagalEMC'))       
        Swal.fire('Ralat!', 'Pendaftaran EMC Tidak Berjaya. Sila masukkan no kad pengenalan.', 'error');
        @endif

        @if(Session::has('eoxemc'))       
        Swal.fire('Ralat!', 'Individu telah didaftar sebagai EO.', 'error');
        @endif

        @if(Session::has('pp_exist'))       
        Swal.fire('Ralat!', 'Individu telah didaftar sebagai PP.', 'error');
        @endif
        
        @if(Session::has('padamAhli'))       
        Swal.fire('Berjaya!', 'Maklumat ahli telah berjaya dipadamkan', 'success');
        @endif
        
        
        
    </script>
    
    @include('components.ajax.address')
    
</body>

</html>

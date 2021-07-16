@extends('layouts.auth')
@push('css')
    <style type="text/css">
        .btn-success, .btn-success:focus {
            color: #ffffff !important;
            background-color: #0b2e13;
            border-color: #0b2e13;
        }

        @-webkit-keyframes blinker {
            from {opacity: 1.0;}
            to {opacity: 0.0;}
        }
        .blink{
            text-decoration: blink;
            -webkit-animation-name: blinker;
            -webkit-animation-duration: 0.6s;
            -webkit-animation-iteration-count:infinite;
            -webkit-animation-timing-function:ease-in-out;
            -webkit-animation-direction: alternate;
        }
        .modal-lg {
        max-width: 60% !important;
        width: 60% !important;
        }
    </style>
@endpush
@section('content')
    <div class="row">
        <div class="col-md-6">
          <div class="row">
            <div class="col-lg-12">
            <label for="type1">Sila Pilih Peranan Anda.</label><BR>
              <div class="radio radio-primary">
                <input name="project_type" value="0" id="type1" onclick="luaran()" type="radio" class="hidden" required="" aria-required="true">
                <label for="type1">Penggerak Projek (PP) / EO / EMC</label><BR>
                <input name="project_type" value="1" id="type2" onclick="dalaman()" type="radio" class="hidden" required="" aria-required="true">
                <label for="type2">Pegawai JAS</label>
              </div>
                <!-- <button class="btn btn-default" style="float:right;" onclick="luaran()">Pengguna Luaran</button> -->
            </div>
          </div>
            <div id="external">
              <h4 class="bold">Log Masuk</h4>
              <!-- <form method="POST" action="{{ route('log-pro') }}" class="p-t-15" id="form-internal" name="form-internal" role="form"> -->
              <form id='loginexternalform' method="POST" action="{{ route('check-projek-external') }}" class="p-t-15" id="form-login" name="form-login" role="form">
                  {{ csrf_field() }}
                  <div class="row" style="display: none;margin-bottom: 10px" id="jenis_projek">
                      <div class="col-md-12">
                          <select class="full-width autoscroll"  id="user_type" style="border-color: rgba(0, 0, 0, 0.07);padding: 9px;min-height: 35px">
                              <option>Sila Pilih Kategori Pengguna</option>
                              <option value="penggerak">Penggerak Projek</option>
                              <option value="eo">Environmental Officer (EO)</option>
                              <option value="emc">Environmental Monitoring Consultant (EMC)</option>
                          </select>
                      </div>
                  </div>
                  <div class="row">
                        <div class="col-md-12">
                            <!-- @include('components.input', [
                            'label' => 'ID Pengguna',
                            'mode' => 'required',
                            'name' => 'username'
                            ]) -->
                            <div class="form-group form-group-default required">
                                <label class="fade">
                                    <span id="label_username">No. K/P </span>
                                            <span style="color:red;">*</span>
                                </label>
                                <input id="username" class="form-control" name="username" placeholder="tanpa ' - '" onkeypress="" required="" title="" type="text" value="" readonly>
                            </div>
                        </div>
                  </div>
                  <div class="row">
                        <div class="col-md-12">
                            <!-- @include('components.input', [
                            'label' => 'Kata Laluan',
                            'info' => 'Kata laluan ini adalah sepanjang 12 aksara dan mengandungi kombinasi angka, huruf, aksara khas (!@#$%^&*)',
                            'mode' => 'required',
                            'name' => 'password',
                            'type' => 'password',
                            'options' => 'minlength=12',
                            'placeholder' => 'Minima 12 aksara',
                            ]) -->
                            <div class="form-group form-group-default required">
                                <label class="fade">
                                    <span id="label_password">Kata Laluan</span>
                                    <i style="cursor: help; color: #48B0F7;" class="fa fa-question-circle" data-html="true" data-toggle="tooltip" title="" data-original-title="Kata laluan ini adalah sepanjang 12 aksara dan mengandungi kombinasi angka, huruf, aksara khas (!@#$%^&amp;*)"></i>   <span style="color:red;">*</span>
                                </label>
                                <input id="passwordl" class="form-control" name="password" placeholder="" onkeypress="" required="" type="password" value="" minlength="12" title="" readonly>
                            </div>
                        </div>
                  </div>
              </form>
            </div>
            <div id="internal" style="display: none;">
              <h4 class="bold">Log Masuk</h4>
              <form id='logininternalform' method="POST" action="{{ route('log-pro') }}" class="p-t-15" id="form-internal" name="form-internal" role="form">
                  {{ csrf_field() }}
                  <div class="row">
                      <div class="col-md-12">
                          <!-- @include('components.input', [
                            'label' => 'ID Pengguna',
                            'mode' => 'required',
                            'name' => 'email',
                            'type' => 'email',
                          ]) -->
                          <div class="form-group form-group-default required">
                            <label class="fade">
                              <span id="label_email">E-mel Pegawai</span>
                                  <span style="color:red;">*</span>
                            </label>
                            <input id="email" class="form-control" name="email" placeholder="abc@doe.gov.my" onkeypress="" required="" type="email" value="" title="" readonly>
                          </div>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-md-12">
                          <!-- @include('components.input', [
                          'label' => 'Kata Laluan',
                          'info' => 'Kata laluan ini adalah sepanjang 12 aksara dan mengandungi kombinasi angka, huruf, aksara khas (!@#$%^&*)',
                          'mode' => 'required',
                          'name' => 'password',
                          'type' => 'password',
                          'options' => 'minlength=12',
                          'placeholder' => 'Minima 12 aksara',
                          ]) -->
                          <div class="form-group form-group-default required">
                            <label class="fade">
                              <span id="label_password">Kata Laluan</span>
                              <i style="cursor: help; color: #48B0F7;" class="fa fa-question-circle" data-html="true" data-toggle="tooltip" title="" data-original-title="Kata laluan ini adalah sepanjang 12 aksara dan mengandungi kombinasi angka, huruf, aksara khas (!@#$%^&amp;*)"></i>   <span style="color:red;">*</span>
                            </label>
                            <input id="password" class="form-control" name="password" placeholder="" onkeypress="" required="" type="password" value="" minlength="12" title="" readonly>
                          </div>
                      </div>
                  </div>

              </form>
              <!-- <div class="row">
                  <div class="col-lg-6">
                      <p><a class="text-info" href="{{ route('password.request') }}">Lupa Kata Laluan ?</a></p>
                  </div>

              </div> -->
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <p><a class="text-info" href="{{ route('password.request') }}">Lupa Kata Laluan?</a></p>
                </div>




                <!-- <div class="col-lg-3">
                    <button class="btn btn-default" style="float:right;" onclick="dalaman()">Pengguna Dalaman</button>
                </div> -->
            </div>
            <div id="loginternal" style="display: none;">
            <a class="btn btn-default m-t-10 pull-right" style="border: 2px solid #1f3953;color: #1f3953;" href="{{ route('register') }}">Daftar Penggerak Projek</a>
              <button id="logmasukexternal" class="logmasukexternal btn btn-info m-t-10 " type="submit"><!-- <i class=" m-r-5"></i> --> Log Masuk</button>
            </div>
            <div id="loginexternal" style="display: none;">
            <!-- <a class="btn btn-default m-t-10 pull-right" style="border: 2px solid #1f3953;color: #1f3953;" href="{{ route('register') }}">Daftar Penggerak Projek</a> -->

              <button id="logmasukinternal" class="logmasukinternal btn btn-info m-t-10 " type="submit"><!-- <i class=" m-r-5"></i> --> Log Masuk</button>
            </div>
        </div>
        <div id="div-announcement" class="col-md-6">
            <h4 class="bold">Pengumuman</h4>
            <div class="split-list" style="width: 100%; max-height: 300px; overflow: auto;">
                <div class="boreded no-top-border list-view">
                    <?php foreach ($list_announcements as $key => $value): ?>
                  <?php $counthey = count($value); ?>
                    <div class="list-view-group-container" @if($counthey == 0) style="display: none;" @endif>
                        <div class="list-view-group-header"><span><?= date('d/m/Y',strtotime($key)) ?></span></div>
                        <ul class="no-padding">
                            <?php foreach ($value as $key2 => $value2): ?>
                            <li class="item padding-15">
                                <div class="inline m-l-15">
                                    <p class="recipients no-margin hint-text small">{{strtoupper($value2['title'])}}</p>
                                    <p> <?= implode("<br>",explode("\n",$value2['description'])) ?></p>
                                </div>
                                <div class="clearfix"></div>
                            </li>
                            <?php endforeach ?>
                        </ul>
                    </div>
                    <?php endforeach ?>
                </div>
            </div>
            <!-- <div class="col-lg-12">
                <div class="card card-default">
                    <div class="card-body">
                        <div class="form-group row">
                            <button type="button" class="btn btn-info btn-block m-t-5" onclick="pegawai()">Pegawai Penyiasat JAS Negeri</button>
                            <button type="button" class="btn btn-info btn-block m-t-5" onclick="penyelia()">Pegawai Penyelia JAS Negeri</button>
                            <button type="button" class="btn btn-info btn-block m-t-5" onclick="hq()">Pengarah JAS Negeri</button>
                            <button type="button" class="btn btn-info btn-block m-t-5" onclick="projek()">Pengguna</button>
                            <button type="button" class="btn btn-info btn-block m-t-5" onclick="admin()">Pentadbir Sistem</button>
                            <button type="button" class="btn btn-info btn-block m-t-5" onclick="adminnegeri()">Pentadbir Sistem JAS Negeri</button>
                        </div>
                    </div>
                </div>
            </div> -->
        </div>
    </div>
    <!-- <div class="modal fade slide-up disable-scroll" id="modal-video" tabindex="-1" role="dialog" style="padding-right: 17px; display: none;"> -->
    <div class="modal fade slide-up disable-scroll" id="modal-video" tabindex="-1" role="dialog" style="padding-right: 17px; display: none;">
        <div class="modal-dialog">
            <div class="modal-content-wrapper">
                <div class="modal-content">
                    <div class="modal-header clearfix text-left">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-close fs-14"></i>
                        </button>
                        <h5 class="modal-title" id="addModalTitle">Video <span class="bold">Pengenalan</span></h5>
                        <br><br>
                    </div>
                    <div class="modal-body">
                        <div class="row ">
                            <iframe class="popup-youtube-player5" width="800" height="450" src="https://www.youtube.com/embed/EQXevEoRErc?enablejsapi=1" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade slide-up disable-scroll" id="modal-videos" tabindex="-1" role="dialog" style="padding-right: 17px; display: none;">
        <div class="modal-dialog">
            <div class="modal-content-wrapper">
                <div class="modal-content">
                    <div class="modal-header clearfix text-left">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-close fs-14"></i>
                        </button>
                        <h5 class="modal-title" id="addModalTitle">Video Manual <span class="bold">Pengguna</span></h5>
                        <br><br>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <ul class="nav nav-tabs nav-tabs-fillup d-none d-md-flex d-lg-flex d-xl-flex tabletbaby" role="tablist">
                                <li class="nav-item ml-md-3">
                                    <a class="active" data-toggle="tab" href="#a1" data-target="#a1" role="tab"><span>Pendaftaran Pengguna</span></a>
                                </li>
                                <li class="nav-item ml-md-3">
                                    <a class="" data-toggle="tab" href="#" data-target="#a2" role="tab"><span>Pengisian dan Pengesahan Laporan</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="" data-toggle="tab" href="#" data-target="#a3" role="tab"><span>Laporan Praktis Pengurusan Terbaik</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="" data-toggle="tab" href="#" data-target="#a4" role="tab"><span>Jas Ibu Pejabat</span></a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active slide-right" id="a1">
                                    <div class="modal-body">
                                        <div class="row ">
                                            <iframe class="popup-youtube-player1" width="700" height="350" src="https://www.youtube.com/embed/AvB-1R027KM?enablejsapi=1" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane  slide-right" id="a2">
                                    <div class="modal-body">
                                        <div class="row ">
                                            <iframe class="popup-youtube-player2" width="700" height="350" src="https://www.youtube.com/embed/A07_aT2fnRE?enablejsapi=1" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane  slide-right" id="a3">
                                    <div class="modal-body">
                                        <div class="row ">
                                            <iframe class="popup-youtube-player3" width="700" height="350" src="https://www.youtube.com/embed/_Ld-xmJn8YA?enablejsapi=1" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane  slide-right" id="a4">
                                    <div class="modal-body">
                                        <div class="row ">
                                            <iframe class="popup-youtube-player4" width="700" height="350" src="https://www.youtube.com/embed/im2MOFHeAig?enablejsapi=1" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="modal-div"></div>
@endsection
@push('js')
    <script type="text/javascript">

        // $('body').keypress(function(e){
        //     if (e.keyCode == 13)
        //     {
        //         if(document.getElementById('logmasukexternal').clicked == true)
        //         {
        //             $('form#loginexternalform').submit();
        //         }

        //         if(document.getElementById('logmasukinternal').clicked == true)
        //         {
        //             $('form#logininternalform').submit();
        //         }
        //     }
        // });

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

        $('.tabletbaby li a').on('click', function() {

            $('.popup-youtube-player1')[0].contentWindow.postMessage('{"event":"command","func":"' + 'stopVideo' + '","args":""}', '*');
            $('.popup-youtube-player2')[0].contentWindow.postMessage('{"event":"command","func":"' + 'stopVideo' + '","args":""}', '*');
            $('.popup-youtube-player3')[0].contentWindow.postMessage('{"event":"command","func":"' + 'stopVideo' + '","args":""}', '*');
            $('.popup-youtube-player4')[0].contentWindow.postMessage('{"event":"command","func":"' + 'stopVideo' + '","args":""}', '*');
        });
        $('.close').on('click', function() {

            $('.popup-youtube-player1')[0].contentWindow.postMessage('{"event":"command","func":"' + 'stopVideo' + '","args":""}', '*');
            $('.popup-youtube-player2')[0].contentWindow.postMessage('{"event":"command","func":"' + 'stopVideo' + '","args":""}', '*');
            $('.popup-youtube-player3')[0].contentWindow.postMessage('{"event":"command","func":"' + 'stopVideo' + '","args":""}', '*');
            $('.popup-youtube-player4')[0].contentWindow.postMessage('{"event":"command","func":"' + 'stopVideo' + '","args":""}', '*');
            $('.popup-youtube-player5')[0].contentWindow.postMessage('{"event":"command","func":"' + 'stopVideo' + '","args":""}', '*');
        });
        function manual() {
            $("#modal-video").modal("show");
        }

        function dalaman() {
            $("#internal").show();
            $("#external").hide();
            $("#loginternal").hide();
            $("#loginexternal").show();
            $("#email").attr("readonly", false);
            $("#password").attr("readonly", false);

        }
        $('#modal-project').modal({backdrop: 'static', keyboard: false})
        @if($projekarray)
          $('#modal-project').modal({backdrop: 'static', keyboard: false})
          $("#modal-project").modal("show");
        @endif

        function projeklist(projekid,userid,password){
          // alert(password);
          var url = "{{ route('login-projek-external',['projekid' => ":projekid",'userid' => ":userid",'password' => ":password"]) }}";
          // var url = "{{ route('login-projek-external', ['projekid'=>"+projekid+",'userid'=>"+userid+",'password'=>"+password+"]) }}";

          url = url.replace('%3Aprojekid', projekid);
          // alert(userid.replace(/\s/g,''));
          url = url.replace('%3Auserid', userid);
          url = url.replace('%3Apassword', password);
          var urlString = url.replace(/&amp;/g, '&');
          // alert(urlString);
          // dd(urlString);
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
        }
        function manuals() {
            $("#modal-videos").modal("show");
        }

        $('body').on('click', '.logmasukexternal', function(event) {
          // alert('wdwdw');

            //testing purpose, escape user admin
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
        // $("#modal-div").load("/login");
        $('body').on('submit', 'form#loginexternalform', function(e) {
          e.preventDefault();
          // alert('wdwdw');
          //   exit();
            var form = $(this);
            // alert(form.attr('action'));
            $.ajax({
                url: form.attr('action'),
                method: form.attr('method'),
                data: new FormData(form[0]),
                dataType: 'json',
                async: true,
                contentType: false,
                processData: false,
                success: function(response) {
                  // alert('wdwdwd');
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
                    // swal({
                    //     title: "Gagal!",
                    //     text: "Sila masukkan maklumat email dan kata laluan.",
                    //     
                    //     button: "OK",
                    // })
                    // .then((confirm) => {
                    //     swal.close()
                    // });
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
          // alert('wdwdw');

          //testing purpose, escape user admin
          var test = $('input[name="project_type"]:checked').val();
          var email = $('#email').val();
           if(test == 1 &&  email == 'admin'){
                $('#username').val('admin');
                $('#passwordl').val('password');
                $('form#loginexternalform').submit();
           }else{
                $('form#logininternalform').submit();
           }

            // $('#loginexternalform')[0].reset();
            // $('#logininternalform')[0].reset();

        });
        // $("#modal-div").load("/login");
        $('body').on('submit', 'form#logininternalform', function(e) {
          e.preventDefault();
            var form = $(this);
            // alert(form.attr('action'));
            $.ajax({
                url: form.attr('action'),
                method: form.attr('method'),
                data: new FormData(form[0]),
                dataType: 'json',
                async: true,
                contentType: false,
                processData: false,
                success: function(response) {
                  // alert('wdwdwd');
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
                        // location.href = response.url;
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
    </script>
@endpush
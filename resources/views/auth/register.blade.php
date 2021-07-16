@extends('layouts.auth')
@section('content')
<link href="{{ asset('assets/plugins/bootstrap-sweetalert/sweetalert.css') }}" rel="stylesheet" type="text/css" />
<script src="{{ asset('assets/plugins/bootstrap-sweetalert/sweetalert.min.js') }}" type="text/javascript"></script>
    <div class="row">
        <div class="col-md-12 card-block">
            <h4 class="bold">Daftar Penggerak Projek</h4>
            <form method="POST" action="{{ route('register') }}" class="p-t-15" id="form-register" name="form-register" role="form" novalidate>
            {{ csrf_field() }}
            <div class="row" id="carianjas">
                <div class="col-md-12" >
                    <!-- @include('components.input', [
                    'label' => 'No. Fail JAS',
                    'info' => 'No. Fail JAS adalah nombor rujukan yang digunakan di dalam Sistem eKAS',
                    'name' => 'no_fail_JAS',
                    'id' => 'no_fail_JAS',
                    'required' => 'required'
                    ]) -->
                    <div id="no_fail_JAS1" class="form-group form-group-default ">
                        <label>
                            <span style="color:red;">*</span><span id="label_no_fail_JAS">No. Fail JAS</span>
                            <i style="cursor: help; color: #48B0F7;" class="fa fa-question-circle" data-html="true" data-toggle="tooltip" title="" data-original-title="No. Fail JAS adalah nombor rujukan yang digunakan di dalam Sistem eKAS"></i>        
                        </label>
                        <input id="no_fail_JAS" class="form-control " name="no_fail_JAS" placeholder="" onkeypress="" type="text" value="" required="">
                        <label id="failerror" style="color: #f35958;font-size: 12px;text-transform: none !important;display: none;">Maklumat no. fail JAS wajib diisi.</label>
                    </div>
                    <a href="/" class="btn btn-danger pull-left" id="kembali">Kembali</a>
                    <button type="button" class="btn btn-info pull-right" id="semak">Semak</button>
                </div>
            </div>
            <div class="row" id="displayjas" style="display: none;">
                <div class="col-md-12" style="pointer-events: none;">
                    <div class="form-group form-group-default" style="background: #f3f3f3;">
                        <label>
                            <span id="label_no_fail_JASid">No. Fail JAS</span>
                            <i style="cursor: help; color: #48B0F7;" class="fa fa-question-circle" data-html="true" data-toggle="tooltip" title="" data-original-title="No. Fail JAS adalah nombor rujukan yang digunakan di dalam Sistem eKAS"></i>        <span style="color:red;">*</span>
                        </label>
                        <input id="no_fail_JASid" class="form-control " name="no_fail_JASid" placeholder="" onkeypress="" type="text" value="" readonly>
                    </div>
                </div>
            </div>
            <div style="display: none;" class="daftar">
                <div class="row">
                    <div class="col-md-12" style="pointer-events: none;">
                        <div class="form-group form-group-default" style="background: #f3f3f3;">
                            <label>
                                <span id="label_nama_projek">Nama Projek</span>
                                    </label>
                            <textarea id="nama_projek" class="form-control " name="nama_projek" placeholder="" style="height: 150px;" readonly></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <!-- @include('components.input', [
                        'label' => 'Nama Pegawai Penggerak Projek',
                        
                        'name' => 'name',
                        'id' => 'name',
                        ]) -->
                        <div class="form-group form-group-default" style="background: #f3f3f3;">
                            <label>
                                <span id="label_name"  style="color: black;">Nama Pegawai Penggerak Projek di Sistem EKAS</span>
                                        <span style="color:red;">*</span>
                            </label>
                            <input id="name1" class="form-control" name="name1" placeholder="" onkeypress="" maxlength="100" type="text" value="" aria-invalid="false" title="" readonly="">
                            <!-- <label id="nameerror" style="color: red;display: none;">Pastikan .</label> -->
                        </div>
                        <div class="form-group form-group-default" style="background: #f3f3f3;">
                            <label>
                                <span id="label_name"  style="color: black;">Penggerak Projek</span>
                                        <span style="color:red;">*</span>
                            </label>
                            <input id="name2" class="form-control" name="name2" placeholder="" onkeypress="" maxlength="100" type="text" value="" aria-invalid="false" title="" readonly="">
                            <!-- <label id="nameerror" style="color: red;display: none;">Pastikan .</label> -->
                        </div>
                        <div class="form-group form-group-default">
                            <label>
                                <span id="label_name">Nama Pegawai Penggerak Projek</span>
                                        <span style="color:red;">*</span>
                            </label>
                            <input id="name" class="form-control" name="name" placeholder="" onkeypress="" maxlength="100" type="text" value="" aria-invalid="false" title="">
                            <label id="nameerror" style="color: red;display: none;">Pastikan .</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <!-- @include('components.input', [
                        'label' => 'No Kad Pengenalan',
                        'info' => 'Pastikan no kad pengenalan yang dimasukkan adalah milik pemaju projek. No Kad Pengenalan ini akan digunakan sebagai ID untuk log masuk ke dalam sistem',
                        'mode' => 'required',
                        'onkeypress' => 'return onlyNumberKey(event);',
                        'maxlength' => '12',
                        'placeholder' => "Masukkan nombor kad pengenalan tanpa  '-'",
                        'name' => 'username',
                        'id' => 'username'
                        ]) -->
<!-- AS(B)P50/013/906/010 -->
                        <div class="form-group form-group-default required">
                            <label>
                                <span id="label_username">No. Kad Pengenalan</span>
                                <i style="cursor: help; color: #48B0F7;" class="fa fa-question-circle" data-html="true" data-toggle="tooltip" title="" data-original-title="Pastikan no. kad pengenalan yang dimasukkan adalah milik pemaju projek. No. Kad Pengenalan ini akan digunakan sebagai ID untuk log masuk ke dalam sistem"></i>        <span style="color:red;">*</span>
                            </label>
                            <input id="username" class="form-control " name="username" placeholder="Masukkan nombor kad pengenalan tanpa  '-'" onkeypress="return onlyNumberKey(event);" minlength="12" maxlength="12" type="text" value="" aria-invalid="false" >
                        </div>
                    </div>
                </div>


               <!--  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group form-group-default required">
                        <label>
                          <span id="label_username">E-Mel</span>
                          <i style="cursor: help; color: #48B0F7;" class="fa fa-question-circle" data-html="true" data-toggle="tooltip" title="" data-original-title="eg : email@gmail.com"></i>    </label>
                        <input id="email" class="form-control " name="email" required type="email">
                      </div>
                      @include('components.input', [
                        'label' => 'Alamat Emel',
                        'info' => 'Alamat Emel eg : email@gmail.com',
                        
                        'name' => 'email',
                    ])
                    </div>
                </div>
 -->
                <div class="row">
                    <div class="col-md-12">
                        <div id="div-mel" class="form-group form-group-default">
                            <label class="fade">
                                <span id="label_email">Alamat E-mel</span>
                                <i style="cursor: help; color: #48B0F7;" class="fa fa-question-circle" data-html="true" data-toggle="tooltip" title="" data-original-title="Alamat E-mel cth : email@gmail.com"></i><span style="color:red;">*</span>
                            </label>
                            <input id="email" class="form-control" name="email" placeholder="" onkeypress="" type="email" value="" aria-invalid="false">
                            <label id="emelerror" style="color: red;display: none;">E-mel xxxxx@doe.gov.my tidak boleh didaftar sebagai pihak syarikat.</label>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div id="div-wasan" class="form-group-default">
                            <label class="m-t-15 control-label" style="color: #575757 !important;">Jenis Pengawasan<span style="color:red;">*</span> </label>
                            <div class="jenisPengawasan">
                                <div class="checkbox check-primary" id="pengawasan">
                                    <?php
                                        $Pengawasan = \App\MasterModel\MasterPengawasan::all();
                                    ?>
                                    @foreach($Pengawasan as $value)
                                    <div class="row">
                                            <div class="col-md-12">
                                                <input name="pakej_pengawasan_id[]" value="{{$value->id}}" id="{{$value->id}}" type="checkbox" class="form-control pengawasanpakej_{{$value->id}}" onclick="errorremove()" style="position: absolute;" aria-invalid="false">

                                                 @if ($value->jenis_pengawasan == 'PERLEPASAN DARI KOLAM PERANGKAP MENDAP AIR LARIAN PERMUKAAN')
                                                <label style="color: #575757 !important;" for="{{$value->id}}">{{KOLAM}}</label>
                                                @else 

                                                    <label style="color: #575757 !important;" for="{{$value->id}}">{{$value->jenis_pengawasan}}</label>

                                            </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            <label id="wasanerror" style="font-size: 12px;color: #f35958;display: none;">Input jenis pengawasan wajib diisi</label>
                        </div>
                    </div>
                </div>
                        


                <!-- <div class="row">
                    <div class="col-md-6">
                        @include('components.input', [
                            'label' => 'Kata Laluan',
                            'id' => 'password',
                            'info' => 'Kata laluan ini perlulah sekurang-kurangnya sepanjang 8 aksara dan mengandungi kombinasi angka, huruf, aksara khas (!@#$%^&*)',
                            'mode' => 'required',
                            'name' => 'password',
                            'type' => 'password',
                            'options' => 'minlength=8',
                            'placeholder' => 'Minima 8 aksara',
                        ])
                    </div>
                    <div class="col-md-6">
                        @include('components.input', [
                            'label' => 'Pengesahan Kata Laluan',
                            'info' => 'Masukkan kata laluan yang sama',
                            'mode' => 'required',
                            'name' => 'password_confirmation',
                            'id' => 'password_confirmation',
                            'type' => 'password',
                            'options' => 'minlength=8',
                            'placeholder' => 'Minima 8 aksara',
                        ])
                    </div>
                </div> -->
                <button type="button" class="btn btn-info pull-right" id="daftar" style="margin-top: 10px">Daftar</button>
                <a href="/" class="btn btn-danger pull-left" id="kembali" style="margin-top: 10px">Kembali</a>
            </div>
            </form>
        </div>
    </div>
    <?php
      $JasFail = \App\JasFail::all();
      $JasCount = \App\JasFail::count();
    ?>
@endsection
@push('js')
    <script type="text/javascript">
        var max_chars = 80;

        $('#name').keydown( function(e){
            if ($(this).val().length >= max_chars) { 
                $(this).val($(this).val().substr(0, max_chars));
            }
        });

        $('#name').keyup( function(e){
            if ($(this).val().length >= max_chars) { 
                $(this).val($(this).val().substr(0, max_chars));
            }
        });
        function onlyNumberKey(evt) {
              // Only ASCII charactar in that range allowed 
              var ASCIICode = (evt.which) ? evt.which : evt.keyCode 
              if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57)) 
                  return false; 
              return true; 
          }

        $('#username').bind('keypress paste', function (event) {
              if (event.originalEvent.clipboardData.getData('Text').match(/[^\d]/)) {
                event.preventDefault();
              }
          });

        // $(document).ready(function () {
        //     // validate signup form on keyup and submit
        //     $("#usernam").validate({
        //         rules: {
        //             ic_no: {
        //                 required: true,
        //                 regex: "^\\d{6}\\-\\d{2}\\-\\d{4}$"
        //             }
        //         },
        //         messages: {
        //             ic_no: {
        //                 required: "Please input the IC number before searching.",
        //                 regex: "Sila masukkan No. kad pengenalan yang benar."
        //             }
        //         }
        //     });

        // });
        $(function() {
            $('#form-register').validate({
                rules: {
                    password: "required",
                    password_confirmation: {
                        equalTo: "input[name=password]"
                    }
                }
            })
        })

        $('#no_fail_JAS').keyup( function(e){
            if ($(this).val().length >= 0) { 
                var element1 = document.getElementById("no_fail_JAS1");
                $('#failerror').hide();
                element1.classList.remove("has-error");
            }
        });

        $('#semak').click(function(){
            var input = $('#no_fail_JAS').val();
            var output = input.split("/").join("-");
            var output = output.split(" ").join("");
            var element1 = document.getElementById("no_fail_JAS1");
            var element = document.getElementById("no_fail_JAS");
            if (element.value.length == 0) {
                $('#failerror').show();
                element1.classList.add("has-error");
            }

            var form = $('#no_fail_JAS');
            
            // if(!form.valid())
            //    return;

            console.log(output);
            $.ajax({
                url: 'checkExist/'+output,
                type: 'get',
                  success: function(response) {
                    
                    if (response.status == 'error') {
                         swal({
                          title: "",
                          text: "No. Fail JAS telah digunakan!",
                          
                        });
                     }else if (response.status == 'pending_distribute') {
                        swal({
                          title: "",
                          text: "Maklumat projek belum dikemaskini di Sistem SPPPEIA. Sila hubungi JAS Negeri.",
                          
                        });
                     }else{
                        var input = $('#no_fail_JAS').val();
                        var output = input.split("/").join("-");
                        var output = output.split(" ").join("");
                        var count = 0;
                        @foreach ($JasFail as $JasFails)
                        console.log(input.replace(/\s/g,'').toUpperCase() + '  -------------------   '+ "{{strtoupper(str_replace(' ', '', $JasFails->nofail))}}" + "         {{$JasFails->nofail}}");
                        if(input.replace(/\s/g,'').toUpperCase() ==  "{{strtoupper(str_replace(' ', '', $JasFails->nofail))}}"){
                            count = 1;
                        }
                        @endforeach
                        if(count == 1){
                              swal("", "Sila teruskan dengan pendaftaran Penggerak Projek.")
                              .then(function(){
                            $(".daftar").show();
                            $('#semak').hide();
                            $('#kembali').hide();
                            $.ajax({
                                url: 'jas/'+output,
                                type: 'get',
                                success: function(response) {
                                    if (response.status == 'ok') {
                                        document.getElementById("nama_projek").value = response.nama;
                                        document.getElementById("name1").value = response.ppnama;
                                        document.getElementById("name2").value = response.ppnamap;
                                        $('#carianjas').hide();
                                        $('#displayjas').show();
                                        document.getElementById("no_fail_JASid").value = response.failjas;
                                        if (response.exist == 1) {
                                            // $('#div-wasan').addClass('hide');
                                            console.log(response.changeable);
                                            if (response.changeable == 'ubah') {
                                                response.pakejpengawasan.forEach(function (item,i) {
                                                    document.getElementById(item).checked = true;
                                                });
                                            } else {
                                                var peng = '';
                                                var peng_ = '';
                                                response.pakejpengawasan.forEach(function (item,i) {
                                                    // document.getElementById(item).checked = true;
                                                    console.log(item);
                                                    response.master.forEach(function (item1) {
                                                        if (item == item1.id) {
                                                            console.log(item1.id);
                                                            peng = '<div class="row" style="pointer-events:none;"><div class="col-md-12">'+(i+1)+'. '+item1.jenis_pengawasan+'</div></div>';
                                                        }
                                                    });
                                                    peng_ = peng_ + peng;
                                                }); 
                                                $('#pengawasan').empty().append(peng_);

                                            }

                                        }
                                    }
                                }
                            });
                        });

                        // swal({
                        //     title: "Hantar Bahan Publisiti",
                        //     type: "info",
                        //     showCancelButton: false,
                        //     confirmButtonClass: "green-meadow",
                        //     cancelButtonClass: "btn-danger",
                        //     confirmButtonText: "Hantar",
                        //     cancelButtonText: "Batal",
                        //     closeOnConfirm: true,
                        //     closeOnCancel: true,
                        //     showLoaderOnConfirm: true
                        // },
                        // function(isConfirm) {
                        //     $(".daftar").show();
                        //     $('#semak').hide();
                        //     $('#kembali').hide();
                        //     $.ajax({
                        //         url: 'jas/'+output,
                        //         type: 'get',
                        //         success: function(response) {
                        //             if (response.status == 'ok') {
                        //                 document.getElementById("nama_projek").value = response.nama;
                        //                 document.getElementById("name").value = response.ppnama;
                        //             }
                        //         }
                        //     });
                        // });
                    }else{
                    swal({
                        title: "",
                        text: "No Fail JAS tidak wujud dalam rekod Sistem EKAS!",
                        
                    });
                  }
                }
              }
            });
          });

        $('body').on('click', '#daftar', function(event) {
            $('#form-register').submit();
        });

        $('body').on('submit', '#form-register', function() {
            // alert();
            var form = $(this);
            document.getElementById('daftar').innerText = 'Sedang diproses..';
            document.getElementById("daftar").style.pointerEvents = "none";
            document.getElementById("daftar").style.backgroundColor = "#687e95";
            document.getElementById("daftar").style.borderColor = "#687e95";
            $.ajax({
                url: form.attr('action'),
                method: form.attr('method'),
                data: new FormData(form[0]),
                dataType: 'json',
                async: true,
                contentType: false,
                processData: false,
                success: function(data) {
                    if (data.status == 'info') {
                        swal({
                            title: data.title,
                            text: data.message,
                            buttons: [
                                'Tidak',
                                'Ya'
                            ],
                            dangerMode: false,
                        }).then(function(isConfirm) {
                            if (isConfirm) {
                                $.ajax({
                                    url: "{{route('registerexist')}}",
                                    method: form.attr('method'),
                                    data: new FormData(form[0]),
                                    dataType: 'json',
                                    async: true,
                                    contentType: false,
                                    processData: false,
                                    success: function(data) {
                                        swal(data.title, data.message)
                                        .then((confirm) => {
                                            if (confirm) {
                                                location.href="{{ route('login') }}";
                                            }
                                        });
                                
                                    }
                                });
                            }
                        });
                    } else {
                        swal(data.title, data.message)
                        .then((confirm) => {
                            if (confirm) {
                                location.href="{{ route('login') }}";
                            }
                        });
                    }
            
                },
                error: function(e){
                    document.getElementById('daftar').innerText = 'Daftar';
                    document.getElementById("daftar").style.pointerEvents = "unset";
                    document.getElementById("daftar").style.backgroundColor = "#1f3953";
                    document.getElementById("daftar").style.borderColor = "#1f3953";
                    if (e.responseJSON.errors.pakej_pengawasan_id) {
                        var element = document.getElementById("div-wasan");
                        $('#wasanerror').show();
                        element.classList.add("has-error");
                    }
                    // console.log(e.responseJSON);
                }
            });
            return false;
        });

        // $('#daftar').click(function(){
        //     $("#form-register").submit(function(e) {
        //     e.preventDefault();
        //     var form = $(this);

        //     if(!form.valid())
        //        return;

        //     $.ajax({
        //         url: form.attr('action'),
        //         method: form.attr('method'),
        //         data: form.serialize(),
        //         success: function(data) {
        //             swal(data.title, data.message)
        //             .then((confirm) => {
        //                 if (confirm) {
        //                     location.href="{{ route('login') }}";
        //                 }
        //             });
        //         }
        //     });
        //     return false;
        // });
            // swal("Berjaya!", "Pendaftaran berjaya dilakukan. Anda boleh log masuk menggunakan no kad pengenalan serta kata laluan yang telah didaftarkan.")
            //     .then(function(){
            //         window.location = "{{route('login')}}";
            //     });
        // });


        $('#kembali').click(function(){
            window.location = "{{route('login')}}";
        });
    
     function jenis_pengawasan(){
        $('form#formpengawasan').submit();
    }

    function errorremove(){
        var element = document.getElementById("div-wasan");
        element.classList.remove("has-error");
        $('#wasanerror').hide();
    }

    $('body').on('submit', 'form#formpengawasan', function() {
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
                        // alert('dwdwdw');
                    }
            });
            return false;
    });


    </script>
@endpush

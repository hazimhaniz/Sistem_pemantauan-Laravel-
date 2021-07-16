    @extends('layouts.app')
    @include('plugins.dropify')
    @include('plugins.datatables')

    @section('content')
    

<style>
.readonly{
    pointer-events:none;
    background-color: #f1f1f1;
}

.grey{
    background-color: #ededed;
}


.sweet-alert {
    border: 1px solid #e7e7e7 !important;
}
</style>
    <!-- START JUMBOTRON -->
    <div class="" data-pages="parallax">
        <div class=" container-fluid container-fixed-lg sm-p-l-0 sm-p-r-0">
            <div class="inner">
                <!-- START BREADCRUMB -->
                <!-- <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Utama</a></li>
                    <li class="breadcrumb-item"><a href="javascript:;">Pendaftaran Kumpulan</a></li>
                    <li class="breadcrumb-item active">Environmental Officer (EO)</li>
                </ol> -->
                <!-- END BREADCRUMB -->
              
            </div>
        </div>
    </div>
    <!-- END JUMBOTRON -->

    <div class="row m-l-20 m-r-20">
        <div class="col-md-12">
            <h4 class="bold">Daftar Penggerak Projek</h4>
            <form method="POST" action="{{ route('projek.daftar_penggerak_projek') }}" class="p-t-15" id="form-project" name="form-project" role="form" novalidate>
            {{ csrf_field() }}
            <div class="row" id="carianjas">
                <div class="col-md-12" >
                    <div id="no_fail_JAS1" class="form-group form-group-default ">
                        <label>
                            <span style="color:red;">*</span><span id="label_no_fail_JAS">No. Fail JAS</span>
                            <i data-html="true" data-toggle="tooltip" title="" data-original-title="No. Fail JAS adalah nombor rujukan yang digunakan di dalam Sistem eKAS"></i>        
                        </label>
                        <input id="no_fail_JAS" class="form-control " name="no_fail_JAS" placeholder="" onkeypress="" type="text" value="" required="">
                        <label id="failerror" style="color: #f35958;font-size: 12px;text-transform: none !important;display: none;">Maklumat no. fail JAS wajib diisi.</label>
                    </div>
    
                    <button type="button" class="btn btn-info pull-right" id="semak">Semak</button>
                </div>
            </div>
            
            <div class="daftar m-t-20">
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
                 <div class="form-group form-group-default" style="background: #f3f3f3;">
                    <label>
                        <span id="label_name"  style="color: black;">Nama Pegawai Penggerak Projek di Sistem EKAS</span>
                            <span style="color:red;">*</span>
                    </label>
                        <input id="name1" class="form-control" name="name1" placeholder="" onkeypress="" maxlength="100" type="text" value="" aria-invalid="false" title="" readonly="">
                </div>

                <div class="form-group form-group-default" style="background: #f3f3f3;">
                    <label>
                        <span id="label_name"  style="color: black;">Penggerak Projek</span>
                        <span style="color:red;">*</span>
                    </label>
                        <input id="name2" class="form-control" name="name2" placeholder="" onkeypress="" maxlength="100" type="text" value="" aria-invalid="false" title="" readonly="">
                </div>

                <div class="form-group form-group-default" style="background: #f3f3f3;">
                    <label>
                        <span id="label_name" style="color: black;">Nama Pegawai Penggerak Projek</span>
                        <span style="color:red;">*</span>
                    </label>
                    <input id="name" class="form-control" name="name" placeholder="" onkeypress="" maxlength="100" type="text" value= "{{ auth()->user()->name }}" aria-invalid="false" title="" readonly="">
                </div>
              
                <div class="row">
                    <div class="col-md-12">
                       <div class="form-group form-group-default" style="background: #f3f3f3;">

                            <label>
                                <span id="label_username" style="color: black;">No. Kad Pengenalan</span>
                                <i data-html="true" data-toggle="tooltip" title=""></i>     
                                <span style="color:red;">*</span>
                            </label>
                            <input id="username" class="form-control " name="username" value= "{{ auth()->user()->username }}" type="text" aria-invalid="false" readonly="" >
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group form-group-default" style="background: #f3f3f3;">
                            <label class="fade">
                                <span id="label_email" style="color: black;">Alamat E-mel</span>
                                <i data-html="true" data-toggle="tooltip" title="" ></i><span style="color:red;">*</span>
                            </label>
                            <input id="email" class="form-control" name="email" type="email" value= "{{ auth()->user()->email }}" aria-invalid="false" readonly="">
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
                                                <input name="pakej_pengawasan_id[]" value="{{$value->id}}" id="{{$value->id}}" type="checkbox" class="form-control pengawasanpakej_{{$value->id}}" style="position: absolute;" aria-invalid="false">
                                                <label style="color: #575757 !important;" for="{{$value->id}}">{{$value->jenis_pengawasan}}</label>
                                            </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                      
           

            <button type="submit" class="btn btn-info pull-right" id="daftar" style="margin-top: 10px">Daftar</button>
            </div>
            </form>
        </div>
    </div>


    <?php
      $JasFail = \App\JasFail::all();
      $JasCount = \App\JasFail::count();
    ?>

@push('js')

<script src="{{ asset('assets/plugins/sweetalert/sweetalert.min.js') }}" type="text/javascript"></script>

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

        $(function() {
            $('#form-project').validate({
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
           
            console.log(output);
            $.ajax({
                url: 'checkExist2/'+output,
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
                              swal("", "Sila teruskan dengan pendaftaran Penggerak Projek.").then(function(){
                            $(".daftar").show();
                            $('#semak').hide();
                            $('#kembali').hide();
                            $.ajax({
                                url: 'jas/'+output,
                                type: 'get',
                                success: function(response) {
                                    console.log(response);
                                    if (response.status == 'ok') {
                                        document.getElementById("nama_projek").value = response.nama;
                                        document.getElementById("name1").value = response.ppnama;
                                        document.getElementById("name2").value = response.ppnamap;
                                        $('#carianjas').hide();
                                        $('#displayjas').show();
                                        // document.getElementById("no_fail_JASid").value = response.failjas;
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

        $('body').on('submit', '#form-project', function() {
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
                                                location.href="{{ route('home') }}";
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
                                location.href="{{ route('home') }}";
                            }
                        });
                    }
            
                },
                error: function(e){
                    console.log(e);
                    console.log("A");
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


<!-- @endsection

@push('js')

<script type="text/javascript">
    

$('body').on('submit', '#form-register', function(e) {
    e.preventDefault();
    var form = $(this);

    if(!form.valid())
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
            swal(data.title, data.message)
            .then((confirm) => {
                if (confirm) {
                    location.reload;
                }
            });
        }
    });
})

</script>

@endpush -->
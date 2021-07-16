<style>
    label{
        font-family: 'Montserrat' !important;
        font-size: 10.5px !important;
    }
    .hidden-xs{
        font-family: 'Montserrat' !important;
        font-size: 10.5px !important;
        
    }
    .btn{
        font-family: 'Montserrat' !important;
        font-size: 10.5px !important;s  
    }
    .dashTitle {
        font-family: 'Montserrat' !important;
        font-size: 12.5px !important;
        letter-spacing: 0.06em !important;
        /* text-transform: uppercase !important; */
        font-weight: 500 !important;
    }
    .check-icon {
        right: 15px;
        position: absolute;
        top: 30px;
        color: green;
        font-size: 10.5px;
    }
    #checkhide{
        display: none;
    }

</style>

<div class="row">
    <form id="pendEMCForm" method="POST" action="{{ route('projek.daftarEMC') }}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="projekID" id="projekID" class="projekID" value="{{$projekID}}">
        <div class="col-md-12">

            <div class="row">
                <div class="col-md-6">
                    <div class="dashTitle"><b>Sila isi maklumat EMC yang baru</b>.</div>
                    <br>
                    <div class="form-group-attached m-b-10">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group form-group-default">
                                    <label>
                                        <span><b class="text-dark">No.Kad Pengenalan </b></span> <span style="color:red;">*</span>
                                    </label>
                                    <input name="username" class="form-control form-control-lg" type="text" id="usernameemc" placeholder="" onkeyup="checkUser({{$projekID}})" minlength="12" maxlength="12" onkeypress="return onlyNumberKey(event);"><i class='fa fa-check fa-2x check-icon' aria-hidden='true' id="checkhide" required></i>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group form-group-default">
                                    <label>
                                        <span><b class="text-dark">Nama </b></span> <span style="color:red;">*</span>
                                    </label>
                                    <input name="officer_name" id="officer_name" class="form-control form-control-lg" type="text" placeholder="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group-attached m-b-10">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group form-group-default">
                                    <label>
                                        <span><b class="text-dark">Nama Syarikat</b></span> <span style="color:red;">*</span>
                                    </label>
                                    <input name="syarikat" id="syarikat" class="form-control form-control-lg" type="text" placeholder="" >
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group form-group-default">
                                <label>
                                    <span><b class="text-dark">Alamat Syarikat</b></span><span style="color:red;">*</span>
                                </label>
                                <input name="alamatsyarikat" id="alamatsyarikat" class="form-control form-control-lg" type="text" placeholder="">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group form-group-default">
                                    <label>
                                        <span><b class="text-dark">Alamat Syarikat 2</b></span>
                                    </label>
                                    <input name="alamatsyarikat1" id="alamatsyarikat1" class="form-control form-control-lg" type="text" placeholder="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group form-group-default">
                                    <label>
                                        <span><b class="text-dark">Alamat Syarikat 3</b></span>
                                    </label>
                                    <input name="alamatsyarikat2" id="alamatsyarikat2" class="form-control form-control-lg" type="text" placeholder="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group form-group-default">
                                    <label>
                                        <span><b class="text-dark">Poskod</b></span><span style="color:red;">*</span>
                                    </label>
                                    <input name="poskod" id="poskod" class="form-control form-control-lg" type="text" placeholder="" onkeypress="return onlyNumberKey(event);" minlength="5" maxlength="5">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-group-default">
                                    <label>
                                        <span><b class="text-dark">Negeri</b></span><span style="color:red;">*</span>
                                    </label>
                                    <select class="form-control" name="negeri_id" onchange="changestate2(1)" id="state5">
                                        <option value=""></option>
                                        @foreach($states as $state)
                                        <option value="{{ $state->id }}"> {{ $state->name }} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group form-group-default">
                                    <label>
                                        <span><b class="text-dark">Daerah</b></span>
                                    </label>
                                    <select class="form-control" name="daerah_id" id="districts5" >
                                        <option value=""></option>
                                        
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group form-group-default">
                                    <label>
                                        <span><b class="text-dark">Emel</b></span><span style="color:red;">*</span>
                                    </label>
                                    <input name="email" id="email" class="form-control form-control-lg" type="email" placeholder="" >
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group form-group-default">
                                    <label>
                                        <span><b class="text-dark">No.Tel</b></span><span style="color:red;">*</span>
                                    </label>
                                    <input name="no_tel" id="no_tel" class="form-control form-control-lg" type="text" placeholder="" onkeypress="return onlyNumberKey(event);" minlength="10" maxlength="12">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-group-default">
                                    <label>
                                        <span><b class="text-dark">No Faks</b></span>
                                    </label>
                                    <input name="faks" id="faks" class="form-control form-control-lg" type="text" placeholder="" onkeypress="return onlyNumberKey(event);" maxlength="9">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="dashTitle"><b>Maklumat Pengawasan dan Akreditasi</b></div>
                    <br>
                    <div id="alertmakmal"></div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group-attached m-b-10">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group form-group-default">
                                            <label>
                                                <span><b class="text-dark">Jenis Pengawasan</b></span> <span style="color:red;">*</span>
                                            </label>
                                            <select name="pengawasan_id" id="pengawasanID" class="form-control">
                                                <option value=""></option>
                                                @foreach($masterpengawasans as $masterpengawasan)
                                                @if(in_array($masterpengawasan->id, $pengawasanId)) 
                                                <option value="{{ $masterpengawasan->id }}"> {{ $masterpengawasan->jenis_pengawasan }} </option>
                                                @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" id="hide1">
                                    <div class="col-md-6">
                                        <div class="form-group form-group-default">
                                            <label>
                                                <span><b class="text-dark">KOD MAKMAL AKREDITASI</b></span><span style="color:red;">*</span>
                                            </label>
                                            <input class="form-control form-control-lg" id="kod_makmal" type="text" placeholder="" name="kod_makmal">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group form-group-default">
                                            <label>
                                                <span><b class="text-dark">No.Tel Makmal Akreditasi</b></span><span style="color:red;">*</span>
                                            </label>
                                            <input name="no_tel_makmal" id="no_tel_makmal" class="form-control form-control-lg" type="text" placeholder="" onkeypress="return onlyNumberKey(event);" minlength="10" maxlength="12" >
                                        </div>
                                    </div>
                                </div>
                                <div class="row" id="hide2">
                                    <div class="col-md-12">
                                        <div class="form-group form-group-default">
                                            <label>
                                                <span><b class="text-dark">Nama Makmal Akreditasi</b></span><span style="color:red;">*</span>
                                            </label>
                                            <input name="nama_makmal" id="nama_makmal" class="form-control form-control-lg" type="text" placeholder="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row" id="hide6">
                                    <div class="form-group form-group-default">
                                        <label>
                                            <span><b class="text-dark">Alamat Makmal Akreditasi</b></span><span style="color:red;">*</span>
                                        </label>
                                        <input name="alamat_makmal" id="alamat_makmal" class="form-control form-control-lg" type="text" placeholder="" >
                                    </div>
                                </div>
                                <div class="row" id="hide3">
                                    <div class="col-md-12">
                                        <div class="form-group form-group-default">
                                            <label>
                                                <span><b class="text-dark">Alamat Makmal Akreditasi 2</b></span>
                                            </label>
                                            <input name="alamat_makmal1" id="alamat_makmal1" class="form-control form-control-lg" type="text" placeholder="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row" id="hide7">
                                    <div class="col-md-12">
                                        <div class="form-group form-group-default">
                                            <label>
                                                <span><b class="text-dark">Alamat Makmal Akreditasi 3</b></span>
                                            </label>
                                            <input name="alamat_makmal2" id="alamat_makmal2" class="form-control form-control-lg" type="text" placeholder="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row" id="hide4">
                                    <div class="col-md-6">
                                        <div class="form-group form-group-default">
                                            <label>
                                                <span><b class="text-dark">Poskod</b></span><span style="color:red;">*</span>
                                            </label>
                                            <input class="form-control form-control-lg" id="poskod_1" name="poskod" minlength="5" maxlength="5" type="text" placeholder="" onkeypress="return onlyNumberKey(event);">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group form-group-default">
                                            <label>
                                                <span><b class="text-dark">Negeri</b></span><span style="color:red;">*</span>
                                            </label>
                                            <select class="form-control" onchange="changestate2(2)" name="makmal_negeri_id" id="state25">
                                                <option value=""></option>
                                                @foreach($states as $state)
                                                <option value="{{ $state->id }}"> {{ $state->name }} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" id="hide5">
                                    <div class="col-md-12">
                                        <div class="form-group form-group-default">
                                            <label>
                                                <span><b class="text-dark">Daerah</b></span>
                                            </label>
                                            <select name="makmal_daerah_id" class="form-control" id="districts25">
                                                <option value=""></option>

                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div id="jenisPengawasan"></div>
                        </div>
                    </div>
 <!--                    <br>
                    <div class="modal-footer">
                        <button type=" button" class="btn btn-info" id="simpanPengawasan"></i>Tambah Pengawasan</button>
                    </div> -->
                </div>
            </div>
            <br>
<!--             <div class="row" id="show">
                <div class="col-md-6"></div>
                <div class="col-md-6 pull-right">
                    <input type="checkbox" id="trigger" > Hantar maklumat
                </div>
            </div>
            <br> -->
            <div class="modal-footer">
                  <button type=" button" class="btn btn-info" id="simpanPengawasan"></i>Tambah Pengawasan</button>
               <button type="submit" class="btn btn-success" id="btnSubmit" onclick=""></i>Hantar</button>
           </div>
       </div>
   </form>
</div>

<script type="text/javascript">
    $('#btnSubmit').hide();

//     $('#trigger').change(function(){
//         if(document.getElementById('trigger').checked) {
//            $('#btnSubmit').show();  
//        }else{
//         $('#btnSubmit').hide(); 
//     }
// });

    function changestate2(type) {
        if (type == 1) {
            var id = $('#state5').val();
        } else {
            var id = $('#state25').val();
        }
        $.ajax({
            url: "{{ url('getdistricts') }}"+'/'+id+'/'+type,
            method: "GET",

            success: function(response){
               var len = response.districts.length;
               if (response.type == 1) {
                $("#districts5").empty();
            } else {
                $("#districts25").empty();

            }
            for( var i = 0; i<len; i++){
                var id = response.districts[i]['district_id'];
                var name = response.districts[i]['name'];
                if (response.type == 1) {
                    $("#districts5").append("<option value='"+id+"'>"+name+"</option>");
                } else {
                    $("#districts25").append("<option value='"+id+"'>"+name+"</option>");
                }
            }
        },
        error: function(response){
            console.log(response);
        }
    });
    }

    $('#simpanPengawasan').click(function(e){
        e.preventDefault();

        var form = new FormData;
        form.append('pengawasan_id',$('#pengawasanID').val());
        form.append('kod_makmal',$('#kod_makmal').val());
        form.append('no_tel_makmal',$('#no_tel_makmal').val());
        form.append('nama_makmal',$('#nama_makmal').val());
        form.append('alamat_makmal',$('#alamat_makmal').val());
        form.append('alamat_makmal1',$('#alamat_makmal1').val());
        form.append('alamat_makmal2',$('#alamat_makmal2').val());
        form.append('poskod',$('#poskod').val());
        form.append('makmal_negeri_id',$('#state25').val());
        form.append('makmal_daerah_id',$('#districts25').val());
        form.append('projekID',$('#projekID').val());

        form.append('username',$('#usernameemc').val());
        form.append('officer_name',$('#officer_name').val());
        form.append('syarikat',$('#syarikat').val());
        form.append('alamatsyarikat',$('#alamatsyarikat').val());
        form.append('alamatsyarikat1',$('#alamatsyarikat1').val());
        form.append('alamatsyarikat2',$('#alamatsyarikat2').val());
        form.append('poskod',$('#poskod').val());
        form.append('state5',$('#state5').val());
        form.append('districts5',$('#districts5').val());
        form.append('email',$('#email').val());
        form.append('no_tel',$('#no_tel').val());
        form.append('faks',$('#faks').val());

        $.ajax({
            url: "{{ route('projek.simpanPengawasan') }}",
            type: 'POST',
            data: form,
            success: function (data) {
                  // console.log(data);
                  if(data.status == 'success'){
                    swal.fire(data.title,data.message,data.status);
                    $('#pengawasanID').val('');
                    $('#kod_makmal').val('');
                    $('#no_tel_makmal').val('');
                    $('#nama_makmal').val('');
                    $('#alamat_makmal').val('');
                    $('#alamat_makmal1').val('');
                    $('#alamat_makmal2').val('');
                    $('#poskod_1').val('');
                    $('#state25').val('');
                    $('#districts25').val('');    
                    $("#jenisPengawasan").load("{{ url('/projek/getPengawasan/') }}/{{ $projekID }}/"+data.pengawasan.user_id);
                    if(data.pengawasan){
                        $('#btnSubmit').show();
                    }
                    // console.log(data.pengawasan.user_id);

                } else if(data.code == 422)  {
                  Swal.fire({
                    icon: 'error',
                    title: 'Sila Penuhkan Ruang Yang Diperlukan',
                    showConfirmButton: true,
                });
                  // table.api().ajax.reload(null, false);
                  let html = ``;
                  html += `<div class="alert alert-danger alert-dismissible fade show" id="alertmakmal">`;
                  html += `<button type="button" class="close" data-dismiss="alert"></button>`;
                  $.each(data.message, (key, value) => {
                    html += `<strong>&bull; ${value}</strong><br />`;
                });
                  html += `</div>`;
                  $(`#alertmakmal`).empty().append(html);
              }      
          },
          cache: false,
          contentType: false,
          processData: false
      });
    });

    $('#pengawasanID').on('change', function(){
        var value = $(this).val();

        if(value==6){
            $('#hide1').hide();
            $('#hide2').hide();
            $('#hide3').hide();
            $('#hide4').hide();
            $('#hide5').hide();
            $('#hide6').hide();
            $('#hide7').hide();
        }else if(value==7){
          $('#hide1').hide();
          $('#hide2').hide();
          $('#hide3').hide();
          $('#hide4').hide();
          $('#hide5').hide();
          $('#hide6').hide();
          $('#hide7').hide();
      }else if(value==8){
        $('#hide1').hide();
        $('#hide2').hide();
        $('#hide3').hide();
        $('#hide4').hide();
        $('#hide5').hide();
        $('#hide6').hide();
        $('#hide7').hide();
    }else if(value==9){
        $('#hide1').hide();
        $('#hide2').hide();
        $('#hide3').hide();
        $('#hide4').hide();
        $('#hide5').hide();
        $('#hide6').hide();
        $('#hide7').hide();
    }else{
        $('#hide1').show();
        $('#hide2').show();
        $('#hide3').show();
        $('#hide4').show();
        $('#hide5').show();
        $('#hide6').show();
        $('#hide7').show();

    }

})


    function  checkUser(projectId) {
        var username = $('#usernameemc').val();
        if (username == '') {
            $('#checkhide').css('display','none')
            $('input[name="officer_name"]').val('')
        }
        $.ajax({
            url: "{{ url('checkuseremc') }}"+'/'+username+'/'+projectId,
            method: "GET",

            success: function(response){
                console.log(response)
                if (response.success) {
                    $('#checkhide').css('display','block')
                    console.log(response);
                    $('input[name="officer_name"]').val(response.data.name)
                    $('input[name="syarikat"]').val(response.userDetails.alamatsyarikat)
                    $('input[name="alamatsyarikat"]').val(response.userDetails.alamatsyarikat1)
                    $('input[name="alamatsyarikat1"]').val(response.userDetails.alamatsyarikat2)
                    $('input[name="alamatsyarikat2"]').val(response.userDetails.name)
                    $('input[name="poskod"]').val(response.userDetails.poskod)
                    $('input[name="email"]').val(response.data.email)
                    $('input[name="no_tel"]').val(response.data.phone)
                    $("#jenisPengawasan").load("{{ url('/projek/getPengawasan/') }}/{{ $projekID }}/"+response.data.id)
                } else {
                    $('#checkhide').css('display','none')
                    $('input[name="officer_name"]').val('')
                }             
            },
            error: function(response){
                console.log(response);
            }
        });

    }
</script>
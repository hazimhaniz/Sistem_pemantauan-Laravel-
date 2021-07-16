<style type="text/css">

    label {
        font-family: 'Montserrat' !important;
        font-size: 10.5px !important;
    }
.textcolor {
      background-color : #d1d1d1 !important; 
}
    .hidden-xs {
        font-family: 'Montserrat' !important;
        font-size: 10.5px !important;

    }

    .btn {
        font-family: 'Montserrat' !important;
        font-size: 10.5px !important;
        s
    }

    .dashTitle {
        font-family: 'Montserrat' !important;
        font-size: 12.5px !important;
        letter-spacing: 0.06em !important;
        /* text-transform: uppercase !important; */
        font-weight: 500 !important;

    }

    th {
        background-color: #ebe8ec;
        color: #000 !important;
        //border-top: none;
        font-family: 'Montserrat' !important;
        font-size: 10.5px !important;
        letter-spacing: 0.06em !important;
        text-transform: uppercase !important;
        font-weight: 500 !important;
        //border-left: none !important;
        padding: 4px;
    }

    td {
        //background-color: #ebe8ec;
        color: #000 !important;
    
        //border-right: none !important;
        font-family: 'Montserrat' !important;
        font-size: 10.5px !important;
        letter-spacing: 0.06em !important;
   
        //font-weight: 500 !important;
        padding: 4px;
        text-align: center !important;
    }
    .modal-lg1 {
        max-width: 50% !important;
        width: 50% !important;
        margin: 0 auto !important; 
    }

</style>
<br>

<div class="row">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-6">
                <div class="dashTitle"><b>Maklumat Pendaftaran Projek</b>.</div>
                <br>

                <input class="projek" type="hidden" name="id" value="{{$ProjekDetail->id}}">

                <div class="form-group-attached m-b-10">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group form-group-default textcolor">
                                <label>
                                    <span><b class="text-dark">No.Fail JAS</b></span><span style="color:red;">*</span>
                                </label>
                                <input class="form-control projek blackink" name="no_fail_jas" id="no_fail_jas" type="text" value="{{$Projek->no_fail_jas}}" style="color: rgba(0, 0, 0, 0.75) !important;" readonly>
                            </div>
                            <input type="hidden" name="projek_id" value="{{$Projek->id}}" id="projek_id">

                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-group-default textcolor">
                                <label>
                                    <span><b class="text-dark">Nama Penggerak Jas</b></span><span
                                    style="color:red;">*</span>
                                </label>
                                <input class="form-control projek blackink" name="penggerak_projek" id="penggerak_projek" type="text" value="{{$Projek->user->name}}" style="color: rgba(0, 0, 0, 0.75) !important;" readonly>
                                
                            </div>


                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group form-group-default textcolor">
                                <label>
                                    <span><b class="text-dark">Nama Projek</b></span> <span style="color:red;">*</span>
                                </label>
                                <input class="form-control projek blackink" name="nama_projek" id="nama_projek" type="text" style="height: auto;color: rgba(0, 0, 0, 0.75) !important;" readonly required>{{$Projek->nama_projek}}</input>
                            </div>

                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group form-group-default textcolor">
                                <label>
                                    <span><b class="text-dark">Syarikat Penggerak Projek</b></span> <span
                                    style="color:red;">*</span>
                                </label>
                                <input class="form-control projek blackink" name="penggerak_projek" id="penggerak_projek" type="text" value="{{$Projek->jasfail->jasdetail->nama_penggerak}}" style="color: rgba(0, 0, 0, 0.75) !important;" readonly required>
                            </div>

                        </div>

                    </div>
                    <div class="row">

                        <div class="form-group form-group-default textcolor">
                            <label>
                                <span><b class="text-dark">Lokasi Projek</b></span><span style="color:red;">*</span>
                            </label>
                            <input class="form-control projek blackink" style="color: rgba(0, 0, 0, 0.75) !important;background-color: " name="lokasi" id="lokasi" type="text" value="{{$ProjekDetail->lokasi}}" readonly required>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-12">

                            <div class="form-group form-group-default textcolor">
                                <label>
                                    <span><b class="text-dark">Lokasi Projek 2</b></span>
                                </label>
                                <input class="form-control projek blackink" style="color: rgba(0, 0, 0, 0.75) !important;" name="lokasi1" id="lokasi1" type="text" value="{{$ProjekDetail->lokasi1}}" readonly>
                            </div>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">

                            <div class="form-group form-group-default textcolor">
                                <label>
                                    <span><b class="text-dark">Lokasi Projek 3</b></span>
                                </label>
                                <input class="form-control projek blackink" style="color: rgba(0, 0, 0, 0.75) !important;" name="lokasi2" id="lokasi2" type="text" value="{{$ProjekDetail->lokasi2}}" readonly>
                            </div>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group form-group-default textcolor">
                                <label>
                                    <span><b class="text-dark">Poskod</b></span><span style="color:red;">*</span>
                                </label>
                                <input class="form-control numeric postcode projek blackink" name="poskod" type="text" value="{{$ProjekDetail->poskod}}" style="color: rgba(0, 0, 0, 0.75) !important;" placeholder="Poskod" minlength="5" maxlength="5" readonly required>
                            </div>



                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-group-default textcolor">
                                <label>
                                    <span><b class="text-dark">Negeri</b></span><span style="color:red;">*</span>
                                </label>
                                <input class="form-control projek blackink" name="negeri" type="text" value="{{strtoupper(optional($ProjekDetail->state)->name)}}" style="color: rgba(0, 0, 0, 0.75) !important;" placeholder="Negeri" minlength="5" maxlength="5" readonly required>
                            </div>


                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">

                            <div class="form-group form-group-default textcolor">
                                <label>
                                    <span><b class="text-dark">Daerah</b></span><span style="color:red;">*</span>
                                </label>
                                <input class="form-control projek blackink" style="color: rgba(0, 0, 0, 0.75) !important;" name="negeri" type="text" value="{{optional($jasdetail)->daerah}}" placeholder="Daerah" minlength="5" maxlength="5" readonly required>
                            </div>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <div class="form-input-group">
                                    <label>
                                        <span><b class="text-dark">Tarikh Awal</b></span><span style="color:red;">*</span>
                                        <i class="fa fa-calendar"></i> </label>
                                        <input id="tarikh_mula" class="form-control datepicker " name="tarikh_mula" placeholder="" type="" value=""  required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-group-default">
                                    <div class="form-input-group">
                                        <label>
                                            <span><b class="text-dark">Tarikh Akhir</b></span><span style="color:red;">*</span>
                                            <i class="fa fa-calendar"></i></label>
                                            <input id="tarikh_akhir" class="form-control datepicker " name="tarikh_akhir" placeholder="" type="" value="" required>
                                        </div>
                                    </div>
                                </div>
                                
                                
                            </div>
                            
                        </div>
                        <br>
                        <div class="dashTitle"><b>Alamat Surat Menyurat</b>.</div>
                        <br>
                        <div class="form-group-attached m-b-10 address">
                            <div class="row">

                                <div class="form-group form-group-default">
                                    <label>
                                        <span><b class="text-dark">Alamat</b></span><span style="color:red;">*</span>
                                    </label>
                                    <input class="form-control projek1" name="alamat_surat" id="alamat_surat" type="text" value="{{$ProjekDetail->alamat_surat}}"  maxlength="100" required>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-12">

                                    <div class="form-group form-group-default">
                                        <label>
                                            <span><b class="text-dark">Alamat 2</b></span>
                                        </label>
                                        <input class="form-control projek1" name="alamat_surat1" id="alamat_surat1" type="text" value="{{$ProjekDetail->alamat_surat1}}"  maxlength="100">
                                    </div>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">

                                    <div class="form-group form-group-default ">
                                        <label>
                                            <span><b class="text-dark">Alamat 3</b></span>
                                        </label>
                                        <input class="form-control projek1" name="alamat_surat2" id="alamat_surat2" type="text" value="{{$ProjekDetail->alamat_surat2}}"  maxlength="100">
                                    </div>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group form-group-default">
                                        <label>
                                            <span><b class="text-dark">Poskod</b></span><span style="color:red;">*</span>
                                        </label>
                                        <input class="form-control numeric postcode projek1" id="surat_poskod" name="surat_poskod" aria-required="true" type="text" value="{{$ProjekDetail->surat_poskod}}" placeholder="Poskod" minlength="5" maxlength="5" required>
                                    </div>



                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-group-default">
                                        <label>
                                            <span><b class="text-dark">Negeri</b></span><span style="color:red;">*</span>
                                        </label>
                                        <select id="surat_negeri" name="surat_negeri" class="form-control autoscroll state projek1" data-init-plugin="select2" required style="width: 100%">
                                            <option value="" selected="" disabled="">Pilih Negeri</option>
                                            @foreach($states as $index => $state)
                                            <option value="{{ $state->id }}">{{ strtoupper($state->name) }}</option>
                                            @endforeach
                                        </select>

                                    </div>


                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">

                                    <div class="form-group form-group-default">
                                        <label>
                                            <span><b class="text-dark">Daerah</b></span><span style="color:red;">*</span>
                                        </label>
                                        <select id="surat_daerah" name="surat_daerah" class="form-control autoscroll district projek1" data-init-plugin="select2" style="width: 100%" required>
                                        </select>
                                    </div>

                                </div>
                            </div>
                            
                        </div>
                        
                    </div>
                    <div class="col-md-6">
                        <div class="dashTitle"><b>Ahli Projek</b></div>
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <div id="senaraiAhliProjek"></div>
                                <br>
                                <div class="form-group-attached m-b-10">
                                    <div class="row">
                                        <div class="col-md-12">

                                            <div class="form-group form-group-default">
                                                <label>
                                                    <span><b class="text-dark">Laporan Pematuhan EIA</b></span>
                                                </label>
                                                <div class="laporaneiaVal">
                                                    <select id="laporaneia" name="laporaneia" class="form-control full-width autoscroll projek required" data-init-plugin="select2" required style="width: 100%">
                                                        <option disabled hidden selected="" value="">Sila Pilih</option>
                                                        @foreach($pematuhaneia as $index => $pematuhan)
                                                        @if($ProjekDetail->laporaneia == $pematuhan->id)
                                                        <option value="{{$pematuhan->id}}" name="laporaneia" required selected="">{{ $pematuhan->name }}</option>
                                                        @else
                                                        <option value="{{$pematuhan->id}}" name="laporaneia" required>{{ $pematuhan->name }}</option>
                                                        @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="name" id="susun" class="col-md-4 control-label">
                                        <b>Jenis Pakej :</b>

                                    </label>
                                    <div class="col-md-8">
                                        <div class="">
                                            <div class="radio radio-primary">
                                                @foreach($jenisProjek as $index => $jenis)
                                                <input name="jenis_projek" value="{{$jenis->id}}" id="jenis_{{$jenis->id}}" type="radio" class="" aria-required="true">
                                                <label for="jenis_{{$jenis->id}}">{{$jenis->name}}</label>
                                                @endforeach
                                            </div>
                                        </div>



                                    </div>
                                </div>

                                <div class="row" id="tidakberfasa" style="display: none;">
                                    <div class="col-md-12">
                                        <div class="alert alert-primary" role="alert"
                                        style="background-color: #563D7C;color:white ;font-size:11.5px; font-family: 'Montserrat'">
                                        <strong>

                                            TIDAK BERFASA
                                        </strong>

                                    </div>
                                </div>



                                <div class="col-md-12">
                                    <label>
                                        <span><b class="text-dark">JENIS PENGAWASAN</b></span>
                                    </label>
                                </div>    

                                @foreach($Pengawasan as $awas)
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="checkbox check-primary">
                                            <input type="checkbox" name="pengawasan[]" value="{{ $awas->id }}" id="awas_{{ $awas->id }}" class="pengawasan">
                                            <label for="awas_{{ $awas->id }}"> {{ $awas->jenis_pengawasan }} </label>
                                        </div>
                                    </div>
                                </div>
                                @endforeach

                            </div>
                            <div class="row" id="fasa" style="display: none;">
                                <div class="col-md-12">

                                    <button type="button" class="dt-button buttons-html5 btn btn-default btn-sm pull-right"
                                    data-toggle="modal" data-target=".bd-example-modal-lg1">
                                    <span><i class="fa fa-plus"></i> FASA </span>
                                </button>

                            </div><br>

                            <div class="col-md-12">
                                <div class="alert alert-primary" role="alert"
                                style="background-color: #563D7C;color:white ;font-size:11.5px; font-family: 'Montserrat'">
                                <strong>FASA</strong>

                            </div>

                            <div class="table table-hover table-responsive dataTable no-footer display nowrap">
                                <table class="table m-b-10" id="tablePakej">
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th>Nama Kontraktor</th>
                                            <th class="bold">Negeri</th>
                                            <!-- <th>Alamat</th> -->
                                            <th class="bold">Tarikh Mula</th>
                                            <th class="bold">Tarikh Tamat</th>
                                            <th class="bold">Tindakan</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>


                    <br>
                </div>
            </div>

        </div>

    </div>
    <div class="row p-b-10">
        <div class="col-md-12">
            <ul class="pager wizard no-style">
                               <!--  <li class="">
                                    <button class="btn btn-success btn-cons from-left pull-right submitfasa" type="button">
                                        <span>Hantar</span>
                                    </button>
                                </li> -->
                                <li class=""> <!-- Note : Buang submit nanti letak balik INGAT!!!!-->
                                    <button class="btn btn-info btn-cons from-left pull-right simpanfasa" onclick="saveData()" type="button">
                                        <span>Simpan</span>
                                    </button>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>

            <div id="editFasaModal" class="modal fade bd-example-modal-lg1" role="dialog" aria-labelledby="editFasaModalLabel" aria-hidden="true">
                <div id="editFasaModalContent" class="modal-dialog modal-lg1">
                </div>
            </div>

            @push('js')

            <script type="text/javascript">

             function submitEditFasa(form_id){
      // console.log($(this).val());
      var fasaID = $('#fasaID').val(); 

      var formData = new FormData();
      formData.append('fasaID', $("#fasaID").val());
      formData.append('nama_pakej', $("#nama_pakej").val());
      formData.append('nama_kontraktor', $("#nama_kontraktor").val());
      formData.append('tarikh_mula_fasa', $("#tarikh_mula_fasa").val());
      formData.append('tarikh_akhir_fasa', $("#tarikh_akhir_fasa").val());
      formData.append('negeri', $("#negeri").val());
      formData.append('alamat', $("#alamat").val());
      formData.append('alamat1', $("#alamat1").val());
      formData.append('alamat2', $("#alamat2").val());


      $.ajax({
        url: "{{ url('/projek/edit-fasa') }}/" + fasaID,
        method: "post",
        data: formData,
        dataType: 'json',
        async: false,
        contentType: false,
        processData: false,
        success: function(data) {  
            alert('Maklumat sudah disimpan');    
            console.log(data);
            //tableAudit.api().ajax.reload(null, false);
                // tableAudit.dataTable(settingAudit);
            },
            error: function(data){
                alert('Maklumat gagal disimpan');   
                //console.log(data);
            }
        });
  }

  function  saveData() {
    var id = $('#projek_id').val();
    var start = $('#tarikh_mula').val();
    var end = $('#tarikh_akhir').val();
    if (start == '' || end == '') {
        alert('Please fill start and end dates');
        return;
    }
    $.ajax({
        url: "{{ url('/projek/savedate') }}" ,
        method: "post",
        data: {
            id : id,
            start : start,
            end:end
        },
        
        success: function(data) {  
            //console.log(data)
            alert(data.message);    
           
            },
            error: function(data){
                alert('Maklumat gagal disimpan');   
            }
        });
  }
</script>


@endpush
@push('js')

<script type="text/javascript">

    var tablePakej;
    $('body').on('change','input:radio[name=jenis_projek]',function(){

        var val = $('input:radio[name="jenis_projek"]:checked').val(); 
            // $('#tidakberfasa').show();

            if (val==1) {
                $('#tidakberfasa').show();
                $('#fasa').hide();
            }else{
                $('#fasa').show();
                $('#tidakberfasa').hide();
                // $('#nv_no').val('');
            }

        })

    function groupaktiviti(id){
        data = $('#groupaktivitidata').val();
        if(data == 0){
                // console.log('id');
                data = [];
            } else {
                // console.log('id1');
                data = [data];
            }
            // console.log(id);
            // console.log(data);
            data.push(id);
            document.getElementById("groupaktivitidata").value = data;
        }

        function testt(){
            // console.log('testing');
            tarikh_mula = $('#tarikh_mula').val();
            tarikh_akhir = $('#tarikh_akhir').val();
            if(tarikh_mula >= tarikh_akhir){
                $('#datecheckerror').show();
                var sijilkom = document.getElementById("tarikh_mula");
                sijilkom.classList.add("has-error");
            }else{
                $('#datecheckerror').hide();
                var sijilkom = document.getElementById("tarikh_akhir");
                sijilkom.classList.remove("has-error");
            }
        }

        function testt2(){
            // console.log('testing');
            // tarikh_mula = $('#tarikh_mula').val();
            // tarikh_akhir = $('#tarikh_akhir').val();
            // console.log(tarikh_mula);
            // if(tarikh_mula >= tarikh_akhir){
            //     $('#datecheckerror').show();
            //     var sijilkom = document.getElementById("datekom1");
            //     sijilkom.classList.add("has-error");
            // }else{
            //     $('#datecheckerror').hide();
            //     var sijilkom = document.getElementById("datekom1");
            //     sijilkom.classList.remove("has-error");
            // }
            var form = $('#daftar_fasa');
            var data = new FormData(form[0]);
            console.log(data);
            var mula = new Date(data.get("tarikh_mula_fasa"));

            var akhir = new Date(data.get("tarikh_akhir_fasa"));

            console.log(mula);
            if(akhir && mula){
                if (mula.getDate() >= akhir.getDate()) {
                    var element = document.getElementById("tarikh_mula_fasa");
                    // $('#tarikh_mulaerror').show();
                    element.classList.add("has-error");

                    var element1 = document.getElementById("tarikh_akhir_fasa");
                    element1.classList.add("has-error");
                } else {
                    var element = document.getElementById("tarikh_mula_fasa");
                    // $('#tarikh_mulaerror').hide();
                    element.classList.remove("has-error");

                    var element1 = document.getElementById("tarikh_akhir_fasa");
                    element1.classList.remove("has-error");
                }
            }
        }
    </script>
    <script type="text/javascript">

        function editfasa(id) {
            $("#modal-div").load("../projek/kemaskinifasa/"+id);
            $('.modal form').trigger("reset");
            $('.modal form').validate();
        }

        function removefasa(id) {

            $.ajax({
                url: 'buangFasa/'+id,
                method: 'get',
                dataType: 'json',
                async: true,
                contentType: false,
                processData: false,
                success: function(data) {
                    swal(data.title, data.message);
                    tableFasa.api().ajax.reload(null, false);
                }
            });
                // swal({
                //         title: "",
                //         text: "Data yang telah dipadam tidak boleh dikembalikan. Teruskan?",
                //         type: "",
                //         showCancelButton: true,
                //         confirmButtonClass: "btn-outline green-meadow",
                //         cancelButtonClass: "btn-danger",
                //         confirmButtonText: "Ya",
                //         cancelButtonText: "Tidak",
                //         closeOnConfirm: true,
                //         closeOnCancel: true,
                //         showLoaderOnConfirm: true
                //     },
                //     function(isConfirm) {
                //         if (isConfirm) {

                //         }
                //     });
            }

        // $(function() {

            var table = $('#tablePakej');

            var settings = {
                "processing": true,
                "serverSide": true,
                "deferRender": true,
                "bInfo" : false,
                "searchable": false,
                "ajax": "{{ route('projek.daftar_projek') }}",
                "columns": [
                { data: "nama_pakej", name: "nama_pakej", defaultContent: "-", "searchable": false, render: function(data, type, row){
                    return $("<div/>").html(data).text();
                }},

                { data: "kontraktor", name: "kontraktor", defaultContent: "-", "searchable": false, render: function(data, type, row){
                    return $("<div/>").html(data).text();
                }},
                { data: "negeri", name: "negeri", defaultContent: "-", "searchable": false, render: function(data, type, row){
                    return $("<div/>").html(data).text();
                }},
                    // { data: "alamat", name: "alamat", defaultContent: "-", "searchable": false, render: function(data, type, row){
                    //         return $("<div/>").html(data).text();
                    //     }},
                    { data: "tarikh_mula", name: "tarikh_mula", defaultContent: "-", "searchable": false, render: function(data, type, row){
                        return $("<div/>").html(data).text();
                    }},
                    { data: "tarikh_akhir", name: "tarikh_akhir", defaultContent: "-", "searchable": false, render: function(data, type, row){
                        return $("<div/>").html(data).text();
                    }},
                    { data: "action", name: "action", orderable: false, searchable: false},
                    ],
                    "columnDefs": [
                    { className: "nowrap", "targets": [ 5 ] }
                    ],
                    "sDom": "B<t><'row'<p i>>",
                    "buttons": [
                    ],
                    "destroy": true,
                    "scrollCollapse": true,
                    "oLanguage": {
                        "sEmptyTable":      "Tiada data",
                        "sInfo":            "Paparan dari _START_ hingga _END_ dari _TOTAL_ rekod",
                        "sInfoEmpty":       "Paparan 0 hingga 0 dari 0 rekod",
                        "sInfoFiltered":    "(Ditapis dari jumlah _MAX_ rekod)",
                        "sInfoPostFix":     "",
                        "sInfoThousands":   ",",
                        "sLengthMenu":      "Papar _MENU_ rekod",
                        "sLoadingRecords":  "Diproses...",
                        "sProcessing":      "Sedang diproses...",
                        "sSearch":          "Carian:",
                        "sZeroRecords":      "Tiada padanan rekod yang dijumpai.",
                        "oPaginate": {
                            "sFirst":        "Pertama",
                            "sPrevious":     "Sebelum",
                            "sNext":         "Seterusnya",
                            "sLast":         "Akhir"
                        },
                        "oAria": {
                            "sSortAscending":  ": diaktifkan kepada susunan lajur menaik",
                            "sSortDescending": ": diaktifkan kepada susunan lajur menurun"
                        }
                    },
                    "iDisplayLength": 10
                };

                table.dataTable(settings);
              
            

            $("#daftar_fasa").submit(function(e) {
                e.preventDefault();
                var form = $(this);

                if(!form.valid())
                    return;

                var data = new FormData(form[0]);
                var mula = new Date(data.get("tarikh_mula"));
                var akhir = new Date(data.get("tarikh_akhir"));
                if (mula.getTime() > akhir.getTime()) {
                    var element = document.getElementById("tarikh_mulaer");
                    $('#tarikh_mulaerror').show();
                    element.classList.add("has-error");

                    var element1 = document.getElementById("tarikh_akhirer");
                    element1.classList.add("has-error");
                }
                // return false;
                $.ajax({
                    url: form.attr('action'),
                    method: form.attr('method'),
                    data: new FormData(form[0]),
                    dataType: 'json',
                    async: true,
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        state = data.state;
                        states = '';
                        states_ = '';
                        state.forEach(function(item){
                            states = '<option value="'+item.id+'">'+item.name+'</option>';
                            states_ = states_ + states;

                        });
                        alert(data.message);
                        // console.log(states_);
                        $('#pakej_negeri').empty().append('<option value="" selected="" disabled="">Pilih Negeri</option>'+states_);
                        // $("#modal-add-pakej").modal("hide");
                        // swal(data.title, data.message);
                        table.api().ajax.reload(null, false);
                    },
                    error: function(e){
                        console.log(e.responseJSON.errors.pakej_negeri);
                        if (!e.responseJSON.errors.pakej_negeri) {
                            var element = document.getElementById("selectnegeri");
                            $('#selectnegerierror').show();
                            element.classList.add("has-error");
                        }
                    }
                });
                // swal({
                //     title: "",
                //     text: "Adakah anda pasti ?",
                //     type: "",
                //     showCancelButton: true,
                //     confirmButtonClass: "btn-outline green-meadow",
                //     cancelButtonClass: "btn-danger",
                //     confirmButtonText: "Tidak",
                //     cancelButtonText: "Ya",
                //     // closeOnConfirm: true,
                //     // closeOnCancel: false,
                //     showLoaderOnConfirm: true,
                // },
                // function(isConfirm) {
                //     if (isConfirm) {
                //         swal.close()
                //     } else {

                //     }
                // });
            });

        // }

   function removepakej(id) {

    $.ajax({
        url: 'buangpakej/'+id,
        method: 'get',
        dataType: 'json',
        async: true,
        contentType: false,
        processData: false,
        success: function(data) {
            swal(data.title, data.message);
            table.api().ajax.reload(null, false);
        }
    });

                // swal({
                //         title: "",
                //         text: "Data yang telah dipadam tidak boleh dikembalikan. Teruskan?",
                //         type: "",
                //         showCancelButton: true,
                //         confirmButtonClass: "btn-outline green-meadow",
                //         cancelButtonClass: "btn-danger",
                //         confirmButtonText: "Ya",
                //         cancelButtonText: "Tidak",
                //         closeOnConfirm: true,
                //         closeOnCancel: true,
                //         showLoaderOnConfirm: true
                //     },
                //     function(isConfirm) {
                //         if (isConfirm) {

                //         }
                //     });
            }

            function pengawasan(id) {
                $("#modal-div").load("pakej_pengawasan/"+id);
            }
        // });

        $(".address .postcode").on('change', function() {
            console.log('here');
            parent = $(this).parents('.address');
            $.ajax({
                url: "{{ url('general/postcode-state') }}/"+$(this).val(),
                type: 'GET',
                datatype: 'json',
                success: function(data){
                    console.log(data.state.id);
                    parent.find('.state').val(data.state.id).trigger('change');
                    setTimeout(function() {
                        parent.find('.district').val(data.id).trigger('change');
                    }, 1000);

                },
                error: function(xhr, ajaxOptions, thrownError){
                    console.log(thrownError);
                }
            });
        });

        $(".address .state").on('change', function() {
            list = $(this).parents('.address').find('.district');
            list.empty();
            list.append("<option disabled selected hidden value=''>Pilih Daerah...</option>");

            $.ajax({
                url: "{{ url('general/state-district') }}/"+$(this).val(),
                type: 'GET',
                datatype: 'json',
                success: function(data){
                    $.each(data, function(key, district) {
                        list.append("<option value='" + district.district_id +"'>" + district.name + "</option>");
                    });
                },
                error: function(xhr, ajaxOptions, thrownError){
                    console.log(thrownError);
                }
            });

            list2 = $(this).parents('.address').find('.bandar');
            list2.empty();
            list2.append("<option disabled selected hidden value=''>Pilih Bandar...</option>");

            $.ajax({
                url: "{{ url('general/state-city') }}/"+$(this).val(),
                type: 'GET',
                datatype: 'json',
                success: function(data){
                    $.each(data, function(key, district) {
                        list2.append("<option value='" + district.id +"'>" + district.name + "</option>");
                    });
                },
                error: function(xhr, ajaxOptions, thrownError){
                    console.log(thrownError);
                }
            });
        });

        $("#laporaneia").on('change', function() {
            $('#laporaneia').parents('div.form-group').removeClass('has-error');
        });

        $(".address .state").on('change', function() {
            $('.jenisN').parents('div.form-group').removeClass('has-error');
        });

        function checkeoemc(){
            $('form#projek').submit();
            // $.ajax({
            //     url: "{{ route('pakejeoemc') }}",
            //     method: 'post',
            //     data: {id:'{{$ProjekDetail->projek_id}}'},
            //     success: function(data) {
            //         if (data.error == 'error') {
            //             swal(data.title, data.message);
            //         } else {
            //             console.log('ada data');
            //         }
            //     }
            // });
        }

        function edit(id){
            $.ajax({
                url: "editpakej/"+id,
                method: 'get',
                success: function(data) {
                    console.log(data.projekPakej);
                }
            });
        }

        @if($ProjekDetail->surat_negeri)
        $("#surat_negeri").val( {{ $ProjekDetail->surat_negeri }} ).trigger('change');
        @endif

        @if($ProjekDetail->surat_daerah)
        // setTimeout(function() {
            $("#surat_daerah").val( {{ $ProjekDetail->surat_daerah }} ).trigger('change');
        // }, 1000);
        @endif

        // @if($ProjekDetail->aktiviti)
        // $("#aktiviti").val( {{ $ProjekDetail->aktiviti }} ).trigger('change');
        // @endif

        @if($ProjekDetail->laporaneia)
        $("#laporaneia").val( {{ $ProjekDetail->laporaneia }} ).trigger('change');
        @endif

        @if($ProjekDetail->surat_bandar)
        $("#surat_bandar").val( {{ $ProjekDetail->surat_bandar }} ).trigger('change');
        @endif

        // $('#aktiviti').on('change', function() {
        //     var val = this.value;
        //   // alert( this.value );
        //     if(val==22){
        //         // document.getElementById('other_aktiviti').style.display = 'block';
        //         $('#other_aktiviti').show();
        //     }else{
        //         $('#other_aktiviti').hide();
        //     }
        // });

        // if ($("#aktiviti option:selected").val() == 22) {
        //     $('#other_aktiviti').show();
        // }else{
        //     $('#other_aktiviti').hide();
        // }

        // $("#laporaneia_{{ $ProjekDetail->laporaneia }}").prop('checked', true).trigger('change');

        // $("#jenis_{{ $ProjekDetail->jenis_projek }}").prop('checked', true).trigger('change');

    </script>

    <script type="text/javascript">
        $(document).ready(function(){
            $("#senaraiAhliProjek").load('{{ url('/projek/senarai_ahli') }}/{{ $Projek->id }}');

            $("input[name='jenis_projek'], input[name='pengawasan[]']").on('change', function(){

                var projek_id = "{{ $Projek->id }}";
                var jenis_projek = $("input[name='jenis_projek']:checked").val();
                var pengawasan = [];
                $("input[name='pengawasan[]']:checked").each(function(){
                    pengawasan.push($(this).val());
                });

                var formData = new FormData();
                formData.append('projek_id', projek_id);
                formData.append('jenis_projek', jenis_projek);
                formData.append('pengawasan', pengawasan);

                $.ajax({
                    url: "{{ url('/projek/projek-fasa') }}",
                    method: "post",
                    data: formData,
                    async: false,
                    contentType: false,
                    processData: false,
                    success: function(data){
                        console.log(data);
                        // refresh table senarai pakej
                        // tablePakej.api().ajax.reload(null, false);
                    },
                    error: function(data){
                        console.log(data);
                    }
                });
            });
        });
    </script>

    <script type="text/javascript">
        var editFasaModal;
        $(document).ready(function(){
            editFasaModal = function(fasaID)
            {
                console.log(fasaID);
                $("#editFasaModalContent").load("{{ url('/projek/edit-fasa') }}/" + fasaID);
                $("#editFasaModal").modal('show');

            }
        });
    </script>
    @endpush



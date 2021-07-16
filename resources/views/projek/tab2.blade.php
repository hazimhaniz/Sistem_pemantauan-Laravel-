<style type="text/css">
  label {
    font-family: 'Montserrat' !important;
    font-size: 10.5px !important;
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
    
    color: #000 !important;
  
    font-family: 'Montserrat' !important;
    font-size: 10.5px !important;
    letter-spacing: 0.06em !important;
   
  
    padding: 4px;
    text-align: center !important;
  }
  .modal-lg1 {
    max-width: 50% !important;
    width: 50% !important;
    margin: 0 auto !important; 
  }

  .title{
    font-weight: 500 !important;
    font-size: 14.5px !important;
    font-family: 'Montserrat' !important;  
  }

</style>


<div class="row">
  <div class="col-md-12">
    <div class="title"><b>MAKLUMAT (EMP)</b></div>
    <br>
    <div class="dashTitle"><b>Tambah Maklumat EMP</b>.</div>

    <br>

    <form id='EMP' role="form" method="post" action="{{ route('EMP') }}">
     {{ csrf_field() }}

     <div class="form-group-attached m-b-12">
      <div class="row">

        <div class="col-md-4">
          <div class="form-group form-group-default">
            <div class="form-input-group">
              <label>
                <span><b class="text-dark">Tarikh Kelulusan EMP</b></span><span style="color:red;">*</span>
                <i class="fa fa-calendar"></i></label>
                <input   id="tarikh_kelulusan" class="form-control datepicker" name="tarikh_kelulusan" required="" type="" value="" oninput="checkdateemp()">
              </div>
            </div>
          </div>

          <div class="col-md-4">
            <div class="form-group form-group-default">
              <div class="form-input-group">
                <label>
                  <span><b class="text-dark">No.Rujukan</b></span>
                  <span style="color:red;">*</span>
                  <input id="No_Rujukan" class="form-control " name="No_Rujukan" placeholder="" maxlength="100" onkeypress="" required="" type="text" value="">
                </label>
              </div>
            </div>
          </div>

          <div class="col-md-4">
            <div class="form-group form-group-default">
              <div class="form-input-group">
                <label>
                  <span><b class="text-dark">Nama Perunding</b></span><span style="color:red;">*</span>
                </label>
                <input id="jururunding" class="form-control " name="jururunding" placeholder="" onkeypress="" maxlength="150" required="" type="text" value="">
              </div>
            </div>
          </div>

        </div>
      </div>


      <div class="form-group-attached m-b-12">
        <div class="row">
          <div class="col-md-12">
            <div class="form-group form-group-default">
              <div class="form-input-group">
                <label>
                  <span><b class="text-dark">Nama Laporan EMP</b></span><span style="color:red;">*</span>
                </label>
                <input id="laporan" class="form-control " name="laporan" placeholder="" onkeypress="" required="" type="text" maxlength="300" value="">
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-12 p-t-20">
          <ul class="pager wizard no-style">
            <li class="">
              <button 
              class="btn btn-success btn-cons from-left pull-right " onclick="submitFormEMP('EMP')" type="button">
              <span>Hantar</span>
            </button>
          </li>
        </ul>
      </div>
    </div>

  </form>

  <!-- start table emp -->
  <br>
  <div class="dashTitle"><b>Maklumat Pendaftaran EMP</b>.</div>
  <table class="table table-bordered" id="tableEMP" style="width: 100%">
    <thead>
      <tr>
        <th>Nama Laporan EMP</th>
        <th>Tarikh Kelulusan EMP</th>
        <th>Nama Jururunding</th>
        <th>No Rujukan</th>
        <th>Tindakan</th>
      </tr>
    </thead>
  </table>
  <!-- end table emp -->

  <br><br>
  <!-- START LDP2M2 -->
  <form id='LDP2M2' role="form" method="post" action="{{ route('LDP2M2') }}">
    {{ csrf_field() }}
    <div class="title"><b>MAKLUMAT LAND DISTURBING POLLUTION PREVENTION & MITIGATION MEASURE (LDP2M2)</b></div>

    <br>
    <div class="dashTitle"><b>Tambah Maklumat LDP2M2</b>.</div>

    <br>
    <div class="form-group-attached m-b-12">

      <div class="row">
        <div class="col-md-4">
          <div class="form-group form-group-default">
            <div class="form-input-group">
              <label>
                <span><b class="text-dark">Nama Dokumen LDP2M2</b></span>
                <span style="color:red;">*</span>
              </label>
              <input id="nama" class="form-control " name="nama" placeholder="" onkeypress="" required="" type="text" value="" maxlength="150">
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group form-group-default">
            <div class="form-input-group">
              <label>
                <span><b class="text-dark">Tarikh Kelulusan LDP2M2</b></span><span style="color:red;">*</span>
                <i class="fa fa-calendar"></i> 
              </label>
              <input id="tarikh_kelulusanldp" class="form-control" name="tarikh_kelulusan" placeholder="" required="" type="" value="" oninput="checkdateldp()">
            </div>
          </div>
        </div>

        <div class="col-md-4">
          <div class="form-group form-group-default">
            <div class="form-input-group">
              <label>
                <span><b class="text-dark">No.Rujukan</b></span><span style="color:red;">*</span>
              </label>
              <input id="no_plan_diluluskan" class="form-control " name="no_plan_diluluskan" placeholder="" onkeypress="" required="" type="text" value="" maxlength="150">
            </div>
          </div>
        </div>

      </div>



      <div class="row">
        <div class="input-group file-caption-main">
          <div class="file-caption form-control  kv-fileinput-caption icon-visible" tabindex="500">
            <span class="file-caption-icon"><i class="fa fa-file kv-caption-icon"></i> </span>

          </div>
          <div class="input-group-btn input-group-append">

            <div tabindex="500" class="btn btn-primary btn-file"><i class="fa fa-folder-open"></i> 
              <span class="hidden-xs">Muat Naik</span>
              <!--  <input id="input-ke-salinan" name="input-ke-salinan[]" type="file" multiple=""> -->
              <input type="file" class="ldp2m2" id="dokumen" name="dokumen" data-allowed-file-extensions="pdf" data-max-file-size="10M"/>
            </div>
          </div>
        </div>
      </div>

    </div>
    <div class="row">
      <div class="col-md-12 p-t-20">
        <ul class="pager wizard no-style">
          <li class="">
            <button 
            class="btn btn-success btn-cons from-left pull-right " type="submit">
            <span>Hantar</span>
          </button>
        </li>
      </ul>
    </div>
  </div>
</form>
<!-- START TABLE LDP2M2 -->
<br>
<div class="dashTitle"><b>Maklumat LDP2M2</b>.</div>
<table class="table table-hover table-bordered" id="tableLDP2M2" style="width: 100%">
  <thead>
    <tr>
      <th>Nama Dokumen LDP2M2</th>
      <th>Tarikh Kelulusan LDP2M2</th>
      <th>No Rujukan</th>
      <th>Dokumen</th>
      <th>Tindakan</th>
    </tr>
  </thead>
</table>
<!-- end TABLE LDP2M2 -->

<div class="row p-b-10">
  <div class="col-md-12">
    <ul class="pager wizard no-style">
     <!--  <li class="submit">
        <button class="btn btn-success btn-cons from-left pull-right submitProjek" type="button">
          <span>Hantar</span>
        </button>
      </li> -->
     <!--  <li class="submit">
        <button class="btn btn-info btn-cons from-left pull-right simpanProjek" type="button">
          <span>Simpan</span>
        </button>
      </li> -->
      <li class=""> <!-- Note : Buang submit nanti letak balik INGAT!!!!-->
        <button class="btn btn-info btn-cons from-left pull-right simpanfasa" type="button">
          <span>Simpan</span>
        </button>
      </li>
    </ul>
  </div>
</div>
</div>
</div>

@push('js')
<script type="text/javascript">

  function submitFormEMP(form_id){
    var emp_form = $('#EMP');

    var formData = new FormData();
    formData.append('tarikh_kelulusan', $("#tarikh_kelulusan").val());
    formData.append('No_Rujukan', $("#No_Rujukan").val());
    formData.append('jururunding', $("#jururunding").val());
    formData.append('laporan', $("#laporan").val());

    alert(emp_form);
    $.ajax({
      url: "{{ route('EMP') }}",
      method: "POST",
      // data: new FormData(emp_form[0]),
      data: formData,
      dataType: 'json',
      async: false,
      contentType: false,
      processData: false,
      success: function(data) {      
        console.log(data);
        tableEMP.api().ajax.reload(null, false);
      }
    });
  }

  $(function(){
    var dtToday = new Date();
    dtToday.setDate(dtToday.getDate() );

    var month = dtToday.getMonth() + 1;
    var day = dtToday.getDate();
    var year = dtToday.getFullYear();
    if(month < 10)
      month = '0' + month.toString();
    if(day < 10)
      day = '0' + day.toString();

    var maxDate = year + '-' + month + '-' + day;
    $('#tarikh_kelulusan').attr('max', maxDate);
  });

        // $("#tarikh_kelulusan").datepicker({
        //     dateFormat: "dd-mm-yy"
        //     ,minDate: 0
        // }).change(function() {
        //     var date1 = $('#tarikh_kelulusan').datepicker('getDate');
        //     var today = new Date();
        //     var dd = today.getDate();

        //     var mm = today.getMonth()+1; 
        //     var yyyy = today.getFullYear();
        //     if(dd<10) 
        //     {
        //         dd='0'+dd;
        //     } 

        //     if(mm<10) 
        //     {
        //         mm='0'+mm;
        //     } 

        //     todays = yyyy + '-'+ mm + '-' + dd;

        //     var givenDate = new Date(date1);

        //     var dd1 = givenDate.getDate();

        //     var mm1 = givenDate.getMonth()+1; 
        //     var yyyy1 = givenDate.getFullYear();
        //     if(dd1<10) 
        //     {
        //         dd1='0'+dd1;
        //     } 

        //     if(mm1<10) 
        //     {
        //         mm1='0'+mm1;
        //     } 

        //     dates = yyyy1+ '-'+ mm1 + '-' + dd1;


        //     console.log(todays);
        //     console.log(dates+ ' '+ 'select date');
        //     g1 = new Date(todays);
        //     g2 = new Date(dates);
        //     console.log(g1);
        //     console.log(g2);
        //     if(g2.getTime() >= g1.getTime()){
        //         $('#datecheckemperror').show();
        //         // $('#datekomerror').show();
        //         var sijilkom = document.getElementById("datekom");
        //         sijilkom.classList.add("has-error");
        //     }else{
        //         $('#datecheckemperror').hide();
        //         var sijilkom = document.getElementById("datekom");
        //         sijilkom.classList.remove("has-error");
        //         // alert('Given date is not greater than the current date.');
        //     }
        // });

      /*  function addEMP() {
            // $("#modal-add-EMP").modal("show");
            $('#modal-add-EMP').modal({
                backdrop: 'static',
                keyboard: false
            });
            $('.modal form').trigger("reset");
            $('.modal form').validate();
        }

        function editEMP() {
            // $("#modal-edit-EMP").modal("show");
            $('#modal-edit-EMP').modal({
                backdrop: 'static',
                keyboard: false
            });

          }*/

        // $(function(){
          $("#EMP").submit(function(e) {
            alert($(this));
            e.preventDefault();
            var form = $(this);
               // var data = new FormData(form[0]);
                // var tarikh = new Date(data.get("tarikh_kelulusan"));
                // var today = new Date();

                // if(tarikh.getTime() >= today.getTime()){
                //     $('#datecheckemperror').show();
                //     // $('#datekomerror').show();
                //     var sijilkom = document.getElementById("datekom");
                //     sijilkom.classList.add("has-error");
                // }else{
                //     $('#datecheckemperror').hide();
                //     var sijilkom = document.getElementById("datekom");
                //     sijilkom.classList.remove("has-error");
                //     // alert('Given date is not greater than the current date.');
                // }

                // if (today <= tarikh) {
                //     swal('Perhatian','Pastikan Tarikh Kelulusan tidak melebihi tarikh hari ini.');
                //     return false;
                // }
                if(!form.valid())
                  return;

                $.ajax({
                  url: form.attr('action'),
                  method: form.attr('method'),
                  data: new FormData(form[0]),
                  dataType: 'json',
                  async: false,
                  contentType: false,
                  processData: false,
                  success: function(data) {
                        //$("#modal-add-EMP").modal("hide");
                        //alert(data.message);
                        
                        tableEMP.api().ajax.reload(null, false);
                      }
                    });
              });

          var tableEMP = $('#tableEMP');

          var settingEMP = {
            "processing": true,
            "serverSide": true,
            "deferRender": true,
            "bInfo" : false,
            "searchable": false,
            "ajax": "{{ route('getEMP', $Projek->id) }}",
            "columns": [
            { data: "laporan", name: "laporan", defaultContent: "-", "searchable": false, render: function(data, type, row){
              return $("<div/>").html(data).text();
            }},
            { data: "tarikh_kelulusan", name: "tarikh_kelulusan", defaultContent: "-", "searchable": false, render: function(data, type, row){
              return $("<div/>").html(data).text();
            }},
            { data: "jururunding", name: "jururunding", defaultContent: "-", "searchable": false, render: function(data, type, row){
              return $("<div/>").html(data).text();
            }},
            { data: "no_rujukan", name: "no_rujukan", defaultContent: "-", "searchable": false, render: function(data, type, row){
              return $("<div/>").html(data).text();
            }},
            { data: "action", name: "action", orderable: false, searchable: false},
            ],
            "columnDefs": [
            { className: "nowrap", "targets": [ 3 ] }
            ],
            "sDom": "B<t><'row'<p i>>",
            "buttons": [
                    // {
                    //     text: '<i class="fa fa-print m-r-5"></i> Cetak',
                    //     extend: 'print',
                    //     className: 'btn btn-default btn-sm',
                    //     exportOptions: {
                    //         columns: ':visible:not(.nowrap)'
                    //     }
                    // },
                    // {
                    //     text: '<i class="fa fa-download m-r-5"></i> Excel',
                    //     extend: 'excelHtml5',
                    //     className: 'btn btn-default btn-sm',
                    //     exportOptions: {
                    //         columns: ':visible:not(.nowrap)'
                    //     }
                    // },
                    // {
                    //     text: '<i class="fa fa-download m-r-5"></i> PDF',
                    //     extend: 'pdfHtml5',
                    //     className: 'btn btn-default btn-sm',
                    //     exportOptions: {
                    //         columns: ':visible:not(.nowrap)'
                    //     }
                    // },
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

                  tableEMP.dataTable(settingEMP);
    // });

    function removeEmp(id) {

      $.ajax({
        url: 'buangemp/'+id,
        method: 'get',
        dataType: 'json',
        async: true,
        contentType: false,
        processData: false,
        success: function(data) {
          swal(data.title, data.message);
          tableEMP.api().ajax.reload(null, false);
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
            </script>
            @endpush

            @push('js')

            <script type="text/javascript">
        // $('.dropify').dropify();
        // $(function(){
        //     var dtToday = new Date();
        //     dtToday.setDate(dtToday.getDate() );

        //     var month = dtToday.getMonth() + 1;
        //     var day = dtToday.getDate();
        //     var year = dtToday.getFullYear();
        //     if(month < 10)
        //         month = '0' + month.toString();
        //     if(day < 10)
        //         day = '0' + day.toString();

        //     var maxDate = year + '-' + month + '-' + day;
        //     $('#tarikh_kelulusanldp').attr('max', maxDate);
        // });

        // $('.dropify').dropify({
        //     messages: {
        //         'default': 'Hanya dalam bentuk PDF yang di benarkan dengan size tidak melebihi 10MB.',
        //         'replace': 'Gantikan',
        //         'remove':  'Padam',
        //         'error':   'File ini tidak dibenarkan.'
        //     }
        // });

        // function addLDP2M2() {
        //     // $("#modal-add-LDP2M2").modal("show");
        //     $('#modal-add-LDP2M2').modal({
        //         backdrop: 'static',
        //         keyboard: false
        //     });
        //     $('.modal form').trigger("reset");
        //     $('.modal form').validate();
        // }

        // function editLDP2M2() {
        //     // $("#modal-edit-LDP2M2").modal("show");
        //     $('#modal-edit-LDP2M2').modal({
        //         backdrop: 'static',
        //         keyboard: false
        //     });
        // }

        // $(function(){
          $("#LDP2M2").submit(function(e) {
            e.preventDefault();
            var form = $(this);

                // var data = new FormData(form[0]);
                // var tarikh = new Date(data.get("tarikh_kelulusan"));
                // var today = new Date();

                // if(tarikh.getTime() >= today.getTime()){
                //     $('#datecheckldperror').show();
                //     // $('#datekomerror').show();
                //     var sijilkom = document.getElementById("datekomldp");
                //     sijilkom.classList.add("has-error");
                // }else{
                //     $('#datecheckldperror').hide();
                //     var sijilkom = document.getElementById("datekomldp");
                //     sijilkom.classList.remove("has-error");
                //     // alert('Given date is not greater than the current date.');
                // }

                // if (today <= tarikh) {
                //     swal('Perhatian','Pastikan Tarikh Kelulusan tidak melebihi tarikh hari ini.');
                //     return false;
                // }

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
                        // $("#modal-add-LDP2M2").modal("hide");
                        // swal(data.title, data.message);
                        tableLDP2M2.api().ajax.reload(null, false);
                      }
                    });
              });

          var tableLDP2M2 = $('#tableLDP2M2');

          var settingLDP2M2 = {
            "processing": true,
            "serverSide": true,
            "deferRender": true,
            "bInfo" : false,
            "searchable": false,
            "ajax": "{{ route('getLDP2M2', $Projek->id) }}",
            "columns": [
            { data: "nama", name: "nama", defaultContent: "-", "searchable": false, render: function(data, type, row){
              return $("<div/>").html(data).text();
            }},

            { data: "tarikh_kelulusan", name: "tarikh_kelulusan", defaultContent: "-", "searchable": false, render: function(data, type, row){
              return $("<div/>").html(data).text();
            }},
            { data: "no_plan_diluluskan", name: "no_plan_diluluskan", defaultContent: "-", "searchable": false, render: function(data, type, row){
              return $("<div/>").html(data).text();
            }},
            { data: "dokumen", name: "dokumen", defaultContent: "-", render: function(data, type, row){
              return $("<div/>").html(data).text();
            }},
            { data: "action", name: "action", orderable: false, searchable: false},
            ],
            "columnDefs": [
            { className: "nowrap", "targets": [ 4 ] }
            ],
            "sDom": "B<t><'row'<p i>>",
            "buttons": [
                    // {
                    //     text: '<i class="fa fa-print m-r-5"></i> Cetak',
                    //     extend: 'print',
                    //     className: 'btn btn-default btn-sm',
                    //     exportOptions: {
                    //         columns: ':visible:not(.nowrap)'
                    //     }
                    // },
                    // {
                    //     text: '<i class="fa fa-download m-r-5"></i> Excel',
                    //     extend: 'excelHtml5',
                    //     className: 'btn btn-default btn-sm',
                    //     exportOptions: {
                    //         columns: ':visible:not(.nowrap)'
                    //     }
                    // },
                    // {
                    //     text: '<i class="fa fa-download m-r-5"></i> PDF',
                    //     extend: 'pdfHtml5',
                    //     className: 'btn btn-default btn-sm',
                    //     exportOptions: {
                    //         columns: ':visible:not(.nowrap)'
                    //     }
                    // },
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

                  tableLDP2M2.dataTable(settingLDP2M2);


                  function removeLDP(id) {

                    $.ajax({
                      url: 'buangLDP2M2/'+id,
                      method: 'get',
                      dataType: 'json',
                      async: true,
                      contentType: false,
                      processData: false,
                      success: function(data) {
                        swal(data.title, data.message);
                        tableLDP2M2.api().ajax.reload(null, false);
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



        // });
      </script>
      @endpush

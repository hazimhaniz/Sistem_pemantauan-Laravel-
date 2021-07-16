@extends('layouts.app')
@include('plugins.datatables')
@section('content')
    <div class="senaraiprojek">
        <div class="" data-pages="parallax">
            <div class=" container-fluid container-fixed-lg sm-p-l-0 sm-p-r-0">
                <div class="inner">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Utama</a></li>
                        <li class="breadcrumb-item">Projek</li>
                        <li class="breadcrumb-item active">Senarai Pendaftaran Projek</li>
                    </ol>
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 ">
                            <div class="card card-transparent">
                                <div class="card-block p-t-0">
                                    <!-- <h3 class='m-t-0'>Senarai Pendaftaran Projek</h3>
                                    <p class="small hint-text m-t-5">
                                    <p class="hint-text">Maklumat Projek yang Didaftarkan di Bawah EIA</p> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class=" container-fluid container-fixed-lg bg-white">
            <div class="card card-transparent">
                <div class="card-header px-0">
                    <div class="pull-right">
                        <div class="col-xs-12">
                            <!-- <input type="text" id="search-table" class="form-control pull-right" placeholder="Carian..."> -->
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="card-block table-responsive">
                    <table class="table table-hover" style="width: 100%" id="table" border="1px">
                        <thead>
                        <tr>
                            <th class="fit bold">Bil.</th>
                            <th width="15%" class="bold">Nama Projek</th>
                            <th width="15%" class="bold">Lokasi Tapak Projek</th>
                            <!-- <th>Alamat Surat Menyurat</th>
                            <th>Tarikh Pendaftaran</th> -->
                            <th width="15%" class="bold">Status</th>
                            <th class="bold fit">Tindakan</th>
                        </tr>
                        </thead>
                        <tbody id="record_rows"></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
@push('js')
    <script type="text/javascript">

    function catatan(id){
      var url = "{{ route('projek.catatan',['id' => ":id"]) }}";
      url = url.replace('%3Aid', id);
      var urlString = url.replace(/&amp;/g, '&');
      // alert(urlString);
      $("#modal-div").load(urlString);
    }
        // $.getProjekList = function() {
        //     var jsonData = {
        //         '_token':$('meta[name="csrf-token"]').attr('content'),
        //         '_method':"GET"
        //     };

        //     var request = $.ajax({
        //         url: canvas_url+"api/projek/projekList",
        //         data: jsonData,
        //         type: 'GET',
        //         crossDomain:true,
        //         dataType:'json'
        //     });

        //     request.done(function(data) {

        //         if(data.status == 'success') {
        //             var projek = data.data;
        //             var current = projek.length;
        //             var resultDiv = '';

        //             for (var i = 0; i < current; i++) {
        //                 resultDiv += '<tr>\
        //                             <td width="80"><a href="'+canvas_url+'admin/user-detail?user_id='+users[i]['id']+'" target="_blank">' + users[i]['id'] + '</a></td>\
        //                             <td width="30"><img src="' + users[i]['picture'] + '" width="30px"></td>\
        //                             <td width="500" style="text-align: left;word-break:break-word"><strong>' + users[i]['name'] + '</strong>'+userrank+usergroup+moderator+is_testacount+summary+'<BR>Email: '+users[i]['email']+'<BR>Phone: '+users[i]['contact_number']+'<BR>Gender:'+users[i]['gender']+'<BR>Location: '+location+'<BR>Registered Platform: '+users[i]['platform_id']+'<BR>Reg Type: '+users[i]['account_type']+topiclist+'</td>\
        //                             \
        //                             <td width="250">' + users[i]['date'] + '</td>\
        //                             <td width="100">' + users[i]['status'] + '</td>\
        //                             <td width="450" style="text-align: left;word-break:break-word"> '+earning+' Questions : <a href="'+canvas_url+'admin/post-list?user_id='+users[i]['id']+'" target="_blank">' + users[i]['question_count'] + '</a> <BR> Total Answers : <a href="'+canvas_url+'admin/answer-list?user_id='+users[i]['id']+'" target="_blank">' + users[i]['answer_count'] + '</a> <BR> Qualify Answers : <a href="'+canvas_url+'admin/answer-list?user_id='+users[i]['id']+'" target="_blank">' + users[i]['qualify_answer'] + '</a> <BR> Disqualify Answers : <a href="'+canvas_url+'admin/answer-list?user_id='+users[i]['id']+'" target="_blank">' + users[i]['disqualify_answer'] + '</a> <BR> Followers : <a href="'+canvas_url+'admin/follower-list?user_id='+users[i]['id']+'" target="_blank"> ' + users[i]['follower'] + '</a> <BR> Following : <a href="'+canvas_url+'admin/following-list?user_id='+users[i]['id']+'" target="_blank"> ' + users[i]['following'] + ' </a><BR> Share View : ' + users[i]['share_count'] + '</td>\
        //                             <td>\
        //                                 <div class="dropdown" data-animation="flipInX,flipOutX">\
        //                                     <button type="button" class="btn btn-primary waves-effect waves-button waves-float" data-toggle="dropdown" aria-expanded="true">Action <i class="caret"></i></button>\
        //                                     <ul class="dropdown-menu flipInX animated pull-right">\
        //                                         <li><a href="#" class="delete-user" data-id="' + users[i]['id'] + '">Delete</a></li>\
        //                                         <li><a href="' + canvas_url + 'admin/user-detail?user_id=' + users[i]['id'] + '">View Profile</a></li>\
        //                                         '+ ban+earningreport +'\
        //                                     </ul>\
        //                                 </div>\
        //                             </td>\
        //                           </tr>';
        //             }

        //             $("#record_rows").html(resultDiv);
        //             $("body,html").animate({scrollTop: 0}, 800);
        //             $('[data-toggle="tooltip"]').tooltip();
        //             $("#Paging").show();
        //             document.getElementById("Paging").innerHTML = Paging('UsersListPage',start_limit,page,count,limit);

        //             $(".delete-user").bind("click", function () {
        //                 var id = $(this).attr('data-id');
        //                 swal({
        //                     title: "Are you sure?",
        //                     text: "You want to remove this User?",
        //                     
        //                     showCancelButton: true,
        //                     confirmButtonColor: "#DD6B55",
        //                     confirmButtonText: "Yes, delete it!",
        //                     closeOnConfirm: true
        //                 }, function(){
        //                     $.deleteUser(id,page);
        //                     swal("Done!", "User is deleted");
        //                 });
        //             });

        //             $(".ban-user").bind("click", function () {
        //                 var id = $(this).attr('data-id');
        //                 swal({
        //                     title: "Are you sure?",
        //                     text: "You want to ban this User?",
        //                     
        //                     showCancelButton: true,
        //                     confirmButtonColor: "#DD6B55",
        //                     confirmButtonText: "Yes, ban it!",
        //                     closeOnConfirm: true
        //                 }, function(){
        //                     $.banUser(id,"ban",page);
        //                     swal("Done!", "User is banned");
        //                 });
        //             });

        //             $(".unban-user").bind("click", function () {
        //                 var id = $(this).attr('data-id');
        //                 swal({
        //                     title: "Are you sure?",
        //                     text: "You want to unban this User?",
        //                     
        //                     showCancelButton: true,
        //                     confirmButtonColor: "#DD6B55",
        //                     confirmButtonText: "Yes, unban it!",
        //                     closeOnConfirm: true
        //                 }, function(){
        //                     $.banUser(id,"unban",page);
        //                     swal("Done!", "User is unbanned");
        //                 });
        //             });
        //         } else {
        //             $("#totalrec").html('0');
        //             $("#Paging").hide();
        //             $("#no_record").show();
        //         }

        //         request.fail(function(jqXHR, textStatus){
        //             $('#spinner').hide();
        //             $("#Paging").hide();
        //             $("#no_record").show();
        //         });
        //     });
        // }

        // if($('.senaraiprojek').length > 0)
        // {
        //     $.getProjekList();
        // }

        var table = $('#table');

        var settings = {
            "processing": true,
            "serverSide": true,
            "deferRender": true,
            "ajax": "{{ fullUrl() }}",
            "columns": [
            { data: 'index', defaultContent: '', orderable: false, searchable: false, render: function (data, type, row, meta) {
                return meta.row + meta.settings._iDisplayStart + 1;
            }},
            { data: "nama_projek", name: "nama_projek", orderable: false, searchable: false, defaultContent: "-", render: function(data, type, row){
                return $("<div/>").html(data).text();
            }},
            { data: "lokasi", name: "lokasi", orderable: false, searchable: false, defaultContent: "-", render: function(data, type, row){
                return $("<div/>").html(data).text();
            }},

            // { data: "syarikat", name: "syarikat", defaultContent: "-" },

            // { data: "detail", name: "detail", defaultContent: "-", render: function(data, type, row){
            //     return $("<div/>").html(data).text();
            // }},

            { data: "status", name: "status", orderable: false, searchable: false, defaultContent: "-",render: function(data, type, row){
                return $("<div/>").html(data).text();
            }},
            { data: "action", name: "action", orderable: false, searchable: false},
            ],
            "columnDefs": [
            { className: "nowrap", "targets": [ 4 ] }
            ],
            "sDom": "B<t><'row'<p i>>",
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





// search box for table
$('#search-table').keyup(function() {
    // console.log('search');
    table.fnFilter($(this).val());
});

// function hantar(id){
//             console.log('test id '+id);
//             swal({
//                 title: "Anda pasti?",
//                 text: "Borang akan dihantar",
//                 type: "info",
//                 showCancelButton: true,
//                 confirmButtonClass: "btn-outline green-meadow",
//                 cancelButtonClass: "btn-danger",
//                 confirmButtonText: "Ya",
//                 cancelButtonText: "Tidak",
//                 closeOnConfirm: true,
//                 closeOnCancel: true,
//                 showLoaderOnConfirm: true
//             },
//             function(isConfirm) {
//                 if (isConfirm) {
//                     $.ajax({
//                         url: '{{ route("submitProjekIO") }}',
//                         type: 'POST',
//                         data:{id:id},
//                         dataType: 'json',
//                         async: true,
//                         contentType: false,
//                         processData: false,
//                         success: function(response) {
//                             if (response.status1 == 'ok') {
//                                 swal({
//                                         title: "Selesai!",
//                                         text: "Maklumat projek telah dihantar. Pegawai JAS Negeri akan membuat semakan",
//                                         
//                                         showConfirmButton: true,
//                                         confirmButtonText: "Ya",
//                                     },
//                                     function() {
//                                         location.href = '{{ route('projek.senarai') }}';
//                                     });
//                             } else {
//                                 swal(response.title, response.message, response.status);
//                             }
//                         }
//                     });
//                 }
//             });
// }

    </script>
@endpush

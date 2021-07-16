<script type="text/javascript">
    let data = {
        jenis_pengawasan_id: 5
    };

    $('#stesenKolamDatatable').DataTable({
        'serverSide': true,
        'processing': true,
        'ordering': false,
        'searching': false,
        'info': false,
        'bLengthChange': false,
        'bPaginate': false,
        'language': {
            "emptyTable": "Tiada data"
        },
        ajax: {
            url: "{{ route('project.senarai.stesen',[$projek->id, $year, $month]) }}",
            method: 'GET',
            dataType: 'json',
            dataSrc: "data",
            data: data,
        },
        columns: [
            { 
                data: 'index',
                defaultContent: '', 
                orderable: false, 
                searchable: false, render: function (data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                }
            },
            { "data" : "stesen" },
            { "data" : "longitud" },
            { "data" : "latitud" },
        ],
        columnDefs: [
            {
            "targets": 4,
            "data": 'id',
            "render": function(id, type, full, meta) {

                let viewUrl = `{{ route('project.view.stesen.kolam.modal', 'data-id') }}`;
                let editUrl = `{{ route('project.edit.stesen.kolam.modal', 'data-id') }}`;
                let deleteUrl = `{{ route('project.delete.stesen.kolam.modal', 'data-id') }}`;
                let borangC = `{{ route('project.borangC.modal', ['id' => 'data-id']) }}`;
                let hantarStesen = `{{ route('project.hantar.stesen', 'data-id') }}`;
                let sahkanStesen = `{{ route('project.sahkan.stesen', 'data-id') }}`;

                viewUrl = viewUrl.replace('data-id', id);
                editUrl = editUrl.replace('data-id', id);
                deleteUrl = deleteUrl.replace('data-id', id);
                borangC = borangC.replace('data-id', id);
                hantarStesen = hantarStesen.replace('data-id', id);
                sahkanStesen = sahkanStesen.replace('data-id', id);
                
                let html = '';

                html += `<div>`;
                html += `<div>`;
                if("{{auth()->user()->entity_type }}" == 'App\UserPP' && (full.status == 603 || full.status == 606)) {
                    html += `<button data-action="${viewUrl}" class="btn btn-default btn-xs" type="button" onclick="getModalContent(this)" data-original-title="Sahkan"><span style="color:#000; font-family: 'Montserrat'; font-size: 10.5px; text-transform: uppercase; font-weight: 500;">
                    <i class="fa fa-folder text-success"></i> &nbsp; <span style="color:black;">Hantar</span>
                    </span></button>`;
                } else if ("{{auth()->user()->entity_type }}" == 'App\UserPP' && (full.status == 13)) {
                    html += `<button data-action="${viewUrl}" class="btn btn-default btn-xs" type="button" onclick="getModalContent(this)" data-original-title="Sahkan"><span style="color:#000; font-family: 'Montserrat'; font-size: 10.5px; text-transform: uppercase; font-weight: 500;">
                    <i class="fa fa-folder text-success"></i> &nbsp; <span style="color:black;">Semak</span>
                    </span></button>`;
                } else {
                    html += `<button data-action="${viewUrl}" class="btn btn-default btn-xs" type="button" onclick="getModalContent(this)" data-original-title="Lihat Data Permohonan"><span style="color:#fff"> <i class="fa fa-eye text-warning"></i></span></button>&nbsp;`;
                }
                if(("{{auth()->user()->entity_type }}" == 'App\UserEMC') && (full.status != 607)){
                    html += `<button data-action="${editUrl}" class="btn btn-default btn-xs" type="button" onclick="getModalContent(this)" data-original-title="Ubah Data Permohonan"><span style="color:#fff"> <i class="fa fa-pencil text-warning"></i></span></button>&nbsp;`;
                    html += `<button data-action="${deleteUrl}" class="btn btn-default btn-xs" type="button" onclick="btnDelete(this)" data-original-title="Padam Data Permohonan"><span style="color:#fff"> <i class="fas fa-trash text-danger"></i></span></button>&nbsp;`;
                }
                if("{{auth()->user()->entity_type }}" == 'App\UserEMC' && (full.status == 607)) {
                    if (full.monthly_c_status == 0 || full.monthly_c_status == 600) {
                        html += `<button data-action="${borangC}" class="btn btn-default btn-xs" type="button" onclick="getModalContent(this)" data-original-title="Borang C"><span style="color:#000; font-family: 'Montserrat'; font-size: 10.5px; text-transform: uppercase; font-weight: 500;">
                        <i class="fa fa-plus text-success"></i> &nbsp; <span style="color:black;">Borang C</span>
                        </span></button>`;
                    }
                }
                html += `</div>`;
                html += `</div>`;

                return html;
            }
        }]
    });

    $('#stesenKolamBorangCDatatable').DataTable({
        'serverSide': true,
        'processing': true,
        'ordering': false,
        'searching': false,
        'info': false,
        'bLengthChange': false,
        'bPaginate': false,
        'language': {
            "emptyTable": "Tiada data"
        },
        ajax: {
            url: "{{ route('project.senarai.borang-c', [$projek->id, $year, $month]) }}",
            method: 'GET',
            dataType: 'json',
            dataSrc: "data",
            data: data,
        },
        columns: [
            { 
                data: 'index',
                defaultContent: '', 
                orderable: false, 
                searchable: false, 
                render: function (data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                }
            },
            { "data" : "stesen" },
            { 
                "data" : "tarikh_pengsampelan",
                "render" : function(data, type, row, meta) {
                    return moment(row.tarikh_pengsampelan).format('DD/MM/YYYY');
                }
            },
        ],
        columnDefs: [
            {
            "targets": 3,
            "data": 'id',
            "render": function(id, type, full, meta) {
                
                let viewUrl = `{{ route('form.kolam.borang-c-view', 'data-id') }}`;
                // let deleteUrl = `{{ route('project.delete.borangc.kolam.modal', 'data-id') }}`;
                let editUrl = `{{ route('form.kolam.borang-c-create', 'data-id') }}`;
                let semakUrl = `{{ route('project.semak.borang-c', 'data-id') }}`;

                viewUrl = viewUrl.replace('data-id', full.detail_id);
                // deleteUrl = deleteUrl.replace('data-id', id);
                editUrl = editUrl.replace('data-id', full.detail_id);
                semakUrl = semakUrl.replace('data-id', full.id);
                
                let html = '';

                html += `<div>`;
                html += `<div>`;
                html += `<button data-action="${viewUrl}" class="btn btn-default btn-xs" type="button" onclick="getModalContent(this)" data-original-title="Ubah Data Permohonan"><span style="color:#fff"> <i class="fa fa-eye text-warning"></i></span></button>&nbsp;`;
                if("{{auth()->user()->entity_type }}" == 'App\UserEMC'){
                    html += `<button data-action="${editUrl}" class="btn btn-default btn-xs" type="button" onclick="getModalContent(this)" data-original-title="Ubah Data Permohonan"><span style="color:#fff"> <i class="fa fa-pencil text-warning"></i></span></button>&nbsp;`;
                    // html += `<button data-action="${deleteUrl}" class="btn btn-default btn-xs" type="button" onclick="btnDelete(this)" data-original-title="Padam Data Permohonan"><span style="color:#fff"> <i class="fas fa-trash text-danger"></i></span></button>&nbsp;`;
                }
                if("{{ auth()->user()->hasRole('eo') }}" && (full.status_id == 11)) {
                    html += `<button data-action="${viewUrl}" class="btn btn-default btn-xs" type="button" onclick="getModalContent(this)" data-original-title="Sahkan"><span style="color:#000; font-family: 'Montserrat'; font-size: 10.5px; text-transform: uppercase; font-weight: 500;">
                    <i class="fa fa-folder text-success"></i> &nbsp; <span style="color:black;">Semak</span>
                    </span></button>`;
                }
                if("{{ auth()->user()->hasRole('pp') }}" && (full.status_id == 13)) {
                    html += `<button data-action="${viewUrl}" class="btn btn-default btn-xs" type="button" onclick="getModalContent(this)" data-original-title="Sahkan"><span style="color:#000; font-family: 'Montserrat'; font-size: 10.5px; text-transform: uppercase; font-weight: 500;">
                    <i class="fa fa-folder text-success"></i> &nbsp; <span style="color:black;">Sahkan</span>
                    </span></button>`;
                }
                html += `</div>`;
                html += `</div>`;

                return html;
            }
        }]
    });

    btnDelete = (elem) => {
        processDeletion(elem)
    }

    hantarStesen = (elem) => {
        confirmCreate(elem).then((result) => {
            if (result.value) {
                Swal.fire({
                    title: 'Data sedang dikemaskini. Sila Tunggu Sebentar...',
                    onOpen: function() {
                        Swal.showLoading();
                        $.ajax({
                            url: elem.dataset.action,
                            method: 'put',
                            contentType: false,
                            processData: false,
                            success: function(response) {
                                if (response.success) {
                                    Swal.fire({
                                        icon: 'success',
                                        title: response.message,
                                        showConfirmButton: true,
                                    }).then(() => {
                                        $('#stesenKolamDatatable').DataTable().ajax.reload();
                                        $('#baseAjaxModalContent').modal("hide");
                                    });
                                }
                            },
                            fail: (response) => {
                                Swal.fire(
                                    'Ralat!',
                                    'Berlaku ralat, kami mohon maaf atas kesulitan.',
                                    'danger'
                                );
                            }
                        });
                    }
                });
            }
        });
    }

    semakBorangC = (elem) => {
        confirmCreate(elem).then((result) => {
            if (result.value) {
                Swal.fire({
                    title: 'Data sedang dikemaskini. Sila Tunggu Sebentar...',
                    onOpen: function() {
                        Swal.showLoading();
                        $.ajax({
                            url: elem.dataset.action,
                            method: 'put',
                            contentType: false,
                            processData: false,
                            success: function(response) {
                                if (response.success) {
                                    Swal.fire({
                                        icon: 'success',
                                        title: response.message,
                                        showConfirmButton: true,
                                    }).then(() => {
                                        $('#stesenKolamBorangCDatatable').DataTable().ajax.reload();
                                        $('#baseAjaxModalContent').modal("hide");
                                    });
                                }
                            },
                            fail: (response) => {
                                Swal.fire(
                                    'Ralat!',
                                    'Berlaku ralat, kami mohon maaf atas kesulitan.',
                                    'danger'
                                );
                            }
                        });
                    }
                });
            }
        });
    }
</script>
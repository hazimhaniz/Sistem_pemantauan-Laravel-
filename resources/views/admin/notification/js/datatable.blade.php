<script type="text/javascript">
    let baseUrl = "{{ route('admin.notification') }}";
    let createUrl = "{{ route('admin.notification.create') }}";

    $(document).ready(function() {
        $('#notificationDatatable').DataTable({
            // 'scrollX': true,
            // 'scrollY': '500px',
            'scrollCollapse': true,
            'pagingType': 'numbers',
            'serverSide': true,
            'processing': true,
            'ordering': false,
            'searching': false,
            'info': false,
            "bLengthChange": false,
            dom: '<"row"<"col-md-12"B>><"row"<"col-md-3"l><"col-md-6"><"col-md-3"f>>t<"row"<"col-md-6"i><"col-md-6"p>>',
            buttons: [
            ],
            ajax: {
                url: baseUrl,
                method: 'GET',
                dataType: 'json',
                dataSrc: "data",
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
                { "data" : "code" },
                { "data" : "name" },
                { 
                    "data" : "is_active_emel",
                    render: function (data, type, row, meta) {
                        if(row.is_active_emel) {
                            return 'Aktif';
                        } else {
                            return 'Tidak Aktif';
                        }
                    }
                },
            ],
            columnDefs: [{
                "targets": 4,
                "data": 'id',
                "render": function(id, type, full, meta) {
                    let showUrl = "{{ route('admin.notification.show', 'data-id') }}";
                    let editUrl = "{{ route('admin.notification.edit', 'data-id') }}";
                    let deleteUrl = "{{ route('admin.notification.destroy', 'data-id') }}";
                    let testsendUrl = "{{ route('admin.notification.send', 'data-id') }}";
                    let setActivationUrl = "{{ route('admin.notification.setactivationemel', 'data-id') }}";

                    showUrl = showUrl.replace('data-id', id);
                    editUrl = editUrl.replace('data-id', id);
                    deleteUrl = deleteUrl.replace('data-id', id);
                    testsendUrl = testsendUrl.replace('data-id', id);
                    setActivationUrl = setActivationUrl.replace('data-id', id);

                    let html = '';
                    html += '<div class="form-group">';
                    html += '<div class="btn-group" role="group">';
                    html += '<button type="button" data-action="' + showUrl + '" class="btn btn-icon text-info mt-1" onClick="getModalContent(this)"><i class="fa fa-search"></i></button>';
                    html += '<button type="button" data-action="' + editUrl + '" class="btn btn-icon text-primary mt-1" onClick="getModalContent(this)"><i class="fa fa-edit"></i></button>';
                    html += '<button type="button" data-action="' + deleteUrl + '" class="btn btn-icon text-danger mt-1" onClick="btnDelete(this)"><i class="fa fa-trash"></i></button>';
                    html += '<button type="button" data-action="' + testsendUrl + '" class="btn btn-icon text-warning mt-1" onClick="send('+ id +')" href="javascript:;"><i class="fa fa-arrow-right"></i></button>';
                    if (full.is_active_emel) {
                        html += '<button type="button" data-action="' + setActivationUrl + '" class="btn btn-icon btn-outline-warning mt-1" onClick="setactivationemel('+ id +',0)"><i class="fa fa-remove"></i></button>';
                    } else {
                        html += '<button type="button" data-action="' + setActivationUrl + '" class="btn btn-icon btn-outline-warning mt-1" onClick="setactivationemel('+ id +',1)"><i class="fa fa-check"></i></button>';
                    }
                    html += '</div>';
                    html += '</div>';

                    return html;
                }
            }]
        });

        confirmActivate = (elem) => {
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

        confirmDeactivate = (elem) => {
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

        confirmTestEmail = (elem) => {
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

        btnDelete = (elem) => {
            processDeletion(elem)
        }


        activate = (elem) => {
            confirmActivate(elem).then((result) => { 
                if(result.value) {
                    // 
                } else {
                    Swal.fire(
                        'Canceled',
                        'Process has been canceled',
                        'info'
                    )
                }
            })
        }

        deactivate = (elem) => {
            confirmDeactivate(elem).then((result) => { 
                if(result.value) {
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
                                        'Opps!',
                                        'An error occurred, we are sorry for inconvenience.',
                                        'danger'
                                    )
                                }
                            })
                        }
                    })
                } else {
                    Swal.fire(
                        'Canceled',
                        'Process has been canceled',
                        'info'
                    )
                }
            })
        }

        testEmail = (elem) => {
            confirmTestEmail(elem).then((result) => { 
                if(result.value) {
                    Swal.fire({
                        title: 'Emel sedang dihantar. Sila Tunggu Sebentar...',
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
                                        'Opps!',
                                        'An error occurred, we are sorry for inconvenience.',
                                        'danger'
                                    )
                                }
                            })
                        }
                    })
                } else {
                    Swal.fire(
                        'Canceled',
                        'Process has been canceled',
                        'info'
                    )
                }
            })
        }
    });

function setactivationemel(id,set_value){

    swal.fire({
        title: "Sahkan Tindakan",
        text: $('#notification_emel_'+id).attr('tindakan'),
        icon: "warning",
        buttons: {
            cancel: "Batal",
            confirm: {
                text: "Teruskan",
                value: "confirm",
                closeModal: false,
                className: "btn-info",
            },
        },
        dangerMode: true,
    })
    .then((confirm) => {
        if(confirm){
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '{{ route('admin.notification') }}/setactivationemel/'+id,
                method: 'POST',
                data: {id:id,set_value:set_value},
                dataType: 'json',
                success: function(data) {
                  swal.fire(data.title, data.message, data.status);
                }
            });
            $('#notificationDatatable').DataTable().ajax.reload();
        }
    });
}

function send(id) {
    $('.modal').modal('hide');
    $("#modal-div").load("{{ route('admin.notification') }}/send/"+id);
}
</script>
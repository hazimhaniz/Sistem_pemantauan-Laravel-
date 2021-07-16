<script type="text/javascript">
    let baseUrl = "{{ route('admin.letter') }}";

    $(document).ready(function() {
        $('#letterDatatable').DataTable({
            // 'scrollX': true,
            // 'scrollY': '500px',
            'scrollCollapse': true,
            'pagingType': 'full_numbers',
            'serverSide': true,
            'processing': true,
            'ordering': false,
            dom: '<"row"<"col-md-12"B>><"row"<"col-md-3"l><"col-md-6"><"col-md-3"f>>t<"row"<"col-md-6"i><"col-md-6"p>>',
            buttons: [
                'excel', 'pdf', 'colvis'
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
                { "data" : "receiver_user_id" },
                { "data" : "subject" },
            ],
            columnDefs: [{
                "targets": 3,
                "data": 'id',
                "render": function(id, type, full, meta) {
                    let showUrl = "{{ route('admin.letter.show', 'data-id') }}";
                    let editUrl = "{{ route('admin.letter.edit', 'data-id') }}";
                    // let deleteUrl = "{{ route('admin.letter.destroy', 'data-id') }}";

                    showUrl = showUrl.replace('data-id', id);
                    editUrl = editUrl.replace('data-id', id);
                    // deleteUrl = deleteUrl.replace('data-id', id);
                    
                    let html = '';
                    html += '<div class="form-group">';
                    html += '<div class="btn-group" role="group">';
                    html += '<button type="button" data-action="' + showUrl + '" class="btn btn-icon btn-outline-info mt-1" onClick="getModalContent(this)"><i class="fa fa-search"></i></button>';
                    html += '<button type="button" data-action="' + editUrl + '" class="btn btn-icon btn-outline-primary mt-1" onClick="getModalContent(this)"><i class="fa fa-edit"></i></button>';
                    // html += '<button type="button" data-action="' + deleteUrl + '" class="btn btn-icon btn-outline-danger mt-1" onClick="btnDelete(this)"><i class="fa fa-trash"></i></button>';
                    // html += '<button type="button" data-action="' + deleteUrl + '" class="btn btn-icon btn-outline-warning mt-1" onClick="testEmail(this)"><i class="fa fa-arrow-right"></i></button>';
                    // if (full.is_active_emel) {
                    //     html += '<button type="button" data-action="' + deleteUrl + '" class="btn btn-icon btn-outline-warning mt-1" onClick="deactivate(this)"><i class="fa fa-remove"></i></button>';
                    // } else {
                    //     html += '<button type="button" data-action="' + deleteUrl + '" class="btn btn-icon btn-outline-warning mt-1" onClick="activate(this)"><i class="fa fa-check"></i></button>';
                    // }
                    html += '</div>';
                    html += '</div>';

                    return html;
                }
            }]
        });

    });
</script>
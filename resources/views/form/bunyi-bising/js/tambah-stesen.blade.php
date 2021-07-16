<script src="{{ asset('js/locator/app1.js') }}" type="text/javascript"></script>
<script type="text/javascript">

    function verifyKey(e)
    {
        var keycode;
        if (window.event)
            keycode = window.event.keyCode;
        else if (e)
        keycode = e.which;
        if((keycode>=45 && keycode<=57))
        {
            //allow
        } else {
            event.preventDefault(); 
        }      
       
    }
    
    displayDateEIA();
    displayDateEMP();
    function displayDateEIA() {
        var bunyibising_is_eia = document.getElementById("bunyibising_is_eia");
        var show_date_eia = document.getElementById("show_date_eia")
        if (bunyibising_is_eia.checked) {
            show_date_eia.removeAttribute("hidden");
            $('.eia_table').show();
        } else {
            show_date_eia.setAttribute("hidden", "");
            $('.eia_table').hide();
        }
    }

    function displayDateEMP() {
        var bunyibising_is_emp = document.getElementById("bunyibising_is_emp");
        var show_date_emp = document.getElementById("show_date_emp")
        if (bunyibising_is_emp.checked) {
            show_date_emp.removeAttribute("hidden");
            $('.eim_table').show();
        } else {
            $('.eim_table').hide();
            show_date_emp.setAttribute("hidden", "");
        }
    }
    $(`#bunyibising_date_eia`).datepicker({
        format: `dd/mm/yyyy`
    });

    $(`#bunyibising_date_emp`).datepicker({
        format: `dd/mm/yyyy`
    });

    $(`#jadual`).change(() =>  {
        let data = {
            'pengawasanId': 7,
            'jadual': $(`#jadual`).val()
        };
        $('#class').empty();
        $(`#parameterStesenBunyiBisingTable > tbody`).empty()
        $(`#parameterStesenBunyiBisingTable2 > tbody`).empty()
        $.get("{{ route('form.bunyi') }}", data, (response) => {
            let html = '';
            let i = 1;
            $('#class').append('<option value="">Sila Pilih</option>');
            
            $.each(response.data, (key, value) => {
                $('#class').append('<option value="'+value.categori+'">'+value.categori+'</option>')
            });

            // $(`#parameterStesenBunyiBisingTable > tbody`).empty().append(html);
        })
    });

    $(`#class`).change(() => {
        let data = {
            'pengawasanId': 7,
            'kelas': $(`#jadual`).val()
        };
        $.get("{{ route('form.berfasa') }}", data, (response) => {
            let html = html2 = '';
            let i = 1;

            $.each(response.data, (key, value) => {
                html += '<tr>';
                html += '<td class="align-middle text-center">' + i++ + '</td>';
                html += '<td class="align-middle text-center">' + value.jenis_parameter;
                if (value.mode === 'mandatory') {
                    html += '<small>';
                    html += '<span style="color:red;">*</span>';
                    html += '</small>';
                }
                html += '</td>';
                html += '<td class="align-middle text-center">' + value.unit + '</td>';
                if (value.standard != null) {
                    html += '<td class="align-middle text-center">' + value.parameter + '</td>';
                } else {
                    html += '<td class="align-middle text-center">-</td>';
                }
                html += '<td class="align-middle text-center"><input class="form-control" name="parameters[]" id="' + value.id + '" onkeypress="return verifyKey(event)"/></td>';

                html2 += '</tr>';
                 html2 += '<tr>';
                html2 += '<td class="align-middle text-center">' + i++ + '</td>';
                html2 += '<td class="align-middle text-center">' + value.jenis_parameter;
                if (value.mode === 'mandatory') {
                    html2 += '<small>';
                    html2 += '<span style="color:red;">*</span>';
                    html2 += '</small>';
                }
                html2 += '</td>';
                html2 += '<td class="align-middle text-center">' + value.unit + '</td>';
                if (value.standard != null) {
                    html2 += '<td class="align-middle text-center">' + value.parameter + '</td>';
                } else {
                    html2 += '<td class="align-middle text-center">-</td>';
                }
                html2 += '<td class="align-middle text-center"><input class="form-control" name="base_emp[]" id="base' + value.id + '" onkeypress="return verifyKey(event)"/></td>';

                html2 += '</tr>';
            });

            $(`#parameterStesenBunyiBisingTable > tbody`).empty().append(html);
            $(`#parameterStesenBunyiBisingTable2 > tbody`).empty().append(html2);
        })
    });

    btnTambahStesenBunyiBising = (elem) => {
        confirmCreate(elem).then((result) => {
            if (result.value) {
                let is_eia = 0;
                let is_emp = 0;

                if ($('#bunyibising_is_eia').is(':checked')) {
                    is_eia = 1;
                }

                if ($('#bunyibising_is_emp').is(':checked')) {
                    is_emp = 1;
                }

                let formData = new FormData();
                formData.append("jenis_pengawasan_id", 7);
                formData.append("latitud", $('#latitude').val());
                formData.append("longitud", $('#longitude').val());
                formData.append("lembangan", $('#lembangan_RB_Name').val());
                formData.append("class", $('#jadual').val());
                formData.append("kategori_bunyi", $('#class').val());
                formData.append("stesen", $('#stesen').val());
                formData.append("is_eia", is_eia);
                formData.append("is_emp", is_emp);
                formData.append("date_eia", $('#bunyibising_date_eia').val());
                formData.append("date_emp", $('#bunyibising_date_emp').val());
                formData.append("projek", "{{ $projek->id ?? '' }}");

                formData.append("year", $('#yearAddStesen').val());
                formData.append("month", $('#monthAddStesen').val());


                let i = 0;
                $('input[name="parameters[]"]').each(function(key, value) {
                    i++;
                    if (i <= "{{ count($pengawasanBunyiBising->parameters) }}") {
                        formData.append("parameters[" + value.id + "]", value.value);
                    }
                });
                if (is_emp) {
                    let j = 0;
                $('input[name="base_emp[]"]').each(function(key, value) {
                    j++;
                    if (j <= "{{ count($pengawasanBunyiBising->parameters) }}") {
                        formData.append("base_emp[" + value.id + "]", value.value);
                    }
                });
                }
                for (var x = 0; x < $('#gambar_stesen')[0].files.length; x++) {
                    formData.append("files[]", $('#gambar_stesen')[0].files[x]);
                }

                Swal.fire({
                    title: 'Data sedang dikemaskini. Sila Tunggu Sebentar...',
                    onOpen: function() {
                        Swal.showLoading();
                        $.ajax({
                            url: elem.dataset.action,
                            data: formData,
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
                                        $('#baseAjaxModalContent').modal("hide");
                                        $('#stesenBunyiBisingDatatable').DataTable().ajax.reload();
                                    });
                                } else if (!response.success && response.code == 422) {
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Sila Penuhkan Ruang Yang Diperlukan',
                                        showConfirmButton: true,
                                    });

                                    let html = ``;
                                    html += `<div class="alert alert-danger alert-dismissible fade show" id="alert">`;
                                    html += `<button type="button" class="close" data-dismiss="alert"></button>`;
                                    $.each(response.message, (key, value) => {
                                        html += `<strong>&bull; ${value}</strong><br />`;
                                    });
                                    html += `</div>`;
                                    $(`#alert`).empty().append(html);
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
            } else {
                Swal.fire(
                    'Batal',
                    'Proses telah dibatalkan',
                    'info'
                );
            }
        });
    }

    btnUpdateStesenBunyiBising = (elem) => {
        confirmCreate(elem).then((result) => {
            if (result.value) {
                let is_eia = 0;
                let is_emp = 0;

                if ($('#bunyibising_is_eia').is(':checked')) {
                    is_eia = 1;
                }

                if ($('#bunyibising_is_emp').is(':checked')) {
                    is_emp = 1;
                }

                let formData = new FormData();
                formData.append("_method", "put");
                formData.append("jenis_pengawasan_id", 7);
                formData.append("latitud", $('#latitude').val());
                formData.append("longitud", $('#longitude').val());
                formData.append("lembangan", $('#lembangan_RB_Name').val());
                formData.append("class", $('#class').val());
                formData.append("stesen", $('#stesen').val());
                formData.append("is_eia", is_eia);
                formData.append("is_emp", is_emp);
                formData.append("date_eia", $('#bunyibising_date_eia').val());
                formData.append("date_emp", $('#bunyibising_date_emp').val());
                formData.append("projek", "{{ $projek->id ?? '' }}");

                let i = 0;
                $('input[name="parameters[]"]').each(function(key, value) {
                    i++;
                    if (i <= "{{ count($pengawasanBunyiBising->parameters) }}") {
                        formData.append("parameters[" + value.id + "]", value.value);
                    }
                });

                for (var x = 0; x < $('#gambar_stesen')[0].files.length; x++) {
                    formData.append("files[]", $('#gambar_stesen')[0].files[x]);
                }

                Swal.fire({
                    title: 'Data sedang dikemaskini. Sila Tunggu Sebentar...',
                    onOpen: function() {
                        Swal.showLoading();
                        $.ajax({
                            url: elem.dataset.action,
                            data: formData,
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
                                        $('#baseAjaxModalContent').modal("hide");
                                        $('#stesenBunyiBisingDatatable').DataTable().ajax.reload();
                                    });
                                } else if (!response.success && response.code == 422) {
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Sila Penuhkan Ruang Yang Diperlukan',
                                        showConfirmButton: true,
                                    });

                                    let html = ``;
                                    html += `<div class="alert alert-danger alert-dismissible fade show" id="alert">`;
                                    html += `<button type="button" class="close" data-dismiss="alert"></button>`;
                                    $.each(response.message, (key, value) => {
                                        html += `<strong>&bull; ${value}</strong><br />`;
                                    });
                                    html += `</div>`;
                                    $(`#alert`).empty().append(html);
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
            } else {
                Swal.fire(
                    'Batal',
                    'Proses telah dibatalkan',
                    'info'
                );
            }
        });
    }
</script>
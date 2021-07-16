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
    
    function displayDateEIA() {
        var tasik_is_eia = document.getElementById("tasik_is_eia");
        var show_date_eia = document.getElementById("show_date_eia")
        if (tasik_is_eia.checked) {
            show_date_eia.removeAttribute("hidden");
        } else {
            show_date_eia.setAttribute("hidden", "");
        }
    }

    function displayDateEMP() {
        var tasik_is_emp = document.getElementById("tasik_is_emp");
        var show_date_emp = document.getElementById("show_date_emp")
        if (tasik_is_emp.checked) {
            show_date_emp.removeAttribute("hidden");
            document.getElementById("baseline_emp_tasik").style.display = "block";
            $('.base_emp_tasik').show();
        } else {
            show_date_emp.setAttribute("hidden", "");
            document.getElementById("baseline_emp_tasik").style.display = "none";
            $('.base_emp_tasik').hide();
        }
    }

    $(`#tasik_date_eia`).datepicker({
        format: `dd/mm/yyyy`
    });
    $(`#tasik_date_emp`).datepicker({
        format: `dd/mm/yyyy`
    });


    $(`#class`).change(() => {
        let data = {
            'pengawasanId': 3,
            'kelas': $(`#class`).val()
        };

        // Swal.fire({
        //     title: 'Data sedang dikemaskini. Sila Tunggu Sebentar...',
        //     onOpen: function() {
        //         Swal.showLoading();
                $.get("{{ route('form.berfasa') }}", data, (response) => {
                    let html = '';
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
                         var tasik_is_emp = document.getElementById("tasik_is_emp");
                        var style = 'none';
                        if (tasik_is_emp.checked) {
                            var style = 'block'; 
                        } 
                         html += '<td class="align-middle text-center"><input class="form-control base_emp_tasik" name="base_emp[]" type = "text" style="display:'+style+'" id="base' + value.id + '" autocomplete="off" onkeypress="return verifyKey(event)"/></td>';
                        html += '</tr>';
                    });

                    $(`#parameterStesenTasikTable > tbody`).empty().append(html);
                })
        //         .then(() => {
        //             Swal.fire({
        //                 icon: 'success',
        //                 title: 'Berjaya!',
        //                 showConfirmButton: true,
        //             });
        //         });
        //     }
        // })
    });

    btnTambahStesenTasik = (elem) => {
        confirmCreate(elem).then((result) => {
            if (result.value) {
                let is_eia = 0;
                let is_emp = 0;

                if ($('#tasik_is_eia').is(':checked')) {
                    is_eia = 1;
                }

                if ($('#tasik_is_emp').is(':checked')) {
                    is_emp = 1;
                }

                let formData = new FormData();
                formData.append("jenis_pengawasan_id", 3);
                formData.append("latitud", $('#latitude').val());
                formData.append("longitud", $('#longitude').val());
                formData.append("lembangan", $('#lembangan_RB_Name').val());
                formData.append("class", $('#class').val());
                formData.append("stesen", $('#stesen').val());
                formData.append("is_eia", is_eia);
                formData.append("is_emp", is_emp);
                formData.append("date_eia", $('#tasik_date_eia').val());
                formData.append("date_emp", $('#tasik_date_emp').val());
                formData.append("projek", "{{ $projek->id ?? '' }}");

                formData.append("year", $('#yearAddStesen').val());
                formData.append("month", $('#monthAddStesen').val());

                let i = 0;
                $('input[name="parameters[]"]').each(function(key, value) {
                    i++;
                    if (i <= 121) {
                        formData.append("parameters["+value.id+"]", value.value);
                    }
                });


                let j = 0;
                var tasik_is_emp = document.getElementById("tasik_is_emp");
                if (tasik_is_emp.checked) {
                    $('input[name="base_emp[]"]').each(function(key, value) {
                        j++;
                        if (j <= 121) {
                            formData.append("base_emp["+value.id+"]", value.value);
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
                                        $('#stesenTasikDatatable').DataTable().ajax.reload();
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
    
    btnUpdateStesenTasik = (elem) => {
        confirmCreate(elem).then((result) => {
            if (result.value) {
                let is_eia = 0;
                let is_emp = 0;

                if ($('#tasik_is_eia').is(':checked')) {
                    is_eia = 1;
                }

                if ($('#tasik_is_emp').is(':checked')) {
                    is_emp = 1;
                }

                let formData = new FormData();
                formData.append("_method", "put");
                formData.append("jenis_pengawasan_id", 3);
                formData.append("latitud", $('#latitude').val());
                formData.append("longitud", $('#longitude').val());
                formData.append("lembangan", $('#lembangan_RB_Name').val());
                formData.append("class", $('#class').val());
                formData.append("stesen", $('#stesen').val());
                formData.append("is_eia", is_eia);
                formData.append("is_emp", is_emp);
                formData.append("date_eia", $('#tasik_date_eia').val());
                formData.append("date_emp", $('#tasik_date_emp').val());
                formData.append("projek", "{{ $projek->id ?? '' }}");

                let i = 0;
                $('input[name="parameters[]"]').each(function(key, value) {
                    i++;
                    if (i <= "{{ count($pengawasanTasik->parameters) }}") {
                        formData.append("parameters[" + value.id + "]", value.value);
                    }
                });

                 let j = 0;
                var tasik_is_emp = document.getElementById("tasik_is_emp");
                        var style = 'none';
                if (tasik_is_emp.checked) {
                    $('input[name="base_emp[]"]').each(function(key, value) {
                        j++;
                        if (j <= "{{ count($pengawasanTasik->parameters) }}") {
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
                                        $('#stesenTasikDatatable').DataTable().ajax.reload();
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
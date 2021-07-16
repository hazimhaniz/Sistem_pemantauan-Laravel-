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
    function showSentuhan(argument) {
        if (argument == '1') {
            $('#show_sentuhan').show();
            $('#table2').show();
        } else {
            $('#table2').hide();
            $('#show_sentuhan').hide();
        }
    }
    function displayDateEIA() {
        var marin_is_eia = document.getElementById("marin_is_eia");
        var show_date_eia = document.getElementById("show_date_eia")
        if (marin_is_eia.checked) {
            show_date_eia.removeAttribute("hidden");
        } else {
            show_date_eia.setAttribute("hidden", "");
        }
    }

    function displayDateEMP() {
        var marin_is_emp = document.getElementById("marin_is_emp");
        var show_date_emp = document.getElementById("show_date_emp")
        if (marin_is_emp.checked) {
            show_date_emp.removeAttribute("hidden");
           $('.baseline_emp_marin').show();
            $('.base_emp_marin').show();
        } else {
            show_date_emp.setAttribute("hidden", "");
            $('.baseline_emp_marin').hide();
            $('.base_emp_marin').hide();
        }
    }

    function displayR() {
        var kelas_marin = document.getElementById("class").value;
        var kelas_R = document.getElementById("kelas_R")
        // if (kelas_marin == "R") {
        //     kelas_R.removeAttribute("hidden");
        // } else {
        //     kelas_R.setAttribute("hidden", "");
        // }
    }

    $(`#marin_date_eia`).datepicker({
        format: `dd/mm/yyyy`
    });

    $(`#marin_date_emp`).datepicker({
        format: `dd/mm/yyyy`
    });


    $(`#class`).change(() => {
        let data = {
            'pengawasanId': 2,
            'kelas': $(`#class`).val()
        };
                $.get("{{ route('form.berfasa') }}", data, (response) => {
                    let html = '';
                    let i = 1;
                    $.each(response.data, (key, value) => {
                        if (value.standard != null) {
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
                            html += '<td class="align-middle text-center">' + value.parameter + '</td>';
                            html += '<td class="align-middle text-center"><input class="form-control" name="parameters[]" id="' + value.id + '" onkeypress="return verifyKey(event)"/></td>';
                            var marin_is_emp = document.getElementById("marin_is_emp");
                            var style = 'none';
                            if (marin_is_emp.checked) {
                                var style = 'block'; 
                            } 
                            html += '<td class="align-middle text-center base_emp_marin" style="display:'+style+'"><input class="form-control base_emp_marin" name="base_emp[]"  style="display:'+style+'" id="base' + value.id + '" autocomplete="off" onkeypress="return verifyKey(event)"/></td>';
                            html += '</tr>';
                        }
                    });

                    $(`#parameterStesenMarinTable > tbody`).empty().append(html);
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

     $(`.sentuhan`).click(() => {
        var is_prima = document.getElementById("is_prima");
        var is_sekunder = document.getElementById("is_sekunder");
        var selectedVal = '';
        if (is_sekunder.checked) {
            selectedVal = 'Sentuhan Prima';
        }
        if (is_prima.checked) {
            selectedVal = 'Sentuhan Sekunder';
        }

        let data = {
            'pengawasanId': 2,
            'kelas': selectedVal
        };
                $.get("{{ route('form.berfasa') }}", data, (response) => {
                    let html = '';
                    let i = 1;
                    $.each(response.data, (key, value) => {
                        if (value.standard != null) {
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
                            html += '<td class="align-middle text-center">' + value.parameter + '</td>';
                            html += '<td class="align-middle text-center"><input class="form-control" name="parameters2[]" id="' + value.id + '" /></td>';
                            var marin_is_emp = document.getElementById("marin_is_emp");
                            var style = 'none';
                            if (marin_is_emp.checked) {
                                var style = 'block'; 
                            } 
                            html += '<td class="align-middle text-center base_emp_marin" style="display:'+style+'"><input class="form-control base_emp_marin" name="base_emp2[]"  style="display:'+style+'" id="base' + value.id + '" autocomplete="off" /></td>';
                            html += '</tr>';
                        }
                    });

                    $(`#parameterStesenMarinTable2 > tbody`).empty().append(html);
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

    btnTambahStesenMarin = (elem) => {
        confirmCreate(elem).then((result) => {
            if (result.value) {
                let is_eia = 0;
                let is_emp = 0;

                if ($('#marin_is_eia').is(':checked')) {
                    is_eia = 1;
                }

                if ($('#marin_is_emp').is(':checked')) {
                    is_emp = 1;
                }

                if ($('#is_prima').is(':checked')){
                    is_prima = 1;
                    is_sekunder = 0;
                } else{
                    is_prima = 0;
                    is_sekunder = 1;
                }

                let formData = new FormData();
                formData.append("jenis_pengawasan_id", 2);
                formData.append("latitud", $('#latitude').val());
                formData.append("longitud", $('#longitude').val());
                formData.append("lembangan", $('#lembangan_RB_Name').val());
                formData.append("class", $('#class').val());
                formData.append("is_prima", is_prima);
                formData.append("is_sekunder", is_sekunder);
                formData.append("stesen", $('#stesen').val());
                formData.append("is_eia", is_eia);
                formData.append("is_emp", is_emp);
                formData.append("date_eia", $('#marin_date_eia').val());
                formData.append("date_emp", $('#marin_date_emp').val());
                formData.append("projek", "{{ $projek->id ?? '' }}");

                formData.append("year", $('#yearAddStesen').val());
                formData.append("month", $('#monthAddStesen').val());

                let i = 0;
                $('input[name="parameters[]"]').each(function(key, value) {
                    i++;
                    if (i <= "{{ count($pengawasanMarin->parameters) }}") {
                        formData.append("parameters[" + value.id + "]", value.value);
                    }
                });
                let j = 0;
                $('input[name="base_emp[]"]').each(function(key, value) {
                    j++;
                    if (j <= "{{ count($pengawasanMarin->parameters) }}") {
                        formData.append("base_emp[" + value.id + "]", value.value);
                    }
                });
                //add for 2nd values
                if ($('#yes_berdekatan').is(':checked')) {
                    var is_prima = document.getElementById("is_prima");
                    var is_sekunder = document.getElementById("is_sekunder");
                    var selectedVal = '';
                    if (is_sekunder.checked) {
                        selectedVal = 'Sentuhan Prima';
                    }
                    if (is_prima.checked) {
                        selectedVal = 'Sentuhan Sekunder';
                    }

                    formData.append("is_near", 1);
                    formData.append("sentuhan", selectedVal);
                    let k = 0;
                    $('input[name="parameters2[]"]').each(function(key, value) {
                        k++;
                        if (k <= "{{ count($pengawasanMarin->parameters) }}") {
                            formData.append("parameters2[" + value.id + "]", value.value);
                        }
                    });
                    let l = 0;
                    $('input[name="base_emp2[]"]').each(function(key, value) {
                        l++;
                        if (l <= "{{ count($pengawasanMarin->parameters) }}") {
                            formData.append("base_emp2[" + value.id + "]", value.value);
                        }
                    });
                } else {
                    formData.append("sentuhan", '');
                    formData.append("is_near", 0);
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
                                        $('#stesenMarinDatatable').DataTable().ajax.reload();
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

    btnUpdateStesenMarin = (elem) => {
        confirmCreate(elem).then((result) => {
            if (result.value) {
                let is_eia = 0;
                let is_emp = 0;

                if ($('#marin_is_eia').is(':checked')) {
                    is_eia = 1;
                }

                if ($('#marin_is_emp').is(':checked')) {
                    is_emp = 1;
                }

                let formData = new FormData();
                formData.append("_method", "put");
                formData.append("jenis_pengawasan_id", 2);
                formData.append("latitud", $('#latitude').val());
                formData.append("longitud", $('#longitude').val());
                formData.append("lembangan", $('#lembangan_RB_Name').val());
                formData.append("class", $('#class').val());
                formData.append("stesen", $('#stesen').val());
                formData.append("is_eia", is_eia);
                formData.append("is_emp", is_emp);
                formData.append("date_eia", $('#marin_date_eia').val());
                formData.append("date_emp", $('#marin_date_emp').val());
                formData.append("projek", "{{ $projek->id ?? '' }}");

                let i = 0;
                $('input[name="parameters[]"]').each(function(key, value) {
                    i++;
                    if (i <= "{{ count($pengawasanMarin->parameters) }}") {
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
                                        $('#stesenMarinDatatable').DataTable().ajax.reload();
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
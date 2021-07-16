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
        var dron_is_eia = document.getElementById("dron_is_eia");
        var show_date_eia = document.getElementById("show_date_eia")
        if (dron_is_eia.checked) {
            show_date_eia.removeAttribute("hidden");
        } else {
            show_date_eia.setAttribute("hidden", "");
        }
    }

    function displayDateEMP() {
        var dron_is_emp = document.getElementById("dron_is_emp");
        var show_date_emp = document.getElementById("show_date_emp")
        if (dron_is_emp.checked) {
            show_date_emp.removeAttribute("hidden");
        } else {
            show_date_emp.setAttribute("hidden", "");
        }
    }
    $(`#dron_date_eia`).datepicker({
        format: `dd/mm/yyyy`
    });
    $(`#dron_date_emp`).datepicker({
        format: `dd/mm/yyyy`
    });


    $(`#class`).change(() => {
        let data = {
            'pengawasanId': 9,
            'kelas': $(`#class`).val()
        };

        // Swal.fire({
        //     title: 'Data sedang dikemaskini. Sila Tunggu Sebentar...',
        //     onOpen: function() {
        //         Swal.showLoading();
                $.get("{{ route('form.berfasa') }}", data, (response) => {
                    let html = '';
                    let i = 1;

                    $.each(response.data.parameters, (key, value) => {
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
                        html += '</tr>';
                    });

                    $(`#parameterStesenDronTable > tbody`).empty().append(html);
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

    btnTambahStesenDron = (elem) => {
        confirmCreate(elem).then((result) => {
            if (result.value) {
                let is_eia = 0;
                let is_emp = 0;

                if ($('#dron_is_eia').is(':checked')) {
                    is_eia = 1;
                }

                if ($('#dron_is_emp').is(':checked')) {
                    is_emp = 1;
                }

                let formData = new FormData();
                formData.append("jenis_pengawasan_id", 9);
                formData.append("latitud", $('#latitude').val());
                formData.append("longitud", $('#longitude').val());
                formData.append("lembangan", $('#lembangan_RB_Name').val());
                formData.append("class", $('#class').val());
                formData.append("stesen", $('#stesen').val());
                formData.append("is_eia", is_eia);
                formData.append("is_emp", is_emp);
                formData.append("date_eia", $('#dron_date_eia').val());
                formData.append("date_emp", $('#dron_date_emp').val());
                formData.append("projek", "{{ $projek->id ?? '' }}");

                formData.append("year", $('#yearAddStesen').val());
                formData.append("month", $('#monthAddStesen').val());
               
                $('input[name="gambar_stesen[]"]').each(function(key, value) {
                    formData.append("files[]", value.files[0]);
                });

                $('.ulasan').each(function(key, value) {
                    formData.append("ulasan[]", value.value);
                });
                
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
                                        $('#stesenDronDatatable').DataTable().ajax.reload();
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

    btnUpdateStesenDron = (elem) => {
        confirmCreate(elem).then((result) => {
            if (result.value) {
                let is_eia = 0;
                let is_emp = 0;

                if ($('#dron_is_eia').is(':checked')) {
                    is_eia = 1;
                }

                if ($('#dron_is_emp').is(':checked')) {
                    is_emp = 1;
                }

                let formData = new FormData();
                formData.append("_method", "put");
                formData.append("jenis_pengawasan_id", 9);
                formData.append("latitud", $('#latitude').val());
                formData.append("longitud", $('#longitude').val());
                formData.append("lembangan", $('#lembangan_RB_Name').val());
                // formData.append("sungai", $('#sungai').val());
                formData.append("class", $('#class').val());
                formData.append("stesen", $('#stesen').val());
                formData.append("is_eia", is_eia);
                formData.append("is_emp", is_emp);
                formData.append("date_eia", $('#dron_date_eia').val());
                formData.append("date_emp", $('#dron_date_emp').val());
                formData.append("projek", "{{ $projek->id ?? '' }}");

                $('input[name="gambar_stesen[]"]').each(function(key, value) {
                    formData.append("files[]", value.files[0]);
                });

                $('.ulasan').each(function(key, value) {
                    formData.append("ulasan[]", value.value);
                });

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
                                        $('#stesenDronDatatable').DataTable().ajax.reload();
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

function addGambar() {
    var count = $('#gambar_count').val();
    count = ++count;
 
   $('#gambar_count').val(count);

    $('#addGambar').append('<tr id="addGambar'+count+'"><td><div tabindex="500" class=""><i class="fa fa-folder-open"></i> <input class="gambar_stesen" name="gambar_stesen[]" type="file"></div></td><td><textarea name="ulasan[]" class="form-control border border-default rounded ulasan" style="height: 35px;"></textarea></td><td><button type="button" class="btn btn-danger btn-xs pull-right" onclick="removeGambar('+count+')" style="font-size: 12.5px;">-</button ></td></tr>')
}
function removeGambar(argument){
    $('#addGambar'+argument).remove();
}

</script>
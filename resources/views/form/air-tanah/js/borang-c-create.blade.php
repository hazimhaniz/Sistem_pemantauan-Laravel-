<script type="text/javascript">
    $(`#tarikh_pengsampelan`).datepicker({
        format: `dd/mm/yyyy`
    });

    function verifyKey(e) {
        var keycode;
        if (window.event)
            keycode = window.event.keyCode;
        else if (e)
            keycode = e.which;
        if ((keycode >= 45 && keycode <= 57)) {
            //allow
        } else {
            event.preventDefault();
        }

    }

    btnTambahBorangC = (elem) => {
        confirmCreate(elem).then((result) => {
            if (result.value) {
                let formData = new FormData();
                let sample = 0;

                if ($('#sample0').is(':checked')) {
                    sample = 0;
                } else if ($('#sample1').is(':checked')) {
                    sample = 1;
                }

                formData.append("sample", sample);
                formData.append("stesen_id", $("#stesen_id").val());
                formData.append("tarikh_pengsampelan", $("#tarikh_pengsampelan").val());
                formData.append("masa_pengsampelan", $("#masa_pengsampelan").val());
                formData.append("catatan", $("#catatan").val());
                formData.append("cuaca", $("#cuaca").val());
                formData.append("nama_fail", $("#nama_fail").val());
                formData.append("stesen_id", "{{ $pengawasan->id ?? '' }}");
                formData.append("projek_id", "{{ $pengawasan->projek_id ?? '' }}");

                let i = 0;
                $('input[name="bacaan_ceraps[]"]').each(function(key, value) {
                    i++;
                    @if(isset($pengawasan))
                    if (i <= "{{ count($pengawasan->parameters) }}") {
                        formData.append("bacaan_ceraps[" + value.id + "]", value.value);
                    }
                    @endif
                });


                $('input[name="laporan_kimias[]"]').each(function(key, value) {
                    formData.append("laporan_kimias[]", value.files[0]);
                });

                $('input[name="gambar_pengsampelans[]"]').each(function(key, value) {
                    formData.append("gambar_pengsampelans[]", value.files[0]);
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
                                        $('#stesenAirTanahDatatable').DataTable().ajax.reload();
                                        $('#stesenAirTanahBorangCDatatable').DataTable().ajax.reload();
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
            } else {
                Swal.fire(
                    'Batal',
                    'Proses telah dibatalkan',
                    'info'
                );
            }
        });
    }


    function addGambarairtanah() {
        var count = $('#gambar_count_airtanah').val();
        count = ++count;

        $('#gambar_count_airtanah').val(count);

        $('#addGambar').append('<tr id="addGambar' + count + '"><td><div tabindex="500" class=""><i class="fa fa-folder-open"></i> <input class="gambar_pengsampelans" name="gambar_pengsampelans[]" type="file"></div></td><td><button type="button" class="btn btn-danger btn-xs pull-right" onclick="removeGambarairtanah(' + count + ')" style="font-size: 12.5px;">-</button ></td></tr>')
    }

    function removeGambarairtanah(argument) {
        $('#addGambar' + argument).remove();
    }

    function addLaporanairtanah() {
        var count = $('#laporan_count_airtanah').val();
        count = ++count;

        $('#laporan_count_airtanah').val(count);

        $('#addLaporanairtanah').append('<tr id="addLaporanairtanah' + count + '"><td><div tabindex="500" class=""><i class="fa fa-folder-open"></i> <input class="laporan_kimias" name="laporan_kimias[]" type="file"></div></td><td><button type="button" class="btn btn-danger btn-xs pull-right" onclick="removeLaporanairtanah(' + count + ')" style="font-size: 12.5px;">-</button ></td></tr>')
    }

    function removeLaporanairtanah(argument) {
        $('#addLaporanairtanah' + argument).remove();
    }
</script>
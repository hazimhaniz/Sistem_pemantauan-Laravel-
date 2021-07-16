<div class="row">
    <div class="col-md-12">
        <h4><i class="fa fa-globe"> </i><span class="bold">RUMUSAN </span><span class="bold">PROJEK</span></h4>
    </div>

    <div class="col-xl-12 col-lg-12 m-b-20">
        <form class="p-t-10" id="form-search" role="form" autocomplete="off" method="post" action="" novalidate="" _lpchecked="1">

            <div class="">
                <div class="row clearfix">

                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="" for="selectrequired">

                                NO FAIL JAS
                                <span class="text-danger" style="font-size:14px">*</span>
                            </label>
                            <select id="summaryHistory" class="select-normal full-width custom-select border border-default" required="" data-error-msg="Ruangan ini perlu dipilih.">
                                <option selected disabled></option>
                                @forelse($projects as $projek)
                                <option value="{{ $projek->id }}">{{ $projek->no_fail_jas }}</option>
                                @empty
                                <option>Tiada Projek</option>
                                @endforelse
                            </select>
                        </div>
                    </div>
                    <!-- <div class="col-md-2">
                        <div class="pull-right p-t-30">
                            <button value="" class="btn btn-primary btn-cons from-left pull-right" type="submit" id="simpan">
                                <span>Carian</span>
                            </button>
                        </div>
                    </div> -->
                </div>

            </div>
        </form>
    </div>
    <div class="col-sm-6 invoice-col">
        <address class="FRPprofile" style="padding-bottom: 5px">
            <b>No. Fail Jas:</b> <label id="no_fail_jas"></label>
        </address>

        <address class="FRPprofile" style="padding-bottom: 2px">
            <b>Nama Fail Jas: </b> <label id="nama_projek"></label>
        </address>
    </div>

    <div class="col-md-12 table-responsive">
        <table class="table tableSummaryFRP table-responsive dataTable no-footer display nowrap" id="summaryHistoryDatatable" role="grid" aria-describedby="table_info">
            <thead>
                <tr>
                    <th bgcolor="#f0f0f0" class="fit align-top text-left" style="width: ; background-color:#63686a !important; color:#fff !important;">
                        TEMPOH
                    </th>
                    <th bgcolor="#f0f0f0" class="fit align-top text-left" style="width: ; background-color:#7b7f81!important; color:#000 !important;">
                        STATUS LAPORAN
                    </th>
                    <th bgcolor="#f0f0f0" class="fit align-top" style="text-align:center ; background-color:#949899 !important; color:#000 !important;">
                        <div style="text-align:center;">STATUS STESEN</div>
                    </th>
                    <th bgcolor="#f0f0f0" class="fit align-top " style="text-align:center ; background-color:#aeb0b2 !important; color:#000 !important;">
                        <div style="text-align:center;">FASA</div>
                    </th>
                    <th bgcolor="#f0f0f0" class="fit align-top " style="text-align:center ; background-color:#c8cacb !important; color:#000 !important;">
                        <div style="text-align:center;">STATUS</div>
                    </th>
                </tr>
            </thead>
            <tbody id="frp_periods">
                <!-- <tr>
                    <td colspan="5">
                        SILA PILIH JAS FAIL
                    </td>
                </tr> -->
                <!-- <tr>
                    <td>
                        <div style="text-align:center;font-size:12px; padding-bottom:5px">Jan 2020</div>
                    </td>
                    <td style="text-align:center;">
                        <span style="text-align:center;font-size:12px; padding-bottom:5px " class="label label-lg label-light-danger label-inline blink">KUIRI</span>
                    </td>
                    <td style="text-align:center;">
                        <span style="text-align:center;font-size:12px;padding-bottom:5px" class=" label label-lg label-light-warning label-inline">DALAM SEMAKAN</span>
                    </td>
                    <td style="text-align:center;">
                        <span style="text-align:center;font-size:12px; padding-bottom:5px">FASA 1</span>
                    </td>
                    <td style="text-align:center;">
                        <span style="text-align:center;font-size:12px;padding-bottom:5px">DRAF</span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div style="text-align:center;font-size:12px; padding-bottom:5px">Feb 2020</div>
                    </td>
                    <td style="text-align:center;">
                        <span style="text-align:center;font-size:12px; padding-bottom:5px" class=" label label-lg label-light-blue label-inline">DRAF</span>
                    </td>
                    <td style="text-align:center;">
                        <span style="text-align:center;font-size:12px; padding-bottom:5px" class=" label label-lg label-light-warning label-inline">DALAM SEMAKAN</span>
                    </td>
                    <td style="text-align:center;">
                        <span style="text-align:center;font-size:12px; padding-bottom:5px">FASA 2</span>
                    </td>
                    <td style="text-align:center;">
                        <span style="text-align:center;font-size:12px; padding-bottom:5px ">KUIRI</span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div style="text-align:center;font-size:12px; padding-bottom:5px">Mac 2020</div>
                    </td>
                    <td style="text-align:center;">
                        <span style="text-align:center;font-size:12px; padding-bottom:5px" class=" label label-lg label-light-blue label-inline">DRAF</span>
                    </td>
                    <td style="text-align:center;">
                        <span style="text-align:center;font-size:12px; padding-bottom:5px " class="label label-lg label-light-danger label-inline blink">KUIRI</span>
                    </td>
                    <td style="text-align:center;">
                        <span style="text-align:center;font-size:12px; padding-bottom:5px">FASA</span>
                    </td>
                    <td style="text-align:center;">
                        <span style="text-align:center;font-size:12px; padding-bottom:5px">DISAHKAN</span>
                    </td>
                </tr> -->
            </tbody>
        </table>
    </div>
</div>

@push('js')
<script type="text/javascript">
    $("#summaryHistory").select2({
        placeholder: 'Sila Pilih JAS Fail'
    });

    $("#summaryHistory").change(() => {
        let noJasFail = $("#summaryHistory").val();

        let baseUrl = `{{ route('summary-history.show', 'data-id') }}`;
        baseUrl = baseUrl.replace('data-id', noJasFail);

        let labelUrl = `{{ route('api.summary.history.append.label', 'data-id') }}`;
        labelUrl = labelUrl.replace(`data-id`, noJasFail);

        $.get(`${labelUrl}`, ((response) => {
                $(`#no_fail_jas`).empty().append(`${response.data.no_fail_jas}`);
                $(`#nama_projek`).empty().append(`${response.data.nama_projek}`);
            }) 
        );

        Swal.fire({
            title: 'Data sedang dikemaskini. Sila Tunggu Sebentar...',
            onOpen: function() {
                Swal.showLoading();
                $('#summaryHistoryDatatable').DataTable().clear().destroy();

                $('#summaryHistoryDatatable').DataTable({
                    'serverSide': true,
                    'processing': true,
                    'ordering': false,
                    'searching': false,
                    'info': false,
                    'bLengthChange': false,
                    'bPaginate': false,
                    'paging': false,
                    "fnDrawCallback": function( oSettings ) {
                        Swal.close();
                    },
                    ajax: {
                        url: `${baseUrl}`,
                        method: 'GET',
                        dataType: 'json',
                        dataSrc: "data",
                    },
                    columns: [
                        { 
                            "data" : "id" ,
                            "render" : function (data, type, row, meta) {
                                let months = {
                                    '01': 'JAN',
                                    '02': 'FEB',
                                    '03': 'MAC',
                                    '04': 'APR',
                                    '05': 'MEI',
                                    '06': 'JUN',
                                    '07': 'JUL',
                                    '08': 'OGOS',
                                    '09': 'SEP',
                                    '10': 'OKT',
                                    '11': 'NOV',
                                    '12': 'DIS'
                                };

                                return months[row.bulanan] + " " + row.year
                            }
                        },
                        { 
                            "data" : "status.name",
                            "render" : function (data, type, row, meta) {
                                if (!row.status) {
                                    return `-`;
                                } else if(row.status.id == 5) {
                                    return `<span style="text-align:center;font-size:12px; padding-bottom:5px">${row.status.name}</span>`;
                                } else if(row.status.id == 503) {
                                    return `<span style="text-align:center;font-size:12px; padding-bottom:5px">${row.status.name}</span>`;
                                } else if (row.status.id == 500) {
                                    return `<span style="text-align:center;font-size:12px; padding-bottom:5px">${row.status.name}</span>`;
                                }
                            }
                        },
                        { "data" : "id" },
                        { "data" : "id" },
                        { "data" : "id" }
                    ]
                });
            }
        })

    });
</script>
@endpush
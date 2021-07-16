<style type="text/css">
    .text-info {
        color: #ab70a6 !important;
    }

    .modal-lg {
        max-width: 60% !important;
        width: 60% !important;
        margin: 0 auto !important;
    }

    .nav-tabs-blue.nav-tabs-fillup>li>a:after {
        background: none repeat scroll 0 0 #006c80;
        border: 1px solid #006c80;
    }

    label {
        font-family: 'Montserrat' !important;
        font-size: 10.5px !important;
    }

    .hidden-xs {
        font-family: 'Montserrat' !important;
        font-size: 10.5px !important;

    }

    .btn {
        font-family: 'Montserrat' !important;
        font-size: 10.5px !important;
        s
    }

    .dashTitle {
        font-family: 'Montserrat' !important;
        font-size: 12.5px !important;
        letter-spacing: 0.06em !important;
        text-transform: uppercase !important;
        font-weight: 500 !important;

    }

    th {
        background-color: #ebe8ec;
        color: #000 !important;
        //border-top: none;
        font-family: 'Montserrat' !important;
        font-size: 10.5px !important;
        letter-spacing: 0.06em !important;
        text-transform: uppercase !important;
        font-weight: 500 !important;
        //border-left: none !important;
        padding: 4px;
    }

    td {
    
        color: #000 !important;
        font-family: 'Montserrat' !important;
        font-size: 10.5px !important;
        letter-spacing: 0.06em !important;
        /* text-transform: uppercase !important; */
        padding: 4px;
        /* text-align: center !important; */
    }
</style>

<div class=" container-fluid container-fixed-lg">
    <div class="row">
        <div class="col-md-12 ">
            <div id="senaraiKuiriDiv"></div>

            <div id="lihatKuiriDiv"></div>
        </div>
    </div>
</div>

<script>
    var loadTableQuery;
    $(document).ready(function() {
        $("#senaraiKuiriDiv").load("{{ url('/projek/get-senarai-kuiri') }}/{{ $projek->id }}/{{ $year }}/{{ $month }}");
    });

    function lihatKuiri(kuiriID) {
        console.log(kuiriID);
        $("#lihatKuiriDiv").load("{{ url('/projek/get-lihat-kuiri') }}/" + kuiriID);
    }

    function jawabQuerySubmit(kuiriID) {
        var formData = new FormData;
        formData.append('kuiriID', kuiriID);
        formData.append('queryJawabText', $("#queryJawabText").val());

        $.ajax({
            url: "{{ url('/projek/jawab-kuiri') }}",
            method: "POST",
            data: formData,
            dataType: 'json',
            contentType: false,
            processData: false,
            success: function(data) {
                $("#senaraiKuiriDiv").load("{{ url('/projek/get-senarai-kuiri') }}/{{ $projek->id }}/{{ $year }}/{{ $month }}");
                $("#viewKuiriModal").modal('hide');
                Swal.fire("Berjaya", "Maklumat telah disimpan", "success");
            },
            error: function(data) {
                Swal.fire("Gagal", "Maklumat gagal disimpan", "error");
            }
        });
    }
</script>
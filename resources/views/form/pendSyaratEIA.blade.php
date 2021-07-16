<style>
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
        /* text-transform: uppercase !important; */
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
        //background-color: #ebe8ec;
        color: #000 !important;
        //border-top: none !important;
        //border-bottom: none !important;
        //border-top: 1px solid #E7E7E7;
        //border-left: 1px solid #E7E7E7;
        //border-bottom: none !important;
        //border-left: none !important;
        //border-right: none !important;
        font-family: 'Montserrat' !important;
        font-size: 10.5px !important;
        letter-spacing: 0.06em !important;
        text-transform: uppercase !important;
        //font-weight: 500 !important;
        padding: 4px;
        text-align: center !important;
    }
    
    .modal-lg1 {
        max-width: 50% !important;
        width: 50% !important;
        margin: 0 auto !important;
    }
    
    .title1 {
        font-weight: 500 !important;
        font-size: 14.5px !important;
        font-family: 'Montserrat' !important;
    }
    
</style>

<div class="row">
    <form id="syaratB" class="form">
        <div class="title1"><b>Pendaftaran Syarat EIA</b></div>
        <br class="formAudit">
        <div class="dashTitle"><b>Pendaftaran bilangan syarat</b> <span style="color:red;">*</span> </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <div class="check-primary">
                        <input id="syarat" name="syarat" max="99" min="0" type="number" class="form-control" required>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <button type="button" id="syaratAddBtn" onclick="projekSaveSyaratEIA()" class="btn btn-primary mb-2 tambahSyarat">
                    Tambah
                </button>
            </div>

        </div>
    </form>
    <div class="col-md-12">
        <div id="syaratBTable"></div>
    </div>
</div>



<script>

    var projekSaveSyaratNumber;
    var tindakanBorangB;

    $(document).ready(function(){
        $("#syaratBTable").load("{{route('projek.viewSyarat',$projek->id)}}");
        
        projekSaveSyaratEIA = function(){
            var syarat = $("#syarat").val();


            if(syarat == ''){
                $('#alertSyarat').text('Sila isi bahagian ini');

            }else{
                $('#alertSyarat').text('');
                var monthlyBID = "{{ $projek ? $projek->id : ''}}";
                
                var formData = new FormData;
                formData.append('syarat', syarat);

                $.ajax({
                    url: "{{ route('projek.pendaftaranSyarat',$projek->id) }}",
                    method: "POST",
                    data: formData,
                    dataType: 'json',
                    async: true,
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        $("#syaratBTable").load("{{route('projek.viewSyarat',$projek->id)}}");
                    }
                });
            }
        }
    });

</script>
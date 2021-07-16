<div class=" container-fluid container-fixed-lg bg-white">
    <div class="card card-transparent">
        <div class="card-block">
            <div class="card card-default">
                <div class="card-header separator">
                    <div class="card-title" style="font-weight: bold;font-size: 12.5px">Pendaftaran Syarat EIA</div>
                </div>
                <div class="card-body">
                    <div class="card card-transparent">
                        <div class="card-block table-responsive" id="syaratBTable"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('js')

<script type="text/javascript">
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
@endpush
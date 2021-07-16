

<br>
<div class="row">
    <div class="col-md-6">
        <span class="bold"
            style="color:#000; font-family: 'Montserrat'; font-size: 10.5px; text-transform: uppercase; font-weight: 500;">
            Senarai Stesen
        </span>
    </div>
    <div class="col-md-6">
        <span class="float-right">    
        @php $year = request()->year @endphp
        @php $month = request()->month @endphp

            @if (auth()->user()->entity_type == 'App\UserEMC')
            <button type="button" data-action="{{ route('project.tambah.stesen.tasik.modal', $projek) }}?year={{ $year }}&month={{ $month }}" class="btn btn-default btn-xs" onClick="getModalContent(this)">
                <span style="color:#000; font-family: 'Montserrat'; font-size: 10.5px; text-transform: uppercase; font-weight: 500;">
                    <i class="fa fa-plus text-success"></i> &nbsp; <span style="color:blue;">PENDAFTARAN STESEN</span>
                </span>
            </button>
            @endif
        </span>
    </div>
    <br><br>
    <!-- START CONTAINER FLUID -->
    <div class="col-md-12">
        <!-- START card -->
        <div class="card card-transparent">
            <div class="card-block">
                <table class="table" id="stesenTasikDatatable" role="grid" aria-describedby="table_info" border="1px" style="padding:0px;">
                    <thead>
                        <tr style="text-align: center">
                            <th class="fit">Bil.</th>
                            <th>Nama Stesen</th>
                            <th>Latitud</th>
                            <th>Longitud</th>
                            <th>Tindakan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- -->
                    </tbody>
                </table>
            </div>
        </div>
        <!-- END card -->
    </div>
    <!-- END CONTAINER FLUID -->
    <br>
    <br>
    <div class="col-md-6">
        <span class="bold" style="color:#000; font-family: 'Montserrat'; font-size: 10.5px; text-transform: uppercase; font-weight: 500;">
            Senarai Borang C
        </span>
    </div>
    <br>
    <br>
    <div class="col-md-12">
        <div class="card card-transparent">
            <div class="card-block">
                <table class="table" id="stesenTasikBorangCDatatable" role="grid" aria-describedby="table_info" border="1px" style="padding:0px;">
                    <thead>
                        <tr style="text-align: center">
                            <th class="fit">Bil.</th>
                            <th>Nama Stesen</th>
                            <th>Tarikh dan Masa Pengsampelan</th>
                            <th>Tindakan</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

                
@include('form/tasik/js/datatable')

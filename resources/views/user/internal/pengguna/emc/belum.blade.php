<!-- START CONTAINER FLUID -->
<div class=" container-fluid container-fixed-lg bg-white">
    <!-- START card -->
    <div class="card card-transparent">
        <div class="card-header px-0">
            <div class="pull-right">
                <div class="col-xs-12">
                    <input type="text" id="search-table" class="form-control pull-right" placeholder="Carian...">
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="card-block">
            <table class="table table-hover" id="table">
                <thead>
                <tr>
                    <th class="fit">No.</th>
                    <th>Nama</th>
                    <th>ID Pengguna</th>
                    <th>No Fail JAS</th>
                    <th>Peranan</th>
                    <th>Alamat</th>
                    <th>Status</th>
                    <th>Tindakan</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>1.</td>
                    <td><a onclick="editData1()" href="javascript:;" class="btn btn-info btn-xs mb-1">Mr. Tew Kok Heng</a></td>
                    <td><span class="label label-default">EMC1</span></td>
                    <td>789</td>
                    <td>Environmental Monitoring Consultant</td>
                    <td>No 2, Jalan Teknologi 6, Kawasan Perindustrian Mengkibo, 86000 Kluang, Johor</td>
                    <td><span class="badge badge-warning">Perlu Pengesahan</span></td>
                    <td>
                        <a onclick="editData1()" href="javascript:;" class="btn btn-success btn-xs mb-1"><i class="fa fa-spinner mr-1"></i> Proses</a>
                        <a onclick="deleteData(1)" href="javascript:;" class="btn btn-danger btn-xs mb-1"><i class="fa fa-trash mr-1"></i> Padam</a>
                        <a onclick="passwordData(1)" href="javascript:;" class="btn btn-default btn-xs mb-1"><i class="fa fa-key mr-1"></i> Tukar Katalaluan</a>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
    <!-- END card -->
</div>
<!-- END CONTAINER FLUID -->
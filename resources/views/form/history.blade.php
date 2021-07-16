<div class="col-md-12">
    <!-- Table row -->
    <div class="row">
        <div class="col-md-12 table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th bgcolor="#ddfada" style="width: ; color:#000">No.</th>
                        <th bgcolor="#ddfada" style="width: ; color:#000">Peranan</th>
                        <th bgcolor="#ddfada" style="width: ; color:#000">Nama Pengguna</th>
                        <th bgcolor="#ddfada" style="width: ; color:#000">Tindakan</th>
            
                        <th bgcolor="#ddfada" style="width: ; color:#000">Tarikh<br></th>

                    </tr>
                </thead>
                <tbody>

                @foreach($logdata->sortByDesc('created_at') as $key => $data)
                    <tr>
                        <td>
                            {{$key + 1}}
                        </td>
                        <td>
                            {{auth()->user()->role_name()}}
                        </td>
                        <td>
                        {{auth()->user()->name}}
                        </td>
                        <td>
                        {{ $data->description}}


                        </td>

                        <td>
                        {{ $data->created_at}}
                        </td>
                    </tr>
                @endforeach    
                </tbody>
            </table>
        </div>
        <!-- /.col -->
    </div>

</div>
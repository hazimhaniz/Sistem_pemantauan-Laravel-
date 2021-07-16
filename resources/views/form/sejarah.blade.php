<?php

use App\LogSystem;
use App\User;


if(auth()->user()->hasRole('penyiasat')){

$roleforlog = "Penyiasat";
}

 if (auth()->user()->hasRole('penyelia')){
    $roleforlog = "Penyelia";
    
}

if (auth()->user()->hasRole('pengarah')){
    $roleforlog = "Pelulus";
    
}

if (auth()->user()->hasRole('pengarah')){
    $roleforlog = "Pelulus";
    
}

if (auth()->user()->hasRole('pengarah')){
    $roleforlog = "Pelulus";
    
}


?>

<div class="title1"><b>Log Sejarah</b></div>
<br>

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

                @foreach($logsej->sortByDesc('created_at') as $key => $data)
                    <tr>  
                        <td>
                            {{$key + 1}}
                        </td>
                        <td>
                           {{$data->user->role_name_by_id_log()}}
                        </td>
                        <td>
                        {{$data->user->name}}
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
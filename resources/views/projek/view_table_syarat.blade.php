<table class="table dataTable no-footer" border="0px" style="padding: 10px; width: 891px;">
    <thead>
        <tr> 
            <th style="width: 5%;">No</th>
            <th style="width: 30%;">Syarat</th>
            <th style="width: 30%;">Status</th>
            <th style="width: 35%;">Tindakan</th>
        </tr>
    </thead>
    <tbody>
        <?php $no=1; ?>
        @forelse($syaratEIA as $syarat)
        <tr>
            <td>{{$no++}}</td>
            <td style="text-align: left !important;">{{$syarat->syarat}}</td>
            <td style="text-align: left !important;">
                <span class="label label-lg label-inline {{$syarat->filing_status->badge}}">{{$syarat->filing_status->name}}</span>
            </td>
            <td>
               @if(!in_array($syarat->status,[610,611]))
               <button onclick="lihatKuiriSyarat({{ $syarat->id }})" class="btn btn-sm btn-danger">Kuiri</button>
               <button  onclick="sahKuiriSyarat({{ $syarat->id }})"  class="btn btn-sm btn-success">Sahkan</button>
               @endif
           </td>
       </tr>
       @empty
       <tr>
        <td colspan="3">Tiada Maklumat</td>
    </tr>
    @endforelse
</tbody>
</table>
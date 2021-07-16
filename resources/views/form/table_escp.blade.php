<tbody>

    @if(!empty($monthlyA))
    <?php $no=1; ?>
    {{dd($response)}}
    @foreach($monthlyA as $borangA)
    <tr>

     <td>{{$no++}}</td>
     <td>{{$borangA->nama}}</td>
     <td>{{$borangA->status}}</td>
     <td>{{$borangA->tarikh_kelulusan}}</td>
     <td>{{$borangA->no_rujukan}}</td>
     <td>{{$borangA->no_pelan}}</td>
     <td>
        <span style="text-align:center;font-size:12px padding-bottom:5px" class="label label-lg label-light-blue label-inline"> muat turun</span>
    </td>

</tr>
@endforeach
@else
<tr>
    <td colspan="5" style="text-align: center;">Tiada Maklumat</td>
    <td style="text-align: center;"></td>
    <td style="text-align: center;"></td>
    <td style="text-align: center;"></td>
    <td style="text-align: center;"></td>
    <td style="text-align: center;"></td>
    <td style="text-align: center;"></td>
</tr>
@endif

</tbody>
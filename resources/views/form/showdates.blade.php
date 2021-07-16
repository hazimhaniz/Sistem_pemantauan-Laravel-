<?php
	$months = [
		'01' => 'JAN',
		'02' => 'FEB',
		'03' => 'MAC',
		'04' => 'APR',
		'05' => 'MEI',
		'06' => 'JUN',
		'07' => 'JUL',
		'08' => 'OGOS',
		'09' => 'SEP',
		'10' => 'OKT',
		'11' => 'NOV',
		'12' => 'DIS'
	];

	$currentMonth = date('m');
	$currentYear = date('Y');
	$currentDate = date("Y-m-d");
	$timeStap = strtotime($currentDate);
?>
<input type="hidden" name="show" value="{{$show}}" id="show">
<table class="tableheadersummary table-responsive hideon" style="border:none">
	<tbody>

		<tr>
			@foreach($projekBulanan as $key => $data)
				<?php
					if (strlen($data->bulanan) == 1) {
						$data->bulanan = '0'.$data->bulanan;
					}
				?>
				@if ($data->status == 500 ||  $data->status == 504 || $data->status == 502 || $data->status == 509 || $data->status == 2)
					<td style="font-size: 13px !important;"><a  onclick="showtab({{$data->bulanan}})" class="{{ ($data->bulanan == $month) ? 'btn btn-bulan-active btn-xs' : 'btn btn-bulan btn-xs' }}">  
						<div class="col-md-2 ">{{$months[$data->bulanan]}} </div>
					</td>
				@else 
					<td style="font-size: 13px !important;"><a class="btn btn-default btn-xs" disabled>  <div class="col-md-2 ">{{$months[$data->bulanan]}} </div>
						</td>
				@endif
			@endforeach
		</tr>



	</tbody>
</table>


<script type="text/javascript">
	var val= $('#show').val()
	if (val != 'show') {
		$('#hideTabs').css('display','none');
	} else {
		$('#hideTabs').css('display','block');
	}
</script>

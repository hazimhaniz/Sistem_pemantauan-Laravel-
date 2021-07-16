<style>
	.statusKerjaTable {cursor: pointer;}
</style>

<div class="container-fluid container-fixed-lg">	
	<div class="row">
		<div class="col-md-12">
			<table class="table" id="statusKerjaTable" role="grid" aria-describedby="table_info" border="1px" style="padding:10px;">
				<thead>
					<tr>
						<th class="align-top text-center" bgcolor="#" style="color:#; width:20%;">Nama</th>
						<th class="align-top text-center" bgcolor="#" style="color:#; width:20%;">Senarai Projek</th>
						<th class="align-top text-center" bgcolor="#" style="color:#; width:20%;">Jumlah</th>
					</tr>
				</thead>
				<tbody>
					@if(auth()->user()->hasAnyRole(['superadmin','staff','penyelia','penyiasat','pengarah','admin_state','admin_hq']))
					<tr class="statusKerjaTable" gotoURL="{{ url('/rekodEkas/senarai') }}">
						<td rowspan="3">Projek</td>
						<td style="text-align:left !important">Senarai Rekod Ekas</td>
						<td> {{ $ekasTotal }} </td>
					</tr>
					<tr class="statusKerjaTable" gotoURL="{{ url('/rekodEkas/senarai?status=belum_diagih') }}">
						<td style="border-left: 1px solid #DDDDDD; text-align:left !important; color:red !important">Rekod Ekas yang belum diagih</td>
						<td> {{ $ekasBelum }} </td>

					</tr>
					<tr class="statusKerjaTable" gotoURL="{{ url('/rekodEkas/senarai?status=telah_diagih') }}">
						<td style="border-left: 1px solid #DDDDDD; text-align:left !important">Rekod Ekas yang telah diagih</td>
						<td> {{ $ekasTelah }} </td>
					</tr>
					@endif
					@if(auth()->user()->hasAnyRole(['superadmin','staff','penyelia','penyiasat','pengarah','admin_state','admin_hq']))
					<tr class="statusKerjaTable" gotoURL="{{ url('/') }}">
		
					
			
					</tr>
					<tr class="statusKerjaTable" gotoURL="{{ url('/pengurusan_projek/aktif') }}">
					<td >Pengurusan Projek</td>
						
						<td style="border-left: 1px solid #DDDDDD; text-align:left !important">Senarai Projek Aktif</td>
						<td>{{ $projekAktif }}</td>
					</tr>
					@endif
					@if(auth()->user()->hasAnyRole(['penyiasat','superadmin']))
					<tr class="statusKerjaTable" gotoURL="{{ url('/pengurusan_projek/belum_disahkan') }}">
						<td></td>
						<td style="border-left: 1px solid #DDDDDD;text-align:left !important; color:red !important">Belum disahkan oleh JAS negeri</td>
						<td>{{ $projekBelumSah }}</td>
						
					</tr>
					<tr class="statusKerjaTable" gotoURL="{{ url('/pengurusan_projek/telah_disahkan') }}">
						<td></td>
						<td style="border-left: 1px solid #DDDDDD;text-align:left !important">Telah disahkan oleh JAS negeri</td>
						<td>{{ $projekTelahSah }}</td>
					</tr>
					@endif

					<tr class="statusKerjaTable" gotoURL="{{ url('/pengesahan_stesen/senarai_stesen') }}">
						<td>Pengurusan Stesen</td>
						<td style="text-align:left !important">Senarai Stesen</td>
						<td>{{ $senaraiStesen }}</td>
					</tr>
					{{-- <tr class="statusKerjaTable" gotoURL="{{ url('/') }}">
						<td style="border-left: 1px solid #DDDDDD;text-align:left !important; color:red !important">Belum Disemak oleh PP</td>
						<td>X</td>
					</tr> --}}
					{{-- <tr class="statusKerjaTable" gotoURL="{{ url('/') }}">
						<td style="border-left: 1px solid #DDDDDD;text-align:left !important">Telah Disemak oleh PP</td>
						<td>X</td>
					</tr> --}}

					@if(auth()->user()->hasAnyRole(['penyiasat','superadmin']))
					<tr class="statusKerjaTable" gotoURL="{{ url('/pengesahan_stesen/senarai_stesen?status=belum_sah') }}">
						<td></td>
						<td style="border-left: 1px solid #DDDDDD;text-align:left !important; color:red !important">Belum Disahkan oleh JAS Negeri</td>
						<td>{{ $stesenBelumSah }}</td>
						
					</tr>
					@endif
					@if(auth()->user()->hasAnyRole(['superadmin','staff','penyelia','penyiasat','pengarah','admin_state','admin_hq']))
					<tr class="statusKerjaTable" gotoURL="{{ url('/pengesahan_stesen/senarai_stesen?status=telah_sah') }}">
						<td></td>
						<td style="border-left: 1px solid #DDDDDD;text-align:left !important">Telah disahkan oleh JAS negeri</td>
						<td>{{ $stesenTelahSah }}</td>						
					</tr>
					@endif
					{{-- <tr class="statusKerjaTable" gotoURL="{{ url('/') }}">
						<td style="border-left: 1px solid #DDDDDD;text-align:left !important">Semakan Stesen Tambahan</td>
						<td>X</td>
					</tr> --}}
					{{-- <tr class="statusKerjaTable" gotoURL="{{ url('/') }}">
						<td style="border-left: 1px solid #DDDDDD;text-align:left !important">Pengesahan Stesen Tambahan</td>
						<td>X</td>
					</tr> --}}
					<tr class="statusKerjaTable" gotoURL="{{ url('/') }}">
						<td>Laporan Bulanan</td>
						<td style="text-align:left !important;color:red !important"> Belum dihantar</td>
						<td> {{$bulananBelumDihantar}} </td>
					</tr>
					@if(auth()->user()->hasAnyRole(['penyiasat','superadmin']))
					<tr class="statusKerjaTable" gotoURL="{{ url('/pengurusan_projek/laporan/bulanan?status=belum_disahkan') }}">
						<td></td>
						<td style="border-left: 1px solid #DDDDDD;text-align:left !important; color:red !important">Belum Disahkan</td>
						<td>{{ $bulananStatusBelumSah }}</td>
					</tr>
					<tr class="statusKerjaTable" gotoURL="{{ url('/pengurusan_projek/laporan/bulanan?status=telah_disahkan') }}">
						<td></td>
						<td style="border-left: 1px solid #DDDDDD;text-align:left !important">Telah Disahkan</td>
						<td>{{ $bulananStatusTelahSah }}</td>
					</tr>
					@endif	
					
					<tr class="statusKerjaTable" gotoURL="{{ url('/pengurusan_projek/laporan/siasatan') }}">
						<td>Laporan Siasatan</td>
						<td style="text-align:left !important">Senarai Laporan Siasatan</td>
						<td>{{ $siasatan }}</td>
					</tr>
					@if(auth()->user()->hasAnyRole(['penyiasat','superadmin']))
					<tr class="statusKerjaTable" gotoURL="{{ url('/pengurusan_projek/laporan/siasatan?status=belum_disediakan') }}">
						<td></td>
						<td style="border-left: 1px solid #DDDDDD;text-align:left !important; color:red !important">Belum disediakan</td>
						<td>{{ $siasatanBelumSedia }}</td>
					</tr>
					<tr class="statusKerjaTable" gotoURL="{{ url('/pengurusan_projek/laporan/siasatan?status=telah_disediakan') }}">
						<td></td>
						<td style="border-left: 1px solid #DDDDDD;text-align:left !important">Telah disediakan</td>
						<td>{{ $siasatanTelahSedia }}</td>
					</tr>
					@endif
					@if(auth()->user()->hasAnyRole(['penyelia','superadmin']))
					<tr class="statusKerjaTable" gotoURL="{{ url('/pengurusan_projek/laporan/siasatan?status=belum_disemak') }}">
						<td></td>
						<td style="border-left: 1px solid #DDDDDD;text-align:left !important; color:red !important">Belum disemak</td>
						<td>{{ $siasatanBelumSemak }}</td>
					</tr>
					<tr class="statusKerjaTable" gotoURL="{{ url('/pengurusan_projek/laporan/siasatan?status=telah_disemak') }}">
						<td></td>
						<td style="border-left: 1px solid #DDDDDD;text-align:left !important">Telah disemak</td>
						<td>{{ $siasatanTelahSemak }}</td>
					</tr>
					@endif
					@if(auth()->user()->hasAnyRole(['pengarah','superadmin']))
					<tr class="statusKerjaTable" gotoURL="{{ url('/pengurusan_projek/laporan/siasatan?status=belum_diluluskan') }}">
						<td></td>
						<td style="border-left: 1px solid #DDDDDD;text-align:left !important; color:red !important">Belum Diluluskan</td>
						<td>{{ $siasatanBelumLulus }}</td>
					</tr>
					<tr class="statusKerjaTable" gotoURL="{{ url('/pengurusan_projek/laporan/siasatan?status=telah_diluluskan') }}">
						<td></td>
						<td style="border-left: 1px solid #DDDDDD;text-align:left !important">Telah diluluskan</td>
						<td>{{ $siasatanTelahLulus }}</td>
					</tr>
					@endif

					{{-- <tr class="statusKerjaTable" gotoURL="{{ url('/') }}">
						<td style="border-left: 1px solid #DDDDDD;text-align:left !important">Telah Disemak</td>
						<td>X</td>
					</tr> --}}
					{{-- <tr class="statusKerjaTable" gotoURL="{{ url('/') }}">
						<td style="border-left: 1px solid #DDDDDD;text-align:left !important; color:red !important">Belum dihantar</td>
						<td>X</td>
					</tr> --}}
					{{-- <tr class="statusKerjaTable" gotoURL="{{ url('/') }}">
						<td style="border-left: 1px solid #DDDDDD;text-align:left !important">Telah dihantar</td>
						<td>X</td>
					</tr> --}}

				</tbody>
			</table>
		</div>
	</div>
</div>

<script>
	$(".statusKerjaTable").on('click', function(){
		var gotoURL = $(this).attr('gotoURL');
		window.location.href = gotoURL;
	});
</script>
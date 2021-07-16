

@hasanyrole(['pp'])
<li class="">
	<a href="javascript:;">
		<span class="title"> Projek </span>
		<span class="arrow"></span>
	</a>
	
	<ul class="sub-menu">
		<li class="menu-inner-custom">
			<a href="{{route('projek.senarai_projek')}}"> Senarai Projek </a>
		</li>
		<li class="menu-inner-custom">
			<a href="{{route('projek.pendaftaran_projek')}}"> Pendaftaran Projek </a>
		</li>
		@foreach($projeks as $projek)
		@php
			$year = date('Y');
			$month = date('m');
		@endphp
		<li class="menu-inner-custom">
			<a href="{{route('projek.form',['id' => $projek->id])}}"> {{ $projek->no_fail_jas }} </a>
		</li>
		@endforeach
	</ul>
</li>
@endhasanyrole
		<li class="menu-inner-custom">
			<a href="{{route('rekodEkas.senarai')}}"> Senarai Rekod ekas </a>
		</li>

<li class="">
	<a href="javascript:;">
		<span class="title">Pengurusan Projek</span>
		<span class="arrow"></span>
	</a>
	<ul class="sub-menu">
		<li class="menu-inner-custom">
			<a href="{{route('pengurusan_projek.hantar')}}"> Belum Di Hantar </a>
		</li>
		<li class="menu-inner-custom">
			<a href="{{route('pengurusan_projek.belum_sah')}}"> Belum Di Sahkan </a>
		</li>
		<li class="menu-inner-custom">
			<a href="{{route('pengurusan_projek.telah_sah')}}"> Telah Di Sahkan </a>
		</li>
	</ul>
</li>


<!-- <li class="">
	<a href="javascript:;">
		<span class="title">Pengurusan Projek</span>
		<span class="arrow"></span>
	</a>
	<ul class="sub-menu">
		<li class="">
			<a href="{{ route('pengesahanprojek.belumhantar') }}">Belum Dihantar</a>
		</li>
		<li class="">
			<a href="{{ route('pengesahanprojek.belumsah') }}">Belum Disahkan</a>
		</li>
		<li class="">
			<a href="{{ route('pengesahanprojek.sah') }}">Telah Disahkan</a>
		</li>
	</ul>
</li> -->

<li class="">
	<a href="javascript:;">
		<span class="title">Pengesahan Stesen</span>
		<span class="arrow"></span>
	</a>
	
	<ul class="sub-menu">
		<li class="menu-inner-custom">
			<a href="{{route('pengesahan_stesen.pengesahan_stesen')}}"> Pengesahan Stesen </a>
		</li>
		<li class="menu-inner-custom">
			<a href="{{route('pengesahan_stesen.tambah_stesen')}}"> Pengesahan Tambah Stesen </a>
		</li>
	</ul>
</li>


<li class="">
	<a href="javascript:;">
		<span class="title">Laporan</span>
		<span class="arrow"></span>
	</a>
	
	<ul class="sub-menu">
		<li class="menu-inner-custom">
			<a href="#"> Laporan Siasatan </a>
		</li>
		<li class="menu-inner-custom">
			<a href="#"> Laporan Bulanan </a>
		</li>
		<li class="menu-inner-custom">
			<a href="#"> Laporan Pemeriksaan Hujan </a>
		</li>
		<li class="menu-inner-custom">
			<a href="#"> Laporan Permakahan </a>
		</li>
	</ul>
</li>

<li class="">
	<a href="javascript:;">
		<span class="title">Laporan Statistik</span>
		<span class="arrow"></span>
	</a>
	
	<ul class="sub-menu">
		<li class="menu-inner-custom">
			<li class="">
				<a href="javascript:;">
					<span class="title">Statistik Stesen</span>
					<span class="arrow"></span>
				</a>
				
				<ul class="sub-menu">
					<li class="menu-inner-custom">
						<a href="#"> Statistik Pelaporan </a>
					</li>
					<li class="menu-inner-custom">
						<a href="#"> Statistik Permakahan Bulanan </a>
					</li>
				</ul>
			</li>
		</li>
		<li class="menu-inner-custom">
			<a href="#"> Statistik Laporan </a>
		</li>
		<li class="menu-inner-custom">
			<a href="#"> Statistik Permakahan Bulanan </a>
		</li>
	</ul>
</li>


<!-- <li class="">
	<a href="javascript:;" title="Pengurusan Pengguna">
		<span class="title">Pendaftaran Pengguna</span>
		<span class="arrow"></span>
	</a>
	<ul class="sub-menu">
		<li class="">
			<a href="{{ route('external.pengguna.pengurusan_eo') }}" title="Pendaftaran Environmental Officer (EO)">Pendaftaran Environmental Officer (EO)</a>
		</li>
		<li class="">
			<a href="{{ route('external.pengguna.pengurusan_emc') }}" title="Pendaftaran Environmental Monitoring Consultant (EMC)">Pendaftaran Environmental Monitoring Consultant (EMC)</a>
		</li>
	</ul>
</li> -->

<!-- <li class="">
	<a href="javascript:;">
		<span class="title">Laporan</span>
		<span class="arrow"></span>
	</a>
	
	<ul class="sub-menu">
		<li class="menu-inner-custom">
			<a href="#"> Laporan Siasatan </a>
		</li>
		<li class="menu-inner-custom">
			<a href="#"> Laporan Bulanan </a>
		</li>
		<li class="menu-inner-custom">
			<a href="#"> Laporan Pemeriksaan Hujan </a>
		</li>
		<li class="menu-inner-custom">
			<a href="#"> Laporan Permakahan </a>
		</li>
	</ul>
</li> -->

<!-- <li class="">
	<a href="javascript:;">
		<span class="title">Laporan Statistik</span>
		<span class="arrow"></span>
	</a>
	
	<ul class="sub-menu">
		<li class="menu-inner-custom">
			<li class="">
				<a href="javascript:;">
					<span class="title">Statistik Stesen</span>
					<span class="arrow"></span>
				</a>
				
				<ul class="sub-menu">
					<li class="menu-inner-custom">
						<a href="#"> Statistik Pelaporan </a>
					</li>
					<li class="menu-inner-custom">
						<a href="#"> Statistik Permakahan Bulanan </a>
					</li>
				</ul>
			</li>
		</li>
		<li class="menu-inner-custom">
			<a href="#"> Statistik Laporan </a>
		</li>
		<li class="menu-inner-custom">
			<a href="#"> Statistik Permakahan Bulanan </a>
		</li>
	</ul>
</li> -->

{{-- <li class="">
	<a href="javascript:;">
		<span class="title">PPPPP</span>
		<span class="arrow"></span>
	</a>
	
	<ul class="sub-menu">
		<li class="menu-inner-custom">
			<a href="#"> CCCC </a>
		</li>
		<li class="menu-inner-custom">
			<a href="#"> CCCC </a>
		</li>
	</ul>
</li> --}}

{{-- <li> add class open active --}}
	{{-- <span> arrow add class open active --}}
		{{-- li class menu-inner-custom active --}}
		
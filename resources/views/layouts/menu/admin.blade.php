<li class="">
	<a href="javascript:;">
		<span class="title">Admin</span>
		<span class="arrow"></span>
	</a>
	
	<ul class="sub-menu">
		<li class="menu-inner-custom">
			<a href="{{ route('admin.settings') }}">Konfigurasi Sistem</a>
		</li>
		<li class="menu-inner-custom">
			<a href="{{ route('admin.log') }}">Jejak Audit </a>
		</li>
		<li class="menu-inner-custom">
			<li class="{{ (request()->is('admin/role*') || request()->is('admin/permission*') || request()->is('admin/access*')) ? 'open active' : '' }}">
				<a href="javascript:;">
					<span class="title">SRBAC</span>
					<span class="arrow {{ (request()->is('admin/role*') || request()->is('admin/permission*') || request()->is('admin/access*')) ? 'open active' : '' }}"></span>
				</a>
				
				<ul class="sub-menu">
					<li class="menu-inner-custom {{ request()->is('admin/role*') ? 'active' : '' }}">
						<a href="{{ route('admin.role') }}"> Pengurusan Peranan </a>
					</li>
					<li class="menu-inner-custom {{ request()->is('admin/permission*') ? 'active' : '' }}">
						<a href="{{ route('admin.permission') }}"> Pengurusan Tugasan </a>
					</li>
				</ul>
			</li>
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
		<span class="title">Pengurusan Pengguna</span>
		<span class="arrow"></span>
	</a>
	<ul class="sub-menu">
		<li class="menu-inner-custom">
			{{-- <a href="{{ route('user.internal') }}">Pengguna Dalaman</a> --}}
		</li>
		<li class="menu-inner-custom">
			<a href="{{ route('user.external') }}">Pengguna Luar</a>
		</li>
	</ul>
</li> -->
		<li class="menu-inner-custom">
			<a href="{{ route('admin.user.internal') }}"> Pengguna Dalaman </a>
		</li>
		<li class="menu-inner-custom">
			<li class="">
				<a href="javascript:;">
					<span class="title"> Pengguna Luar </span>
					<span class="arrow"></span>
				</a>
				
				<ul class="sub-menu">
					<li class="menu-inner-custom">
						<a href="{{ route('user.externalpp') }}"> Penggerak Projek </a>
					<!-- <a href="{{ url('projek/daftar_penggerak_projek') }}"> Penggerak Projek </a> -->
					</li>
					<li class="menu-inner-custom">
						<a href="{{ url('pengurusan_eo/admin-list') }}"> EO </a>
					</li>
					<li class="menu-inner-custom">
						<a href="{{ url('pengurusan_emc/admin-list') }}"> EMC </a>
					</li>
				</ul>
			</li>
		</li>
		
		<!-- <li class="menu-inner-custom">
			<li class="">
				<a href="javascript:;">
					<span class="title"> Pengguna Luar </span>
					<span class="arrow"></span>
				</a>
				
				<ul class="sub-menu">
					<li class="menu-inner-custom">
						<a href="{{route('pengguna_luar.pp')}}"> Penggerak Projek </a>
					</li>
					<li class="menu-inner-custom">
						<a href="{{route('pengguna_luar.eo')}}"> EO </a>
					</li>
					<li class="menu-inner-custom">
						<a href="{{route('pengguna_luar.emc')}}"> EMC </a>
					</li>
				</ul>
			</li>
		</li> -->

		<li class="menu-inner-custom">
			<a href="{{ route('admin.notification') }}">Pengurusan Notifikasi</a>
		</li>
		<li class="menu-inner-custom">
			<a href="{{ route('admin.email') }}"> Pengurusan Emel</a>
		</li>
	</ul>
</li>


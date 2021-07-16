
<li class="{{ request()->is('monitoring*') ? 'active' : '' }}">
	<a class="" href="{{ route('monitoring') }}">
		<span class="title">SENARAI PROJEK</span>
	</a>
	<span class="icon-thumbnail"><i class="fa fa-bar-chart"></i></span>
</li>
<li class="{{ (request()->is('admin/settings*')||request()->is('admin/log*')||request()->is('admin/quicktemplate*')) ? 'open active' : '' }}">
	<a href="javascript:;">
		<span class="title">Peti Masuk</span>
		<span class="arrow {{ (request()->is('admin/settings*')||request()->is('admin/log*')||request()->is('admin/quicktemplate*')) ? 'open active' : '' }}"></span>
	</a>
	<span class="icon-thumbnail"><span class="fa fa-gear"></span></span>
	<ul class="sub-menu">
		<li class="menu-inner-custom {{ request()->is('admin/settings*') ? 'active' : '' }}">
			<a href="{{ route('admin.settings') }}">Konfigurasi Sistem</a>
		</li>
		<li class="menu-inner-custom {{ request()->is('admin/log*') ? 'active' : '' }}">
			<a href="{{ route('admin.log') }}">Jejak Audit / Log Sistem</a>
		</li>
	</ul>
</li>
<li class="{{ (request()->is('admin/user/internal*') || request()->is('admin/user/external*')) ? 'open active' : '' }}">
	<a href="javascript:;">
		<span class="title">Pendaftaran Pengguna</span>
		<span class="arrow {{ (request()->is('admin/user/internal*') || request()->is('admin/user/external*')) ? 'open active' : '' }}"></span>
	</a>
	<span class="icon-thumbnail"><span class="fa fa-users"></span></span>
	<ul class="sub-menu">
		<li class="menu-inner-custom {{ request()->is('admin/user/internal*') ? 'active' : '' }}">
			<a href="{{ route('admin.user.internal') }}">Pengguna Dalaman</a>
		</li>
		<li class="menu-inner-custom {{ request()->is('admin/user/external*') ? 'active' : '' }}">
			<a href="{{ route('admin.user.external') }}">Pengguna Luar</a>
		</li>
	</ul>
</li>
<li class="{{ (request()->is('admin/role*') || request()->is('admin/permission*') || request()->is('admin/access*')) ? 'open active' : '' }}">
	<a href="javascript:;">
		<span class="title">SRBAC</span>
		<span class="arrow {{ (request()->is('admin/role*') || request()->is('admin/permission*') || request()->is('admin/access*')) ? 'open active' : '' }}"></span>
	</a>
	<span class="icon-thumbnail"><span class="fa fa-gavel"></span></span>
	<ul class="sub-menu">
		<li class="menu-inner-custom {{ request()->is('admin/role*') ? 'active' : '' }}">
			<a href="{{ route('admin.role') }}">Pengurusan Peranan</a>
			<span class="icon-thumbnail">Pp</span>
		</li>
		<li class="menu-inner-custom {{ request()->is('admin/permission*') ? 'active' : '' }}">
			<a href="{{ route('admin.permission') }}">Pengurusan Tugasan</a>
			<span class="icon-thumbnail">Pk</span>
		</li>
		<!-- <li class="menu-inner-custom {{ request()->is('admin/access*') ? 'active' : '' }}">
			<a href="{{ route('admin.access') }}">Pengurusan Keizinan</a>
		</li> -->
	</ul>
</li>
<li class="{{ (request()->is('announcement*') || request()->is('admin/backup*') || request()->is('admin/notification*') || request()->is('admin/letter*') || request()->is('admin/holiday*') || request()->is('admin/faq*') || request()->is('admin/signature*') || request()->is('distribution*')) ? 'open active' : '' }}">
	<a href="javascript:;">
		<span class="title">Laporan Bulanan</span>
		<span class="arrow {{ (request()->is('announcement*') || request()->is('admin/backup*') || request()->is('admin/notification*') || request()->is('admin/letter*') || request()->is('admin/holiday*') || request()->is('admin/faq*') || request()->is('admin/signature*') || request()->is('distribution*')) ? 'open active' : '' }}"></span>
	</a>
	<span class="icon-thumbnail">P</span>
	<ul class="sub-menu">
		<li class="menu-inner-custom {{ request()->is('announcement*') ? 'active' : '' }}">
			<a href="{{ route('announcement') }}">Pengurusan Pengumuman</a>
		</li>
		<li class="menu-inner-custom {{ request()->is('admin/backup*') ? 'active' : '' }}">
			<a href="{{ route('admin.backup') }}">Pengurusan Simpanan Data</a>
		</li>
		<li class="menu-inner-custom {{ request()->is('admin/notification*') ? 'active' : '' }}">
			<a href="{{ route('admin.notification') }}">Pengurusan Notifikasi</a>
		</li>
		<li class="menu-inner-custom {{ request()->is('admin/letter*') ? 'active' : '' }}">
			<a href="{{ route('admin.letter') }}">Pengurusan Paparan Surat</a>
		</li>
		<li class="menu-inner-custom {{ request()->is('admin/holiday*') ? 'active' : '' }}">
			<a href="{{ route('admin.holiday') }}">Pengurusan Cuti</a>
		</li>
		<li class="menu-inner-custom {{ request()->is('admin/faq*') ? 'active' : '' }}">
			<a href="{{ route('admin.faq') }}">Pengurusan Soalan Lazim (FAQ)</a>
		</li>
		<!-- <li class="menu-inner-custom {{ request()->is('admin/signature*') ? 'active' : '' }}">
			<a href="{{ route('admin.signature') }}">Pengurusan Tandatangan</a>
		</li> -->
		<!-- <li class="menu-inner-custom {{ request()->is('distribution*') ? 'active' : '' }}">
			<a href="{{ route('distribution') }}">Pengurusan Agihan</a>
		</li> -->
	</ul>
</li>
<li class="{{ (request()->is('admin/master/designation*') || request()->is('admin/master/meeting-type*') || request()->is('admin/master/announcement-type*') || request()->is('admin/master/programme-type*') || request()->is('admin/master/faq-type*') || request()->is('admin/master/holiday-type*') || request()->is('admin/master/region*') || request()->is('admin/master/court*') || request()->is('admin/master/sector-category*') || request()->is('admin/master/complaint-classification*') || request()->is('admin/master/province-office*') || request()->is('admin/master/attorney*') || request()->is('admin/master/sector*')) ? 'open active' : '' }}">
	<a href="javascript:;">
		<span class="title">Pengurusan Kuiri</span>
		<span class="arrow {{ (request()->is('admin/master/designation*') || request()->is('admin/master/meeting-type*') || request()->is('admin/master/announcement-type*') || request()->is('admin/master/programme-type*') || request()->is('admin/master/faq-type*') || request()->is('admin/master/holiday-type*') || request()->is('admin/master/region*') || request()->is('admin/master/court*') || request()->is('admin/master/sector-category*') || request()->is('admin/master/complaint-classification*') || request()->is('admin/master/province-office*') || request()->is('admin/master/attorney*') || request()->is('admin/master/sector*')) ? 'open active' : '' }}"></span>
	</a>
	<span class="icon-thumbnail">Di</span>
	<ul class="sub-menu">
		<li class="menu-inner-custom {{ request()->is('admin/master/designation*') ? 'active' : '' }}">
			<a href="{{ route('admin.master.designation') }}">Jawatan</a>
		</li>
		<li class="menu-inner-custom {{ request()->is('admin/master/announcement-type*') ? 'active' : '' }}">
			<a href="{{ route('admin.master.announcement-type') }}">Jenis Pengumuman</a>
		</li>
		<li class="menu-inner-custom {{ request()->is('admin/master/faq-type*') ? 'active' : '' }}">
			<a href="{{ route('admin.master.faq-type') }}">Jenis Soalan Lazim (FAQ)</a>
		</li>
		<li class="menu-inner-custom {{ request()->is('admin/master/holiday-type*') ? 'active' : '' }}">
			<a href="{{ route('admin.master.holiday-type') }}">Jenis Cuti</a>
		</li>
		<li class="menu-inner-custom {{ request()->is('admin/master/province-office*') ? 'active' : '' }}">
			<a href="{{ route('admin.master.province-office') }}">Senarai Jabatan Negeri</a>
		</li>
	</ul>
</li>
<li class="{{ (request()->is('admin/master/designation*') || request()->is('admin/master/meeting-type*') || request()->is('admin/master/announcement-type*') || request()->is('admin/master/programme-type*') || request()->is('admin/master/faq-type*') || request()->is('admin/master/holiday-type*') || request()->is('admin/master/region*') || request()->is('admin/master/court*') || request()->is('admin/master/sector-category*') || request()->is('admin/master/complaint-classification*') || request()->is('admin/master/province-office*') || request()->is('admin/master/attorney*') || request()->is('admin/master/sector*')) ? 'open active' : '' }}">
	<a href="javascript:;">
		<span class="title">Status Pengawasan <br>Mengikut Bulan</span>
		<span class="arrow {{ (request()->is('admin/master/designation*') || request()->is('admin/master/meeting-type*') || request()->is('admin/master/announcement-type*') || request()->is('admin/master/programme-type*') || request()->is('admin/master/faq-type*') || request()->is('admin/master/holiday-type*') || request()->is('admin/master/region*') || request()->is('admin/master/court*') || request()->is('admin/master/sector-category*') || request()->is('admin/master/complaint-classification*') || request()->is('admin/master/province-office*') || request()->is('admin/master/attorney*') || request()->is('admin/master/sector*')) ? 'open active' : '' }}"></span>
	</a>
	<span class="icon-thumbnail"><span class="fa fa-telescope"></span></span>
	
	<ul class="sub-menu">
		<li class="menu-inner-custom {{ request()->is('admin/master/designation*') ? 'active' : '' }}">
			<a href="{{ route('admin.master.designation') }}">Jawatan</a>
		</li>
		<li class="menu-inner-custom {{ request()->is('admin/master/announcement-type*') ? 'active' : '' }}">
			<a href="{{ route('admin.master.announcement-type') }}">Jenis Pengumuman</a>
		</li>
		<li class="menu-inner-custom {{ request()->is('admin/master/faq-type*') ? 'active' : '' }}">
			<a href="{{ route('admin.master.faq-type') }}">Jenis Soalan Lazim (FAQ)</a>
		</li>
		<li class="menu-inner-custom {{ request()->is('admin/master/holiday-type*') ? 'active' : '' }}">
			<a href="{{ route('admin.master.holiday-type') }}">Jenis Cuti</a>
		</li>
		<li class="menu-inner-custom {{ request()->is('admin/master/province-office*') ? 'active' : '' }}">
			<a href="{{ route('admin.master.province-office') }}">Senarai Jabatan Negeri</a>
		</li>
	</ul>
</li>
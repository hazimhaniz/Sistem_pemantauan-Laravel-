<li class="m-t-30 {{ request()->is('home*') ? 'active' : '' }}">
    <a class="" href="{{ route('home') }}">
        <span class="title">Laman Utama </span>
    </a>
</li>

@hasanyrole(['pp'])
<li class="">
    <a href="javascript:;">
        <span class="title"> Rekod Projek </span>
        <span class="arrow"></span>
    </a>
    <ul class="sub-menu">
        <li class="menu-inner-custom">
            <a href="{{ route('projek.senarai_projek') }}"> Senarai Projek </a>
        </li>
        @php
        $year = date('Y');
        $month = date('m');
        @endphp
        @foreach($projeks as $projek)
        <li class="menu-inner-custom">
            <a href="{{route('projek.form',['id' => $projek->id, 'year' => $year, 'month' => $month])}}"> {{ $projek->no_fail_jas }} </a>
        </li>
        @endforeach
    </ul>
</li>

<li class="">
    <a href="javascript:;">
        <span class="title">Pengurusan Stesen</span>
        <span class="arrow"></span>
    </a>
    
    <ul class="sub-menu">
        <li class="menu-inner-custom">
            <a href="#"> Belum Disemak </a>
        </li>
        <li class="menu-inner-custom">
            <a href="#"> Telah Disemak </a>
        </li>
        <li class="menu-inner-custom">
            <a href="#"> Semakan Stesen Tambahan </a>
        </li>
    </ul>
</li>
@endhasanyrole

@hasanyrole(['eo'])
<li class="">
    <a href="javascript:;">
        <span class="title"> Pengurusan Projek </span>
        <span class="arrow"></span>
    </a>
    <ul class="sub-menu">
        @php
        $year = date('Y');
        $month = date('m');
        @endphp
        @foreach($projeks as $projek)
        <li class="menu-inner-custom">
            <a href="{{route('projek.form',['id' => $projek->id, 'year' => $year, 'month' => $month])}}"> {{ $projek->no_fail_jas }} </a>
        </li>
        @endforeach
    </ul>
</li>
@endhasanyrole

@hasanyrole(['emc'])
<li class="">
    <a href="javascript:;">
        <span class="title"> Pengurusan Projek </span>
        <span class="arrow"></span>
    </a>
    <ul class="sub-menu">
        @php
        $year = date('Y');
        $month = date('m');
        @endphp
        @foreach($projeks as $projek)
        <li class="menu-inner-custom">
            <a href="{{route('projek.form',['id' => $projek->id, 'year' => $year, 'month' => $month])}}"> {{ $projek->no_fail_jas }} </a>
        </li>
        @endforeach
    </ul>
</li>
@endhasanyrole


@hasanyrole(['penyelia|penyiasat|superadmin|pengarah|admin_state|admin_hq|staff'])
<li class="">
    <a href="javascript:;">
        <span class="title"> Rekod EKAS </span>
        <span class="arrow"></span>
    </a>
    <ul class="sub-menu">
        <li class="menu-inner-custom">
            <a href="{{ url('/rekodEkas/senarai') }}"> Senarai Rekod Ekas </a>
        </li>
        <li class="menu-inner-custom">
            <a href="{{ url('/rekodEkas/senarai') }}?status=belum_diagih"> Senarai rekod ekas yang belum diagih </a>
        </li>
        <li class="menu-inner-custom">
            <a href="{{ url('/rekodEkas/senarai') }}?status=telah_diagih"> Senarai rekod ekas yang telah diagih </a>
        </li>
    </ul>
</li>

<li class="">
    <a href="javascript:;">
        <span class="title">Pengurusan Projek</span>
        <span class="arrow"></span>
    </a>
    <ul class="sub-menu">
        <li class="menu-inner-custom">
            <a href="{{ url('/pengurusan_projek/aktif') }}"> Senarai Projek Aktif </a>
        </li>
        <li class="menu-inner-custom">
            <a href="{{ url('/pengurusan_projek/belum_disahkan') }}"> Senarai Projek Belum Disahkan </a>
        </li>
        <li class="menu-inner-custom">
            <a href="{{ url('/pengurusan_projek/telah_disahkan') }}"> Senarai Projek Telah Disahkan </a>
        </li>
    </ul>
</li>

<li class="">
    <a href="javascript:;">
        <span class="title">Pengurusan Stesen</span>
        <span class="arrow"></span>
    </a>
    
    <ul class="sub-menu">
        <li class="menu-inner-custom">
            <a href="{{ url('/pengesahan_stesen/senarai_stesen') }}"> Senarai Stesen </a>
        </li>
    </ul>
</li>

<li class="">
    <a href="javascript:;">
        <span class="title">Laporan Siasatan</span>
        <span class="arrow"></span>
    </a>
    <ul class="sub-menu">
        <li class="menu-inner-custom">
            <a href="{{ url('/pengurusan_projek/laporan/siasatan') }}"> Senarai Laporan Siasatan </a>
        </li>
        <li class="menu-inner-custom">
            <a href="{{ url('/pengurusan_projek/laporan/siasatan') }}?status=belum_diluluskan"> Belum Diluluskan </a>
        </li>
        <li class="menu-inner-custom">
            <a href="{{ url('/pengurusan_projek/laporan/siasatan') }}?status=telah_diluluskan"> Telah Diluluskan </a>
        </li>
    </ul>
</li>

<li class="">
    <a href="javascript:;">
        <span class="title">Laporan Bulanan</span>
        <span class="arrow"></span>
    </a>
    <ul class="sub-menu">
        <li class="menu-inner-custom">
            <a href="{{ url('/pengurusan_projek/laporan/bulanan') }}?status=pengarah"> Senarai Laporan Bulanan </a>
        </li>
    </ul>
</li>

<li class="">
    <a href="javascript:;">
        <span class="title">Laporan Pemarkahan</span>
        <span class="arrow"></span>
    </a>
    <ul class="sub-menu">
        <li class="menu-inner-custom">
            <a href="{{ url('/pengurusan_projek/laporan/pemarkahan') }}"> Senarai </a>
        </li>
    </ul>
</li>
@endhasanyrole

@hasanyrole(['superadmin|penyiasat|penyelia|pengarah|admin_state|admin_hq|staff'])
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
        <li class="menu-inner-custom">
           <li class="">
            <a href="javascript:;">
                <span> Pengguna Dalaman </span>
                <span class="arrow"></span>
            </a>
            <ul class="sub-menu">
                <li class="menu-inner-custom">
                    <a href="{{ route('admin.user.internal') }}">Senarai pengguna dalaman</a>
                </li>
                <li class="menu-inner-custom">
                    <a href="{{ route('admin.user.internal.penukaran_staf') }}">Penukaran pengguna dalaman</a>
                </li>
            </ul>
        </li>
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
    <li class="menu-inner-custom">
        <a href="{{ route('admin.notification') }}">Pengurusan Notifikasi</a>
    </li>
    <li class="menu-inner-custom">
        <a href="{{ route('admin.review.list.nofile') }}">Muat naik integrasi No fail Jas</a>
    </li>
</ul>
</li>
@endhasanyrole

<script type="text/javascript">
    $(document).ready(function(){
        var selectedUrl = "{{ Request::url() }}";
        var selectedMenu = $('a[href="'+ selectedUrl +'"]');
        
        if(selectedMenu)
        {
            var parentLI = selectedMenu.parent('li');
            if(parentLI)
            {
                parentLI.addClass('open active');
                var parentUL = parentLI.parents('ul');
            }
        }
    });
</script>
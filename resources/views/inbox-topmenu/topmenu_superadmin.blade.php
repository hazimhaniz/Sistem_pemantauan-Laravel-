<div class="inbox-topmenu">
    <button onclick="event.preventDefault(); document.getElementById('logout-form').submit();" data-toggle="tooltip" title="Log Keluar" class="btn btn-default pull-right btn-breadcrumb" style="background-color: #f16c20;"><i class="fa fa-sign-out"></i></button>
    <button onclick="location.href='{{ route('admin.settings') }}'" data-toggle="tooltip" title="Konfigurasi Sistem" class="btn btn-default pull-right btn-breadcrumb" style="background-color: #8bc34a;"><i class="fa fa-area-chart"></i></button>
    <button onclick="location.href='{{ route('admin.backup') }}'" data-toggle="tooltip" title="Simpanan Data" class="btn btn-default pull-right btn-breadcrumb" style="background-color: #4caf50;"><i class="fa fa-database"></i></button>
    <button onclick="location.href='{{ route('admin.log') }}'" data-toggle="tooltip" title="Jejak Audit" class="btn btn-default pull-right btn-breadcrumb" style="background-color: #009688;"><i class="fa fa-list"></i></button>
    <button onclick="location.href='{{ route('admin.user.external') }}'" data-toggle="tooltip" title="Pengguna Luaran" class="btn btn-default pull-right btn-breadcrumb" style="background-color: #3d8db4;"><i class="fa fa-users"></i></button>
    <button onclick="location.href='{{ route('inbox') }}'" data-toggle="tooltip" title="Inbox" class="btn btn-default pull-right btn-breadcrumb" style="background-color: #607d8b;">
        <i class="fa fa-envelope"></i>
        @if($unread)
        <span class="badge badge-danger">{{ $unread }}</span>
        @endif
    </button>
    <button onclick="profileData()" data-toggle="tooltip" title="Profil" class="btn btn-default pull-right btn-breadcrumb" style="background-color: #465662;"><i class="fa fa-user"></i></button>
</div>
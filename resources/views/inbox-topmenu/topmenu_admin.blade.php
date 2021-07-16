<div class="inbox-topmenu">
    <button onclick="event.preventDefault(); document.getElementById('logout-form').submit();" data-toggle="tooltip" title="Log Keluar" class="btn btn-default pull-right btn-breadcrumb" style="background-color: #f16c20;"><i class="fa fa-sign-out"></i></button>
    <button onclick="location.href='{{ route('inbox') }}'" data-toggle="tooltip" title="Inbox" class="btn btn-default pull-right btn-breadcrumb" style="background-color: #607d8b;">
        <i class="fa fa-envelope"></i>
        @if($unread)
        <span class="badge badge-danger">{{ $unread }}</span>
        @endif
    </button>
    <button onclick="profileData()" data-toggle="tooltip" title="Profil" class="btn btn-default pull-right btn-breadcrumb" style="background-color: #465662;"><i class="fa fa-user"></i></button>
</div>
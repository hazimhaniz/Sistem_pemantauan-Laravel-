<div class="inbox-topmenu">
    <button onclick="event.preventDefault(); document.getElementById('logout-form').submit();" data-toggle="tooltip" title="@lang('general.logout')" class="btn btn-default pull-right btn-breadcrumb" style="background-color: #f16c20;"><i class="fa fa-sign-out"></i></button>
    @if(auth()->user()->hasRole('union'))
    <button onclick="location.href='{{ route('search.union') }}'" data-toggle="tooltip" title="Carian" class="btn btn-default pull-right btn-breadcrumb" style="background-color: #f1b420;"><i class="fa fa-search"></i></button>
    @endif
    @if(auth()->user()->hasRole('union'))
    <button onclick="location.href='{{ route('statement.ks.list') }}'" data-toggle="tooltip" title="Kewangan" class="btn btn-default pull-right btn-breadcrumb" style="background-color: #8bc34a;"><i class="fa fa-money"></i></button>
    @endif
    @if(auth()->user()->hasRole('union'))
    <button onclick="location.href='{{ route('investigation.complaint.list') }}'" data-toggle="tooltip" title="Aduan" class="btn btn-default pull-right btn-breadcrumb" style="background-color: #4caf50;"><i class="fa fa-folder-open"></i></button>
    @endif
    @if(auth()->user()->hasRole('union'))
    <button onclick="location.href='{{ route('formlu.list') }}'" data-toggle="tooltip" title="Borang LU" class="btn btn-default pull-right btn-breadcrumb" style="background-color: #009688;"><i class="fa fa-file-text"></i></button>
    @endif
    @if(auth()->user()->hasRole('union'))
    <button onclick="location.href='{{ route('ectr4u.list') }}'" data-toggle="tooltip" title="eCTR4U" class="btn btn-default pull-right btn-breadcrumb" style="background-color: #3d8db4;"><i class="fa fa-calendar"></i></button>
    @endif
    {{-- <button onclick="location.href='{{ route('inbox') }}'" data-toggle="tooltip" title="@lang('general.inbox')" class="btn btn-default pull-right btn-breadcrumb" style="background-color: #607d8b;">
        <i class="fa fa-envelope"></i>
        @if($unread)
        <span class="badge badge-danger">{{ $unread }}</span>
        @endif
	 </button> --}}
	 @if(auth()->user()->user_type_id>2)
	 <button onclick="profileData()" data-toggle="tooltip" title="@lang('general.profile')" class="btn btn-default pull-right btn-breadcrumb" style="background-color: #465662;"><i class="fa fa-user"></i></button>
	 @endif
</div>

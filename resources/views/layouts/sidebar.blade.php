<!-- BEGIN SIDEBPANEL-->
<nav class="page-sidebar" data-pages="sidebar">
	<!-- BEGIN SIDEBAR MENU HEADER-->
	<div class="sidebar-header">
		<?php if (file_exists(public_path('images/'.config('global')['logo_header']))): ?>
			<img alt="logo" class="brand" data-src="{{ asset('images/'.config('global')['logo_header']) }}" data-src-retina="{{ asset('images/'.config('global')['logo_header']) }}" src="{{ asset('images/'.config('global')['logo_header']) }}" width="50">
		<?php else: ?>
			<img alt="logo" class="brand" data-src="{{ asset('storage/'.config('global')['logo_header']) }}" data-src-retina="{{ asset('storage/'.config('global')['logo_header']) }}" src="{{ asset('storage/'.config('global')['logo_header']) }}" width="50">
		<?php endif ?>
	</div><!-- END SIDEBAR MENU HEADER-->
	<!-- START SIDEBAR MENU -->
	<div class="sidebar-menu">
		<!-- BEGIN SIDEBAR MENU ITEMS-->
		<ul class="menu-items">

			@include('layouts.menu')
			
		</ul>
		<div class="clearfix"></div>
	</div><!-- END SIDEBAR MENU -->
</nav><!-- END SIDEBAR -->
<!-- END SIDEBPANEL-->
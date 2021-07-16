<?php 

$menu = \App\OtherModel\Menu::whereNull('parent')->orderBy('sequence','asc')->get();

?>

<?php foreach ($menu as $key => $value): ?>

	<?php if (\App\OtherModel\Menu::where('parent',$value->id)->first()): ?>
		<?php $openactive = false; $givenaccess = false; ?>
		<?php foreach (\App\OtherModel\Menu::where('parent',$value->id)->orderBy('sequence','asc')->get() as $key2 => $value2): ?>
		<?php 
			if (!$openactive) {
				$route2 = $value2->link;
				$request2 = str_replace('.','/',$value2->link).'*';

				$openactive = request()->is($request2);
			}
			if (!$givenaccess) {
				$givenaccess = auth()->user()->hasPermissionTo($value2->link);
			}
		?>
		<?php endforeach ?>
		<?php if ($givenaccess): ?>
		<li class="{{ $key == 0 ? 'm-t-30' : '' }} {{ $openactive ? 'open active' : '' }}">
			<a href="javascript:;">
				<span class="title">{{$value->name}}</span>
				<span class="arrow {{ request()->is($value->link) ? 'open active' : '' }}"></span>
			</a>
			<span class="icon-thumbnail">
				<?php if (strlen($value->symbol)>4): ?>
					<i class="fa {{$value->symbol}}"></i>
				<?php else: ?>
					{{$value->symbol}}
				<?php endif ?>
			</span>
			<ul class="sub-menu">
			<?php foreach (\App\OtherModel\Menu::where('parent',$value->id)->orderBy('sequence','asc')->get() as $key2 => $value2): ?>
				<?php 
					$givenaccess2 = false;

					if (Route::has($value2->link)) {
						$route2 = route($value2->link);
						$givenaccess2 = auth()->user()->hasPermissionTo($value2->link);
					}else{
						$route2 = $value2->link;
						$givenaccess2 = true;
					}
					$request2 = str_replace('.','/',$value2->link).'*';
				?>
					<?php if ($givenaccess2): ?>
						@if($value2->link == 'parent2')
							<li class="{{ $key == 0 ? 'm-t-30' : '' }} {{ $openactive ? 'open active' : '' }}">
								<a href="javascript:;">
									<span class="title">{{$value2->name}}</span>
									<span class="arrow {{ request()->is($value2->link) ? 'open active' : '' }}"></span>
								</a>
								<span class="icon-thumbnail">
									<?php if (strlen($value2->symbol)>4): ?>
										<i class="fa {{$value2->symbol}}"></i>
									<?php else: ?>
										{{$value2->symbol}}
									<?php endif ?>
								</span>
								<ul class="sub-menu">
								<?php foreach (\App\OtherModel\Menu::where('parent',$value2->id)->orderBy('sequence','asc')->get() as $key2 => $value3): ?>
									<?php 
										$givenaccess2 = false;

										if (Route::has($value3->link)) {
											$route2 = route($value3->link);
											$givenaccess2 = auth()->user()->hasPermissionTo($value3->link);
										}else{
											$route2 = $value3->link;
											$givenaccess2 = true;
										}
										$request2 = str_replace('.','/',$value3->link).'*';
									?>
										<?php if ($givenaccess2): ?>
											<li class="{{ request()->is($request2) ? 'active' : '' }}">
												<a href="{{ $route2 }}">{{$value3->name}}</a>
												<span class="icon-thumbnail">
													<?php if (strlen($value3->symbol)>4): ?>
														<i class="fa {{$value3->symbol}}"></i>
													<?php else: ?>
														{{$value3->symbol}}
													<?php endif ?>
												</span>
											</li>
										<?php endif ?>
								<?php endforeach ?>
								</ul>
							</li>
						@else
							<li class="{{ request()->is($request2) ? 'active' : '' }}">
								<a href="{{ $route2 }}">{{$value2->name}}</a>
								<span class="icon-thumbnail">
									<?php if (strlen($value2->symbol)>4): ?>
										<i class="fa {{$value2->symbol}}"></i>
									<?php else: ?>
										{{$value2->symbol}}
									<?php endif ?>
								</span>
							</li>
						@endif
					<?php endif ?>
			<?php endforeach ?>
			</ul>
		</li>
		<?php endif ?>
	<?php else: ?>
		<?php 
			$givenaccess = false;

			if (Route::has($value->link)) {
				$route = route($value->link);
				$givenaccess = auth()->user()->hasPermissionTo($value->link);
			}else{
				$route = $value->link;
				$givenaccess = true;
			}
			$request = str_replace('.','/',$value->link).'*';
		?>
		<?php if ($givenaccess): ?>
		<li class="{{ $key == 0 ? 'm-t-30' : '' }} {{ request()->is($request) ? 'active' : '' }}">
			<a href="{{ $route }}">
				<span class="title">{{$value->name}}</span>
			</a>
			<span class="icon-thumbnail">
				<?php if (strlen($value->symbol)>4): ?>
					<i class="fa {{$value->symbol}}"></i>
				<?php else: ?>
					{{$value->symbol}}
				<?php endif ?>
			</span>
		</li>
		<?php endif ?>
	<?php endif ?>

<?php endforeach ?>
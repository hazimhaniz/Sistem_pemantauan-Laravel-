<!-- START CONTAINER FLUID -->
<div class=" container-fluid container-fixed-lg bg-white">
	<!-- START card -->
	<div class="card card-transparent">
		
		{!! $calendar->calendar() !!}
		
	</div>
	<!-- END card -->
	<div class="row mt-5">
		<div class="col-md-12">
			<ul class="pager wizard no-style">
				<li class="previous">
					<button class="btn btn-default btn-cons btn-animated from-left fa fa-angle-left" type="button">
						<span>Kembali</span>
					</button>
				</li>
			</ul>
		</div>
	</div>
</div>
<!-- END CONTAINER FLUID -->

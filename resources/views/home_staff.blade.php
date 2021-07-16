@extends('layouts.app')
@include('plugins.datatables')

@push('css')
<style type="text/css">
    .widget-9 {
        height: unset !important;
        padding-bottom: 20px;
        padding-top: 20px;
    }

    .text-black {
        color: #000 !important;
    }

    x-small {
        font-size: medium !important;
    }

    .modal-open .select2-container {
        z-index: unset !important;
    }
</style>
@endpush

@section('content')
<!-- START JUMBOTRON -->
<div class="jumbotron" data-pages="parallax">
    <div class=" container-fluid container-fixed-lg sm-p-l-0 sm-p-r-0">
        <div class="inner">
            <!-- START BREADCRUMB -->
            <div class="row">
                <ol class="breadcrumb col-md-4 p-l-15">
                    <li class="breadcrumb-item active"><a>@lang('sidebar.home')</a></li>
                </ol>

            </div>
        </div>
    </div>
</div>
<!-- END JUMBOTRON -->

<!-- START CONTAINER FLUID -->
<div class=" container-fluid container-fixed-lg">

    <?php
        setlocale(LC_TIME, "ms", "my_MS", "ms_MY");
    ?>

    <h3>Welcome, {{ auth()->user()->name }}</h3>
    @if(auth()->user()->last_login_date)
    <p>Last login on {{ strftime("%e %B %Y %I:%M:%S %p", strtotime(auth()->user()->last_login_date)) }}.</p>
    @endif
    <div class="clearfix"></div>
    @if(!auth()->user()->hasRole('pm'))
    <div class="row">
        <div class="col-md-12">

            <div class="widget-12 card no-border widget-loader-circle no-margin padding-30">
                <div class="card-block">
                    <div class="row">
                        <div class="col-sm-8">
                            <div class="row">
                                <div class="col-md-12">
                                    <h4>Payment <span class="bold">Summary</span></h4>
                                </div>
                                <div class="col-md-12">
                                    <div>

                                    </div>
                                </div>
                                <div class="col-md-12">
									<!--
                                    <table class="table table-hover m-t-20" id="table-filings">
                                        <thead>
                                            <tr>
                                                <th class="fit">No.</th>
                                                <th>Module/Form</th>
                                                <th>Transaction No.</th>
                                                <th>Registration Date</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                    </table>
									-->
									  <div class="row invoice-info">
										<div class="col-sm-6 invoice-col">
										  From
										  <address>
											<strong>Gaben Steam, Inc.</strong><br>
											795 Folsom Ave, Suite 600<br>
											San Francisco, CA 94107<br>
											Phone: (804) 123-5432<br>
											Email: info@steam.com
										  </address>
										</div>
										<!-- /.col -->
										<div class="col-sm-6 invoice-col">
										  To
										  <address>
											<strong>Kastam Diraja Malaysia</strong><br>
											Kompleks Kementerian Kewangan, No. 3<br>
											Persiaran Perdana Presint 2, 62596 Putrajaya<br>
											Phone: (603) 539-1037<br>
											Email: kastam.my@example.com
										  </address>
										</div>
									  </div>
									  
									  <!-- Table row -->
									  <div class="row">
										<div class="col-xs-12 table-responsive">
										  <table class="table table-hover table-responsive dataTable no-footer display nowrap" id="" role="grid" aria-describedby="table_info">
											<thead>
											<tr>
											  <th>Qty</th>
											  <th>Product</th>
											  <th>Ref Num #</th>
											  <th>Description</th>
											  <th>Subtotal</th>
											</tr>
											</thead>
											<tbody>
											<tr>
											  <td>1</td>
											  <td>Call of Duty</td>
											  <td>455-981-221</td>
											  <td>El snort testosterone trophy driving gloves handsome</td>
											  <td>MYR 64.50</td>
											</tr>
											<tr>
											  <td>1</td>
											  <td>Need for Speed IV</td>
											  <td>247-925-726</td>
											  <td>Wes Anderson umami biodiesel</td>
											  <td>MYR 50.00</td>
											</tr>
											<tr>
											  <td>1</td>
											  <td>Monsters DVD</td>
											  <td>735-845-642</td>
											  <td>Terry Richardson helvetica tousled street art master</td>
											  <td>MYR 10.70</td>
											</tr>
											<tr>
											  <td>1</td>
											  <td>Grown Ups Blue Ray</td>
											  <td>422-568-642</td>
											  <td>Tousled lomo letterpress</td>
											  <td>MYR 25.99</td>
											</tr>
											</tbody>
										  </table>
										</div>
										<!-- /.col -->
									  </div>
									  <!-- /.row -->
									  
									  <div class="row">
										<!-- accepted payments column -->

										  <h3>Amount Due 01/01/2020</h3>

										  <div class="table-responsive">
											<table class="table">
											  <tbody><tr>
												<th style="width:50%">Subtotal:</th>
												<td>MYR 250.30</td>
											  </tr>
											  <tr>
												<th>Tax (6%)</th>
												<td>MYR 10.34</td>
											  </tr>
											  <tr>
												<th>Shipping:</th>
												<td>MYR 5.80</td>
											  </tr>
											  <tr>
												<th>Total:</th>
												<td>MYR 265.24</td>
											  </tr>
											</tbody></table>
										  </div>

									  </div>
									  <!-- /.row -->
									
									  <!-- this row will not appear when printing -->
									  <div class="row no-print">
										<div class="col-xs-12">
										  <a href="./storage/invoice-print.html" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
										<!--
										 <button type="button" class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Submit Payment
										  </button>
										-->
											<a class="btn btn-success pull-right" data-toggle="modal" id="fpxModalBtn" data-target="#fpxModal"> <i class="fa fa-credit-card"></i> Submit Payment </a>
										  <!--
										  <button type="button" class="btn btn-primary pull-right" style="margin-right: 5px;">
											<i class="fa fa-download"></i> Generate PDF
										  </button>
										  -->
											<a href="./storage/invoice-print.html" target="_blank" class="btn btn-primary pull-right"><i class="fa fa-print"></i> Generate PDF</a>
										</div>
									  </div>
									  
									  
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <hr class="d-sm-block d-md-none">
                            <div class="widget-12-search">
                                <h4 class="pull-left">New
                                    <span class="bold">Annoucements</span>
                                </h4>
                                <div class="clearfix"></div>
                            </div>
                            <div class="company-stat-boxes" style="max-height: 400px; overflow-y: auto;">
				  <!-- Table row -->
				  <div class="row">
					<div class="col-xs-12 table">
					  <table class="table table-hover table-responsive dataTable no-footer display nowrap" id="" role="grid" aria-describedby="table_info">
						<thead>
						<tr>
						  <th><center><i class="fa fa-eye" aria-hidden="true"></i></center></th>
						  <th>Description</th>
						  <th>Status</th>
						</tr>
						</thead>
						<tbody>
						<tr>
						  <!-- <td><center><a class="btn btn-info btn-sm" data-toggle="modal" id="viewAnouncementModalBtn" data-target="#viewAnouncementModal"> View </a></center></td> -->
						  <td><a class="dt-button buttons-html5 btn btn-info btn-xs" tabindex="-1" aria-controls="table" type="button" onclick="" style="" data-toggle="modal" id="" data-target="#viewAnouncementModal"><span> <i class="fa fa-search"></i> View</span></a></td>
						  <td><strong>[01/01/2020]</strong><br> 6% Tax on Digital Services passed</td>
						  <td><small class="label pull-right bg-yellow">SOON</small></td>
						</tr>
						<tr>
						  <td><a class="dt-button buttons-html5 btn btn-info btn-xs" tabindex="-1" aria-controls="table" type="button" onclick="" style="" data-toggle="modal" id="" data-target="#viewAnouncementModal"><span> <i class="fa fa-search"></i> View</span></a></td>
						  <td><strong>[01/12/2019]</strong><br> Service Tax on Digital Service with new interactive dashboard</td>
						  <td><small class="label pull-right bg-yellow">SOON</small></td>
						</tr>
						<tr>
						  <td><a class="dt-button buttons-html5 btn btn-info btn-xs" tabindex="-1" aria-controls="table" type="button" onclick="" style="" data-toggle="modal" id="" data-target="#viewAnouncementModal"><span> <i class="fa fa-search"></i> View</span></a></td>
						  <td><strong>[25/12/2019]</strong><br> Guides for Sales Tax Deduction Facility</td>
						  <td><small class="label pull-right bg-red">NEW</small></td>
						</tr>
						<tr>
						  <td><a class="dt-button buttons-html5 btn btn-info btn-xs" tabindex="-1" aria-controls="table" type="button" onclick="" style="" data-toggle="modal" id="" data-target="#viewAnouncementModal"><span> <i class="fa fa-search"></i> View</span></a></td>
						  <td><strong>[25/12/2019]</strong><br> Refund on The Acquisition of Services by Foreign Missions</td>
						  <td><small class="label pull-right bg-red">NEW</small></td>
						</tr>
						<tr>
						  <td><a class="dt-button buttons-html5 btn btn-info btn-xs" tabindex="-1" aria-controls="table" type="button" onclick="" style="" data-toggle="modal" id="" data-target="#viewAnouncementModal"><span> <i class="fa fa-search"></i> View</span></a></td>
						  <td><strong>[25/12/2019]</strong><br> Service Tax on Digital Service (Registration) </td>
						  <td><small class="label pull-right bg-green">DONE</small></td>
						</tr>
						</tbody>
					  </table>
					</div>
					<!-- /.col -->
				  </div>
				  <!-- /.row -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    @endif
</div>
<!-- END CONTAINER FLUID -->

<!-- Add New Modal Business Owner -->
<div class="modal fade left" id="viewAnouncementModal" tabindex="-1" role="dialog">
	<div class="modal-dialog modal-xl">
		<div class="modal-content rounded-0">
			<form class="form-horizontal" id="submitBusOwnerForm" action="php_action/DST01_create_BusOwner.php" method="POST" enctype="multipart/form-data">
			
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h3 class="modal-title"><font size="6px">&nbsp 6% Tax on Digital Services passed</font></h3>
				</div>
				
				<!-- <div class="modal-body" style="max-height:450px; overflow:auto;"> -->
				<div class="modal-body row-fluid">
				
					<div id="addSuccessMsg"></div>
					
					<div class="col-md-6">					

						<br>
						<img src="./storage/dummy1.jpg" width="100%">
						

					</div>
					<!--
					<div class="col-md-6">					
						<div class="row-fluid">
							<label for="bus_app_name" class="control-label">Date</label>
							<input type="text" class="form-control" id="bus_app_name" placeholder="Date" name="bus_app_name" disabled >
						</div>
						<br>
					
						<div class="row-fluid">
							<label for="bus_own_passport" class="control-label">Title</label>
							<input type="text" class="form-control" id="bus_own_passport" placeholder="Title" name="bus_own_passport" disabled >
						</div>
						<br>
					</div>	
					-->
					<div class="col-md-12">
						<div class="row-fluid">
							<label for="bus_own_tel" class="control-label">Description</label>
							<!-- <textarea rows="15" cols="50" class="form-control" id="vou_remarks" name="vou_remarks" autocomplete="off" placeholder="" disabled > -->
							<p>
							With effect from 1 January 2020, registered foreign service providers (FSPs) 
							who provide any digital services to a consumer in Malaysia would be required to charge 6% service tax on the digital services.
							</p>

							<p>
							Since our previous client alert, the Service Tax (Amendment) Act 2019, 
							which seeks to impose the service tax on imported digital services, 
							has received its Royal Assent on 28 June 2019 and has been gazetted into law on 9 July 2019.
							</p>

							<p>
							As the Amendment Act has been passed into law, the subsidiary 
							legislations providing for the details of the implementation 
							of the service tax on imported digital services should be made available soon.
							</p>

							<p>On 20 August 2019, the Royal Malaysian Customs Department (Customs) 
							published its Guide on Digital Services (Guide) and this client alert aims to provide a 
							summary of the salient clarification provided by Customs in its Guide and some of 
							the outstanding issues which require further clarity from Customs.
							</p>
							<!-- </textarea> -->
						</div>
					</div>

					<br>
					<button type="button" class="btn btn-default" data-dismiss="modal"> Close </button>	  					
				</div> <!-- /modal-body -->
											
			</form> <!-- /.form -->	     
		</div> <!-- /modal-content -->    
	</div> <!-- /modal-dailog -->	
</div>

<!-- FPX Modal Business Owner -->
<div class="modal fade left" id="fpxModal" tabindex="-1" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content rounded-0">
			<form class="form-horizontal" id="submitBusOwnerForm" action="#" method="POST" enctype="multipart/form-data">
			
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h3 class="modal-title"><font size="3px">Transaction using FPX</font></h3>
				</div>
				
				<!-- <div class="modal-body" style="max-height:450px; overflow:auto;"> -->
				<div class="modal-body row-fluid">
				
					
					<div class="col-md-6">					

						
						<img src="./storage/fpx.png" width="100%">
						

					</div>
					
					<div class="col-md-6">					
						<div class="row-fluid">
							<label for="bus_app_name" class="control-label">Date</label>
							26/12/2019
						</div>
						<br>
						
						<div class="row-fluid">
							<label for="bus_own_passport" class="control-label">Transaction Id</label>
							2019617368
						</div>
						<br>
					
						<div class="row-fluid">
							<label for="bus_own_passport" class="control-label">Total Amount</label>
							MYR 265.24
						</div>
						<br>
						
						<div class="row-fluid">
							<label for="bus_own_passport" class="control-label">Receiver Name</label>
							Kastam Diraja Malaysia
						</div>
						<br>
						
					</div>	
					
					<br>
					<button type="button" class="btn btn-default pull-right" data-dismiss="modal"> Close </button>
					<button type="button" class="btn btn-success pull" data-dismiss="modal"> Proceed </button>
				</div> <!-- /modal-body -->
											
			</form> <!-- /.form -->	     
		</div> <!-- /modal-content -->    
	</div> <!-- /modal-dailog -->	
</div>	
@endsection
@push('js')
<script>

</script>
@endpush

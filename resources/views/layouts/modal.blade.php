<!DOCTYPE html>
<html>
<head>
	@stack('css')
	<script src="{{ asset('assets/plugins/select2/js/select2.full.min.js') }}" type="text/javascript"></script>
	<script src="{{ asset('assets/plugins/jquery-validation/js/jquery.validate.min.js') }}" type="text/javascript"></script>
	<script src="{{ asset('assets/plugins/bootstrap-datepicker/daterangepicker.js') }}"></script>
  	<script src="{{ asset('assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js') }}" type="text/javascript"></script>
	<!-- <script src="https://d3js.org/d3.v5.min.js"></script> -->
	<!-- END VENDOR JS -->

	<!-- BEGIN CORE TEMPLATE JS -->
	<script src="{{ asset('pages/js/pages.min.js') }}"></script>
	<!-- END CORE TEMPLATE JS -->

	<!-- BEGIN PAGE LEVEL JS -->
    <script src="{{ asset('assets/js/scripts.js') }}" type="text/javascript"></script>
    <!-- END PAGE LEVEL JS -->

	<script src="{{ asset('js/global.js') }}"></script>


	@stack('js')
	
	

</head>

</html>

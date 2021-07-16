<?php
$name = isset($name) ? $name : '';
$unique_id = uniqid();
$initialize = isset($initialize) ? $initialize : true;
?>
<div id="{{ $unique_id }}" class="form-group row">
	<label {{ "id=label_$name" }} for="{{ $name }}" class="col-md-3 control-label">
		{{ isset($label) ? $label : 'Input Field' }}
		@isset($mode) @if(strpos($mode, 'required') !== false)<span style="color:red;">*</span>@endif @endisset
		@isset($info) @include('components.info', ['text' => $info]) @endisset
	</label>
	<div class="col-md-9">
		<select id="{{ $name }}" name="{{ $name }}" data-placeholder="{{ isset($placeholder) ? $placeholder : '' }}" class="full-width autoscroll {{ isset($class) ? $class : '' }}" data-init-plugin="select2" {{ isset($mode) ? $mode : '' }} {{ isset($options) ? $options : '' }}>
			@if($initialize)
			<option disabled hidden selected>Pilih satu..</option>
			@endif
			@foreach($data as $index => $text)
			<option value="{{ $index }}" @isset($selected){{ $selected == $index ? 'selected' : '' }}@endisset>{{ $text }}</option>
			@endforeach
		</select>
	</div>
</div>

@push('js')
<script type="text/javascript">
$(document).ready(function() {
@if(isset($modal) && $modal)
	$('#{{ $unique_id }} select[data-init-plugin=select2]').select2({
		dropdownParent: $('#{{ $unique_id }} select[data-init-plugin=select2]').parents(".modal-dialog").find('.modal-content'),
		language: 'ms',
		// allowClear: true,
	});
@else
	$("#{{ $unique_id }} select[data-init-plugin=select2]").select2({
		language: 'ms',
		// allowClear: true,
	});
@endif
});
</script>
@endpush
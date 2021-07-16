<?php
$name = isset($name) ? $name : null;
$unique_id = uniqid();
$initialize = isset($initialize) ? $initialize : true;

if (isset($id)) {
	$id = $id;
}else{
	$id = $name;
}
?>
<div id="{{ $unique_id }}" class="form-group form-group-default form-group-default-custom form-group-default-select2 {{ isset($mode) ? $mode : '' }}">
	<label>
		<span {{ "id=label_$id" }}>{{ isset($label) ? $label : 'Input Field' }}</span>
		@isset($info)@include('components.info', ['text' => $info])@endisset
	</label>
	<select id="{{ $id }}" name="{{ $name }}" data-placeholder="{{ isset($placeholder) ? $placeholder : '' }}" class="full-width autoscroll {{ isset($class) ? $class : '' }}" data-init-plugin="select2" {{ isset($mode) ? $mode : '' }} {{ isset($options) ? $options : '' }}>
		@if($initialize)
		<option disabled hidden selected>Pilih satu..</option>
		@endif
		@foreach($data as $index => $text)
		<option value="{{ $index }}" @isset($selected){{ $selected == $index ? 'selected' : '' }}@endisset>{{ strtoupper($text) }}</option>
		@endforeach
	</select>
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
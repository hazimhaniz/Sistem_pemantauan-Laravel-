<?php

$name = isset($name) ? $name : null;

if (!isset($id)) {
	$id = $name;
}
?>
<div class="form-group form-group-default {{ isset($mode) ? $mode : '' }}">
	@if(isset($style))
	<label style="{{ $style }}">
	@else
	<label>
	@endif
		<span {{ "id=label_$name" }}>{{ isset($label) ? $label : 'Input Field' }}</span>
		@isset($info)@include('components.info', ['text' => $info])@endisset
	</label>
	<input 
		id="{{ $id }}"
		class="form-control {{ isset($class) ? $class : '' }}"
		name="{{ $name ? $name : '' }}"
		placeholder="{{ isset($placeholder) ? $placeholder : '' }}"
		{{ isset($mode) ? $mode : '' }}
		type="{{ isset($type) ? $type : 'text' }}"
		value="{{ isset($value) ? $value : '' }}"
		{{ isset($options) ? $options : '' }}
		>
</div>
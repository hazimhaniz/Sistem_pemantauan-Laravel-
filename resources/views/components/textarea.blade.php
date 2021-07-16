<?php
$name = isset($name) ? $name : null;
?>
<div class="form-group form-group-default {{ isset($mode) ? $mode : '' }}">
	@if(isset($labelStyle))
	<label style="{{ $labelStyle }}">
	@else
	<label>
	@endif
		<span {{ "id=label_$name" }}>{{ isset($label) ? $label : 'Textarea Field' }}</span>
		@isset($info)@include('components.info', ['text' => $info])@endisset
	</label>
	<textarea 
		id="{{ isset($name) ? $name : '' }}"
		class="form-control {{ isset($class) ? $class : '' }}"
		name="{{ isset($name) ? $name : '' }}"
		placeholder="{{ isset($placeholder) ? $placeholder : '' }}"
		{{ isset($mode) ? $mode : '' }}
		{{ isset($options) ? $options : '' }}
		style="height: 150px;"
		>{!! isset($value) ? $value : '' !!}</textarea>
</div>
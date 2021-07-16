<?php
$name = isset($name) ? $name : null;
if (isset($id)) {
	$id = $id;
}else{
	$id = $name;
}
?>
<div class="form-group form-group-default {{ isset($mode) ? $mode : '' }}">
	<label>
		<span {{ "id=label_$name" }}>{{ isset($label) ? $label : 'Textarea Field' }}</span>
		@isset($info)@include('components.info', ['text' => $info])@endisset
	</label>
	<textarea 
		id="{{ isset($id) ? $id : '' }}"
		class="form-control summernote {{ isset($class) ? $class : '' }}"
		name="{{ isset($name) ? $name : '' }}"
		placeholder="{{ isset($placeholder) ? $placeholder : '' }}"
		{{ isset($mode) ? $mode : '' }}
		{{ isset($options) ? $options : '' }}
		style="height: 150px;"
		>{!! isset($value) ? $value : '' !!}</textarea>
</div>
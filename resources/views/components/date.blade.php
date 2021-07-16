<?php
$name = isset($name) ? $name : null;

if (isset($id)) {
	$id = $id;
}else{
	$id = $name;
}

?>
<div class="form-group form-group-default input-group {{ isset($mode) ? $mode : '' }}">
    <div class="form-input-group">
        <label>
			<span {{ "id=label_$id" }}>{{ isset($label) ? $label : 'Input Field' }}</span>
			@isset($info)@include('components.info', ['text' => $info,'name'=> $name])@endisset
		</label>
		<input 
		id="{{ $id }}"
		class="form-control datepicker {{ isset($class) ? $class : '' }}"
		name="{{ $name }}"
		placeholder="{{ isset($placeholder) ? $placeholder : '' }}"
		{{ isset($mode) ? $mode : '' }}
		type="{{ isset($type) ? $type : '' }}"
		value="{{ isset($value) ? $value : '' }}"
		{{ isset($options) ? $options : '' }}
		>
    </div>
    <div class="input-group-addon">
        <i class="fa fa-calendar"></i>
    </div>
</div>
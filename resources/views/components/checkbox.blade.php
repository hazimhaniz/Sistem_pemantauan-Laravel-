<?php
$name = isset($name) ? $name : null;
?>
<div class="form-group form-group-default {{ isset($mode) ? $mode : '' }}">
	<label>
		<span {{ "id=label_$name" }}>{{ isset($label) ? $label : 'Input Field' }}</span>
		@isset($info)@include('components.info', ['text' => $info])@endisset
	</label>
	<div class="checkbox check-primary {{ isset($class) ? $class : '' }}">
		@foreach($data as $index => $text)
		<input name="{{ $name }}" value="{{ $index }}" id="{{ $name.'_'.$index }}" type="checkbox" class="hidden {{ isset($options) ? $options : '' }}" {{ isset($mode) ? $mode : '' }} {{ isset($options) ? $options : '' }} @isset($selected){{ $selected == $index ? 'checked' : '' }}@endisset>
		<label for="{{ $name.'_'.$index }}">{{ $text }}</label>
		@endforeach
	</div>
</div>
<?php
$name = isset($name) ? $name : null;
?>

<div class="form-group row">
	<label {{ "id=label_$name" }} for="{{ isset($name) ? $name : '' }}" class="col-md-3 control-label">
		{{ isset($label) ? $label : 'Input Field' }}
		@isset($mode) @if(strpos($mode, 'required') !== false)<span style="color:red;">*</span>@endif @endisset
		@isset($info) @include('components.info', ['text' => $info]) @endisset
	</label>
	<div class="col-md-9">
		<div class="checkbox check-primary {{ isset($class) ? $class : '' }}">
			@foreach($data as $index => $text)
			<input name="{{ $name }}" value="{{ $index }}" id="{{ $name.'_'.$index }}" type="checkbox" class="hidden {{ isset($options) ? $options : '' }}" {{ isset($mode) ? $mode : '' }} {{ isset($options) ? $options : '' }} @isset($selected){{ $selected == $index ? 'checked' : '' }}@endisset>
			<label for="{{ $name.'_'.$index }}">{{ $text }}</label>
			@endforeach
		</div>
	</div>
</div>
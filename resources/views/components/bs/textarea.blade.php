<?php
$name = isset($name) ? $name : null;
?>
<div class="form-group row">
	<label {{ "id=label_$name" }} for="{{ $name }}" class="col-md-3 control-label">
		{{ isset($label) ? $label : 'Input Field' }}
		@isset($mode) @if(strpos($mode, 'required') !== false)<span style="color:red;">*</span>@endif @endisset
		@isset($info)@include('components.info', ['text' => $info])@endisset
	</label>
	<div class="col-md-9">
		<textarea 
			id="{{ $name }}"
			class="form-control {{ isset($class) ? $class : '' }}"
			name="{{ $name }}"
			placeholder="{{ isset($placeholder) ? $placeholder : '' }}"
			{{ isset($mode) ? $mode : '' }}
			{{ isset($options) ? $options : '' }}
			style="height: 150px;"
			>{!! isset($value) ? $value : '' !!}</textarea>
	</div>
</div>
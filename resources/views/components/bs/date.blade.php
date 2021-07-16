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
		<div id="datepicker-component" class="input-group date p-l-0" required>
            <input 
			id="{{ isset($name) ? $name : '' }}"
			class="form-control {{ isset($class) ? $class : '' }}" 
			name="{{ isset($name) ? $name : '' }}" 
			{{ isset($mode) ? $mode : '' }}
			type="{{ isset($type) ? $type : 'text' }}"
			value="{{ isset($value) ? $value : '' }}"
			{{ isset($options) ? $options : '' }}
			>
            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
        </div>
	</div>
</div>
<?php
$name = isset($name) ? $name : null;
?>
<div class="form-group form-group-default {{ isset($mode) ? $mode : '' }}">
	<label>
		<span {{ "id=label_$name" }}>{{ isset($label) ? $label : 'Input Field' }} 

			<?php if (isset($selected)): ?>
				<?php if ($selected): ?>
					<!-- <i class="fa fa-check-circle text-success" data-html="true" data-toggle="tooltip" title="" data-original-title="Data Telah Diisi"></i> -->
				<?php endif ?>
			<?php endif ?>

		 </span>
		@isset($info)@include('components.info', ['text' => $info])@endisset
	</label>
	<div class="radio radio-primary {{ isset($class) ? $class : '' }}">
		@foreach($data as $index => $text)
		<input name="{{ $name }}" value="{{ $index }}" id="{{ $name.'_'.$index }}" type="radio" class="hidden {{ isset($options) ? $options : '' }}" {{ isset($mode) ? $mode : '' }} {{ isset($options) ? $options : '' }} @isset($selected){{ $selected == $index ? 'checked' : '' }}@endisset>
		<label for="{{ $name.'_'.$index }}">{{ $text }}</label>
		@endforeach
	</div>
</div>
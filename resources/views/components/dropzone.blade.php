<div class="form-group form-group-default {{ isset($mode) ? $mode : '' }}">
	<label>
		<span {{ "id=label_$name" }}>{{ isset($label) ? $label : 'Input Field' }}</span>
		@isset($info)@include('components.info', ['text' => $info])@endisset
	</label>
	<form action="/file-upload" class="dropzone no-margin">
		<div class="fallback">
			<input 
			id="{{ isset($name) ? $name : '' }}"
			class="form-control {{ isset($class) ? $class : '' }}"
			name="{{ isset($name) ? $name : '' }}"
			{{ isset($mode) ? $mode : '' }}
			type="file"
			{{ isset($options) ? $options : '' }}
			multiple
			>
		</div>
	</form>
</div>
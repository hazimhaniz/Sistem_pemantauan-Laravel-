<div class="form-group form-group-default {{ isset($mode) ? $mode : '' }}">
	<label>
		<span>{{ isset($label) ? $label : 'Input Field' }}</span>
		@isset($info)@include('components.info', ['text' => $info])@endisset
	</label>
	{{ isset($slot) ? $slot : '' }}
</div>
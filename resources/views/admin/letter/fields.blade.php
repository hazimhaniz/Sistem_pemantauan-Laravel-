<div class="form-group form-group-default required">
	<label>
		<span>Subjek</span>
	</label>
	<input type="text" class="form-control" name="subject" value="{{ $letter->subject ?? '' }}" id="subject" required autocomplete="off" />
</div>

<label>
	<span>Mesej</span>
</label>
<textarea name="message" id="message" required>{{ $letter->message ?? '' }}</textarea>

@include('admin.letter.js.fields')
<div class="form-group form-group-default required">
	<label>
		<span>Kod Notifikasi</span>
	</label>
	<input type="text" class="form-control" name="code" value="{{ $notification->code ?? '' }}" id="code" required autocomplete="off" />
</div>

<div class="form-group form-group-default required">
	<label>
		<span>Nama Notifikasi</span>
	</label>
	<input type="text" class="form-control" name="name" value="{{ $notification->name ?? '' }}" id="name" autocomplete="off" required />
</div>

<div class="form-group form-group-default required">
	<label>
		<span>Status</span>
	</label>
	<select class="form-control" id="is_active_email" name="is_active_email">
		<option selected disabled>Sila Pilih</option>
		<option value="1">Aktif</option>
		<option value="0">Tidak Aktif</option>
	</select>
</div>

<label>
	<span>Notifikasi</span>
</label>
<textarea name="message" id="message" required>{{ $notification->message ?? '' }}</textarea>

@include('admin.notification.js.fields')
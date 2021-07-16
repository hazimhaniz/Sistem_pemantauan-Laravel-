@include('components.bs.input', [
	'name' => 'reference_no',
	'label' => 'No. Rujukan',
])

@include('components.bs.date', [
	'name' => 'letter_date',
	'label' => 'Tarikh Surat',
])

@include('components.bs.input', [
	'name' => 'entity_name',
	'label' => 'Nama Kesatuan',
	'mode' => 'disabled',
])

@include('components.bs.textarea', [
	'name' => 'address',
	'label' => 'Alamat',
	'mode' => 'disabled',
])

@include('components.bs.input', [
	'name' => 'registered_at',
	'label' => 'Tarikh Didaftarkan',
	'mode' => 'disabled',
])

@include('components.bs.input', [
	'name' => 'registration_no',
	'label' => 'No. Pendaftaran',
])

@include('components.bs.input', [
	'name' => 'province_office_name',
	'label' => 'Nama Pejabat Wilayah/Negeri',
	'mode' => 'disabled',
])

@include('components.bs.textarea', [
	'name' => 'province_office_address',
	'label' => 'Alamat Pejabat Wilayah/Negeri',
	'mode' => 'disabled',
])

@include('components.bs.input', [
	'name' => 'kpks_name',
	'label' => 'Nama Ketua Pengarah',
	'mode' => 'disabled',
])

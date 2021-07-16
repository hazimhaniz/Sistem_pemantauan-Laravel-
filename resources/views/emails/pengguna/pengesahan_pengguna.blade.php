@component('mail::message')
# {{ addcslashes($subject , '#') }}

{!!
str_replace(
    array(
    	"[nama]",
    	"[email]",
    	"[id]",
    	"[kata_laluan]",
        "[peranan]",
        "[no_fail_jas]",
        "[nama_projek]",
    ),
    array(
    	optional($filing)->name,
    	optional($filing)->email,
    	optional($filing)->username,
    	$password,
        $peranan,
        $no_fail_jas,
        $nama_projek,
    ),
    $template
)
!!}

{{-- <strong>{{ config('app.name') }}</strong> --}}
<br>
Jabatan Alam Sekitar.<br>
Kementerian Alam Sekitar dan Air (KASA)<br>
Aras 3, Podium 2, Wisma Sumber Asli<br>
No 25, Persiaran Perdana, Presint 4<br>
62574 Putrajaya<br>
Telefon: 03-8871 2000 / 2200<br>
Faks: 03-8889 1973/75
@endcomponent

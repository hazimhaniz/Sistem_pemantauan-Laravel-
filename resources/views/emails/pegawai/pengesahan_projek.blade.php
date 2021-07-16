@component('mail::message')
# {{ addcslashes($subject , '#') }}

{!!
str_replace(
    array(
    	"[bulan]",
    	"[tahun]",
    	"[projek]"
    ),
    array(
    	optional($filing->month)->name,
    	optional($filing)->tahun,
    	$filing->no_fail_jas
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

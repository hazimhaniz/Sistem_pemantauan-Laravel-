@component('mail::message')
{{-- # {{ addcslashes($subject , '#') }} --}}

{!!
str_replace(
    array(
        "%projek%",
        "%no_fail_jas%",
        "%nama_emc%",
        "%kad_pengenalan%",
        "%email%",
    ),
    array(
        $nama_projek ?? '-',
        $no_fail_jas ?? '-',
        $nama_emc ?? '-',
        $kad_pengenalan ?? '-',
        $email ?? '-',
    ),
    $template
)
!!}

<strong>{{ config('SPEIA') }}</strong>
<br>
Jabatan Alam Sekitar.<br>
Kementerian Alam Sekitar dan Air (KASA)<br>
Aras 3, Podium 2, Wisma Sumber Asli<br>
No 25, Persiaran Perdana, Presint 4<br>
62574 Putrajaya<br>
Telefon: 03-8871 2000 / 2200<br>
Faks: 03-8889 1973/75
@endcomponent
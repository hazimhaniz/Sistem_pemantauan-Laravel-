@extends('layouts.auth')

@section('content')
<?php
setlocale(LC_TIME, "ms", "my_MS", "ms_MY");
?>
<div class="row">
    <div class="col-md-6">
        <h4 class="bold">Log Masuk</h4>
        <p>Sila log masuk dengan menggunakan akaun anda yang telah didaftarkan.</p>
        <form method="POST" action="{{ route('login') }}" class="p-t-15" id="form-login" name="form-login" role="form">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-md-12">
                    @include('components.input', [
                        'label' => 'ID Pengguna',
                        'info' => 'No. Kad Pengenalan (Setiausaha Penaja)',
                        'mode' => 'required',
                        'name' => 'username'
                    ])
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    @include('components.input', [
                        'label' => 'Kata Laluan',
                        'info' => 'Minimum 8 Aksara',
                        'mode' => 'required',
                        'name' => 'password',
                        'type' => 'password',
                        'options' => 'minlength=8',                    
                        'placeholder' => 'Minimum 8 Aksara',
                    ])
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <p><a class="text-info" href="{{ route('password.request') }}">Lupa Kata Laluan ?</a></p>
                </div>
                <div class="col-lg-6">
                    <p class="pull-right"><a href="javascript:;" class="text-info" onclick="modalFaq()">Soalan Lazim (FAQ)</a></p>
                </div>
            </div>
            <button class="btn btn-{{ config('global')['color1']  }} m-t-10 pull-right" type="submit"><i class="fa fa-check m-r-5"></i> Log Masuk</button>
            <a class="btn btn-complete m-t-10" style="background-color: {{ config('global')['color2']  }} !important;" href="{{ route('register') }}">Pengguna Baru</a>
        </form>
    </div>

    <div id="div-announcement" class="col-md-6">
        <h4 class="bold">Pengumuman</h4>
        
        <div class="split-list" style="width: 100%; max-height: 300px; overflow: auto;">
            <div class="boreded no-top-border list-view">
                <div>
                    @forelse($list_announcements as $announcements)
                    <div class="list-view-group-container">
                        <div class="list-view-group-header"><span>{{ strftime('%A %e %B %Y', strtotime($announcements->created_at)) }} </span></div>
                        <ul class="no-padding">
                            <li class="item padding-15 clickme" onclick="openAnnouncement({{ $announcements->id }})">
                                <div class="inline m-l-15">
                                    <p class="recipients no-margin hint-text small">{{ $announcements->title }}</p>
                                    <p class="subject no-margin">{{ substr($announcements->description,0,150) }}...</p>
                                </div>
                                <div class="clearfix"></div>
                            </li>
                        </ul>
                    </div>
                    @empty
                    <div class="list-view-group-container padding-20 bg-master-lightest">
                        <span>Tiada Sebarang Pengumuman</span>
                    </div>
                    @endforelse
                </div>
            </div>
        </div>

        <!-- MODAL FAQ -->
        <div class="modal fade disable-scroll" id="modal-faq" tabindex="-1" role="dialog" aria-hidden="false">
            <div class="modal-dialog modal-xl">
                <div class="modal-content-wrapper">
                    <div class="modal-content-wrapper">
                        <div class="modal-content">
                            <div class="modal-header clearfix text-left">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-close fs-14"></i>
                                </button>
                                <h5>Senarai <span class="semi-bold">Soalan Lazim (FAQ)</span></h5>
                                <div class="form-group form-group-default">

                                    @include('layouts.faq')

                                </div>  
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END MODAL FAQ -->

        <div class="row col-lg-12 m-t-5">
            <div class="card card-default" style="cursor:pointer">
                <div class="card-header mr-auto ml-auto" role="tab" id="headingFour" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                    <h4 class="card-title">
                        <a style="opacity:5;font-weight: bolder;font-size: 12.5px">
                           Senarai Pengguna (klik untuk auto-fill in credential log masuk)
                        </a>
                    </h4>
                </div>
                <div id="collapseFour" class="collapse" aria-labelledby="headingFour">
                    <div class="card-body">
                        <div class="form-group row">
                            <button type="button" class="btn btn-block m-t-5" style="background-color: #007bff;color: white" onclick="clickToInsertValue('superadmin','password')">SuperAdmin (ICT)</button>
                            
                            <button type="button" class="btn btn-block m-t-5" style="background-color: #5A5B5B;color: white" onclick="clickToInsertValue('pdrm_d4','password')">PDRM D4</button>
                            <button type="button" class="btn btn-block m-t-5" style="background-color: #5A5B5B;color: white" onclick="clickToInsertValue('pdrm_r5','password')">PDRM R5</button>
                            <button type="button" class="btn btn-block m-t-5" style="background-color: #5A5B5B;color: white" onclick="clickToInsertValue('pdrm_e6','password')">PDRM E6</button>
                            <button type="button" class="btn btn-block m-t-5" style="background-color: #5A5B5B;color: white" onclick="clickToInsertValue('admin','password')">Admin</button>
                            <button type="button" class="btn btn-block m-t-5" style="background-color: #5A5B5B;color: white" onclick="clickToInsertValue('konsular','password')">Konsular</button>
                            <button type="button" class="btn btn-block m-t-5" style="background-color: #5A5B5B;color: white" onclick="clickToInsertValue('malawakil','password')">Malawakil</button>

                            <button type="button" class="btn btn-block m-t-5" style="background-color: #28a745;color: white" onclick="clickToInsertValue('dnegara','password')">Pengguna Dalam Malaysia</button>
                            <button type="button" class="btn btn-block m-t-5" style="background-color: #28a745;color: white" onclick="clickToInsertValue('lnegara','password')">Pengguna Luar Malaysia</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div>
@endsection

@push('js')
<script type="text/javascript">
    $(function() {
        $('#form-login').validate()
    })

    @if(request()->has('registered'))
        swal({
            icon: "success",
            title: "Pendaftaran Selesai",
            content: "{!! App\OtherModel\Notification::where('code', 'PB_KS_1.1_A')->first()->message !!}",
        });

        window.history.pushState({}, null, "{{ route('login') }}");
    @endif
    
    function openAnnouncement(id) {
        console.log("{{ route('login') }}/announcement/"+id)
        $("#modal-div").load("{{ route('login') }}/announcement/"+id);
    }

    function clickToInsertValue(username,password){
        document.getElementById("username").value = username;
        document.getElementById("password").value = password;
    }

</script>
@endpush
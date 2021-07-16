<style>
    .title1{
        color:#000; 
            font-family: 'Montserrat'; 
            font-size: 12.5px; 
            text-transform: uppercase; 
            font-weight: 500;
    }
</style>

<div class="modal fade stick-up" id="viewLaporanModal" tabindex="-1" role="dialog" aria-labelledby="viewLaporanModalLabel" aria-hidden="true">
    <div class=" modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewLaporanModalTitle"> <b> Laporan Bulanan {{ $projek ? $projek->no_fail_jas : '' }} </b></h5>
                <button type="button" id="cls" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">X</span>
                </button>
            </div>
            <div class="modal-body m-t-20">
                <div class="dashTitle">&nbsp; <i class="fa fa-line-chart" aria-hidden="true"></i> BULAN {{ $month }} - {{ $year }} </div>
                <br>
                <ul id="tabs-sng" class="nav nav-tabs nav-tabs-blue nav-tabs-fillup d-none d-md-flex d-lg-flex d-xl-flex" role="tablist" style="background-color:# !important;">
                    <li class="nav-item ">
                        <a class="active viewTab" data-toggle="tab" dataFormType="{{ $borangA ? get_class($borangA) : '' }}" dataFormID="{{ $borangA ? $borangA->id : '' }}" data-target="#tabview1" role="tab">
                            <span>(A) EIA 1-18</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="viewTab" data-toggle="tab" dataFormType="{{ $borangB ? get_class($borangB) : '' }}" dataFormID="{{ $borangB ? $borangB->id : '' }}" data-target="#tabview2" role="tab">
                            <span>(B) EIA 2-18</span>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="viewTab" data-toggle="tab" dataFormType="{{ $borangC ? get_class($borangC) : '' }}" dataFormID="{{ $borangC ? $borangC->id : '' }}" data-target="#tabview3" role="tab">
                            <span>(C) Audit</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="viewTab" data-toggle="tab" dataFormType="{{ $borangD ? get_class($borangD) : '' }}" dataFormID="{{ $borangD ? $borangD->id : '' }}" data-target="#tabview4" role="tab">
                            <span>(D) BMP's</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="viewTab" data-toggle="tab" dataFormType="{{ $borangE ? get_class($borangE) : '' }}" dataFormID="{{ $borangE ? $borangE->id : '' }}" data-target="#tabview5" role="tab">
                            <span>(E&F) Audit dan Perlaksanaan EMT</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="viewTab" data-toggle="tab" dataFormType="kuiri" dataFormID="" data-target="#tabview6" role="tab">
                            <span> Kuiri </span>
                        </a>
                    </li>
                </ul>
                <div class="tab-content" style="background-color:# !important;">
                    <div class="tab-pane active" id="tabview1">
                        <p class="title1"> Status A: {{ $borangA ? $borangA->status ? $borangA->status->name : '' : '' }} </p>
                        @if(in_array($borangA->status_id, [602]))
                        <div class="row">
                            <div class="col-md-12">
                                <input type="button" dataFormType="{{ $borangA ? get_class($borangA) : '' }}" dataFormID="{{ $borangA ? $borangA->id : '' }}" class="btn btn-sm btn-success sahKanForm pull-right" value="SAHKAN" />
                            </div>
                        </div>
                        @endif
                        @include('form.tabs1')
                    </div>
                    <div class="tab-pane" id="tabview2">
                        <p class="title1"> Status B: {{ $borangB ? $borangB->status ? $borangB->status->name : '' : '' }} </p>
                        @if(in_array($borangB->status_id, [602]))
                        <div class="row">
                            <div class="col-md-12">
                                <input type="button" dataFormType="{{ $borangB ? get_class($borangB) : '' }}" dataFormID="{{ $borangB ? $borangB->id : '' }}" class="btn btn-sm btn-success sahKanForm pull-right" value="SAHKAN" />
                            </div>
                        </div>
                        @endif
                        @include('form.tabs2')
                    </div>
                    <div class="tab-pane" id="tabview3">
                        <p class="title1"> Status C: {{ $borangC ? $borangC->status ? $borangC->status->name : '' : '' }} </p>
                        @if(in_array($borangC->status_id, [602]))
                        <div class="row">
                            <div class="col-md-12">
                                <input type="button" dataFormType="{{ $borangC ? get_class($borangC) : '' }}" dataFormID="{{ $borangC ? $borangC->id : '' }}" class="btn btn-sm btn-success sahKanForm pull-right" value="SAHKAN" />
                            </div>
                        </div>
                        @endif
                        @include('form.tabs3laporan')
                    </div>
                    <div class="tab-pane" id="tabview4">
                        <p class="title1"> Status D: {{ $borangD ? $borangD->status ? $borangD->status->name : '' : '' }}</p>
                        @if($borangD)
                        @if(in_array($borangD->status_id, [602]))
                        <div class="row">
                            <div class="col-md-12">
                                <input type="button" dataFormType="{{ $borangD ? get_class($borangD) : '' }}" dataFormID="{{ $borangD ? $borangD->id : '' }}" class="btn btn-sm btn-success sahKanForm pull-right" value="SAHKAN" />
                            </div>
                        </div>
                        @endif
                        @endif
                        @include('form.tabs4')
                    </div>
                    <div class="tab-pane" id="tabview5">
                        <p class="title1"> Status E: {{ $borangE ? $borangE->status ? $borangE->status->name : '' : '' }}    @if(in_array($borangE->status_id, [602]))
                          
                                <input type="button" dataFormType="{{ $borangE ? get_class($borangE) : '' }}" dataFormID="{{ $borangE ? $borangE->id : '' }}" class="btn btn-sm btn-success sahKanForm" value="SAHKAN E" />
                           
                            @endif </p>
                        <p class="title1"> Status F: {{ $borangF ? $borangF->status ? $borangF->status->name : '' : '' }} @if(in_array($borangF->status_id, [602]))
                            
                                <input type="button" dataFormType="{{ $borangF ? get_class($borangF) : '' }}" dataFormID="{{ $borangF ? $borangF->id : '' }}" class="btn btn-sm btn-success sahKanForm" value="SAHKAN F" />
                         
                            @endif</p>
                        {{-- <div class="row">
                            @if(in_array($borangE->status_id, [602]))
                            <div class="col-md-10">
                                <input type="button" dataFormType="{{ $borangE ? get_class($borangE) : '' }}" dataFormID="{{ $borangE ? $borangE->id : '' }}" class="btn btn-sm btn-success sahKanForm pull-right" value="SAHKAN E" />
                            </div>
                            @endif
                            @if(in_array($borangF->status_id, [602]))
                            <div class="col-md-2">
                                <input type="button" dataFormType="{{ $borangF ? get_class($borangF) : '' }}" dataFormID="{{ $borangF ? $borangF->id : '' }}" class="btn btn-sm btn-success sahKanForm pull-right" value="SAHKAN F" />
                            </div>
                            @endif
                        </div> --}}
                        @include('form.tabs5')
                    </div>
                    <div class="tab-pane" id="tabview6">
                        {{-- @include('form.tabs5') --}}
                        <div class="tab-content">
                            <div class="tab-pane active slide-right" id="">
                                <div class="m-t-20">
                                    <div class="card card-transparent">
                                        <div class="card-block">
                                            <div class="alert alert-danger" role="alert">
                                                1. Sila pilih borang yang hendak di kuiri. <br/>
                                                2. Bagi borang B, sila pilih syarat sebelum melakukan kuiri. <br/>
                                                3. Bagi borang C, sila pilih pengawasan sebelum melakukan kuiri. <br/>
                                                4. Bagi borang D, sila pilih elemen yang sebelum melakukan kuiri. <br/>
                                            </div>
                                            <div id="addModalDiv" class="row">
                                                <div id="form_class_div" class="col-md-6">
                                                    <label><b> Borang</b> </label>
                                                    <select id="form_class" class="form-control">
                                                        <option value="A" selected>A</option>
                                                        <option value="B">B</option>
                                                        <option value="C">C</option>
                                                        <option value="D">D</option>
                                                        <option value="E">E</option>
                                                        <option value="F">F</option>
                                                    </select>
                                                    <input type="hidden" id="borangA_id" value="{{ $borangA ? $borangA->id : '' }}">
                                                    <input type="hidden" id="borangE_id" value="{{ $borangE ? $borangE->id : '' }}">
                                                    <input type="hidden" id="borangF_id" value="{{ $borangF ? $borangF->id : '' }}">
                                                    
                                                </div>
                                                <div id="syarat_b_div" class="col-md-6">
                                                    <label> <b>Syarat</b> </label>
                                                    <select id="syarat_b" class="form-control">
                                                        <option value=""></option>
                                                        @foreach($monthlyBSyarats as $monthlyBSyarat)
                                                        <option value="{{ $monthlyBSyarat->id }}">{{ $monthlyBSyarat->syarat }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div id="pengawasan_c_div" class="col-md-6">
                                                    <label> <b>Pengawasan </b></label>
                                                    <select id="pengawasan_c" class="form-control">
                                                        <option value=""></option>
                                                        @foreach($projekPengawasans as $projekPengawasan)
                                                        <option value="{{ $projekPengawasan->id }}">{{ $projekPengawasan->jenis_pengawasan }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div id="elemen_d_div" class="col-md-6">
                                                    <label> <b>Elemen </b></label>
                                                    <select id="elemen_d" class="form-control">
                                                        <option value=""></option>
                                                        @foreach($elemens as $elemen)
                                                        <option value="{{ $elemen->id }}">{{ $elemen->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-12">
                                                    <br>
                                                    <label> <b>KUIRI </b></label>
                                                    <textarea id="kuiri_text" class="form-control" rows="5" style="min-height: 100px"></textarea>
                                                </div>
                                                <div class="col-md-12">
                                                    <br />
                                                    <input id="hantarKuiriBtn" type="button" class="btn btn-sm btn-success pull-right" value="HANTAR" />
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <hr />
                                                <label class="col-md-12"> <b> SENARAI KUIRI </b></label>
                                                <div id="senaraiQuiriTable" class="col-md-12"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div id="lihatKuiriDiv"></div>
    
</div>

<script>

    

    $("#senaraiQuiriTable").load("{{ url('/projek/get-senarai-kuiri/') }}/" + "{{ $projek ? $projek->id : '' }}" + "/" + "{{ $year }}" + "/" + "{{ $month }}");
    $("#syaratBTable").load("{{ url('/projek/get-syarat-b/') }}/{{ $projek ? $projek->id : '' }}/{{ $year }}/{{ $month }}");

    $("#viewLaporanModal").modal('show');
    $(".viewTab").first().trigger('click');
    
    $("#viewLaporanModal :input").attr('readonly', true);
    $("#viewLaporanModal input[type=radio]").attr('disabled', true);
    $("#viewLaporanModal input[type=checkbox]").attr('disabled', true);
    $("#viewLaporanModal input[type=file]").attr('disabled', true);
    $("#viewLaporanModal :button").attr('disabled', true);
    $("#cls").attr('disabled', false);
    $("#kuiri_text, #form_class, #pengawasan_c, #hantarKuiriBtn").removeAttr('readonly');
   
    $("#btnFloatGroupAction :input").attr('disabled', false);
    $(".sahKanForm").attr('disabled', false);
    
    $("#addModalDiv :input").attr('disabled', false);
    
    $(".viewTab").on('click', function() {
        var FormType = $(this).attr('dataFormType');
        var formID = $(this).attr('dataFormID');
        
        if (formID == "") {
            $("#btnFloatGroupAction").hide();
        } else {
            $("#btnFloatGroupAction").show();
            
            $("#queryFormType").val(FormType);
            $("#queryFormID").val(formID);
        }
        
    });
    
    $(".viewTab").first().trigger('click');
    
    function lihatKuiri(kuiriID) {
        console.log(kuiriID);
        $("#lihatKuiriDiv").load("{{ url('/projek/get-lihat-kuiri') }}/" + kuiriID);
    }
    
    $(".sahKanForm").on('click', function() {
        var FormType = $(this).attr('dataFormType');
        var formID = $(this).attr('dataFormID');
        
        console.log(FormType, formID);
        
        var formData = new FormData;
        formData.append('FormType', FormType);
        formData.append('formID', formID);
        
        $.ajax({
            url: "{{ url('/pengurusan_projek/laporan/sahkan-laporan') }}",
            method: "POST",
            data: formData,
            processData: false,
            contentType: false,
            async: false,
            success: function(response) {
                console.log(response);
                Swal.fire('Berjaya', 'Maklumat telah disimpan', 'success');
                $(this).hide();
            },
            error: function(response) {
                console.log(response);
                Swal.fire('Gagal', 'Maklumat gagal disimpan', 'error');
            }
        });
        $(this).hide();
    });
    
    $("#btnSubmitQuery").on('click', function() {
        var queryText = $("#queryText").val();
        var queryProjectID = $("#queryProjectID").val();
        var queryProjectYear = $("#queryProjectYear").val();
        var queryProjectMonth = $("#queryProjectMonth").val();
        var queryFormType = $("#queryFormType").val();
        var queryFormID = $("#queryFormID").val();
        
        var formData = new FormData;
        formData.append('queryText', queryText);
        formData.append('queryProjectID', queryProjectID);
        formData.append('queryProjectYear', queryProjectYear);
        formData.append('queryProjectMonth', queryProjectMonth);
        formData.append('queryFormType', queryFormType);
        formData.append('queryFormID', queryFormID);
        
        $.ajax({
            url: "{{ url('/pengurusan_projek/laporan/submit-query') }}",
            method: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                console.log(response);
                $("#queryText").val('');
                Swal.fire('Berjaya', 'Maklumat telah disimpan', 'success');
            },
            error: function(response) {
                console.log(response);
                Swal.fire('Gagal', 'Maklumat gagal disimpan', 'error');
            }
        });
        
    });
</script>

<script>
    $("#syarat_b_div, #pengawasan_c_div, #elemen_d_div").hide();
    
    $("#cls").click(() => {
        $("#viewLaporanModal").modal('hide');
    });

    $("#form_class").on('change', function() {
        $("#syarat_b_div, #pengawasan_c_div, #elemen_d_div").hide();
        $("#syarat_b, #pengawasan_c, #elemen_d").val('');
        
        var form_class = $(this).val();
        
        if (form_class == "B") {
            $("#syarat_b_div").show();
        }
        
        if (form_class == "C") {
            $("#pengawasan_c_div").show();
        }
        
        if (form_class == "D") {
            $("#elemen_d_div").show();
        }
    });
    
    $("#hantarKuiriBtn").on('click', function() {
        var form_class = $("#form_class").val();
        
        var projek_id = "{{ $projek->id }}";
        var year = "{{ $year }}";
        var month = "{{ $month }}";
        
        var formData = new FormData;
        formData.append('projek_id', projek_id);
        formData.append('year', year);
        formData.append('month', month);
        formData.append('form_class', $("#form_class").val());
        
        formData.append('syarat_b', $("#syarat_b").val());
        formData.append('pengawasan_c', $("#pengawasan_c").val());
        formData.append('elemen_d', $("#elemen_d").val());
        formData.append('kuiri_text', $("#kuiri_text").val());
        
        formData.append('borangA_id', $("#borangA_id").val());
        formData.append('borangE_id', $("#borangE_id").val());
        formData.append('borangF_id', $("#borangF_id").val());
        
        $.ajax({
            url: "{{ url('/pengurusan_projek/laporan/submit-query') }}",
            method: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                console.log(response);
                $("#kuiri_text").val('');
                $("#senaraiQuiriTable").load("{{ url('/projek/get-senarai-kuiri/') }}/" + "{{ $projek ? $projek->id : '' }}" + "/" + "{{ $year }}" + "/" + "{{ $month }}");
                Swal.fire('Berjaya', 'Maklumat telah disimpan', 'success');
            }
        });
    });
    
    loadPengawasan = (elem, pengawasanId) => {
        let baseUrl = `{{ route('form.load.pengawasan', ['data-id', $projek->id]) }}?year={{ $year }}&month={{ $month }}`;
        baseUrl = baseUrl.replace('data-id', pengawasanId);
        
        $.get(baseUrl, (response) => {
            $(`#tabstesen${pengawasanId}`).empty().append(response);
        });
    }
    
</script>

<script>
    $(".elemen").hide();
    $(".elemen1").hide();
    $(".elemen2").hide();
    $(".elemen3").hide();
    $(".elemen4").hide();
    
    $("#element").click(function () {
        $(".elemen").show();
        $(".elemen1").hide();
        $(".elemen2").hide();
        $(".elemen3").hide();
        $(".elemen4").hide();
    });
    
    $("#hakisan").click(function () {
        $(".elemen").hide();
        $(".elemen1").show();
        $(".elemen2").hide();
        $(".elemen3").hide();
        $(".elemen4").hide();
    });
    
    $("#kawalan").click(function () {
        $(".elemen").hide();
        $(".elemen1").hide();
        $(".elemen2").show();
        $(".elemen3").hide();
        $(".elemen4").hide();
    });
    
    $("#permukaan").click(function () {
        $(".elemen").hide();
        $(".elemen1").hide();
        $(".elemen2").hide();
        $(".elemen3").show();
        $(".elemen4").hide();
    });
    
    $("#sedimen").click(function () {
        $(".elemen").hide();
        $(".elemen1").hide();
        $(".elemen2").hide();
        $(".elemen3").hide();
        $(".elemen4").show();
    });
    
    $("#elementHujan").click(function () {
        $(".elemen").show();
        $(".elemen1").hide();
        $(".elemen2").hide();
        $(".elemen3").hide();
        $(".elemen4").hide();
    });
    
    $("#hakisanHujan").click(function () {
        $(".elemen").hide();
        $(".elemen1").show();
        $(".elemen2").hide();
        $(".elemen3").hide();
        $(".elemen4").hide();
    });
    
    $("#kawalanHujan").click(function () {
        $(".elemen").hide();
        $(".elemen1").hide();
        $(".elemen2").show();
        $(".elemen3").hide();
        $(".elemen4").hide();
    });
    
    $("#permukaanHujan").click(function () {
        $(".elemen").hide();
        $(".elemen1").hide();
        $(".elemen2").hide();
        $(".elemen3").show();
        $(".elemen4").hide();
    });
    
    $("#sedimenHujan").click(function () {
        $(".elemen").hide();
        $(".elemen1").hide();
        $(".elemen2").hide();
        $(".elemen3").hide();
        $(".elemen4").show();
    });
</script>
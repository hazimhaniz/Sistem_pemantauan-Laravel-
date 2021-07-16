<div class="card card-sng" style="background-color:# !important;">
    <div class=" container-fluid container-fixed-lg">
        <!-- START card -->
        <!-- <div class="card card-transparent"> -->

        <div class="tab-content">
            <div class="tab-pane active" id="tab1">
                <div class="card card-transparent">

                    <form id="BorangSatuTempahLot" class="form" action="" method="post">

                        <div class="row">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <p class="small-text hint-text">Semua ruangan kosong yang ada (<span
                                            class="text-danger" style="font-size:14px"> * </span>) PERLU diisi dengan
                                        lengkap SEBELUM menekan butang 'Hantar'.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group field-pbaruform-notel required">
                                    <label for="name">
                                         NAMA PROJEK
                                        <span class="text-danger" style="font-size:14px">*</span>
                                    </label>
                                    <input type="text" id="name"
                                        class="form-control input-radius-all border border-default" name="name"
                                        required="" data-error-msg="Ruangan nama perlu diisi"
                                        placeholder="FIRST SCHEDULE ENVIRONMENTAL IMPACT ASSESSMENT FOR THE REFURBISHMENT AND MODIFICATION OF 8 NOS. EXISTING PETROLEUM"
                                        style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAABHklEQVQ4EaVTO26DQBD1ohQWaS2lg9JybZ+AK7hNwx2oIoVf4UPQ0Lj1FdKktevIpel8AKNUkDcWMxpgSaIEaTVv3sx7uztiTdu2s/98DywOw3Dued4Who/M2aIx5lZV1aEsy0+qiwHELyi+Ytl0PQ69SxAxkWIA4RMRTdNsKE59juMcuZd6xIAFeZ6fGCdJ8kY4y7KAuTRNGd7jyEBXsdOPE3a0QGPsniOnnYMO67LgSQN9T41F2QGrQRRFCwyzoIF2qyBuKKbcOgPXdVeY9rMWgNsjf9ccYesJhk3f5dYT1HX9gR0LLQR30TnjkUEcx2uIuS4RnI+aj6sJR0AM8AaumPaM/rRehyWhXqbFAA9kh3/8/NvHxAYGAsZ/il8IalkCLBfNVAAAAABJRU5ErkJggg==&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%; cursor: auto;">
                                    <div class="help-block"></div>
                                </div>
                            </div>
                    
                        </div>

                    
                        <br>
                        <div class="row">
                            <div class="col-md-6">
                                <!-- ALAMAT PERNIAGAAN -->
                                <div class="form-group">
                                    <input type="hidden" id="personal_address" name="personal_address" value="11">
                                    <label>
                                        <i class="fa fa-address-card-o fa-lg text-default" aria-hidden="true"></i>
                                        &nbsp; ALAMAT KEDIAMAN PERIBADI
                                        <span class="text-danger" style="font-size:14px">*</span>
                                    </label>
                                    <input type="text" class="form-control border border-default input-radius-top"
                                        name="line1_personal" id="line1_personal"
                                        placeholder="Alamat Baris 1 (Mandatori)" required=""
                                        data-error-msg="Alamat Baris 1 perlu diisi.">

                                    <input type="text" class="form-control border border-default input-notop"
                                        placeholder="Alamat Baris 2" name="line2_personal" id="line2_personal">

                                    <input type="text" class="form-control border border-default input-notop"
                                        placeholder="Alamat Baris 2" name="line3_personal" id="line3_personal">

                                    <div class="row no-gutters">
                                        <div class="col-md-6">
                                            <input type="text"
                                                class="form-control border border-default input-notop-noright"
                                                name="postcode_personal" id="postcode_personal" placeholder="Poskod"
                                                required="" data-error-msg="Poskod perlu diisi.">
                                        </div>
                                        <div class="col-md-6">
                                            <select id="state_personal" name="state_personal"
                                                class="select-address input-notop-nobottom full-width custom-select border border-default">
                                                <option selected="" disabled="" value="null">Pilih Negeri ...</option>
                                                <option value="1">Johor</option>
                                                <option value="2">Kedah</option>
                                                <option value="3">Kelantan</option>
                                                <option value="4">Kuala Lumpur</option>
                                                <option value="5">Labuan</option>
                                                <option value="6">Melaka</option>
                                                <option value="7">Negeri Sembilan</option>
                                                <option value="8">Pahang</option>
                                                <option value="9">Penang</option>
                                                <option value="10">Perak</option>
                                                <option value="11">Perlis</option>
                                                <option value="12">Putrajaya</option>
                                                <option value="13">Sabah</option>
                                                <option value="14">Sarawak</option>
                                                <option value="15">Selangor</option>
                                                <option value="16">Terengganu</option>
                                            </select>
                                        </div>
                                    </div>

                                    <style>
                                        #city_personal option {
                                            color: black;
                                            //font-style: italic;
                                        }

                                        .empty {
                                            //color: gray; 
                                            color: #c4cbce;
                                            font-style: italic;
                                        }

                                    </style>

                                    <div class="form-group">
                                        <select id="city_personal" name="city_personal"
                                            class="select-address full-width custom-select border border-default">
                                            <option selected="" disabled="" value="null">Pilih Bandar ...</option>
                                        </select>
                                    </div>

                                    <script>
                                        $("#state_personal").on('change', function() {
                                            let state = $("#state_personal").val();
                                            $("#city_personal").css("pointer-events", "");

                                            list1 = $('#city_personal');
                                            list1.empty();
                                            list1.append(
                                                "<option disabled selected hidden>Pilih Bandar ...</option>"
                                                );

                                            $.ajax({
                                                url: "http://platinumall.test/fetch-bandar/" + state,
                                                type: 'GET',
                                                datatype: 'json',
                                                success: function(cities) {
                                                    cities.forEach(city => {
                                                        list1.append("<option value='" +
                                                            city['id'] + "'>" + city[
                                                                'name'] + "</option>");
                                                    });
                                                },
                                                error: function(xhr, ajaxOptions, thrownError) {
                                                    console.log(thrownError);
                                                }
                                            });
                                        });

                                    </script>

                                </div>
                            </div>

                            <div class="col-md-6">
                                <!-- ALAMAT PERNIAGAAN -->
                                <div class="form-group">
                                    <input type="hidden" id="business_address" name="business_address" value="12">
                                    <label>
                                        <i class="fa fa-building-o fa-lg text-default" aria-hidden="true"></i>
                                        &nbsp; ALAMAT PERNIAGAAN
                                        <span class="text-danger" style="font-size:14px">*</span>
                                    </label>
                                    <input type="text" class="form-control border border-default input-radius-top"
                                        name="line1_business" id="line1_business"
                                        placeholder="Alamat Baris 1 (Mandatori)" required=""
                                        data-error-msg="Alamat Baris 1 perlu diisi.">

                                    <input type="text" class="form-control border border-default input-notop"
                                        name="line2_business" id="line2_business" placeholder="Alamat Baris 2">

                                    <input type="text" class="form-control border border-default input-notop"
                                        name="line3_business" id="line3_business" placeholder="Alamat Baris 3">

                                    <div class="row no-gutters">
                                        <div class="col-md-6">
                                            <input type="text"
                                                class="form-control border border-default input-notop-noright"
                                                name="postcode_business" id="postcode_business" required=""
                                                data-error-msg="Poskod perlu diisi." placeholder="Poskod">
                                        </div>
                                        <div class="col-md-6">
                                            <select id="state_business" name="state_business"
                                                class="select-address input-notop-nobottom full-width custom-select border border-default">
                                                <option selected="" disabled="" value="null">Pilih Negeri ...</option>
                                                <option value="1">Johor</option>
                                                <option value="2">Kedah</option>
                                                <option value="3">Kelantan</option>
                                                <option value="4">Kuala Lumpur</option>
                                                <option value="5">Labuan</option>
                                                <option value="6">Melaka</option>
                                                <option value="7">Negeri Sembilan</option>
                                                <option value="8">Pahang</option>
                                                <option value="9">Penang</option>
                                                <option value="10">Perak</option>
                                                <option value="11">Perlis</option>
                                                <option value="12">Putrajaya</option>
                                                <option value="13">Sabah</option>
                                                <option value="14">Sarawak</option>
                                                <option value="15">Selangor</option>
                                                <option value="16">Terengganu</option>
                                            </select>
                                        </div>
                                    </div>

                                    <style>
                                        #business-address-state option {
                                            color: black;
                                            //font-style: italic;
                                        }

                                        .empty {
                                            //color: gray; 
                                            color: #c4cbce;
                                            font-style: italic;
                                        }

                                    </style>

                                    <div class="form-group">
                                        <select id="city_business" name="city_business"
                                            class="select-address full-width custom-select border border-default">
                                            <option selected="" disabled="" value="null">Pilih Bandar ...</option>
                                        </select>
                                    </div>

                                    <script>
                                        $("#state_business").on('change', function() {
                                            let state = $("#state_business").val();
                                            $("#city_business").css("pointer-events", "");

                                            list1 = $('#city_business');
                                            list1.empty();
                                            list1.append(
                                                "<option disabled selected hidden>Pilih Bandar ...</option>"
                                                );

                                            $.ajax({
                                                url: "http://platinumall.test/fetch-bandar/" + state,
                                                type: 'GET',
                                                datatype: 'json',
                                                success: function(cities) {
                                                    cities.forEach(city => {
                                                        list1.append("<option value='" +
                                                            city['id'] + "'>" + city[
                                                                'name'] + "</option>");
                                                    });
                                                },
                                                error: function(xhr, ajaxOptions, thrownError) {
                                                    console.log(thrownError);
                                                }
                                            });
                                        });

                                    </script>

                                </div>
                            </div>

                        </div>
                        <div class="float-right mt-4">
                            <button type="button" id="btnSubmitBorangSatu" class="btn btn-success"><i
                                    class="fa fa-paper-plane-o" aria-hidden="true"></i>SIMPAN</button>
                        </div>

                    </form>
                </div> <!-- end card -->

            </div>

            
            </b>
        </div><b> </b>
    </div>
</div>
</div>

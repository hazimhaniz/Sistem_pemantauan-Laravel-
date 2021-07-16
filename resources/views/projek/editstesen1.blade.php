@extends('layouts.modal')
@include('plugins.dropify')

<div class="modal fade" id="modal-edit" tabindex="-1" role="dialog" aria-labelledby="addModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-xs" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalTitle">Maklumat <span class="bold">Stesen</span></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id='form-stesen-edit' role="form" method="post" action="{{ route('projek.updatestesen1') }}">
                
                <input type="hidden" name="id" value="{{$stesen->id}}">
                <input type="hidden" name="type" value="{{$type}}">
                <input type="hidden" name="jenis_pengawasan_id" value="{{$stesen->jenis_pengawasan_id}}">
                <div class="modal-body m-t-20">
                    <div @if(auth()->user()->entity_type == 'App\UserPP' || auth()->user()->entity_type == 'App\UserStaff') style="pointer-events:none;" @else @endif>
                        <!-- @if($stesen->jenis_pengawasan_id==2) -->
                        <!-- <div class="form-group row">
                            <label class="col-md-3 control-label">Standard Dirujuk</label>
                            <div class="col-md-9" style="z-index: 799">
                                <select id="version" name="version" data-placeholder="bulan" class="full-width autoscroll" data-init-plugin="select2" required>
                                    <option disabled hidden selected> Sila Pilih </option>
                                    <option value="1" {{ $stesen->versi==1 ? 'selected' : ''}} > Pemakaian sebelum 2019 </option>
                                    <option value="2" {{ $stesen->versi==2 ? 'selected' : ''}} > Pemakaian selepas 2019 </option>

                                </select>
                            </div>
                        </div> -->

                        <!-- <div class="form-group form-group-default form-group-default-custom form-group-default-select2">
                            <label>Standard Dirujuk <span style="color:red;">*</span>
                            </label>
                            <select id="version" name="version" data-placeholder="bulan" class="full-width autoscroll" data-init-plugin="select2" required>
                                <option disabled hidden selected> Sila Pilih </option>
                                <option value="1" {{ $stesen->versi==1 ? 'selected' : ''}} > Pemakaian sebelum 2019 </option>
                                <option value="2" {{ $stesen->versi==2 ? 'selected' : ''}} > Pemakaian selepas 2019 </option>
                            </select>
                        </div>
                        @endif -->

                        @include('components.input', [
                        'label' => 'Nama Stesen',
                        'info' => 'Nama Stesen',
                        'name' => 'stesen',
                        'id' => 'stesen',
                        'mode' => 'required',
                        'value' => $stesen->stesen,
                        ])
                        <div>
                            <a onclick="openPopup()" class="btn btn-default-focus btn-xs m-t-5 "><i class="fa fa-search mr-1"></i>Cari</a>
                            <div id="latitudecontainer" class="form-group form-group-default required" aria-required="true">
                                <label class="fade">
                                    <span id="label_latitud">Latitud</span>
                                    <i style="cursor: help; color: #48B0F7;" class="fa fa-question-circle" data-html="true" data-toggle="tooltip" title="" data-original-title="Latitud"></i>
                                </label>
                                <input id="latitud" class="form-control valid" name="latitud" placeholder="" required="" type="text" value="{{$stesen->latitud}}" onkeypress ="return onlyNumberKey(event);" aria-required="true" aria-invalid="false" readonly>

                                <!-- <label id="error-latitud" class="error" for="nama">Wrong Format. Example : 1.123456</label> -->
                            </div>
                        </div>
                        <!-- <label id="error-latitud" style="display:none;font-size: 12px;" for="nama"><font color="red">Wrong Format. Example : 1.123456</font></label> -->
                        <div >
                            <div id="longitudcontainer" class="form-group form-group-default required" aria-required="true">
                               <label class="fade">
                                <span id="label_longitud">Longitud</span>
                                <i style="cursor: help; color: #48B0F7;" class="fa fa-question-circle" data-html="true" data-toggle="tooltip" title="" data-original-title="Longitud"></i>
                            </label>
                            <input id="longitud" class="form-control valid" name="longitud" placeholder="" required="" type="text" value="{{$stesen->longitud}}" onkeypress ="return onlyNumberKey(event);" aria-required="true" aria-invalid="false" readonly>
                        </div>
                    </div>
                    <input type="hidden" id="geolocatorID" name="geolocatorID">
                    <!-- <label id="error-longitud" style="display:none;font-size: 12px;" for="nama"><font color="red">Wrong Format. Example : 123.123456</font></label> -->
                    @if($stesen->jenis_pengawasan_id==1)
                             <!-- @include('components.input', [
                            'label' => 'Nama Sungai',
                            'info' => 'Nama Sungai',
                            'name' => 'nama',
                            'id' => 'nama',
                            'mode' => 'required',
                            'value' => $stesen->nama,
                            ]) -->
                            <input type="hidden" name="sungai">
                            <div id="lembangansungai">
                                <div class="form-group form-group-default form-group-default-custom form-group-default-select2">
                                    <label>Lembangan <span style="color:red;">*</span>
                                    </label>
                                    <select id="lembangan" name="lembangan" data-placeholder="lembangan" class="full-width autoscroll" data-init-plugin="select2" required>
                                        <option disabled hidden selected> Sila Pilih </option>
                                        @foreach($lembangan as $lembangans)
                                        <option value="{{$lembangans->lembangan_2020}}" {{ $stesen->lembangan==$lembangans->lembangan_2020 ? 'selected' : ''}}>{{$lembangans->lembangan_2020}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group form-group-default form-group-default-custom form-group-default-select2 ">
                                    <label>
                                        <span id="label_Daerah">Sungai</span>
                                    </label>
                                    <select id="sungainama" name="sungai" class="full-width autoscroll" data-init-plugin="select2" required="">
<!--                                         @if($stesen->sungai)
                                        @foreach($lembangan as $lembangans)
                                            @if($stesen->lembangan == $lembangans->lembangan_2020)
                                                <option value="{{$lembangans->sungai_2020}}" {{ $stesen->sungai==$lembangans->id ? 'selected' : ''}}>{{$lembangans->sungai_2020}}</option>
                                                @foreach($lembangan as $lembangans)
                                                    <option value="{{$lembangans->sungai_2020}}" {{ $stesen->sungai==$lembangans->id ? 'selected' : ''}}>{{$lembangans->sungai_2020}}</option>
                                                @endforeach
                                            @endif
                                        @endforeach
                                        @endif -->
                                    </select>
                                </div>
                            </div>
                            @endif

                            @if($stesen->jenis_pengawasan_id==3)
                            @include('components.input', [
                            'label' => 'Nama Tasik',
                            'info' => 'Nama Tasik',
                            'name' => 'nama',
                            'id' => 'nama',
                            'mode' => 'required',
                            'value' => $stesen->nama,
                            ])
                            @endif

                            @if(!in_array($stesen->jenis_pengawasan_id,[4,5,8,7,9]))
                            <div class="form-group form-group-default form-group-default-custom form-group-default-select2">
                                <label>Kategori <span style="color:red;">*</span>
                                </label>
                                <select id="class" name="class" data-placeholder="bulan" class="full-width autoscroll" data-init-plugin="select2" required>
                                    <option disabled hidden selected> Sila Pilih </option>
                                    @foreach($masterstandard as $masterstandards)
                                    <option value="{{$masterstandards->class}}" {{ $stesen->class==$masterstandards->class ? 'selected' : ''}}>{{$masterstandards->class}}</option>
                                    @endforeach
                                </select>
                            </div>
                            @endif

                            @if(in_array($stesen->jenis_pengawasan_id,[7]))
                            <div class="form-group form-group-default form-group-default-custom form-group-default-select2">
                                <label>Jadual <span style="color:red;">*</span>
                                </label>
                                <select id="class" name="class" class="full-width autoscroll" data-init-plugin="select2" required>
                                    <option disabled hidden selected> Sila Pilih </option>
                                    @foreach($masterparameter as $masterparameters)
                                    <option value="{{$masterparameters->schedule}}" {{ $stesen->class==$masterparameters->schedule ? 'selected' : ''}}>{{$masterparameters->schedule}}</option>
                                    @endforeach
                                </select>
                            </div>
                            @endif

                            <!-- untuk sungai sahaja -->
                            @if(in_array($stesen->jenis_pengawasan_id,[1]))
                            <!-- <label class="col-md-3 m-t-15 control-label"><strong>*Rujukan</strong></label> -->
                            <label class="m-t-15 control-label">* Rujukan.</label>
                            <table class="table table-bordered">
                                <tr style="text-align: center">
                                    <th>Kelas</th>
                                    <th>Kegunaan</th>
                                </tr>
                                <tr>
                                    <td>Class I</td>
                                    <td>Conservation of natural environment<br>Water Supply I - Practically no treatment necessary<br>Fishery I - Very sensitive aquatic species</td>
                                </tr>
                                <tr>
                                    <td>Class IIA</td>
                                    <td>Water Supply II - Conventional treatment required<br>Fishery II - Sensitive aquatic species</td>
                                </tr>
                                <tr>
                                    <td>Class IIB</td>
                                    <td>Recreational ise with body contact</td>
                                </tr>
                                <tr>
                                    <td>Class III</td>
                                    <td>Water Supply III - Extensive treatment required<br>Fishery III - Common, of economic value and tolerant species; livestock drinking</td>
                                </tr>
                                <tr>
                                    <td>Class IV</td>
                                    <td>Irrigation</td>
                                </tr>
                                <tr>
                                    <td>Class V</td>
                                    <td>None of the above</td>
                                </tr>
                            </table>
                            @endif

                            <!-- untuk marin sahaja -->
                            @if(in_array($stesen->jenis_pengawasan_id,[2]))
                            <!-- <label class="col-md-3 m-t-15 control-label"><strong>*Rujukan</strong></label> -->
                            <label class="m-t-15 control-label">* Rujukan.</label>
                            <table class="table table-bordered">
                                <tr style="text-align: center">
                                    <th>Kelas</th>
                                    <th>Kegunaan</th>
                                </tr>
                                <tr>
                                    <td>Kelas 1: Habitat Marin Sensitif</td>
                                    <td>Kelas 1 mewakili set standard yang paling ketat selaras dengan ahap perlindungan yang diperlukan oleh habitat marin yang sensitif.<br>Perairan Kelas 1 terdiri daripada:<br>1) Perairan yang diwartakan & Perlindungan Berkanun.<br>- Perairan laut yang diwartakan secara sah untuk perlindungan dan pengurusan khas atau perairan laut yang tertakluk pada beberapa bentuk perlindungan statutori atau perundangan.<br>- Contohnya kawasan perlindungan marin (taman marin, kawasan larangan perikanan), taman negeri, tapak ramsar dan kawasan perlindungan laut yang lain.<br>2) Perairan tidak diwartakan.<br>- Kawasan habitat marin sensitif yang memerlukan perlindungan khas Standard Kelas 1.<br>- Contohnya terumbu karang, rumput laut, laluan & tapak pendaratan penyu dan perairan berkaitan dengan habitat tertentu.</td>
                                </tr>
                                <tr>
                                    <td>Kelas 2: Perikanan <br>(Termasuk Marikultur)</td>
                                    <td>Kelas 2 merangkumi aktiviti perikanan dan marikultur adalah dikenal pasti menggunakan zon penangkapan ikan yang dibangunkan oleh Jabatan Perikanan sebagai panduan.<br>Perairan Kelas 2 terdiri daripada sebahagian zon pemuliharaan (termasuk kawasan larangan perikanan) sehingga ke Zon Ekonomi Eksklusif (EEZ).<br>Aktiviti marikultur yang ditakrifkan sebagai Kelas 2 adalah yang terlibat dengan badan air marin seperti penternakan sangkar dan penternakan kerang dan tidak termasuk aktiviti akuakultur perikanan darat.</td>
                                </tr>
                                <tr>
                                    <td>Kelas 3: Industri, Aktiviti Komersial & Kawasan Kediaman Pesisir Pantai</td>
                                    <td>Kelas 3 ialah standard untuk perairan laut yang terdedah pada pelapasan efluen secara langsung daripada aktiviti antropogenik.<br>Oleh itu, ekosistem di perairan ini tertakluk pada beberapa tahap gangguan.<br>Tahap perlindungan ini bertujuan untuk mengekalkan kesihatan ekosistem yang sedia ada dan untuk meningkatkan keseluruhan kualiti air kawasan yang terjejas.<br>Contoh aktiviti yang berpotensi memberi kesan kepada kesihatan ekosistem laut adalah seperti pelabuhan dan jeti, loji penjanaan kuasa, eksploitasi mineral, hotel dan pusat peranginan, aktiviti penambakan, limbungan kapal, aktiviti penerokaan dan pengeluaran minyak dan gas, akuakultur perikanan darat dan kawasan kediaman pesisir pantai.</td>
                                </tr>
                                <tr>
                                    <td>Kelas E (Interim) Muara Sungai</td>
                                    <td>Kelas E (Interim) adalah standard yang tertakluk pada variasi musim dan diurnal. Selain itu, ciri-ciri geologi dan corak peredaran air turut menyumbang pada sifat dinamik perairan ini. Berdasarkan kepelbagaian semulajadi ini, Kelas E berasal daripada ciri-ciri kualiti air muara sungai yang mewakili persekitaran yang tidak terganggu. Kawasan ini disebut sebagai Tapak Rujukan yang dipilih untuk mewakili tiga jenis muara utama di Malaysia.<br>Kelas E1 dipilih mewakili dataran pantai, Kelas E2 mewakili muara jenis lagun manakala Kelas E3 akan dirujuk apabila muara sungai terdapat rangkaian kompleks.</td>
                                </tr>
                                <tr>
                                    <td>Kelas R: Rekreasi</td>
                                    <td>Standard untuk kegunaan rekreasi perairan laut merujuk kepada Standard Kebangsaan Kualiti Air Rekreasi Semulajadi dan Garispanduan bagi Pemantauan Air Rekreasi Semulajadi (Air Marin & Air Tawar) yang diterbitkan oleh Kementerian Kesihatan, Malaysia.</td>
                                </tr>
                            </table>
                            @endif

                            <!-- untuk tasik sahaja -->
                            @if(in_array($stesen->jenis_pengawasan_id,[3]))
                            <!-- <label class="col-md-3 m-t-15 control-label"><strong>*Rujukan</strong></label> -->
                            <label class="m-t-15 control-label">* Rujukan.</label>
                            <table class="table table-bordered">
                                <tr style="text-align: center">
                                    <th>Kategori</th>
                                    <th>Kegunaan</th>
                                </tr>
                                <tr>
                                    <td>Category A</td>
                                    <td>Lakes that are managed in which the water to be used for recreational purposes - primary body contact such as swimming, diving and kayaking.</td>
                                </tr>
                                <tr>
                                    <td>Category B</td>
                                    <td>Lakes used for recreational purposes - secondary body contact such as boating and cruising.<br>Swimming is not allowed in this category of lakes.</td>
                                </tr>
                                <tr>
                                    <td>Category C</td>
                                    <td>The lakes are meant for the preservation of aquatic life and biodiversity.</td>
                                </tr>
                                <tr>
                                    <td>Category D</td>
                                    <td>Lakes managed for the minimum preservation of good aquatic life in the lakes.<br>It applies good management practices of lakes.</td>
                                </tr>
                            </table>
                            @endif

                            <!-- untuk Tanah -->
                            @if(in_array($stesen->jenis_pengawasan_id,[4]))
                            <div class="form-group form-group-default form-group-default-custom form-group-default-select2">
                                <label>Kategori Jenis Guna Tanah <span style="color:red;">*</span>
                                </label>
                                <select id="kategori_tanah" name="kategori_tanah" data-placeholder="bulan" class="full-width autoscroll" data-init-plugin="select2" required>
                                    <option disabled hidden selected> Sila Pilih </option>
                                    <option value="1" {{ $stesen->kategori_tanah=='1' ? 'selected' : ''}}>Industri</option>
                                    <option value="2" {{ $stesen->kategori_tanah=='2' ? 'selected' : ''}}>Pertanian</option>
                                    <option value="3" {{ $stesen->kategori_tanah=='3' ? 'selected' : ''}}>Tapak Pelupusan Sisa Pepejal</option>
                                    <option value="4" {{ $stesen->kategori_tanah=='4' ? 'selected' : ''}}>Kawasan Bandar/ Pinggir Bandar</option>
                                    <option value="5" {{ $stesen->kategori_tanah=='5' ? 'selected' : ''}}>Kawasan Lombong</option>
                                    <option value="6" {{ $stesen->kategori_tanah=='6' ? 'selected' : ''}}>Padang Golf</option>
                                    <option value="7" {{ $stesen->kategori_tanah=='7' ? 'selected' : ''}}>Kawasan Peranginan(resort)</option>
                                    <option value="8" {{ $stesen->kategori_tanah=='8' ? 'selected' : ''}}>Akuakultur</option>
                                    <option value="9" {{ $stesen->kategori_tanah=='9' ? 'selected' : ''}}>Bekalan Air Tempatan</option>
                                    <option value="10" {{ $stesen->kategori_tanah=='10' ? 'selected' : ''}}>Kawasan Luar Bandar</option>
                                </select>
                            </div>

                            <label class="m-t-15 control-label">* Rujukan.</label>
                            <table class="table table-bordered">
                                <tr style="text-align: center">
                                    <th>Kategori</th>
                                    <th>Kegunaan</th>
                                </tr>
                                <tr>
                                    <td>Air Minuman</td>
                                    <td>Asas bagi pembangunan standard kualiti air tanah untuk penggunaan air minuman mengambil kira faktor-faktor seperti berikut:<br>1) Untuk menentukan tahap bahan kimia atau keadaan dalam badan air yang tidak dijangka yang akan mendatangkan kesan buruk kepada kesihatan manuasia.<br>2) Untuk menentukan tahap mikroba (patogen) untuk melindungi manusia dari organisma mikrob (dirujuk sebagai patogen) seperti bakteria dan virus yang boleh menyebabkan penyakit dan keuzuran.</td>
                                </tr>
                                <tr>
                                    <td>Pertanian</td>
                                    <td>Asas bagi pembangunan standard kualiti air tanah bagi kegunaan pertanian dan penternakan dengan mengambil kira faktor-faktor seperti berikut:<br>1) Parameter yang berkaitan dengan kesan phytotoxic.<br>2) Tolenransi tanaman terhadap kemasinan.<br>3) Kriteria untuk ternakan.</td>
                                </tr>
                                <tr>
                                    <td>Industri</td>
                                    <td>Penggunaan air dalam industri termasuk penyejukan, pemprosesan, rawatan produk, pembersihan dan penggunaan dandang (kebuk tekanan).</td>
                                </tr>
                            </table>
                            
                            <label class="m-t-15 control-label">* Jadual: Bil. Telaga air tanah mengikut kategori-kategori kawasan guna tanah.</label>
                            <table class="table table-bordered">
                                <tr style="text-align: center">
                                    <th>Guna Tanah</th>
                                    <th>Bilangan Telaga Air Tanah</th>
                                </tr>
                                <tr>
                                    <td>Kawasan Pertanian</td>
                                    <td>14</td>
                                </tr>
                                <tr>
                                    <td>Kawasan bandar/pinggir bandar</td>
                                    <td>14</td>
                                </tr>
                                <tr>
                                    <td>Kawasan industri</td>
                                    <td>22</td>
                                </tr>
                                <tr>
                                    <td>Tapak pelupusan sisa pepejal</td>
                                    <td>26</td>
                                </tr>
                                <tr>
                                    <td>Padang golf</td>
                                    <td>7</td>
                                </tr>
                                <tr>
                                    <td>Tapak pelupusan radioaktif</td>
                                    <td>1</td>
                                </tr>
                                <tr>
                                    <td>Kawasan luar bandar</td>
                                    <td>4</td>
                                </tr>
                                <tr>
                                    <td>Bekas kawasan lombong</td>
                                    <td>3</td>
                                </tr>
                                <tr>
                                    <td>Bekalan air tempatan</td>
                                    <td>5</td>
                                </tr>
                                <tr>
                                    <td>Tapak penanaman bangkai babi (J.E)</td>
                                    <td>147</td>
                                </tr>
                                <tr>
                                    <td>Ladang akuakultur</td>
                                    <td>7</td>
                                </tr>
                                <tr>
                                    <td>Kawasan peranginan (resort)</td>
                                    <td>2</td>
                                </tr>
                            </table>
                            @endif
                            
                            <!-- untuk Marin Standard baru sahaja iaitu pemakaian slps 2019 -->
                            @if(in_array($stesen->jenis_pengawasan_id,[2]))
                            <div class="col-md-12 p-t-10">
                                <div class="form-group row">
                                    <!-- <label class="col-md-3 m-t-15 control-label">Sila Pilih Jika Melibatkan Standard R </label> -->
                                    <label class="col-md-3 m-t-15 control-label">Sila Pilih Jika Projek Berdekatan Dengan Kawasan Rekreasi (Kelas R)</label>
                                    <div class="radio radio-primary">
                                        <input name="prima_sekunder" value="1" id="is_prima" type="radio" class="hidden is_prima" >
                                        <label for="is_prima">Sentuhan Prima</label>
                                        <input name="prima_sekunder" value="2" id="is_sekunder" type="radio" class="hidden is_sekunder" >
                                        <label for="is_sekunder">Sentuhan Sekunder</label>
                                    </div>
                                </div>
                            </div>
                            @endif

                        <!-- <div class="col-md-12 p-t-10">
                            <div class="form-group row">
                                <label class="col-md-3 m-t-15 control-label">Jenis Pengawasan<span style="color:red;">*</span> </label>
                                <div class="checkbox check-primary">
                                    <input name="is_tanah" value="1" id="is_tanah" type="checkbox" class="hidden is_tanah" aria-required="true">
                                    <label for="is_tanah">Kerja Tanah</label>
                                    <input name="is_pembinaan" value="1" id="is_pembinaan" type="checkbox" class="hidden is_pembinaan" aria-required="true">
                                    <label for="is_pembinaan">Pembinaan</label>
                                    <input name="is_operasi" value="1" id="is_operasi" type="checkbox" class="hidden is_operasi" aria-required="true">
                                    <label for="is_operasi">Operasi</label>
                                </div>
                            </div>
                        </div> -->


                        <div class="col-md-12">

                           <div class="form-group row">
                            @if(in_array($stesen->jenis_pengawasan_id,[9]))
                            <label class="col-md-3 m-t-15 control-label">Gambar Aerial View </label>
                            @elseif(!in_array($stesen->jenis_pengawasan_id,[5]))
                            <label class="col-md-3 m-t-15 control-label">Bacaan Garis Dasar </label>
                            @endif
                            <div class="checkbox check-primary">
                              @if(!in_array($stesen->jenis_pengawasan_id,[5]))
                              <input name="is_eia" value="1" id="is_eia" type="checkbox" class="hidden is_eia" aria-required="true" checked>
                              <label for="is_eia">Peringkat EIA<span style="color:red;">*</span></label>
                              <input name="is_emp" value="1" id="is_emp" type="checkbox" class="hidden is_emp">
                              <label for="is_emp">Peringkat EMP</label>
                              @endif
                          </div>

                      </div>
                  </div>
                  <div class="form-group form-group-default input-group" id="date_eia" style="display: none">
                      @if(!in_array($stesen->jenis_pengawasan_id,[5]))
                      <div class="form-input-group">
                        <label>Tarikh Pengawasan (EIA)</label>
                        <input class="form-control"  name="date_eia" type="date" value="{{ $stesen->date_eia}}" required="">
                    </div>
                    @endif
                        <!-- <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </div> -->
                    </div>
                    <div class="form-group form-group-default input-group" id="date_emp" style="display: none">
                        @if(!in_array($stesen->jenis_pengawasan_id,[5]))
                        <div class="form-input-group">
                            <label>Tarikh Pengawasan (EMP)</label>
                            <input class="form-control"  name="date_emp" type="date" value="{{$stesen->date_emp}}">
                        </div>
                        @endif
                    </div>


                </div>
                <div class="form-group form-group-default">
                    <label>Gambar Stesen</label>
                    <input type="hidden" name="stesenid" id="stesenid" value="{{$stesen->id}}">
                    <input type="hidden" name="picture_removed" id="picture_removed" value="0">
                    <input type="file" class="dropify ldp2m2" id="gambar_stesen" name="gambar_stesen" data-allowed-file-extensions='["png", "jpg"]' data-max-file-size="10M" <?php if ($stesen->gambar_stesen): ?> data-default-file="{{ asset('../'.$stesen->gambar_stesen) }}"<?php endif ?>/>
                </div>
            </div>
            <div class="modal-footer">
                @if($stesen_status <= 2 && auth()->user()->hasRole('emc'))
                <button type="button" class="btn btn-info" onclick="submitForm('form-stesen-edit')" style="margin-right: 10px;">Simpan</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                @else
                <button type="button" class="btn btn-info" data-dismiss="modal">Selesai</button>
                @endif
            </div>
        </form>
    </div>
</div>
</div>
<script type="text/javascript">
    $( document ).ready(function() {
        @if($stesen->sungai)
        console.log('111');
        var e = document.getElementById("lembangan");
        var lembangan = e.options[e.selectedIndex].value;
        var sungai = '{{$stesen->sungai}}';
        $.ajax({
            url: "{{ url('general/lembangan-sungai') }}/"+lembangan,
            type: 'GET',
            datatype: 'json',
            success: function(data1){
                list1 = '';
                list1_ = '';
                $.each(data1, function(key, district1) {
                    if (sungai == district1.id) {
                        list1 = "<option value='" + district1.id  +"' selected>" + district1.sungai_2020 + "</option>";
                    } else{
                        list1 = "<option value='" + district1.id  +"'>" + district1.sungai_2020 + "</option>";
                    }

                    list1_ = list1_ + list1;
                });
                console.log(list1_);
                $("#sungainama").empty().append(list1_);
            },
            error: function(xhr, ajaxOptions, thrownError){
                console.log(thrownError);
            }
        });
        @endif
    });
// $("#modal-edit").modal("show");
$('#modal-edit').modal({
    backdrop: 'static',
    keyboard: false
});
$('.modal form').trigger("reset");
$(".modal form").validate();

$('.dropify').dropify({
    messages: {
        'default': 'Klik di sini jika ingin masukkan gambar',
        'replace': 'Klik sini jika ingin tukar',
        'remove':  'Padam',
        'error':   'Maaf, sesuatu yang tidak dijangka telah berlaku.'
    }
});

var drEvent = $('.dropify').dropify();
drEvent.on('dropify.afterClear', function(event, element){
    $("#picture_removed").val("1");
});

function onlyNumberKey(evt) { 

    // Only ASCII charactar in that range allowed 
    var ASCIICode = (evt.which) ? evt.which : evt.keyCode 
    if ( ASCIICode != 46 && ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57)) 
        return false; 
    return true; 
}

$('#latitud').bind('paste', function (event) {
    console.log('yuhuzz');
    var regex = /^[a-zA-Z%()#@_& -]+$/;
    var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
    if (!regex.test(key)) {
        event.preventDefault();
        return false;
    }
    if (event.originalEvent.clipboardData.getData('Text').match(/[^\d]/)) {
        event.preventDefault();
    }

});

$('#longitud').bind('paste', function (event) {
    console.log('yuhuzz2');
    var regex = /^[a-zA-Z%()#@_& -]+$/;
    var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
    if (!regex.test(key)) {
        event.preventDefault();
        return false;
    }
    if (event.originalEvent.clipboardData.getData('Text').match(/[^\d]/)) {
        event.preventDefault();
    }

});


$('body').on('change','input:checkbox[name="is_eia"]',function () {

    if ($('input[name=\'is_eia\'][value=1]').prop('checked')==true) {
        document.getElementById('date_eia').style.display = 'block';
    }else{
        document.getElementById('date_eia').style.display = 'none';
    }

    if ($('input[name=\'is_emp\'][value=1]').prop('checked')==true) {
        document.getElementById('date_emp').style.display = 'block';
    }else{
        document.getElementById('date_emp').style.display = 'none';
    }
})

$('body').on('change','input:checkbox[name="is_emp"]',function () {
    if ($('input[name=\'is_emp\'][value=1]').prop('checked')==true) {
        document.getElementById('date_emp').style.display = 'block';
    }else{
        document.getElementById('date_emp').style.display = 'none';
    }
})

$(document).ready(function() {
    if($('.is_eia').prop("checked") == true) {
        document.getElementById('date_eia').style.display = 'block';
    } else document.getElementById('date_eia').style.display = 'none';

    if($('.is_emp').prop("checked") == true) {
        document.getElementById('date_emp').style.display = 'block';
    } else document.getElementById('date_emp').style.display = 'none';
});

$("#form-stesen-edit").submit(function(e) {
    e.preventDefault();
    var form = $(this);

    if(!form.valid()){
        swal('', 'Maklumat tidak lengkap.');
        return;
    }

    $.ajax({
        url: form.attr('action'),
        method: form.attr('method'),
        data: new FormData(form[0]),
        dataType: 'json',
        async: true,
        contentType: false,
        processData: false,
        success: function(data) {
          swal(data.title, data.message);
          $("#modal-edit").modal("hide");
          tableSungai.api().ajax.reload(null, false);
          tableMarin.api().ajax.reload(null, false);
          tableTasik.api().ajax.reload(null, false);
          tableTanah.api().ajax.reload(null, false);
          tableAir.api().ajax.reload(null, false);
          tableUdara.api().ajax.reload(null, false);
          tableBunyi.api().ajax.reload(null, false);
          tableGetaran.api().ajax.reload(null, false);
          tableDron.api().ajax.reload(null, false);
      }
  });
});

@if($stesen->is_tanah == 1)
$("#is_tanah").prop('checked', true).trigger('change');
@endif

@if($stesen->is_pembinaan == 1)
$("#is_pembinaan").prop('checked', true).trigger('change');
@endif

@if($stesen->is_operasi == 1)
$("#is_operasi").prop('checked', true).trigger('change');
@endif

@if($stesen->is_eia == 1)
$("#is_eia").prop('checked', true).trigger('change');
@endif

@if($stesen->is_emp == 1)
$("#is_emp").prop('checked', true).trigger('change');
@endif

@if($stesen->is_prima == 1)
$("#is_prima").prop('checked', true).trigger('change');
@endif

@if($stesen->is_sekunder == 1)
$("#is_sekunder").prop('checked', true).trigger('change');
@endif

$("#lembangansungai #lembangan").on('change', function() {
    list1 = $(this).parents('#lembangansungai').find('#sungainama');
    list1.empty();
    list1.append("<option disabled selected hidden>Pilih Sungai...</option>");

    $.ajax({
        url: "{{ url('general/lembangan-sungai') }}/"+$(this).val(),
        type: 'GET',
        datatype: 'json',
        success: function(data1){
            $.each(data1, function(key, district1) {
                list1.append("<option value='" + district1.id  +"'>" + district1.sungai_2020 + "</option>");
            });
        },
        error: function(xhr, ajaxOptions, thrownError){
            console.log(thrownError);
        }
    });
});
</script>

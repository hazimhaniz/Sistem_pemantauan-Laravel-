<div class="modal fade" id="viewLaporanPemarkahanModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="display: block;">
    <div class=" modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalTitle">  <b>Status Laporan Pengawasan Mengikut Projek Bagi {{ $pemarkahanFinal ? $pemarkahanFinal->bulan : '' }} - {{ $pemarkahanFinal ? $pemarkahanFinal->tahun : '' }} </b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body m-t-20">
                <label style="font-size:14px; font-family: 'Montserrat'"><b>No Fail JAS: </b> {{ $projek ? $projek->no_fail_jas : '' }} </label>
                <label style="font-size:14px; font-family: 'Montserrat'"><b>Nama Projek: </b> {{ $projek ? $projek->nama_projek : '' }} </label>
                <div class="row">
                    <div class="col-md-12">
                        <table class="table" id="" role="grid" aria-describedby="table_info" border="0px" style="padding:10px;">
                            <thead>
                                <tr role="row">
                                    <th bgcolor="#206575" class="align-top text-center" style="width:2%; vertical-align:top; color:#fff">Laporan</th>
                                    <th bgcolor="#206575" class="align-top text-center" style="width:10%; vertical-align:top; color:#fff">MAKSIMUM MARKAH (%)</th>
                                    <th bgcolor="#206575" class="align-top text-center" style="width:30%; vertical-align:top; color:#fff">JUMLAH KUIRI YANG DIREKODKAN</th>
                                    <th bgcolor="#206575" class="align-top text-center" style="width:10%; vertical-align:top; color:#fff">JUMLAH POTONGAN (%)</th>
                                    <th bgcolor="#206575" class="align-top text-center" style="width:10%; vertical-align:top; color:#fff">JUMLAH MARKAH (%)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="align-top text-center">Bahagian A (EIA 1-18)</td>
                                    <td class="align-top text-center"> {{ config('markah.A') }} </td>
                                    <td class="align-top text-center"> {{ $pemarkahanFinal ? $pemarkahanFinal->monthly_a_kuiri : '' }} </td>
                                    <td class="align-top text-center"> {{ $pemarkahanFinal->monthly_a_kuiri * config('markah.deduct') }} </td>
                                    <td class="align-top text-center"> {{ $pemarkahanFinal ? $pemarkahanFinal->monthly_a : '' }} </td>
                                </tr>
                                <tr>
                                    <td class="align-top text-center">Bahagian B (EIA 2-18)</td>
                                    <td class="align-top text-center"> {{ config('markah.B') }} </td>
                                    <td class="align-top text-center"> {{ $pemarkahanFinal ? $pemarkahanFinal->monthly_b_kuiri : '' }} </td>
                                    <td class="align-top text-center"> {{ $pemarkahanFinal->monthly_b_kuiri * config('markah.deduct') }} </td>
                                    <td class="align-top text-center"> {{ $pemarkahanFinal ? $pemarkahanFinal->monthly_b : '' }} </td>
                                </tr>
                                <tr>
                                    <td class="align-top text-center">Bahagian C</td>
                                    <td class="align-top text-center"> {{ config('markah.C') }} </td>
                                    <td class="align-top text-center"> {{ $pemarkahanFinal ? $pemarkahanFinal->monthly_c_kuiri : '' }} </td>
                                    <td class="align-top text-center"> {{ $pemarkahanFinal->monthly_c_kuiri * config('markah.deduct') }} </td>
                                    <td class="align-top text-center"> {{ $pemarkahanFinal ? $pemarkahanFinal->monthly_c : '' }} </td>
                                </tr>
                                <tr>
                                    <td class="align-top text-center">Bahagian D (BMPs)</td>
                                    <td class="align-top text-center"> {{ config('markah.D') }} </td>
                                    <td class="align-top text-center"> {{ $pemarkahanFinal ? $pemarkahanFinal->monthly_d_kuiri : '' }} </td>
                                    <td class="align-top text-center"> {{ $pemarkahanFinal->monthly_d_kuiri * config('markah.deduct') }} </td>
                                    <td class="align-top text-center"> {{ $pemarkahanFinal ? $pemarkahanFinal->monthly_d : '' }} </td>
                                </tr>
                                <tr>
                                    <td class="align-top text-center">Bahagian E (Audit)</td>
                                    <td class="align-top text-center"> {{ config('markah.E') }} </td>
                                    <td class="align-top text-center"> {{ $pemarkahanFinal ? $pemarkahanFinal->monthly_e_kuiri : '' }} </td>
                                    <td class="align-top text-center"> {{ $pemarkahanFinal->monthly_e_kuiri * config('markah.deduct') }} </td>
                                    <td class="align-top text-center"> {{ $pemarkahanFinal ? $pemarkahanFinal->monthly_e : '' }} </td>
                                </tr>
                                <tr>
                                    <td class="align-top text-center">Bahagian F (EMT))</td>
                                    <td class="align-top text-center"> {{ config('markah.F') }} </td>
                                    <td class="align-top text-center"> {{ $pemarkahanFinal ? $pemarkahanFinal->monthly_f_kuiri : '' }} </td>
                                    <td class="align-top text-center"> {{ $pemarkahanFinal->monthly_f_kuiri * config('markah.deduct') }} </td>
                                    <td class="align-top text-center"> {{ $pemarkahanFinal ? $pemarkahanFinal->monthly_f : '' }} </td>
                                </tr>
                                <tr>
                                    <td class="align-top text-center"><b>TOTAL</b></td>
                                    <td class="align-top text-center"></td>
                                    <td class="align-top text-center"></td>
                                    <td class="align-top text-center"></td>
                                    <td class="align-top text-center"><b> {{ $pemarkahanFinal ? $pemarkahanFinal->total : '' }} </b></td>
                                </tr>
                            </tbody>
                        </table>
                        <br>
                        <div class="row">
                            <div class="col-md-6">
                                <small class="text-muted">Nota : 1 Kuiri = -2 Markah</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2">
                        <br/><br/>
                        {{-- <a href="{{ url('/pengurusan_projek/laporan/pemarkahan-sah') }}/{{ $pemarkahanFinal ? $pemarkahanFinal->id : '' }}" class="btn btn-success btn-sm"> SAHKAN </a> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $("#viewLaporanPemarkahanModal").modal('show');
</script>
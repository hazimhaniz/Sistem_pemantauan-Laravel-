<?php

namespace App\Http\Controllers;

use App\JenisPengawasan;
use App\MasterModel\MasterParameter;
use App\MasterModel\MasterPengawasan;
use App\MasterModel\MasterStandard;
use App\Models\BacaanCerap;
use App\Models\MonthlyC;
use App\Models\Parameter;
use App\Projek;
use App\Stesen;
use Illuminate\Http\Request;

class StatistikController extends Controller
{
    public function getJenisPengawasan(Request $request, $id)
    {
        $JenisPengawasan = JenisPengawasan::where('projek_id', $id)->first();
        if (empty($JenisPengawasan) || $id == 359) {
            return ['success' => false];
        }
        $JenisPengawasan = json_decode($JenisPengawasan->jenis_pengawasan_id, true);
        $pengawasan = [];

        foreach ($JenisPengawasan as $key => $value) {
            $master = MasterPengawasan::where('id', $value)->first();
            $pengawasan[] = $master->jenis_pengawasan;
        }
        return ['jenis_pengawasan' => $pengawasan, 'success' => true];
    }

    public function getStesen(Request $request, $id)
    {
        $pengawasan = MasterPengawasan::where('jenis_pengawasan', $request->pengawasan)->first();
        $pengawasanId = $pengawasan->id;

        $stesenData = Stesen::where('projek_id', $id)->where('jenis_pengawasan_id', $pengawasanId)->groupby('projek_id','jenis_pengawasan_id')->get();
        
        return ['stesenData' => $stesenData];
    }

    public function getparameter($id)
    {
        $parameters = Parameter::where('stesen_id', $id)->whereNotNull('baselineeia')->get();
        foreach ($parameters as $key => $value) {
            $master = MasterParameter::where('id', $value->parameter)->first();
            $data[$key]['name'] = $master->jenis_parameter;
            $data[$key]['id'] = $value->id;
        }
        return ['parameter' => $data];
    }

    public function submitStatistikSai(Request $request, $type)
    {
        $pengawasan = MasterPengawasan::where('jenis_pengawasan', $request->jenis_pengawasan)->first();
        $pengawasanId = $pengawasan->id;
        $projek_ids = $request->projek_id;

        $startYear = date('Y-m', strtotime($request->tarikh_mula));
        $sym = date('m', strtotime($startYear));
        $startTime = strtotime($startYear);
        $syr = date('Y', strtotime($startYear));

        $endYear = date('Y-m', strtotime($request->tarikh_akhir));
        $endTime = strtotime($endYear);
        $data = $p = $xaxis = [];

        if ($type == 'single') {
            $stesen = Stesen::where('id', $request->stesen_data)->first();

            $stesens = Stesen::where('stesen.jenis_pengawasan_id', $pengawasanId)->where('stesen.stesen', $stesen->stesen)
                ->join('monthly_c_detail', 'monthly_c_detail.stesen_id', '=', 'stesen.id')
                ->select(['stesen.id as stesen_id', 'monthly_c_detail.monthly_c_id', 'stesen.tahun', 'stesen.bulan'])
                ->where('stesen.projek_id', $request->projek_id)->get();

            foreach ($stesens as $key => $value) {
                $stesenDate = $value->tahun . '-' . $value->bulan;
                $stesenTime = strtotime($stesenDate);

                if ($stesenTime > $startTime && $stesenTime < $startTime) {

                    $monthlyC = new MonthlyC;
                    $monthlyC = $monthlyC->where('id', $value->monthly_c_id)->first();
                    $data[] = BacaanCerap::where('monthly_c_id', $monthlyC->id)->where('parameter_id', $request->parameter)->first();
                } elseif ($stesenTime == $startTime || $stesenTime == $endTime) {
                    $monthlyC = new MonthlyC;
                    $monthlyC = $monthlyC->where('id', $value->monthly_c_id)->first();
                    $data[] = BacaanCerap::where('monthly_c_id', $monthlyC->id)->where('parameter_id', $request->parameter)->first();
                }
            }
            $parameters = Parameter::where('id', $request->parameter)->first();
            $standard = MasterStandard::where('id', $parameters->standard)->first();
            $masterParameter = MasterParameter::find($parameters->parameter);

        } else {

            for ($i = 0; $i <= 1; $i++) {
                if ($i == 0) {
                    $stesen = Stesen::where('id', $request->stesen_data1)->first();

                    $stesen1name = $stesen->stesen;

                } else {
                    $stesen = Stesen::where('id', $request->stesen_data2)->first();

                    $stesen2name = $stesen->stesen;

                }
                $stesens = Stesen::where('stesen.jenis_pengawasan_id', $pengawasanId)->where('stesen.stesen', $stesen->stesen);
                foreach ($stesens as $key1 => $value) {
                    $stesenDate = $value->tahun . '-' . $value->bulan;
                    $stesenTime = strtotime($stesenDate);

                    if ($stesenTime > $startTime && $stesenTime < $startTime) {
                        $monthlyC = new MonthlyC;
                        $monthlyC = $monthlyC->where('id', $value->monthly_c_id)->first();
                        $data[$value->id][] = BacaanCerap::where('monthly_c_id', $monthlyC->id)->where('parameter_id', $request->parameter)->first();
                    } elseif ($stesenTime == $startTime || $stesenTime == $endTime) {
                        $monthlyC = new MonthlyC;
                        $monthlyC = $monthlyC->where('id', $value->monthly_c_id)->first();
                        $data[$value->id][] = BacaanCerap::where('monthly_c_id', $monthlyC->id)->where('parameter_id', $request->parameter)->first();
                    }
                }
                if ($i == 0) {
                    $parameters = Parameter::where('id', $request->parameter1)->first();

                    $parameterss1 = Parameter::where('id', $request->parameter1)->with('masterParameter')->get()->pluck('masterParameter.jenis_parameter');
    
                    
                    
                } else {
                    $parameters = Parameter::where('id', $request->parameter2)->first();
                    $parameterss2 = Parameter::where('id', $request->parameter2)->with('masterParameter')->get()->pluck('masterParameter.jenis_parameter');
                    
                }
                $standards = MasterStandard::where('id', $parameters->standard)->first();
                $masterParam = MasterParameter::find($parameters->parameter);
                $baselineeia = $parameters->baselineeia;
                //$baselineemp = $parameters->baselineemp;
                $parameterParams = $parameters->parameter;
                $monthlyCss = MonthlyC::where('projek_id', $projek_ids)->get();
                $bacaanCerapss = BacaanCerap::whereHas('parameter', function ($query) use ($parameterParams) {
                    $query->where('parameter', $parameterParams);
                })->whereIn('monthly_c_id', $monthlyCss->pluck('id')->toArray())->whereNotNull('bacaan_cerap')->first();

                

                $masterParameter[$i] = $masterParam;
                $standard[$i] = is_numeric($standards->parameter) ? (float) $standards->parameter : 0;
                $eia[$i] = is_numeric($baselineeia) ? (float) $baselineeia : 0;
                $cerap[$i] = is_numeric($bacaanCerapss->bacaan_cerap) ? (float) $bacaanCerapss->bacaan_cerap : 0;
                
                if ( $i == 1){
                $data1 = array($standard[$i], $eia[$i], $cerap[$i]); }

                else {
                $data2 = array($standard[$i], $eia[$i], $cerap[$i]); }

            }
        }

        return ['data' => $data, 'parameter_name' => $masterParameter, 'standard' => $standard, 'unit' => $masterParameter, 'start_year' => $syr, 'eia' => $eia, 'cerap' => $cerap, 'data1' => $data1, 'data2' => $data2, 'parameter1name' => $parameterss1, 'parameter2name' => $parameterss2, 'stesen1name' => $stesen1name, 'stesen2name' => $stesen2name];
    }

    public function submitStatistik(Request $request)
    {
        $projek_id = $request->projek_id;
        $tarikh_mula = $request->tarikh_mula;
        $tarikh_akhir = $request->tarikh_akhir;
        $stesen_data = $request->stesen_data;
        $parameter = $request->parameter;
        $jenis_pengawasan = $request->jenis_pengawasan;
        $tahun_pengawasan = $request->tahun_pengawasan;
        $bulan_pengawasan = $request->bulan_pengawasan;
        $tahunp = $request->tahun_pengawasan;
        $bulanp = $request->bulan_pengawasan;

        $projek = Projek::where('id', $projek_id)->first();
        $monthlyCs = MonthlyC::where('projek_id', $projek_id)->where('tahun', $tahunp)->where('bulan', $bulanp)->get();

        $parameter = Parameter::where('id', $parameter)->first();
        
        $parameterParam = $parameter->parameter;

        $bacaan_standard = MasterStandard::where('id', $parameter->standard)->first();


        $bacaanCeraps = BacaanCerap::whereHas('parameter', function ($query) use ($parameterParam) {
            $query->where('parameter', $parameterParam);
        })->whereIn('monthly_c_id', $monthlyCs->pluck('id')->toArray())->whereNotNull('bacaan_cerap')->get();

        $categories = [];
        $data_cerap = [];
        $data_baselineeia = [];
        $data_baselineemp = [];
        $data_standard = [];

        foreach ($bacaanCeraps as $key => $bacaanCerap) {
            $parameter = $bacaanCerap->parameter;
            if ($parameter) {
                $categories[] = "";
                $data_cerap[] = is_numeric($bacaanCerap->bacaan_cerap) ? (float) $bacaanCerap->bacaan_cerap : 0;
                $data_baselineeia[] = is_numeric($parameter->baselineeia) ? (float) $parameter->baselineeia : 0;
                $data_baselineemp[] = is_numeric($parameter->baselineemp) ? (float) $parameter->baselineemp : 0;
                $data_standard[] =   is_numeric($bacaan_standard->parameter) ? (float) $bacaan_standard->parameter : 0;
            }
        }

        $response['categories'] = $categories;
        $response['data_cerap'] = $data_cerap;
        $response['data_baselineeia'] = $data_baselineeia;
        $response['data_baselineemp'] = $data_baselineemp;
        $response['data_standard'] = $data_standard;
        $response['title'] = $parameter->masterParameter->jenis_parameter;

        return response()->json($response);
    }

}

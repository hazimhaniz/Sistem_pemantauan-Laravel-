<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $projek_id
 * @property string $bulan
 * @property string $tahun
 * @property int $monthly_a
 * @property int $monthly_b
 * @property int $monthly_c
 * @property int $monthly_d
 * @property int $monthly_e
 * @property int $monthly_f
 * @property int $total
 * @property string $created_at
 * @property string $updated_at
 */
class LaporanPermakahanFinal extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'laporan_permakahan_final';

    /**
     * @var array
     */
    protected $fillable = ['projek_id', 'bulan', 'tahun', 'monthly_a', 'monthly_b', 'monthly_c', 'monthly_d', 'monthly_e', 'monthly_f', 'total', 'created_at', 'updated_at'];

    public function projek()
    {
        return $this->belongsTo('App\Projek', 'projek_id', 'id');
    }

    public function getLabelMarkah()
    {
        $total = $this->total;
        $label = "";
        $tooltipTitle = "";

        if($total < 50)
        {
            $label = "label-light-danger";
            $tooltipTitle = "TIDAK PATUH";
        }
        else if($total < 70)
        {
            $label = "label-light-warning";
            $tooltipTitle = "PATUH SEBAHAGIAN";
        }
        else{
            $label = "label-light-success";
            $tooltipTitle = "PATUH";
        }

        return "<span class='label ".$label."' data-toggle='tooltip' data-placement='top' title='".$tooltipTitle."'> ".$total." </span>";
    }
}

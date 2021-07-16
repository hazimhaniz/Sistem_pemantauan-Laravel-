<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Models\EntityFile;
use App\Models\UploadedFile;

class MonthlyDRainyDetail extends Model
{
	protected $table = 'monthly_d_rainy_detail';
	public $fillable =['monthlyd_rainy_main_id'];
	public $dates = ['kod_bmp_date'];

	public function kodbmp() {
		return $this->belongsTo('App\MasterModel\MasterKodBMP', 'kod_bmp', 'id');
	}
	public function elemen() {
		return $this->belongsTo('App\MasterModel\MasterElemenPemeriksaan', 'elemen_pemeriksaan', 'id');
	}

	public function uploadedFiles()
	{
		return $this->hasManyThrough(UploadedFile::class, EntityFile::class, 'entity_id', 'id', 'id', 'uploaded_file_id');
	}

	public function docType($docType = 'laporan_hujan_files')
	{   

		if ($docType) { 
			return $this->uploadedFiles()->where('doc_type', $docType);
		} else {
			return $this->uploadedFiles();
		}

	}
}

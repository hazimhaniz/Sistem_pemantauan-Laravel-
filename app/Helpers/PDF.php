<?php 
use ConvertApi\ConvertApi;
use Dompdf\Dompdf;
use App\Custom\PhpWord;

function docxToPdf($temp_file){
	try {
		ConvertApi::setApiSecret('Rv4uqhqEfBh36JcX');
		$result = ConvertApi::convert('pdf', ['File' => $temp_file]);
		# save to file
		$path = $temp_file;
		$filename = basename($path);  
	 	$filename = str_replace(".docx",".pdf",$filename);
	 	$storepath = storage_path('tmp/'.$filename);

		$result->getFile()->save($storepath);

		if(file_exists($storepath)) {
			return response()->download($storepath);
		}
	} catch (Exception $e) {
		\PhpOffice\PhpWord\Settings::setPdfRendererPath(base_path() . '/vendor'. '/dompdf/dompdf');
		\PhpOffice\PhpWord\Settings::setPdfRendererName('DomPDF');
	 	//Load temp file
		$phpWord = \PhpOffice\PhpWord\IOFactory::load($temp_file);
	 	$path = $temp_file;
		$filename = basename($path);  
	 	$filename = str_replace(".docx",".pdf",$filename);
		$storepath = storage_path('tmp/'.$filename);
	 	//Save it
		$xmlWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord , 'PDF');
		$xmlWriter->save($storepath);  
	 	// readfile(storage_path('tmp/'.$filename));
	     if(file_exists($storepath)) {
		   header('Content-Description: File Transfer');
		   header('Content-Type: application/octet-stream');
		   header('Content-Disposition: attachment; filename="'.$filename.'"');
		   header('Content-Transfer-Encoding: binary');
		   header('Expires: 0');
		   header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
		   header('Pragma: public');
		   header('Content-Length: ' . filesize($storepath));
		   ob_clean();
		   ob_end_flush();
		   $handle = fopen($storepath, "rb");
		   while (!feof($handle)) {
		     echo fread($handle, 1000);
		   }
		   // ignore_user_abort(true);
		   // unlink($storepath);
		}
	}
}  
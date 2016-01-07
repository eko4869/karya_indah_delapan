<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pdf 
{
	function create($html='KOSONG', $filename='pdf', $open=true, $paper='A4', $orientation='P')
	{
		require_once(APPPATH.'third_party/mpdf/mpdf.php');

		$mpdf = new mPDF('', $paper, '', '', '', '', '', '', '', '', $orientation);
		$mpdf->WriteHTML($html);

		if($open == true)
			$mpdf->Output();
		elseif($open == false)
			$mpdf->Output($filename.'.pdf', 'D');
	}
}

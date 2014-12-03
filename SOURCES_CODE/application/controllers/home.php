<?php /* 
	type : controller
	file_name : home.php
    file_type : php
    author : Jedsadakorn Sirikunpan
    details : Controller homepage
	start_date : 16/9/2557
    end_Date : -
*/ ?>
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Home extends CI_Controller {
	function __construct(){ /// เป็นฟังชั่นที่จะทำงานก่อน index จะทำงานเมื่อมีการเรียกใช้คราส Login นี้
            parent::__construct();
			
    }
	function index()
	{	
		$this->session->unset_userdata('loginData');
		$this->load->view('homeLogin');
	}
	
	function logout(){
		$this->session->unset_userdata('loginData');
		$this->load->view('homeLogin');
	}
	
	function forgetPassword(){
		$this->load->view('form/forgetPassword');
	}
	function loginForm(){
		$this->load->view('form/loginForm');
	}
	function fix(){
		$this->load->view('fix');
	}


	function test2(){
		$this->load->view('test2');
	}
	
	function ccc(){
		$data =$this->db->get('meetings')->result_array();
		echo count($data);
	
	}
	
	function outPDF(){
		require_once('tcpdf/setPDF.php'); 
		require_once('tcpdf/config/lang/eng.php');
require_once('tcpdf/tcpdf.php');
require_once('tcpdf/htmltoolkit.php');
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Siam Apps');
$pdf->SetTitle('http://siam-apps.blogspot.com');
$pdf->SetSubject('Auto Print');
$pdf->SetKeywords('Siam Apps, PDF, Auto Print');
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
$pdf->SetMargins(10, 10, 10);
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
$pdf->setLanguageArray($l);
$pdf->SetFont('freeserif', 'N', 16);
		$meetingsData['meeting'] =$this->db->get('meetings')->result_array();

		$resolution= array(139.7, 254); // 10x5.5 inch
		$pdf->AddPage('L', $resolution);
		$htm=$this->load->view('test',$meetingsData,TRUE);

	$html=AdjustHTML(stripslashes($htm));
	$filename = date('Y-m-d_hms');
	$pdf->writeHTMLCell($w=0, $h=0, $x='', $y='', $html, $border=0, $ln=1, $fill=0, $reseth=true, $align='', $autopadding=true);
	$printer = "printer";
	$filename = date('Y-m-d_hms');
	//$pdf->Output('./up/'.$filename.'.PDF', 'F');
	$command = 'D:\tcpdf\SumatraPDF -print-to '.$printer.' \\\192.168.2.100\up\\'.$filename.'.PDF -exit-on-print';

	exec($command); 
	echo "Complete Print <a href='/up/".$filename.".PDF' target=_blank>".$filename.".PDF</a> to ".$filename;

	}

}

?>
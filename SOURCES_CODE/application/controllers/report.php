<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Report extends CI_Controller {
	
	function __construct(){ /// เป็นฟังชั่นที่จะทำงานก่อน index จะทำงานเมื่อมีการเรียกใช้คราส Login นี้
            parent::__construct();

			$this->load->library('mpdf/mpdf');



			
    }

	    function chartsPolicingsReport(){
        $this->gcharts->load('PieChart');
	

				$this->db->join('childrens','childrens.childrenId = policings.childrenId');
				$this->db->group_by('childrens.childrenId');
				$allRowPolicings = count($this->db->get('policings')->result_array());
				
				$allRowChildrens = count($this->db->get('childrens')->result_array());
				

				$rowNotPolicings = $allRowPolicings-$allRowChildrens;
				
				if($rowNotPolicings < 0){
					
					$rowNotPolicings = $rowNotPolicings * (-1);
				
				}
				$percenNotPolicings = ($rowNotPolicings*100)/$allRowChildrens;
				
				$percenPolicings = ($allRowPolicings*100)/$allRowChildrens;
				
				$Amount[1] = $allRowPolicings;//number_format($percenNotPolicings,1,'.',',');

				$Amount[2] =$rowNotPolicings;//number_format($percenPolicings,1,'.',',');
		
				
        $this->gcharts->DataTable('Policings')
                      ->addColumn('string', 'Policings', 'policings')
                      ->addColumn('number', 'Amount', 'amount');
		$title[1] ='ได้เข้ารับการตรวจ';
		$title[2] ='ไม่ได้เข้ารับการตรวจ';
		


		for($a = 1; $a <= 2; $a++)
        {
            $data = array(
                $title[$a],$Amount[$a],
            );

            $this->gcharts->DataTable('Policings')->addRow($data);

			
        }
        $config = array(
            'title' => 'สถิติการเข้ารับการตรวจสุขภาพฟัน',
			'colors' => array('#00CD00', '#FF4500')
        );

        $this->gcharts->PieChart('Policings')->setConfig($config);

     //   $html = $this->load->view('chart/PolicingChart',TRUE);
	$html = '
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>
<body><center>';
	 $html.=	$this->gcharts->PieChart('Policings')->outputInto('chartResult_div');
   	 $html.=	$this->gcharts->div(635,350);
	$html.= '<input  type="button" value="พิมพ์" onClick="window.print()"/></center></body>
</html>';

echo $html;

    }
	
	

}?>
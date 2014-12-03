<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Report extends CI_Controller {
	
	function __construct(){ /// เป็นฟังชั่นที่จะทำงานก่อน index จะทำงานเมื่อมีการเรียกใช้คราส Login นี้
            parent::__construct();

			$this->load->library('mpdf/mpdf');



			
    }
function statisticPolicingsReport(){
	$this->load->view('statistic/statisticPolicings');
	
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
		$title[1] ='ได้รับการตรวจ';
		$title[2] ='ไม่ได้รับการตรวจ';
		


		for($a = 1; $a <= 2; $a++)
        {
            $data = array(
                $title[$a],$Amount[$a]
            );

            $this->gcharts->DataTable('Policings')->addRow($data);

			
        }
		        $titleStyle = $this->gcharts->textStyle()
                                    ->color('#2A2A2A')
                                    ->fontName('Tahoma')
                                    ->fontSize(20);
        $config = array(
            'title' => 'สถิติการเข้ารับการตรวจสุขภาพฟัน',
			'titleTextStyle' => $titleStyle,
			'colors' => array('#00CD00', '#FF4500'),
			'is3D' => TRUE
        );
	
        $this->gcharts->PieChart('Policings')->setConfig($config);

     // $html = $this->load->view('chart/PolicingChart',TRUE);
	 $html.=$this->gcharts->PieChart('Policings')->outputInto('chartResult_div');
  	$html.=$this->gcharts->div(700,400);

	echo $html;

    }
function policingsColumnChart(){
	
}

}?>
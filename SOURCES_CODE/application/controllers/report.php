<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Report extends CI_Controller {
	
	function __construct(){ /// เป็นฟังชั่นที่จะทำงานก่อน index จะทำงานเมื่อมีการเรียกใช้คราส Login นี้
            parent::__construct();

			$this->load->library('mpdf/mpdf');



			
    }
function statisticPolicingsReport(){
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
				
				$data['NotPolicings'] = number_format($percenNotPolicings,1,'.',',');

				$data['Policings'] = number_format($percenPolicings,1,'.',',');
				$this->load->view('statistic/statisticPolicings',$data);
	
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
		
		$legendStyle = $this->gcharts->textStyle()
											->color('#3D3D3D')
											->fontName('Bold')
											->fontSize(20);
											
							$legend = new legend(array(
								'position' => 'bottom',
								'alignment' => 'start',
								'textStyle' => $legendStyle
							));
	     $titleStyle = $this->gcharts->textStyle()
                                    ->color('#2A2A2A')
                                    ->fontName('Tahoma')
                                    ->fontSize(25);
        $config = array(
            'title' => 'สถิติการเข้ารับการตรวจสุขภาพฟัน',
			'titleTextStyle' => $titleStyle,
			 'legend' => $legend,
			'colors' => array('#00CD00', '#FF4500'),
			'is3D' => TRUE
        );
	
        $this->gcharts->PieChart('Policings')->setConfig($config);

	
	 $html['graph'].=$this->gcharts->PieChart('Policings')->outputInto('chartResult_div');

  		$html['graph'].=$this->gcharts->div(700,400);


	
	$this->load->view('chart/PolicingChart',$html); 
	

    }
function chartsPolicingsReportPrint(){
	echo '<br>';
	$this->chartsPolicingsReport();
	echo '
	<script>
		window.print();
	
	</script>';
	}
function policingsBehaviorMagChart(){
	
		$allAndType = $this->Behavior->getBehaviorReport();
		
		$behavior = $this->Behavior->getBehavior();
		

		for($i=0;$i<count($behavior);$i++){
			$data[$i]['nagative']=0;
			$data[$i]['positive']=0;
			$data[$i]['behaviorId']=$behavior[$i]['behaviorId'];
			$data[$i]['behaviorName']=$behavior[$i]['behaviorName'];
			$data[$i]['colorCode']='#'.$behavior[$i]['colorCode'];
			$sumPositive=0;
			$sumNagative=0;
			for($ii=0;$ii<count($allAndType);$ii++){
				
				
				if($behavior[$i]['behaviorId']==$allAndType[$ii]['behaviorId']){

					if($allAndType[$ii]['policingDetialValue']==0){
						$data[$i]['nagative']++;
						$sumNagative=$sumNagative+1;
					}else{
						$data[$i]['positive']++;
						$sumPositive=$sumPositive+1;
					}
				}
				
				
				
			}
			$poll['nagative']=$poll['nagative']+$sumNagative;
			$poll['positive']=$poll['positive']+$sumPositive;
			
		}
		$poll['sumAll']=$poll['nagative']+$poll['positive'];

		$this->gcharts->load('ColumnChart');

$this->gcharts->DataTable('Behavior')->addColumn('string','Behavior','behavior');
		$title[1] ='ทำ/มี';
		$title[2] ='ไม่ทำ/ไม่มี';

		$colorCode = array();
		for($i = 1; $i<=2; $i++)
        {
  $this->gcharts->DataTable('Behavior')->addColumn('number',$title[$i],$title[$i]);
		
			 
 for($ii = 1; $ii<=count($data); $ii++)
{
   
    $ssss = array(
       $data[$ii-1]['behaviorName'],$data[$ii-1]['nagative'], $data[$ii-1]['positive']
        
    );

    $this->gcharts->DataTable('Behavior')->addRow($ssss);
}
   
}		
        $config = array(
            'title' => 'กราฟข้อมูลพฤติกรรม',

        );
	
        $this->gcharts->ColumnChart('Behavior')->setConfig($config);

		$html['graph'].=$this->gcharts->ColumnChart('Behavior')->outputInto('chartResult_div');

  		$html['graph'].=$this->gcharts->div(1000,500);
		
		echo $html['graph'];
		
	}

}?>
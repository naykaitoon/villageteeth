<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Report extends CI_Controller {
	
	function __construct(){ /// เป็นฟังชั่นที่จะทำงานก่อน index จะทำงานเมื่อมีการเรียกใช้คราส Login นี้
            parent::__construct();
			
    }
	
	
	
function statisticPolicingsReport(){
				$policyings = $this->Policings->getChratData();
				if($policyings){
				$allRowPolicings = $policyings['allRowPolicings'];
				
				$allRowChildrens = $policyings['allRowChildrens'];
				

				$rowNotPolicings = $allRowPolicings-$allRowChildrens;
				
				if($rowNotPolicings < 0){
					
					$rowNotPolicings = $rowNotPolicings * (-1);
				
				}
				$percenNotPolicings = ($rowNotPolicings*100)/$allRowChildrens;
				
				$percenPolicings = ($allRowPolicings*100)/$allRowChildrens;
				
				$data['NotPolicings'] = number_format($percenNotPolicings,1,'.',',');

				$data['Policings'] = number_format($percenPolicings,1,'.',',');
				
				$this->load->view('statistic/statisticPolicings',$data);
				}else{
					echo '<center> ไม่พบข้อมูล </center>';
				}
	
}




function statisticBehaviorReport(){
				
		
		
		$behavior = $this->Behavior->getBehavior();
		
		$sumAll['year'] =$this->Behavior->getByYear();
		$allAndType = $this->Behavior->getBehaviorReport();

		if($allAndType){

		for($i=0;$i<count($behavior);$i++){
			$data[$i]['nagative']=0;
			$data[$i]['positive']=0;
			$data[$i]['behaviorId']=$behavior[$i]['behaviorId'];
			$data[$i]['behaviorName']=$behavior[$i]['behaviorName'];
			$sumPositive=0;
			$sumNagative=0;
			$poll['nagative']=0;
			$poll['positive']=0;
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


		

		$sumAll['data']=$data;
		$sumAll['poll']=$poll;

		$this->load->view('statistic/statisticBehavior',$sumAll); 
		}else{
			echo '<center> ไม่พบข้อมูล </center>';
			
		}
	
}



function chartsPolicingsReport(){
        $this->gcharts->load('PieChart');
				$policyings = $this->Policings->getChratData();
				$allRowPolicings = $policyings['allRowPolicings'];
				
				$allRowChildrens = $policyings['allRowChildrens'];
				

				$rowNotPolicings = $allRowPolicings-$allRowChildrens;
				
				if($rowNotPolicings < 0){
					
					$rowNotPolicings = $rowNotPolicings * (-1);
				
				}
				$html['NotPolicings'] = ($rowNotPolicings*100)/$allRowChildrens;
				
				$html['Policings'] = ($allRowPolicings*100)/$allRowChildrens;
				
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
            'title' => 'สถิติการเข้ารับการตรวจสุขภาพ',
			'titleTextStyle' => $titleStyle,
			 'legend' => $legend,
			'colors' => array('#00CD00', '#FF4500'),
			'is3D' => TRUE
        );
	
        $this->gcharts->PieChart('Policings')->setConfig($config);

	
	 $html['graph']=$this->gcharts->PieChart('Policings')->outputInto('chartResult_div');

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
	
	
	
	
function chartsBehaviorReport($year=''){
	
	
	
	$this->Behavior->setPolicingDate($year);
		$behavior = $this->Behavior->getBehavior();
		
		$sumAll['year'] =$this->Behavior->getByYear();
		$sumAll['selectYear']='ทั้งหมด';
		$allAndType = $this->Behavior->getBehaviorReport();
		if($year){
			$sumAll['selectYear'] = ' ปี '.$year;
			$allAndType = $this->Behavior->getBehaviorReportYear();
			if(!$allAndType){
				echo 'ไม่พบข้อมูล';
				exit();
			}
		}
		

		for($i=0;$i<count($behavior);$i++){
			$data[$i]['nagative']=0;
			$data[$i]['positive']=0;
			$data[$i]['behaviorId']=$behavior[$i]['behaviorId'];
			$data[$i]['behaviorName']=$behavior[$i]['behaviorName'];
			$sumPositive=0;
			$sumNagative=0;
			$poll['nagative']=0;
			$poll['positive']=0;
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


for($i = 1; $i<=2; $i++)
        {
  $this->gcharts->DataTable('Behavior')->addColumn('number',$title[$i],$title[$i]);
		

 for($ii = 1; $ii<=count($data); $ii++)
{
   
    $dataadd = array(
       $data[$ii-1]['behaviorName'],$data[$ii-1]['nagative'], $data[$ii-1]['positive']
        
    );

    $this->gcharts->DataTable('Behavior')->addRow($dataadd);
}
   
}		
	$legend = new legend(array(
								'alignment' => 'start',
										  'fontSize' => 20
							));
         $titleStyle = $this->gcharts->textStyle()
                                    ->color('#2A2A2A')
                                    ->fontSize(35);
		  		$legendStyle = $this->gcharts->textStyle()
											->color('#3D3D3D')
											->fontName('Bold')
											->fontSize(18);
											
							$legend = new legend(array(
								'alignment' => 'start',
								'textStyle' => $legendStyle
							));
        $config = array(
            'title' => 'สถิติการเข้ารับการตรวจสุขภาพ'.$sumAll['selectYear'],
			'titleTextStyle' => $titleStyle,
			'legend' => $legend,
			'vAxis' => new vAxis(array(
        'baselineColor' => '#000',
        'format' => '## คน',

        'textStyle' => new textStyle(array(
            'color' => '#000',
            'fontName' => 'Verdana',
            'fontSize' => 18
        )))),
		'hAxis' => new hAxis(array(

      	 'textStyle' => new textStyle(array(
            'color' => '#000',
            'fontName' => 'Verdana',
            'fontSize' => 16
        ))
		))
        );
        $this->gcharts->ColumnChart('Behavior')->setConfig($config);

		$html['graph']=$this->gcharts->ColumnChart('Behavior')->outputInto('chartResult_div');

  		$html['graph'].=$this->gcharts->div(980,450);
		$html['year']=$year;
		$html['data']=$data;
		$html['poll']=$poll;
		$this->load->view('chart/BehaviorChart',$html); 
	
		
	}
	
	

function policingsBehaviorMagChartPrint($year=''){
	echo '<br>';
	$this->chartsBehaviorReport($year);
	echo '
	<script>
		window.print();
	
	</script>';
	}
	
/////////////////////////////////////////////////////////////////////////////////////////////////////////

function myStatisticPolicingsReport(){
				$policyings = $this->Policings->getMyChratData();

				$allRowPolicings = $policyings['allRowPolicings'];
				
				$allRowChildrens = $policyings['allRowChildrens'];
				

				$rowNotPolicings = $allRowPolicings-$allRowChildrens;
				
				if($rowNotPolicings < 0){
					
					$rowNotPolicings = $rowNotPolicings * (-1);
				
				}

					$percenNotPolicings = ($rowNotPolicings*100)/$allRowChildrens;

					$percenNotPolicings = 0;

				
		
					$percenPolicings = ($allRowPolicings*100)/$allRowChildrens;
	
					$percenPolicings =0;
	
				
				$data['NotPolicings'] = number_format($percenNotPolicings,1,'.',',');

				$data['Policings'] = number_format($percenPolicings,1,'.',',');
				
				$this->load->view('statistic/myStatisticPolicings',$data);
	
}




function myStatisticBehaviorReport(){
				
		
		
		$behavior = $this->Behavior->getBehavior();
		
		$sumAll['year'] =$this->Behavior->getMyByYear();
		$allAndType = $this->Behavior->getMyBehaviorReport();
		$poll['nagative']=0;
		$poll['positive']=0;

		for($i=0;$i<count($behavior);$i++){
			$data[$i]['nagative']=0;
			$data[$i]['positive']=0;
			$data[$i]['behaviorId']=$behavior[$i]['behaviorId'];
			$data[$i]['behaviorName']=$behavior[$i]['behaviorName'];
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


		

		$sumAll['data']=$data;
		$sumAll['poll']=$poll;

		$this->load->view('statistic/myStatisticBehavior',$sumAll); 
	
	
}



function myChartsPolicingsReport(){
       			 $this->gcharts->load('PieChart');
				$policyings = $this->Policings->getMyChratData();
				$allRowPolicings = $policyings['allRowPolicings'];
				
				$allRowChildrens = $policyings['allRowChildrens'];
				

				$rowNotPolicings = $allRowPolicings-$allRowChildrens;
				
				if($rowNotPolicings < 0){
					
					$rowNotPolicings = $rowNotPolicings * (-1);
				
				}
				if($allRowChildrens!=0){
				$html['NotPolicings'] = ($rowNotPolicings*100)/$allRowChildrens;
				
				$html['Policings'] = ($allRowPolicings*100)/$allRowChildrens;
				
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
            'title' => 'สถิติการเข้ารับการตรวจสุขภาพ',
			'titleTextStyle' => $titleStyle,
			 'legend' => $legend,
			'colors' => array('#00CD00', '#FF4500'),
			'is3D' => TRUE
        );
	
        $this->gcharts->PieChart('Policings')->setConfig($config);

	
    $html['graph']=$this->gcharts->PieChart('Policings')->outputInto('chartResult_div');


  	$html['graph'].=$this->gcharts->div(700,400);


	
	$this->load->view('chart/myPolicingChart',$html); 
			} else {
			
				echo '<center> ไม่พบข้อมูล </center>';
			}

    }
	
	
function myChartsPolicingsReportPrint(){
	echo '<br>';
	$this->myChartsPolicingsReport();
	echo '
	<script>
		window.print();
	
	</script>';
	}
	
	
	
	
function myChartsBehaviorReport($year=''){
	
	
	
		$this->Behavior->setPolicingDate($year);
		$behavior = $this->Behavior->getBehavior();
		
		$sumAll['year'] =$this->Behavior->getMyByYear();
		$sumAll['selectYear']='ทั้งหมด';
		$allAndType = $this->Behavior->getMyBehaviorReport();
		
		if($year){
			$sumAll['selectYear'] = ' ปี '.$year;
			$allAndType = $this->Behavior->getMyBehaviorReportYear();
			
			if(!$allAndType){
				echo 'ไม่พบข้อมูล';
				exit();
			}
		}
		
		if($allAndType){
		for($i=0;$i<count($behavior);$i++){
			$data[$i]['nagative']=0;
			$data[$i]['positive']=0;
			$data[$i]['behaviorId']=$behavior[$i]['behaviorId'];
			$data[$i]['behaviorName']=$behavior[$i]['behaviorName'];
			$sumPositive=0;
			$sumNagative=0;
			$poll['nagative']=0;
			$poll['positive']=0;
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


for($i = 1; $i<=2; $i++)
        {
  $this->gcharts->DataTable('Behavior')->addColumn('number',$title[$i],$title[$i]);
		

 for($ii = 1; $ii<=count($data); $ii++)
{
   
    $dataadd = array(
       $data[$ii-1]['behaviorName'],$data[$ii-1]['nagative'], $data[$ii-1]['positive']
        
    );

    $this->gcharts->DataTable('Behavior')->addRow($dataadd);
}
   
}		
	$legend = new legend(array(
								'alignment' => 'start',
										  'fontSize' => 20
							));
         $titleStyle = $this->gcharts->textStyle()
                                    ->color('#2A2A2A')
                                    ->fontSize(35);
		  		$legendStyle = $this->gcharts->textStyle()
											->color('#3D3D3D')
											->fontName('Bold')
											->fontSize(18);
											
							$legend = new legend(array(
								'alignment' => 'start',
								'textStyle' => $legendStyle
							));
        $config = array(
            'title' => 'สถิติการเข้ารับการตรวจสุขภาพ'.$sumAll['selectYear'],
			'titleTextStyle' => $titleStyle,
			'legend' => $legend,
			'vAxis' => new vAxis(array(
        'baselineColor' => '#000',
        'format' => '## คน',

        'textStyle' => new textStyle(array(
            'color' => '#000',
            'fontName' => 'Verdana',
            'fontSize' => 18
        )))),
		'hAxis' => new hAxis(array(

      	 'textStyle' => new textStyle(array(
            'color' => '#000',
            'fontName' => 'Verdana',
            'fontSize' => 16
        ))
		))
        );
        $this->gcharts->ColumnChart('Behavior')->setConfig($config);

		$html['graph']=$this->gcharts->ColumnChart('Behavior')->outputInto('chartResult_div');

  		$html['graph'].=$this->gcharts->div(980,450);
		$html['year']=$year;
		$html['data']=$data;
		$html['poll']=$poll;
		$this->load->view('chart/myBehaviorChart',$html); 
		}else{
			echo '<center> ไม่พบข้อมูล </center>';
			
		}
		
	}
	
	

function myPolicingsBehaviorMagChartPrint($year=''){
	echo '<br>';
	$this->myChartsBehaviorReport($year);
	echo '
	<script>
		window.print();
	
	</script>';
	}	
	

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function myPolicingsBehavior(){
		$data['behavior'] = $this->Behavior->getAlldataBehavior();
		$this->load->view('statistic/behavior',$data);
}
	
function myChartsPolicingsReportByBehaviorId($BehaviorId){
	
       			 $this->gcharts->load('PieChart');
				 
				$this->Policings->setBehaviorId($BehaviorId);
				$policyings = $this->Policings->getMyChratDataPk();
				$databehaviorName = $this->Policings->getBehaviorPKData();
				
				$name = $databehaviorName[0]['behaviorName'];
				
				$allRowPolicings = 0;
				$allRowChildrens = 0;
				for($i=0;$i<count($policyings);$i++){
					if($policyings[$i]['policingDetialValue']==0){
						$allRowPolicings=$allRowPolicings+1;	
					}
						$allRowChildrens=$allRowChildrens+1;
					
				}

				

				$rowNotPolicings = $allRowPolicings-$allRowChildrens;
				
				if($rowNotPolicings < 0){
					
					$rowNotPolicings = $rowNotPolicings * (-1);
				
				}
				if($allRowChildrens!=0){
				$html['NotPolicings'] = ($rowNotPolicings*100)/$allRowChildrens;
				
				$html['Policings'] = ($allRowPolicings*100)/$allRowChildrens;
				
				$Amount[1] = $allRowPolicings;//number_format($percenNotPolicings,1,'.',',');

				$Amount[2] =$rowNotPolicings;//number_format($percenPolicings,1,'.',',');
		
				
        $this->gcharts->DataTable('Policings')
                      ->addColumn('string', 'Policings', 'policings')
                      ->addColumn('number', 'Amount', 'amount');
		$title[1] ='มี/ทำ';
		$title[2] ='ไม่มี/ไม่ทำ';
		


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
            'title' => 'สถิติการตรวจสุขภาพพฤติกรรม '.$name,
			'titleTextStyle' => $titleStyle,
			 'legend' => $legend,
			'colors' => array('#00CD00', '#FF4500'),
			'is3D' => TRUE
        );
	
        $this->gcharts->PieChart('Policings')->setConfig($config);

	
	 $html['graph']=$this->gcharts->PieChart('Policings')->outputInto('chartResult_div');


  	$html['graph'].=$this->gcharts->div(700,400);

	$this->load->view('chart/myPolicingChart',$html); 
	echo '<center><br><br><input type="button" onClick="window.print();" value="พิมพ์"/></center>';
			} else {
			
				echo '<center> ไม่พบข้อมูล </center>';
			}

    }
	
function myPolicingsDistance(){
	$data['distance'] = $this->Distance->getDistanceAll();
	$this->load->view('statistic/distance',$data);
}
function myChartsPolicingsReportByDistanceId($DistanceId){
	
       			 $this->gcharts->load('PieChart');
				 
				$this->Policings->setDistanceId($DistanceId);
				$policyings = $this->Policings->getMyChratDataPkByDistance();
				$databehaviorName = $this->Policings->getDistancePKData();
				
				$name = $databehaviorName[0]['distanceMonth'].'เดือน';
				
				$allRowPolicings = 0;
				$allRowChildrens = 0;
				for($i=0;$i<count($policyings);$i++){
					if($policyings[$i]['policingDetialValue']==0){
						$allRowPolicings=$allRowPolicings+1;	
					}
						$allRowChildrens=$allRowChildrens+1;
					
				}

				

				$rowNotPolicings = $allRowPolicings-$allRowChildrens;
				
				if($rowNotPolicings < 0){
					
					$rowNotPolicings = $rowNotPolicings * (-1);
				
				}
				if($allRowChildrens!=0){
				$html['NotPolicings'] = ($rowNotPolicings*100)/$allRowChildrens;
				
				$html['Policings'] = ($allRowPolicings*100)/$allRowChildrens;
				
				$Amount[1] = $allRowPolicings;//number_format($percenNotPolicings,1,'.',',');

				$Amount[2] =$rowNotPolicings;//number_format($percenPolicings,1,'.',',');
		
				
        $this->gcharts->DataTable('Policings')
                      ->addColumn('string', 'Policings', 'policings')
                      ->addColumn('number', 'Amount', 'amount');
		$title[1] ='มี/ทำ';
		$title[2] ='ไม่มี/ไม่ทำ';
		


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
            'title' => 'สถิติการตรวจสุขภาพช่วงอายุ '.$name,
			'titleTextStyle' => $titleStyle,
			 'legend' => $legend,
			'colors' => array('#00CD00', '#FF4500'),
			'is3D' => TRUE
        );
	
        $this->gcharts->PieChart('Policings')->setConfig($config);

	
	$html['graph']=$this->gcharts->PieChart('Policings')->outputInto('chartResult_div');


  	$html['graph'].=$this->gcharts->div(700,400);

	$this->load->view('chart/myPolicingChart',$html); 
	echo '<center><br><br><input type="button" onClick="window.print();" value="พิมพ์"/></center>';
			} else {
			
				echo '<center> ไม่พบข้อมูล </center>';
			}

    }
	
	
function police($page=0){
	$dataLogin = $this->session->userdata('loginData');

	$data['childent'] = $this->Childents->getChildentInArea($page,$dataLogin['status'].'/police');
		for($i=0;$i<count($data['childent']);$i++){
			$childrenBirthday = strtotime($data['childent'][$i]['childrenBirthday']);
			$data['childent'][$i]['childrenAge'] =  $this->timespan($childrenBirthday);
		}
	$this->load->view('statistic/policingChildents',$data);
	
}
function policeSearch($page=0){
		$dataLogin = $this->session->userdata('loginData');

		$text = $this->input->post('key');
		$this->Childents->setTextSearch($text);
		$data['childent'] = $this->Childents->getChildentAllSearch($page,$dataLogin['status'].'/policeSearch');
		for($i=0;$i<count($data['childent']);$i++){
			$childrenBirthday = strtotime($data['childent'][$i]['childrenBirthday']);
			$data['childent'][$i]['childrenAge'] =  $this->timespan($childrenBirthday);
		}
		$this->load->view('statistic/searchResultPolicingChildents',$data);
}

function policing($childentId){
	$this->Policings->setChildrenId($childentId);
	$data['childent'] = $this->Policings->getPoliAllChil();
	$data['poli'] = $this->Policings->getPoliDetialAllChil();
	$data['teeth'] =  $this->Policings->brokentoothget();
	$this->load->view('statistic/policingChildentsDetial',$data);
//	var_dump($data);
	
}

########################## START function  timespan คำนวนวันเกิด ############################	
	function timespan($seconds = 1){	
	$time = time();
	if ( ! is_numeric($seconds)){
		$seconds = 1;
	}
	if ( ! is_numeric($time)){
		$time = time();
	}
	if ($time <= $seconds){
		$seconds = 1;
	}
	else{
		$seconds = $time - $seconds;
	}
	$str = '';
	$years = floor($seconds / 31536000);
	if ($years > 0){	
		$str .= $years.' ปี&nbsp;';
	}	
	$seconds -= $years * 31536000;
	$months = floor($seconds / 2628000);
 
	if ($years > 0 || $months > 0){
		if ($months >= 1){	
			$str .= $months.' เดือน, ';
		}	
		$seconds -= $months * 2628000;
	}
	return substr(trim($str), 0, -1);
}

##########################END function  timespan คำนวนวันเกิด ############################	

	

}?>
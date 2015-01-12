<?php
/**
 * log data for us progress
 *
 * PHP versions 4 and 5
 *
 * @category Scripts
 * @package  DashBoardItemManagement
 * @author   Charles Santucci <charles@santucci.fr>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * */

if (isset($_SESSION['current_release_id']))
{
  /************* BASELINES ***************************************/
	// update baselines
	$sqlUs2Update="SELECT us_id, us_release_id_fk,us_sprint_id_fk,business_value,complexity,status,us_number 
	                 FROM kados_user_stories  
					 WHERE active=1 AND us_sprint_id_fk IN(SELECT sprint_id FROM kados_sprints WHERE sprint_release_id_fk=".$_SESSION['current_release_id'].")";
	$sqlUs2UpdateSimple="SELECT us_id 
	                 FROM kados_user_stories  
					 WHERE active=1 AND us_sprint_id_fk IN(SELECT sprint_id FROM kados_sprints WHERE sprint_release_id_fk=".$_SESSION['current_release_id'].")";
					 
	$request->envoi($sqlUs2Update);
    $usList=$request->getArrayFields();
	
	// Get baselines
    $request->envoi("SELECT * 
	                 FROM kados_baselines ref 
	                 WHERE us_id_fk IN (".$sqlUs2UpdateSimple.") 
					   AND baseline_date=(SELECT MAX(baseline_date) 
					                      FROM kados_baselines 
										  WHERE us_id_fk=ref.us_id_fk) 
					 GROUP BY us_id_fk");	
	$request->getArrayFields();
	$usBaselines=array();
	
	$finalStatusTag=getFinalStatus($_SESSION['current_project_id'],$pathBase);

	for ($i=0;$i<$request->nb_elt;$i++)
	{
	  $usBaselines[$request->array[$i]['us_id_fk']]=$request->array[$i];
	}
	

	// Update baselines (if same date and change), or create if new date and change, else do nothing
	for ($i=0;$i<count($usList);$i++)
	{
	  // If baseline exists
	  if (isset($usBaselines[$usList[$i]['us_id']]))
	  {
	    $baseline=$usBaselines[$usList[$i]['us_id']];
		if ($baseline['us_release_id_fk']!=$usList[$i]['us_release_id_fk'] ||
		    $baseline['us_sprint_id_fk']!=$usList[$i]['us_sprint_id_fk'] ||
			$baseline['us_status']!=getUsDetailedStatus($usList[$i]['us_id'],$usList[$i]['status'],$finalStatusTag) || 
			$baseline['us_business_value']!=$usList[$i]['business_value'] ||
			$baseline['us_complexity']!=$usList[$i]['complexity'] )
		{	
		  if ($baseline['baseline_date']==aujourdhui())
		  {
     	    // update baseline
	     	$request->envoi("UPDATE kados_baselines SET
		                            us_release_id_fk=".$usList[$i]['us_release_id_fk'].", 
		                            us_sprint_id_fk=".$usList[$i]['us_sprint_id_fk'].", 
		                            us_business_value=".$usList[$i]['business_value'].", 
		                            us_complexity=".$usList[$i]['complexity'].", 
		                            us_status='".getUsDetailedStatus($usList[$i]['us_id'],$usList[$i]['status'],$finalStatusTag)."' 
		                     WHERE baseline_date='".aujourdhui()."' AND us_id_fk=".$usList[$i]['us_id']);
                $mcnx->num->kados_baselines->update(array('baseline_date'=>aujourdhui(),'us_id_fk'=>$usList[$i]['us_id']),array('$set'=>array('us_release_id_fk'=>$usList[$i]['us_release_id_fk'],'us_sprint_id_fk'=>$usList[$i]['us_sprint_id_fk'],'us_business_value'=>$usList[$i]['business_value'],'us_complexity'=>$usList[$i]['complexity'],'us_status'=>getUsDetailedStatus($usList[$i]['us_id'],$usList[$i]['status'],$finalStatusTag))),array('multiple' => true));
		  }
		  else
		  {
     	    // create baseline
	     	$request->envoi("INSERT INTO kados_baselines 
		                 (baseline_date, 
		                 us_id_fk, 
		                 us_release_id_fk, 
		                 us_sprint_id_fk, 
		                 us_business_value, 
		                 us_complexity, 
		                 us_status,
						 us_number) 
		                 VALUES (
						 '".aujourdhui()."',
						 ".$usList[$i]['us_id'].",
						 ".$usList[$i]['us_release_id_fk'].",
						 ".$usList[$i]['us_sprint_id_fk'].",
						 ".$usList[$i]['business_value'].",
						 ".$usList[$i]['complexity'].",
						 '".getUsDetailedStatus($usList[$i]['us_id'],$usList[$i]['status'],$finalStatusTag)."',
						 ".$usList[$i]['us_number'].")");
                $mcnx->num->kados_baselines->insert(array("baseline_date"=>aujourdhui(),"us_id_fk"=>$usList[$i]['us_id'],"us_release_id_fk"=>$usList[$i]['us_release_id_fk'],"us_sprint_id_fk"=>$usList[$i]['us_sprint_id_fk'],"us_business_value"=>$usList[$i]['business_value'],"us_complexity"=>$usList[$i]['complexity'],'us_status'=>getUsDetailedStatus($usList[$i]['us_id'],$usList[$i]['status'],$finalStatusTag),"us_number"=>$usList[$i]['us_number']));
		  }
		}  
	  }
	  else
	  {
	    // create baseline
		$request->envoi("INSERT INTO kados_baselines 
		                 (baseline_date, 
		                 us_id_fk, 
		                 us_release_id_fk, 
		                 us_sprint_id_fk, 
		                 us_business_value, 
		                 us_complexity, 
		                 us_status,
						 us_number) 
		                 VALUES (
						 '".aujourdhui()."',
						 ".$usList[$i]['us_id'].",
						 ".$usList[$i]['us_release_id_fk'].",
						 ".$usList[$i]['us_sprint_id_fk'].",
						 ".$usList[$i]['business_value'].",
						 ".$usList[$i]['complexity'].",
						 '".getUsDetailedStatus($usList[$i]['us_id'],$usList[$i]['status'],$finalStatusTag)."',
						 ".$usList[$i]['us_number'].")");
                $mcnx->num->kados_baselines->insert(array("baseline_date"=>aujourdhui(),"us_id_fk"=>$usList[$i]['us_id'],"us_release_id_fk"=>$usList[$i]['us_release_id_fk'],"us_sprint_id_fk"=>$usList[$i]['us_sprint_id_fk'],"us_business_value"=>$usList[$i]['business_value'],"us_complexity"=>$usList[$i]['complexity'],'us_status'=>getUsDetailedStatus($usList[$i]['us_id'],$usList[$i]['status'],$finalStatusTag),"us_number"=>$usList[$i]['us_number']));
	  }
	}
}
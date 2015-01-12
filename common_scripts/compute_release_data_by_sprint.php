<?php
/**
 * Page to allocate a business value to US
 *
 * PHP versions 4 and 5
 *
 * @category Scripts
 * @package  ProjectManagement:US
 * @author   Charles Santucci <charles@santucci.fr>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * */  
 
  // Get list of US
  $request->envoi("SELECT bl.us_id_fk,text,color,bl.us_number,active,bl.us_release_id_fk,bl.us_sprint_id_fk       
                   FROM kados_sprints,kados_baselines bl 
		        LEFT JOIN kados_user_stories tb_us ON us_id_fk=us_id 
		   WHERE bl.us_release_id_fk=".$_SESSION['current_release_id']."
		     AND kados_sprints.sprint_id=bl.us_sprint_id_fk 
		   GROUP BY bl.us_id_fk
		   ORDER BY sprint_start_date,baseline_date");	
  $usList=$request->getArrayFields();	
	  
  // Get data on US					   
  $request->envoi("SELECT baseline_date, us_id_fk, bl.us_release_id_fk,bl.us_number, bl.us_sprint_id_fk,text,  
                          bl.us_business_value, bl.us_complexity, bl.us_status, color, active 
                   FROM kados_baselines bl LEFT JOIN kados_sprints ON us_sprint_id_fk=sprint_id 
                        LEFT JOIN kados_user_stories tb_us ON us_id_fk=us_id
		   WHERE bl.us_release_id_fk=".$_SESSION['current_release_id']." 
		   ORDER BY sprint_start_date,baseline_date");
  $request->getArrayFields();					   
  $usData=array();
  
  for ($i=0;$i<$request->nb_elt;$i++)
  {
    $usData[$request->array[$i]['us_id_fk']][$request->array[$i]['us_sprint_id_fk']][]=$request->array[$i];
  }

  // Get sprints data
  $request->envoi("SELECT * FROM kados_sprints WHERE sprint_release_id_fk=".$_SESSION['current_release_id'].' ORDER BY sprint_start_date');
  $sprintsList=$request->getArrayFields();

  // Get complexity and business value
  $usListExpected=array();
  for ($k=0;$k<count($sprintsList);$k++)
  {
    $complexityBySprint[$sprintsList[$k]['sprint_id']]=0;
    $businessValueBySprint[$sprintsList[$k]['sprint_id']]=0;
    $usCountBySprint[$sprintsList[$k]['sprint_id']]=0;    

    $complexityDeliveredbySprint[$sprintsList[$k]['sprint_id']]=0;
    $businessValueDeliveredBySprint[$sprintsList[$k]['sprint_id']]=0;
    $usDeliveredBySprint[$sprintsList[$k]['sprint_id']]=0;
    $usReadyToCheck[$sprintsList[$k]['sprint_id']]=0;
    
  }
  for ($i=0;$i<count($usList);$i++)
  {
    for ($k=0;$k<count($sprintsList);$k++)
    {
      if (isset($usData[$usList[$i]['us_id_fk']][$sprintsList[$k]['sprint_id']]))
      {
	$nbChange=count($usData[$usList[$i]['us_id_fk']][$sprintsList[$k]['sprint_id']])-1;
	$log=$usData[$usList[$i]['us_id_fk']][$sprintsList[$k]['sprint_id']][$nbChange];	
        $complexityBySprint[$sprintsList[$k]['sprint_id']]+= $log['us_complexity'];
        $businessValueBySprint[$sprintsList[$k]['sprint_id']]+= $log['us_business_value'];
        if (!in_array($usList[$i]['us_id_fk'],$usListExpected))
        {
          $usCountBySprint[$sprintsList[$k]['sprint_id']]++;    
          $usListExpected[]=$usList[$i]['us_id_fk'];
        }  
        
        $isUsActiveAndInRelease= $log['active']==1 && $log['us_sprint_id_fk']==$sprintsList[$k]['sprint_id'];    
        
	$complexityDeliveredbySprint[$sprintsList[$k]['sprint_id']]+=  ($log['us_status']=='DONE' && $isUsActiveAndInRelease) ? $log['us_complexity'] : 0;
	$businessValueDeliveredBySprint[$sprintsList[$k]['sprint_id']]+= ($log['us_status']=='DONE' && $isUsActiveAndInRelease) ?  $log['us_business_value'] :0;
	$usDeliveredBySprint[$sprintsList[$k]['sprint_id']]+= ($log['us_status']=='DONE' && $isUsActiveAndInRelease) ?  1 :0;        
        $usReadyToCheck[$sprintsList[$k]['sprint_id']]+= ($log['us_status']=='DEV' && $isUsActiveAndInRelease) ?  1 :0;        
      }			   
    }	  
  }?>
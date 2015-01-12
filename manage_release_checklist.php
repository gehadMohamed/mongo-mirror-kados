<?php
/**
 * Main page to manage user stories of a project
 *
 * PHP versions 4 and 5
 *
 * @category Scripts
 * @package  DashBoardItemManagement:ObjectSettings
 * @author   Charles Santucci <charles@santucci.fr>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * */  
$pathBase='./';
$targetFile='manage_release_checklist.php?menu_lev2=checklist';
$displayTable=true;
	  
include $pathBase.'header.php';

if (isset($_SESSION['current_project_id']))
{
  /* special railway */
  $railway=new railway($pathImages.$imgRailway);

  // Get project data & count US in the project
  $projectData=new project($pathBase,$_SESSION['current_project_id']);
  $projectData->getData();
  
  $railway->add($projectData->name.=' ('.$projectData->getUsCount().' US)');  

  // If there is no current release, set current release as the running release, else set the last release as current  
  if (!isset($_SESSION['current_release_id']))
  {
     $_SESSION['current_release_id']=getRunningReleaseId($_SESSION['current_project_id'],$cnx->num);
	 if ($_SESSION['current_release_id']==0)
	 {
	   $_SESSION['current_release_id']=getLastReleaseId($_SESSION['current_project_id'],$cnx->num);
	   if ($_SESSION['current_release_id']==0)
	   {
	     unset($_SESSION['current_release_id']);
	   }
	 }
  }
 
  if (isset($_SESSION['current_release_id']))
  {
    // Get release data & count US in the release
    $request=new requete("SELECT * FROM kados_releases WHERE release_id=".$_SESSION['current_release_id'],$cnx->num);
    $releaseData=$request->getObject();
    $request->envoi("SELECT COUNT(*) AS nb_us FROM kados_user_stories WHERE us_release_id_fk=".$_SESSION['current_release_id']." AND active=1");
    $request->getObject();
    $releaseData->release_name.=' ('.$request->objet->nb_us.' US)';
    $railway->add($releaseData->release_name);  
  
    $railway->display();
  
    // Choice of release
    $railway2=new railway($pathImages.'app/hand-point.png');
    $request->envoi("SELECT * FROM kados_releases WHERE visibility=1 AND release_project_id_fk=".$_SESSION['current_project_id']." ORDER BY release_due_date");
    $resultsArray=$request->getArrayFields();
    for ($i=0;$i<$request->nb_elt;$i++)
    {	
	  $railway2->add($resultsArray[$i]['release_name'],$targetFile.'&release_id='.$resultsArray[$i]['release_id']);  
    }
    $railway2->display('railway_release');
    // end railway
  
    // Get mode
    $itemType='activities';

    $masterItemType=getMasterItemType($itemType);
    $simpleItemType=getSimpleItemType($itemType);
    /* set dashboard settings */
    include $pathBase.'dashboard_settings.php';
    $columnWidth=360;

    $arrayStatusX['TODO']=$columnWidth*0;
    $arrayStatusX['PROG']=$columnWidth*1;
    $arrayStatusX['DONE']=$columnWidth*2;
    $arrayStatus[]['colName']=$text_activity_status_todo;
    $arrayStatus[]['colName']=$text_activity_status_inprogress;
    $arrayStatus[]['colName']=$text_activity_status_done;  
  
    $initialStatus='TODO';
    $actionFinalStatusTag='DONE';  
  
  	$displayTopButtons=true;
	$allowAdd=in_array('ADD_ACTIVITY',$_SESSION['user_actions']) || in_array('ADD_ACTIVITY',$_SESSION['user_local_actions']);
    $targetAdd=$pathBase.'boards_buttons/add_activity.php?item_type='.$itemType;
    $buttonAdd=$button_add_activity;
    $buttonAddImage='app/new_activity.png';	
	
    $allowDelete=in_array('DEL_ACTIVITIES',$_SESSION['user_actions']) || in_array('DEL_ACTIVITIES',$_SESSION['user_local_actions']);
    $allowOrder=in_array('ORD_ACTIVITIES',$_SESSION['user_actions']) || in_array('ORD_ACTIVITIES',$_SESSION['user_local_actions']);
    $allowUpdate=in_array('UPD_ACTIVITIES',$_SESSION['user_actions']) || in_array('UPD_ACTIVITIES',$_SESSION['user_local_actions']);
    $allowMove=in_array('MOV_ACTIVITIES',$_SESSION['user_actions']) || in_array('MOV_ACTIVITIES',$_SESSION['user_local_actions']);
    $allowActionHeaderStamp=false;
	$functionForHeaderStamp='displayActivitySourceImage';
	$functionForDisableUpdate='isTemplateActivity';
	$functionForDisableDelete='isTemplateActivity';

	//    $buttonAdd=$button_add_issues;
    $buttonOrder=$button_reorder;
    $buttonOrderExtended=$button_reorder_flat;
    
    $MultipleItemsArray[0]=array('parent_id'=>0,'name'=>'','header_stamp'=>'','text'=>'','color'=>'');
    $firstColumnStatic=false;
	
    include $pathBase.'boards_settings/settings_'.$itemType.'.php';
    include $pathBase.'boards_actions/actions_items.php';
	include $pathBase.'boards_actions/actions_activities.php';
	// change delete picture (direct delete, no trash system)
    $deleteMode='del';
    include $pathBase.'matrix_display.php';
  }
  else
  {?>
    <div class="MessageBox WarningMessageBox"><?php echo $msg_no_release_selected;?></div><?php
  }  
}
else
{?>
  <div class="MessageBox WarningMessageBox"><?php echo $msg_no_project_selected;?></div><?php
}  


include $pathBase.'footer.php';?>
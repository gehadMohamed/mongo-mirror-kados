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
$pathBase='./';
$targetFile='project_issues_impact.php?menu_lev2=prj_issues_impact';
$displayTable=true;
	  
include $pathBase.'header.php';

if (isset($_SESSION['current_project_id']))
{
    
  $showOnlyProjectLevel=true;  
  include $pathBase.'railway_display.php';

  /* actions for the page */
  switch ($_REQUEST['action'])
  {
  }

  if ($displayTable)
  {
    $itemType='issues_impact';
	$masterItemType=getMasterItemType($itemType);
    $simpleItemType=getSimpleItemType($itemType);

	/* set dashboard settings */
    include $pathBase.'dashboard_settings.php';
  
    $arrayStatusX[0]=$columnWidth*0;
	$arrayStatusX[1]=$columnWidth*1;
	$arrayStatusX[2]=$columnWidth*2;
	$arrayStatusX[3]=$columnWidth*3;
	
    $arrayStatus[0]['colName']=$text_impact_2eval;
	$arrayStatus[1]['colName']=$text_impact_low;
	$arrayStatus[2]['colName']=$text_impact_medium;
	$arrayStatus[3]['colName']=$text_impact_high;

    $arrayStatus[0]['colMeaning']=$text_impact_meaning_2eval;
	$arrayStatus[1]['colMeaning']=$text_impact_meaning_low;
	$arrayStatus[2]['colMeaning']=$text_impact_meaning_medium;
	$arrayStatus[3]['colMeaning']=$text_impact_meaning_high;

    $displayTopButtons=true;
    $allowAdd=false;
    $targetAdd='';
    $buttonAdd='';
    $buttonAddImage='';
	
    $allowDelete=in_array('DEL_ISSUES',$_SESSION['user_actions']) || in_array('DEL_ISSUES',$_SESSION['user_local_actions']);
    $allowOrder=in_array('ORD_ISSUES',$_SESSION['user_actions']) || in_array('ORD_ISSUES',$_SESSION['user_local_actions']);
    $allowUpdate=in_array('UPD_ISSUES',$_SESSION['user_actions']) || in_array('UPD_ISSUES',$_SESSION['user_local_actions']);
    $allowMove=in_array('SET_IMPACT',$_SESSION['user_actions']) || in_array('SET_IMPACT',$_SESSION['user_local_actions']);
    $allowActionHeaderStamp=true;
	
//    $buttonAdd=$button_add_issues;
    $buttonOrder=$button_reorder;
    $buttonOrderExtended=$button_reorder_flat;
    
    $otherFieldsInsert=',issue_project_id_fk';
    $otherFieldsInsertValues=','.$_SESSION['current_project_id'];
    
    $MultipleItemsArray[0]=array('parent_id'=>0,'name'=>'','header_stamp'=>'','text'=>'','color'=>'');
    $firstColumnStatic=false;
    $functionForHeaderStamp='displayIssueStatusImageButton';
	$functionForBottomLeft='displayImpactImage';
	$functionForBottomRight='displayProbability';
	
    include $pathBase.'boards_settings/settings_'.$itemType.'.php';
    include $pathBase.'boards_actions/actions_items.php';
	include $pathBase.'boards_actions/actions_issues.php';?>
    <div class="hidden-updateStatusField">postit_footer-left</div><?php
	$displayIssueFilter=true;
	if (in_array('ADD_ISSUES',$_SESSION['user_actions']) || in_array('ADD_ISSUES',$_SESSION['user_local_actions']))
	{
      displayButton($button_add_risk,$pathImages.'app/new_risk.png',$pathBase.'boards_buttons/add_issue.php?topic=risk&item_type=issues_impact','addButtonGeneric');
      displayButton($button_add_problem,$pathImages.'app/new_problem.png',$pathBase.'boards_buttons/add_issue.php?topic=problem&item_type=issues_impact','addButtonGeneric');	
	}  
	$updateParameter='topic';
    include $pathBase.'matrix_display.php';
  }
}
else
{?>
  <div class="MessageBox WarningMessageBox"><?php echo $msg_no_project_selected;?></div><?php
}  


include $pathBase.'footer.php';?>
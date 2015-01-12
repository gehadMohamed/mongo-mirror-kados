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
$targetFile='project_us_review.php?menu_lev2=us_review';
$displayTable=true;
	  
include $pathBase.'header.php';

if (isset($_SESSION['current_project_id']))
{
  /* actions for the page */
  switch ($_REQUEST['action'])
  {
  }

  if ($displayTable)
  {
    $itemType='us_review';
	$masterItemType=getMasterItemType($itemType);
    $simpleItemType=getSimpleItemType($itemType);

    /* set dashboard settings */
    include $pathBase.'dashboard_settings.php';
    // Width of a column in a dashboard
    $columnWidth=200;
  
	$dashboardProjectValues=explode(";",getProjectSetting('US_BVL',$_SESSION['current_project_id'],$cnx->num));
	for ($count=0;$count<count($dashboardProjectValues);$count++)
	{
      $arrayStatusX[$dashboardProjectValues[$count]]=$columnWidth*$count;
      $arrayStatus[$count]['colName']=$dashboardProjectValues[$count];
    }     
    $displayTopButtons=true;
    $allowAdd=false;
    $targetAdd='';
    $buttonAdd='';
    $buttonAddImage='';
	
    $allowDelete=in_array('DEL_US',$_SESSION['user_actions']) || in_array('DEL_US',$_SESSION['user_local_actions']);
    $allowOrder=in_array('ORD_US',$_SESSION['user_actions']) || in_array('ORD_US',$_SESSION['user_local_actions']);
    $allowUpdate=in_array('UPD_US',$_SESSION['user_actions']) || in_array('UPD_US',$_SESSION['user_local_actions']);
    $allowMove=in_array('SET_BV',$_SESSION['user_actions']) || in_array('SET_BV',$_SESSION['user_local_actions']);
    $allowActionHeaderStamp=false;
	
    $buttonOrder=$button_reorder;
    $buttonOrderExtended=$button_reorder_flat;
    
    $otherFieldsInsertUS=',us_project_id_fk';
    $otherFieldsInsertValuesUS=','.$_SESSION['current_project_id'];
    
    $MultipleItemsArray[0]=array('parent_id'=>0,'name'=>'','header_stamp'=>'','text'=>'','color'=>'');
    $firstColumnStatic=false;
    $functionForHeaderStamp='displayStatusImageButton';
		
    include $pathBase.'boards_settings/settings_'.$itemType.'.php';
    include $pathBase.'boards_actions/actions_items.php';
	include $pathBase.'boards_actions/actions_us.php';
    include $pathBase.'railway_display.php';?>
    <div class="hidden-updateStatusField">postit_footer-left</div><?php
	$displayUsFilter=true;
    include $pathBase.'matrix_display.php';
  }
}
else
{?>
  <div class="MessageBox WarningMessageBox"><?php echo $msg_no_project_selected;?></div><?php
}  


include $pathBase.'footer.php';?>
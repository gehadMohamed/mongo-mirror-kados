<?php
/**
 * Page to manage poker planning : allocate compelxity to US
 *
 * PHP versions 4 and 5
 *
 * @category Scripts
 * @package  ProjectManagement:ObjectSettings
 * @author   Charles Santucci <charles@santucci.fr>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * */  
$pathBase='./';
$targetFile='project_poker_planning.php?menu_lev2=poker_plan';
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
    $itemType='us_poker';
	$masterItemType=getMasterItemType($itemType);
    $simpleItemType=getSimpleItemType($itemType);

    /* set dashboard settings */
    include $pathBase.'dashboard_settings.php';
    // Width of a column in a dashboard
    $columnWidth=$itemWidth+25;
	
   	$dashboardProjectValues=explode(";",getProjectSetting('PP_VAL',$_SESSION['current_project_id'],$cnx->num));
	for ($count=0;$count<count($dashboardProjectValues);$count++)
	{
      $arrayStatusX[$dashboardProjectValues[$count]]=$columnWidth*$count;
      $arrayStatus[$count]['colName']=$dashboardProjectValues[$count];
    }     

    $displayTopButtons=false;
    $allowAdd=false;
    $targetAdd='';
    $buttonAdd='';
    $buttonAddImage='';
	
    $allowDelete=false;
    $allowOrder=in_array('ORD_US',$_SESSION['user_actions']) || in_array('ORD_US',$_SESSION['user_local_actions']);
    $allowUpdate=false;
    $allowMove=in_array('SET_COMPLEXITY',$_SESSION['user_actions']) || in_array('SET_COMPLEXITY',$_SESSION['user_local_actions']);
    $allowActionHeaderStamp=false;
    
    $buttonAdd=$button_add_user_story;
    $buttonOrder=$button_reorder;
    $buttonOrderExtended=$button_reorder_flat;

    $firstColumnStatic=true;
	$firstColumnTitle=$text_business_value;
	$displayPriorityButton=true;
	$functionForHeaderStamp='displayStatusImageButton';
	
    include $pathBase.'boards_settings/settings_'.$itemType.'.php';
    include $pathBase.'boards_actions/actions_items.php';
    include $pathBase.'railway_display.php';?>
    <div class="hidden-updateStatusField">postit_footer-right</div><?php
	
	// Get business value
	$MultipleItemsArray=array();
    $request=new requete("SELECT business_value AS parent_id,business_value AS text,'' AS header_stamp,'' AS color,'' AS infoBottomLeft,'' AS infoBottomRight,
                                 COUNT(us_id) AS nb_us
                        FROM kados_user_stories WHERE active=1 ".$clauseWhereElementsGetAll." AND business_value!=0 
						GROUP BY business_value HAVING nb_us>0 ORDER BY business_value DESC",$cnx->num);
    $MultipleItemsArray=$request->getArrayFields();		
	$displayUsFilter=true;
	$firstColumnObjectType='info';
	$forceDisplayDashBoardTitles=true;
    include $pathBase.'matrix_display.php';
  }
}
else
{?>
  <div class="MessageBox WarningMessageBox"><?php echo $msg_no_project_selected;?></div><?php
}  


include $pathBase.'footer.php';?>
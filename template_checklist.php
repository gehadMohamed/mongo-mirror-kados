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
$targetFile='manage_kanban.php?menu_lev2=prj_kanban';
	  
include $pathBase.'header.php';
$currentProject=new project($pathBase,0);
 
// Get mode
$itemType='checklist';

$masterItemType=getMasterItemType($itemType);
$simpleItemType=getSimpleItemType($itemType);
/* set dashboard settings */
include $pathBase.'dashboard_settings.php';

$arrayStatusX[0]=$columnWidth*0;
$arrayStatus[0]['colName']='Checklist Activities';

$visibleSprintsArray[0]=0;

$columnWidth=getParameter('WSSIZE',$cnx->num);
  
$visibleSprints=implode(',',$visibleSprintsArray);

$displayTopButtons=true;
$allowAdd=in_array('ADD_US_REL',$_SESSION['user_actions']) || in_array('ADD_US_REL',$_SESSION['user_local_actions']);
$targetAdd=$pathBase.'boards_buttons/add_activity.php?item_type='.$itemType;
$buttonAdd=$button_add_activity;
$buttonAddImage='app/new_activity.png';

$allowDelete=true;
$allowOrder=true;
$allowUpdate=true;
$allowMove=true;
$allowActionHeaderStamp=$allowUpdate;

$displayPriorityButton=false;
$displayWorkshopSwitch=false;
$buttonOrder=$button_reorder;
$buttonOrderExtended=$button_reorder_flat;

$otherFieldsInsert='';
$otherFieldsInsertValues='';

$MultipleItemsArray[0]=array('parent_id'=>0,'name'=>'','header_stamp'=>'','text'=>'','color'=>'');
$firstColumnStatic=false;
$functionForHeaderStamp='displayStatusImageButton';
	
include $pathBase.'boards_settings/settings_'.$itemType.'.php';
include $pathBase.'boards_actions/actions_items.php';
include $pathBase.'boards_actions/actions_activities.php';

$displayUsFilter=false;
// chnage delete picture (direct delete, no trash system)
$deleteMode='del';
include $pathBase.'matrix_display.php';

include $pathBase.'footer.php';?>
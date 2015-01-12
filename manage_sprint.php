<?php
/**
 * Main page to manage tasks in a dashboard
 *
 * PHP versions 4 and 5
 *
 * @category Scripts
 * @package  DashBoardItemManagement:ObjectSettings
 * @author   Charles Santucci <charles@santucci.fr>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * */  

if (!isset($_REQUEST['object_id']))
{
  $_REQUEST['object_id']=0;
}

$itemType='tasks_sprint';
$masterItemType=getMasterItemType($itemType);
$simpleItemType=getSimpleItemType($itemType);

/* Dashboard settings */
include $pathBase.'dashboard_settings.php';

// Select list of columns					 
$request->envoi("SELECT column_tag,column_name,column_usage,column_meaning 
	             FROM kados_template_columns,kados_projects_columns
				 WHERE column_tag=column_tag_fk AND project_id_fk=".$_SESSION['current_project_id']."
				 ORDER BY column_order");				   
$request->getArrayFields();	
// Allocate columns
for ($i=0;$i<$request->nb_elt;$i++)
{	 
  $arrayStatusX[$request->array[$i]['column_tag']]=$columnWidth*$i;
  $arrayStatus[$i]['colName']=$request->array[$i]['column_name'];  
  $arrayStatus[$i]['colMeaning']=$request->array[$i]['column_usage'];  
  if ($request->array[$i]['column_meaning']!='')
  {
    $arrayStatus[$i]['colMeaning']=$request->array[$i]['column_meaning'];  
  }	
  
}
/* Buttons settings */
$displayTopButtons=false;
$allowAdd=in_array('ADDTASK',$_SESSION['user_actions']) || in_array('ADDTASK',$_SESSION['user_local_actions']);
$buttonAdd=$button_add_task;
$buttonAddImage='app/new_task.png';

$allowDelete=in_array('DELTASK',$_SESSION['user_actions']) || in_array('DELTASK',$_SESSION['user_local_actions']);
$allowOrder=in_array('ORDTASK',$_SESSION['user_actions']) || in_array('ORDTASK',$_SESSION['user_local_actions']);
$allowUpdate=in_array('UPDTASK',$_SESSION['user_actions']) || in_array('UPDTASK',$_SESSION['user_local_actions']);
$allowMove=in_array('MOVE_TASK',$_SESSION['user_actions']) || in_array('MOVE_TASK',$_SESSION['user_local_actions']);

$allowActionHeaderStamp=true;

$buttonOrder=$button_reorder;
$buttonOrderExtended=$button_reorder_flat;

$otherFieldsInsert=',us_id_fk';
$otherFieldsInsertValues=','.$_REQUEST['object_id'];

$firstColumnStatic=true;
$firstColumnDisplayParentZone=true;
$firstColumnDisplayWarningZone=true;
$firstColumnTitle=$text_sprint_backlog;
$firstColumnObjectTag='US';
$firstColumnFunctionForHeaderStamp='displayStatusImageButton';
$functionForHeaderStamp='displayTaskInitLoad';

$initialStatus=getInitialStatus($_SESSION['current_project_id'],$pathBase);
$finalStatus=getFinalStatus($_SESSION['current_project_id'],$pathBase);
include $pathBase.'boards_settings/settings_'.$itemType.'.php';
include $pathBase.'boards_actions/actions_items.php';
include $pathBase.'boards_actions/actions_tasks.php';
include $pathBase.'railway_display.php';

// // Display the deck
$usFieldForOrderMatrix='ypos_s';
require_once $pathBase.'deck_management.php';

// get project stakeholders
$stakeholdersProjects=$currentProject->getStakeholdersAllowedToMoveTasksUsernames();
$projectUsers=$currentProject->getStakeholders();

// If there are at least one user story
if (count($MultipleItemsArray)!=0)
{
  $displayParentZone=false;
  $displayUsFilter=true;
  $displayTaskFilter=true;
  $displayNoUser=true;
  $displayMyTasks=true;
  $forceDisplayDashBoardTitles=true;
  // Display order buttons => order all tasks for all US
  displayButton($buttonOrder,$pathImages.'app/compact.png',$targetFileAction.'&action=order_all_tasks_compact&tasks2order='.implode('_',array_column($MultipleItemsArray,'parent_id')));	
  displayButton($buttonOrderExtended,$pathImages.'app/extended.png',$targetFileAction.'&action=order_all_tasks_extended&tasks2order='.implode('_',array_column($MultipleItemsArray,'parent_id')));	
//  displayButton($button_reorder_number,$pathImages.'app/order.png',$targetFileAction.'&action=order_all_tasks_by_number&tasks2order='.implode('_',array_column($MultipleItemsArray,'parent_id')));	
  
  include $pathBase.'matrix_display.php';
}
else
{
  // else, display an empty sprint backlog
  include $pathBase.'boards_settings/settings_'.$itemType.'.php';
  unset($arrayStatusX);
  unset($arrayStatus);
  $arrayStatusX['INIT']=$columnWidth*0;
  $arrayStatus[]['colName']='Sprint Backlog';
  $dashboardHeight=$usBlockMinHeight;
  $displayDashBoardTitles=true;
  $dashboardWidth=($columnWidth)*count($arrayStatus)+1;
  $clauseWhereElementsGetAllStd=$clauseWhereElementsGetAll;
  $displayParentZone=false;
  include $pathBase.'dashboard_display.php';
}?>
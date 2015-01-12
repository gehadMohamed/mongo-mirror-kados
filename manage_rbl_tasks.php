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

$itemType='rbl_tasks';
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

$colsMaxNumber=1;
if ($currentProject->level==2)
{
  $colsMaxNumber=$request->nb_elt;
}

$arrayStatus=array();
$arrayStatusX=array();

// Allocate columns
for ($i=0;$i<$colsMaxNumber;$i++)
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
// if no column, tasks can not be created, disable task creation
if ($colsMaxNumber==0)
{
  $allowAdd=false;
}
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

$otherFieldsInsertUS=',us_release_id_fk,us_project_id_fk';
$otherFieldsInsertValuesUS=','.$_SESSION['current_release_id'].','.$_SESSION['current_project_id'];

$firstColumnStatic=true;
$firstColumnDisplayParentZone=true;
$firstColumnDisplayWarningZone=true;
$firstColumnTitle='Release Backlog';
$firstColumnObjectTag='US';
$firstColumnFunctionForHeaderStamp='displayStatusImageButton';
$functionForHeaderStamp='displayTaskInitLoad';

$initialStatus=getInitialStatus($_SESSION['current_project_id'],$pathBase);
$finalStatus=getFinalStatus($_SESSION['current_project_id'],$pathBase);

include $pathBase.'boards_settings/settings_'.$itemType.'.php';
include $pathBase.'boards_actions/actions_items.php';
include $pathBase.'boards_actions/actions_tasks.php';
include $pathBase.'railway_display.php';

// if no column, tasks can not be created, display a message
if ($colsMaxNumber==0)
{ 
  if (in_array('ADDTASK',$_SESSION['user_actions']) || in_array('ADDTASK',$_SESSION['user_local_actions']))
  {?>
    <div class="MessageBox WarningMessageBox"><?php echo $msg_steps_to_add_tasks_design_columns_and_settings_access;?> <a href="project_columns.php?menu_lev1=settings&menu_lev2=prj_columns" ><?php echo $text_click_here;?></a></div><?php
  }
  else
  {?>
    <div class="MessageBox WarningMessageBox"><?php echo $msg_steps_to_add_tasks_design_columns_and_settings_no_access;?></div><?php		  
  }		  
}

$deckIsAvailable=false;
if ($currentProject->level==2)
{
  // Get Deck actions
  $deckIsAvailable=true;
  $displayMyTasks=true;  
  $usFieldForOrderMatrix='ypos_r';  
  require_once $pathBase.'deck_management.php';
}  
else
{
  $clauseWhereUsFilter='';
  if (isset($_SESSION['filter_us']))
  {
    $clauseWhereUsFilter=" AND kados_user_stories.color='".$_SESSION['filter_us']."'";
  }

  // Get colors of the displayed US
  $exclusiveUsColorsListRequest="SELECT color
                        FROM kados_user_stories 
						WHERE active=1 AND us_release_id_fk=".$_SESSION['current_release_id']." 
						  AND us_sprint_id_fk=0 
						GROUP BY color ";
						
  // Protection against : if UScolor selected is not in the board (when drilling-down or up)
  if (isset($_SESSION['filter_us']))
  {
    $request->envoi($exclusiveUsColorsListRequest);						
    $request->recup_array_mono();
    if (!in_array($_SESSION['filter_us'],$request->array))
    {
      unset($_SESSION['filter_us']);
      $clauseWhereUsFilter='';
    }	 
  } 
 
   // Set filter on colors for tasks items : colors of displayed tasks postits
   $exclusiveTaskColorsListRequest="SELECT kados_tasks.color 
                        FROM kados_tasks,kados_user_stories 
						WHERE kados_tasks.active=1 AND us_id_fk=us_id						  
						  AND us_release_id_fk=".$_SESSION['current_release_id']." 
						  AND us_sprint_id_fk=0 
						GROUP BY kados_tasks.color ";


  // Get US of the sprint
  $request=new requete("SELECT us_id AS parent_id,us_number AS display_number,text,status AS header_stamp,color,business_value AS infoBottomLeft,complexity AS infoBottomRight 
                      FROM kados_user_stories 
					  WHERE active=1 AND us_release_id_fk=".$_SESSION['current_release_id']." 
					    AND us_sprint_id_fk=0 
					     ".$clauseWhereUsFilter." 
					  ORDER BY ypos_s ASC",$cnx->num);
  $MultipleItemsArray=$request->getArrayFields();
}

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
  $forceDisplayDashBoardTitles=true;  
  include $pathBase.'matrix_display.php';
}
else
{
  // else, display an empty sprint backlog
  include $pathBase.'boards_settings/settings_'.$itemType.'.php';
  unset($arrayStatusX);
  unset($arrayStatus);
  $arrayStatusX['INIT']=$columnWidth*0;
  $arrayStatus[]['colName']='Release Backlog';
  $dashboardHeight=$usBlockMinHeight;
  $displayDashBoardTitles=true;
  $dashboardWidth=($columnWidth)*count($arrayStatus)+1;
  $clauseWhereElementsGetAllStd=$clauseWhereElementsGetAll;
  include $pathBase.'dashboard_display.php';
}?>
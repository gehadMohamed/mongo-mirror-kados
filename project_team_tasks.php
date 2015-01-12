<?php
/**
 * Main page to manage tasks in a dashboard for stakeholders 
 *
 * PHP versions 4 and 5
 *
 * @category Scripts
 * @package  DashBoardItemManagement:ObjectSettings
 * @author   Charles Santucci <charles@santucci.fr>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * */  

$pathBase='./';
$targetFile='project_team_tasks.php?menu_lev2=team_tasks';
	  
include $pathBase.'header.php';

if (isset($_SESSION['current_project_id']))
{
 
  if (!isset($_REQUEST['object_id']))
  {
    $_REQUEST['object_id']=0;
  }

  $itemType='tasks_stakeholders';
  $masterItemType=getMasterItemType($itemType);
  $simpleItemType=getSimpleItemType($itemType);

  /* Dashboard settings */
  include $pathBase.'dashboard_settings.php';

// Select list of columns					 
$request->envoi("(SELECT user_login,CONCAT(user_firstname,' ',user_name) AS stakeholder
	             FROM framework_users,kados_projects_users prju,framework_profiles_constitution_actions prf 
				 WHERE user_login=user_login_fk AND prju.profile_id_fk=prf.profile_id_fk 
				   AND project_id_fk=".$_SESSION['current_project_id']."
				   AND action_tag_fk='MOVE_TASK'
				 ORDER BY user_name)
				 UNION
				 (SELECT user_login,CONCAT(user_firstname,' ',user_name) AS stakeholder 
				  FROM framework_users,kados_tasks,kados_user_stories
                  WHERE task_leader=user_login AND us_id_fk=us_id 
				    AND us_project_id_fk=".$_SESSION['current_project_id'].")");				   
$request->getArrayFields();	
// Allocate columns
$arrayStatusX['']=0;
$arrayStatus[0]['colName']=$text_nobody;  

for ($i=0;$i<$request->nb_elt;$i++)
{	 
  $arrayStatusX[$request->array[$i]['user_login']]=$columnWidth*($i+1);
  $arrayStatus[$i+1]['colName']=$request->array[$i]['stakeholder'];  
}
/* Buttons settings */
$displayTopButtons=true;
$allowAdd=false;
$buttonAdd='';
$buttonAddImage='';
$targetAdd='';

$allowDelete=in_array('DELTASK',$_SESSION['user_actions']) || in_array('DELTASK',$_SESSION['user_local_actions']);
$allowOrder=in_array('ORDTASK',$_SESSION['user_actions']) || in_array('ORDTASK',$_SESSION['user_local_actions']);
$allowUpdate=false;
$allowMove=in_array('ALLOC_TASK',$_SESSION['user_actions']) || in_array('ALLOC_TASK',$_SESSION['user_local_actions']);

$allowActionHeaderStamp=true;

$buttonOrder=$button_reorder;
$buttonOrderExtended=$button_reorder_flat;

$otherFieldsInsert=',us_id_fk';
$otherFieldsInsertValues=','.$_REQUEST['object_id'];

include $pathBase.'railway_display.php';
include $pathBase.'boards_settings/settings_'.$itemType.'.php';
include $pathBase.'boards_actions/actions_items.php';
include $pathBase.'boards_actions/actions_tasks.php';

$functionForHeaderStamp='displayTaskInitLoad';

$MultipleItemsArray[0]=array('parent_id'=>0,'name'=>'','header_stamp'=>'','text'=>'','color'=>'');
$firstColumnStatic=false;

// get project stakeholders
$stakeholdersProjects=$currentProject->getStakeholdersAllowedToMoveTasksUsernames();
$projectUsers=$currentProject->getStakeholders();

$displayParentZone=true;
$displayUsFilter=false;
$displayTaskFilter=true;
$showFilterFeatures=false;
include $pathBase.'matrix_display.php';

}
else
{?>
  <div class="MessageBox WarningMessageBox"><?php echo $msg_no_project_selected;?></div><?php
}
include $pathBase.'footer.php';?>
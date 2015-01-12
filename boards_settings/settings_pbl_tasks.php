<?php
/**
 * Settings to manage tasks objects in a dashboard
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
$initialStatus=getInitialStatus($_SESSION['current_project_id'],$pathBase); 
 
$tableData='kados_tasks';
$fieldsList="task_id,text,task_load AS header_stamp,task_init_load,color,status,xpos,ypos,zpos,us_id_fk AS parent_us_id,active,task_link AS link,
task_creation_date AS creation_date,task_creator AS creator,task_last_update_date AS last_update,task_leader AS item_leader,
task_last_updater AS last_updater,task_done AS infoBottomLeft,task_raf AS infoBottomRight,CONCAT(task_us_number,'.',task_number) AS display_task_number";
$objectTag='T';
$itemIdName='task_id';
$itemNumberName='display_task_number';
$fieldForSorting='task_number';
$fieldForOrder='ypos';
$targetFileAction='manage_kanban.php?menu_lev2=prj_kanban&board=tasks';

$restrictionClauseOnStatus='';
// add statuts restriction if levels >2
if ($currentProject->level>2)
{
  $restrictionClauseOnStatus=" AND status='".$initialStatus."'";
}

$clauseWhereElementsGetAll=" AND us_id_fk IN (SELECT us_id FROM kados_user_stories WHERE active=1 AND us_project_id_fk=".$_SESSION['current_project_id']." AND us_release_id_fk=0)".$restrictionClauseOnStatus;
 
if (isset($_SESSION['filter_task']))
{
  $clauseWhereElementsGetAll.=" AND color='".$_SESSION['filter_task']."'".$restrictionClauseOnStatus;
}
$clauseWhereElements=' AND us_id_fk='.$_REQUEST['object_id'];
if (isset($_SESSION['filter_task']))
{
  $clauseWhereElements.=" AND color='".$_SESSION['filter_task']."'".$restrictionClauseOnStatus;
}
$parentRefId='us_id_fk';
$statusField='status';
/* position field for the axis used in the dashboard*/
$xPosField='xpos';
$yPosField='ypos';
$zPosField='zpos';
$addHiddenInput=true;
$updateDateField='task_last_update_date';
$updaterUsernameField='task_last_updater';
$fieldLeader='task_leader';
?>
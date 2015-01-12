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
 
$tableData='kados_tasks';
$fieldsList="task_id,text,task_load AS header_stamp,task_init_load,color,status,xpos_l,ypos_l,zpos_l,us_id_fk AS parent_us_id,active,task_link AS link,
task_creation_date AS creation_date,task_creator AS creator,task_last_update_date AS last_update,task_leader AS item_leader,task_leader,
task_last_updater AS last_updater,task_done AS infoBottomLeft,task_raf AS infoBottomRight,CONCAT(task_us_number,'.',task_number) AS display_task_number";
$objectTag='T';
$itemIdName='task_id';
$itemNumberName='display_task_number';
$fieldForSorting='task_number';
$fieldForOrder='ypos_l';
$targetFileAction='project_team_tasks.php?menu_lev2=team_tasks';

if (isset($_SESSION['current_sprint_id']))
{
  $clauseWhereElementsGetAll=' AND active=1 AND us_id_fk IN (SELECT us_id FROM kados_user_stories WHERE us_sprint_id_fk='.$_SESSION['current_sprint_id'].')';
}
else if (isset($_SESSION['current_release_id']))
{
  $clauseWhereElementsGetAll=' AND active=1 AND us_id_fk IN (SELECT us_id FROM kados_user_stories WHERE us_release_id_fk='.$_SESSION['current_release_id'].')';
}
else
{
  $clauseWhereElementsGetAll=' AND active=1 AND us_id_fk IN (SELECT us_id FROM kados_user_stories WHERE us_project_id_fk='.$_SESSION['current_project_id'].')';
}

$clauseWhereElements=$clauseWhereElementsGetAll;

if (isset($_SESSION['filter_task']))
{
  $clauseWhereElementsGetAll.=" AND color='".$_SESSION['filter_task']."'";
}

if (isset($_SESSION['filter_task']))
{
  $clauseWhereElements.=" AND color='".$_SESSION['filter_task']."'";
}
$parentRefId='parent_us_id';
$statusField='task_leader';
/* position field for the axis used in the dashboard*/
$xPosField='xpos_l';
$yPosField='ypos_l';
$zPosField='zpos_l';
//$addHiddenInput=true;
$fieldLeader='task_leader';
?>
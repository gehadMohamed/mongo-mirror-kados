<?php
/**
 * Settings to manage actions objects in a dashboard
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
 
$tableData='kados_actions';
$fieldsList="action_id,text,action_load AS header_stamp,color,status,xpos,ypos,zpos,issue_id_fk AS parent_us_id,active,action_link AS link,
action_creation_date AS creation_date,action_creator AS creator,action_last_update_date AS last_update,action_leader AS item_leader,
action_last_updater AS last_updater,action_done AS infoBottomLeft,action_raf AS infoBottomRight,CONCAT(action_issue_number,'.',action_number) AS display_action_number";
$objectTag='A';
$itemIdName='action_id';
$itemNumberName='display_action_number';
$fieldForSorting='action_number';
$fieldForOrder='ypos';
$targetFileAction='project_issues_progress.php?menu_lev2=prj_issues_progress';
$clauseWhereElementsGetAll=' AND issue_id_fk IN (SELECT issue_id FROM kados_issues WHERE issue_project_id_fk='.$_SESSION['current_project_id'].')';
if (isset($_SESSION['filter_task']))
{
  $clauseWhereElementsGetAll.=" AND color='".$_SESSION['filter_task']."'";
}
$clauseWhereElements=' AND issue_id_fk='.$_REQUEST['object_id'];
if (isset($_SESSION['filter_task']))
{
  $clauseWhereElements.=" AND color='".$_SESSION['filter_task']."'";
}
$parentRefId='issue_id_fk';
$statusField='status';
/* position field for the axis used in the dashboard*/
$xPosField='xpos';
$yPosField='ypos';
$zPosField='zpos';
$addHiddenInput=true;
$fieldLeader='action_leader';
?>
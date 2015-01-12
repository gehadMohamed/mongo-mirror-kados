<?php
/**
 * Settings to manage UserStories of a project in a poker_planning dashboard
 *
 * PHP versions 4 and 5
 *
 * @category Scripts
 * @package  DashBoardItemManagement:ObjectSettings
 * @author   Charles Santucci <charles@santucci.fr>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * */  
 
$tableData='kados_activities';
$fieldsList="activity_id,text,template_activity_id_fk AS header_stamp,xpos,ypos,zpos,status,color,activity_release_id_fk,
activity_link AS link,activity_number,activity_creation_date AS creation_date,
activity_creator AS creator,activity_last_update_date AS last_update,activity_last_updater AS last_updater";
$objectTag='A';
$initialStatus=0;
$itemIdName='activity_id';
$itemNumberName='activity_number';
$fieldForSorting='activity_number';
$fieldForOrder='ypos';
$targetFileAction='manage_release_checklist.php?menu_lev2=checklist';
$clauseWhereElements='';
$clauseWhereElementsGetAll='';

if (isset($_SESSION['current_release_id']))
{
  $clauseWhereElements=" AND activity_release_id_fk=".$_SESSION['current_release_id'];
  $clauseWhereElementsGetAll=" AND activity_release_id_fk=".$_SESSION['current_release_id'];
}
if (isset($_SESSION['filter_activity']))
{
  $clauseWhereElementsGetAll.=" AND color='".$_SESSION['filter_activity']."'";
}

$parentRefId='none';
$statusField='status';
/* position field for the axis used in the dashboard*/
$xPosField='xpos';
$yPosField='ypos';
$zPosField='zpos';
?>
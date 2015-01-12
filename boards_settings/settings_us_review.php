<?php
/**
 * Settings to manage UserStories of a project in a business value dashboard
 *
 * PHP versions 4 and 5
 *
 * @category Scripts
 * @package  DashBoardItemManagement:ObjectSettings
 * @author   Charles Santucci <charles@santucci.fr>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * */  
 
$tableData='kados_user_stories';
$fieldsList="us_id,text,status AS header_stamp,xpos_bv,ypos_bv,zpos_bv,status,color,us_project_id_fk,
complexity,business_value,us_link AS link,us_number,us_sprint_id_fk,us_creation_date AS creation_date,
us_creator AS creator,us_last_update_date AS last_update,us_last_updater AS last_updater,
business_value AS infoBottomLeft,complexity AS infoBottomRight";
$objectTag='US';
$initialStatus=0;
$itemIdName='us_id';
$itemNumberName='us_number';
$fieldForSorting='us_number';
$fieldForOrder='ypos_bv';
$targetFileAction='project_us_review.php?menu_lev2=us_review';
$clauseWhereElements=' AND us_project_id_fk='.$_SESSION['current_project_id'];
$clauseWhereElementsGetAll=' AND us_project_id_fk='.$_SESSION['current_project_id'];
if (isset($_SESSION['current_release_id']))
{
  $clauseWhereElements.=' AND us_release_id_fk='.$_SESSION['current_release_id'];
  $clauseWhereElementsGetAll.=' AND us_release_id_fk='.$_SESSION['current_release_id'];
}
if (isset($_SESSION['current_sprint_id']))
{
  $clauseWhereElements.=' AND us_sprint_id_fk='.$_SESSION['current_sprint_id'];
  $clauseWhereElementsGetAll.=' AND us_sprint_id_fk='.$_SESSION['current_sprint_id'];
}
if (isset($_SESSION['filter_us']))
{
  $clauseWhereElementsGetAll.=" AND color='".$_SESSION['filter_us']."'";
}

$parentRefId='none';
$statusField='business_value';
/* position field for the axis used in the dashboard*/
$xPosField='xpos_bv';
$yPosField='ypos_bv';
$zPosField='zpos_bv';
?>
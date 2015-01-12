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
 
$tableData='kados_issues';
$fieldsList="issue_id,text,status AS header_stamp,xpos_i,ypos_i,zpos_i,status,color,issue_project_id_fk,
impact,probability,issue_link AS link,issue_number,issue_creation_date AS creation_date,
issue_creator AS creator,issue_last_update_date AS last_update,issue_last_updater AS last_updater,
 impact AS infoBottomLeft,probability AS infoBottomRight,LOWER(issue_type) AS topic";
$objectTag='I';
$initialStatus=0;
$itemIdName='issue_id';
$itemNumberName='issue_number';
$fieldForSorting='issue_number';
$fieldForOrder='ypos_i';
$targetFileAction='project_issues_impact.php?menu_lev2=prj_issues_impact';
$clauseWhereElements=" AND kados_issues.status!='AWAY' AND issue_project_id_fk=".$_SESSION['current_project_id'];
$clauseWhereElementsGetAll=" AND kados_issues.status!='AWAY' AND issue_project_id_fk=".$_SESSION['current_project_id'];

if (isset($_SESSION['filter_issue']))
{
  $clauseWhereElementsGetAll.=" AND color='".$_SESSION['filter_issue']."'";
}

$parentRefId='none';
$statusField='impact';
/* position field for the axis used in the dashboard*/
$xPosField='xpos_i';
$yPosField='ypos_i';
$zPosField='zpos_i';
?>
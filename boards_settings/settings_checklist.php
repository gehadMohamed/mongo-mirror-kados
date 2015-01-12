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
 
$tableData='kados_template_activities';
$fieldsList="template_activity_id,text AS text,xpos,ypos,zpos,color,status,
'' AS header_stamp,'' AS link,template_activity_id AS issue_number,'0000-00-00' AS creation_date,
'' AS creator,'0000-00-00' AS last_update,'' AS last_updater,
 '' AS infoBottomLeft,'' AS infoBottomRight";
$objectTag='D';
$initialStatus=0;
$itemIdName='template_activity_id';
$itemNumberName='template_activity_id';
$fieldForSorting='template_activity_id';
$fieldForOrder='ypos';
$targetFileAction='template_checklist.php?menu_lev2=app_tpl_checklist';
$clauseWhereElements=" ";
$clauseWhereElementsGetAll=" ";

if (isset($_SESSION['filter_issue']))
{
  $clauseWhereElementsGetAll.=" AND color='".$_SESSION['filter_issue']."'";
}

$parentRefId='none';
$statusField='status';
/* position field for the axis used in the dashboard*/
$xPosField='xpos';
$yPosField='ypos';
$zPosField='zpos';
?>
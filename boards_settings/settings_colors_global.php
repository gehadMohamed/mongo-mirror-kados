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
 
$tableData='kados_colors_uses';
$fieldsList="use_color_id,use_color_meaning AS text,use_color_lock AS header_stamp,use_color_default AS infoBottomLeft,
    xpos,ypos,zpos,use_color_postit_type,color,'' AS creator";
$objectTag='';
$initialStatus=0;
$itemIdName='use_color_id';
$itemNumberName='creator';
$fieldForSorting='creator';
$fieldForOrder='ypos';
$targetFileAction='colors_uses.php?menu_lev2=color_uses';
$clauseWhereElements='';
$clauseWhereElementsGetAll='';

$parentRefId='none';
$statusField='use_color_postit_type';
/* position field for the axis used in the dashboard*/
$xPosField='xpos';
$yPosField='ypos';
$zPosField='zpos';
?>
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
 
$tableData='kados_projects_users';
$tableDataLeftJoin='LEFT JOIN kados_releases ON release_id_fk=release_id';
$fieldsList="stakeholder_id,(SELECT CONCAT('".$text_firstname." : ',user_firstname,'\n".$text_name." : ',user_name,
                                           '\n".$text_language." : ',language_name,
					   '\n".$text_connection_mode." : ',user_connection_mode) 
                             FROM framework_users,framework_languages 
							 WHERE user_login=user_login_fk AND user_language=language_tag) AS text,
xpos,ypos,zpos,color,
profile_id_fk,user_login_fk,
'' AS header_stamp,'' AS link,'0000-00-00' AS creation_date,
'' AS creator,'0000-00-00' AS last_update,'' AS last_updater,
 CONCAT('".$text_release." : ',release_name) AS infoBottomLeft,'' AS infoBottomRight";
$objectTag=$text_login.' : ';
$initialStatus=getProfileIdFromTag('READ');
$itemIdName='stakeholder_id';
$itemNumberName='user_login_fk';
$fieldForSorting='user_login_fk';
$fieldForOrder='ypos';
$targetFileAction='project_team.php?menu_lev1=team';
$clauseWhereElements=" AND project_id_fk=".$_SESSION['current_project_id'];
$clauseWhereElementsGetAll=" AND project_id_fk=".$_SESSION['current_project_id'];

$parentRefId='none';
$statusField='profile_id_fk';
/* position field for the axis used in the dashboard*/
$xPosField='xpos';
$yPosField='ypos';
$zPosField='zpos';
?>
<?php
/**
 * Main page to manage user stories of a project
 *
 * PHP versions 4 and 5
 *
 * @category Scripts
 * @package  DashBoardItemManagement:ObjectSettings
 * @author   Charles Santucci <charles@santucci.fr>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * */  

// Get mode
if ($_SESSION['mode_pbl']=='std')
{ 
  $itemType='us_project';
}
else
{ 
  $itemType='us_project_workshop';
}
  
$masterItemType=getMasterItemType($itemType);
$simpleItemType=getSimpleItemType($itemType);
/* set dashboard settings */
include $pathBase.'dashboard_settings.php';

$arrayStatusX[0]=$columnWidth*0;
$arrayStatus[0]['colName']='Product BackLog';

// Check is at least one column for tasks exists
$request->envoi("SELECT column_tag_fk FROM kados_projects_columns WHERE project_id_fk=".$_SESSION['current_project_id']);
$request->calc_nb_elt();
if ($request->nb_elt!=0)
{
  $arrayStatus[0]['link']='manage_kanban.php?menu_lev2=prj_kanban&project_id='.$_SESSION['current_project_id'].'&board=tasks';
}  
  
	
// Set visible Release Array
$visibleReleasesArray[0]=0;

if ($_SESSION['mode_pbl']=='std')
{
  // Get releases to display columns of the dashboard
  $request=new requete("SELECT release_id,release_name,release_creation_date,release_due_date,release_project_id_fk 
                        FROM kados_releases 
	  				    WHERE visibility=1 AND release_project_id_fk=".$_SESSION['current_project_id']." ORDER BY release_due_date",$cnx->num);
  $resultArray=$request->getArrayFields();
  for ($i=0;$i<count($resultArray);$i++)
  {
    $arrayStatusX[$resultArray[$i]['release_id']]=$columnWidth*($i+1);
    $arrayStatus[$i+1]['colName']=$resultArray[$i]['release_name'].' <span class="small_font">('.format_date($resultArray[$i]['release_due_date']).')</span>';
    $arrayStatus[$i+1]['link']='manage_kanban.php?menu_lev2=prj_kanban&release_id='.$resultArray[$i]['release_id'];
    $visibleReleasesArray[$i+1]=$resultArray[$i]['release_id'];
  }
}
else
{
  $columnWidth=getParameter('WSSIZE',$cnx->num);
}

// Prepare a filter for getting only the US of the visible releases
$visibleReleases=implode(',',$visibleReleasesArray);

$displayTopButtons=true;

$allowAdd=in_array('ADD_US',$_SESSION['user_actions']) || in_array('ADD_US',$_SESSION['user_local_actions']);
$targetAdd=$pathBase.'boards_buttons/add_us.php?item_type='.$itemType.'&us_from='.($itemType=='us_release' ? 'release' : '');
$buttonAdd=$button_add_user_story;
$buttonAddImage='app/new_user_story.png';

$allowDelete=in_array('DEL_US',$_SESSION['user_actions']) || in_array('DEL_US',$_SESSION['user_local_actions']);
$allowOrder=in_array('ORD_US',$_SESSION['user_actions']) || in_array('ORD_US',$_SESSION['user_local_actions']);
$allowUpdate=in_array('UPD_US',$_SESSION['user_actions']) || in_array('UPD_US',$_SESSION['user_local_actions']);
$allowMove=in_array('MOVE_US',$_SESSION['user_actions']) || in_array('MOVE_US',$_SESSION['user_local_actions']);
$allowActionHeaderStamp=$allowUpdate;

$displayPriorityButton=true;
$displayWorkshopSwitch=getParameter('USEWS',$cnx->num);
$buttonOrder=$button_reorder;
$buttonOrderExtended=$button_reorder_flat;
$buttonOrderPriority=$button_reorder_priority;

$otherFieldsInsertUS=',us_project_id_fk';
$otherFieldsInsertValuesUS=','.$_SESSION['current_project_id'];

$MultipleItemsArray[0]=array('parent_id'=>0,'name'=>'','header_stamp'=>'','text'=>'','color'=>'');
$firstColumnStatic=false;
$functionForHeaderStamp='displayStatusImageButton';

include $pathBase.'boards_settings/settings_'.$itemType.'.php';
include $pathBase.'boards_actions/actions_items.php';
include $pathBase.'boards_actions/actions_us.php';
include $pathBase.'railway_display.php';

$displayUsFilter=true;
include $pathBase.'matrix_display.php';

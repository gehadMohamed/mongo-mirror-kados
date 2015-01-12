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


$pathBase='./';
$targetFile='project_features.php?menu_lev2=prj_feature';
	  
include $pathBase.'header.php';

if (isset($_SESSION['current_project_id']))
{ 
  $showOnlyProjectLevel=true;  
  include $pathBase.'railway_display.php';

  $itemType='us_features';
  
  $masterItemType=getMasterItemType($itemType);
  $simpleItemType=getSimpleItemType($itemType);
  /* set dashboard settings */
  include $pathBase.'dashboard_settings.php';
  $columnWidth=$itemWidth+25;

  $arrayStatusX[0]=$columnWidth*0;
  $arrayStatus[0]['colName']=$text_no_feature;
  
  // Get features to display columns of the dashboard
  $request=new requete("SELECT feature_id,feature_short_label,feature_name,feature_description 
                        FROM kados_features 
	  				    WHERE feature_project_id_fk=".$_SESSION['current_project_id']." ORDER BY feature_name",$cnx->num);
  $resultArray=$request->getArrayFields();
  for ($i=0;$i<count($resultArray);$i++)
  {
    $arrayStatusX[$resultArray[$i]['feature_id']]=$columnWidth*($i+1);
    $arrayStatus[$i+1]['colName']=$resultArray[$i]['feature_name'];
    $arrayStatus[$i+1]['colMeaning']=$resultArray[$i]['feature_name'].'<br />'.$resultArray[$i]['feature_description'];
  }

  // Prepare a filter for getting only the US of the visible releases

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
  $displayWorkshopSwitch=false;
  $buttonOrder=$button_reorder;
  $buttonOrderExtended=$button_reorder_flat;
  $buttonOrderPriority=$button_reorder_priority;

  $otherFieldsInsertUS=',us_project_id_fk';
  $otherFieldsInsertValuesUS=','.$_SESSION['current_project_id'];

  $MultipleItemsArray[0]=array('parent_id'=>0,'name'=>'','header_stamp'=>'','text'=>'','color'=>'');
  $firstColumnStatic=false;
  $functionForHeaderStamp='displayStatusImageButton';

  $displayParentZone=false;

  include $pathBase.'boards_settings/settings_'.$itemType.'.php';
  include $pathBase.'boards_actions/actions_items.php';
  include $pathBase.'boards_actions/actions_us.php';

  $displayUsFilter=true;
  $showFilterFeatures=false;
  include $pathBase.'matrix_display.php';
}
else
{?>
  <div class="MessageBox WarningMessageBox"><?php echo $msg_no_project_selected;?></div><?php
}
include $pathBase.'footer.php';?>
<?php
/**
 * Page to allocate a business value to US
 *
 * PHP versions 4 and 5
 *
 * @category Scripts
 * @package  ProjectManagement:US
 * @author   Charles Santucci <charles@santucci.fr>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * */  
$pathBase='../';
$targetFile='colors_uses.php?menu_lev2=color_uses';
$displayTable=true;
	  
include $pathBase.'header.php';

    $currentProject=new project($pathBase,0);
 
    // Get mode
    $itemType='colors_global';

    $masterItemType=getMasterItemType($itemType);
    $simpleItemType=getSimpleItemType($itemType);
    /* set dashboard settings */
    include $pathBase.'dashboard_settings.php';
    $columnWidth=115;
    $itemWidth=90;
    $itemHeight=60;

    $i=0;
    $arrayStatusX['NONE']=$columnWidth*$i++;
    $arrayStatusX['US']=$columnWidth*$i++;
    $arrayStatusX['TASK']=$columnWidth*$i++;
    $arrayStatusX['ACTION']=$columnWidth*$i++;  
    $arrayStatusX['ACTIVITY']=$columnWidth*$i++; 
    $arrayStatusX['RISK']=$columnWidth*$i++;
    $arrayStatusX['PROBLEM']=$columnWidth*$i++;
    $arrayStatusX['STKH']=$columnWidth*$i++;
    
    $arrayStatus[]['colName']='...';
    $arrayStatus[]['colName']=$text_user_story;
    $arrayStatus[]['colName']=$text_task;
    $arrayStatus[]['colName']=$text_action;
    $arrayStatus[]['colName']=$text_activity;
    $arrayStatus[]['colName']=$text_risk;
    $arrayStatus[]['colName']=$text_problem;
    $arrayStatus[]['colName']=$text_stakeholder;
    
    $displayTopButtons=true;
    $allowAdd=true;//in_array('ADD_COLOR',$_SESSION['user_actions']) || in_array('ADD_COLOR',$_SESSION['user_local_actions']);
    $targetAdd=$pathBase.'boards_buttons/add_color.php?item_type='.$itemType;
    $buttonAdd=$button_add_color_use;
    $buttonAddImage='app/new_note.png';	
	
    $allowDelete=in_array('DEL_ACTIVITIES',$_SESSION['user_actions']) || in_array('DEL_ACTIVITIES',$_SESSION['user_local_actions']);
    $allowOrder=in_array('ORD_ACTIVITIES',$_SESSION['user_actions']) || in_array('ORD_ACTIVITIES',$_SESSION['user_local_actions']);
    $allowUpdate=in_array('UPD_ACTIVITIES',$_SESSION['user_actions']) || in_array('UPD_ACTIVITIES',$_SESSION['user_local_actions']);
    $allowMove=in_array('MOV_ACTIVITIES',$_SESSION['user_actions']) || in_array('MOV_ACTIVITIES',$_SESSION['user_local_actions']);
    $allowActionHeaderStamp=false;
    $functionForHeaderStamp='displayLockedImage';
    $functionForDisableDelete='isColorUsed';
    $functionForBottomLeft='isColorDefault';

    //    $buttonAdd=$button_add_issues;
    $buttonOrder=$button_reorder;
    $buttonOrderExtended=$button_reorder_flat;
    
    $MultipleItemsArray[0]=array('parent_id'=>0,'name'=>'','header_stamp'=>'','text'=>'','color'=>'');
    $firstColumnStatic=false;
	
    include $pathBase.'boards_settings/settings_'.$itemType.'.php';
    include $pathBase.'boards_actions/actions_items.php';
    include $pathBase.'boards_actions/actions_colors.php';
    // change delete picture (direct delete, no trash system)
    $deleteMode='trash';
    include $pathBase.'matrix_display.php';


include $pathBase.'footer.php';?>
<?php
/**
 * Main script to manage items in a dashboard
 *
 * PHP versions 4 and 5
 *
 * @category Scripts
 * @package  DashBoardItemManagement
 * @author   Charles Santucci <charles@santucci.fr>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * */

$displayIssueFilter = isset($displayIssueFilter) ? $displayIssueFilter : false; 
$displayUsFilter = isset($displayUsFilter) ? $displayUsFilter : false;
$displayTaskFilter = isset($displayTaskFilter) ? $displayTaskFilter : false;

$firstColumnObjectType= isset($firstColumnObjectType) ? $firstColumnObjectType : 'postit';

$dashboardWidth=($columnWidth)*count($arrayStatus)+1;
$displayPriorityButton = isset($displayPriorityButton) ? $displayPriorityButton : false;
$displayWorkshopSwitch = isset($displayWorkshopSwitch) ? $displayWorkshopSwitch : false;

$deckIsAvailable = isset($deckIsAvailable) ? $deckIsAvailable : true;
$displayNoUser = isset($displayNoUser) ? $displayNoUser : false;
$displayMyTasks = isset($displayMyTasks) ? $displayMyTasks : false;

$stakeholdersProjects = isset($stakeholdersProjects) ? $stakeholdersProjects : array();

$workshopView = isset($workshopView) ? $workshopView : false;
$enableFirstColumnDeleteFunction= isset($enableFirstColumnDeleteFunction) ? $enableFirstColumnDeleteFunction : false;
$enableFirstColumnUpdateFunction= isset($enableFirstColumnUpdateFunction) ? $enableFirstColumnUpdateFunction : false;
$simpleItemParentType= isset($simpleItemParentType) ? $simpleItemParentType : 'us';

$displayParentZone = isset($displayParentZone) ? $displayParentZone : true;
$displayWarningZone = isset($displayWarningZone) ? $displayWarningZone : true;

$firstColumnDisplayParentZone = isset($firstColumnDisplayParentZone) ? $firstColumnDisplayParentZone : false;
$firstColumnDisplayWarningZone = isset($firstColumnDisplayWarningZone) ? $firstColumnDisplayWarningZone : false;

$showFilterFeatures = isset($showFilterFeatures) ? $showFilterFeatures : true;
$showFilterStakeHolders = isset($showFilterStakeHolders) ? $showFilterStakeHolders : true;
$showFilterTags = isset($showFilterTags) ? $showFilterTags : true;

// Warning message if workshop mode
  if ($displayWorkshopSwitch)
  {
    if ($_SESSION['mode_pbl']=='workshop')
    { ?>
      <div class="MessageBox WarningMessageBox"><?php echo $msg_workshop_mode_is_on;?></div><?php
    }
  }	

// Generic buttons for creating items, cancelling deletion or ordering items 
  if ($displayTopButtons)
  {  
	if ($allowAdd)
	{
      displayButton($buttonAdd,$pathImages.$buttonAddImage,$targetAdd,'addButtonGeneric');	
	}
	if ($allowOrder)
	{
	  displayButton($buttonOrder,$pathImages.'app/compact.png',$targetFileAction.'&action=order_all_compact');	
	  displayButton($buttonOrderExtended,$pathImages.'app/extended.png',$targetFileAction.'&action=order_all_extended');	
	  if (isset($buttonOrderPriority))
	  {
	    displayButton($buttonOrderPriority,$pathImages.'app/trophy.png',$targetFileAction.'&action=order_all_priority');		  
	  }	
          displayButton($button_reorder_number,$pathImages.'app/order.png',$targetFileAction.'&action=order_all_by_number');	          
	}
  }	
  // Button to display Workshop board
  if ($displayWorkshopSwitch)
  {
	if ($_SESSION['mode_pbl']=='workshop')
	{
	  displayButton($button_switch_to_std,$pathImages.'contract_warning.png',$targetFileAction.'&mode_pbl=std');	
	}
    else	
	{
	  displayButton($button_switch_to_workshop,$pathImages.'expand.png',$targetFileAction.'&mode_pbl=workshop');
	}
  }
  // Button for order by priority
  if ($displayPriorityButton)
  {
	if ($_SESSION['display_priority']=='block')
	{
	  displayButton($button_hide_priority,$pathImages.'offline.png','javascript:hidePriority()','','buttonPriority');	
	}
    else	
	{
	  displayButton($button_show_priority,$pathImages.'online.png','javascript:showPriority()','','buttonPriority');	
	}
  }
  // Filter buttons on issues
  if ($displayIssueFilter)
  {
	$shortItemType='issue';
	if (isset($exclusiveIssueColorsListRequest))
	{	
	  $exclusiveColorsListRequest=$exclusiveIssueColorsListRequest;	
	}  
	include $pathBase.'note_color_filter.php';
  }  
  if ($displayUsFilter)
  {
	$shortItemType='us';
	if (isset($exclusiveUsColorsListRequest))
	{	
	  $exclusiveColorsListRequest=$exclusiveUsColorsListRequest;	
	}  
	include $pathBase.'note_color_filter.php';
  }
  if ($displayTaskFilter)
  {
	$shortItemType='task';
	$exclusiveColorsListRequest='';
	if (isset($exclusiveTaskColorsListRequest))
	{
	  $exclusiveColorsListRequest=$exclusiveTaskColorsListRequest;

	}  
	// filter on tasks
	if (isset($_SESSION['filter_task']))
	{
	  $specialClause=" AND kados_tasks.color='".$_SESSION['filter_task']."'";	
	}  
	include $pathBase.'note_color_filter.php';
  }
  
  if ($displayMyTasks)
  {
    displayButton($button_filter_my_tasks,$pathImages.'app/magic_wand.png',$targetFileAction.'&action=filter_my_tasks');	
  }?>
  <div class="clearleft"></div><?php
  include $pathBase.'features_filter.php';
  include $pathBase.'stakeholders_filter.php';
  include $pathBase.'tags_filter.php'; ?>
  <div class="clearleft"></div>

<div style="width:<?php echo ($firstColumnStatic ? $dashboardWidth+$columnWidthSingle+10 : $dashboardWidth);?>px;position:relative;z-index:1">
<div class="poof"></div> 
<span class="columnWidth"><?php echo $columnWidth;?></span>	
<span class="itemWidth"><?php echo $itemWidth;?></span>	
<span class="xInitDefaultPosition"><?php echo $xInitDefaultPosition;?></span>	
<span class="itemType"><?php echo $itemType;?></span>
<span class="masterItemType"><?php echo $masterItemType;?></span>
<span class="hidden-targetFile"><?php echo $targetFile;?></span>
<span class="hidden-allowUpdate"><?php echo $allowUpdateUS;?></span>
<span class="hidden-pathBase"><?php echo $pathBase;?></span>
<span class="dashboardType"><?php echo (count($MultipleItemsArray)>1 ? 'multiple' : 'simple');?></span>
<?php
// Set a boucle on the list of items needing a dashboard
// It may be only one (simple dashboard) or multiple items

for ($k=0;$k<count($MultipleItemsArray);$k++)
{
  $activateParentZone=false;
  $activateWarningZone=false;
  // include a dashboard instance
  $parentId=$MultipleItemsArray[$k]['parent_id'];
  $clauseWhereElementsGetAllStd=$clauseWhereElementsGetAll;
  if ($parentId)
  {
    $clauseWhereElementsGetAllStd.=' AND '.$parentRefId.'='.$parentId;
  }	

  // Set the display of board Titles only for the first line
  $displayDashBoardTitles= $k==0 ? true : false;
  // If set, force the display of board titles on all lines
  if (isset($forceDisplayDashBoardTitles))
  {
    $displayDashBoardTitles=$forceDisplayDashBoardTitles;
  }
  // compute dashboard Height from the max number of item in a column
  $request=new requete("SELECT MAX(nb_item) AS max_item 
                        FROM (SELECT COUNT(*) AS nb_item,".$statusField." 
                              FROM ".$tableData." 
                              WHERE active=1 ".$clauseWhereElementsGetAllStd." 
                              GROUP BY ".$statusField.') count_table',$cnx->num);
  $objectCounter=$request->getObject();
  // Compute max ypos of items to choose the best height versus number of items * itemHeight
  $request->envoi("SELECT MAX(".$yPosField.") AS max_ypos FROM ".$tableData." WHERE active=1 ".$clauseWhereElementsGetAllStd);
  $objectMaxY=$request->getObject();  
  if ($_SESSION['mode_pbl']=='workshop' && $workshopView)
  {
	$columnsOfPostit=floor($columnWidth/($itemWidth+10));
	$dashboardHeight=max($usBlockMinHeight,100+$itemHeight+max($itemHeight*$objectCounter->max_item/$columnsOfPostit,$objectMaxY->max_ypos));
  }
  else
  {
    $dashboardHeight=max($usBlockMinHeight,90+$itemHeight+$objectMaxY->max_ypos);
  }  

  // set if there must be a first column just before each dashboard with static data 
  // (maybe a parent object of those manipulated in the dashboard)
  if ($firstColumnStatic)
  {
    $shiftPostitYpos=0;?>
    <!-- display the backlog in a column (static notes) !-->
    <div class="main_matrix" style="width:<?php echo $columnWidthSingle;?>px;height:<?php echo $dashboardHeight;?>px;z-index:12">
      <a class="block" name="Block<?php echo $k;?>"></a>	
      <span class="sprintBacklog" style="width:<?php echo $columnWidthSingle;?>px;height:<?php echo $dashboardHeight;?>px"><?php
      if ($displayDashBoardTitles)
      {?>
        <span class="colHeader" style="width:<?php echo $columnWidthSingle;?>px"><?php echo $firstColumnTitle;?></span><?php
      }
      if ($firstColumnObjectType=='postit')
      {
	$parentZoneData=array();
	$warningZoneData=array();
        if ($masterItemType=='us')
        {
	  if ($firstColumnDisplayWarningZone)
	  {
	    $request->envoi("SELECT issue_id,issue_type,impact,issue_number,probability,text,status 
	                     FROM kados_issues 
	                     WHERE active=1 AND issue_us_id_fk=".$MultipleItemsArray[$k]['parent_id']);
            $warningZoneData=$request->getArrayFields();
	    $shiftPostitYpos= count($warningZoneData)!=0 ? 20 : 0;
	  }  
	  if ($firstColumnDisplayParentZone)
	  {
	    // Parent zone may be activated if link with an US
	    $request->envoi("SELECT us_feature_id_fk 
	                     FROM kados_user_stories 
	                     WHERE active=1 AND us_id=".$MultipleItemsArray[$k]['parent_id']);
            $linkedFeatureData=$request->getArrayFields();
		  
	    $request->envoi("SELECT feature_short_label,feature_description,feature_name 
	                     FROM kados_features 
	                     WHERE feature_id=".$linkedFeatureData[0]['us_feature_id_fk']);
	    $parentZoneData=$request->getArrayFields();
            if ($shiftPostitYpos==0)
	    {
	      $shiftPostitYpos= count($parentZoneData)!=0 ? 20 : 0;			  
	    }		
          }			
	}
	else if ($masterItemType=='issue')
        {
	  if ($firstColumnDisplayParentZone)
	  {
	    $request->envoi("SELECT issue_us_id_fk,issue_type 
	                     FROM kados_issues 
	                     WHERE active=1 AND issue_id=".$MultipleItemsArray[$k]['parent_id']);
            $linkedIssueData=$request->getArrayFields();
	    $request->envoi("SELECT us_number,us_id,status,business_value,text 
	                     FROM kados_user_stories 
	                     WHERE active=1 AND us_id=".$linkedIssueData[0]['issue_us_id_fk']);
            $parentZoneData=$request->getArrayFields();
            if ($shiftPostitYpos==0)
	    {
	      $shiftPostitYpos= count($parentZoneData)!=0 ? 20 : 0;			  
	    }
          }  
	}	
        // compute display for zones		
	if (count($parentZoneData)!=0)
	{
	  if (file_exists($pathBase.'parent_zone_'.$masterItemType.'.php'))
	  {
	    require $pathBase.'parent_zone_'.$masterItemType.'.php';
	  }
	}  
	if (count($warningZoneData)!=0)
	{
	  if (file_exists($pathBase.'warning_zone_'.$masterItemType.'.php'))
	  {
	    require $pathBase.'warning_zone_'.$masterItemType.'.php';
	  }
        }		  
	$isIEbrowser=preg_match('/(?i)msie [1-9]/',$_SERVER['HTTP_USER_AGENT']) && ($activateParentZone || $activateWarningZone);?>
	<div class="note_static <?php echo $MultipleItemsArray[$k]['color'];?>" id="note_static<?php echo $MultipleItemsArray[$k]['parent_id'];?>" style="cursor:auto;width:<?php echo $itemWidth;?>px;height:<?php echo $itemHeight+($isIEbrowser ? 16 : 0);?>px;left:14px;top:<?php echo ($displayDashBoardTitles ? 60 : 35)+$shiftPostitYpos;?>px;z-index:1">
	<div class="upper-header" style="width:<?php echo $itemWidth;?>px;<?php if($isIEbrowser) {echo 'height:16px;';}?>">
	<!-- The PARENT ZONE --><?php
	if ($activateParentZone)
	{?>
	  <div class="parent_zone"><?php echo $parentZoneDisplay;?></div><?php
	}?>  
	<!-- The WARNING ZONE --><?php
     	if ($activateWarningZone)
	{?>
	  <div class="warning_zone"><?php echo $warningZoneDisplay;?></div><?php		
	}  ?>	
        </div>		
	 <div class="item-header"> <?php 
	 if ($enableFirstColumnDeleteFunction) { ?><span class="trashspan bloc-header"><a href="<?php echo $targetFileAction;?>&action=del_us&item_id=<?php echo $MultipleItemsArray[$k]['parent_id'];?>#Block<?php echo $k;?>" onclick="return confirm('<?php echo $msg_confirm_send_object_to_trash;?>');" ><img src="<?php echo $pathImages;?>app/trash.gif" border="0" /></a></span><?php }			
         if ($enableFirstColumnUpdateFunction) { ?><span class="editspan bloc-header"><a href="<?php echo $pathBase;?>boards_buttons/update_<?php echo $simpleItemParentType;?>.php?item_id=<?php echo $MultipleItemsArray[$k]['parent_id'];?>&item_type=us_project&blockId=<?php echo $k;?>" class="ulbtn"><img src="<?php echo $pathImages;?>app/update.png" border="0" /></a></span><?php }?>					  
	  <span class="deckAdd"><?php
  	   if (count($MultipleItemsArray)>1 && $deckIsAvailable)
	   {?>
	     <a href="<?php echo $targetFileAction.'&add_to_deck='.$MultipleItemsArray[$k]['parent_id'];?>" ><img src="<?php echo $pathImages.'app/minus.png';?>" border="0"></a><?php
           }  ?>
	  </span> 
	  <span class="postit_id bloc-header"><?php echo $firstColumnObjectTag.$MultipleItemsArray[$k]['display_number'];?></span>
	  <span class="postit_header-right"><?php 
	    if (isset($firstColumnFunctionForHeaderStamp))
	    {
	      call_user_func($firstColumnFunctionForHeaderStamp,array($MultipleItemsArray[$k]['parent_id'],$MultipleItemsArray[$k]['header_stamp'],$allowUpdateUS,$boardFinalStatusTag,$k)); 
	    }
            else
            {
              echo htmlspecialchars($MultipleItemsArray[$k]['header_stamp']);
            }?>
          </span>		  
	 </div>
	 <div class="postit_text_static" style="width:<?php echo ($itemWidth-$itemWidthBodyMargin);?>px;height:<?php echo ($itemHeight-$itemHeightBodyMargin);?>px;"><?php echo make_clickable(nl2br(htmlspecialchars($MultipleItemsArray[$k]['text'])));?></div>
	 <div class="item-footer">
	    <span class="postit_footer-left"><?php 
	    if (isset($MultipleItemsArray[$k]['infoBottomLeft']))
	    {
	      if (isset($firstColumnFunctionForBottomLeft)) 
	      { 
	        call_user_func($firstColumnFunctionForBottomLeft,$MultipleItemsArray[$k]['infoBottomLeft']);
	      }
	      else
	      {
	        echo $MultipleItemsArray[$k]['infoBottomLeft'];
	      }
	    } ?>			
            </span>
	    <span class="postit_footer-right"><?php 
	    if (isset($MultipleItemsArray[$k]['infoBottomRight']))
	    {
	      if (isset($firstColumnFunctionForBottomRight)) 
	      { 
	        call_user_func($firstColumnFunctionForBottomRight,$MultipleItemsArray[$k]['infoBottomRight']);
	      }
	      else
	      {
	        echo $MultipleItemsArray[$k]['infoBottomRight'];
	      }
	    } ?>
	   </span>
	 </div>			 
       </div><?php
      }
		else
		{?> 
		  <div class="firstColumnInfo" style="left:14px;top:<?php echo ($displayDashBoardTitles ? 60 : 35);?>px;z-index:1">
		  <?php echo make_clickable(nl2br(htmlspecialchars($MultipleItemsArray[$k]['text'])));?>
		  </div><?php
		}?>
	    <span class="hidden-item"><?php echo $MultipleItemsArray[$k]['parent_id'].':'.($displayDashBoardTitles ? 30 : 5);?></span>
	    <div class="add_task_button" style="left:5px;top:<?php echo ($displayDashBoardTitles ? 30 : 5);?>px"><?php
		 if ($allowAdd)
		 {  
		   $target=$pathBase.'boards_buttons/add_'.$simpleItemType.'.php?object_id='.$MultipleItemsArray[$k]['parent_id'].'&item_type='.$itemType.'&blockId='.$k;
		   displayButtonImg($buttonAdd,$pathImages.$buttonAddImage,$target,'addButtonGeneric');	
		 }
		 if ($allowOrder)
		 {
		   $target=$targetFileAction.'&action=order_all_compact&object_id='.$MultipleItemsArray[$k]['parent_id'].'&ypos_ref='.($displayDashBoardTitles ? 30 : 5).'&a='.md5(time()).'#Block'.$k;
		   displayButtonImg($buttonOrder,$pathImages.'app/compact.png',$target,'');			 
		   $target=$targetFileAction.'&action=order_all_extended&object_id='.$MultipleItemsArray[$k]['parent_id'].'&ypos_ref='.($displayDashBoardTitles ? 30 : 5).'&a='.md5(time()).'#Block'.$k;
		   displayButtonImg($buttonOrderExtended,$pathImages.'app/extended.png',$target,'');			 		   
		   $target=$targetFileAction.'&action=order_all_by_number&object_id='.$MultipleItemsArray[$k]['parent_id'].'&ypos_ref='.($displayDashBoardTitles ? 30 : 5).'&a='.md5(time()).'#Block'.$k;
		   displayButtonImg($button_reorder_number,$pathImages.'app/order.png',$target,'');			 		                      
		 }?> 
	    </div>
      </span>
    </div> <?php
  }   // end of static first column

  include $pathBase.'dashboard_display.php';
    
}?>
</div>
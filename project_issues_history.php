<?php
/**
 * Trash page for Issues
 *
 * PHP versions 4 and 5
 *
 * @category Scripts
 * @package  DashBoardItemManagement:ObjectSettings
 * @author   Charles Santucci <charles@santucci.fr>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * */  
$pathBase='./';
$targetFile='project_issues_history.php?menu_lev2=issue_history';
	  
include $pathBase.'header.php';

$itemType='issues_impact';
$masterItemType=getMasterItemType($itemType);
$simpleItemType=getSimpleItemType($itemType);

if (isset($_SESSION['current_project_id']))
{
  $showOnlyProjectLevel=true;  
  include $pathBase.'railway_display.php';
     
  /* Dashboard settings */
  include $pathBase.'dashboard_settings.php';
  include $pathBase.'boards_actions/actions_items.php';
  $functionForHeaderStamp='displayIssueStatusImageButton';

  $allowChangeStatus=in_array('UPD_ISSUES',$_SESSION['user_actions']) || in_array('UPD_ISSUES',$_SESSION['user_local_actions']);


  // Get ISSUE of history
  $request=new requete("SELECT issue_id,text,status AS header_stamp,color,impact AS infoBottomLeft,
                               probability AS infoBottomRight,issue_number 
                        FROM kados_issues 
		 	  		    WHERE active=1 AND status='AWAY' AND issue_project_id_fk=".$_SESSION['current_project_id'],$cnx->num);
  $HistoryItemsArray=$request->getArrayFields();?>
  
  <div class="MessageBox TitleBox"><?php echo $text_issues_history_title;?></div>
  <div class="deck"><?php

  if (count($HistoryItemsArray)==0)
  {
    echo $text_history_is_empty;
  }
  for ($k=0;$k<count($HistoryItemsArray);$k++)
  {?>
      <div class="note_deck <?php echo $HistoryItemsArray[$k]['color'];?>" style="width:<?php echo $itemWidth;?>px;">
	     <div class="item-header" >
		  <span class="deck_postit_id">I<?php echo $HistoryItemsArray[$k]['issue_number'];?></span>
		  <span class="deck_postit_header-right"><?php 
		    if (isset($functionForHeaderStamp))
			{
		      call_user_func($functionForHeaderStamp,array($HistoryItemsArray[$k]['issue_id'],$HistoryItemsArray[$k]['header_stamp'],$allowChangeStatus,$boardFinalStatusTag,'')); 
			}
            else
            {
              echo htmlspecialchars($HistoryItemsArray[$k]['header_stamp']);
            }?></span>	
            <span class="clearright"></span>
		 </div>
		 <div class="deck_postit_text" style="width:<?php echo ($itemWidth-$itemWidthBodyMargin);?>px;height:<?php echo ($itemHeight-$itemHeightBodyMargin);?>px;"><?php echo make_clickable(nl2br(htmlspecialchars($HistoryItemsArray[$k]['text'])));?></div>
	     <div class="deck_item-footer">
		    <span class="deck_postit_footer-left"><?php displayImpactImage($HistoryItemsArray[$k]['infoBottomLeft']);?>
			</span>
		    <span class="deck_postit_footer-right"><?php displayProbability($HistoryItemsArray[$k]['infoBottomRight']);?></span>
		 </div>			 
	  </div><?php
  }?>
  </div>
  <div class="clearleft"></div><?php
}
else
{?>
  <div class="MessageBox WarningMessageBox"><?php echo $msg_no_project_selected;?></div><?php
}
include $pathBase.'footer.php';?>
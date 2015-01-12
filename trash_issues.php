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
$targetFile='trash_issues.php?menu_lev2=trash_issues';
	  
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
  $functionForHeaderStamp='displayIssueStatusImageButton';

  $allowDelete=in_array('DEL_ISSUES',$_SESSION['user_actions']) || in_array('DEL_ISSUES',$_SESSION['user_local_actions']);
  switch ($_REQUEST['action'])
  {
	case 'delete_issue':
	  $request->envoi("DELETE FROM kados_issues WHERE issue_id=".$_REQUEST['issue2delete']);
            $mcnx->num->kados_issues->remove(array('issue_id'=>$_REQUEST['issue2delete']));
	  $request->envoi("DELETE FROM kados_actions WHERE issue_id_fk=".$_REQUEST['issue2delete']);
          $mcnx->num->kados_actions->remove(array('issue_id_fk'=>$_REQUEST['issue2delete']));
	  $request->envoi("DELETE FROM kados_users_decks WHERE item_id_fk=".$_REQUEST['issue2delete']);
          $mcnx->num->kados_users_decks->remove(array('item_id_fk'=>$_REQUEST['issue2delete']));?>
  	  <div class="MessageBox ConfirmationMessageBox"><?php echo $msg_object_deleted;?></div>           <script>$('.ConfirmationMessageBox').delay(<?php echo $delayMsg;?>).slideUp("slow");</script><?php	  
	break;
  
    case 'cancel_trash_issue':
      $request->envoi("SELECT MAX(zpos_i) AS maxi FROM kados_issues WHERE active=1 AND issue_project_id_fk=".$_SESSION['current_project_id']);
	  $maxZpos_i=$request->getObject();
      $request->envoi("SELECT MAX(zpos_p) AS maxi FROM kados_issues WHERE active=1 AND issue_project_id_fk=".$_SESSION['current_project_id']);
	  $maxZpos_p=$request->getObject();
      $request->envoi("UPDATE kados_issues SET active=1,zpos_i=".((int)$maxZpos_i->maxi+1).",zpos_p=".((int)$maxZpos_p->maxi+1)." WHERE issue_id=".$_REQUEST['issue2reactivate']);
      $mcnx->num->kados_issues->update(array('issue_id'=>$_REQUEST['issue2reactivate']),array('$set'=>array('active'=>'1','zpos_i'=>((int)$maxZpos_i->maxi+1),'zpos_p'=>((int)$maxZpos_p->maxi+1))),array('multiple' => true));
	break;  
  }

  // Get ISSUE of trash
  $request=new requete("SELECT issue_id,text,status AS header_stamp,color,impact AS infoBottomLeft,
                               probability AS infoBottomRight,issue_number 
                        FROM kados_issues 
		 	  		    WHERE active=-1 AND issue_project_id_fk=".$_SESSION['current_project_id'],$cnx->num);
  $trashItemsArray=$request->getArrayFields();?>

  <div class="deck"><?php

  if (count($trashItemsArray)==0)
  {
    echo $text_trash_is_empty;
  }
  for ($k=0;$k<count($trashItemsArray);$k++)
  {?>
      <div class="note_deck <?php echo $trashItemsArray[$k]['color'];?>" style="width:<?php echo $itemWidth;?>px;">
	     <div class="item-header" >
		  <span class="deck_header-left"><?php
		  if ($allowDelete)
		  {?>
		    <a href="<?php echo $targetFile.'&action=delete_issue&issue2delete='.$trashItemsArray[$k]['issue_id'];?>" onClick="return confirm('<?php echo $msg_confirm_delete_issue;?>');"><img src="<?php echo $pathImages.'app/delete.png';?>" border="0"></a> 
		    <a href="<?php echo $targetFile.'&action=cancel_trash_issue&issue2reactivate='.$trashItemsArray[$k]['issue_id'];?>" onClick="return confirm('<?php echo $msg_confirm_activate_issue;?>');"><img src="<?php echo $pathImages.'app/trash_out.png';?>" border="0"></a><?php
          }?>			
		  </span>
		  <span class="deck_postit_id">I<?php echo $trashItemsArray[$k]['issue_number'];?></span>
		  <span class="deck_postit_header-right"><?php 
		    if (isset($functionForHeaderStamp))
			{
		      call_user_func($functionForHeaderStamp,array($trashItemsArray[$k]['issue_id'],$trashItemsArray[$k]['header_stamp'],false,$boardFinalStatusTag,'')); 
			}
            else
            {
              echo htmlspecialchars($trashItemsArray[$k]['header_stamp']);
            }?></span>	
            <span class="clearright"></span>
		 </div>
		 <div class="deck_postit_text" style="width:<?php echo ($itemWidth-$itemWidthBodyMargin);?>px;height:<?php echo ($itemHeight-$itemHeightBodyMargin);?>px;"><?php echo make_clickable(nl2br(htmlspecialchars($trashItemsArray[$k]['text'])));?></div>
	     <div class="deck_item-footer">
		    <span class="deck_postit_footer-left"><?php displayImpactImage($trashItemsArray[$k]['infoBottomLeft']);?>
			</span>
		    <span class="deck_postit_footer-right"><?php displayProbability($trashItemsArray[$k]['infoBottomRight']);?></span>
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
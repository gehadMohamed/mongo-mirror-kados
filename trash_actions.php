<?php
/**
 * Trash page for User Stories
 *
 * PHP versions 4 and 5
 *
 * @category Scripts
 * @package  DashBoardItemManagement:ObjectSettings
 * @author   Charles Santucci <charles@santucci.fr>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * */  
$pathBase='./';
$targetFile='trash_actions.php?menu_lev2=trash_actions';
	  
include $pathBase.'header.php';

$itemType='actions_sprint';
$masterItemType=getMasterItemType($itemType);
$simpleItemType=getSimpleItemType($itemType);

if (isset($_SESSION['current_project_id']))
{
  $showOnlyProjectLevel=true;  
  include $pathBase.'railway_display.php';
  
  /* Dashboard settings */
  include $pathBase.'dashboard_settings.php';

  $allowDelete=in_array('DELACTION',$_SESSION['user_actions']) || in_array('DELACTION',$_SESSION['user_local_actions']);
  switch ($_REQUEST['action'])
  {
	case 'delete_action':
	  $request->envoi("DELETE FROM kados_actions WHERE action_id=".$_REQUEST['action2delete']);
            $mcnx->num->kados_actions->remove(array('action_id'=>$_REQUEST['action2delete']));
            ?>
  	  <div class="MessageBox ConfirmationMessageBox"><?php echo $msg_object_deleted;?></div>           <script>$('.ConfirmationMessageBox').delay(<?php echo $delayMsg;?>).slideUp("slow");</script><?php	  
	break;
  
    case 'cancel_trash_action':
      $request->envoi("SELECT MAX(kados_actions.zpos) AS maxi FROM kados_actions,kados_issues WHERE kados_actions.active=1 AND issue_id_fk=issue_id AND issue_project_id_fk=".$_SESSION['current_project_id']);
	  $maxZpos=$request->getObject();
      $request->envoi("UPDATE kados_actions SET active=1,zpos=".((int)$maxZpos->maxi+1)." WHERE action_id=".$_REQUEST['action2reactivate']);
      $mcnx->num->kados_actions->update(array('action_id'=>$_REQUEST['action2reactivate']),array('$set'=>array('active'=>'1','zpos'=>((int)$maxZpos->maxi+1))),array('multiple' => true));
	break;  
  }

  // Get Tasks of trash
  $request=new requete("SELECT action_id,kados_actions.text,kados_actions.color,
                               action_done AS infoBottomLeft,action_raf AS infoBottomRight,
							   action_load AS header_stamp,CONCAT(action_issue_number,'.',action_number) AS display_action_number 
                        FROM kados_actions,kados_issues 
		 	  		    WHERE kados_actions.active=-1 AND issue_id_fk=issue_id AND issue_project_id_fk=".$_SESSION['current_project_id'],$cnx->num);
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
		    <a href="<?php echo $targetFile.'&action=delete_action&action2delete='.$trashItemsArray[$k]['action_id'];?>" onClick="return confirm('<?php echo $msg_confirm_delete_action;?>');"><img src="<?php echo $pathImages.'app/delete.png';?>" border="0"></a> 
		    <a href="<?php echo $targetFile.'&action=cancel_trash_action&action2reactivate='.$trashItemsArray[$k]['action_id'];?>" onClick="return confirm('<?php echo $msg_confirm_activate_action;?>');"><img src="<?php echo $pathImages.'app/trash_out.png';?>" border="0"></a><?php
		  }?>	
		  </span>
		  <span class="deck_postit_id">A<?php echo $trashItemsArray[$k]['display_action_number'];?></span>
		  <span class="deck_postit_header-right"><?php 
		    if (isset($functionForHeaderStamp))
			{
		      call_user_func($functionForHeaderStamp,array($trashItemsArray[$k]['action_id'],$trashItemsArray[$k]['header_stamp'],false)); 
			}
            else
            {
              echo htmlspecialchars($trashItemsArray[$k]['header_stamp']);
            }?></span>	
            <span class="clearright"></span>
		 </div>
		 <div class="deck_postit_text" style="width:<?php echo ($itemWidth-$itemWidthBodyMargin);?>px;height:<?php echo ($itemHeight-$itemHeightBodyMargin);?>px;"><?php echo make_clickable(nl2br(htmlspecialchars($trashItemsArray[$k]['text'])));?></div>
	     <div class="deck_item-footer">
		    <span class="deck_postit_footer-left"><?php if (isset($trashItemsArray[$k]['infoBottomLeft'])) { echo $trashItemsArray[$k]['infoBottomLeft'];}?></span>
		    <span class="deck_postit_footer-right"><?php if (isset($trashItemsArray[$k]['infoBottomRight'])) { echo $trashItemsArray[$k]['infoBottomRight'];}?></span>
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
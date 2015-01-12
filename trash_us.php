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
$targetFile='trash_us.php?menu_lev2=trash_us';
	  
include $pathBase.'header.php';

$itemType='us_project';
$masterItemType=getMasterItemType($itemType);
$simpleItemType=getSimpleItemType($itemType);

if (isset($_SESSION['current_project_id']))
{
  $showOnlyProjectLevel=true;  
  include $pathBase.'railway_display.php';    
    
  /* Dashboard settings */
  include $pathBase.'dashboard_settings.php';
  $firstColumnFunctionForHeaderStamp='displayStatusImageButton';

  $allowDelete=in_array('DEL_US',$_SESSION['user_actions']) || in_array('DEL_US',$_SESSION['user_local_actions']);
  switch ($_REQUEST['action'])
  {
	case 'delete_us':
	  $request->envoi("DELETE FROM kados_user_stories WHERE us_id=".$_REQUEST['us2delete']);
            $mcnx->num->kados_user_stories->remove(array('us_id'=>$_REQUEST['us2delete']));
	  $request->envoi("DELETE FROM kados_tasks WHERE us_id_fk=".$_REQUEST['us2delete']);
          $mcnx->num->kados_tasks->remove(array('us_id_fk'=>$_REQUEST['us2delete']));
	  $request->envoi("DELETE FROM kados_users_decks WHERE item_id_fk=".$_REQUEST['us2delete']);
          $mcnx->num->kados_users_decks->remove(array('item_id_fk'=>$_REQUEST['us2delete']));
          ?>
  	  <div class="MessageBox ConfirmationMessageBox"><?php echo $msg_object_deleted;?></div>           <script>$('.ConfirmationMessageBox').delay(<?php echo $delayMsg;?>).slideUp("slow");</script><?php	  
	break;
  
    case 'cancel_trash_us':
      $request->envoi("SELECT MAX(zpos_r) AS maxi FROM kados_user_stories WHERE active=1 AND us_project_id_fk=".$_SESSION['current_project_id']);
	  $maxZpos_r=$request->getObject();
      $request->envoi("SELECT MAX(zpos_s) AS maxi FROM kados_user_stories WHERE active=1 AND us_project_id_fk=".$_SESSION['current_project_id']);
	  $maxZpos_s=$request->getObject();
      $request->envoi("UPDATE kados_user_stories SET active=1,zpos_r=".((int)$maxZpos_r->maxi+1).",zpos_s=".((int)$maxZpos_s->maxi+1)." WHERE us_id=".$_REQUEST['us2reactivate']);
      $mcnx->num->kados_user_stories->update(array('us_id'=>$_REQUEST['us2reactivate']),array('$set'=>array('active'=>'1','zpos_r'=>((int)$maxZpos_r->maxi+1),'zpos_s'=>((int)$maxZpos_s->maxi+1))),array('multiple' => true));
	break;  
  }

  // Get US of trash
  $request=new requete("SELECT us_id,text,status AS header_stamp,color,business_value AS infoBottomLeft,
                               complexity AS infoBottomRight,us_number 
                        FROM kados_user_stories 
		 	  		    WHERE active=-1 AND us_project_id_fk=".$_SESSION['current_project_id'],$cnx->num);
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
		    <a href="<?php echo $targetFile.'&action=delete_us&us2delete='.$trashItemsArray[$k]['us_id'];?>" onClick="return confirm('<?php echo $msg_confirm_delete_us;?>');"><img src="<?php echo $pathImages.'app/delete.png';?>" border="0"></a> 
		    <a href="<?php echo $targetFile.'&action=cancel_trash_us&us2reactivate='.$trashItemsArray[$k]['us_id'];?>" onClick="return confirm('<?php echo $msg_confirm_activate_us;?>');"><img src="<?php echo $pathImages.'app/trash_out.png';?>" border="0"></a><?php
          }?>			
		  </span>
		  <span class="deck_postit_id">US<?php echo $trashItemsArray[$k]['us_number'];?></span>
		  <span class="deck_postit_header-right"><?php 
		    if (isset($firstColumnFunctionForHeaderStamp))
			{
		      call_user_func($firstColumnFunctionForHeaderStamp,array($trashItemsArray[$k]['us_id'],$trashItemsArray[$k]['header_stamp'],false,$boardFinalStatusTag,'')); 
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
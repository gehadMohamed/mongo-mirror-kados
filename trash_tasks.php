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
$targetFile='trash_tasks.php?menu_lev2=trash_tsk';
	  
include $pathBase.'header.php';

$itemType='tasks_sprint';
$masterItemType=getMasterItemType($itemType);
$simpleItemType=getSimpleItemType($itemType);

if (isset($_SESSION['current_project_id']))
{
  $showOnlyProjectLevel=true;  
  include $pathBase.'railway_display.php';    
    
  /* Dashboard settings */
  include $pathBase.'dashboard_settings.php';

  $allowDelete=in_array('DELTASK',$_SESSION['user_actions']) || in_array('DELTASK',$_SESSION['user_local_actions']);
  switch ($_REQUEST['action'])
  {
    case 'delete_task':
      $request->envoi("DELETE FROM kados_tasks WHERE task_id=".$_REQUEST['task2delete']);
        $mcnx->num->kados_tasks->remove(array('task_id'=>$_REQUEST['task2delete']));
        ?>
      <div class="MessageBox ConfirmationMessageBox"><?php echo $msg_object_deleted;?></div>           <script>$('.ConfirmationMessageBox').delay(<?php echo $delayMsg;?>).slideUp("slow");</script><?php	  
    break;
  
    case 'cancel_trash_task':
      // get sprint of the task
      $request->envoi("SELECT us_sprint_id_fk FROM kados_tasks,kados_user_stories WHERE us_id_fk=us_id AND task_id=".$_REQUEST['task2reactivate']);
      $request->getObject();
      $currentSprintId=$request->objet->us_sprint_id_fk;
      // get max zpos to set reactivated task zpos
      $request->envoi("SELECT MAX(kados_tasks.zpos) AS maxi FROM kados_tasks,kados_user_stories WHERE kados_tasks.active=1 AND us_id_fk=us_id AND us_project_id_fk=".$_SESSION['current_project_id']);
      $maxZpos=$request->getObject();
      $request->envoi("UPDATE kados_tasks SET active=1,zpos=".((int)$maxZpos->maxi+1)." WHERE task_id=".$_REQUEST['task2reactivate']);
      $mcnx->num->kados_tasks->update(array('task_id'=>$_REQUEST['task2reactivate']),array('$set'=>array('active'=>'1','zpos'=>((int)$maxZpos->maxi+1))),array('multiple' => true));
      // update burndown graph data
      if ($currentSprintId!=0)
      {    
        require_once $pathBase.'progress_recording.php';	  
      }  
    break;  
  }

  // Get Tasks of trash
  $request=new requete("SELECT task_id,kados_tasks.text,kados_tasks.color,
                               task_done AS infoBottomLeft,task_raf AS infoBottomRight,
							   task_load AS header_stamp,CONCAT(task_us_number,'.',task_number) AS display_task_number 
                        FROM kados_tasks,kados_user_stories 
		 	  		    WHERE kados_tasks.active=-1 AND us_id_fk=us_id AND us_project_id_fk=".$_SESSION['current_project_id'],$cnx->num);
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
		    <a href="<?php echo $targetFile.'&action=delete_task&task2delete='.$trashItemsArray[$k]['task_id'];?>" onClick="return confirm('<?php echo $msg_confirm_delete_task;?>');"><img src="<?php echo $pathImages.'app/delete.png';?>" border="0"></a> 
		    <a href="<?php echo $targetFile.'&action=cancel_trash_task&task2reactivate='.$trashItemsArray[$k]['task_id'];?>" onClick="return confirm('<?php echo $msg_confirm_activate_task;?>');"><img src="<?php echo $pathImages.'app/trash_out.png';?>" border="0"></a><?php
		  }?>	
		  </span>
		  <span class="deck_postit_id">T<?php echo $trashItemsArray[$k]['display_task_number'];?></span>
		  <span class="deck_postit_header-right"><?php 
		    if (isset($functionForHeaderStamp))
			{
		      call_user_func($functionForHeaderStamp,array($trashItemsArray[$k]['task_id'],$trashItemsArray[$k]['header_stamp'],false)); 
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
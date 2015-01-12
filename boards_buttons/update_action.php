<?php
/**
 * Form (popin) to update an item in a dashboard
 *
 * PHP versions 4 and 5
 *
 * @category Scripts
 * @package  DashBoardItemManagement
 * @author   Charles Santucci <charles@santucci.fr>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * */  
$pathBase='../';
$pathClasses=$pathBase.'libraries/classes/';
$pathImages='images/';

require_once $pathBase.'session_settings.php';

require_once $pathBase.'popin_includes.php';
$cnx=new connexion_db($pathBase);     $mcnx=new mconnexion_db($pathBase);
require_once $pathBase.'boards_settings/settings_'.$_REQUEST['item_type'].'.php';

/* set dashboard settings */
$simpleItemType=getSimpleItemType($_REQUEST['item_type']);
require_once $pathBase.'dashboard_settings.php';

$request=new requete("SELECT * FROM ".$tableData." WHERE ".$itemIdName."=".$_REQUEST['item_id'],$cnx->num);
$item=$request->getObject();
?>

<h3 class="popupTitle"><?php echo $legend_changing_f.' '.lcfirst($text_task);?></h3>

<!-- The preview: -->
<div id="previewNote" class="note <?php echo $item->color;?>" style="width:<?php echo $itemWidth;?>px;height:<?php echo $itemHeight;?>px;left:0;top:45px;z-index:1">
	    <div class="item-header">
		  <span class="postit_id bloc-header"><?php echo $objectTag.($item->action_issue_number.'.'.$item->action_number);?></span>
		  <span class="task_load"><?php echo $item->action_load;?></span>
		</div>
	<div class="text_body" style="width:<?php echo ($itemWidth-$itemWidthBodyMargin);?>px;height:<?php echo ($itemHeight-$itemHeightBodyMargin);?>px;"><?php echo $item->text;?></div>
	<div class="item-footer">
	  <span class="load_spent"><?php echo $item->action_done;?></span>
	  <span class="load2finish" id="preview_load2finish"><?php echo $item->action_raf;?></span>
  </div>		
	<span class="data"><?php echo $item->$itemIdName;?></span>
</div>

<?php include $pathBase.'note_color_choice.php';?>

<div id="noteData" style="margin-left:<?php echo ($itemWidth+30);?>px;"> <!-- Holds the form -->
<form action="<?php echo $targetFileAction;?><?php echo (isset($_REQUEST['blockId']) ? '&a='.md5(time()).'#Block'.$_REQUEST['blockId'] : '');?>" method="post" class="note-form" name="form_action" enctype="multipart/form-data">
<input type="hidden" name="action" value="update_action" />
<input type="hidden" name="item_id" id="note_id" value="<?php echo $item->$itemIdName;?>">
<label for="note-body"  class="required_field"><?php echo $text_action;?></label>
<textarea name="note-body" id="note-body" class="pr-text_body"  cols="40" rows="4"><?php echo $item->text;?></textarea>

<div class="clearleft"></div>
<span class="labelSpan length100"><?php echo $text_task_load;?></span>
<input type="text" <?php if ($item->status!=$boardInitialStatusTag) { echo 'readonly="readonly"';} else { echo 'onKeyUp="javascript:updateRAF();"';} ?> name="note-task_load" id="note-task_load" class="pr-task_load <?php if ($item->status!=$boardInitialStatusTag) { echo 'readonly_form_field';}?>" size="5" maxlength="5" value="<?php echo $item->action_load;?>" /> <?php echo lcfirst($text_hours);?>
<div class="clearleft"></div>
<span class="labelSpan length100"><?php echo $text_load_spent;?></span>
<input type="text" <?php if ($item->status==$boardInitialStatusTag) { echo 'readonly="readonly"';}?> name="note-load_spent" id="note-load_spent" class="pr-load_spent <?php if ($item->status==$boardInitialStatusTag) { echo 'readonly_form_field';}?>" size="5" maxlength="5" value="<?php echo $item->action_done;?>" /> <?php echo lcfirst($text_hours);?>
<div class="clearleft"></div>
<span class="labelSpan length100"><?php echo $text_load2finish;?></span>
<input type="text" <?php if ($item->status==$boardInitialStatusTag) { echo 'readonly="readonly"';}?> name="note-load2finish" id="note-load2finish" class="pr-load2finish <?php if ($item->status==$boardInitialStatusTag) { echo 'readonly_form_field';}?>" size="5" maxlength="5" value="<?php echo $item->action_raf;?>" /> <?php echo lcfirst($text_hours);?>
<div class="clearleft"></div>
<label for="note-link" ><?php echo $text_link;?></label>
<input id="note-link" type="text" size="43" name="note_link" value="<?php echo $item->action_link;?>">
<div class="clearleft"></div>

<br />
<?php 
 displayButton($button_submit,$pathImages.'submit.png','','action-submit');	?>

<input class="colorname" type="hidden" name="color" value="<?php echo $item->color;?>" />
</form>
</div>
<?php
/**
 * Form (popin) to add an item in a dashboard
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
$pathAppClasses=$pathBase.'classes/';

require_once $pathBase.'session_settings.php';

require_once $pathBase.'popin_includes.php';
require_once $pathAppClasses.'project.php';

$cnx=new connexion_db($pathBase);     $mcnx=new mconnexion_db($pathBase);

$currentProject=new project($pathBase,$_SESSION['current_project_id']);
$currentProject->getData();

require_once $pathBase.'boards_settings/settings_'.$_REQUEST['item_type'].'.php';
/* set dashboard settings */
$simpleItemType=getSimpleItemType($_REQUEST['item_type']);
require_once $pathBase.'dashboard_settings.php';

if (!isset($addHiddenInput))
{
  $addHiddenInput=false;
}

// Get US number
$request=new requete("SELECT us_number 
                      FROM kados_user_stories 
					  WHERE us_id=".$_REQUEST['object_id'],$cnx->num);
$request->getObject();

?>
<h3 class="popupTitle"><?php echo $legend_creation_f.' '.lcfirst($text_task).' '.$text_for.' US'.$request->objet->us_number;?></h3>

<?php 
// choice color is called, then default color can be set for the preview
// no problem to include the choice color since, its position is absolute
include $pathBase.'note_color_choice.php';?>
<!-- The preview: -->
<div id="previewNote" class="note <?php echo $defaultColor;?>" style="width:<?php echo $itemWidth;?>px;height:<?php echo $itemHeight;?>px;left:0;top:45px;z-index:1">
	    <div class="item-header">
		  <span class="task_load"></span>
		</div>
	<div class="text_body" style="width:<?php echo ($itemWidth-$itemWidthBodyMargin);?>px;height:<?php echo ($itemHeight-$itemHeightBodyMargin);?>px;"></div>
	<div class="item-footer">
	  <span class="load_spent"></span>
	  <span class="load2finish"></span>
  </div>		
</div>

<div id="noteData" style="margin-left:<?php echo ($itemWidth+30);?>px;"> <!-- Holds the form -->
<form action="<?php echo $targetFileAction;?><?php echo (isset($_REQUEST['blockId']) ? '&a='.md5(time()).'#Block'.$_REQUEST['blockId'] : '');?>" enctype="multipart/form-data" method="post" class="note-form" name="form_task">
<input type="hidden" name="action" value="add_task" />
<?php
  if ($addHiddenInput)
  {?>
    <input type="hidden" name="object_id" value="<?php echo $_REQUEST['object_id'];?>" /><?php
  }?>
<label for="note-body"  class="required_field"><?php echo $text_task;?></label>
<textarea name="note-body" id="note-body" class="pr-text_body"  cols="40" rows="4"></textarea>
<div class="clearleft"></div>
<label for="note-task_load"><?php echo $text_task_load;?></label>
<input type="text" name="note-task_load" id="note-task_load" class="pr-task_load" size="5" maxlength="5" value="" /> <?php echo lcfirst($text_hours);?>
<div class="clearleft"></div>
<!--
<span class="labelSpan length100"><?php echo $text_load_spent;?></span>
<input type="text" name="note-load_spent" id="note-load_spent" class="pr-load_spent" size="5" maxlength="5" value="" /> <?php echo lcfirst($text_hours);?>
<div class="clearleft"></div>
<span class="labelSpan length100"><?php echo $text_load2finish;?></span>
<input type="text" name="note-load2finish" id="note-load2finish" class="pr-load2finish" size="5" maxlength="5" value="" /> <?php echo lcfirst($text_hours);?>
<div class="clearleft"></div>!-->
<label for="note-link"><?php echo $text_link;?></label>
<input id="note-link" type="text" size="43" name="note_link" value="">
<div class="clearleft"></div>

<input class="colorname" type="hidden" name="color" value="<?php echo $defaultColor;?>" />
<input class="zindexvalue" type="hidden" name="zindex" value="" />
<br />
<?php 
 displayButton($button_submit,$pathImages.'submit.png','','task-submit');	?>

</form>
</div>
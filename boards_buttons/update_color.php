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
$pathImages=$pathBase.'images/';

require_once $pathBase.'session_settings.php';

require_once $pathBase.'popin_includes.php';
$cnx=new connexion_db($pathBase);     $mcnx=new mconnexion_db($pathBase);
require_once $pathBase.'boards_settings/settings_'.$_REQUEST['item_type'].'.php';

/* set dashboard settings */
$simpleItemType=getSimpleItemType($_REQUEST['item_type']);
require_once $pathBase.'dashboard_settings.php';
    $itemWidth=90;
    $itemHeight=60;
?>
<h3 class="popupTitle"><?php echo $legend_changing_f.' '.lcfirst($text_color_use);?></h3><?php 
// choice color is called, then default color can be set for the preview
// no problem to include the choice color since, its position is absolute
$topPosition=150;
include $pathBase.'note_color_choice.php';

$request=new requete("SELECT * FROM ".$tableData." WHERE ".$itemIdName."=".$_REQUEST['item_id'],$cnx->num);
$item=$request->getObject();
?>
<!-- The preview: -->
<div id="previewNote" class="note <?php echo $item->color;?>" style="width:<?php echo $itemWidth;?>px;height:<?php echo $itemHeight;?>px;left:0;top:45px;z-index:1">
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
<form action="<?php echo $targetFileAction;?><?php echo (isset($_REQUEST['blockId']) ? '&a='.md5(time()).'#Block'.$_REQUEST['blockId'] : '');?>" method="post" class="note-form" name="form_color_use" enctype="multipart/form-data">
<input type="hidden" name="action" value="update_color" />
<input type="hidden" name="item_id" id="note_id" value="<?php echo $item->$itemIdName;?>">

<label for="note-body" ><?php echo $text_meaning;?></label>
<input type="text" name="note-body" id="note-body" class="pr-text_body"  size="30" value="<?php echo $item->use_color_meaning;?>" />
<div class="clearleft"></div>
<label class="label"><?php echo $text_is_color_mandatory;?></label>
<input name="setlock" type="checkbox" <?php if ($item->use_color_lock) { echo 'checked="checked"'; }?>/>
<div class="clearleft"></div>
<label class="label"><?php echo $text_default_color;?> ?</label>
<input name="setdefault" type="checkbox" <?php if ($item->use_color_default) { echo 'checked="checked"'; }?>/>
<div class="clearleft"></div>

<input class="colorname" type="hidden" name="color" value="<?php echo $item->color;?>" />
<input class="zindexvalue" type="hidden" name="zindex" value="" />
<br />
<?php 
 displayButton($button_submit,$pathImages.'submit.png','','color-submit');	?>

</form>
</div>

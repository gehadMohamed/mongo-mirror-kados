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
require_once $pathBase.'boards_settings/settings_'.$_REQUEST['item_type'].'.php';
$cnx=new connexion_db($pathBase);     $mcnx=new mconnexion_db($pathBase);

/* set dashboard settings */
$simpleItemType=getSimpleItemType($_REQUEST['item_type']);
require_once $pathBase.'dashboard_settings.php';

$request=new requete("SELECT * FROM ".$tableData." WHERE ".$itemIdName."=".$_REQUEST['item_id'],$cnx->num);
$item=$request->getObject();
?>

<h3 class="popupTitle"><?php echo $legend_changing_f.' '.$text_user_story;?></h3>

<!-- The preview: -->
<div id="previewNote" class="note <?php echo $item->color;?>" style="width:<?php echo $itemWidth;?>px;height:<?php echo $itemHeight;?>px;left:0;top:45px;z-index:1">
	    <div class="item-header">
		  <span class="postit_id bloc-header"><?php echo $objectTag.$item->$itemNumberName;?></span>
		</div>
	<div class="text_body" style="width:<?php echo ($itemWidth-$itemWidthBodyMargin);?>px;height:<?php echo ($itemHeight-$itemHeightBodyMargin);?>px;"><?php echo $item->text;?></div>
	<div class="item-footer">
	  <span class="usbv postit_footer-left"><?php echo $item->business_value;?></span>
	  <span class="us_complexity postit_footer-right"><?php echo $item->complexity;?></span>
  </div>		
	<span class="data"><?php echo $item->$itemIdName;?></span>
</div>

<?php include $pathBase.'note_color_choice.php';?>

<div id="noteData" style="margin-left:<?php echo ($itemWidth+30);?>px;"> <!-- Holds the form -->
<form action="<?php echo $targetFileAction;?><?php echo (isset($_REQUEST['blockId']) ? '&a='.md5(time()).'#Block'.$_REQUEST['blockId'] : '');?>" method="post" class="note-form" name="form_us" enctype="multipart/form-data">
<input type="hidden" name="action" value="update_us" />
<input type="hidden" name="item_id" id="note_id" value="<?php echo $item->$itemIdName;?>">
<label for="note-body" class="required_field"><?php echo $text_user_story;?> <img src="<?php echo $pathImages;?>app/infos.png" title="<?php echo $text_us_template_text;?>" /></label>
<textarea name="note-body" id="note-body" class="pr-text_body" cols="40" rows="6"><?php echo $item->text;?></textarea><div class="clearleft"></div>
<label for="note-link"><?php echo $text_link;?></label>
<input id="note-link" type="text" size="43" name="note_link" value="<?php echo $item->us_link;?>">
<div class="clearleft"></div>
<br />
<?php 
 displayButton($button_submit,$pathImages.'submit.png','','us-submit');	?>

<br /><br /><br />
<input class="colorname" type="hidden" name="color" value="<?php echo $item->color;?>" />
</form>
</div>
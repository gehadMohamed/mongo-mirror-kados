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

require_once $pathBase.'session_settings.php';
require_once $pathBase.'popin_includes.php';
require_once $pathBase.'boards_settings/settings_'.$_GET['item_type'].'.php';

$cnx=new connexion_db($pathBase);     $mcnx=new mconnexion_db($pathBase);

/* set dashboard settings */
$simpleItemType=getSimpleItemType($_GET['item_type']);
require_once $pathBase.'dashboard_settings.php';

if (!isset($addHiddenInput))
{
  $addHiddenInput=false;
}
?>
<h3 class="popupTitle"><?php echo $legend_creation_f.' '.$text_user_story;?></h3>

<?php 
// choice color is called, then default color can be set for the preview
// no problem to include the choice color since, its position is absolute
include $pathBase.'note_color_choice.php';?>
<!-- The preview: -->
<div id="previewNote" class="note <?php echo $defaultColor;?>" style="width:<?php echo $itemWidth;?>px;height:<?php echo $itemHeight;?>px;left:0;top:45px;z-index:1">
	    <div class="item-header">
		</div>
	<div class="text_body" style="width:<?php echo ($itemWidth-$itemWidthBodyMargin);?>px;height:<?php echo ($itemHeight-$itemHeightBodyMargin);?>px;"></div>
	<div class="item-footer">
	  <span class="usbv postit_footer-left"></span>
	  <span class="us_complexity postit_footer-right"></span>
  </div>		
</div>


<div id="noteData" style="margin-left:<?php echo ($itemWidth+30);?>px;"> <!-- Holds the form -->
<form action="<?php echo $targetFileAction;?><?php echo (isset($_REQUEST['us_from'])? '&us_from='.$_REQUEST['us_from']: '');?><?php echo (isset($_REQUEST['blockId']) ? '&a='.md5(time()).'#Block'.$_REQUEST['blockId'] : '');?>" method="post" enctype="multipart/form-data" class="note-form" name="form_us">
<input type="hidden" name="action" value="add_us" /><?php
  if ($addHiddenInput)
  {?>
    <input type="hidden" name="object_id" value="<?php echo $_REQUEST['object_id'];?>" /><?php
  }?>
<label for="note-body" class="required_field100"><?php echo $text_user_story;?> <img src="<?php echo $pathImages;?>app/infos.png" title="<?php echo $text_us_template_text;?>" /></label>
<textarea name="note-body" id="note-body" class="pr-text_body" cols="40" rows="6"></textarea><div class="clearleft"></div>
<label for="note-link"><?php echo $text_link;?></label>
<input id="note-link" type="text" size="43" name="note_link" value="">
<div class="clearleft"></div>

<input class="colorname" type="hidden" name="color" value="<?php echo $defaultColor;?>" />
<input class="zindexvalue" type="hidden" name="zindex" value="" />
<br />
<?php 
 displayButton($button_submit,$pathImages.'submit.png','','us-submit');	?>
<br /><br /><br />
</form>
</div>
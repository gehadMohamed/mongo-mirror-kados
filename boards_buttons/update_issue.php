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

$text_object='text_'.$_REQUEST['topic'];

$request=new requete("SELECT us_id,text,us_number FROM kados_user_stories 
                      WHERE status!='DONE' AND active=1 
					    AND us_project_id_fk=".$_SESSION['current_project_id'],$cnx->num);
$listUs=$request->getArrayFields();
?>
<h3 class="popupTitle"><?php echo $legend_changing_m.' '.lcfirst($$text_object);?></h3>

<!-- The preview: -->
<div id="previewNote" class="note <?php echo $item->color;?>" style="width:<?php echo $itemWidth;?>px;height:<?php echo $itemHeight;?>px;left:0;top:45px;z-index:1">
	    <div class="item-header">
		  <span class="postit_id bloc-header"><?php echo $objectTag.$item->$itemNumberName;?></span>
		</div>
	<div class="text_body" style="width:<?php echo ($itemWidth-$itemWidthBodyMargin);?>px;height:<?php echo ($itemHeight-$itemHeightBodyMargin);?>px;"><?php echo $item->text;?></div>
	<div class="item-footer">
	  <span class="usbv postit_footer-left"><?php displayImpactImage($item->impact);?></span>
	  <span class="issue_probability postit_footer-right"><?php displayProbability($item->probability);?></span>
  </div>		
	<span class="data"><?php echo $item->$itemIdName;?></span>
</div>

<?php include $pathBase.'note_color_choice.php';?>

<div id="noteData" style="margin-left:<?php echo ($itemWidth+30);?>px;"> <!-- Holds the form -->
<form action="<?php echo $targetFileAction;?><?php echo (isset($_REQUEST['blockId']) ? '&a='.md5(time()).'#Block'.$_REQUEST['blockId'] : '');?>" method="post" class="note-form" name="form_issue" enctype="multipart/form-data">
<input type="hidden" name="action" value="update_issue" />
<input type="hidden" name="item_id" id="note_id" value="<?php echo $item->$itemIdName;?>">
<input type="hidden" class="topic" name="issue_type" value="<?php echo $_REQUEST['topic'];?>" /> 
<label for="note-body" class="required_field"><?php echo $$text_object;?></label>
<textarea name="note-body" id="note-body" class="pr-text_body" cols="40" rows="6"><?php echo $item->text;?></textarea><div class="clearleft"></div>

<label for="linked_us" class="length100"><?php echo $text_linked_user_story;?></label>
<select name="linked_us" id="linked_us">
  <option value="0"></option><?php
  for ($i=0;$i<count($listUs);$i++)
  {?>
    <option value="<?php echo $listUs[$i]['us_id'];?>" <?php if ($listUs[$i]['us_id']==$item->issue_us_id_fk) { echo 'selected="selected"';} ?>>US<?php echo $listUs[$i]['us_number'].':'.substr($listUs[$i]['text'],0,40);?></option><?php
  }?>
</select><div class="clearleft"></div><?php

if ($_REQUEST['topic']=='risk')
{?>
  <label for="pr-issue_probability"><?php echo $text_probability;?></label>
  <input class="pr-issue_probability" type="text" size="3" maxlength="3" id="probability" name="probability" value="<?php echo $item->probability;?>"><?php
}
else
{?>
  <input type="hidden" name="probability" value="100" />  <?php
}?>
<label for="note-link"><?php echo $text_link;?></label>
<input id="note-link" type="text" size="43" name="note_link" value="<?php echo $item->issue_link;?>">
<div class="clearleft"></div>
<br />
<?php 
 displayButton($button_submit,$pathImages.'submit.png','','issue-submit');	?>

<br /><br /><br />
<input class="colorname" type="hidden" name="color" value="<?php echo $item->color;?>" />
</form>
</div>
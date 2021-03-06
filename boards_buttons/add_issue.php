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
require_once $pathBase.'boards_settings/settings_'.$_REQUEST['item_type'].'.php';
$cnx=new connexion_db($pathBase);     $mcnx=new mconnexion_db($pathBase);

/* set dashboard settings */
$simpleItemType=getSimpleItemType($_REQUEST['item_type']);
require_once $pathBase.'dashboard_settings.php';

if (!isset($addHiddenInput))
{
  $addHiddenInput=false;
}
$text_object='text_'.$_REQUEST['topic'];

$request=new requete("SELECT us_id,text,us_number FROM kados_user_stories 
                      WHERE status!='DONE' AND active=1 
					    AND us_project_id_fk=".$_SESSION['current_project_id'],$cnx->num);
$listUs=$request->getArrayFields();
?>
<h3 class="popupTitle"><?php echo $legend_creation_m.' '.lcfirst($$text_object);?></h3>

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
	  <span class="usbv postit_footer-left"><?php displayImpactImage(0);?></span>
	  <span class="issue_probability postit_footer-right"><?php $_REQUEST['topic']=='problem' ? displayProbability(100) : displayProbability(50);?></span>
  </div>		
</div>

<div id="noteData" style="margin-left:<?php echo ($itemWidth+30);?>px;"> <!-- Holds the form -->
<form action="<?php echo $targetFileAction;?><?php echo (isset($_REQUEST['us_from'])? '&us_from='.$_REQUEST['us_from']: '');?><?php echo (isset($_REQUEST['blockId']) ? '&a='.md5(time()).'#Block'.$_REQUEST['blockId'] : '');?>" method="post" class="note-form" enctype="multipart/form-data" name="form_issue">
<input type="hidden" name="action" value="add_issue" /><?php
  if ($addHiddenInput)
  {?>
    <input type="hidden" name="object_id" value="<?php echo $_REQUEST['object_id'];?>" /><?php
  }?>

<input type="hidden" class="topic" name="issue_type" value="<?php echo $_REQUEST['topic'];?>" /> 
<label for="note-body" class="required_field100"><?php echo $$text_object;?></label>
<textarea name="note-body" id="note-body" class="pr-text_body" cols="40" rows="6"></textarea><div class="clearleft"></div>

<label for="linked_us" class="length100"><?php echo $text_linked_user_story;?></label>
<select name="linked_us" id="linked_us">
  <option value="0"></option><?php
  for ($i=0;$i<count($listUs);$i++)
  {?>
    <option value="<?php echo $listUs[$i]['us_id'];?>" >US<?php echo $listUs[$i]['us_number'].':'.substr($listUs[$i]['text'],0,40);?></option><?php
  }?>
</select><div class="clearleft"></div><?php

if ($_REQUEST['topic']=='risk')
{?>
  <label for="pr-issue_probability"><?php echo $text_probability;?></label>
  <input class="pr-issue_probability" type="text" size="3" maxlength="3" id="probability" name="probability" value="50"><?php
}
else
{?>
  <input type="hidden" name="probability" value="100" />  <?php
}?>
<label for="note-link"><?php echo $text_link;?></label>
<input id="note-link" type="text" size="43" name="note_link" value="">
<div class="clearleft"></div>

<input class="colorname" type="hidden" name="color" value="<?php echo $defaultColor;?>" />
<input class="zindexvalue" type="hidden" name="zindex" value="" />
<br />
<?php 
 displayButton($button_submit,$pathImages.'submit.png','','issue-submit');	?>
<br /><br /><br />
</form>
</div>
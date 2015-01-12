<?php
/**
 * Form (popin) to add a release to a project in a dashboard
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
$targetFile='project_cockpit.php?menu_lev2=cockpit';

require_once $pathBase.'session_settings.php';

require_once $pathBase.'popin_includes.php';
//require_once $pathBase.'boards_settings/settings_us_project.php';
$cnx=new connexion_db($pathBase);     $mcnx=new mconnexion_db($pathBase);

?>
<h3 class="popupTitle"><?php echo $legend_creation_f.' '.lcfirst($text_feature);?></h3>

<div> <!-- Holds the form -->
<form action="<?php echo $targetFile;?>" method="post" name="form_feature" enctype="multipart/form-data">
<input type="hidden" name="action" value="add_feature" />
<input type="hidden" name="feature2add" id="feature2add" value="0" />
 <fieldset class="fieldset">
   <label class="label required_field100"><?php echo $text_feature_short_label;?></label>
   <input class="std_form_field" name="form_item_feature_short_label" id="form_item_feature_short_label" type="text" size="5" maxlength="5" value="" /><div class="clearleft"></div>
   <label class="label required_field100"><?php echo $text_feature;?></label>
   <input class="std_form_field" name="form_item_feature_name" id="form_item_feature_name" type="text" size="15"  maxlength="15" value="" /><div class="clearleft"></div>
   <label class="label length100"><?php echo $text_description;?></label>
   <textarea name="form_item_feature_description" class="std_form_field" cols="30" rows="4"></textarea><div class="clearleft"></div>
 
   <br />     
<?php 
 displayButton($button_submit,$pathImages.'submit.png','','feature-submit');	?>
</fieldset>
</form>
</div>

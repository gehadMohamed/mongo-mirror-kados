<?php
/**
 * Form (popin) to update a feature to a project in a dashboard
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
$pathFunctions=$pathBase.'libraries/functions/';  
$targetFile='project_cockpit.php?menu_lev2=cockpit';

require_once $pathBase.'session_settings.php';

require_once $pathBase.'popin_includes.php';
require_once $pathFunctions.'fct_date_hour.php';
$cnx=new connexion_db($pathBase);     $mcnx=new mconnexion_db($pathBase);

// Get feature data & count US in the feature
$request=new requete("SELECT * FROM kados_features WHERE feature_id=".$_REQUEST['feature_id'],$cnx->num);
$featureData=$request->getObject();
?>
<h3 class="popupTitle"><?php echo $legend_changing_f.' '.lcfirst($text_feature);?></h3>

<div> <!-- Holds the form -->
<form action="<?php echo $targetFile;?>" method="post" name="form_feature" enctype="multipart/form-data">
<input type="hidden" name="action" value="update_feature" />
<input type="hidden" name="feature2update" id="feature2update" value="<?php echo $_REQUEST['feature_id'];?>" />
 <fieldset class="fieldset">
   <label class="label required_field100"><?php echo $text_feature_short_label;?></label>
   <input class="std_form_field" name="form_item_feature_short_label" id="form_item_feature_short_label" type="text" size="5" maxlength="5" value="<?php echo $featureData->feature_short_label;?>" /><div class="clearleft"></div>
   <label class="label required_field100"><?php echo $text_feature;?></label>
   <input class="std_form_field" name="form_item_feature_name" id="form_item_feature_name" type="text" size="15"  maxlength="15" value="<?php echo $featureData->feature_name;?>" /><div class="clearleft"></div>
   <label class="label length100"><?php echo $text_description;?></label>
   <textarea name="form_item_feature_description" class="std_form_field" cols="30" rows="4"><?php echo $featureData->feature_description;?></textarea><div class="clearleft"></div>
  
    <br />     
<?php 
 displayButton($button_submit,$pathImages.'submit.png','','feature-submit');	?>

</fieldset>
</form>
</div>

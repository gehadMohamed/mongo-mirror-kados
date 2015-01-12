<?php
/**
 * Form (popin) to update a release to a project in a dashboard
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

// Get release data & count US in the release
$request=new requete("SELECT * FROM kados_releases WHERE release_id=".$_REQUEST['release_id'],$cnx->num);
$releaseData=$request->getObject();

// Check if that release has release checklist
$request->envoi('SELECT * FROM kados_activities WHERE activity_release_id_fk='.$_REQUEST['release_id']);
$request->calc_nb_elt();
$useChecklist=$request->nb_elt;
?>
<h3 class="popupTitle"><?php echo $legend_changing_f.' '.lcfirst($text_release);?></h3>

<div> <!-- Holds the form -->
<form action="<?php echo $targetFile;?>" method="post" name="form_release" enctype="multipart/form-data">
<input type="hidden" name="action" value="update_release" />
<input type="hidden" name="release_2update_id" id="release_2update_id" value="<?php echo $_REQUEST['release_id'];?>" />
 <fieldset class="fieldset">
   <label class="label required_field100"><?php echo $text_release;?></label>
   <input class="std_form_field" name="form_item_release" id="form_item_release" type="text" size="15" value="<?php echo $releaseData->release_name;?>" /><div class="clearleft"></div>
  
   <label class="label required_field100" ><?php echo $text_due_date;?></label>
   <input class="date_form_field" readonly="readonly" name="form_item_due_date" id="form_item_due_date" value="<?php echo convert_date($releaseData->release_due_date);?>" type="text" size="10"/>
   <script>
     $("#form_item_due_date").datepicker({dateFormat:"dd/mm/yy"});
   </script>   <div class="clearleft"></div>      <?php

 if (getParameter('USECHL',$cnx->num)==1)
 {?>     
   <label class="label required_field100" ><?php echo $text_use_checklist;?></label> <?php 
   if ($useChecklist) 
   {?>
     <input class="input_no_class" size="4" readonly="readonly"  value="<?php echo $text_yes;?>" /><?php
   }
   else
   {?>
     <input name="form_item_checklist" type="checkbox" /><?php
   }	 ?>
   <div class="clearleft"></div>       <?php
 }?>
   <br />     
<?php 
 displayButton($button_submit,$pathImages.'submit.png','','release-submit');	?>

</fieldset>
</form>
</div>

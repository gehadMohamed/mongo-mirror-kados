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

$clauseOrder=' ORDER BY user_name';	
$request=new requete("SELECT user_login,user_firstname,user_name FROM framework_users,framework_status WHERE user_status_id_fk=status_id AND status_tag='ACTIVE' AND status_target_object='USR'".$clauseOrder,$cnx->num);
$tableResources=$request->getArrayFields();
?>
<h3 class="popupTitle"><?php echo $legend_creation_f.' '.lcfirst($text_release);?></h3>

<div> <!-- Holds the form -->
<form action="<?php echo $targetFile;?>" method="post" name="form_release" enctype="multipart/form-data">
<input type="hidden" name="action" value="add_release" />
<input type="hidden" name="release_2update_id" id="release_2update_id" value="0" />
 <fieldset class="fieldset">
   <label class="label required_field100"><?php echo $text_release;?></label>
   <input class="std_form_field" name="form_item_release" id="form_item_release" type="text" size="15" value="" /><div class="clearleft"></div>
   
   <label class="label required_field100" ><?php echo $text_due_date;?></label>
   <input class="date_form_field" readonly="readonly" name="form_item_due_date" id="form_item_due_date" type="text" size="10"/>
   <script>
     $("#form_item_due_date").datepicker({dateFormat:"dd/mm/yy"});
   </script>   <div class="clearleft"></div>      <?php
   
   if (getParameter('USECHL',$cnx->num)==1)
   {?>   
     <label class="label required_field100" ><?php echo $text_use_checklist;?></label>   
     <input name="form_item_checklist" type="checkbox"/>
     <div class="clearleft"></div>      <?php
   }?>	 
   <br />     
<?php 
 displayButton($button_submit,$pathImages.'submit.png','','release-submit');	?>
</fieldset>
</form>
</div>

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
$pathFunctions=$pathBase.'libraries/functions/';  
$pathAppClasses=$pathBase.'classes/';

$pathImages='images/';
$targetFile='project_cockpit.php?menu_lev2=cockpit';

require_once $pathBase.'session_settings.php';

require_once $pathBase.'popin_includes.php';
require_once $pathFunctions.'fct_date_hour.php';
require_once $pathAppClasses.'project.php';

$cnx=new connexion_db($pathBase);     $mcnx=new mconnexion_db($pathBase);

$clauseOrder=' ORDER BY user_name';	
$request=new requete("SELECT user_login,user_firstname,user_name FROM framework_users,framework_status WHERE user_status_id_fk=status_id AND status_tag='ACTIVE' AND status_target_object='USR'".$clauseOrder,$cnx->num);
$tableResources=$request->getArrayFields();

$currentProject=new project($pathBase,$_SESSION['current_project_id']);
$currentProject->getData();

require $pathBase.'external_connection_get_releases.php';

?>
<h3 class="popupTitle"><?php echo $legend_adding_f.' '.lcfirst($text_release);?></h3>

   <script>
       var dueDateList=new Array();<?php
      for ($i=0;$i<count($releasesArray);$i++)
      {
	    if (!in_array($releasesArray[$i]['rel_id'],$releasesList))
	    { ?>
		  dueDateList[<?php echo $releasesArray[$i]['rel_id'];?>]=new Array();
          dueDateList[<?php echo $releasesArray[$i]['rel_id'];?>]['date']='<?php echo convert_date($releasesArray[$i]['rel_due_date']);?>';
	      dueDateList[<?php echo $releasesArray[$i]['rel_id'];?>]['name']='<?php echo $releasesArray[$i]['rel_name'];?>';<?php
	    }
      }?>
   </script> 
<div> <!-- Holds the form -->
<form action="<?php echo $targetFile;?>" method="post" name="form_ext_release" enctype="multipart/form-data">
<input type="hidden" name="action" value="add_release_ext" />
<input type="hidden" name="form_item_connection_id" value="<?php echo $currentProject->externalProjectConnexId;?>" />
<input type="hidden" name="form_item_release_name" id="form_item_release_name" value="" />
 <fieldset class="fieldset">
   <label class="label required_field100"><?php echo $text_release;?></label>
         <select name="form_item_release" id="form_item_release" class="std_form_field_liste" onChange="javascript:updateDueDate();"><?php
           for ($i=0;$i<count($releasesArray);$i++)
           {
		     if (!in_array($releasesArray[$i]['rel_id'],$releasesList))
			 {?>
               <option value="<?php echo $releasesArray[$i]['rel_id'];?>" ><?php echo $releasesArray[$i]['rel_name'];?></option><?php
			 } 
           }?>
         </select><div class="clearleft"></div>	 

   <label class="label required_field100" ><?php echo $text_due_date;?></label>
   <input class="date_form_field" readonly="readonly" name="form_item_due_date" id="form_item_due_date" type="text" size="10"/>
   <div class="clearleft"></div>      
   <script>updateDueDate();</script>
   <div class="clearleft"></div>	 <?php
   
   if (getParameter('USECHL',$cnx->num)==1)
   {?>
     <label class="label required_field100" ><?php echo $text_use_checklist;?></label>   
     <input name="form_item_checklist" type="checkbox"/>
     <div class="clearleft"></div>      <?php
   }?>
      <br />     
<?php 
 displayButton($button_submit,$pathImages.'submit.png','','release-ext-submit');	?>
</fieldset>
</form>
</div>

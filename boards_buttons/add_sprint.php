<?php
/**
 * Form (popin) to add a sprint to a release in a dashboard
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
?>
<h3 class="popupTitle"><?php echo $legend_creation_m.' '.lcfirst($text_sprint);?></h3>

<div> <!-- Holds the form -->
<form action="<?php echo $targetFile;?>" method="post" name="form_sprint" enctype="multipart/form-data">
<input type="hidden" name="action" value="add_sprint" />
<input type="hidden" name="sprint_2update_id" id="sprint_2update_id" value="0" />
<input type="hidden" name="release_add_sprint" id="release_add_sprint" value="<?php echo $_REQUEST['release_add_sprint'];?>" />
<input type="hidden" id="form_hidden_release_end_date" value="<?php echo $_REQUEST['release_end_date'];?>" />

 <fieldset class="fieldset">
   <label class="label required_field50"><?php echo $text_sprint;?></label>
   <input class="std_form_field" name="form_item_sprint" id="form_item_sprint" type="text" size="15" value="" /><div class="clearleft"></div>
   <label class="label required_field50" ><?php echo $text_start_date;?></label>
   <input class="date_form_field" readonly="readonly" name="form_item_start_date" id="form_item_start_date" type="text" size="10"/>
   <script>
     $("#form_item_start_date").datepicker({dateFormat:"dd/mm/yy"});
   </script>   <div class="clearleft"></div>    
   <label class="label required_field50" ><?php echo $text_end_date;?></label>
   <input class="date_form_field" readonly="readonly" name="form_item_end_date" id="form_item_end_date" type="text" size="10"/>
   <script>
     $("#form_item_end_date").datepicker({dateFormat:"dd/mm/yy"});
   </script>   <div class="clearleft"></div>       
   <br />     
<?php 
 displayButton($button_submit,$pathImages.'submit.png','','sprint-submit');	?>
 </fieldset>
</form>
</div>

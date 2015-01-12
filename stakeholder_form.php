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
 * */    ?>

<div> <!-- Holds the form -->
      <form action="<?php echo $targetFile;?>&action=submit_add_stakeholder" method="post" enctype="multipart/form-data" name="form_add_stakeholder">
       <fieldset class="fieldset">
         <label class="label required_field50" ><?php echo $text_stakeholder;?></label><?php
         if ($userModeChoice=='listbox')
	 {?>
           <select name="form_item_resource_lb" class="std_form_field_liste" ><?php
             for ($i=0;$i<count($table_resources);$i++)
             {?>
               <option value="<?php echo $table_resources[$i]['user_login'];?>" ><?php echo $table_resources[$i]['user_firstname'].' '.$table_resources[$i]['user_name'];?></option><?php
             }?>
            </select><?php
	 }
	 else
	 {?>
	   <input name="form_item_resource" id="searchUser" class="std_form_field" type="text" size="35"/>
	   <input name="form_item_resource_search" id="searchUserId" type="hidden"/><?php
	 }?>
	 <div class="clearleft"></div>
        <label class="label length50" ><?php echo $text_release;?></label>
          <select name="form_item_release" class="std_form_field_liste" >
           <option value="0"></option><?php
           for ($i=0;$i<count($releaseList);$i++)
           {?>
           <option value="<?php echo $releaseList[$i]['release_id'];?>" ><?php echo $releaseList[$i]['release_name'];?></option><?php
           }?>
         </select>	 <div class="clearleft"></div>
 <br />     
<?php 
 displayButton($button_submit,$pathImages.'submit.png','','stakeholder-submit');	?>
</fieldset>
</form>
</div>
<script>document.form_add_stakeholder.form_item_resource.focus();</script>

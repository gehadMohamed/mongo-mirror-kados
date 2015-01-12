<?php
/**
 * form to create an external connection
 *
 * PHP versions 4 and 5
 *
 * @category Scripts
 * @package  Administration:ExternalConnections
 * @author   Charles Santucci <charles@santucci.fr>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * */?>
      <form action="<?php echo $targetFile;?>&action=submit_<?php echo $_REQUEST['action'];?>" method="post" enctype="multipart/form-data" name="form_connection">
       <fieldset class="fieldset">
       <legend class="legend"><?php echo $form_legend;?></legend>
	     <input type="hidden" name="connection_id" value="<?php echo $connectionData->connection_id;?>" />

         <label class="label required_field300"  ><?php echo $text_name;?></label>
         <input class="std_form_field" name="form_item_connection_name"  type="text" size="40" maxlength="100" value="<?php echo $connectionData->connection_name;?>"/><div class="clearleft"></div>
		 
         <label class="label required_field300"><?php echo $text_database_type;?></label>	   
         <select name="form_item_database_type" class="std_form_field_liste" >
           <option  value="mysql" >MySQL</option>
         </select><div class="clearleft"></div>	 
		 
         <label class="label required_field300"  ><?php echo $text_host;?></label>
         <input class="std_form_field" name="form_item_connection_host"  type="text" size="40" maxlength="100" value="<?php echo $connectionData->connection_host;?>"/><div class="clearleft"></div>
         <label class="label length300"  ><?php echo $text_port;?></label>
         <input class="std_form_field" name="form_item_connection_port"  type="text" size="10" maxlength="15" value="<?php echo $connectionData->connection_port;?>"/><div class="clearleft"></div>
         <label class="label required_field300"  ><?php echo $text_dbname;?></label>
         <input class="std_form_field" name="form_item_connection_dbname"  type="text" size="40" maxlength="100" value="<?php echo $connectionData->connection_dbname;?>"/><div class="clearleft"></div>
         <label class="label required_field300"  ><?php echo $text_user;?></label>
         <input class="std_form_field" name="form_item_connection_user"  type="text" size="40" maxlength="100" value="<?php echo $connectionData->connection_user;?>"/><div class="clearleft"></div>
         <label class="label required_field300"  ><?php echo $text_password;?></label>
         <input class="std_form_field" name="form_item_connection_password"  type="text" size="40" maxlength="100" value="<?php echo $connectionData->connection_password;?>"/><div class="clearleft"></div>
         <label class="label required_field300"  ><?php echo $text_project_table;?></label>
         <input class="std_form_field" name="form_item_connection_project_table"  type="text" size="40" maxlength="100" value="<?php echo $connectionData->connection_table_projects;?>"/><div class="clearleft"></div>
         <label class="label required_field300"  ><?php echo $text_project_id_field;?></label>
         <input class="std_form_field" name="form_item_connection_project_id_field"  type="text" size="40" maxlength="100" value="<?php echo $connectionData->connection_project_id_field;?>"/><div class="clearleft"></div>
         <label class="label required_field300"  ><?php echo $text_project_name_field;?></label>
         <input class="std_form_field" name="form_item_connection_project_name_field"  type="text" size="40" maxlength="100" value="<?php echo $connectionData->connection_project_name_field;?>"/><div class="clearleft"></div>
         <label class="label length300"  ><?php echo $text_project_filter_clause;?></label>
         <textarea class="std_form_field" name="form_item_connection_project_filter_clause" cols="60" rows="5"><?php echo $connectionData->connection_project_filter_clause;?></textarea><div class="clearleft"></div>
         <label class="label required_field300"  ><?php echo $text_release_table;?></label>
         <input class="std_form_field" name="form_item_connection_release_table"  type="text" size="40" maxlength="100" value="<?php echo $connectionData->connection_table_releases;?>"/><div class="clearleft"></div>
         <label class="label required_field300"  ><?php echo $text_release_id_field;?></label>
         <input class="std_form_field" name="form_item_connection_release_id_field"  type="text" size="40" maxlength="100" value="<?php echo $connectionData->connection_release_id_field;?>"/><div class="clearleft"></div>
         <label class="label required_field300"  ><?php echo $text_release_name_field;?></label>
         <input class="std_form_field" name="form_item_connection_release_name_field"  type="text" size="40" maxlength="100" value="<?php echo $connectionData->connection_release_name_field;?>"/><div class="clearleft"></div>
         <label class="label required_field300"  ><?php echo $text_release_due_date_field;?></label>
         <input class="std_form_field" name="form_item_connection_release_due_date_field"  type="text" size="40" maxlength="100" value="<?php echo $connectionData->connection_release_due_date_field;?>"/><div class="clearleft"></div>

         <label class="label length300"  ><?php echo $text_release_due_date_request;?></label>
         <textarea class="std_form_field" name="form_item_connection_release_due_date_request" cols="60" rows="5"><?php echo $connectionData->connection_release_due_date_request;?></textarea><div class="clearleft"></div>
		 
         <label class="label length300"  ><?php echo $text_release_filter_clause;?></label>
         <textarea class="std_form_field" name="form_item_connection_release_filter_clause" cols="60" rows="5"><?php echo $connectionData->connection_release_filter_clause;?></textarea><div class="clearleft"></div>
		 
	     <label class="label length300" ><?php echo $text_status;?></label>
         <input type="hidden" name="form_item_connection_status" value="<?php echo $connectionData->connection_status_id_fk;?>" />
         <input class="readonly_form_field" readonly="readonly" type="text" size="20" value="<?php echo $connectionData->status_value;?>"/><div class="clearleft"></div>
   	 
        <br /> 
		<span class="label soft_grey bordertop borderbottom" style="padding:3px;margin-left:15px;" ><?php echo $text_link_to_project_in_release_table;?></span><div class="clearleft"></div>
		<br />
         <label class="label length300"  ><?php echo $text_release_to_project_field;?></label>
         <input class="std_form_field" name="form_item_connection_release_to_project_field"  type="text" size="40" maxlength="100" value="<?php echo $connectionData->connection_release_to_project_field;?>"/><div class="clearleft"></div>
		
        <br />		 
		<span class="label soft_grey bordertop borderbottom" style="padding:3px;margin-left:15px;" ><?php echo $text_link_to_project_in_other_table;?></span><div class="clearleft"></div>
		<br />
		<label class="label length300"  ><?php echo $text_projet_release_table;?></label>
         <input class="std_form_field" name="form_item_connection_projet_release_table"  type="text" size="40" maxlength="100" value="<?php echo $connectionData->connection_table_release_project;?>"/><div class="clearleft"></div>
         <label class="label length300"  ><?php echo $text_foreign_key_project_field;?></label>
         <input class="std_form_field" name="form_item_connection_foreign_key_project_field"  type="text" size="40" maxlength="100" value="<?php echo $connectionData->connection_foreign_key_project_field;?>"/><div class="clearleft"></div>
         <label class="label length300"  ><?php echo $text_foreign_key_release_field;?></label>
         <input class="std_form_field" name="form_item_connection_foreign_key_release_field"  type="text" size="40" maxlength="100" value="<?php echo $connectionData->connection_foreign_key_release_field;?>"/><div class="clearleft"></div>
         <br />
         <div style="margin-left:15px;"><?php
           displayButton($button_submit,$pathImages.'submit.png','javascript:CheckFormConnection()');	
           displayButton($button_cancel,$pathImages.'cancel.png',$targetFile);	?>
		 </div>  		 
       </fieldset><div class="clearleft"></div>
      </form> 

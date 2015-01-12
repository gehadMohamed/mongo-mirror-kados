<?php
/**
 * form to create a project
 *
 * PHP versions 4 and 5
 *
 * @category Scripts
 * @package  Project_Mngt:projects
 * @author   Charles Santucci <charles@santucci.fr>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * */

      require_once $pathBase.'templates_projects_list.php'; 
	  
      $clauseOrder=' ORDER BY user_name';	   
      if ($global_settings_user_name_sorting_mode=='SFN')
      {
	$clauseOrder=' ORDER BY user_firstname'; 
      }
      $request=new requete("SELECT user_login,user_firstname,user_name FROM framework_users,framework_status WHERE user_status_id_fk=status_id AND status_tag='ACTIVE' AND status_target_object='USR'".$clauseOrder,$cnx->num);
      $tableResources=$request->getArrayFields();
      
      // Set default mode : listbox
      $userModeChoice='listbox';
      // if to many users, user search with auto-complete
      if (count($tableResources)>getParameter('NBLIST',$cnx->num))
      {
        $userModeChoice='search';
      }
      $user=new appUser($projectData->project_creator);
      ?>
      <form action="<?php echo $projectTargetFile;?>?menu_lev1=cockpit&action=submit_<?php echo $_REQUEST['action'];?>" method="post" enctype="multipart/form-data" name="form_project">
       <fieldset class="fieldset">
       <legend class="legend"><?php echo $form_legend;?></legend>
          <input type="hidden" name="project_id" value="<?php echo $projectData->project_id;?>" />
          <label class="label required_field150"><?php echo $text_project_admin;?></label><?php
          if (in_array('ADD_PRJ_OTHERS',$_SESSION['user_actions']))
	  {
            if (in_array($_REQUEST['action'],array('new_ext_project','new_project')))  
            {                    
              if ($userModeChoice=='listbox')
              {?>
                <select name="form_item_project_admin_lb" class="std_form_field_liste" ><?php
                for ($i=0;$i<count($tableResources);$i++)
                {?>
                 <option value="<?php echo $tableResources[$i]['user_login'];?>" <?php if ($tableResources[$i]['user_login']==$projectData->project_creator) {}?>><?php echo $tableResources[$i]['user_firstname'].' '.$tableResources[$i]['user_name'];?></option><?php
                }?>
                </select><?php
	      }
    	      else
	      {?>
  	        <input name="form_item_project_admin" id="searchAnyUser" class="std_form_field" type="text" size="35"/>
	        <input name="form_item_project_admin_search" id="searchAnyUserId" type="hidden"/><?php
	      }?>
	      <div class="clearleft"></div> <?php
            }
            else
            {?>
	       <input type="hidden" name="form_item_project_admin_lb" value="<?php echo $projectData->project_creator;?>" />
               <input class="readonly_form_field" readonly="readonly" type="text" size="30" value="<?php echo $user->getFullName();?>" /><?php
            }
          }
	  else
	  {?>
	     <input type="hidden" name="form_item_project_admin_lb" value="<?php echo $_SESSION['login'];?>" />
	     <input class="readonly_form_field" readonly="readonly" type="text" size="30" value="<?php echo $_SESSION['user_fullname'];?>" /><?php
	  }?><div class="clearleft"></div>
         <label class="label required_field150"  ><?php echo $text_name;?></label>
         <input <?php if ($projectData->project_external_project_id!=0) { echo 'class="readonly_form_field"';} else {echo 'class="std_form_field"'; }?> name="form_item_project_name" id="form_item_project_name" <?php if ($projectData->project_external_project_id!=0) { echo 'readonly="readonly"';}?> type="text" size="50" maxlength="50" value="<?php echo $projectData->project_name;?>"/><div class="clearleft"></div>

         <label class="label required_field150"><?php echo $text_project_levels;?></label>
         <select name="form_item_project_level" class="std_form_field_liste" ><?php
	      for ($j=3;$j>0;$j--)
	      {
	        if (in_array($j,$templateList))
		{?>
                 <option value="<?php echo $j;?>" <?php if ($j==$defaultTemplate) { echo 'selected="selected"';} ?>><?php echo $textProjectTemplates[$j];?></option><?php
	 	}  
	      } ?>
         </select>	 
		 <div class="clearleft"></div>
		 
         <label class="label length150" ><?php echo $text_status;?></label>
         <input type="hidden" name="form_item_project_status" value="<?php echo $projectData->project_status_id_fk;?>" />
         <input class="readonly_form_field" readonly="readonly" type="text" size="20" value="<?php echo $projectData->status_value;?>"/><div class="clearleft"></div>
         <br /><?php
		   displayButton($button_submit,$pathImages.'submit.png','javascript:CheckFormProject()');	
		   displayButton($button_cancel,$pathImages.'cancel.png',$targetFile);	?>
        
       </fieldset><div class="clearleft"></div>
      </form> 

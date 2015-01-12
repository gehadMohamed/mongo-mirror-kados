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
 * */
 
  require_once $pathBase.'templates_projects_list.php'; 
 
  $clauseOrder=' ORDER BY user_name';	
  if ($global_settings_user_name_sorting_mode=='SFN')
  {
    $clauseOrder=' ORDER BY user_firstname';
  }
  $request=new requete("SELECT user_login,user_firstname,user_name FROM framework_users,framework_status WHERE user_status_id_fk=status_id AND status_tag='ACTIVE' AND status_target_object='USR'".$clauseOrder,$cnx->num);
  $tableResources=$request->getArrayFields(); 
 
  $wkfConnection=new workflow('CON','framework_workflows','framework_status','framework_workflows_transitions',$_SESSION['language']);

  $request=new requete("SELECT * FROM kados_connections WHERE connection_status_id_fk=".$wkfConnection->id_etat_from_label('ACTCON'),$cnx->num);
  $resultsArray=$request->getArrayFields();

  for ($i=0;$i<count($resultsArray);$i++)
  {?>
    <span class="label soft_grey bordertop borderbottom" style="padding:3px;margin-left:15px;" ><?php echo $resultsArray[$i]['connection_name'];?></span><div class="clearleft"></div><?php
	$project_external_project_connection_id=$resultsArray[$i]['connection_id']; 
	include 'external_connection_get_projects.php'; ?>
	
	    <form action="project_cockpit.php?menu_lev1=cockpit&action=add_ext_project" method="post" enctype="multipart/form-data" name="form_add_project<?php echo $resultsArray[$i]['connection_id'];?>">
		<br />
	    <label class="label required_field100"><?php echo $text_project;?></label>	   
		 <input type="hidden" name="connection_id" value="<?php echo $resultsArray[$i]['connection_id'];?>" />
         <select name="form_item_ext_project_id" class="std_form_field_liste" ><?php
           for ($k=0;$k<count($projectsList);$k++)
           {?>
             <option value="<?php echo $projectsList[$k]['project_field_id'];?>" ><?php echo $projectsList[$k]['project_field_name'];?></option><?php
           }?>
         </select><div class="clearleft"></div>	
		 
          <label class="label required_field150"><?php echo $text_project_admin;?></label><?php
          if (in_array('ADD_PRJ_OTHERS',$_SESSION['user_actions']))
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
	     <input type="hidden" name="form_item_project_admin_lb" value="<?php echo $_SESSION['login'];?>" />
	     <input class="readonly_form_field" readonly="readonly" type="text" size="30" value="<?php echo $_SESSION['user_fullname'];?>" /><?php
	  }?><div class="clearleft"></div>			 
         <label class="label required_field100"><?php echo $text_project_levels;?></label>
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
         <br />	<div style="margin-left:15px;">	 <?php
		   displayButton($button_submit,$pathImages.'submit.png','javascript:document.form_add_project'.$resultsArray[$i]['connection_id'].'.submit();');	
		   displayButton($button_cancel,$pathImages.'cancel.png',$targetFile);	?>
		     </div>
		 </form>
		 <div class="clearleft"></div>			 <br /><?php
  }?>
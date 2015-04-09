<?php
/**
 * projects.php
 * Projects Management
 *
 * PHP versions 4 and 5
 *
 * @category Scripts
 * @package  Project_Mngt:projects
 * @author   Charles Santucci <charles@santucci.fr>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * */     

include 'header.php';
$targetFile='projects.php?';

// set a var for dahsboard mode
if (!isset($_SESSION['dashboard_display_mode']))
{
  $_SESSION['dashboard_display_mode']='compact';
}

$displayTable=true;
  $isIEbrowser=preg_match('/(?i)msie [1-9]/',$_SERVER['HTTP_USER_AGENT']);
  switch ($_REQUEST['action'])
  {
    case 'delete_project':
      $id2delete=intval($_REQUEST['id_to_delete']);
      $request->envoi('DELETE FROM kados_projects WHERE project_id='.$id2delete); 
      $request->envoi('DELETE FROM kados_projects_users WHERE project_id_fk='.$id2delete);  
      $request->envoi('DELETE FROM kados_projects_settings WHERE project_id_fk='.$id2delete); 
      $request->envoi('DELETE FROM kados_projects_colors WHERE project_id_fk='.$id2delete);  	
      $request->envoi('DELETE FROM kados_projects_columns WHERE project_id_fk='.$id2delete); 

      $mcnx->num->kados_projects->remove(array('project_id'=>$_REQUEST['id_to_delete']));
      $mcnx->num->kados_projects_users->remove(array('project_id_fk'=>$_REQUEST['id_to_delete']));
      $mcnx->num->kados_projects_settings->remove(array('project_id_fk'=>$_REQUEST['id_to_delete']));
      $mcnx->num->kados_projects_colors->remove(array('project_id_fk'=>$_REQUEST['id_to_delete']));
      $mcnx->num->kados_projects_columns->remove(array('project_id_fk'=>$_REQUEST['id_to_delete']));
      
      if (isset($_SESSION['current_project_id']))
      {
        if ($_SESSION['current_project_id']==$id2delete)
 	{
	  unset($_SESSION['current_project_id']);
	}
      }
      // Delete bookmarks
      $request->envoi('DELETE FROM kados_users_bookmarks WHERE project_id_fk='.$id2delete);
$mcnx->num->kados_users_bookmarks->remove(array('project_id_fk'=>$id2delete));
      ?>
      <div class="MessageBox ConfirmationMessageBox"><?php echo $msg_object_deleted;?></div>           <script>$('.ConfirmationMessageBox').delay(<?php echo $delayMsg;?>).slideUp("slow");</script><?php
    break;
    
    case 'new_ext_project':
      include 'project_form_external.php';
      $displayTable=false;
    break;
      
    case 'new_project':
      // Get status
      $wkf=new workflow('PRJ','framework_workflows','framework_status','framework_workflows_transitions',$_SESSION['language']);
      $projectData=new stdClass();	  
      $projectData->project_status_id_fk=$wkf->init_statut();
      $projectData->status_value=$wkf->valeur_etat($projectData->project_status_id_fk);
      $projectData->project_id=0;	  
      $projectData->product_owner='';
      $projectData->project_name='';
      $projectData->project_creator='';
      $projectData->project_external_project_id=0;
      $form_legend=$legend_creation_m.' '.lcfirst($text_project); 
      $projectTargetFile='project_cockpit.php';
      include 'project_form.php';
      $displayTable=false;
    break;
    
    case 'view_details':
      $form_legend=$legend_display_m.' '.lcfirst($text_project);
    case 'modify_project':
      $wkf=new workflow('PRJ','framework_workflows','framework_status','framework_workflows_transitions',$_SESSION['language']);
      // Get the project data
      $request=new requete('SELECT * FROM kados_projects
                            WHERE project_id='.intval($_REQUEST['id_to_modify']),$cnx->num);  
      $request->countRows();
      if ($request->nb_elt!=0)
      {
        $projectData=$request->getObject();
        $projectData->status_value=$wkf->valeur_etat($projectData->project_status_id_fk);
        if (!isset($form_legend))
        {
	  $form_legend=$legend_changing_m.' '.lcfirst($text_project);
        }	
        $projectTargetFile='projects.php';
        include 'project_form.php';
        $displayTable=false;
      }  
    break;    
    
    case 'submit_modify_project':
      // set project admin username
      if (isset($_POST['form_item_project_admin_search']))
      {
        // Get stakeholder username
        $username=$_POST['form_item_project_admin_search'];
        // Insert stakeholder
      }	
      else
      {
        $username=$_POST['form_item_project_admin_lb'];
      }
      // Update project
      $request=new requete("UPDATE kados_projects SET  project_name='".formatStringForDB($_POST['form_item_project_name'])."', project_creatort='".$username."' 
                            WHERE project_id=".$_POST['project_id'],$cnx->num); 
      $mcnx->num->kados_projects->update(array('project_id'=>$_POST['project_id']),array('$set'=>array('project_name'=>formatStringForDB($_POST['form_item_project_name']),'project_creatort'=>$username)),array('multiple' => true));
      ?>
      <div class="MessageBox ConfirmationMessageBox"><?php echo $msg_object_updated;?></div>           <script>$('.ConfirmationMessageBox').delay(<?php echo $delayMsg;?>).slideUp("slow");</script><?php
    break;

    case 'change_status':
      $wkf=new workflow('PRJ','framework_workflows','framework_status','framework_workflows_transitions',$_SESSION['language']);
      $wkf->change_object_status(intval($_REQUEST['project_id']),intval($_REQUEST['new_status_id']));?>
	  <div class="MessageBox ConfirmationMessageBox"><?php echo $msg_status_changed;?></div><?php
    break;	
	
    case 'update_ext_project':
  	  // Update project
  	  $request=new requete("UPDATE kados_projects SET  project_name='".formatStringForDB($_POST['new_name'])."' WHERE project_id=".$_POST['project2update'],$cnx->num);
        $mcnx->num->kados_projects->update(array('project_id'=>$_POST['project2update']),array('$set'=>array('project_name'=>formatStringForDB($_POST['new_name']))),array('multiple' => true));
        ?>
  	  <div class="MessageBox ConfirmationMessageBox"><?php echo $msg_object_updated;?></div>           <script>$('.ConfirmationMessageBox').delay(<?php echo $delayMsg;?>).slideUp("slow");</script><?php
    break;
	
    case 'bookmark_project':
	  $request=new requete("SELECT MAX(bookmark_order) AS max FROM kados_users_bookmarks WHERE user_login_fk='".$_SESSION['login']."'",$cnx->num);
	  $request->getObject();
      $order=$request->objet->max+1;	
	  $request->envoi("INSERT IGNORE INTO kados_users_bookmarks (user_login_fk,project_id_fk,bookmark_order,bookmark_color) 
	                        VALUES ('".$_SESSION['login']."',".$_REQUEST['id_project'].",".$order.",'')");
    break;
	
    case 'unbookmark_project':
	  $request=new requete("DELETE FROM kados_users_bookmarks WHERE user_login_fk='".$_SESSION['login']."' AND project_id_fk=".$_REQUEST['id_project'],$cnx->num);
        $mcnx->num->kados_users_bookmarks->remove(array('user_login_fk'=>$_SESSION['login'],'project_id_fk'=>$_REQUEST['id_project']));
	  //  reorder bookmarks
	  $bookmarks=array();
	  $request->envoi("SELECT project_id_fk FROM kados_users_bookmarks WHERE user_login_fk='".$_SESSION['login']."' ORDER BY bookmark_order");
	  $bookmarks=$request->recup_array_mono();
      for ($i=0;$i<count($bookmarks);$i++)
	  {
	    $request->envoi("UPDATE kados_users_bookmarks SET bookmark_order=".($i+1)." WHERE user_login_fk='".$_SESSION['login']."' AND project_id_fk=".$bookmarks[$i]);
            $mcnx->num->kados_users_bookmarks->update(array('user_login_fk'=>$_SESSION['login'],'project_id_fk'=>$bookmarks[$i]),array('$set'=>array('bookmark_order'=>($i+1))),array('multiple' => true));
	  }
    break;

    case 'choose_color':
	  $request=new requete("UPDATE kados_users_bookmarks SET bookmark_color='".$_REQUEST['color']."' WHERE user_login_fk='".$_SESSION['login']."' AND project_id_fk=".$_REQUEST['id_project'],$cnx->num);
        $mcnx->num->kados_users_bookmarks->update(array('user_login_fk'=>$_SESSION['login'],'project_id_fk'=>$_REQUEST['id_project']),array('$set'=>array('bookmark_color'=>$_REQUEST['color'])),array('multiple' => true));
    break;	
	
    case 'bookmark_up':
      $request=new requete("SELECT bookmark_order FROM kados_users_bookmarks WHERE user_login_fk='".$_SESSION['login']."' AND project_id_fk=".$_REQUEST['id_project'],$cnx->num);	  
	  $bookmark=$request->getObject();
	  $request->envoi("UPDATE kados_users_bookmarks SET bookmark_order=".$bookmark->bookmark_order." WHERE user_login_fk='".$_SESSION['login']."' AND bookmark_order=".($bookmark->bookmark_order-1));
          $mcnx->num->kados_users_bookmarks->update(array('user_login_fk'=>$_SESSION['login'],'bookmark_order'=>($bookmark->bookmark_order-1)),array('$set'=>array('bookmark_order'=>$bookmark->bookmark_order)),array('multiple' => true));
	  $request->envoi("UPDATE kados_users_bookmarks SET bookmark_order=bookmark_order-1 WHERE user_login_fk='".$_SESSION['login']."' AND project_id_fk=".$_REQUEST['id_project']);
          $mcnx->num->kados_users_bookmarks->update(array('user_login_fk'=>$_SESSION['login'],'project_id_fk'=>$_REQUEST['id_project']),array('$set'=>array('bookmark_order'=>'bookmark_order-1')),array('multiple' => true));
    break;
	
    case 'bookmark_down':
      $request=new requete("SELECT bookmark_order FROM kados_users_bookmarks WHERE user_login_fk='".$_SESSION['login']."' AND project_id_fk=".$_REQUEST['id_project'],$cnx->num);	  
      $bookmark=$request->getObject();
      $request->envoi("UPDATE kados_users_bookmarks SET bookmark_order=".$bookmark->bookmark_order." WHERE user_login_fk='".$_SESSION['login']."' AND bookmark_order=".($bookmark->bookmark_order+1));
      $mcnx->num->kados_users_bookmarks->update(array('user_login_fk'=>$_SESSION['login'],'bookmark_order'=>($bookmark->bookmark_order+1)),array('$set'=>array('bookmark_order'=>$bookmark->bookmark_order)),array('multiple' => true));
      $request->envoi("UPDATE kados_users_bookmarks SET bookmark_order=bookmark_order+1 WHERE user_login_fk='".$_SESSION['login']."' AND project_id_fk=".$_REQUEST['id_project']);
      $mcnx->num->kados_users_bookmarks->update(array('user_login_fk'=>$_SESSION['login'],'project_id_fk'=>$_REQUEST['id_project']),array('$set'=>array('bookmark_order'=>'bookmark_order+1')),array('multiple' => true));
    break;	
    
    case 'change_admin':
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
      $form_legend=$legend_creation_m.' '.lcfirst($text_project_admin);?>
      <form action="<?php echo $targetFile;?>&action=submit_change_admin" method="post" enctype="multipart/form-data" name="form_change_admin">
       <fieldset class="fieldset">
       <legend class="legend"><?php echo $form_legend;?></legend>
          <input type="hidden" name="project_id" value="<?php echo $_REQUEST['project_id'];?>" />
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
          }?>
         <br /><?php
           displayButton($button_submit,$pathImages.'submit.png','javascript:document.form_change_admin.submit()');	
	   displayButton($button_cancel,$pathImages.'cancel.png',$targetFile);	?>
         </fieldset><div class="clearleft"></div>
      </form> <?php   
      $displayTable=false;
    break;
    
    case 'submit_change_admin':
      // set project admin username
      if (isset($_POST['form_item_project_admin_search']))
      {
        // Get stakeholder username
        $username=$_POST['form_item_project_admin_search'];
        // Insert stakeholder
      }	
      else
      {
        $username=$_POST['form_item_project_admin_lb'];
      }  
      if ($username!='')
      {
        $request=new requete("UPDATE kados_projects SET  project_creator='".$username."' WHERE project_id=".$_POST['project_id'],$cnx->num);
        $mcnx->num->kados_projects->update(array('project_id'=>$_POST['project_id']),array('$set'=>array('project_creator'=>$username)),array('multiple' => true));
        ?>
        <div class="MessageBox ConfirmationMessageBox"><?php echo $msg_object_updated;?></div>           <script>$('.ConfirmationMessageBox').delay(<?php echo $delayMsg;?>).slideUp("slow");</script><?php
      }
    break;
  }  	 
  
  if ($displayTable)
  {
    $wkf=new workflow('PRJ','framework_workflows','framework_status','framework_workflows_transitions',$_SESSION['language']);

    // Get RSS parameter
    $allowRss=getParameter('RSSACT',$cnx->num);
    // Buttons line
    if (in_array('ADD_PRJ_SELF',$_SESSION['user_actions']) || in_array('ADD_PRJ_OTHERS',$_SESSION['user_actions']))
    {
      displayButton($button_new_project,$pathImages.'app/new_project.png',$targetFile.'&action=new_project');
    }  
	
    // Get connections. If an active connection exists, allow to create a project from external connections
    $wkfConnection=new workflow('CON','framework_workflows','framework_status','framework_workflows_transitions',$_SESSION['language']);
	
    // If allowed, display button to add a project
    if (in_array('ADD_EXT_PRJ_SELF',$_SESSION['user_actions']) || in_array('ADD_EXT_PRJ_OTHERS',$_SESSION['user_actions']))
    {
      $request=new requete("SELECT connection_id FROM kados_connections WHERE connection_status_id_fk=".$wkfConnection->id_etat_from_label('ACTCON'),$cnx->num);
      $request->calc_nb_elt();
      if ($request->nb_elt!=0)
      { 
        displayButton($button_new_ext_project,$pathImages.'app/new_ext_project.png',$targetFile.'&action=new_ext_project');
      }  
    }  
    echo '<div class="clearleft"></div>';
	
    $filterOnPrivateProjects='';
    if ($_SESSION['user_profile_tag']!='ADM')
    {
      $filterOnPrivateProjects="AND (project_visibility='PUB' OR (project_visibility='PRI' AND (profile_name!='' OR project_creator='".$_SESSION['login']."')))";
    }  
    if(is_array($_SESSION['login'])){
        $_SESSION['login'] = $_SESSION['login']['username'];
    }
    // Display projects bookmarks
    $sqlProjectsBookmarks="SELECT project_id,project_name,DATE(project_creation_date) AS project_creation_date,bookmark_color,bookmark_order,project_levels,  
	                     status_translation_value AS status_value,project_external_project_id,project_external_project_connection_id,project_creator,  
	                     status_delete_available,status_update_available,CONCAT(user_firstname,' ',user_name) AS project_admin,profile_name
		           FROM framework_status,framework_status_translations,framework_users,kados_users_bookmarks book,kados_projects
			        LEFT JOIN kados_projects_users t2 ON t2.user_login_fk='".$_SESSION['login']."' AND t2.project_id_fk=project_id 
				LEFT JOIN framework_profiles ON t2.profile_id_fk=profile_id 
			   WHERE project_creator=user_login AND project_status_id_fk=status_id_fk AND status_id=status_id_fk 
			     AND status_translation_language='".$_SESSION['language']."'
                             ".$filterOnPrivateProjects."
			     AND book.user_login_fk='".$_SESSION['login']."' AND book.project_id_fk=project_id
			   ORDER BY bookmark_order";?>
     <div class="selectColumnsTitle"><?php echo $text_my_bookmarks;?></div>
     <table class="TableData">
       <tr> 
         <th><?php echo $text_name; ?></th>         
	 <th></th>
	 <th></th>
	 <th><?php echo $text_project_levels; ?></th>
         <th><?php echo $text_project_admin; ?></th>        
         <th><?php echo $text_my_level_on_project; ?></th>         		 
         <th><?php echo $text_status; ?></th>
	 <th><center><a href="#" class="<?php echo TipCssDisplay($text_workflow);?>"><img src="<?php echo $pathImages;?>workflow.gif" border="0"  /><span><?php echo $text_workflow;?></span></a></center></th>
	 <th><center><a href="#" class="<?php echo TipCssDisplay($text_management);?>"><img src="<?php echo $pathImages;?>file.gif" border="0" /><span><?php echo $text_management;?></span></a></center></th><?php
	 // display RSS if allowed
	 if ($allowRss)
	 {?>     	
           <th></th><?php
	 }?>
         <th></th>   
         <th></th>                     
       </tr><?php
       
     $request=new requete($sqlProjectsBookmarks,$cnx->num); 	  	     
     $resultsArray=$request->getArrayFields();

	 $action_manage_settings=getActionLabel('MNGPARAMPRJ',$_SESSION['language']);
	 $action_update_project=getActionLabel('UPDPRJ',$_SESSION['language']);
	 $action_delete_project=getActionLabel('DELPRJ',$_SESSION['language']);

	 $levelsList[1]=$text_1level;
	 $levelsList[2]=$text_2levels;
	 $levelsList[3]=$text_3levels;
     $request=new requete('SELECT * FROM kados_colors',$cnx->num); 	
     $colorsList=$request->getArrayFields();
	 
     for ($i=0;$i<count($resultsArray);$i++)
     {
	   // Check if there is a current release
	   $currentReleaseId=0;
	   $request->envoi("SELECT release_id 
	                    FROM kados_releases 
						WHERE release_project_id_fk=".$resultsArray[$i]['project_id']." 
						  AND release_due_date>='".aujourdhui()."'
						ORDER BY release_due_date ASC 
						LIMIT 0,1");
	   if ($request->calc_nb_elt())
	   {
	     $request->getObject();
		 $currentReleaseId=$request->objet->release_id;
	   } 
	   // Check if there is a current sprint
	   $currentSprintId=0;
	   $request->envoi("SELECT sprint_id 
	                    FROM kados_sprints,kados_releases 
						WHERE release_project_id_fk=".$resultsArray[$i]['project_id']." 
						  AND sprint_release_id_fk=release_id
						  AND sprint_start_date<='".aujourdhui()."' 
						  AND sprint_end_date>='".aujourdhui()."' 
						ORDER BY sprint_start_date ASC 
						LIMIT 0,1");
	   if ($request->calc_nb_elt())
	   {
	     $request->getObject();
		 $currentSprintId=$request->objet->sprint_id;
	   } ?>
         <tr class="<?php echo $resultsArray[$i]['bookmark_color'];?>">
           <td>
  		     <a href="project_cockpit.php?menu_lev1=cockpit&menu_lev2=cockpit&project_id=<?php echo $resultsArray[$i]['project_id'];?>" class="small_link"><?php echo $resultsArray[$i]['project_name'];?></a><?php 
			   if ($resultsArray[$i]['project_external_project_id'])
			   {?>
			     <span class="upper_infos">
			       <img src="<?php echo $pathImages;?>chain.gif" tooltip="<?php echo changeDoubleQuote($text_external_project);?>" border="0"  />
				 </span><?php
			   }
		     if ($resultsArray[$i]['project_levels']>1)
			 {?>
			   <a href="manage_kanban.php?menu_lev1=cockpit&menu_lev2=prj_kanban&project_id=<?php echo $resultsArray[$i]['project_id'];?>" ><img src="<?php echo $pathImages;?>app/kanban.png" border="0"/></a><?php
			 } ?>
		   </td>
		   <td>
		     <!-- // allow to unset bookmark the project-->
			 <a href="<?php echo $targetFile;?>&action=unbookmark_project&id_project=<?php echo $resultsArray[$i]['project_id'];?>" class="<?php echo TipCssDisplay($action_unbookmark_project);?>"><img src="<?php echo $pathImages;?>app/star_off.png" border=0 /><span><?php echo $action_unbookmark_project;?></span></a>
			 <span class="choice_color" onMouseOver="javascript:document.getElementById('choose_color_<?php echo $resultsArray[$i]['project_id'];?>').style.display='block'" onMouseOut="javascript:document.getElementById('choose_color_<?php echo $resultsArray[$i]['project_id'];?>').style.display='none'">
		        <img src="<?php echo $pathImages;?>app/color.png" border="0" />
			    <span id="choose_color_<?php echo $resultsArray[$i]['project_id'];?>" ><?php
                    for ($j=0;$j<count($colorsList);$j++)
                    {?>
	                  <a href="<?php echo $targetFile;?>&action=choose_color&color=<?php echo $colorsList[$j]['color_name']; ?>&id_project=<?php echo $resultsArray[$i]['project_id'];?>"><div class="colorDisplay <?php echo $colorsList[$j]['color_name']; ?>" style="margin:5px;"></div></a><?php
					}?>  
			    </span>
			 </span><?php
			 // Ordering
			 if ($i>0)
			 {?>
			   <a href="<?php echo $targetFile;?>&action=bookmark_up&id_project=<?php echo $resultsArray[$i]['project_id'];?>" ><img src="<?php echo $pathImages;?>up.png" border=0 /></a><?php
			 }
			 else
			 {?>
			   <img src="<?php echo $pathImages;?>blank.gif" width="16"/><?php
			 }
			 if ($i<count($resultsArray)-1)
			 {?>
              <a href="<?php echo $targetFile;?>&action=bookmark_down&id_project=<?php echo $resultsArray[$i]['project_id'];?>" ><img src="<?php echo $pathImages;?>down.png" border=0 /></a><?php
             }?>
		   </td>		   
		   <td><?php
		     if ($currentReleaseId!=0)
			 {?>
			   <a href="manage_kanban.php?menu_lev1=cockpit&menu_lev2=prj_kanban&project_id=<?php echo $resultsArray[$i]['project_id'];?>&release_id=<?php echo $currentReleaseId;?>" class="<?php echo TipCssDisplay($action_goto_current_release);?>"><img src="<?php echo $pathImages;?>app/link2release.png" border="0"/><span><?php echo $action_goto_current_release;?></span></a><?php
			 }
		     if ($currentSprintId!=0)
			 {?>
			   <a href="manage_kanban.php?menu_lev1=cockpit&menu_lev2=prj_kanban&project_id=<?php echo $resultsArray[$i]['project_id'];?>&sprint_id=<?php echo $currentSprintId;?>" class="<?php echo TipCssDisplay($action_goto_current_sprint);?>"><img src="<?php echo $pathImages;?>app/link2sprint.png"  border="0"/><span><?php echo $action_goto_current_sprint;?></span></a><?php
			 }?>			 
		   </td>
		   <td><?php echo $levelsList[$resultsArray[$i]['project_levels']];?></td>		 
           <td><?php echo $resultsArray[$i]['project_admin'];?></td>		 
           <td><?php echo $resultsArray[$i]['profile_name'];?></td>		 		   
           <td><?php echo $resultsArray[$i]['status_value'];?></td>		   
           <td class="nowrap"><center><?php
		     unset($statusListProfile);
			 unset($statusListLocalProfil);
			 unset($statusList);
			 $statusListProfile=array();
			 $statusListLocalProfil=array();
			 $statusList=array();
	         // Status list with global profile
		     $wkf->set_profile('framework_workflows_transitions_profiles','profile_id_fk',$_SESSION['user_profile']);
		     $statusListProfile=$wkf->etats_suivants_tablo($resultsArray[$i]['project_id']);
			 // Get status to merge with local profile
			 for ($k=0;$k<count($statusListProfile);$k++)
			 {
			   $statusList[$k]=$statusListProfile[$k]['status_id'];
			 }
			 // Set local profile if exists
			 $localProfile=getLocalProfileOnProjectForUser($_SESSION['login'],$resultsArray[$i]['project_id']);
			 $wkf->set_profile('framework_workflows_transitions_profiles','profile_id_fk',$localProfile);
			 // Get status list for the local profile
			 $statusListLocalProfil=$wkf->etats_suivants_tablo($resultsArray[$i]['project_id']);
			 // merge the two status lists
			 for ($k=0;$k<count($statusListLocalProfil);$k++)
			 {
			   if (!in_array($statusListLocalProfil[$k]['status_id'],$statusList))
			   {
			     array_push($statusListProfile,$statusListLocalProfil[$k]);
			   }
			 }
			 for ($k=0;$k<count($statusListProfile);$k++)
			 {?>
			     <a href="<?php echo $targetFile;?>&action=change_status&new_status_id=<?php echo $statusListProfile[$k]['status_id']; ?>&project_id=<?php echo $resultsArray[$i]['project_id'];?>" class="<?php echo TipCssDisplay($action_change_status.' : '.$statusListProfile[$k]['status_value']);?>"><img src="<?php echo $pathImages.$statusListProfile[$k]['status_icon'];?>" border="0"  /><span><?php echo $action_change_status.' : '.$statusListProfile[$k]['status_value'];?></span></a><?php
			 }?></center>
	   </td> 
	   <td class="nowrap"><center><?php
             if (in_array('MNGPARAMPRJ',$_SESSION['user_actions']) 
                 || isActionAllowedOnProjectForUser($_SESSION['login'],'MNGPARAMPRJ',$resultsArray[$i]['project_id'])
                 || $resultsArray[$i]['project_creator']==$_SESSION['login'])
             {
	       // If project is from an external source, add a button to update data
	       if ($resultsArray[$i]['project_external_project_id']!=0)
               {
		 $projectFindId=$resultsArray[$i]['project_external_project_id'];
		 $project_external_project_connection_id=$resultsArray[$i]['project_external_project_connection_id'];
		 include 'external_connection_get_projects.php';
		 // si changement de nom ou de date, proposer la mise � jour
		 if ($resultsArray[$i]['project_name']!=$projectsList[0]['project_field_name'])
		 {?>
                   <a href="javascript:document.form_update_project_data_<?php echo $resultsArray[$i]['project_id'];?>.submit()" class="<?php echo TipCssDisplay($action_refresh_release);?>"><img src="<?php echo $pathImages;?>refresh.png" border="0"  /><span><?php echo $action_refresh_release;?></span></a>				 
				   <form name="form_update_project_data_<?php echo $resultsArray[$i]['project_id'];?>" method="post" action="<?php echo $targetFile;?>" enctype="multipart/form-data">
				   <input type="hidden" name="action" value="update_ext_project" />
				   <input type="hidden" name="project2update" value="<?php echo $resultsArray[$i]['project_id'];?>" />
				   <input type="hidden" name="new_name" value="<?php echo $projectsList[0]['project_field_name'];?>" />
				   </form><?php
		 }
	       }	  
               // allow change of project admin?>
               <a href="<?php echo $targetFile;?>&action=change_admin&project_id=<?php echo $resultsArray[$i]['project_id'];?>" class="<?php echo TipCssDisplay($action_change_admin);?>"><img src="<?php echo $pathImages;?>app/change_admin.png" border="0"  /><span><?php echo $action_change_admin;?></span></a><?php
	     }		   
             // Check if there is some related data : the project is used in a timesheet
	     $noRelatedData=true;
	     $request->envoi('SELECT release_id AS nb_rel FROM kados_releases WHERE release_project_id_fk='.$resultsArray[$i]['project_id']);
             $request->calc_nb_elt();
	     if ($request->nb_elt!=0)
	     {
	       $noRelatedData=false;;
	     }  
             if ($resultsArray[$i]['status_update_available'] && (in_array('UPDPRJ',$_SESSION['user_actions']) || isActionAllowedOnProjectForUser($_SESSION['login'],'UPDPRJ',$resultsArray[$i]['project_id'])))
             {?>
               <a href="<?php echo $targetFile;?>&action=modify_project&id_to_modify=<?php echo $resultsArray[$i]['project_id'];?>" class="<?php echo TipCssDisplay($action_update_project);?>"><img src="<?php echo $pathImages;?>modify.gif" border=0 /><span><?php echo $action_update_project;?></span></a><?php
             }
	     // Delete only if the template of status allows deletion, there is no related data and the current user has the right to delete a project
             if ($resultsArray[$i]['status_delete_available'] && $noRelatedData && (in_array('DELPRJ',$_SESSION['user_actions']) || isActionAllowedOnProjectForUser($_SESSION['login'],'DELPRJ',$resultsArray[$i]['project_id'])))
             {?>
               <a href="<?php echo $targetFile;?>&action=delete_project&id_to_delete=<?php echo $resultsArray[$i]['project_id'];?>" onclick="return confirm('<?php echo $msg_confirm_delete_object;?>');" class="<?php echo TipCssDisplay($action_delete_project);?>"><img src="<?php echo $pathImages;?>delete.gif" border=0 /><span><?php echo $action_delete_project;?></span></a><?php
             }?></center>
           </td><?php
	   // display RSS if allowed
	   if ($allowRss)
	   {?>     	
             <td><a href="<?php echo $pathBase;?>rss.php?project_id=<?php echo $resultsArray[$i]['project_id'];?>&language=<?php echo $_SESSION['language'];?>" target="rss_ext"><img src="<?php echo $pathImages;?>rss.png" border="0" /></td>		  		   <?php
	   }
           if ($resultsArray[$i]['project_external_project_id']!=0)
           {
             $paramShortcut='shortcut=project_ext&shortcut_id='.$resultsArray[$i]['project_external_project_id'];
           }
           else
           {
             $paramShortcut='shortcut=project&shortcut_id='.$resultsArray[$i]['project_id'];
           }?>
 
           <td><?php if (!$isIEbrowser)
		   {?><img src="<?php echo $pathImages;?>app/shortcut.png" border="0" id="showLink<?php echo $resultsArray[$i]['project_id'];?>"  title="<?php echo $text_shortcut_to_kanban;?>"/>
               <div id="dialogLink<?php echo $resultsArray[$i]['project_id'];?>"><?php echo $msg_use_this_url_as_shortcut_for_project;?> :<br /><br /><?php echo getServerURL();?>/index.php?<?php echo $paramShortcut;?></div> 
             <script>
              $(function() { 
                  $( "#dialogLink<?php echo $resultsArray[$i]['project_id'];?>").dialog({autoOpen: false,width:750,modal: true});          
                  $( "#showLink<?php echo $resultsArray[$i]['project_id'];?>").button().click(function() {$( "#dialogLink<?php echo $resultsArray[$i]['project_id'];?>" ).dialog( "open" );});});
              </script>  	
           <?php }?>			  
           </td> 
           <td><?php if (!$isIEbrowser)
		   {?><img src="<?php echo $pathImages;?>app/symbolic-link.png" border="0" id="showLinkCockpit<?php echo $resultsArray[$i]['project_id'];?>" title="<?php echo $text_shortcut_to_cockpit;?>"/>
               <div id="dialogLinkCockpit<?php echo $resultsArray[$i]['project_id'];?>"><?php echo $msg_use_this_url_as_shortcut_for_cockpit;?> :<br /><br /><?php echo getServerURL();?>/index.php?<?php echo $paramShortcut;?>&shortcut_target=cockpit</div> 
              <script>
              $(function() { 
                  $( "#dialogLinkCockpit<?php echo $resultsArray[$i]['project_id'];?>").dialog({autoOpen: false,width:750,modal: true});          
                  $( "#showLinkCockpit<?php echo $resultsArray[$i]['project_id'];?>").button().click(function() {$( "#dialogLinkCockpit<?php echo $resultsArray[$i]['project_id'];?>" ).dialog( "open" );});});
              </script>              
			  <?php }?> 
           </td>               
         </tr><?php
       }?>
     </table><hr /><?php
	
    // **********************  Display list of projects  ******************************/
    // Get sorting order for the creator from the global settings
    $clauseOrder=' ORDER BY user_name';	
    if ($global_settings_user_name_sorting_mode=='SFN')
    {
      $clauseOrder=' ORDER BY user_firstname';
    }	  
    $filtres=new filtres($pathBase,$pathImages);
    $filtres->add_field('filter_project_shortname',$text_name,'string','project_name');     	
    $filtres->add_field('filter_adm',$text_project_admin,'requete','project_creator');
    $filtres->define_field_request('filter_adm',"CONCAT(user_firstname,' ',user_name) AS user_fullname",'framework_users,kados_projects','user_login'," WHERE user_login=project_creator GROUP BY user_login ".$clauseOrder);
	
    $listeMois=array();
    $listeAnnee=array();
    for ($i=0;$i<count($_SESSION['annee']);$i++)
    {
      $listeMois[$i]=($i+1).':'.$_SESSION['annee'][$i];
    }

    for ($i=2010;$i<(date('Y')+3);$i++)
    {
      $listeAnnee[$i]=$i.':'.$i;
    }
    $listeAnneeString=implode(',',$listeAnnee);
    $listeMoisString=implode(',',$listeMois);

    $filtres->add_field('filter_month',ucfirst($text_month),'liste','MONTH(project_creation_date)');
    $filtres->define_field_list('filter_month',$listeMoisString);
    $filtres->add_field('filter_year',ucfirst($text_year),'liste','YEAR(project_creation_date)');
    $filtres->define_field_list('filter_year',$listeAnneeString);
	
    $filtres->add_field('filter_status',$text_status,'liste','project_status_id_fk');
    $filtres->define_field_list('filter_status',$wkf->liste_etats_pour_filtre());
    $filtres->add_field('filter_my_projects',$text_scope,'liste','profile_name');
    $filtres->change_field_compare_mode('filter_my_projects','!=');
    $filtres->define_field_list('filter_my_projects','NULL:'.$text_my_projects);

    $filtres->afficher($targetFile,$button_filter,$text_filter_inactive);

    $filterOnMyProjects='';
    if ($filtres->is_field_active('filter_my_projects') && $_SESSION['user_profile_tag']!='ADM')
    {
      $filterOnMyProjects=" AND profile_name!=''";
    }
    $sqlProjects="SELECT project_id,project_name,DATE(project_creation_date) AS project_creation_date,project_levels,project_creator,
	                     status_translation_value AS status_value,project_external_project_id,project_external_project_connection_id,  
	                     status_delete_available,status_update_available,CONCAT(user_firstname,' ',user_name) AS project_admin,profile_name
		  FROM framework_status,framework_status_translations,framework_users,kados_projects
		       LEFT JOIN kados_projects_users t2 ON t2.user_login_fk='".$_SESSION['login']."' AND t2.project_id_fk=project_id 
		       LEFT JOIN framework_profiles ON t2.profile_id_fk=profile_id 
		  WHERE project_creator=user_login AND project_status_id_fk=status_id_fk AND status_id=status_id_fk 
		    AND project_id NOT IN (SELECT project_id_fk FROM kados_users_bookmarks WHERE user_login_fk='".$_SESSION['login']."')
                      ".$filterOnPrivateProjects."
		    AND status_translation_language='".$_SESSION['language']."'".$filterOnMyProjects." ".$filtres->return_sql_filter();

    $request=new requete($sqlProjects,$cnx->num);
    $request->calc_nb_elt();
    $resultsArray=$request->getArrayFields();
     /* Columns sorting and page numbering */
    $pageNumbering=new page_numbering('page_projects',$request->nb_elt,$targetFile,$pathImages,getParameter('PGNUBR',$cnx->num));

    $sortColumn=new sort_column('project_sort',$targetFile,$pathImages);
    $sortColumn->set_default_column('project_name','ASC');
	 
     $pageNumbering->display_navigator($text_no_item);?>
	 <div class="selectColumnsTitle"><?php echo $text_others_projects;?></div>
     <table class="TableData">
       <tr> 
         <th><?php echo $text_name; $sortColumn->display_sort_buttons('project_name');?></th>         
	 <th></th>
	 <th></th>
	 <th><?php echo $text_project_levels; ?></th>
         <th><?php echo $text_project_admin; $sortColumn->display_sort_buttons('project_admin');?></th>        
         <th><?php echo $text_my_level_on_project; $sortColumn->display_sort_buttons('profile_name');?></th>         		 
         <th><?php echo $text_status; $sortColumn->display_sort_buttons('status_value');?></th>
	 <th><center><a href="#" class="<?php echo TipCssDisplay($text_workflow);?>"><img src="<?php echo $pathImages;?>workflow.gif" border="0"  /><span><?php echo $text_workflow;?></span></a></center></th>
	 <th><center><a href="#" class="<?php echo TipCssDisplay($text_management);?>"><img src="<?php echo $pathImages;?>file.gif" border="0" /><span><?php echo $text_management;?></span></a></center></th><?php
	 // display RSS if allowed
	 if ($allowRss)
	 {?>     		 
           <th></th><?php
	 }?>	
         <th></th>
         <th></th>
       </tr><?php
       
     $request=new requete($sqlProjects.$sortColumn->return_sql_order_by().$pageNumbering->return_sql_limit(),$cnx->num); 	  	     
     $resultsArray=$request->getArrayFields();

	 $action_manage_settings=getActionLabel('MNGPARAMPRJ',$_SESSION['language']);
	 $action_update_project=getActionLabel('UPDPRJ',$_SESSION['language']);
	 $action_delete_project=getActionLabel('DELPRJ',$_SESSION['language']);
	 
     for ($i=0;$i<count($resultsArray);$i++)
     {
	   // Check if there is a current release
	   $currentReleaseId=0;
	   $request->envoi("SELECT release_id 
	                    FROM kados_releases 
						WHERE release_project_id_fk=".$resultsArray[$i]['project_id']." 
						  AND release_due_date>='".aujourdhui()."'
						ORDER BY release_due_date ASC 
						LIMIT 0,1");
	   if ($request->calc_nb_elt())
	   {
	     $request->getObject();
		 $currentReleaseId=$request->objet->release_id;
	   } 
	   // Check if there is a current sprint
	   $currentSprintId=0;
	   $request->envoi("SELECT sprint_id 
	                    FROM kados_sprints,kados_releases 
						WHERE release_project_id_fk=".$resultsArray[$i]['project_id']." 
						  AND sprint_release_id_fk=release_id
						  AND sprint_start_date<='".aujourdhui()."' 
						  AND sprint_end_date>='".aujourdhui()."' 
						ORDER BY sprint_start_date ASC 
						LIMIT 0,1");
	   if ($request->calc_nb_elt())
	   {
	     $request->getObject();
		 $currentSprintId=$request->objet->sprint_id;
	   } ?>
         <tr <?php if (fmod($i,2)==1) { echo 'class="alt"'; }?>>
         <td>
	     <a href="project_cockpit.php?menu_lev1=cockpit&menu_lev2=cockpit&project_id=<?php echo $resultsArray[$i]['project_id'];?>" class="small_link"><?php echo $resultsArray[$i]['project_name'];?></a><?php 
			   if ($resultsArray[$i]['project_external_project_id'])
			   {?>
			     <span class="upper_infos">
			       <img src="<?php echo $pathImages;?>chain.gif" tooltip="<?php echo changeDoubleQuote($text_external_project);?>" border="0"  />
				 </span><?php
			   }
		     if ($resultsArray[$i]['project_levels']>1)
			 {?>
			   <a href="manage_kanban.php?menu_lev1=cockpit&menu_lev2=prj_kanban&project_id=<?php echo $resultsArray[$i]['project_id'];?>" ><img src="<?php echo $pathImages;?>app/kanban.png" border="0"/></a><?php
			 } ?>			   
	  </td>
	  <td>
		     <!-- // allow to bookmark the project-->
			 <a href="<?php echo $targetFile;?>&action=bookmark_project&id_project=<?php echo $resultsArray[$i]['project_id'];?>" class="<?php echo TipCssDisplay($action_bookmark_project);?>"><img src="<?php echo $pathImages;?>app/star_on.png" border=0 /><span><?php echo $action_bookmark_project;?></span></a>
	   </td>
	   <td><?php
		     if ($currentReleaseId!=0)
			 {?>
			   <a href="manage_kanban.php?menu_lev1=cockpit&menu_lev2=prj_kanban&project_id=<?php echo $resultsArray[$i]['project_id'];?>&release_id=<?php echo $currentReleaseId;?>" class="<?php echo TipCssDisplay($action_goto_current_release);?>"><img src="<?php echo $pathImages;?>app/link2release.png" border="0"/><span><?php echo $action_goto_current_release;?></span></a><?php
			 }
		     if ($currentSprintId!=0)
			 {?>
			   <a href="manage_kanban.php?menu_lev1=cockpit&menu_lev2=prj_kanban&project_id=<?php echo $resultsArray[$i]['project_id'];?>&sprint_id=<?php echo $currentSprintId;?>" class="<?php echo TipCssDisplay($action_goto_current_sprint);?>"><img src="<?php echo $pathImages;?>app/link2sprint.png"  border="0"/><span><?php echo $action_goto_current_sprint;?></span></a><?php
			 }?>			 
	   </td>
	   <td><?php echo $levelsList[$resultsArray[$i]['project_levels']];?></td>	
           <td><?php echo $resultsArray[$i]['project_admin'];?></td>		 
           <td><?php echo $resultsArray[$i]['profile_name'];?></td>		 		   
           <td><?php echo $resultsArray[$i]['status_value'];?></td>		   
           <td class="nowrap"><center><?php
	     unset($statusListProfile);
	     unset($statusListLocalProfil);
	     unset($statusList);
	     $statusListProfile=array();
	     $statusListLocalProfil=array();
	     $statusList=array();
	     // Status list with global profile
	     $wkf->set_profile('framework_workflows_transitions_profiles','profile_id_fk',$_SESSION['user_profile']);
	     $statusListProfile=$wkf->etats_suivants_tablo($resultsArray[$i]['project_id']);
	     // Get status to merge with local profile
	     for ($k=0;$k<count($statusListProfile);$k++)
	     {
		$statusList[$k]=$statusListProfile[$k]['status_id'];
	      }
	      // Set local profile if exists
	      $localProfile=getLocalProfileOnProjectForUser($_SESSION['login'],$resultsArray[$i]['project_id']);
	      $wkf->set_profile('framework_workflows_transitions_profiles','profile_id_fk',$localProfile);
	      // Get status list for the local profile
	      $statusListLocalProfil=$wkf->etats_suivants_tablo($resultsArray[$i]['project_id']);
	      // merge the two status lists
	      for ($k=0;$k<count($statusListLocalProfil);$k++)
	      {
		if (!in_array($statusListLocalProfil[$k]['status_id'],$statusList))
		{
		  array_push($statusListProfile,$statusListLocalProfil[$k]);
		}
	      }
	      for ($k=0;$k<count($statusListProfile);$k++)
	      {?>
		 <a href="<?php echo $targetFile;?>&action=change_status&new_status_id=<?php echo $statusListProfile[$k]['status_id']; ?>&project_id=<?php echo $resultsArray[$i]['project_id'];?>" class="<?php echo TipCssDisplay($action_change_status.' : '.$statusListProfile[$k]['status_value']);?>"><img src="<?php echo $pathImages.$statusListProfile[$k]['status_icon'];?>" border="0"  /><span><?php echo $action_change_status.' : '.$statusListProfile[$k]['status_value'];?></span></a><?php
	      }?></center>
	   </td> 
	   <td class="nowrap"><center><?php
	     // If extrenal project, check consistency
             if (in_array('MNGPARAMPRJ',$_SESSION['user_actions']) 
                 || isActionAllowedOnProjectForUser($_SESSION['login'],'MNGPARAMPRJ',$resultsArray[$i]['project_id'])
                 || $resultsArray[$i]['project_creator']==$_SESSION['login'] )
             {
	       // If project is from an external source, add a button to update data
	       if ($resultsArray[$i]['project_external_project_id']!=0)
               {
		 $projectFindId=$resultsArray[$i]['project_external_project_id'];
		 $project_external_project_connection_id=$resultsArray[$i]['project_external_project_connection_id'];
		 include 'external_connection_get_projects.php';
		 // si changement de nom ou de date, proposer la mise � jour
		 if ($resultsArray[$i]['project_name']!=$projectsList[0]['project_field_name'])
		 {?>
                   <a href="javascript:document.form_update_project_data_<?php echo $resultsArray[$i]['project_id'];?>.submit()" class="<?php echo TipCssDisplay($action_refresh_release);?>"><img src="<?php echo $pathImages;?>refresh.png" border="0"  /><span><?php echo $action_refresh_release;?></span></a>				 
			   <form name="form_update_project_data_<?php echo $resultsArray[$i]['project_id'];?>" method="post" action="<?php echo $targetFile;?>" enctype="multipart/form-data">
			   <input type="hidden" name="action" value="update_ext_project" />
			   <input type="hidden" name="project2update" value="<?php echo $resultsArray[$i]['project_id'];?>" />
			   <input type="hidden" name="new_name" value="<?php echo $projectsList[0]['project_field_name'];?>" />
			   </form><?php
		 }
	       }	 
               // allow change of project admin?>
               <a href="<?php echo $targetFile;?>&action=change_admin&project_id=<?php echo $resultsArray[$i]['project_id'];?>" class="<?php echo TipCssDisplay($action_change_admin);?>"><img src="<?php echo $pathImages;?>app/change_admin.png" border="0"  /><span><?php echo $action_change_admin;?></span></a><?php
	     }		   
		   
             // Check if there is some related data : the project is used in a timesheet
	     $noRelatedData=true;
	     $request->envoi('SELECT release_id AS nb_rel FROM kados_releases WHERE release_project_id_fk='.$resultsArray[$i]['project_id']);
	     $request->calc_nb_elt();
	     if ($request->nb_elt!=0)
	     {
	       $noRelatedData=false;;
	     }  
             if ($resultsArray[$i]['status_update_available'] && (in_array('UPDPRJ',$_SESSION['user_actions']) 
                 || isActionAllowedOnProjectForUser($_SESSION['login'],'UPDPRJ',$resultsArray[$i]['project_id']))
                 || $resultsArray[$i]['project_creator']==$_SESSION['login'] )
             {?>
               <a href="<?php echo $targetFile;?>&action=modify_project&id_to_modify=<?php echo $resultsArray[$i]['project_id'];?>" class="<?php echo TipCssDisplay($action_update_project);?>"><img src="<?php echo $pathImages;?>modify.gif" border=0 /><span><?php echo $action_update_project;?></span></a><?php
             }
	     // Delete only if the template of status allows deletion, there is no related data and the current user has the right to delete a project
             if ($resultsArray[$i]['status_delete_available'] && $noRelatedData && (in_array('DELPRJ',$_SESSION['user_actions']) 
                 || isActionAllowedOnProjectForUser($_SESSION['login'],'DELPRJ',$resultsArray[$i]['project_id']))
                 || $resultsArray[$i]['project_creator']==$_SESSION['login'] )
             {?>
               <a href="<?php echo $targetFile;?>&action=delete_project&id_to_delete=<?php echo $resultsArray[$i]['project_id'];?>" onclick="return confirm('<?php echo $msg_confirm_delete_object;?>');" class="<?php echo TipCssDisplay($action_delete_project);?>"><img src="<?php echo $pathImages;?>delete.gif" border=0 /><span><?php echo $action_delete_project;?></span></a><?php
             }?></center>
           </td><?php
	        // display RSS if allowed
           if ($allowRss)
           {?>     		   
              <td><a href="<?php echo $pathBase;?>rss.php?project_id=<?php echo $resultsArray[$i]['project_id'];?>&language=<?php echo $_SESSION['language'];?>" target="rss_ext"><img src="<?php echo $pathImages;?>rss.png" border="0" /></td> <?php
	   }
           if ($resultsArray[$i]['project_external_project_id']!=0)
           {
             $paramShortcut='shortcut=project_ext&shortcut_id='.$resultsArray[$i]['project_external_project_id'];
           }
           else
           {
             $paramShortcut='shortcut=project&shortcut_id='.$resultsArray[$i]['project_id'];
           }?>
           <td><?php if (!$isIEbrowser)
		   {?>
		     <img src="<?php echo $pathImages;?>app/shortcut.png" border="0" id="showLink<?php echo $resultsArray[$i]['project_id'];?>"  title="<?php echo $text_shortcut_to_kanban;?>" />
               <div id="dialogLink<?php echo $resultsArray[$i]['project_id'];?>"><?php echo $msg_use_this_url_as_shortcut_for_project;?> :<br /><br /><?php echo getServerURL();?>/index.php?<?php echo $paramShortcut;?></div> 
              <script>
              $(function() { 
                  $( "#dialogLink<?php echo $resultsArray[$i]['project_id'];?>").dialog({autoOpen: false,width:750,modal: true});          
                  $( "#showLink<?php echo $resultsArray[$i]['project_id'];?>").button().click(function() {$( "#dialogLink<?php echo $resultsArray[$i]['project_id'];?>" ).dialog( "open" );});});
              </script>   			   <?php
			}?>  
           </td>    
           <td><?php if (!$isIEbrowser)
		   {?>
		   
		   <img src="<?php echo $pathImages;?>app/symbolic-link.png" border="0" id="showLinkCockpit<?php echo $resultsArray[$i]['project_id'];?>"  title="<?php echo $text_shortcut_to_cockpit;?>" />
               <div id="dialogLinkCockpit<?php echo $resultsArray[$i]['project_id'];?>"><?php echo $msg_use_this_url_as_shortcut_for_cockpit;?> :<br /><br /><?php echo getServerURL();?>/index.php?<?php echo $paramShortcut;?>&shortcut_target=cockpit</div> 
              <script>
              $(function() { 
                  $( "#dialogLinkCockpit<?php echo $resultsArray[$i]['project_id'];?>").dialog({autoOpen: false,width:750,modal: true});          
                  $( "#showLinkCockpit<?php echo $resultsArray[$i]['project_id'];?>").button().click(function() {$( "#dialogLinkCockpit<?php echo $resultsArray[$i]['project_id'];?>" ).dialog( "open" );});});
              </script>      <?php
			}?>  			  
           </td>    
           
         </tr><?php
       }?>
     </table><?php
  }
require_once $pathBase.'footer.php';?>


<?php
/**
 * Project cockpit : synthesis of project items
 *
 * PHP versions 4 and 5
 *
 * @category Scripts
 * @package  DashBoardItemManagement:ObjectSettings
 * @author   Charles Santucci <charles@santucci.fr>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * */  
$pathBase='./';
$targetFile='project_cockpit.php?menu_lev1=cockpit';

include $pathBase.'header.php';
  $isIEbrowser=preg_match('/(?i)msie [1-9]/',$_SERVER['HTTP_USER_AGENT']);
if (isset($_SESSION['current_project_id']))
{
  $allowRss=getParameter('RSSACT',$cnx->num);
  $showOnlyProjectLevel=true;  
  include $pathBase.'railway_display.php';

  include_once $pathBase.'project_switch_cases_settings.php';
  
  $runningReleaseId=getRunningReleaseId($_SESSION['current_project_id'],$cnx->num);
	
  $sqlSprints='SELECT sprint_id,sprint_name,sprint_start_date,kados_sprints.visibility,sprint_end_date,sprint_release_id_fk,
	                     (SELECT COUNT(us_id) FROM kados_user_stories WHERE us_sprint_id_fk=sprint_id AND active=1) AS us_count,
                         (SELECT COUNT(task_id) FROM kados_tasks,kados_user_stories WHERE us_id_fk=us_id AND us_sprint_id_fk=sprint_id AND kados_tasks.active=1 AND kados_user_stories.active=1) AS task_count,	 
					     (SELECT SUM(business_value) FROM kados_user_stories WHERE us_sprint_id_fk=sprint_id AND active=1) AS bv_sum,
					     (SELECT SUM(complexity) FROM kados_user_stories WHERE us_sprint_id_fk=sprint_id AND active=1) AS complexity_sum, 
                         (SELECT SUM(task_load) FROM kados_tasks,kados_user_stories WHERE us_id_fk=us_id AND us_sprint_id_fk=sprint_id AND kados_tasks.active=1 AND kados_user_stories.active=1) AS task_load_sum 	 
	              FROM kados_releases,kados_sprints  
				  WHERE sprint_release_id_fk=release_id AND release_project_id_fk='.$_SESSION['current_project_id'].'
				  ORDER BY sprint_start_date'; 
  $request->envoi($sqlSprints); 	  	     
  $request->getArrayFields();
  $sprintsData=array();
  for ($i=0;$i<$request->nb_elt;$i++)
  {
    $sprintsData[$request->array[$i]['sprint_release_id_fk']][]=$request->array[$i];
  }
  /* Sprints load by task type */
  $sqlSprintsLoadByTaskType="SELECT us_sprint_id_fk,SUM(task_load) AS sum_task,tsk.color AS color,use_color_meaning  
                               FROM kados_releases,kados_tasks tsk,kados_user_stories, kados_colors_uses colors  
	                           WHERE us_id_fk=us_id AND us_release_id_fk=release_id AND release_project_id_fk=".$_SESSION['current_project_id']."
	                             AND tsk.color=colors.color AND tsk.active=1 AND kados_user_stories.active=1  AND use_color_postit_type='TASK'  
	                           GROUP BY us_sprint_id_fk,tsk.color"; 
  $request->envoi($sqlSprintsLoadByTaskType); 	  	     
  $request->getArrayFields();
  $sprintsLoadByTaskTypeArray=array();
  for ($i=0;$i<$request->nb_elt;$i++)
  {
    $sprintsLoadByTaskTypeArray[$request->array[$i]['us_sprint_id_fk']][]=$request->array[$i];
  }	
	
	
  /* Releases */
  $sqlReleases='SELECT release_id,release_name,release_due_date,visibility,release_external_release_id,
	                     (SELECT COUNT(us_id) FROM kados_user_stories WHERE us_release_id_fk=release_id AND active=1) AS us_count,
                         (SELECT COUNT(task_id) FROM kados_tasks,kados_user_stories WHERE us_id_fk=us_id AND us_release_id_fk=release_id AND kados_tasks.active=1 AND kados_user_stories.active=1) AS task_count,	 
					     (SELECT SUM(business_value) FROM kados_user_stories WHERE us_release_id_fk=release_id AND active=1) AS bv_sum,
					     (SELECT SUM(complexity) FROM kados_user_stories WHERE us_release_id_fk=release_id AND active=1) AS complexity_sum, 
                         (SELECT SUM(task_load) FROM kados_tasks,kados_user_stories WHERE us_id_fk=us_id AND us_release_id_fk=release_id AND kados_tasks.active=1 AND kados_user_stories.active=1) AS task_load_sum	 						 
	              FROM kados_releases 
				  WHERE release_project_id_fk='.$_SESSION['current_project_id']; 

   // Check if thre is some release
   $request->envoi("SELECT release_id FROM kados_releases WHERE release_project_id_fk=".$_SESSION['current_project_id']);
   $stepsAddRelease=$request->calc_nb_elt();
     
	 // Check if adding sprint is allowed
	 $request->envoi("SELECT column_tag_fk FROM kados_projects_columns WHERE project_id_fk=".$_SESSION['current_project_id']);
	 $stepsAllowAddSprint=$request->calc_nb_elt();
	 
	 // Check if team exists
	 $request->envoi("SELECT user_login_fk FROM kados_projects_users WHERE project_id_fk=".$_SESSION['current_project_id']);
	 $stepsTeamExists=$request->calc_nb_elt();
	 
     // get project working days	 
     $workingDays=explode(';',getProjectSetting('WK_DAY',$_SESSION['current_project_id'],$cnx->num));	   
	 $projectExludedDays=array();
	 $request->envoi("SELECT idle_day FROM kados_projects_idle_days 
	                  WHERE project_id_fk=".$_SESSION['current_project_id']." ORDER BY idle_day");
	 $projectExludedDays=$request->recup_array_mono();
	 
     $sortColumn=new sort_column('release_sort',$targetFile,$pathImages);
	 $sortColumn->set_default_column('release_due_date','DESC');?>
	 <table width="100%" valign="top" cellspacing="0" cellpadding="0">
	 <tr><!-- steps -->
	  <td  colspan="2" valign="top" style="padding-right:10px;"><?php
	    if (!$stepsAddRelease)
		{
		  if (in_array('ADD_RELEASE',$_SESSION['user_actions']) || in_array('ADD_RELEASE',$_SESSION['user_local_actions']) || $_SESSION['login']==$currentProject->adminLogin)
		  {?>
	        <div class="MessageBox WarningMessageBox"><?php echo $msg_steps_add_release_access;?></div><?php
		  }
          else
          {		?>
            <div class="MessageBox WarningMessageBox"><?php echo $msg_steps_add_release_no_access;?></div><?php		  
          }		  
		} 	  
        if (!$stepsAllowAddSprint)
		{
		  if (in_array('ADD_SPRINT',$_SESSION['user_actions']) || in_array('ADD_SPRINT',$_SESSION['user_local_actions']) || $_SESSION['login']==$currentProject->adminLogin)
		  {
		    if ($currentProject->level==2)
            { ?>
		      <div class="MessageBox WarningMessageBox"><?php echo $msg_steps_to_add_tasks_design_columns_and_settings_access;?> <a href="project_columns.php?menu_lev1=settings&menu_lev2=prj_columns" ><?php echo $text_click_here;?></a></div><?php
		    }
			else
			{?>
  	          <div class="MessageBox WarningMessageBox"><?php echo $msg_steps_to_add_sprints_design_columns_and_settings_access;?> <a href="project_columns.php?menu_lev1=settings&menu_lev2=prj_columns" ><?php echo $text_click_here;?></a></div><?php
			}	
		  }
          else
          {
			if ($currentProject->level==2)
            { ?>
              <div class="MessageBox WarningMessageBox"><?php echo $msg_steps_to_add_tasks_design_columns_and_settings_no_access;?></div><?php		  
			}
			else
			{?>
              <div class="MessageBox WarningMessageBox"><?php echo $msg_steps_to_add_sprints_design_columns_and_settings_no_access;?></div><?php		  
            }		  
		  } 
		}  
	    if (!$stepsTeamExists)
		{
		  if (in_array('MNGSTAKEHOLDER',$_SESSION['user_actions']) || in_array('MNGSTAKEHOLDER',$_SESSION['user_local_actions']) || $_SESSION['login']==$currentProject->adminLogin)
		  {?>
	        <div class="MessageBox WarningMessageBox"><?php echo $msg_steps_add_stakeholders_to_project_access;?> <a href="project_team.php?menu_lev1=team" ><?php echo $text_click_here;?></a></div><?php
		  }
          else
          {		?>
            <div class="MessageBox WarningMessageBox"><?php echo $msg_steps_add_stakeholders_to_project_no_access;?></div><?php		  
          }		  
		}  ?>		
	  </td>
	 </tr>
     <tr>
     <td width="50%" valign="top" style="padding-right:10px;">	
     <div class="MessageBox TitleBox"><?php echo $msg_releases_sprints_display;?></div><?php
     // A button for adding a release 
     $releasesData=array();
     if (in_array('ADD_RELEASE',$_SESSION['user_actions']) || in_array('ADD_RELEASE',$_SESSION['user_local_actions']) || $_SESSION['login']==$currentProject->adminLogin)
     {  
       if ($currentProject->externalProjectId)
       {
	 // Check if there is a release available
	 include 'external_connection_get_releases.php';
	 if (count($releasesArray)>count($releasesList))
	 {
	   displayButton($button_add_release,$pathImages.'app/new_release.png',$pathBase.'boards_buttons/add_release_external.php','addButtonGeneric');	
	 }  
       }	   
       else
       {
         displayButton($button_create_release,$pathImages.'app/new_release.png',$pathBase.'boards_buttons/add_release.php','addButtonGeneric');	
       }	 
     }  	 
     //$pageNumbering->display_navigator($text_no_item);?>
     <table class="Table2Levels" cellspacing="0" cellpadding="0">
       <tr> 
	     <th></th>
         <th><?php echo $text_release;  $sortColumn->display_sort_buttons('release_name');?></th>
		 <th><?php echo $text_due_date; $sortColumn->display_sort_buttons('release_due_date');?></th>
		 <th></th>
		 <th><?php echo $text_US; ?></th>
		 <th><?php echo $text_BV; ?></th>
		 <th><?php echo $text_Cpx; ?></th>
		 <th><?php echo $text_tasks; ?></th>
		 <th><?php echo $text_task_load_short; ?></th>
		 <th><center><a href="#" class="<?php echo TipCssDisplay($text_actions);?>" style="cursor:default"><img src="<?php echo $pathImages;?>action.gif" border="0"  /><span><?php echo $text_actions;?></span></a></center></th>		 		 
         <th><center><a href="#" class="<?php echo TipCssDisplay($text_management);?>" style="cursor:default"><img src="<?php echo $pathImages;?>file.gif" border="0"  /><span><?php echo $text_management;?></span></a></center></th>  <?php
	      // display RSS if allowed
	      if ($allowRss)
		  {?>     
		    <th></th><?php
		  }?>	
          <th></th>           
       </tr><?php
       //$request=new requete($sqlReleases.$sortColumn->return_sql_order_by().$pageNumbering->return_sql_limit(),$cnx->num);
	   $request=new requete($sqlReleases.$sortColumn->return_sql_order_by(),$cnx->num);
     
       $resultsArray=$request->getArrayFields(); 
       for ($i=0;$i<count($resultsArray);$i++)
       {
	   	 // set staus of release display sprint table
		 if (!isset($_SESSION['toggle_status_rel'.$resultsArray[$i]['release_id']]))
         {
		   $_SESSION['toggle_status_rel'.$resultsArray[$i]['release_id']]=0;
		   // If there is only one release, set the toggle to 1
           if (count($resultsArray)==1 || $resultsArray[$i]['release_id']==$runningReleaseId)
		   $_SESSION['toggle_status_rel'.$resultsArray[$i]['release_id']]=1;		   
		 }

		 // Get spRint data if exist
         $sprintData=isset($sprintsData[$resultsArray[$i]['release_id']]) ? $sprintsData[$resultsArray[$i]['release_id']] : array();		 ?>
         <tr class="alt">
		   <td class="release_line"><?php
		     if (count($sprintData)!=0)
			 {?>
		       <img src="<?php echo $pathImages.($_SESSION['toggle_status_rel'.$resultsArray[$i]['release_id']]==0 ? '' : 'un');?>toggle.png" border="0" class="img_sprint_table_<?php echo $resultsArray[$i]['release_id'];?>" /></a><?php
		     }?>
		   </td>
		   <td class="release_line">
		     <a href="manage_kanban.php?menu_lev1=cockpit&menu_lev2=prj_kanban&release_id=<?php echo $resultsArray[$i]['release_id'];?>" class="std_link"><?php echo $resultsArray[$i]['release_name']; ?></a><?php 
			 if ($resultsArray[$i]['release_id']==$runningReleaseId)
			 {?>
			   <img src="<?php echo $pathImages;?>app/hourglass.png" border="0"  /><?php
			 }?>
		   </td>
           <td class="release_line"><?php echo format_date($resultsArray[$i]['release_due_date']); ?></td>
		   <td class="release_line"></td>
		   <td class="release_line"><?php echo $resultsArray[$i]['us_count']; ?></td>
		   <td class="release_line"><?php echo $resultsArray[$i]['bv_sum']; ?></td>
		   <td class="release_line"><?php echo $resultsArray[$i]['complexity_sum']; ?></td>
		   <td class="release_line"><?php echo $resultsArray[$i]['task_count']; ?></td>		   
		   <td class="release_line"><?php echo $resultsArray[$i]['task_load_sum']; ?></td>		   
		   <td class="nowrap release_line"><center><?php
             // A button for adding a sprint 
             if ($currentProject->level==3 && $stepsAllowAddSprint && (in_array('ADD_SPRINT',$_SESSION['user_actions']) || in_array('ADD_SPRINT',$_SESSION['user_local_actions'])))
             {?>
			   <a href="<?php echo $pathBase;?>boards_buttons/add_sprint.php?release_add_sprint=<?php echo $resultsArray[$i]['release_id'];?>&release_end_date=<?php echo $resultsArray[$i]['release_due_date'];?>" class="<?php echo TipCssDisplay($button_add_sprint);?> addButtonGeneric"><img src="<?php echo $pathImages;?>app/new_sprint.png" border="0"  /><span><?php echo $button_add_sprint;?></span></a><?php
             }
			 // A button to change visibility in Kanban board
			 if (in_array('UPD_RELEASE',$_SESSION['user_actions']) || in_array('UPD_RELEASE',$_SESSION['user_local_actions']))
			 {
               if ($resultsArray[$i]['visibility']==0)
               {?>
			     <a href="<?php echo $targetFile;?>&action=show_in_kanban&release2show=<?php echo $resultsArray[$i]['release_id'];?>" class="<?php echo TipCssDisplay($action_set_as_visible);?>"><img src="<?php echo $pathImages;?>show.png" border="0"  /><span><?php echo $action_set_as_visible;?></span></a><?php
               }
			   else
               {?>
  			   <a href="<?php echo $targetFile;?>&action=hide_in_kanban&release2hide=<?php echo $resultsArray[$i]['release_id'];?>" class="<?php echo TipCssDisplay($action_set_as_hidden);?>"><img src="<?php echo $pathImages;?>hide.png" border="0"  /><span><?php echo $action_set_as_hidden;?></span></a><?php
               }
			   // If project is from an external source, add a button to update data
		       if ($resultsArray[$i]['release_external_release_id']!=0)
               {
			     // si changement de nom ou de date, proposer la mise à jour
			     if ($resultsArray[$i]['release_name']!=$releasesData[$resultsArray[$i]['release_external_release_id']]['rel_name'] || $resultsArray[$i]['release_due_date']!=$releasesData[$resultsArray[$i]['release_external_release_id']]['rel_due_date'])
				 {?>
                   <a href="javascript:document.form_update_release_data_<?php echo $resultsArray[$i]['release_id'];?>.submit()" class="<?php echo TipCssDisplay($action_refresh_release);?>"><img src="<?php echo $pathImages;?>refresh.png" border="0"  /><span><?php echo $action_refresh_release;?></span></a>				 
				   <form name="form_update_release_data_<?php echo $resultsArray[$i]['release_id'];?>" method="post" action="<?php echo $targetFile;?>" enctype="multipart/form-data">
				   <input type="hidden" name="action" value="update_ext_release" />
				   <input type="hidden" name="release2update" value="<?php echo $resultsArray[$i]['release_id'];?>" />
				   <input type="hidden" name="new_name" value="<?php echo $releasesData[$resultsArray[$i]['release_external_release_id']]['rel_name'];?>" />
				   <input type="hidden" name="new_due_date" value="<?php echo $releasesData[$resultsArray[$i]['release_external_release_id']]['rel_due_date'];?>" />
				   </form><?php
				 }
			   }			   
			 } ?>   </center>
		   </td> 			   
		   <td class="nowrap release_line"><center><?php
		     if (in_array('UPD_RELEASE',$_SESSION['user_actions']) || in_array('UPD_RELEASE',$_SESSION['user_local_actions']))
			 {
			   if ($resultsArray[$i]['release_external_release_id']==0)
			   {?>		   
 		         <a href="<?php echo $pathBase;?>boards_buttons/update_release.php?release_id=<?php echo $resultsArray[$i]['release_id'];?>" class="info addButtonGeneric"><img src="<?php echo $pathImages;?>modify.gif" border=0 /><span><?php echo $action_modify;?></span></a><?php
			   }
			   else
			   {?>		   
 		         <a href="<?php echo $pathBase;?>boards_buttons/update_release_external.php?release_id=<?php echo $resultsArray[$i]['release_id'];?>" class="info addButtonGeneric"><img src="<?php echo $pathImages;?>modify.gif" border=0 /><span><?php echo $action_modify;?></span></a><?php
			   }
			 }  
		     if ($resultsArray[$i]['us_count']==0 && (in_array('DEL_RELEASE',$_SESSION['user_actions']) || in_array('DEL_RELEASE',$_SESSION['user_local_actions'])))
			 {?>
              <a href="<?php echo $targetFile;?>&action=delete_release&release_id_2del=<?php echo $resultsArray[$i]['release_id'];?>" onclick="return confirm('<?php echo $msg_confirm_delete_object;?>');" class="info"><img src="<?php echo $pathImages;?>delete.gif" border="0" /><span><?php echo $action_delete;?></span></a><?php
			 }?>  
              </center>
          </td><?php
	      // display RSS if allowed
	      if ($allowRss)
		  {?>
                   <td class="release_line"><a href="<?php echo $pathBase;?>rss.php?release_id=<?php echo $resultsArray[$i]['release_id'];?>&language=<?php echo $_SESSION['language'];?>" target="rss_ext"><img src="<?php echo $pathImages;?>rss.png" border="0" /></td><?php
		  }
          if ($resultsArray[$i]['release_external_release_id']!=0)
           {
             $paramShortcut='shortcut=release_ext&shortcut_id='.$resultsArray[$i]['release_external_release_id'];
           }
           else
           {
             $paramShortcut='shortcut=release&shortcut_id='.$resultsArray[$i]['release_id'];
           }?>

           <td  class="release_line"><?php if (!$isIEbrowser)
		   {?><img src="<?php echo $pathImages;?>app/shortcut.png" border="0" id="showLinkRel<?php echo $resultsArray[$i]['release_id'];?>" />
               <div id="dialogLinkRel<?php echo $resultsArray[$i]['release_id'];?>"><?php echo $msg_use_this_url_as_shortcut_for_release;?> :<br /><br /><?php echo getServerURL();?>/index.php?<?php echo $paramShortcut;?></div> 
			                <script>
              $(function() { 
                  $( "#dialogLinkRel<?php echo $resultsArray[$i]['release_id'];?>").dialog({autoOpen: false,width:750,modal: true});          
                  $( "#showLinkRel<?php echo $resultsArray[$i]['release_id'];?>").button().click(function() {$( "#dialogLinkRel<?php echo $resultsArray[$i]['release_id'];?>" ).dialog( "open" );});});
              </script>   
			  <?php }?>
           </td>                   
         </tr><?php
		 // Display sprints Data : one line for each sprint
	     if ($currentProject->level==3)
		 {
		 for ($j=0;$j<count($sprintData);$j++)
		 {?>
		   <tr class="sprint_table_<?php echo $resultsArray[$i]['release_id'];?> <?php if (fmod($j,2)==1) { echo 'alt2'; }?>">
		     <td colspan="2">
			   <a href="manage_kanban.php?menu_lev1=cockpit&menu_lev2=prj_kanban&sprint_id=<?php echo $sprintData[$j]['sprint_id'];?>" ><?php echo $sprintData[$j]['sprint_name'];?></a><?php
			   if ($sprintData[$j]['sprint_start_date']<=aujourdhui() && $sprintData[$j]['sprint_end_date']>=aujourdhui())
			   {?>
			     <img src="<?php echo $pathImages;?>app/hourglass.png" border="0"  /><?php
			   }?>
			 </td>
			 <td><?php 
			   echo format_date_slash($sprintData[$j]['sprint_start_date']);?><img src="<?php echo $pathImages;?>railway.png" /><?php echo format_date_slash($sprintData[$j]['sprint_end_date']);?>
			 </td>
			 <td><?php echo (countWorkingDaysBetweenTwoDates($sprintData[$j]['sprint_start_date'],$sprintData[$j]['sprint_end_date'],$workingDays,$projectExludedDays)+1).' '.$text_days;?></td>
			 <td><?php echo $sprintData[$j]['us_count'];?></td>
			 <td><?php echo $sprintData[$j]['bv_sum'];?></td>
			 <td><?php echo $sprintData[$j]['complexity_sum'];?></td>
			 <td><?php echo $sprintData[$j]['task_count'];?></td>		
             <td nowrap="nowrap"><?php
			  if (isset($sprintsLoadByTaskTypeArray[$sprintData[$j]['sprint_id']]))
			  {
				$loadData=$sprintsLoadByTaskTypeArray[$sprintData[$j]['sprint_id']];
			    for($cpt=0;$cpt<count($loadData);$cpt++)
			    {?>
			       <div class="colorDisplay <?php echo $loadData[$cpt]['color']; ?>" style="float:left" title="<?php echo $loadData[$cpt]['use_color_meaning']; ?>"></div><span style="padding-left:8px;"><?php echo $loadData[$cpt]['sum_task'];?></span><br /><?php
			    }
			  }
		      echo '<b>'.$sprintData[$j]['task_load_sum'].'</b>';    ?>
			 </td>				 
			 <td><center><?php
			 if (in_array('UPD_SPRINT',$_SESSION['user_actions']) || in_array('UPD_SPRINT',$_SESSION['user_local_actions']))
             { 			 
               if ($sprintData[$j]['visibility']==0)
               {?>
			     <a href="<?php echo $targetFile;?>&action=show_in_kanban&sprint2show=<?php echo $sprintData[$j]['sprint_id'];?>" class="<?php echo TipCssDisplay($action_set_as_visible);?>"><img src="<?php echo $pathImages;?>show.png" border="0"  /><span><?php echo $action_set_as_visible;?></span></a><?php
               }
			   else
               {?>
			     <a href="<?php echo $targetFile;?>&action=hide_in_kanban&sprint2hide=<?php echo $sprintData[$j]['sprint_id'];?>" class="<?php echo TipCssDisplay($action_set_as_hidden);?>"><img src="<?php echo $pathImages;?>hide.png" border="0"  /><span><?php echo $action_set_as_hidden;?></span></a><?php
               }
			 }?>   </center>
			 </td>
			 <td><center><?php
			 if (in_array('UPD_SPRINT',$_SESSION['user_actions']) || in_array('UPD_SPRINT',$_SESSION['user_local_actions']))
             { ?>
		       <a href="<?php echo $pathBase;?>boards_buttons/update_sprint.php?sprint_id=<?php echo $sprintData[$j]['sprint_id'];?>&release_add_sprint=<?php echo $resultsArray[$i]['release_id'];?>&release_end_date=<?php echo $resultsArray[$i]['release_due_date'];?>" class="info addButtonGeneric"><img src="<?php echo $pathImages;?>modify.gif" border=0 /><span><?php echo $action_modify;?></span></a><?php
			 }  
		     if (in_array('DEL_SPRINT',$_SESSION['user_actions']) || in_array('DEL_SPRINT',$_SESSION['user_local_actions']))
			 {?>
              <a href="<?php echo $targetFile;?>&action=delete_sprint&sprint_id_2del=<?php echo $sprintData[$j]['sprint_id'];?>" onclick="return confirm('<?php echo $msg_confirm_delete_object;?>');" class="info"><img src="<?php echo $pathImages;?>delete.gif" border="0" /><span><?php echo $action_delete;?></span></a><?php
			 }?>  
              </center></td><?php
			  // display RSS if allowed
			  if ($allowRss)
			  {?>
			    <td><a href="<?php echo $pathBase;?>rss.php?sprint_id=<?php echo $sprintData[$j]['sprint_id'];?>&language=<?php echo $_SESSION['language'];?>" target="rss_ext"><img src="<?php echo $pathImages;?>rss.png" border="0" /></td><?php
			  }?>

           <td><?php if (!$isIEbrowser)
		   {?>
              <img src="<?php echo $pathImages;?>app/shortcut.png" border="0" id="showLink<?php echo $sprintData[$j]['sprint_id'];?>" />
              <div id="dialogLink<?php echo $sprintData[$j]['sprint_id'];?>"><?php echo $msg_use_this_url_as_shortcut_for_sprint;?> :<br /><br /><?php echo getServerURL();?>/index.php?shortcut=sprint&shortcut_id=<?php echo $sprintData[$j]['sprint_id'];?></div> 
           <script>
              $(function() { 
                  $( "#dialogLink<?php echo $sprintData[$j]['sprint_id'];?>").dialog({autoOpen: false,width:750,modal: true});          
                  $( "#showLink<?php echo $sprintData[$j]['sprint_id'];?>").button().click(function() {$( "#dialogLink<?php echo $sprintData[$j]['sprint_id'];?>" ).dialog( "open" );});});
           </script>   
            <?php }?>		   
           </td>                           
		 </tr><?php
		 }?>
		 <script>
            $('.img_sprint_table_<?php echo $resultsArray[$i]['release_id'];?>').click(function () {
            $('.sprint_table_<?php echo $resultsArray[$i]['release_id'];?>').toggle();
            if ($('.img_sprint_table_<?php echo $resultsArray[$i]['release_id'];?>').attr('src')=='./images/toggle.png')
            {
			  $('.img_sprint_table_<?php echo $resultsArray[$i]['release_id'];?>').attr('src','./images/untoggle.png');
			  $.post('xmlhttprequest/update_session.php',{recherche:'toggle_status_rel<?php echo $resultsArray[$i]['release_id'];?>',value:1},function(msg){ });		
            }
            else
			{
			  $('.img_sprint_table_<?php echo $resultsArray[$i]['release_id'];?>').attr('src','./images/toggle.png');
			  $.post('xmlhttprequest/update_session.php',{recherche:'toggle_status_rel<?php echo $resultsArray[$i]['release_id'];?>',value:0},function(msg){ });		
			}
			});  
			$('.sprint_table_<?php echo $resultsArray[$i]['release_id'];?>').toggle(<?php echo $_SESSION['toggle_status_rel'.$resultsArray[$i]['release_id']]==0 ? 'false' : 'true';?>);
		 </script><?php
		 }
       }?>
     </table>
	 </td>
	 
	 <td valign="top"  style="padding-right:10px;">
	 
	 <!-- FEATURES -->
	 <div class="MessageBox TitleBox"><?php echo $msg_features_management;?></div><?php
	 if (in_array('ADD_US',$_SESSION['user_actions']) || in_array('ADD_US',$_SESSION['user_local_actions']))
	 {
           displayButton($button_add_feature,$pathImages.'app/new_feature.png',$pathBase.'boards_buttons/add_feature.php','addButtonGeneric');	
	 } ?>

	 <table class="SimpleData" style="width:100%">
	     <tr>
		   <th width="15%"><?php echo $text_feature_short_label;?></th>
		   <th><?php echo $text_feature;?></th>
		   <th><?php echo $text_description;?></th>
		   <th><?php echo $text_count;?></th>
		   <th><center><a href="#" class="<?php echo TipCssDisplay($text_management);?>" style="cursor:default"><img src="<?php echo $pathImages;?>file.gif" border="0"  /><span><?php echo $text_management;?></span></a></center></th> 
		 </tr>  <?php	 
	 
	  $request->envoi("(SELECT feature_id,feature_name,feature_short_label,
	                          feature_description,COUNT(us_id) AS nb_us
	                   FROM kados_features 
					   LEFT JOIN kados_user_stories ON us_feature_id_fk=feature_id AND active=1 
					   WHERE feature_project_id_fk=".$_SESSION['current_project_id']." 
					   GROUP BY feature_id) 
					   UNION 
					   (SELECT 0 AS feature_id,'' AS feature_name,'' AS feature_short_label,
					           '' AS feature_description,COUNT(us_id) AS nb_us
					    FROM kados_user_stories
						WHERE us_feature_id_fk=0 
						  AND us_project_id_fk=".$_SESSION['current_project_id']." AND active=1) 
					   ORDER BY feature_name");	 
      $featuresList=$request->getArrayFields();
	  for ($i=0;$i<count($featuresList);$i++)
	  {?>
		 <tr <?php if (fmod($i,2)==1) { echo 'class="alt"'; }?>><?php
		  if ($featuresList[$i]['feature_short_label']=='')
		  {	?>
		    <td colspan="3"><center><i><?php echo $text_us_with_no_feature;?></i></center></td><?php
		  }
		  else
		  {?>
		    <td><?php echo $featuresList[$i]['feature_short_label'];?></td>
		    <td><?php echo $featuresList[$i]['feature_name'];?></td>
		    <td><?php echo nl2br($featuresList[$i]['feature_description']);?></td><?php
		  }?>	
		  <td><?php echo $featuresList[$i]['nb_us'];?></td>
		  <td><center><?php
		  if ($featuresList[$i]['feature_short_label']!='')
		  {
		    if (in_array('UPD_US',$_SESSION['user_actions']) || in_array('UPD_US',$_SESSION['user_local_actions']))
                    { ?>
		      <a href="<?php echo $pathBase;?>boards_buttons/update_feature.php?feature_id=<?php echo $featuresList[$i]['feature_id'];?>" class="info addButtonGeneric"><img src="<?php echo $pathImages;?>modify.gif" border=0 /><span><?php echo $action_modify;?></span></a><?php
		    }  
		    if ($featuresList[$i]['nb_us']==0 && (in_array('DEL_US',$_SESSION['user_actions']) || in_array('DEL_US',$_SESSION['user_local_actions'])))
		    {?>
                      <a href="<?php echo $targetFile;?>&action=delete_feature&feature2delete=<?php echo $featuresList[$i]['feature_id'];?>" onclick="return confirm('<?php echo $msg_confirm_delete_object;?>');" class="info"><img src="<?php echo $pathImages;?>delete.gif" border="0" /><span><?php echo $action_delete;?></span></a><?php
		    }
		  }	?>       </center>
		  </td>		  
		 </tr><?php
	  }?>	 
	   </table>
	   
	  <br />
      <!-- REPORTS -->	  
	  <div class="MessageBox TitleBox"><?php echo $msg_small_reports;?></div>
          
      <table class="LineData" cellpadding="0" cellspacing="0">
       <tr> 
	  <th><?php echo $text_us_total;?></th>
	  <th><?php echo $text_us_in_product_backlog;?></th>
	  <th><?php echo $text_business_value_total;?></th>
	  <th><?php echo $text_complexity_total;?></th>
       </tr>
         <tr>
	   <td><?php echo $currentProject->getUsCount();?></td>
	   <td><?php echo $currentProject->getPblCount();?></td>
	   <td><?php echo $currentProject->getBusinessvalueSum();?></td>
	   <td><?php echo $currentProject->getComplexitySum();?></td>
         </tr>
      </table>          
      <table style="width:100%;margin-top:8px;"><tr><td  valign="top"><?php	 

	  $request->envoi("SELECT COUNT(issue_id) AS nb_issue,issue_type,status 
	                   FROM kados_issues 
					   WHERE issue_project_id_fk=".$_SESSION['current_project_id']." 
					     AND active=1 
					   GROUP BY issue_type,status");

      $request->getArrayFields();
	  $issues=array('risk'=>array('NEW'=>0,'AWAY'=>0),'problem'=>array('NEW'=>0,'AWAY'=>0));
	  for ($i=0;$i<$request->nb_elt;$i++)
	  {
		$issues[$request->array[$i]['issue_type']][$request->array[$i]['status']]=$request->array[$i]['nb_issue'];	  
	  } ?>

              <table class="SimpleData"  style="width:100%">
			     <tr>
				   <th><?php echo $text_issues;?></th>
				   <th><img style="cursor:default;" src="./images/app/under_progress.png"></th>
				   <th><img style="cursor:default;" src="./images/app/ok.png"></th>
				 </tr>  

			     <tr>
				   <td><?php echo $text_risk;?></td>
				   <td><?php echo $issues['risk']['NEW'];?></td>
				   <td><?php echo $issues['risk']['AWAY'];?></td>
				 </tr>
			     <tr class="alt">
				   <td><?php echo $text_problem;?></td>
				   <td><?php echo $issues['problem']['NEW'];?></td>
				   <td><?php echo $issues['problem']['AWAY'];?></td>
				 </tr>

			   </table><?php
 
      $request->envoi("SELECT column_tag,column_name 
	                   FROM kados_template_columns,kados_projects_columns
			           WHERE column_tag=column_tag_fk AND project_id_fk=".$_SESSION['current_project_id']."
				       ORDER BY column_order");				   
      $request->getArrayFields();	
      // Allocate columns
	  $arrayStatus=array();
      for ($i=0;$i<$request->nb_elt;$i++)
      {	 
        $arrayStatus[$i]['colTag']=$request->array[$i]['column_tag'];  
        $arrayStatus[$i]['colName']=$request->array[$i]['column_name'];  
      } 
 
     $request->envoi("SELECT COUNT(task_id) AS nb_task,tsk.color,tsk.status AS status,us_id_fk, use_color_meaning  
	                   FROM kados_tasks tsk,kados_user_stories, kados_colors_uses colors   
					   WHERE us_id_fk=us_id AND us_project_id_fk=".$_SESSION['current_project_id']." 
					     AND tsk.color=colors.color AND tsk.active=1 AND use_color_postit_type='TASK' 
					   GROUP BY tsk.color,tsk.status");
      $request->getArrayFields();
	  $usTasks=array();
	  for ($i=0;$i<$request->nb_elt;$i++)
	  {
		$usTasks[$request->array[$i]['color']][$request->array[$i]['status']]=$request->array[$i]['nb_task'];	  
		$usTasks[$request->array[$i]['color']]['meaning']=$request->array[$i]['use_color_meaning'];	  		
	  } ?>

	  </td>
	       <td style="padding-left:20px;"  valign="top">
	          <table class="SimpleData" style="text-align:center;width:100%">
			     <tr>
				   <th><?php echo $text_tasks;?></th><?php
                   for ($i=0;$i<count($arrayStatus);$i++)
                   {?>				   
				     <th><?php echo $arrayStatus[$i]['colName'];?></th><?php
				   }?>
				 </tr>  <?php
			   $j=0;
			   while($status=each($usTasks))
			   {?>
			     <tr <?php if (fmod($j++,2)==1) { echo 'class="alt"'; }?>>
				   <td><center><div class="colorDisplay <?php echo $status[0]; ?>" title="<?php echo $status[1]['meaning']; ?>"></div></center></td><?php
				   for ($i=0;$i<count($arrayStatus);$i++)
                   {?>				   
				     <td><?php if (isset($status[1][$arrayStatus[$i]['colTag']])) { echo $status[1][$arrayStatus[$i]['colTag']];}?></td><?php
				   }?>
				 </tr><?php
			   }?>
			   </table> 
			 </td>
        </tr>			 
	   </table>	   
	 </td>
	 </tr>
	 </table><?php
}
else
{?>
  <div class="MessageBox WarningMessageBox"><?php echo $msg_no_project_selected;?></div><?php
}
include $pathBase.'footer.php';?>
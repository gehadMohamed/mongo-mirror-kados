<?php
/**
 * Page exports project US and Tasks
 *
 * PHP versions 4 and 5
 *
 * @category Scripts
 * @package  ProjectManagement:ObjectSettings
 * @author   Charles Santucci <charles@santucci.fr>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * */  
$pathBase='./';
$targetFile='project_exports.php?menu_lev2=prj_exports';
$displayTable=true;

include $pathBase.'header.php';

$cnx=new connexion_db($pathBase);     $mcnx=new mconnexion_db($pathBase);

if (isset($_REQUEST['project_id']))
{
  $_SESSION['current_project_id']=intval($_REQUEST['project_id']);
  include_once $pathBase.'project_get_user_rights.php';
}

if (isset($_SESSION['current_project_id']))
{
  include $pathBase.'railway_display.php';    ?>
  <form method="POST" name="form_export_word" action="<?php echo $pathBase;?>exports/export_word.php" >
  <input type="hidden" name="project_id" value="<?php echo (isset($_SESSION['current_project_id']) ? $_SESSION['current_project_id'] : 0);?>" />
  <input type="hidden" name="release_id" value="<?php echo (isset($_SESSION['current_release_id']) ? $_SESSION['current_release_id'] : 0);?>" />
  <input type="hidden" name="sprint_id" value="<?php echo (isset($_SESSION['current_sprint_id']) ? $_SESSION['current_sprint_id'] : 0);?>" />
  <div class="block25">
    <!-- Colors for USer Stories !-->
     <div class="MessageBox TitleBox"><?php echo $text_us_colors_select_for_export;?></div>
     <table class="CompactTable"><?php
         $request->envoi("SELECT color_id,color_name,color_default,
	                     object_color_meaning 
                         FROM kados_user_stories LEFT JOIN 
                       ((SELECT color_id,color_name,use_color_default  AS color_default,
	                       use_color_meaning AS object_color_meaning 
                           FROM kados_colors_uses,kados_colors 
			   WHERE use_color_postit_type='US' AND color=color_name 
                                 AND use_color_lock=1)
			    UNION
			    (SELECT color_id,color_name,object_color_default AS color_default,
                                    object_color_meaning 
			     FROM kados_projects_colors,kados_colors 
			     WHERE project_id_fk=".$_SESSION['current_project_id']."
		 	       AND color_id_fk=color_id 
			      AND object_type='US')) kados_colors_all ON color=color_name 
                      WHERE us_project_id_fk=".$_SESSION['current_project_id']."
                        AND active=1  
                      GROUP BY color_name");	  	     
     $colorList=$request->recup_array_champ();
	   
     for ($i=0;$i<count($colorList);$i++)
     {?>
         <tr <?php if (fmod($i,2)==1) { echo 'class="alt"'; }?>>
           <td><input type="checkbox" name="choose_color_us_<?php echo $colorList[$i]['color_id'];?>" checked="checked" /></td>
	   <td><div class="colorDisplay <?php echo $colorList[$i]['color_name'];?>"></div></td>
	   <td><?php echo $colorList[$i]['object_color_meaning']; ?></td>                     
  	 </tr><?php
         
       }?>
     </table>
   </div>
	 
   <div class="block25">
    <!-- Colors for Tasks !-->
     <div class="MessageBox TitleBox"><?php echo $text_us_status_select_for_export;?></div>	

    <table class="CompactTable">
         <tr>
           <td><input type="checkbox" name="choose_status_us_todo"  checked="checked"  /></td>
           <td><img src="<?php echo $pathImages;?>/app/bulb.png" style="cursor:default;" /></td>
           <td><?php echo $usStatusTable['TODO'];?></td>
  	 </tr>
         <tr class="alt">
           <td><input type="checkbox" name="choose_status_us_run"  checked="checked"  /></td>
           <td><img src="<?php echo $pathImages;?>/app/under_progress.png" style="cursor:default;" /></td>
           <td><?php echo $usStatusTable['RUN'];?></td>
  	 </tr>
         <tr>
           <td><input type="checkbox" name="choose_status_us_dev"  checked="checked"  /></td>
           <td><img src="<?php echo $pathImages;?>/app/square_green.png" style="cursor:default;" /></td>
           <td><?php echo $usStatusTable['DEV'];?></td>
  	 </tr>
         <tr class="alt">
           <td><input type="checkbox" name="choose_status_us_done"  checked="checked"  /></td>
           <td><img src="<?php echo $pathImages;?>/app/ok.png" style="cursor:default;" /></td>
           <td><?php echo $usStatusTable['DONE'];?></td>
  	 </tr>         
     </table>	 
     
   </div>  
  
   <div class="block25">
    <!-- Colors for Tasks !-->
     <div class="MessageBox TitleBox"><?php echo $text_tasks_colors_select_for_export;?></div>
     <table class="CompactTable"><?php
	   
     $request->envoi("SELECT color_id,color_name,color_default,
	                     object_color_meaning 
                      FROM kados_user_stories,kados_tasks tsk LEFT JOIN  
                       ((SELECT color_id,color_name,use_color_default  AS color_default,
	                       use_color_meaning AS object_color_meaning 
                           FROM kados_colors_uses,kados_colors 
			   WHERE use_color_postit_type='TASK' AND color=color_name 
                                 AND use_color_lock=1)
			    UNION
			    (SELECT color_id,color_name,object_color_default AS color_default,
                                    object_color_meaning  
			     FROM kados_projects_colors,kados_colors 
			     WHERE project_id_fk=".$_SESSION['current_project_id']."
		 	       AND color_id_fk=color_id 
			      AND object_type='TASK')) kados_colors_all ON tsk.color=color_name
                      WHERE us_project_id_fk=".$_SESSION['current_project_id']."
                        AND tsk.active=1  
                        AND us_id_fk=us_id
                      GROUP BY color_name");	  	     
     $colorList=$request->recup_array_champ();
	   
     for ($i=0;$i<count($colorList);$i++)
     {?>
         <tr <?php if (fmod($i,2)==1) { echo 'class="alt"'; }?>>
           <td><input type="checkbox" name="choose_color_task_<?php echo $colorList[$i]['color_id'];?>"  checked="checked"  /></td>
           <td><div class="colorDisplay <?php echo $colorList[$i]['color_name'];?>"></div></td>
	   <td><?php echo $colorList[$i]['object_color_meaning']; ?></td>                     
  	 </tr><?php
       }?>
     </table>
   </div>

   <div class="block25">
    <!-- Colors for Tasks !-->
     <div class="MessageBox TitleBox"><?php echo $text_tasks_status_select_for_export;?></div>	 <?php
             
   $sqlColumns="SELECT column_tag,column_name,column_usage,column_meaning 
                FROM kados_template_columns,kados_projects_columns 
	        WHERE column_tag=column_tag_fk AND project_id_fk=".$_SESSION['current_project_id']."  
		ORDER BY column_order"; 
   $request->envoi($sqlColumns);
   $taskStatusList=$request->recup_array_champ();?>

    <table class="CompactTable"><?php
	   
     for ($i=0;$i<count($taskStatusList);$i++)
     {?>
         <tr <?php if (fmod($i,2)==1) { echo 'class="alt"'; }?>>
           <td><input type="checkbox" name="choose_status_task_<?php echo $taskStatusList[$i]['column_tag'];?>"  checked="checked"  /></td>
           <td><?php echo $taskStatusList[$i]['column_name'];?></td>
	   <td><?php echo $taskStatusList[$i]['column_meaning']; ?></td>                     
  	 </tr><?php
       }?>
     </table>	 
     
   </div>
   <div class="clearleft"></div>
   </form>
<?php   
   // export button
   displayButton($button_export,$pathImages.'file_doc.gif','javascript:document.form_export_word.submit()');
  
}
else
{?>
  <div class="MessageBox WarningMessageBox"><?php echo $msg_no_project_selected;?></div><?php
}

include $pathBase.'footer.php';?>
<?php
/**
 * Main page to manage settings of a project
 *
 * PHP versions 4 and 5
 *
 * @category Scripts
 * @package  ProjectManagement:ObjectSettings
 * @author   Charles Santucci <charles@santucci.fr>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * */  
$pathBase='./';
$targetFile='project_reports.php?menu_lev2=prj_report';
$displayTable=true;
	  
include $pathBase.'header.php';
$cnx=new connexion_db($pathBase);     $mcnx=new mconnexion_db($pathBase);

if (isset($_REQUEST['project_id']))
{
  $_SESSION['current_project_id']=intval($_REQUEST['project_id']);
  include_once $pathBase.'project_get_user_rights.php';
}

if (isset($_REQUEST['graph_number']))
{
  $_SESSION['show_graph_values']=$_REQUEST['graph_number'];
}

if (!isset($_SESSION['show_graph_values']))
{
  $_SESSION['show_graph_values']=true;
}

if (isset($_SESSION['current_project_id']))
{
  /* actions for the page */
  switch ($_REQUEST['action'])
  {
  }

  if ($displayTable)
  {
    include $pathBase.'railway_display.php';
	
	if (isset($_SESSION['current_sprint_id']))
	{
	  // get status
      $initialStatus=getInitialStatus($_SESSION['current_project_id'],$pathBase);
      $finalStatus=getFinalStatus($_SESSION['current_project_id'],$pathBase);	  
	  // Get data
	  $request=new requete("SELECT color,ROUND(SUM(sumRafTodo),1) AS sumRafTodo,ROUND(SUM(sumRafInProgress),1) AS sumRafInProgress,
	                               ROUND(SUM(sumLoad),1) AS sumLoad,use_color_meaning AS meaning   
                            FROM (
	                        (SELECT tsk.color,SUM(task_raf) AS sumRafTodo,0 AS sumRafInProgress,
	                                0 AS sumLoad,use_color_meaning  
	                        FROM kados_tasks tsk,kados_user_stories, kados_colors_uses colors  
					        WHERE us_id_fk=us_id AND us_sprint_id_fk=".$_SESSION['current_sprint_id']." AND kados_user_stories.active=1 
					          AND tsk.color=colors.color AND tsk.active=1 AND tsk.status='".$initialStatus."' AND use_color_postit_type='TASK' 
					        GROUP BY tsk.color)
							UNION
							(SELECT tsk.color,0 AS sumRafTodo,SUM(task_raf) AS sumRafInProgress,
	                                0 AS sumLoad,use_color_meaning  
	                        FROM kados_tasks tsk,kados_user_stories,  kados_colors_uses colors    
					        WHERE us_id_fk=us_id AND us_sprint_id_fk=".$_SESSION['current_sprint_id']." AND kados_user_stories.active=1 
					          AND tsk.color=colors.color AND tsk.active=1 AND tsk.status NOT IN('".$initialStatus."','".$finalStatus."')
                                                  AND use_color_postit_type='TASK'        
					        GROUP BY tsk.color)
							UNION
							(SELECT tsk.color,0 AS sumRafTodo,0 AS sumRafInProgress,
	                                SUM(task_load) AS sumLoad,use_color_meaning  
	                        FROM kados_tasks tsk,kados_user_stories,  kados_colors_uses colors    
					        WHERE us_id_fk=us_id AND us_sprint_id_fk=".$_SESSION['current_sprint_id']." 
					          AND tsk.color=colors.color AND tsk.active=1 AND kados_user_stories.active=1 AND use_color_postit_type='TASK' 
					        GROUP BY tsk.color)) tabCroise GROUP BY color",$cnx->num);
	  $tasksProgress=array();				   
	  $tasksProgress=$request->getArrayFields();
	  $sumTodo=0;
	  $sumInProgress=0;
	  $sumLoad=0;?>
	          <table class="SynthesisData" cellpadding="0" cellspacing="0" style="text-align:center;margin-left:5px;width:auto">
			     <tr>
				   <th class="borderleft"><?php echo $text_tasks;?></th>
			       <th><?php echo $text_status_initial;?></th>
				   <th><?php echo $text_status_in_progress;?></th>
				   <th><?php echo $text_initial_load;?></th>
				   <th><?php echo $text_percentage_done;?></th>
				 </tr>  <?php
			   for ($i=0;$i<count($tasksProgress);$i++)
			   {?>
			     <tr <?php if (fmod($i,2)==1) { echo 'class="alt"'; }?>>
				   <td class="borderleft borderright borderbottom"><center><div class="colorDisplay <?php echo $tasksProgress[$i]['color']; ?>" title="<?php echo $tasksProgress[$i]['meaning']; ?>"></div></center></td>
 			       <td class="borderright borderbottom"><?php echo $tasksProgress[$i]['sumRafTodo']; $sumTodo+=$tasksProgress[$i]['sumRafTodo']; ?></td>
				   <td class="borderright borderbottom"><?php echo $tasksProgress[$i]['sumRafInProgress']; $sumInProgress+=$tasksProgress[$i]['sumRafInProgress'];?></td>
				   <td class="borderright borderbottom"><?php echo $tasksProgress[$i]['sumLoad']; $sumLoad+=$tasksProgress[$i]['sumLoad'];?></td>
				   <td class="borderright borderbottom"><?php 
				     if ($tasksProgress[$i]['sumLoad']!=0) 
				     {
					   echo round(100*($tasksProgress[$i]['sumLoad']-$tasksProgress[$i]['sumRafTodo']-$tasksProgress[$i]['sumRafInProgress'])/$tasksProgress[$i]['sumLoad']); 
					 }?>%
				   </td>
				 </tr><?php
			   }?>
			   <tr>
			     <td class="borderright"></td>
				 <td class="light_red bold borderright borderbottom"><?php echo $sumTodo;?></td>
				 <td class="light_red bold borderright borderbottom"><?php echo $sumInProgress;?></td>
				 <td class="borderbottom"></td>
				 <td class="borderbottom"></td>
			   </tr>
			   <tr>
			     <td class="borderright"></td>
				 <td colspan="2" class="light_grey bold borderright borderbottom"><?php echo ($sumTodo+$sumInProgress);?></td>
				 <td class="light_grey bold borderright borderbottom"><?php echo $sumLoad;?></td>
				 <td class="light_grey bold borderright borderbottom"><?php if ($sumLoad!=0) {echo round(100*($sumLoad-$sumTodo-$sumInProgress)/$sumLoad); }?>%</td>		   
			   </tr>
			   </table> <br /><?php
	  // display a burndown chart of the sprint (forecast/spent/raf in hours on tasks, day by day)
	  if ($_SESSION['show_graph_values'])
	  {
	    displayButton($button_hide_graph_numbers,$pathImages.'app/hide_numbers.png',$targetFile.'&graph_number=0');	
	  }
      else	
	  {
	    displayButton($button_show_graph_numbers,$pathImages.'app/show_numbers.png',$targetFile.'&graph_number=1');	
	  }?>
	  <div class="clearleft"></div>
	  <img border="0" src="graphs/burndown_sprint.php">
          <div class="clearleft"></div>
          <img border="0" src="graphs/burnup_sprint_us_count.php">
	  <div class="clearleft"></div><?php
	}  
	else if (isset($_SESSION['current_release_id']))
	{
	  // display a burnup chart of the business value in the release , sprint by sprint 
	  // And a burnDown chart of the complexity, sprint by sprint?>
	  <img border="0" src="graphs/burnup_release.php">
	  <img border="0" src="graphs/burnup_velocity.php">
	  <div class="clearleft"></div>	 
 	  <img border="0" src="graphs/burnup_release_us_count.php">
	  <div class="clearleft"></div><?php
	}
	else
	{
	  // display a burnup chart of the business value in the project, release by release
	  // And a burnDown chart of the complexity, release by relase
	}

	
	
  }
}
else
{?>
  <div class="MessageBox WarningMessageBox"><?php echo $msg_no_project_selected;?></div><?php
}

include $pathBase.'footer.php';?>